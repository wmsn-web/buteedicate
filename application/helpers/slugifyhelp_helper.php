<?php 
if(!function_exists('slugify')) {
  function slugify($text_string, string $divider = '-')
  {
    // replace non letter or digits by divider
    $text = preg_replace('~[^\pL\d]+~u', $divider, $text_string);

    // transliterate
    $text = @iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, $divider);

    // remove duplicate divider
    $text = preg_replace('~-+~', $divider, $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
      //return 'n-a';
      return preg_replace('/\s+/u', '-', trim($text_string));
    }

    return $text;
  }
}
if(!function_exists('escape')) {
  function escape($string) { 
      if(!empty($string) && is_string($string)) { 
      $string = trim($string);
          $string = str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $string);

          return strip_tags($string);
      }else{
        return $string;
      }
  } 
}

if(!function_exists('back')) {
  function back() { 
      $backs = $_SERVER['HTTP_REFERER'];
      return $backs;
  } 
}
if(!function_exists("shufflex"))
{
  function shufflex()
  {
    $seed = str_split('abc123456789defghijk1234567890lmnopqrstuvwxyz'
                     .'ABC123456789DEFGHIJK1234567890LMNOPQRSTUVWXYZ'
                     ); // and any other characters
    shuffle($seed); // probably optional since array_is randomized; this may be redundant
    $rand = '';
    foreach (array_rand($seed, 35) as $k) $rand .= $seed[$k];
    return $rand;
  }
}

if(!function_exists("shufflex_str"))
{
  function shufflex_str($int)
  {
    $seed = str_split('abc123456789defghijk1234567890lmnopqr1234567890stuvwxyz'
                     .'ABC123456789DEFGHIJK1234567890LMNOPQR1234567890STUVWXYZ'
                     ); // and any other characters
    shuffle($seed); // probably optional since array_is randomized; this may be redundant
    $rand = '';
    foreach (array_rand($seed, $int) as $k) $rand .= $seed[$k];
    return $rand;
  }
}

if(!function_exists('unslugify')) {
  function unslugify($str)
  {
    $xpl = str_replace("-", " ", $str);
    $newStr = ucwords($xpl);
    return $newStr;
  }
}
if(!function_exists('make_under')) {
  function make_under($str)
  {
    $xpl = str_replace("-", "_", $str);
    $newStr = ucwords($xpl);
    return $newStr;
  }
}
if(!function_exists("set_status"))
{
  function set_status($status)
  {
    switch ($status)
    {
      case "pending":
      $data = "<span class='badge badge-warning'>".ucwords($status)."</span>";
      break;
      case "processing":
      $data = "<span class='badge badge-info'>".ucwords($status)."</span>";
      break;
      case "completed":
      $data = "<span class='badge badge-success'>".ucwords($status)."</span>";
      break;
      case "cancelled":
      $data = "<span class='badge badge-danger'>".ucwords($status)."</span>";
      break;
      default:
      $data = "";
    }

    return $data;
  }
}

if(!function_exists("tlv_months"))
{
  function tlv_months($date)
  {
    $months = array();
    $time = date_create($date);
    $currentMonth = (int)date_format($time, 'm');

    for ($x = $currentMonth; $x < $currentMonth + 12; $x++) {
        $months[] = date('Y-m-d', mktime(0, 0, 0, $x, 1));
    }

    return $months;
  }
}
if(!function_exists("full_durations"))
{
  function full_durations($intrvl,$duration)
  {
    if($intrvl == "D")
    {
      return $duration.' Days';
    }
    elseif($intrvl == "W")
    {
      return $duration.' Weeks';
    }
    elseif($intrvl == "M")
    {
      return $duration.' Months';
    }
    elseif($intrvl == "Y")
    {
      return $duration.' Years';
    }
    else
    {
      echo "";
    }
  }
}