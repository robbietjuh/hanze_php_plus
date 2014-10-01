<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * MvcBaseModel.php
 * Hanzecontact
 *
 * This file contains the base model class.
 *
 * @author     R. de Vries <r.devries@robbytu.net>
 * @version    1.0.0
 * @date       01/10/14
 * @copyright  2014 RobbytuProjects
 * @license    MIT License
 */

class MvcBaseModel {
    /**
     * @var string Database table name for this model
     */
    protected $tableName = "";

    /**
     * @var MvcApplication A pointer to the main MvcApplication instance
     */
    protected $MvcInstance;

    /**
     * Populates the model's base variables and verifies the model
     * @param $sender The MvcApplication
     */
    public function __construct($sender) {
        // Set base variables
        $this->MvcInstance = $sender;

        // Verify the model
        $this->verifyModel();
    }

    private function verifyModel() {
        if(empty($this->tableName)) $error = "No table name was set";

        if(isset($error))
            $this->MvcInstance->dieWithDebugMessageOr404(
                "Invalid model",
                ["message" => $error]);
    }
}