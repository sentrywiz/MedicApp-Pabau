<?php
session_start();

if($_SESSION["logged"] == true) { 

   class MyDB extends SQLite3 {
      function __construct() {
         $this->open('medicapp.db');
      }
   }
   $db = new MyDB();
   if(!$db) {
      echo $db->lastErrorMsg();
   } 

				$name = $_POST['name'];
				$email = $_POST['email'];
				$phone = $_POST['phone'];
				$address = $_POST['address'];
				$med_cond = $_POST['med_cond'];
				$blood_type = $_POST['blood_type'];

				        $sql = "INSERT INTO doctor_appointmentsbl (name, email, phone, address, med_condition, blood_type)";

				        $sql .= " VALUES ('$name', '$email', '$phone', '$address', '$med_cond', '$blood_type');";

				         $ret = $db->exec($sql);
				          if($ret)
				               {
				                header("Location: doctor_table.php");
				               }

				   $db->close();

} else {
            header("Location: logout.php");
}
?>