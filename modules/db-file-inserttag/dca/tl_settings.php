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


// palettes
$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] = str_replace
(
  ',bypassCache',
  ',bypassCache,dbFileInserttagName,dbFileFlagPathurlencode,dbFileInserttagShowError',
  $GLOBALS['TL_DCA']['tl_settings']['palettes']['default']
);


// fields
$GLOBALS['TL_DCA']['tl_settings']['fields']['dbFileInserttagName'] = array
(
  'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['dbFileInserttagName'],
  'inputType'               => 'text',
  'eval'                    => array('mandatory'=>true, 'nospace'=>true, 'rgxp' => 'tagname', 'tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['dbFileFlagPathurlencode'] = array
(
  'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['dbFileFlagPathurlencode'],
  'inputType'               => 'text',
  'eval'                    => array('mandatory'=>true, 'nospace'=>true, 'rgxp' => 'tagname', 'tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['dbFileInserttagShowError'] = array
(
  'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['dbFileInserttagShowError'],
  'inputType'               => 'checkbox',
  'eval'                    => array('tl_class'=>'w50')
);
