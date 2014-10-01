<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * MvcApplication.php
 * Hanzecontact
 *
 * This file contains the main class for the MVC framework, including the bootstrapper,
 * database connectors and url dispatcher.
 *
 * @author     R. de Vries <r.devries@robbytu.net>
 * @version    1.0.0
 * @date       01/10/14
 * @copyright  2014 RobbytuProjects
 * @license    MIT License
 */

require_once "mvc/MvcBaseController.php";
require_once "mvc/MvcBaseModel.php";

class MvcApplication {
    /**
     * @var string Name of the application
     */
    public $appName;

    /**
     * @var string Version of the application
     */
    public $appVersion;

    /**
     * @var string Base URL of the application, could come in handy when used in combination with Apache's mod_user
     */
    public $appBaseUrl;

    /**
     * @var bool Wether or not the enable detailed debug information
     */
    public $debug = false;

    /**
     * @var array Database connection configuration.
     *
     * Should at least contain:
     *      - Host
     *      - Username
     *      - Password
     *      - Database
     */
    protected $database;

    /**
     * @var array Configured URLs for the application.
     *
     * Should be in a format as follows:
     *      '${Regex URL matcher}' => ['${Controller}', '${Function}']
     *
     * The controllername should match the filename and classname of the controller
     * you want to dispatch to. The functionname is called on the controller.
     */
    protected $urls;

    /**
     * @var mixed Currently used controller object
     */
    protected $controller;

    /**
     * Bootstrap the MVC framework.
     */
    public function __construct() {
        try {
            // Set up a database connection
            $this->db_conn = new PDO(
                "mysql:host={$this->database['host']};dbname={$this->database['database']}",
                $this->database['username'],
                $this->database['password']);
        }
        catch(Exception $error) {
            // Report the failure to the user
            $this->dieWithDebugMessageOr404(
                'Could not connect to the database server',
                ['exception' => $error]);
        }

        // Dispatch the url to the appropriate controller
        $this->dispatch();
    }

    /**
     * Parse the URL and compare it the urldefs in the application's config. Dispatch
     * to the controller if a match is found.
     */
    public function dispatch() {
        // Loop through the configured urls and check whether they match
        // with any of the configured urls in the application config.
        foreach($this->urls as $pattern => $callback) {
            if (preg_match($pattern, $_GET['path'], $matches) !== false) {
                if(count($matches) > 0) {
                    $controller = $callback[0];
                    $function = $callback[1];
                    $args_by_url = $matches;
                }
            }
        }

        // Check whether a match was found
        if(!isset($controller) || !isset($function) || !isset($args_by_url))
            $this->dieWithDebugMessageOr404(
                "No urldef match found for requested url",
                ["url" => $_GET['path'], "urldefs" => $this->urls]);

        // Check wether the controller exists
        if(!file_exists("app/controllers/$controller.php"))
            $this->dieWithDebugMessageOr404(
                "Could not dispatch to controller: file not found",
                ['url' => $_GET['path'], 'controller' => $controller]);

        // Include the controller file
        require_once("app/controllers/$controller.php");

        // Initialize the controller class
        $this->controller = new $controller($this);

        // Call the method specified in the URL definition
        $this->controller->$function($args_by_url);
    }

    /**
     * Print an error message to the screen if @see $debug is enabled,
     * otherwise print a '404 not found' message and exit.
     *
     * @param string $title The title to be shown in the error message
     * @param array $details Detailed information to be displayed
     */
    public function dieWithDebugMessageOr404($title, $details=array()) {
        // Set the HTTP response code
        http_response_code(404);

        // HTML head
        echo "<!doctype html>";
        echo "<html>";
        echo "<head>";
        echo "<style type='text/css'>body { font-family: Arial; }</style>";
        echo "<title>{$this->appName} {$this->appVersion}</title></head>";
        echo "<body>";

        // Check wether to display detailed debug information or not
        if(!$this->debug) {
            echo "<h1>Not Found</h1>";
            echo "The requested URL was not found on this server.";
        }
        else {
            echo "<h1>$title</h1>";
            echo "A detailed description will follow. Turn off <code>debug</code> in production!";

            // You may want to add additional variables to be printed to the screen
            $toPrint = ['Debug information' => $details,
                        'GET global' => $_GET,
                        'POST global' => $_POST,
                        'SERVER global' => $_SERVER];

            foreach($toPrint as $description => $data) {
                // Skip empty arrays
                if(is_array($data) && count($data) == 0) continue;

                // Print information to the screen
                echo "<hr />";
                echo "<strong>$description</strong>";
                echo "<pre>";
                print_r($data);
                echo "</pre>";
            }
        }

        // Footer
        echo "<hr>";
        echo "<span style='font-style: italic;'>{$this->appName} {$this->appVersion}</span>";
        echo "</body>";
        echo "</html>";

        // Terminate the application
        exit;
    }
}