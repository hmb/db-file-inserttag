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


class DbFileInserttag
{
  public function addTagnameRegexp($strRegexp, $varValue, Widget $objWidget)
  {
    if ($strRegexp == 'tagname')
    {
      if (!preg_match('/^[a-z][a-z_]*[a-z]$/', $varValue))
      {
        $objWidget->addError($GLOBALS['TL_LANG']['MSC']['tagnameError']);
      }

      return true;
    }

    return false;
  }


  public function replaceDbFileInserttag($strInsertTag)
  {
    $keyname = !empty($GLOBALS['TL_CONFIG']['dbFileInserttagName'])
      ? $GLOBALS['TL_CONFIG']['dbFileInserttagName']
      : 'x_db_file';

    $showerror = !empty($GLOBALS['TL_CONFIG']['dbFileInserttagShowError'])
      && $GLOBALS['TL_CONFIG']['dbFileInserttagShowError'];

    $arKeyVal = explode('::', $strInsertTag);

    if ($arKeyVal[0] !== $keyname)
    {
      return false;
    }

    if (!isset($arKeyVal[1]) || !is_numeric($arKeyVal[1]))
    {
      return $showerror? "### ID {$arKeyVal[1]} ungültig ###" : false;
    }

    $objFile = \FilesModel::findByPk($arKeyVal[1]);

    if (!$objFile->found)
    {
      return $showerror? "### ID {$arKeyVal[1]} nicht gefunden ###" : false;
    }

    if (!file_exists($objFile->path))
    {
      return $showerror? "### Datei {$objFile->path} nicht gefunden ###" : false;
    }

    return $objFile->path;
  }
}
