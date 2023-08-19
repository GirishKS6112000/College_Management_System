<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/student.css">
    <title>Result</title>
    <style>
        .ul {
	border: 1px solid black;
	list-style-type: none;
	margin: 0;
	padding: 0;
	overflow: hidden;
	background-color: rgb(46, 49, 57);
  }
  
 .ul> li {
	float: left;
  }
  
  .ul>li a {
	display: block;
	color: rgb(255, 255, 255);
	text-align: center;
	font-family: "Poppins", sans-serif;
	font-size: 15px;
	font-weight: 500;
	padding: 14px 16px;
	text-decoration: none;
  }
  
  .ul>li a:hover {
	background-color: rgb(248, 32, 32);
  }
    </style>
</head>
<body>
<ul class="ul">
<li><a class="active" href="http://localhost/SAMS/Mentor/College.php">Home</a></li>
          <li><a href="http://localhost/SAMS/Mentor/about.php">About</a></li>
          <li><a href="http://localhost/SAMS/Mentor/courses.php">Courses</a></li>
          <li><a href="http://localhost/SAMS/Mentor/trainers.php">Trainers</a></li>
          <li><a href="http://localhost/SAMS/Mentor/events.php">Events</a></li>
          
          
          <li><a href="http://localhost/SAMS/Mentor/contact.php">Contact</a></li>
		
</ul>
    <?php
        include("init.php");

        if(!isset($_GET['class']))
            $class=null;
        else
            $class=$_GET['class'];
        $rn=$_GET['rn'];

        // validation
        if (empty($class) or empty($rn) or preg_match("/[a-z]/i",$rn)) {
            if(empty($class))
                echo '<p class="error">Please select your class</p>';
            if(empty($rn))
                echo '<p class="error">Please enter your roll number</p>';
            if(preg_match("/[a-z]/i",$rn))
                echo '<p class="error">Please enter valid roll number</p>';
            exit();
        }

        $name_sql=mysqli_query($conn,"SELECT `name` FROM `students` WHERE `rno`='$rn' and `class_name`='$class'");
        while($row = mysqli_fetch_assoc($name_sql))
        {
        $name = $row['name'];
        }

        $result_sql=mysqli_query($conn,"SELECT `p1`, `p2`, `p3`, `p4`, `p5`, `marks`, `percentage` FROM `result` WHERE `rno`='$rn' and `class`='$class'");
        while($row = mysqli_fetch_assoc($result_sql))
        {
            $p1 = $row['p1'];
            $p2 = $row['p2'];
            $p3 = $row['p3'];
            $p4 = $row['p4'];
            $p5 = $row['p5'];
            $mark = $row['marks'];
            $percentage = $row['percentage'];
        }
        if(mysqli_num_rows($result_sql)==0){
            echo "no result";
            exit();
        }
    ?>

    <div class="container">
        <div class="details">
            <span>Name:</span> <?php echo $name ?> <br>
            <span>Class:</span> <?php echo $class; ?> <br>
            <span>Roll No:</span> <?php echo $rn; ?> <br>
        </div>

        <div class="main">
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
            </div>
        </div>

        <div class="result">
            <?php echo '<p>Total Marks:&nbsp'.$mark.'</p>';?>
            <?php echo '<p>Percentage:&nbsp'.$percentage.'%</p>';?>
        </div>

        <div class="button">
            <button onclick="window.print()">Print Result</button>
            <a href="studentlogin.php" style="border: 1px solid;color:white;background-color:red;text-decoration:none;padding:10px;margin-top:-530px;margin-left:1000px;display:block;width:7%;">BACK </a>
        </div>
    </div>
</body>
</html>