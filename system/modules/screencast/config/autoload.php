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
	'ModuleScreencastList' => 'system/modules/screencast/modules/ModuleScreencastList.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_screencast_list' => 'system/modules/screencast/templates',
));
