<?php
$con=mysqli_connect('localhost','root');
mysqli_select_db($con,'pagination');
if($con){
    echo "connected with database";
}
else{
    echo "not connected with database";
}
?>