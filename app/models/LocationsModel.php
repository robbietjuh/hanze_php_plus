<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * LocationsModel.php
 * Hanzecontact
 *
 * This file contains the Locations model definition
 *
 * @author     R. de Vries <r.devries@robbytu.net>
 * @version    1.0.0
 * @date       01/10/14
 * @copyright  2014 RobbytuProjects
 * @license    MIT License
 */

class LocationsModel extends MvcBaseModel {
    /**
     * @var string Database table name for this model
     */
    protected $tableName = "locations";

    /**
     * @var string Database table primary key field name for this model
     */
    protected $tablePrimaryKeyField = "LocationID";

    /**
     * @var array Columns that need to be written to the screen. Used by the view.
     */
    public $tableColumns = [
        "Adres" => "StreetAddress",
        "Postcode" => "PostalCode",
        "Stad" => "City",
        "Provincie" => "StateProvince",
        "Land ID" => "CountryID"];

    /**
     * @var string Friendly name (plural) of the model. Used by the view.
     */
    public $friendlyNamePlural = "Locaties";

    /**
     * @var string Friendly name (single) of the model. Used by the view.
     */
    public $friendlyNameSingle = "Locatie";

    /**
     * Create a new Location
     * @param $data array Data to be used to create the object
     * @return bool Whether or not the query was successful
     */
    public function createObject($data) {
        $query = $this->MvcInstance->db_conn->prepare(
            "INSERT INTO {$this->tableName} " .
            "(StreetAddress, PostalCode, City, StateProvince, CountryID) VALUES " .
            "(?, ?, ?, ?, ?)");

        return $query->execute([
            $data['StreetAddress'],
            $data['PostalCode'],
            $data['City'],
            $data['StateProvince'],
            $data['CountryID']]);
    }

    /**
     * Update an existing Location
     * @param $pk int Primary key value of the object to be updated
     * @param $data array Data to be used to update the object
     * @return bool Whether or not the query was successful
     */
    public function updateObject($pk, $data) {
        $query = $this->MvcInstance->db_conn->prepare(
            "UPDATE {$this->tableName} " .
            "SET StreetAddress = ?, PostalCode = ?, City = ?, StateProvince = ?, CountryID = ? " .
            "WHERE {$this->tablePrimaryKeyField} = ?");

        return $query->execute([
            $data['StreetAddress'],
            $data['PostalCode'],
            $data['City'],
            $data['StateProvince'],
            $data['CountryID'],
            $pk]);
    }
}