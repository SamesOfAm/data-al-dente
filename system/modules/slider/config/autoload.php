<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2019 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Modules
	'ModuleSlider' => 'system/modules/slider/modules/ModuleSlider.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_slider' => 'system/modules/slider/templates',
));
