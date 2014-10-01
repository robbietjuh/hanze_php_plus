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
     * Bootstrap the MVC framework.
     */
    public function __construct() {
        try {
            // Set up a database connection
            $this->db_conn = new PDO(
                "mysql:host={$this->database['host']};dbname={$this->database['database']}",
                $this->database['username'],
                $this->database['passwdord']);
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
    private function dispatch() {
        var_dump($this);
    }

    /**
     * Print an error message to the screen if @see $debug is enabled,
     * otherwise print a '404 not found' message and exit.
     *
     * @param $title The title to be shown in the error message
     * @param array $details Detailed information to be displayed
     */
    private function dieWithDebugMessageOr404($title, $details=array()) {
        var_dump($details);
    }
}