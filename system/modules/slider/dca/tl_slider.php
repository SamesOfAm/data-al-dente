<?php

/*
 * This file is part of Contao.
 *
 * (c) Leo Feyer
 *
 * @license LGPL-3.0-or-later
 */


/**
 * Table tl_slider
 */
$GLOBALS['TL_DCA']['tl_slider'] = array
(

    // Config
    'config' => array
    (
        'dataContainer'               => 'Table',
        'enableVersioning'            => true,
        'sql' => array
        (
            'keys' => array
            (
                'id' => 'primary'
            )
        )
    ),

    // List
    'list' => array
    (
        'sorting' => array
        (
            'mode'                    => 2,
            'fields'                  => array('title'),
            'flag'                    => 1,
            'panelLayout'             => 'filter;sort,search,limit'
        ),
        'label' => array
        (
            'fields'                  => array('title'),
            'format'                  => '%s',
        ),
        'global_operations' => array
        (
            'all' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href'                => 'act=select',
                'class'               => 'header_edit_all',
                'attributes'          => 'onclick="Backend.getScrollOffset()" accesskey="e"'
            )
        ),
        'operations' => array
        (
            'edit' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_slider']['edit'],
                'href'                => 'act=edit',
                'icon'                => 'edit.gif'
            ),
            'delete' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_slider']['delete'],
                'href'                => 'act=delete',
                'icon'                => 'delete.gif',
                'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
            ),
            'show' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_slider']['show'],
                'href'                => 'act=show',
                'icon'                => 'show.gif',
                'attributes'          => 'style="margin-right:3px"'
            ),
        )
    ),

    // Palettes
    'palettes' => array
    (
        'default'                     => '{title_legend},title;{slider_legend},url;{function_legend},direction,icons,icons_clickable;{icons_style_legend},icons_shape,icons_border,icons_border_thickness'
    ),

    // Fields
    'fields' => array
    (
        'id' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL auto_increment"
        ),
        'tstamp' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL default '0'"
        ),
        'title' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_slider']['title'],
            'inputType'               => 'text',
            'exclude'                 => true,
            'sorting'                 => true,
            'flag'                    => 1,
            'search'                  => true,
            'eval'                    => array(
                'mandatory'=>true,
                'unique'=>true,
                'maxlength'=>255,
                'tl_class'=>'w50'
            ),
            'sql'                     => "varchar(255) NOT NULL default ''"
        ),
        'url' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_slider']['url'],
            'inputType'               => 'text',
            'exclude'                 => true,
            'sql'                     => "text NULL"
        ),
        'direction' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_slider']['direction'],
            'inputType'               => 'select',
            'options'                 => array('hoch', 'runter', 'links', 'rechts'),
            'exclude'                 => true,
            'sql'                     => "varchar(255) NOT NULL"
        ),
        'icons' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_slider']['icons'],
            'inputType'               => 'checkbox',
            'eval'                    => array('doNotCopy'=>true, 'tl_class'=>'w50 m12'),
            'sql'                     => "char(1) NOT NULL",
            'exclude'                 => true
        ),
        'icons_clickable' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_slider']['icons_clickable'],
            'inputType'               => 'checkbox',
            'eval'                    => array('doNotCopy'=>true, 'tl_class'=>'w50 m12'),
            'sql'                     => "char(1) NOT NULL",
            'exclude'                 => true
        ),
        'icons_shape' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_slider']['icons_shape'],
            'inputType'               => 'select',
            'options'                 => array('Kreis', 'Viereck'),
            'eval'                    => array('doNotCopy'=>true, 'tl_class'=>'w50 m12'),
            'sql'                     => "varchar(255) NOT NULL",
            'exclude'                 => true
        ),
        'icons_border' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_slider']['icons_border'],
            'inputType'               => 'checkbox',
            'eval'                    => array('doNotCopy'=>true, 'tl_class'=>'w50 m12'),
            'sql'                     => "char(1) NOT NULL",
            'exclude'                 => true
        ),
        'icons_border_thickness' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_slider']['icons_border_thickness'],
            'inputType'               => 'text',
            'eval'                    => array('doNotCopy'=>true, 'tl_class'=>'w50 m12'),
            'sql'                     => "varchar(255) NOT NULL default ''",
            'exclude'                 => true
        )
    )
);
