<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * app.php
 * Hanzecontact
 *
 * Contains the application settings.
 *
 * @author     R. de Vries <r.devries@robbytu.net>
 * @version    1.0.0
 * @date       01/10/14
 * @copyright  2014 RobbytuProjects
 * @license    MIT License
 */

require_once "mvc/MvcApplication.php";

class app extends MvcApplication {
    /**
     * @var string Name of the application
     */
    public $appName = "Hanzecontact";

    /**
     * @var string Version of the application
     */
    public $appVersion = "1.0.0";

    /**
     * @var string Base URL of the application, could come in handy when used in combination with Apache's mod_user
     */
    public $appBaseUrl = "/~robert/Hanze/php_plus_opdracht";

    /**
     * @var bool Wether or not the enable detailed debug information
     */
    public $debug = true;

    /**
     * @var array Database connection configuration.
     *
     * Should at least contain:
     *      - Host
     *      - Username
     *      - Password
     *      - Database
     */
    protected $database = [
        'host'      => '127.0.0.1',
        'username'  => 'hanzecontact',
        'password'  => 'c0nt3ct',
        'database'  => 'hanzecontact'
    ];

    /**
     * @var array Configured URLs for the application.
     *
     * Should be in a format as follows:
     *      '${Regex URL matcher}' => ['${Controller}', '${Function}']
     *
     * The controllername should match the filename and classname of the controller
     * you want to dispatch to. The functionname is called on the controller.
     */
    protected $urls = [
        // Homepage
        '{^$}' => ['HomepageController', 'renderHomepage']
    ];
}