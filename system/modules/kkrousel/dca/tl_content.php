<?php
$GLOBALS['TL_DCA']['tl_content']['palettes']['kkrousel'] = '{type_legend},type;{kkrousel_field_legend},kkrousel_field,imagesFolder;{protected_legend:hide},protected;{expert_legend:hide},guest,cssID,space;{invisible_legend:hide},invisible,start,stop';


$GLOBALS['TL_DCA']['tl_content']['fields']['imagesFolder'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['imagesFolder'],
    'exclude'                 => true,
    'inputType'               => 'fileTree',
    'eval'                    => array('multiple'=>true,
        'fieldType'=>'checkbox',
        'orderField'=>'orderSRC',
        'extensions'=>Config::get('validImageTypes'),
        'files'=>true,
        'isGallery'=>true
    ),
    'sql'                     => "blob NULL"
);
