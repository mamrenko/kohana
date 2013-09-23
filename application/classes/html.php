<?php defined('SYSPATH') or die('No direct script access.');
class HTML extends Kohana_HTML{
   public static function message($content, $author, $timestamp)
{
    $formatted = '<div class= "message">';
    $formatted .= self::chars($content);
    $formatted .='<span class="author">' .  self::chars($author) .'</span>';
    $formatted .= 'span class= "published">' .Date::fuzzy_span($timestamp) . '</span>';
    $formatted .= '</div>';
    return $formatted;
}
    
  
}