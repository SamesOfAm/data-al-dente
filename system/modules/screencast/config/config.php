<?php

/**
 * Back End Modules
 */

$GLOBALS['BE_MOD']['content']['screencast'] = array(
    'tables'      => array('tl_screencast'),
    'icon' => 'system/modules/screencast/assets/images/icon.png',
);



/**
 * Front end modules
 */
$GLOBALS['FE_MOD']['screencast'] = array
(
    'screencast_list'     => 'ModuleScreencastList'
);
