<?php 
error_reporting(0);
?>
<?php
error_reporting(0);
  // Create database connection
  $conn= mysqli_connect("localhost", "root", "", "enroll");
//$day1 = strtotime($_POST["date"]);
//$day1 = date('Y-m-d', $day1);
$day1 = strtr($_POST['date'], '/', '-');
 $day1 = date('Y-m-d', strtotime($day1));

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_text = mysqli_real_escape_string($conn, $_POST['image_text']);
	$eventname= $_POST['event'];
	$branchname= $_POST['branch'];
	$Organisers= $_POST['Organiser'];
	$stime= $_POST['stime'];
	$etime= $_POST['etime'];
  	// image file directory
  	$target = "Img/".basename($image);
  	$sql = "INSERT INTO fun (Name,Branch,Image,Description,Organisers,Date,stime,etime) VALUES ('$eventname','$branchname','$image','$image_text','$Organisers','$day1','$stime','$etime')";
  	// execute query
  	mysqli_query($conn, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($conn, "SELECT * FROM fun");
?>


<!DOCTYPE html>
<html>
<head>
<title><?php echo $club ?> Events</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
* {
  box-sizing: border-box;
}

/* Style the body */
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}


/* Header/logo Title */
.header {
  padding: 15px;
  text-align: center;
  background: #2d837b;
  color: white;
}

/* Increase the font size of the heading */
.header h1 {
  font-size: 40px;
}

.navbar {
  overflow: hidden;
  background-color: #333;
  position: sticky;
  position: -webkit-sticky;
  top: 0;
}

/* Style the navigation bar links */
.navbar a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 14px 20px;
  text-decoration: none;
}

/* Change color on hover */
.navbar a:hover {
  background-color: #ddd;
  color: black;
}

/* Active/current link */
.navbar a.active {
  background-color: #666;
  color: white;
}

h2{
text-align: center;
font-size : 30px;
color: chocolate;
}

* {
  box-sizing: border-box;
}

input[type=text] {
  width: 80%;
  margin-bottom: 10px;
  padding: 6px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

label {
  margin-bottom: 10px;
  display: block;
}
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 70%;
  position:relative;
  left: 130px;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #4CAF50;
  color: white;
}

/* Footer */
.footer {
  padding: 5px;
  text-align: center;
  background: #ddd;
  font-size:25px;
}

p{
	font-size: 20px;
	font-family:Gill Sans;
}

@media (max-width: 800px) {
  .row {
  flex-direction: column;}
}
</style>
</head>
<body>
<div class="header">
  <h1 style="


  text-align:center;
  font-size:50px;
  color:white;

  left:0;
  text-shadow:
    -1px 1px 0px #c4dbe2,
    -2px 2px 0px #b4d1d9,
    -3px 3px 0px #a6c6cf,
    -4px 4px 0px #94b8c3,
    -5px 5px 0px #87aeb9,
    -6px 6px 0px #7aa3af,
    -7px 7px 0px #6d97a3,
    -8px 8px 0px #618b98,
    -9px 9px 0px #56818e,
    -10px 10px 0px #4c7683,
    -15px 15px 25px rgba(0,0,0,.9);
      " >Association Member Portal</h1>
</div>

<div class="navbar">
  <a href="swa.php">Workshop Enrollments</a>
  <a href="sea.php"> Event Enrollments</a>
 <a href="#"class="active">Add Events</a>
  <a href="saw.php">Add Workshops</a>
  <a href="sapw.php">Participants and Winners</a>
  <a href="../budget/req_budget_form1.php" >Request Budget</a>
   <a href="sup.php" >Upload Budget</a>
</div><br />

<h2>ADD AN EVENT</h2>

<div style="border-style:null;
background-color:white;">
<div style="width:500px;;
padding:5px;
margin: 0 auto;
background-color:#ddd;" >
<center>
<h3 style="font-size:25px;">UPLOAD EVENT IMAGES AND DETAILS</h3>
  <form method="POST" action="sae.php" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image">
  	</div><br>
	<div>
	<input type="text" style="padding:5px;" name="event" placeholder="Event Name">
	</div><br>
	<div>
	<input type="text" style="padding:5px;" name="branch" placeholder="Branch">
	</div><br>
  	<div>
      <textarea 
      	id="text" 
      	cols="40" 
      	rows="4" 
      	name="image_text" 
      	placeholder="Say something about this image..."></textarea>
  	</div><br>
<input type="date" style="padding:5px; name="date" placeholder="Date"><br>
	   <br> <div>
	<input type="text" style="padding:5px; name="Organiser" placeholder="Organiser's Name">
	</div><br>
	<div>
	<input type="time" style="padding:5px; name="stime" placeholder="Enter the start time">
	</div><br>
	<div>
	<input type="time" style="padding:5px; name="etime" placeholder="Enter the end time">
	</div><br>
  	<div>
  		<button type="submit" 
style="background-color:black;

color:white;

height:auto;
width:auto;
font-size:15px;
font-weight:bold;" name="upload">POST</button>
  	</div></div>
  </form></center>
</div>
<br>
<br>


</body>
</html>