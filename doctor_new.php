<?php
session_start();

if($_SESSION["logged"] == true) { 

  ?>
                <h2>Add New Appointment</h2>
                <form id="contact" action="doctor_final.php" method="post">

                        <input name="name" type="text" id="name" placeholder="Name"><br>
                        <input name="email" type="text" id="email" placeholder="Email"><br>
                         <input name="phone" type="text" id="phone" placeholder="Phone"><br>
                         <input name="address" type="text" id="address" placeholder="Address"><br>
                        <br>
                        <textarea name="med_cond" rows="6" id="med_cond" placeholder="Medical Condition"></textarea><br>
                        <input name="blood_type" type="text" id="blood_type" placeholder="Blood Type"><br>
                        <br>
                        <button type="submit">Add New Appointment</button>


                  </div>
                </form>
          </div>
<?php
} else {
            header("Location: logout.php");
}
?>          