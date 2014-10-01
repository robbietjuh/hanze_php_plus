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

    /**
     * Handle the picture being uploaded when adding or editing an Employee object
     * @return bool|string Returns false when failed, otherwise the filename of the picture
     */
    public function handlePictureUpload() {
        if(!isset($_FILES["Picture"])) return false;

        // Create a md5 hash of the filename to avoid file name collisions
        $extension = substr(strrchr($_FILES["Picture"]["name"], '.'), 1);
        $name = md5(time() . $_FILES["Picture"]["name"]) . "." . $extension;

        // Move the file to the appropriate directory
        move_uploaded_file($_FILES["Picture"]["tmp_name"], "pictures/$name");
        return $name;
    }

    /**
     * Create a new Employee
     * @param $data array Data to be used to create the object
     * @return bool Whether or not the query was successful
     */
    public function createObject($data) {
        // Try to save the picture uploaded
        if(!$picturePath = $this->handlePictureUpload())
            return false;

        $query = $this->MvcInstance->db_conn->prepare(
            "INSERT INTO {$this->tableName} " .
            "(Picture, FirstName, LastName, Email, PhoneNumber, HireDate, JobID, Salary, CommissionPCT, ManagerID, DepartmentID) VALUES " .
            "(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        return $query->execute([
            $picturePath,
            $data['FirstName'],
            $data['LastName'],
            $data['Email'],
            $data['PhoneNumber'],
            $data['HireDate'],
            $data['JobID'],
            $data['Salary'],
            $data['CommissionPCT'],
            $data['ManagerID'],
            $data['DepartmentID']]);
    }
}