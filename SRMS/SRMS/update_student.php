<?php 
include "init.php";
include "session.php";
$rno = intval($_GET['rno']);
$name=mysqli_query($conn, "SELECT name FROM result WHERE rno=$rno") or die(mysqli_error($conn));
$class=mysqli_query($conn, "SELECT class FROM result WHERE rno=$rno") or die(mysqli_error($conn));

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" type="text/css" href="./css/form.css" media="all">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">
    <title>Add Students</title>
</head>
<body style="background:#2B3467">


    <div class="main">
        <form action="" method="post">
            <fieldset>
                <legend>update Student</legend>
                <input type="text" name="student_name"   placeholder="Student Name" style="background:#e2e2e2;">
                <input type="text" name="roll_no" value="<?php echo $rno; ?>" placeholder="Roll No" style="background:#e2e2e2;">
                <?php
                    include('init.php');

                    $class_result=mysqli_query($conn,"SELECT `name` FROM `class`");
                        echo '<select name="class_name" style="background:#e2e2e2;">';
                        echo '<option selected disabled>Select Class</option>';
                    while($row = mysqli_fetch_array($class_result)){
                        $display=$row['name'];
                        echo '<option value="'.$display.'">'.$display.'</option>';
                    }
                    echo'</select>'
                ?>
                <input type="submit" value="update" style="background:#9b4171;">
            </fieldset>
        </form>
    </div>

    <div class="footer">
    </div>
</body>
</html>

<?php

    if(isset($_POST['student_name']) && ($_POST['roll_no']) && ($_POST['class_name'])) {
        $name=$_POST['student_name'];
        $rno=$_POST['roll_no'];
        $class=$_POST['class_name'];
        $sql1 = "UPDATE result SET name='$name', class='$class' WHERE rno=$rno";
        $result1 = mysqli_query($conn, $sql1);
        if ($result1)
        {
            // Redirect to the manage_students.php page after successful update
            $sql2 = "UPDATE students SET name='$name', class_name='$class' WHERE rno=$rno";
            $result2 = mysqli_query($conn, $sql2);
            if($result2)
            {
                header("Location: manage_students.php");
                exit();
            }
            else{
                echo "Error updating student information: " . mysqli_error($conn);
            }
        }
        else {
            echo "Error updating student information: " . mysqli_error($conn);
        }
    }
    //     if(!isset($_POST['class_name']))
    //         $class_name=null;
    //     else
    //         $class_name=$_POST['class_name'];

    //     // validation
    //     if (empty($name) or empty($rno) or empty($class_name) or preg_match("/[a-z]/i",$rno) or !preg_match("/^[a-zA-Z ]*$/",$name)) {
    //         if(empty($name))
    //             echo '<p class="error">Please enter name</p>';
    //         if(empty($class_name))
    //             echo '<p class="error">Please select your class</p>';
    //         if(empty($rno))
    //             echo '<p class="error">Please enter your roll number</p>';
    //         if(preg_match("/[a-z]/i",$rno))
    //             echo '<p class="error">Please enter valid roll number</p>';
    //         if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
    //                 echo '<p class="error">No numbers or symbols allowed in name</p>';
    //               }
    //         exit();
    //     }

    //     $sql = "INSERT INTO `students` (`name`, `rno`, `class_name`) VALUES ('$name', '$rno', '$class_name')";
    //     $result=mysqli_query($conn,$sql);

    //     if (!$result) {
    //         echo '<script language="javascript">';
    //         echo 'alert("Invalid Details")';
    //         echo '</script>';
    //     }
    //     else{
    //         echo '<script language="javascript">';
    //         echo 'alert("Successful")';
    //         echo '</script>';
    //     }

    // }
?>
