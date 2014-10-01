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
}