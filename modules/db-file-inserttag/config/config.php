<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2013 Leo Feyer
 *
 * @package   DbFileInserttag
 * @author    Holger Böhnke
 * @license   LGPL
 * @copyright 2013 Holger Böhnke, Amarin
 */


$GLOBALS['TL_HOOKS']['addCustomRegexp'][]   = array('DbFileInserttag', 'addTagnameRegexp');
$GLOBALS['TL_HOOKS']['replaceInsertTags'][] = array('DbFileInserttag', 'replaceDbFileInserttag');
