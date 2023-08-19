<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="./font-awesome-4.7.0/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <style>
      body{
        background-image: url('https://media.gettyimages.com/id/95011762/photo/college-students-checking-test-scores-in-corridor.jpg?s=612x612&w=0&k=20&c=DfWKGGjGnYWrME-nD9X1I36WjKlhjjcU2EkfO3B1214=');
        background-repeat: no-repeat;
        background-position-y:50px ;
        background-size:100% 720px;
      }

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

  input[type=reset]{
    /* background-color: #474b4f; */
    color: black;
    border: none;
    transition-duration: 0.4s;
    cursor: pointer;
    font-size: 16px;

}
input[type=submit]{
    /* background-color: #474b4f; */
    color: black;
    border: none;
    transition-duration: 0.4s;
    cursor: pointer;
    font-size: 16px;

}


  input[type=reset]:hover{
    background-color: #ea0b0b;
    color: white
}

.search{
  width: 40%;
  height: auto;
  margin-left:450px ;
  margin-top: 52px;
  
}

fieldset{
  background-color: #474b4f;
}

marquee{
  background-color: #c4e892;
  color: red;
  padding: 7px;
}
    </style>
   
</head>
<body > <!--onload="window.alert('Admin Has To Login Again !')" -->
<ul class="ul">
<li><a class="active" href="http://localhost/SAMS/Mentor/College.php">Home</a></li>
          <li><a href="http://localhost/SAMS/Mentor/about.php">About</a></li>
          <li><a href="http://localhost/SAMS/Mentor/courses.php">Courses</a></li>
          <li><a href="http://localhost/SAMS/Mentor/trainers.php">Trainers</a></li>
          <li><a href="http://localhost/SAMS/Mentor/events.php">Events</a></li>
          
          
          <li><a href="http://localhost/SAMS/Mentor/contact.php">Contact</a></li>
		
</ul>
<marquee direction="left" id="mar" onload="show()">Result of MCA 3rd Semester has been Published | Result of MBA 1st Semester has been Published .[LOGIN BELOW TO CHECK YOUR RESULT]</marquee>
<div class="search">
            <form action="./student.php" method="get">
                <fieldset>
                    <legend class="heading" style="color: yellow;font-weight:bold;">For Students</legend>

                    <?php
                        include('init.php');

                        $class_result=mysqli_query($conn,"SELECT `name` FROM `class`");
                            echo '<select name="class">';
                            echo '<option selected disabled>Select Class</option>';
                        while($row = mysqli_fetch_array($class_result)){
                            $display=$row['name'];
                            echo '<option value="'.$display.'">'.$display.'</option>';
                        }
                        echo'</select>'
                    ?>

                    <input type="text" name="rn" placeholder="Roll No">
                    <input type="submit" value="Get Result">
                    <input type="reset" value="Reset">
                </fieldset>
            </form>
        </div>

        
</body>
</html>