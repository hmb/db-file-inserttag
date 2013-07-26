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


/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_settings']['dbFileInserttagName'] = array(
  'Name of the "db-file" insert tag',
  'The db-file insert will be used with the name given here. For Example "x-db-file" will result in {{x-db-file::id}}.'
);

$GLOBALS['TL_LANG']['tl_settings']['dbFileFlagPathurlencode'] = array(
  'Name of the "pathurlencode" inserttag flag',
  'The db-file inserttag can be urlencoded via this flag. E.g. {{x-db-file::id|x_pathurlencode}}'
);

$GLOBALS['TL_LANG']['tl_settings']['dbFileInserttagShowError'] = array(
  'Show "db-file" insert tag error',
  'Errors within the db-file insert tag, like a wrong ID will be shown.'
);
