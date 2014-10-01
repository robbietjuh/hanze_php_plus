<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * object_form.php
 * Hanzecontact
 *
 * Prints a form to create or edit objects
 *
 * @author     R. de Vries <r.devries@robbytu.net>
 * @version    1.0.0
 * @date       01/10/14
 * @copyright  2014 RobbytuProjects
 * @license    MIT License
 */
?>
        <h1><?=$this->data['title'];?></h1>

        <?=(isset($this->data['error'])) ? "<strong>{$this->data['error']}</strong>" : "";?>

        <form method="post" action="<?=$this->data['submitUrl'];?>" enctype="multipart/form-data">
            <table>
                <?php foreach($this->data['form'] as $friendly => $formInput) { ?>
                <tr>
                    <td><?=$friendly;?></td>
                    <td><?=$formInput;?></td>
                </tr>
                <?php } ?>

                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" value="Opslaan" /></td>
                </tr>
            </table>
        </form>

        <!-- // object_form -->