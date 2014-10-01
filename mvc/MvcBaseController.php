<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * MvcBaseController.php
 * Hanzecontact
 *
 * This file contains the base controller class.
 *
 * @author     R. de Vries <r.devries@robbytu.net>
 * @version    1.0.0
 * @date       01/10/14
 * @copyright  2014 RobbytuProjects
 * @license    MIT License
 */

class MvcBaseController {
    /**
     * @var MvcApplication A pointer to the main MvcApplication instance
     */
    protected $MvcInstance;

    /**
     * @var array Data to be passed on to the view
     */
    protected $data = array();

    /**
     * Populates the controller's base variables
     * @param $sender MvcApplication The MvcApplication that dispatched to the controller
     */
    public function __construct($sender) {
        $this->MvcInstance = $sender;
    }

    /**
     * Renders a view
     * @param $view string Name of the view to render
     */
    public function renderView($view) {
        // Check wether the view exists
        if(!file_exists("app/views/$view.php"))
            $this->MvcInstance->dieWithDebugMessageOr404(
                "Could not render view: file not found",
                ['view' => $view, 'data' => $this->data]);

        // Include the view
        include "app/views/$view.php";
    }

    /**
     * Loads a model
     * @param $model string Name of the model to load
     * @return MvcBaseModel The model
     */
    public function loadModel($model) {
        // Check wether the model exists
        if(!file_exists("app/models/$model.php"))
            $this->MvcInstance->dieWithDebugMessageOr404(
                "Could not load the model specified: file not found",
                ['model' => $model]);

        require_once "app/models/$model.php";

        $model = new $model($this->MvcInstance);
        return $model;
    }

    /**
     * Redirects the user to another URL and exits the application
     * @param $url string URL to redirect to
     */
    public function redirectToUrl($url) {
        header("Location: {$this->MvcInstance->appBaseUrl}$url");
        exit;
    }
}