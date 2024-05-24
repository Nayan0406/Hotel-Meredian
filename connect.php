<?php
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$emailid = $_POST['emailid'];
$number = $_POST['number'];
$Adate = $_POST['Adate'];
$Ddate = $_POST['Ddate'];
$pickup = $_POST['pickup'];
$request = $_POST['request'];

//Databse connection
$conn = new mysqli('localhost','root','','booking information');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into booking(firstname,lastname,emailid,number,Adate,Ddate,pickup,request)
    values(?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssiiiis" ,$firstname, $lastname, $emailid, $number, $Adate, $Ddate, $pickup, $request);
    $stmt->execute();
    echo "Booking Confirm..";
    $stmt->close();
    $conn->close();
}
?>