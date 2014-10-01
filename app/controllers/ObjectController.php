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
     * Load the model corresponding to the urldef data
     * @param $modelArg Model from the urldef
     * @return mixed Specified model object
     */
    private function loadCorrespondingModel($modelArg) {
        return $this->loadModel(ucfirst($modelArg) . 'Model');
    }

    /**
     * Renders the base template views with a main view
     * @param $view Name of the main view to render
     */
    private function renderBaseTemplateWithView($view) {
        $this->renderView("base/header");
        $this->renderView($view);
        $this->renderView("base/footer");
    }

    /**
     * Generates an array of fields and input tags that can be used
     * by a view to render a form.
     * @param $modelName string Name of the model to create a form for
     * @param $model MvcBaseModel A model (should contain a tableColumns variable!)
     * @param $object mixed Array to be used to fill the inputs or false
     * @return array Form inputs as an array
     */
    private function getFormArray($modelName, $model, $object) {
        // Stores the form
        $form = array();

        // Add input fields for every column that the table has
        foreach($model->tableColumns as $friendly => $column)
            $form[$friendly] = sprintf(
                "<input type='%s' name='%s' value='%s' />",
                (($column == "Picture" && $modelName == "employees") ? "file" : "text"),
                $column,
                (is_array($object) && array_key_exists($column, $object)) ? $object[$column] : "");

        // Return the form array
        return $form;
    }

    /**
     * Lists the objects in the database
     * @param $args Arguments passed on from the urldef
     */
    public function listObjects($args) {
        // Load the model corresponding to the arguments passed on from the urldef
        $model = $this->loadCorrespondingModel($args['model']);

        // Set up all data variables
        $this->data['title'] = $model->friendlyNamePlural;

        $this->data['singleObjectName'] = $model->friendlyNameSingle;
        $this->data['tableColumns'] = $model->tableColumns;

        if(in_array($_GET['sortBy'], array_values($model->tableColumns)))
            $this->data['tableObjects'] = $model->allObjectsWithQuery(" ORDER BY " . $_GET['sortBy']);
        else
            $this->data['tableObjects'] = $model->allObjects();

        // Add urldefs
        $this->data['addUrl'] = "{$this->MvcInstance->appBaseUrl}/{$args['model']}/new";
        $this->data['editUrl'] = "{$this->MvcInstance->appBaseUrl}/{$args['model']}/%d/edit";
        $this->data['removeUrl'] = "{$this->MvcInstance->appBaseUrl}/{$args['model']}/%d/remove";

        // If the model matches Employees, we should change the picture column
        // to an actual image (HTML).
        $imgHtml = "<img src='{$this->MvcInstance->appBaseUrl}/pictures/%s' style='height: 40px;' alt='Pasfoto' />";
        if($args['model'] == 'employees')
            for($obj_index = 0; $obj_index < count($this->data['tableObjects']); $obj_index++)
                $this->data['tableObjects'][$obj_index]['Picture'] = sprintf($imgHtml, $this->data['tableObjects'][$obj_index]['Picture']);

        // Render the views
        $this->renderBaseTemplateWithView("object_list");
    }

    /**
     * Add an object to the database or show a form to create a new object
     * @param $args Arguments passed on from the urldef
     */
    public function newObject($args) {
        // Load the model corresponding to the arguments passed on from the urldef
        $model = $this->loadCorrespondingModel($args['model']);

        // Set up all data variables
        $this->data['title'] = $model->friendlyNameSingle . " toevoegen";
        $this->data['submitUrl'] = "{$this->MvcInstance->appBaseUrl}/{$args['model']}/new";
        $this->data['form'] = $this->getFormArray($args['model'], $model, false);

        // Render the views
        $this->renderBaseTemplateWithView("object_form");
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