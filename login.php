<?php
session_start();

if(!empty($_POST['username'])) { $username = $_POST['username']; }
if(!empty($_POST['password'])) { $password = $_POST['password']; }



class MyDB extends SQLite3 {

      function __construct() {

         $this->open('medicapp.db');

      }

   }

   $db = new MyDB();

   if(!$db) {

      echo $db->lastErrorMsg();

   } 

$sql = "SELECT * FROM login_main"; 
     $ret = $db->query($sql);
          while($row = $ret->fetchArray(SQLITE3_ASSOC) ) { 
               $row_pword = $row['password'];
               $row_usern = $row['username'];
          }


$db->close();

                                   if($row_pword == $password && $row_usern == $username){
                                    $_SESSION["logged"] = true;
                                    header("Location: doctor_table.php");
                                             } else {
                                                 header("Location: logout.php"); 
                                             } 


?>