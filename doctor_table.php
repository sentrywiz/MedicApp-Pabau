<?php
session_start();

if($_SESSION["logged"] == true) { 

     ?>

<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MedicApp - Doctor Table</title>

<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

<script src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css">
  <!-- Custom styles for this template -->



</head>
<body>
<?php

   class MyDB extends SQLite3 {

      function __construct() {

         $this->open('medicapp.db');

      }

   }

   $db = new MyDB();

   if(!$db) {

      echo $db->lastErrorMsg();

   } 
?>
<a href="doctor_new.php">New Appointment</a>
<a href="logout.php">Logout</a><hr>
<table id="example" class="display" style="width:100%">
<thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Med. Condition</th>
                <th>Blood Type</th>
                <th># Options #</th>
            </tr>
        </thead>
<tbody>
<?php 

 $sql2 = "SELECT * FROM doctor_appointmentsbl"; 
     $ret2 = $db->query($sql2);
          while($row = $ret2->fetchArray(SQLITE3_ASSOC) ) { 
               ?>
      <tr>
                <td><?php echo $row['ID']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['med_condition']; ?></td>
                <td><?php echo $row['blood_type']; ?></td>
                <td>
                     <form method="post" action="edit_appointment.php">
                     <input type="hidden" name="app_id" value="<?php echo $row['ID']; ?>">
                     <input type="submit" value="Edit">
                     </form>
                     <form method="post" action="del_appointment.php">
                     <input type="hidden" name="app_id" value="<?php echo $row['ID']; ?>">
                     <input type="submit" value="Delete">
                     </form>
                </td>

      </tr>
<?php
          }
?>
</tbody>
</table>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
</body>

</html>
<?php
} else {
            header("Location: logout.php");
}
?>