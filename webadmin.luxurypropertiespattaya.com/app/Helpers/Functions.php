<?php

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

function crop_image($source, $target = '', $disk = 'uploads', $sizes = []) {
  $image = '';
  
  if (!$source) return;
  if (!$disk) $disk = 'uploads';
  if (!$sizes) $sizes = [400, 400];
  if (!$target) $target = '_thumbs/Images/' . $source;
  
  $file = $source;
  $disk = Storage::disk($disk);
  if ($disk->exists($target)) $file = $target;
  if ($file) $image = Image::make($disk->path($file));
  
  if ($image) {
    $height = $image->height();
    $width = $image->width();
    
    if ($height > $sizes[1] && $width > $sizes[0]) {
      $image->fit($sizes[0], $sizes[1], function ($file) {
        $file->aspectRatio();
        $file->upsize();
      })->save($disk->path($target));
    }
    
    return [
      'original' => $source,
      'target' => $target,
    ];
  }
  
  return;
}

function storage_exists($disk, $path) {
  if (!Storage::disk($disk)->exists($path)) return;
  
  return [
    'url' => Storage::disk($disk)->url($path),
    'size' => Storage::disk($disk)->size($path),
  ];
}

function attribute($name, $to_switch = false) {
  $data = (config($name)) ? json_decode(config($name), true) : [];

  if ($to_switch) {
    $data = [
      'on' => [
        'value' => '1',
        'text' => $data[1],
      ],
      'off' => [
        'value' => '0',
        'text' => $data[0],
      ],
    ];
  }

  return $data;
}
