<?php
include_once 'dbacontact.php';

if(isset($_POST['submit'])) {
$name = $_POST['name'];
$last = $_POST['last'];
$email = $_POST['email'];
$Number = $_POST['Number'];
$message = $_POST['message'];

$sql = "INSERT into contactform(name , last , Email , Nr , message)
VALUES('$name' , '$last' , '$email' , '$Number' , '$message');";
 $result = mysqli_query($connect , $sql);

if(empty($name) || empty($last) || empty($email)){
    echo "Name and lastname and email is required";
}



 $mailfrom = $_POST['email'];
 $mailTo = "bmurseli57@gmail.com";
 $headers = "From: ".$mailfrom;
 $txt = "You have recived an e-mail from ".$name.".\n\n".$message;
 

 mail($mailTo , $last , $txt , $headers);

 if(!$result) {
     die('Query failed'.mysqli_error());
 }else{
     echo 'Record Created';
 }
 header("Location: contact1.php?mailsend");
}
?>