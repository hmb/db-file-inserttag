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
  'Nom du "db-file" insert tag',
  'Le db-file insert tag sera utilisé par le nom renseigné ici. "x-db-file" par example va resulter en {{x-db-file}}.'
);

$GLOBALS['TL_LANG']['tl_settings']['dbFileFlagPathurlencode'] = array(
  'Le nom du "pathurlencode" inserttag flag',
  'Le db-file inserttag peut être urlencoded avec ce flag. P.e. {{x-db-file::id|x_pathurlencode}}'
);

$GLOBALS['TL_LANG']['tl_settings']['dbFileInserttagShowError'] = array(
  'Montre faults en "db-file" insert tag',
  'Les faults en "db-file" insert tag, comme un ID unconnu sont affiché.'
);
