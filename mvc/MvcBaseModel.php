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
     * @var string Database table primary key field name for this model
     */
    protected $tablePrimaryKeyField = "";

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

    /**
     * Verifies the model
     */
    private function verifyModel() {
        // Check basic variables
        if(empty($this->tableName)) $error = "No table name was set";
        else if(empty($this->tablePrimaryKeyField)) $error = "No primary key field was set";

        // Stop on errors
        if(isset($error))
            $this->MvcInstance->dieWithDebugMessageOr404(
                "Invalid model",
                ["message" => $error]);
    }

    /**
     * Fetches all objects in the database for the given model
     * @return array A result of objects
     */
    public function allObjects() {
        return $this->allObjectsWithQuery("");
    }

    /**
     * Fetches all objects in the database for the given model and query
     * @param $query string SQL query to append to the SELECT query
     * @return array An array of objects
     */
    public function allObjectsWithQuery($query) {
        // Fetch all objects
        $query = $this->MvcInstance->db_conn->query("SELECT * FROM {$this->tableName} $query");
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        // Add in the primary key value as an additional field
        for($obj_index = 0; $obj_index < count($results); $obj_index++)
            if(!in_array('pk', $results[$obj_index]))
                $results[$obj_index]['pk'] = $results[$obj_index][$this->tablePrimaryKeyField];

        // Return an array of objects
        return $results;
    }
}