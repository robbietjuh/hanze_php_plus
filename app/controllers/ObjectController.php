<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * ObjectController
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

    public function listObjects($args) {
        echo "List objects<br />";
        var_dump($args);
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