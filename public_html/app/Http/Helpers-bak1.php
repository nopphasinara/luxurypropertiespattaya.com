<?php

use Illuminate\Support\Facades\Storage;

function merge(Array $data, Array $options = []) {
  if ($options) $data = array_merge($data, $options);
  return $data;
}

function render(String $type = '', Array $options = []) {
  $data = [];
  
  $styles = [
    'm_0' => 'margin: 0',
    'p_0' => 'padding: 0',
    'va_top' => 'vertical-align: top',
    'va_bottom' => 'vertical-align: bottom',
    'va_middle' => 'vertical-align: middle',
    'font' => 'font-family: "Roboto", "Helvetica", "Arial", "sans-serif"',
    'text_normal' => 'font-size: 14px',
    'text_color' => 'color: #000',
  ];
  
  foreach ($styles as $key => $value) {
    $data['styles'][$key] = $value . ';';
  }
  
  $attrs = [
    's_0' => 'cellspacing="0"',
    'p_0' => 'cellpadding="0"',
    'center' => 'align="center"',
    'left' => 'align="left"',
    'right' => 'align="right"',
    'va_top' => 'valign="top"',
    'va_bottom' => 'valign="bottom"',
    'va_middle' => 'valign="middle"',
    'w_100' => 'width="100%"',
  ];
  
  foreach ($attrs as $key => $value) {
    $data['attrs'][$key] = $value;
  }
  
  return $data;
}

function e_styles(Array $keys, Array $options = []) {
  $data = [
    'font_family' => ['font-family', '\'Roboto\', \'Helvetica\', \'Arial\', \'sans-serif\''],
    'font_size' => ['font-size', '14px'],
    'text_normal' => ['color', '#000'],
    'o_hidden' => ['overflow', 'hidden'],
    'm_0' => ['margin', '0'],
    'p_0' => ['padding', '0'],
    'bg_footer' => ['background-color', '#E7A8A2'],
  ];
  
  $groups_data = [
    'body' => ['font_family', 'font_size', 'text_normal', 'm_0', 'p_0'],
    'td' => ['o_hidden'],
    'footer' => ['bg_footer'],
  ];
  
  $retval = [];
  
  if ($keys) {
    foreach ($keys as $index => $name) {
      if (isset($data[$name]) && $data[$name]) {
        if (is_array($data[$name]) && count($data[$name]) === 2) {
          $retval[$data[$name][0]] = $data[$name][1];
        }
      }
      
      if (isset($groups_data[$name]) && $groups_data[$name]) {
        foreach ($groups_data[$name] as $_index => $_name) {
          if (isset($data[$_name]) && $data[$_name]) {
            if (is_array($data[$_name]) && count($data[$_name]) === 2) {
              $retval[$data[$_name][0]] = $data[$_name][1];
            }
          }
        }
      }
    }
  }
  
  if ($options) {
    foreach ($options as $index => $value) {
      if ($value) {
        $retval[$index] = $value;
      } else {
        unset($retval[$index]);
      }
    }
  }
  
  $html = [];
  foreach ($retval as $index => $value) {
    $html[] = $index . ': '. $value .';';
  }
  
  return implode(' ', $html);
}

function e_attrs(Array $keys, Array $options = []) {
  $data = [
    'p_0' => ['cellpadding', '0'],
    's_0' => ['cellspacing', '0'],
    'b_0' => ['border', '0'],
    'w_100' => ['width', '100%'],
    'a_center' => ['align', 'center'],
    'v_top' => ['valign', 'top'],
    'v_middle' => ['valign', 'middle'],
    'v_bottom' => ['valign', 'bottom'],
    'a_center' => ['align', 'center'],
    'a_left' => ['align', 'left'],
    'a_right' => ['align', 'right'],
  ];
  
  $groups_data = [
    'table' => ['p_0', 's_0', 'b_0'],
    'table_100' => ['w_100', 'p_0', 's_0', 'b_0'],
    'td' => ['v_top', 's_0', 'p_0', 'b_0'],
    'td_100' => ['v_top', 'w_100', 's_0', 'p_0', 'b_0'],
    'center' => ['a_center'],
    'left' => ['a_left'],
    'right' => ['a_right'],
  ];
  
  $retval = [];
  
  if ($keys) {
    foreach ($keys as $index => $name) {
      if (isset($data[$name]) && $data[$name]) {
        if (is_array($data[$name]) && count($data[$name]) === 2) {
          $retval[$data[$name][0]] = $data[$name][1];
        }
      }
      
      if (isset($groups_data[$name]) && $groups_data[$name]) {
        foreach ($groups_data[$name] as $_index => $_name) {
          if (isset($data[$_name]) && $data[$_name]) {
            if (is_array($data[$_name]) && count($data[$_name]) === 2) {
              $retval[$data[$_name][0]] = $data[$_name][1];
            }
          }
        }
      }
    }
  }
  
  if ($options) {
    foreach ($options as $index => $value) {
      if ($value) {
        $retval[$index] = $value;
      } else {
        unset($retval[$index]);
      }
    }
  }
  
  $html = [];
  foreach ($retval as $index => $value) {
    $html[] = $index . '="'. $value .'"';
  }
  
  return implode(' ', $html);
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
