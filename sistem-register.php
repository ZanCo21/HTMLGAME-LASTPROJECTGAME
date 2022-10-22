<?php
include('koneksi.php');

$fullname = $_POST['fullname'];
$username     = $_POST['username'];
$password     = $_POST['password'];
$id = rand(10000,99999) ;


//query insert data ke dalam database
$query = "INSERT INTO tb_user (id,fullname, username, password) VALUES ('$id','$fullname', '$username', '$password')";        

if($connection->query($query)) {
    
    echo "success";

} else {
    
    echo "error";

}

?>