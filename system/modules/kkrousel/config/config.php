<?php
/**
 * Back End Modules
 */

$GLOBALS['BE_MOD']['content']['kkrousel'] = array(
    'tables'      => array('tl_kkrousel'),
    'icon' => 'system/modules/slider/assets/images/icon.png',
);



/**
 * Front end modules
 */
$GLOBALS['FE_MOD']['kkrousel'] = array
(
    'kkrousel'     => 'ModuleKkrousel'
);


/**
 * Content Elements
 */
$GLOBALS['TL_CTE']['media']['kkrousel'] = 'KkrouselClass';