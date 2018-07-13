<?php

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

function clean_description($text = '') {
  if ($text) $text = html_entity_decode(htmlspecialchars_decode(strip_tags($text)));
  
  $text = str_replace([
    '&nbsp;',
    '&raquo;',
    '&rsquo;',
    '&laquo;',
    '&lsquo;',
    "&#39;",
    "&quot;",
  ], [
    ' ',
    '>>',
    '>',
    '<<',
    '<',
    '\'',
    "&quot;",
  ], $text);
  
  return $text;
}

function get_facebook_page($url = '') {
  if ($url) return trim(preg_replace(["/(https|http)\:\/\/(www\.)?facebook\.com/i"], [""], config('custom.facebook')), '/');
  return;
}

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

function get_pagenames() {
  $segments = request()->segments();
  if (isset($segments[0]) && $segments[0]) {
    $pagename = $segments[0];
  } else {
    $pagename = 'homepage';
  }
  
  $pages = [
    'homepage'             => '',
    'for-sale'             => '',
    'for-rent'             => '',
    'business-directory'   => '',
    'news-and-information' => '',
    'about-us'             => '',
    'contact-us'           => '',
  ];
  
  $pages[$pagename] = 'active';
  
  return [
    'pagename' => $pagename,
    'pages' => $pages,
  ];
}

function data($type) {
  $type = strtolower((string) $type);
  
  $data = [];
  $groups = [];
  $custom = [];
  
  if ($type == 'style') {
    $data = get_default('styles');
    $groups = (isset($data['groups'])) ? $data['groups'] : [];
    $custom = (isset($data['custom'])) ? $data['custom'] : [];
    unset($data['groups'], $data['custom']);
    
    $data = merge($data, unit_size(['px'], 'border', 'b_', [
      'units' => [
        'px' => ['', ''],
      ],
      'sizes' => [
        '0' => 'none',
      ],
    ]));
    $data = merge($data, unit_size(['px'], 'border-radius', 'r_'));
    $data = merge($data, unit_size(['%', 'px'], 'width', 'w_'));
    $data = merge($data, unit_size(['%', 'px'], 'height', 'h_'));
    $data = merge($data, unit_size(['px'], 'margin', 'm_', [
      'units' => [
        'px' => ['', 'px'],
      ],
    ]));
    $data = merge($data, unit_size(['px'], 'padding', 'p_', [
      'units' => [
        'px' => ['', 'px'],
      ],
    ]));
    
    $groups = merge($groups, []);
    $custom = merge($custom, []);
  }
  
  if ($type == 'attr') {
    $data = get_default('attrs');
    $groups = (isset($data['groups'])) ? $data['groups'] : [];
    $custom = (isset($data['custom'])) ? $data['custom'] : [];
    unset($data['groups'], $data['custom']);
    
    $border_options['units'] = [
      'p' => ['', ''],
    ];
    $cell_options['units'] = [
      'p' => ['', ''],
    ];
    $size_options['units'] = [
      'px' => ['px', ''],
    ];
    $data = merge($data, unit_size(['p'], 'border', 'b_', $border_options));
    $data = merge($data, unit_size(['p'], 'cellpadding', 'p_', $cell_options));
    $data = merge($data, unit_size(['p'], 'cellspacing', 's_', $cell_options));
    $data = merge($data, unit_size(['p', 'px'], 'width', 'w_', $size_options));
    $data = merge($data, unit_size(['p', 'px'], 'height', 'h_', $size_options));
    
    $groups = merge($groups, []);
    $custom = merge($custom, []);
  }
  
  return [
    'data' => $data,
    'groups' => $groups,
    'custom' => $custom,
  ];
}

function get_default($default_key = '') {
  $default = [
    'styles' => [
      'top' => ['vertical-align', 'top'],
      'bottom' => ['vertical-align', 'bottom'],
      'middle' => ['vertical-align', 'middle'],
      'center' => ['text-align', 'center'],
      'left' => ['text-align', 'left'],
      'right' => ['text-align', 'right'],
      'o_hidden' => ['overflow', 'hidden'],
      'link' => ['text-decoration', 'none'],
      'u' => ['text-decoration', 'underline'],
    ],
    'attrs' => [
      'top' => ['valign', 'top'],
      'bottom' => ['valign', 'bottom'],
      'middle' => ['valign', 'middle'],
      'center' => ['align', 'center'],
      'left' => ['align', 'left'],
      'right' => ['align', 'right'],
    ],
  ];
  
  $default['styles']['groups'] = [
    'body' => ['font_base', 'size_base', 'color_base', 'bg_base', 'm_0', 'p_0'],
    'tb' => ['m_0', 'p_0', 'b_0', 'o_hidden', 'top'],
    'tb_content' => ['m_0', 'p_0', 'b_0', 'o_hidden', 'top', 'rounded_sm'],
    'td' => ['m_0', 'p_0', 'b_0', 'o_hidden', 'top'],
    'td_gutter' => ['m_0', 'p_0', 'b_0', 'o_hidden', 'top'],
    'tb_footer' => ['m_0', 'p_0', 'b_0', 'o_hidden', 'top'],
    'tb_header' => ['m_0', 'p_0', 'b_0', 'o_hidden', 'top'],
    'hr' => ['m_0', 'p_0', 'b_0', 'o_hidden', 'middle'],
    'link' => ['link'],
    'link_u' => ['link', 'u'],
    'logo' => [],
    'img' => ['b_0', 'm_0', 'p_0'],
    'p' => ['w_100', 'b_0', 'm_0', 'p_0'],
    'btn' => ['bg_secondary', 'text_dark'],
  ];
  $default['styles']['custom'] = [
    'btn' => [
      'padding' => '1.2em 1.2em',
    ],
    'p' => [
      'margin-bottom' => '1.2em',
    ],
    'p_mb_0' => [
      'margin-bottom' => '.6em',
    ],
    'logo' => [],
    'img' => [],
    'link' => [
      'color' => '#000',
    ],
    'link_white' => [
      'color' => '#fff',
    ],
    'link_primary' => [
      'color' => '#DF0C1C',
    ],
    'link_secondary' => [
      'color' => '#EDEDED',
    ],
    'tb_footer' => [
      'font-size' => '12px',
    ],
    'tb_header' => [
      // 'color' => 'white',
      // 'background-color' => 'red',
    ],
    'hr' => [
      'border-top' => 'solid 1px #cdcdcd',
      'margin' => '14px auto',
    ],
    'hr_0' => [
      'border-top' => 'solid 1px #cdcdcd',
      'margin' => '0 auto',
    ],
  ];
  
  $default['attrs']['groups'] = [
    'body' => ['w_100'],
    'tb' => ['s_0', 'p_0', 'b_0'],
    'tb_100' => ['w_100', 's_0', 'p_0', 'b_0'],
    'tb_content' => ['s_0', 'p_0', 'b_0'],
    'td' => ['s_0', 'p_0', 'b_0'],
    'td_100' => ['w_100', 's_0', 'p_0', 'b_0'],
    'td_content' => ['s_0', 'p_0', 'b_0'],
    'td_gutter' => ['s_0', 'p_0', 'b_0'],
    'tb_header' => ['w_100', 's_0', 'p_0', 'b_0'],
    'tb_footer' => ['w_100', 's_0', 'p_0', 'b_0'],
    'hr' => ['b_0'],
    'img' => ['b_0'],
    'p' => ['s_0', 'p_0', 'b_0'],
  ];
  $default['attrs']['custom'] = [
    'logo' => [
      'width' => '320',
      'height' => 'auto',
    ],
    'img' => [
      'width' => '100%',
      'height' => 'auto',
    ],
    'td_gutter' => [
      'width' => '60',
    ],
    'tb_content' => [
      'width' => '640',
    ],
  ];
  
  $colors = [
    'primary' => '#DF0C1C',
    'secondary' => '#EDEDED',
    'base' => '#eeeeee',
    'white' => '#ffffff',
    'black' => '#000000',
    'dark' => '#222222',
    'light' => '#cbcbcb',
  ];
  foreach ($colors as $index => $color) {
    $default = merge($default, [
      'styles' => [
        'text_' . $index => ['color', $color],
        'bg_' . $index => ['background-color', $color],
      ],
      'attrs' => [
        'text_' . $index => ['color', $color],
        'bg_' . $index => ['bgcolor', $color],
      ],
    ]);
  }
  
  $default = merge($default, [
    'styles' => [
      'font_base' => ['font-family', '\'Roboto\', \'Helvetica\', \'Arial\', \'sans-serif\''],
      'size_base' => ['font-size', '14px'],
      'color_base' => ['color', $colors['black']],
      'bg_base' => ['background-color', $colors['base']],
    ],
  ]);
  
  $grids = ['xs', 'sm', 'md', 'lg', 'xl'];
  $font_sizes = ['.85', '1.05', '1.25', '1.45', '1.85'];
  $grids_size = ['.25', '.5', '1', '1.75', '2.25'];
  $roundeds_size = ['.14', '.25', '.5', '.875', '1'];
  
  foreach ($grids as $index => $grid) {
    $default = merge($default, [
      'styles' => [
        'custom' => [
          'rounded_'. $grid .'' => [
            '-webkit-border-radius' => ''. $roundeds_size[$index] .'em',
            '-moz-border-radius' => ''. $roundeds_size[$index] .'em',
            'border-radius' => ''. $roundeds_size[$index] .'em',
          ],
          'm_'. $grid .'' => [ 'margin' => ''. $grids_size[$index] .'em' ],
          'p_'. $grid .'' => [ 'padding' => ''. $grids_size[$index] .'em' ],
          'mt_'. $grid .'' => [ 'margin-top' => ''. $grids_size[$index] .'em' ],
          'mb_'. $grid .'' => [ 'margin-bottom' => ''. $grids_size[$index] .'em' ],
          'ml_'. $grid .'' => [ 'margin-left' => ''. $grids_size[$index] .'em' ],
          'mr_'. $grid .'' => [ 'margin-right' => ''. $grids_size[$index] .'em' ],
          'pt_'. $grid .'' => [ 'padding-top' => ''. $grids_size[$index] .'em' ],
          'pb_'. $grid .'' => [ 'padding-bottom' => ''. $grids_size[$index] .'em' ],
          'pl_'. $grid .'' => [ 'padding-left' => ''. $grids_size[$index] .'em' ],
          'pr_'. $grid .'' => [ 'padding-right' => ''. $grids_size[$index] .'em' ],
          'text_'. $grid .'' => [ 'font-size' => ''. $font_sizes[$index] .'em' ],
        ],
      ],
    ]);
  }
  
  if (!$default_key) return $default;
  return $default[$default_key];
}

function unit_size($keys, $prop, $prefix = '', $options = []) {
  $retval = [];
  
  $options = merge([
    'units' => [
      'p' => [
        '', '%',
      ],
      'px' => [
        'px', 'px',
      ],
      'em' => [
        'em', 'em',
      ],
      'rem' => [
        'rem', 'rem',
      ],
    ],
    'sizes' => [
      0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10,
    ],
    'times' => 10,
  ], $options);
  
  for ($i = 0; $i <= 10; $i++) {
    $index_name = $i * $options['times'];
    
    if (is_numeric($options['sizes'][$i]) === true) {
      $value = $options['sizes'][$i] * $options['times'];
    } else {
      $value = $options['sizes'][$i];
    }
    
    foreach ($keys as $index => $unit_key) {
      if ($unit_key == '%') $unit_key = 'p';
      $unit_key = strtolower($unit_key);
    
      if (isset($options['units'][$unit_key])) {
        $unit = $options['units'][$unit_key];
        $retval[$prefix . $index_name . $unit[0]] = [$prop, $value . $unit[1]];
      }
    }
  }
  
  return $retval;
}

function attrs($attrs = [], $styles = []) {
  $attrs = (array) $attrs;
  $styles = (array) $styles;
  $html = '';
  
  if ($attrs) {
    $attr_options = [];
    if (isset($attrs['options'])) {
      $attr_options = $attrs['options'];
      unset($attrs['options']);
    }
    
    $html .= set_attrs($attrs, $attr_options);
  }
  
  if ($styles) {
    $style_options = [];
    if (isset($styles['options'])) {
      $style_options = $styles['options'];
      unset($styles['options']);
    }
    
    $html .= ' style="'. set_styles($styles, $style_options) .'"';
  }
  
  return $html;
}

function set_styles($keys, $options = []) {
  $keys = (array) $keys;
  $options = (array) $options;
  $data = data('style');
  $retval = collection($data, $keys, $options);
  
  foreach ($retval as $index => $value) {
    $retval[$index] = $value[0] . ': '. $value[1] .';';
  }
  
  return implode(' ', $retval);
}

function set_attrs($keys, $options = []) {
  $keys = (array) $keys;
  $options = (array) $options;
  $data = data('attr');
  $retval = collection($data, $keys, $options);
  
  foreach ($retval as $index => $value) {
    $retval[$index] = $value[0] . '="'. $value[1] .'"';
  }
  
  return implode(' ', $retval);
}

function merge($data, $options = []) {
  $data = (array) $data;
  $options = (array) $options;
  if ($options) {
    foreach ($options as $index => $option) {
      if (!isset($data[$index])) $data[$index] = [];
      
      if (is_array($option)) {
        $data[$index] = merge($data[$index], $option);
      } else {
        $data[$index] = $option;
      }
    }
  }
  return $data;
}

function collection($data, $keys = [], $options = []) {
  $data = (array) $data;
  $keys = (array) $keys;
  $options = (array) $options;
  $groups = $data['groups'];
  $custom = $data['custom'];
  $data = $data['data'];
  $retval = [];
  
  foreach ($keys as $index => $name) {
    if (isset($custom[$name])) {
      $options = merge($options, $custom[$name]);
    }
    
    if (isset($groups[$name])) {
      foreach ($groups[$name] as $_index => $_name) {
        $value = get_data($data, $_name);
        if ($value && is_array($value)) {
          $key_name = snake_case(studly_case($value[0]));
          $retval[$key_name] = [$value[0], $value[1]];
        }
      }
    } else {
      $value = get_data($data, $name);
      if ($value && is_array($value)) {
        $key_name = snake_case(studly_case($value[0]));
        $retval[$key_name] = [$value[0], $value[1]];
      }
    }
  }
  
  if ($options) {
    foreach ($options as $index => $value) {
      $key_name = snake_case(studly_case($index));
      if ($value) {
        $retval[$key_name] = [$index, $value];
      } else {
        if (isset($retval[$key_name])) unset($retval[$key_name]);
      }
    }
  }
  
  return $retval;
}

function get_data($data, $name) {
  $data = (array) $data;
  $name = (string) $name;
  
  if (isset($data[$name])) return $data[$name];
  
  return;
}

function request_query($return = '', $args = []) {
  $currentPath = '/' . request()->path();
  $query = request()->query();
  $query = array_merge($query, $args);
  $build_query = [];
  foreach ($query as $index => $value) {
    $build_query[] = $index . '=' . $value;
  }
  $build_query = implode('&', $build_query);
  if ($build_query) $build_query = '?' . $build_query;
  
  $result = [
    'currentPath' => $currentPath,
    'query' => $query,
    'build_query' => $build_query,
    'url' => $currentPath . $build_query,
  ];
  
  if ($return) return $result[''. $return .''];
  return $result;
}

function placeholder() {
  return asset('img/placeholder.png');
}

function storage_exists($disk, $path) {
  if (!Storage::disk($disk)->exists($path)) return;
  
  return [
    'url' => Storage::disk($disk)->url($path),
    'size' => Storage::disk($disk)->size($path),
  ];
}

function site($key = '') {
    if ($key) $key = '.'. $key;
    return config('site' . $key);
}

function cdn($key = '') {
    if ($key) $key = '.'. $key;
    return site('cdn' . $key);
}

function wix($uri = '') {
    return config('site.cdn.wix') . $uri;
}

function unsplash($uri = '', $option = 'auto=format&fit=crop&w=1400&q=80') {
    return config('site.cdn.unsplash') . $uri .'&'. $option;
}

function site_email($key = '') {
    if ($key) $key = '.'. $key;
    return site('emails' . $key);
}

function _url($uri = '/') {
  return url($uri);
  // $request = request();
  // return str_ireplace($request->root(), '', $request->getUriForPath('/demo/' . ltrim($uri, '/')));
}
