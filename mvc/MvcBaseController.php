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
}