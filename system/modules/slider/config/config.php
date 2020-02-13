<?php

/**
 * Back End Modules
 */

$GLOBALS['BE_MOD']['content']['slider'] = array(
    'tables'      => array('tl_slider'),
    'icon' => 'system/modules/slider/assets/images/icon.png',
);



/**
 * Front end modules
 */
$GLOBALS['FE_MOD']['slider'] = array
(
    'slider'     => 'ModuleSlider'
);


/**
 * Content Elements
 */
$GLOBALS['TL_CTE']['media']['slider'] = "slider";