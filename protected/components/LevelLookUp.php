<?php
class LevelLookUp{
  const ADMIN  = 1;
  const EMPLOYEE= 2;
  const STUDENT = 3;
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
                 self::COMPANY=>'EMPLOYEE',
                 self::MEMBER=>'STUDENT',
                 self::GUESTS=>'GUESTS');
    }
}