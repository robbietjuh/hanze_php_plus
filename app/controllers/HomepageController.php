<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * HomepageController.php
 * Hanzecontact
 *
 * Controller that will handle requests made to the homepage urldef
 *
 * @author     R. de Vries <r.devries@robbytu.net>
 * @version    1.0.0
 * @date       01/10/14
 * @copyright  2014 RobbytuProjects
 * @license    MIT License
 */

class HomepageController extends MvcBaseController {

    /**
     * Renders the hompage
     * @param $args Arguments passed on from the urldef
     */
    public function renderHomepage($args) {
        $this->renderView("base/header");
        $this->renderView("homepage");
        $this->renderView("base/footer");
    }

}