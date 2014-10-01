<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * ObjectController.php
 * Hanzecontact
 *
 * Controller that will handle requests made to the urldef's for...
 *      - Listing objects
 *      - Adding new objects
 *      - Editing objects
 *      - Removing objects
 *
 * @author     R. de Vries <r.devries@robbytu.net>
 * @version    1.0.0
 * @date       01/10/14
 * @copyright  2014 RobbytuProjects
 * @license    MIT License
 */

class ObjectController extends MvcBaseController {
    /**
     * @param $modelArg Model from the urldef
     * @return mixed Specified model object
     */
    function loadCorrespondingModel($modelArg) {
        return $this->loadModel(ucfirst($modelArg) . 'Model');
    }

    /**
     * Renders the base template views with a main view
     * @param $view Name of the main view to render
     */
    function renderBaseTemplateWithView($view) {
        $this->renderView("base/header");
        $this->renderView($view);
        $this->renderView("base/footer");
    }

    /**
     * Lists the objects in the database
     * @param $args Arguments passed on from the urldef
     */
    public function listObjects($args) {
        // Load the model corresponding to the arguments passed on
        // from the urldef
        $model = $this->loadCorrespondingModel($args['model']);

        // Set up all data variables
        $this->data['title'] = $model->friendlyNamePlural;

        $this->data['singleObjectName'] = $model->friendlyNameSingle;
        $this->data['tableColumns'] = $model->tableColumns;
        $this->data['tableObjects'] = $model->allObjects();

        // Add urldefs
        $this->data['addUrl'] = "{$this->MvcInstance->appBaseUrl}/{$args['model']}/new";
        $this->data['editUrl'] = "{$this->MvcInstance->appBaseUrl}/{$args['model']}/%d/edit";
        $this->data['removeUrl'] = "{$this->MvcInstance->appBaseUrl}/{$args['model']}/%d/remove";

        // Render the views
        $this->renderBaseTemplateWithView("object_list");
    }

    public function newObject($args) {
        echo "New object<br />";
        var_dump($args);
    }

    public function editObject($args) {
        echo "Edit object<br />";
        var_dump($args);
    }

    public function removeObject($args) {
        echo "Remove object<br />";
        var_dump($args);
    }
}