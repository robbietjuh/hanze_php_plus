<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * EmployeesModel.php
 * Hanzecontact
 *
 * This file contains the Employees model definition
 *
 * @author     R. de Vries <r.devries@robbytu.net>
 * @version    1.0.0
 * @date       01/10/14
 * @copyright  2014 RobbytuProjects
 * @license    MIT License
 */

class EmployeesModel extends MvcBaseModel {
    /**
     * @var string Database table name for this model
     */
    protected $tableName = "employees";

    /**
     * @var string Database table primary key field name for this model
     */
    protected $tablePrimaryKeyField = "EmployeeID";

    /**
     * @var array Columns that need to be written to the screen. Used by the view.
     */
    public $tableColumns = [
        "Pasfoto" => "Picture",
        "Voornaam" => "FirstName",
        "Achternaam" => "LastName",
        "Email" => "Email",
        "Telefoonnummer" => "PhoneNumber",
        "Aangenomen op" => "HireDate",
        "Baan ID" => "JobID",
        "Salaris" => "Salary",
        "CommissionPCT" => "CommissionPCT",
        "Manager ID" => "ManagerID",
        "Department ID" => "DepartmentID"];

    /**
     * @var string Friendly name (plural) of the model. Used by the view.
     */
    public $friendlyNamePlural = "Medewerkers";

    /**
     * @var string Friendly name (single) of the model. Used by the view.
     */
    public $friendlyNameSingle = "Medewerker";
}