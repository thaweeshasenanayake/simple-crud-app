<?php 

$conn = mysqli_connect("localhost", "root","","abc_company");
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
else{

    $sql = "INSERT INTO staffs(staff_ID	,first_name,last_name,email,phone_no,active) 
    VALUES(
        '$_POST[staffid]',
        '$_POST[fname]',
        '$_POST[lname]',
        '$_POST[email]',
        '$_POST[number]',
        '$_POST[active]'
    )";

    if (mysqli_query($conn, $sql)) {
        header('location:records.php');
    } 
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);

    
}
