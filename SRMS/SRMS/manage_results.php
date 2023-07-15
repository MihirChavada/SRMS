<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/home.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="./css/form.css">
    <title>Dashboard</title>
</head>
<body style="background:#2B3467">

    <div class="title">
      <a href="index.html" style="color: white"><span class="fa fa-home fa-2x">Home</span></a>
      <span class="heading">Dashboard</span>
      <a href="logout.php" style="color: white"><span class="fa fa-sign-out fa-2x">Logout</span></a>
    </div>

    <div class="nav">
        <ul>
            <li class="dropdown" onclick="toggleDisplay('1')">
                <a href="" class="dropbtn">Classes &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="1">
                    <a href="add_classes.php">Add Class</a>
                    <a href="manage_classes.php">Manage Class</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('2')">
                <a href="#" class="dropbtn">Students &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="2">
                    <a href="add_students.php">Add Students</a>
                    <a href="manage_students.php">Manage Students</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('3')">
                <a href="#" class="dropbtn">Results &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="3">
                    <a href="add_results.php">Add Results</a>
                    <a href="manage_results.php">Manage Results</a>
                </div>
            </li>
        </ul>
    </div>

    <div class="main">
        <br><br>
        <form action="" method="post">
            <fieldset>
                <legend>Delete Result</legend>
                <?php
                    include('init.php');
                    include('session.php');

                    $class_result=mysqli_query($conn,"SELECT `name` FROM `class`");
                        echo '<select name="class_name">';
                        echo '<option selected disabled>Select Class</option>';
                    while($row = mysqli_fetch_array($class_result)){
                        $display=$row['name'];
                        echo '<option value="'.$display.'">'.$display.'</option>';
                    }
                    echo'</select>'
                ?>
                <input type="text" name="rno" placeholder="Roll No">
                <select name="dept" placeholder="Department">
                    <option selected disabled>Department</option>
                    <option value="information technology">information technology</option>
                    <option value="computer">computer</option>
                    <option value="civil">civil</option>
                    <option value="mechanical">mechanical</option>
                    <option value="electrical">electrical</option>
                    <option value="electronic communication">electronic communication</option>
                    <option value="bio-tech">bio-tech</option>
                    <option value="chemical">chemical</option>
                
                
                </select>
                <select name="exam" placeholder="Exam">
                    <option selected disabled>Exam</option>
                    <option value="mid">Mid Exam</option>
                    <option value="final">Final Exam</option>
                </select>
                <input type="submit" value="Delete">
            </fieldset>
        </form>
        <br><br>

        <form action="" method="post">
            <fieldset>
                <legend>Update Result</legend>

                <?php
                    $class_result=mysqli_query($conn,"SELECT `name` FROM `class`");
                        echo '<select name="class">';
                        echo '<option selected disabled>Select Class</option>';
                    while($row = mysqli_fetch_array($class_result)){
                        $display=$row['name'];
                        echo '<option value="'.$display.'">'.$display.'</option>';
                    }
                    echo'</select>'
                ?>

                    <select name="dept" placeholder="Department">
                    <option selected disabled>Department</option>
                    <option value="Information Technology">Information Technology</option>
                    <option value="Computer">Computer</option>
                    <option value="Civil">Civil</option>
                    <option value="Mechanical">Mechanical</option>
                    <option value="Electrical">Electrical</option>
                    <option value="Electronics & Communication">Electronics & Communication</option>
                    <option value="Chemical">Chemical</option>

                    </select>

                <select name="exam" placeholder="Exam">
                <option selected disabled>Exam</option>
                <option value="mid">Mid Exam</option>
                <option value="final">Final Exam</option>
                </select>
                <input type="text" name="rn" placeholder="Roll No">
                <input type="text" name="sub1" id="" placeholder="Subject 1">
                <input type="text" name="p1" id="" placeholder="Enter marks">
                <input type="text" name="sub2" id="" placeholder="Subject 2">
                <input type="text" name="p2" id="" placeholder="Enter marks">
                <input type="text" name="sub3" id="" placeholder="Subject 3">
                <input type="text" name="p3" id="" placeholder="Enter marks">
                <input type="text" name="sub4" id="" placeholder="Subject 4">
                <input type="text" name="p4" id="" placeholder="Enter marks">
                <input type="text" name="sub5" id="" placeholder="Subject 5">
                <input type="text" name="p5" id="" placeholder="Enter marks">
                <input type="text" name="sub6" id="" placeholder="Subject 6">
                <input type="text" name="p6" id="" placeholder="Enter marks">
                <input type="submit" value="Update">
            </fieldset>
        </form>
    </div>

</body>
</html>

<?php
    if(isset($_POST['class_name'],$_POST['rno'],$_POST['exam'])) {
        $class_name=$_POST['class_name'];
        $rno=(int)$_POST['rno'];
        $exam=$_POST['exam'];
        $dept=$_POST['dept'];
        
        
        
        $delete_sql=mysqli_query($conn,"DELETE from `result` where `rno`='$rno' and `class`='$class_name' and `exam`='$exam' and `dept`='$dept'");
        if(!$delete_sql){
            echo '<script language="javascript">';
            echo 'alert("Not available")';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Deleted")';
            echo '</script>';
        }
    }

    if(isset($_POST['rn'],$_POST['sub1'],$_POST['sub2'],$_POST['sub3'],$_POST['sub4'],$_POST['sub5'],$_POST['sub6'],$_POST['p1'],$_POST['p2'],$_POST['p3'],$_POST['p4'],$_POST['p5'],$_POST['p6'],$_POST['class'])) {
        $rno=$_POST['rn'];
        $class_name=$_POST['class'];
        $p1=(int)$_POST['p1'];
        $p2=(int)$_POST['p2'];
        $p3=(int)$_POST['p3'];
        $p4=(int)$_POST['p4'];
        $p5=(int)$_POST['p5'];
        $p6=(int)$_POST['p6'];
        $sub1=$_POST['sub1'];
        $sub2=$_POST['sub2'];
        $sub3=$_POST['sub3'];
        $sub4=$_POST['sub4'];
        $sub5=$_POST['sub5'];
        $sub6=$_POST['sub6'];
        $exam=$_POST['exam'];
        $dept=$_POST['dept'];

        $marks=$p1+$p2+$p3+$p4+$p5+$p6;
        $percentage=$marks/6;


        $sql="UPDATE `result` SET `sub1`='$sub1',`sub2`='$sub2',`sub3`='$sub3',`sub4`='$sub4',`sub5`='$sub5',`sub6`='$sub6',`p1`='$p1',`p2`='$p2',`p3`='$p3',`p4`='$p4',`p5`='$p5',`p6`='$p6',`marks`='$marks',`percentage`='$percentage' WHERE `rno`='$rno' and `class`='$class_name' and `exam`='$exam' and `dept`='$dept'";
        $update_sql=mysqli_query($conn,$sql);

        if(!$update_sql){
            echo '<script language="javascript">';
            echo 'alert("Invalid Details")';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Updated")';
            echo '</script>';
        }
    }
?>
