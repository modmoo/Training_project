<?php
class LevelLookUp{
  const ADMINISTRATOR  = 1;
  const LEADER= 2;
  const EMPLOYEE = 3;
  const GUESTS = 4; // ในฐานข้อมูลห้ามเก็บด้วยเลขศูนย์

      // For CGridView, CListView Purposes
      public static function getLabel( $level ){
          if($level == self::ADMIN)
             return 'Administrator';
          return false;       
		  if($level == self::COMPANY)
             return 'EMPLOYEE';
          if($level == self::MEMBER)
             return 'STUDENT';
          return false;
          if($level == self::GUESTS)
             return 'GUESTS';
          return false;

      }
      // for dropdown lists purposes
      public static function getLevelList(){
          return array(
                 self::ADMIN=>'Administrator',
                 self::COMPANY=>'LEADER',
                 self::MEMBER=>'EMPLOYEE',
                 self::GUESTS=>'GUESTS');
    }
}