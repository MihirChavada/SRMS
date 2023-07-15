<?php
include "init.php";
// include "session.php";

if(isset($_POST['class_name'])) {
    $class_name=$_POST['class_name'];
    
    // echo $class_name;

    $delete_sql=mysqli_query($conn,"DELETE from class where name='$class_name'");
    if(!$delete_sql){
        echo '<script language="javascript">';
        echo 'alert("Not available")';
        echo '</script>';
    } else {
       
        echo 'deleted';
        
    }
}


?>