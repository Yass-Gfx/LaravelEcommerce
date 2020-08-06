<?php

use App\Models\Language;

/** Get All Active Languages */
function getLanguages()
{
  $languages = Language::Active()->Selection()->get();
  return $languages;
}

/** Get The Default App Language */
function getDefaultLang()
{
  return Config::get('app.locale');
}

/** Upload Images Function */
function uploadImage($folder, $image)
{
  $image->store('/', $folder);
  $filename = $image->hashName();
  $path = 'images/' . $folder . '/' . $filename;
  return $path;
}