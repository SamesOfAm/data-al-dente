<?php

/**
 * Slider
 * Professional pictures galleries for the web and mobile devices.
 *
 * @author    Lionel Maccaud
 * @copyright Lionel Maccaud
 * @package   slider
 * @license   MIT (http://lionel-m.mit-license.org/)
 */

/**
 * Add palettes to tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['slider'] = '{type_legend},type,headline;{slider_legend},slider;{imagesFolder_legend},imagesFolder,sortBy,size;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

/**
 * Add fields to tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['slider'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['slider'],
    'exclude'                 => true,
    'flag'                    => 1,
    'inputType'               => 'select',
    'options_callback'        => array('tl_content_slider', 'getSliders'),
    'eval'                    => array('doNotCopy'=>true, 'chosen'=>true, 'mandatory'=>true, 'tl_class'=>'w50'),
    'sql'                     => "int(10) unsigned NOT NULL default '0'"
);

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

class tl_content_slider extends Backend
{
    /**
     * Import the back end user object
     */
    public function __construct()
    {
        parent::__construct();
        $this->import('BackendUser', 'User');
    }

    /**
     * Get all sliders and return them as array
     * @return array
     */
    public function getSliders()
    {
        /* if (!$this->User->isAdmin && !is_array($this->User->slider)) {
            return array();
        } */

        $arrSliders = array();
        $objSliders = $this->Database->execute("SELECT id, title FROM tl_slider ORDER BY title");

        while ($objSliders->next()) {
            if ($this->User->isAdmin || $this->User->hasAccess($objSliders->id, 'slider')) {
                $arrSliders[$objSliders->id] = $objSliders->title;
            }
        }
        return $arrSliders;
    }
}
