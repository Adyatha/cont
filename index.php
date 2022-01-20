<?php
// if(isset($_POST['name']) || isset($_POST['email']) || isset($_POST['message'])){
    // set connection varaiables
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
if(isset($_POST['submit'])){
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
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>dribble.contactUs</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/8f3f15c59a.js" crossorigin="anonymous"></script>
</head>
<body>
        <div class=container>
            <div class=boxa>
                <h1>Contact us</h1>
                   <span><i class="fas fa-map-marker-alt"></i></span>&nbsp;&nbsp;
                   Address<br><br>
                    <p>295 Witting Streets Suite 666,
                         Melbourne,Australia
                     </p>
                
                 <br> 
                 <i class="fas fa-phone-alt"></i>&nbsp;&nbsp;
                 Phone<br><br>
                <p> (01) 479-642-7461<br>
                    (01) 479-642-7462
                </p> <br> 
                <i class="far fa-envelope"></i>&nbsp;&nbsp;
               Email<br><br>
                <p>295 Witting Streets Suite 666,
                   Melbourne,Australia
                 </p> <br>
            </div>
            <div class=boxb>
            <form action="index.php" method='POST'>
                <h1 id=write >Or Write Us</h1>
                <br>
                <div class=bb>
                    <i class="far fa-user" color="gray"></i>&nbsp;&nbsp;
                    <input  type="text" name="name" placeholder="Name*">
                </div>
                
                <br>
                <div class=bb>
                    <i class="far fa-envelope"></i>
                    <input  type="text" name="email" placeholder="Email*">
                </div>
                <br>
                <textarea class=bb rows="10" cols="30" name="message" placeholder="Enter message"></textarea>
                <br>
                <button class=aa id=submit type="submit" value="send message">submit</button><br><br>
                <div>
                    <i class="fab fa-facebook"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <i class="fab fa-twitter"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <i class="fab fa-pinterest-p"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <i class="fab fa-instagram"></i>
                </div>

            </form>
            <script>
        $(document).ready(function() {
 
            $("#submit").click(function() {
 
                var name = $("#name").val();
                var email = $("#email").val();
                var message = $("#message").val();
 
                if(name==''||email==''||message=='') {
                    alert("Please fill all fields.");
                    return false;
                }
 
                $.ajax({
                    type: "POST",
                    url: "store.php",
                    data: {
                        name: name,
                        email: email,
                        message: message
                    },
                    cache: false,
                    success: function(data) {
                        alert(data);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr);
                    }
                });
                 
            });
 
        });
    </script>

        </div>
    </div>
    
</body>
</html>

