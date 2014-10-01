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
     * @param $sender The MvcApplication that dispatched to the controller
     */
    public function __construct($sender) {
        $this->MvcInstance = $sender;
    }

    public function renderView($view) {
        // Check wether the view exists
        if(!file_exists("app/views/$view.php"))
            $this->MvcInstance->dieWithDebugMessageOr404(
                "Could not render view: file not found",
                ['view' => $view, 'data' => $this->data]);

        // Include the view
        include "app/views/$view.php";
    }

    public function loadModel($model) {
        // Check wether the model exists
        if(!file_exists("app/views/model.php"))
            $this->MvcInstance->dieWithDebugMessageOr404(
                "Could not load the model specified: file not found",
                ['model' => $model]);

        require_once "app/models/$model.php";

        $model = new $model($this->MvcInstance);
        return $model;
    }
}