<?php
if(isset($_POST['submit'])) {
    // set connection varaiables  &&
$server="localhost";
$username="root";
$password="";
$db="internship";
// creating connection to database
$con =  mysqli_connect($server, $username, $password,$db);
//  checking connection success
if (!$con) {
   die("Connection  to this database failed due to ". mysqli_connect_error());
 }
// collect post variables

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message =$_POST['message'];
   
    $id=10;
    
$to='1rn19cs008.adyatha@gmail.com';
$subject='Form Submission';
$msg="Name:".$name."\n"."Wrote the following: "."\n\n".$message;
$headers="From:".$email;

if(mail($to,$subject,$message,$headers)){
    echo "<h1>Sent Successfully! Thank you"." ".$name.",We will contact you Shortly!";
}

 


$sql ="INSERT INTO `contact_us`(`name`,`email`,`message`,`time_stamp`) 
Values ('$name', '$email','$message',current_timestamp());";
// execute the query
if($con->query($sql) == true){
  echo " <script > 
                alert('thank you! We'll get back to you soon'); 
                window.location.href = 'index.php';
                </script>;";
}
else{
  echo "some error occured";
  echo $con->error();
}


// closing of connection
$con->close();
 }
?>