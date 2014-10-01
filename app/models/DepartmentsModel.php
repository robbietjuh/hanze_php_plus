<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * DepartmentsModel.php
 * Hanzecontact
 *
 * This file contains the Departments model definition
 *
 * @author     R. de Vries <r.devries@robbytu.net>
 * @version    1.0.0
 * @date       01/10/14
 * @copyright  2014 RobbytuProjects
 * @license    MIT License
 */

class DepartmentsModel extends MvcBaseModel {
    /**
     * @var string Database table name for this model
     */
    protected $tableName = "departments";

    /**
     * @var string Database table primary key field name for this model
     */
    protected $tablePrimaryKeyField = "DepartmentID";

    /**
     * @var array Columns that need to be written to the screen. Used by the view.
     */
    public $tableColumns = [
        'Naam' => 'DepartmentName',
        'Manager ID' => 'ManagerID',
        'Locatie ID' => 'LocationID'];

    /**
     * @var string Friendly name (plural) of the model. Used by the view.
     */
    public $friendlyNamePlural = "Afdelingen";

    /**
     * @var string Friendly name (single) of the model. Used by the view.
     */
    public $friendlyNameSingle = "Afdeling";
}