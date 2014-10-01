<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * JobsModel.php
 * Hanzecontact
 *
 * This file contains the Jobs model definition
 *
 * @author     R. de Vries <r.devries@robbytu.net>
 * @version    1.0.0
 * @date       01/10/14
 * @copyright  2014 RobbytuProjects
 * @license    MIT License
 */

class JobsModel extends MvcBaseModel {
    /**
     * @var string Database table name for this model
     */
    protected $tableName = "jobs";

    /**
     * @var string Database table primary key field name for this model
     */
    protected $tablePrimaryKeyField = "JobID";

    /**
     * @var array Columns that need to be written to the screen. Used by the view.
     */
    public $tableColumns = [
        "Titel" => "JobTitle",
        "Minimumloon" => "MinSalary",
        "Maximumloon" => "MaxSalary"];

    /**
     * @var string Friendly name (plural) of the model. Used by the view.
     */
    public $friendlyNamePlural = "Banen";

    /**
     * @var string Friendly name (single) of the model. Used by the view.
     */
    public $friendlyNameSingle = "Baan";

    /**
     * Create a new Job
     * @param $data array Data to be used to create the object
     * @return bool Whether or not the query was successful
     */
    public function createObject($data) {
        $query = $this->MvcInstance->db_conn->prepare(
            "INSERT INTO {$this->tableName} " .
            "(JobTitle, MinSalary, MaxSalary) VALUES " .
            "(?, ?, ?)");

        return $query->execute([
            $data['JobTitle'],
            $data['MinSalary'],
            $data['MaxSalary']]);
    }

    /**
     * Update an existing Job
     * @param $pk int Primary key value of the object to be updated
     * @param $data array Data to be used to update the object
     * @return bool Whether or not the query was successful
     */
    public function updateObject($pk, $data) {
        $query = $this->MvcInstance->db_conn->prepare(
            "UPDATE {$this->tableName} " .
            "SET JobTitle = ?, MinSalary = ?, MaxSalary = ? " .
            "WHERE {$this->tablePrimaryKeyField} = ?");

        return $query->execute([
            $data['JobTitle'],
            $data['MinSalary'],
            $data['MaxSalary'],
            $pk]);
    }
}