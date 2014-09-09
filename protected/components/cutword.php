<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cutword
 *
 * @author Qtdev
 */
class cutword  {
 public static function substr_utf8($str, $start_p , $len_p) {
  $str_post = "";
  if(strlen(self::conventype($str)) > $len_p){
   $str_post = "...";
  }
  return preg_replace( '#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$start_p.'}'. 
   '((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$len_p.'}).*#s', 
   '$1' , $str ) . $str_post;
 }
 public static function conventype($string) {
$str = $string;
   $res = "";
   for ($i = 0; $i < strlen($str); $i++) {
     if (ord($str[$i]) == 224) {
       $unicode = ord($str[$i+2]) & 0x3F;
       $unicode |= (ord($str[$i+1]) & 0x3F) << 6;
       $unicode |= (ord($str[$i]) & 0x0F) << 12;
       $res .= chr($unicode-0x0E00+0xA0);
       $i += 2;
     } else {
       $res .= $str[$i];
     }
   }
   return $res;
 }
}
