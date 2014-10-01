<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * object_list.php
 * Hanzecontact
 *
 * Lists the objects available in the given database
 *
 * @author     R. de Vries <r.devries@robbytu.net>
 * @version    1.0.0
 * @date       01/10/14
 * @copyright  2014 RobbytuProjects
 * @license    MIT License
 */
?>
        <h1><?=$this->data['title'];?></h1>
        <input type="button" onclick="window.location.href='<?=$this->data['addUrl'];?>';" value="<?=$this->data['singleObjectName'];?> toevoegen" />

        <br /><br />

        <table>
            <tr>
                <?php foreach($this->data['tableColumns'] as $friendly => $column) { echo "<th>$friendly</th>"; } ?>
                <th>Actie</th>
            </tr>

            <?php foreach($this->data['tableObjects'] as $object) { ?>
            <tr>
                <?php foreach($this->data['tableColumns'] as $friendly => $column) { echo "<td>" . $object[$column] . "</td>"; } ?>
                <td>
                    <a href="<?=sprintf($this->data['editUrl'], $object['pk']);?>">Bewerken</a> |
                    <a href="<?=sprintf($this->data['removeUrl'], $object['pk']);?>">Verwijderen</a>
                </td>
            </tr>
            <?php } ?>
        </table>

        <!-- // object_list -->