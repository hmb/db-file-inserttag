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


  public function replaceInserttag($strTag)
  {
    // remove possible flags, this extension does not implement new flags
    // existing flags are handled by the core, so they are ignored here
    $flags = explode('|', $strTag);

    // split the tag into it's name and value
    $arKeyVal = explode('::', array_shift($flags));

    if ($arKeyVal[0] !== $GLOBALS['TL_CONFIG']['dbFileInserttagName'])
    {
      // not our tag
      return false;
    }

    $id = $arKeyVal[1];

    // WARNING: errors should only be displayed for debugging purposes
    $showerror = $GLOBALS['TL_CONFIG']['dbFileInserttagShowError'];

    if (!isset($id) || !is_numeric($id))
    {
      return $showerror? "### ".$GLOBALS['TL_LANG']['MSC']['dbFileInvalidId'].specialchars($id)." ###" : false;
    }

    $objFile = \FilesModel::findByPk($id);

    if (!$objFile->found)
    {
      return $showerror? "### ".$GLOBALS['TL_LANG']['MSC']['dbFileUnknownId'].specialchars($id)." ###" : false;
    }

    if (!file_exists($objFile->path))
    {
      return $showerror? "### ".$GLOBALS['TL_LANG']['MSC']['dbFileNotFound'].specialchars($objFile->path)." ###" : false;
    }

    $value = $objFile->path;

    foreach ($flags as $flag)
    {
      if ($flag === $GLOBALS['TL_CONFIG']['dbFileFlagPathurlencode'])
      {
        $value = $this->pathurlencode($value);
      }
    }

    return $value;
  }


  private function pathurlencode($path)
  {
    // split the filename at path boundaries
    $fileparts = explode('/', $path);

    // will contain the assembled the encoded filename
    $fileenc = '';

    // urlencode every part of the path by itself
    foreach ($fileparts as $part)
    {
      if ($fileenc != '')
      {
        $fileenc.='/';
      }

      $fileenc.= rawurlencode($part);
    }

    return $fileenc;
  }
}
