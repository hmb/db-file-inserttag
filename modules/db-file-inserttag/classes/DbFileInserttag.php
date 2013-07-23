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
      if (!preg_match('/^[a-z]+(_[a-z]+)*$/', $varValue))
      {
        $objWidget->addError($GLOBALS['TL_LANG']['MSC']['dbFileTagnameError']);
      }

      return true;
    }

    return false;
  }


  public function replaceDbFileInserttag($strInsertTag)
  {
    // remove possible flags, this extension does not implement new flags
    // existing flags are handled by the core, so they are jsut ignored here
    $flags = explode('|', $strInsertTag);
    $arKeyVal = explode('::', $flags[0]);

    if ($arKeyVal[0] !== $GLOBALS['TL_CONFIG']['dbFileInserttagName'])
    {
      return false;
    }

    $showerror = $GLOBALS['TL_CONFIG']['dbFileInserttagShowError'];

    if (!isset($arKeyVal[1]) || !is_numeric($arKeyVal[1]))
    {
      return $showerror? "### ".$GLOBALS['TL_LANG']['MSC']['dbFileInvalidId'].$arKeyVal[1]." ###" : false;
    }

    $objFile = \FilesModel::findByPk($arKeyVal[1]);

    if (!$objFile->found)
    {
      return $showerror? "### ".$GLOBALS['TL_LANG']['MSC']['dbFileUnknownId'].$arKeyVal[1]." ###" : false;
    }

    if (!file_exists($objFile->path))
    {
      return $showerror? "### ".$GLOBALS['TL_LANG']['MSC']['dbFileNotFound'].$objFile->path." ###" : false;
    }

    return $objFile->path;
  }
}
