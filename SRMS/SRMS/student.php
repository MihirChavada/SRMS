<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/student.css">
    <title>Result</title>
    <style>
      .info{
            line-height: 25px;
        }
        .alg{
            text-align: left;
        }
        table {
            border-collapse: collapse;
            margin: 0 auto;
            width: 60%; /* Adjust the width as desired */
        }
    
        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid black;
        }
    
        caption {
            font-weight: bold;
            font-size: 34px;
            margin-bottom: 10px;
        }
    
        th {
            background-color: #f2f2f2; /* Set a background color for header cells */
        }
    
        td {
            background-color: #ffffff; /* Set a background color for content cells */
        }
    </style>

    <link rel="stylesheet" href="s.css">
</head>
<body>
    <?php
        include("init.php");

        if(!isset($_POST['class']))
            $class=null;
        else
            $class=$_POST['class'];
        $rn=$_POST['rn'];

        $exam=$_POST['exam'];
        $dept=$_POST['dept'];
        // validation
        if (empty($class) or empty($rn) or empty($exam) or preg_match("/[a-z]/i",$rn)) {
            if(empty($class))
                echo '<p class="error">Please select your class</p>';
            if(empty($rn))
                echo '<p class="error">Please enter your roll number</p>';
            if(empty($exam))
                echo '<p class="error">Please enter Exam pattern</p>';
            if(preg_match("/[a-z]/i",$rn))
                echo '<p class="error">Please enter valid roll number</p>';
            exit();
        }

        $name_sql=mysqli_query($conn,"SELECT `name` FROM `students` WHERE `rno`='$rn' AND `class_name`='$class'");
        while($row = mysqli_fetch_assoc($name_sql))
        {
        $name = $row['name'];
        }

        $result_sql=mysqli_query($conn,"SELECT `sub1`, `p1`, `sub2`, `p2`, `sub3`, `p3`, `sub4`, `p4`, `sub5`, `p5`, `sub6`, `p6`, `marks`, `percentage` FROM `result` WHERE `rno`='$rn' and `class`='$class' and `exam`='$exam'");
        while($row = mysqli_fetch_assoc($result_sql))
        {
            $sub1 = $row['sub1'];
            $p1 = $row['p1'];
            $sub2 = $row['sub2'];
            $p2 = $row['p2'];
            $sub3 = $row['sub3'];
            $p3 = $row['p3'];
            $sub4 = $row['sub4'];
            $p4 = $row['p4'];
            $sub5 = $row['sub5'];
            $p5 = $row['p5'];
            $sub6 = $row['sub6'];
            $p6 = $row['p6'];
            $mark = $row['marks'];
            $percentage = $row['percentage'];
        }
        if(mysqli_num_rows($result_sql)==0){
            echo "no result";
            exit();
        }
    ?>

    <div class="container">
        

    <table>
        <caption>Result</caption>
        <tr>
            <th colspan="3"><div class="details">
          <div class="alg">
          <div class="info"><span>Name:</span> <?php echo $name ?></div> <br>
            <div class="info"><span>Class:</span> <?php echo $class; ?></div> <br>
            <div class="info"><span>Roll No:</span> <?php echo $rn; ?></div> <br>
            <div class="info"><span>Department:</span> <?php echo $dept; ?></div> <br>
            <div class="info"><span>Exam:</span> <?php echo $exam; ?></div> <br>
        </div>
          </div>
       </th>
        </tr>
        <tr>
            <th>Subject</th>
            <th>Obtained Marks</th>
            <th>Out Of</th>
        </tr>
        <tr>
            <td><?php echo '<p>'.$sub1.'</p>';?></td>
            <td><?php echo '<p>'.$p1.'</p>';?></td>
            <td>100</td>
        </tr>
        <tr>
            <td><?php echo '<p>'.$sub2.'</p>';?></td>
            <td><?php echo '<p>'.$p2.'</p>';?></td>
            <td>100</td>
        </tr>
        <tr>
            <td><?php echo '<p>'.$sub3.'</p>';?></td>
            <td><?php echo '<p>'.$p3.'</p>';?></td>
            <td>100</td>
        </tr>
        <tr>
            <td><?php echo '<p>'.$sub4.'</p>';?></td>
            <td><?php echo '<p>'.$p4.'</p>';?></td>
            <td>100</td>
        </tr>
        <tr>
            <td><?php echo '<p>'.$sub5.'</p>';?></td>
            <td><?php echo '<p>'.$p5.'</p>';?></td>
            <td>100</td>
        </tr>
        <tr>
            <td><?php echo '<p>'.$sub6.'</p>';?></td>
            <td><?php echo '<p>'.$p6.'</p>';?></td>
            <td>100</td>
        </tr>
        <tr  align="center">
          <th colspan="3">
          <div class="result" class="res">
            <?php echo '<p>Total Marks:&nbsp'.$mark.'</p>';?>
            <?php echo '<p>Percentage:&nbsp'.$percentage.'%</p>';?>
            <?php if($percentage>=33)
            {
                echo '<p style="color:green;">Congratulations! You have passed this Exam</p>';
            } 
            else
            {
                echo '<p style="color:red;">Sorry You have failed this Exam</p>';
            }
             ?>
        </div>

        <div style="padding-top: 20px;" class="button" class="res">
            <button onclick="window.print()">Print Result</button>
        </div></
          </th>
        </tr>
    </table>
 
        <!-- <div class="main">
            <div class="s1">
                <p>Subjects</p>
                <p>Paper 1</p>
                <p>Paper 2</p>
                <p>Paper 3</p>
                <p>Paper 4</p>
                <p>Paper 5</p>
            </div>
            <div class="s2">
                <p>Marks</p>
                <?php echo '<p>'.$p1.'</p>';?>
                <?php echo '<p>'.$p2.'</p>';?>
                <?php echo '<p>'.$p3.'</p>';?>
                <?php echo '<p>'.$p4.'</p>';?>
                <?php echo '<p>'.$p5.'</p>';?>
                <?php echo '<p>'.$p6.'</p>';?>
            </div>
        </div> -->
       
        </div> 
        
    </div>
</body>
</html>