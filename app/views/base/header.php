<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * header.php
 * Hanzecontact
 *
 * Base template -- header view
 *
 * @author     R. de Vries <r.devries@robbytu.net>
 * @version    1.0.0
 * @date       01/10/14
 * @copyright  2014 RobbytuProjects
 * @license    MIT License
 */
?>
<!doctype html>
<html>
<head>
    <title><?=$this->data['title'];?> - Hanzecontact</title>

    <link type="text/css" rel="stylesheet" href="<?=$this->MvcInstance->appBaseUrl;?>/css/style.css" />
</head>
<body>
    <div id="wrapper">
        <div id="navigation">
            <div class="button"><img src="https://www.hanze.nl/Style%20Library/Hanze/Images/logo_hanze.png" alt="Logo" class="logo" /></div>

            <div class="button"><a href="<?=$this->MvcInstance->appBaseUrl;?>/">Home</a></div>
            <div class="button"><a href="<?=$this->MvcInstance->appBaseUrl;?>/departments/list">Afdelingen</a></div>
            <div class="button"><a href="<?=$this->MvcInstance->appBaseUrl;?>/employees/list">Medewerkers</a></div>
            <div class="button"><a href="<?=$this->MvcInstance->appBaseUrl;?>/jobs/list">Banen</a></div>
            <div class="button"><a href="<?=$this->MvcInstance->appBaseUrl;?>/locations/list">Locaties</a></div>
        </div>

        <br clear="all" />
        <!-- // base / header -->
