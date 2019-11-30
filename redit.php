<?php
// including the database connection file
include_once("config.php");
if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$irecom=$_POST['Recommendations'];
	
	// checking empty fields
			
		if(empty($irecom)) {
			echo "<font color='red'>Recommendation field is empty.</font><br/>";
	} else {	
		//updating the table
		$sql = "UPDATE dbreformed.guia2 SET Recommendations=:Recommendations
         WHERE id=:id";
		$query = $conn->prepare($sql);
				
		$query->bindparam(':id', $id);
		$query->bindparam(':Recommendations', $irecom);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':id' => $id, ':Recommendations' => $irecom));
				
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];
//selecting data associated with this particular id
$sql = "SELECT * FROM dbreformed.guia2  WHERE id=:id";
$query = $conn->prepare($sql);
$query->execute(array(':id' => $id));
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$irecom = $row['Recommendations'];
}
?>
<html>
<head>	
	<title>Edit Recommendations</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<style type="text/css">
.first {
  width: 170px;
  color: #000;
  text-transform: uppercase;
  font-weight: 600;
  cursor: pointer;
  background-color: transparent;
  border: 3px solid #00d7c3;
  border-radius: 50px;
  -webkit-transition: all .15s ease-in-out;
  transition: all .15s ease-in-out;
  color: #00d7c3;
}
.first:hover {
  box-shadow: 0 0 10px 0 #00d7c3 inset, 0 0 20px 2px #00d7c3;
  border: 3px solid #00d7c3;
}
.first1 {
  width: 300px;
  height: 200px;
  color: #000;
  text-transform: uppercase;
  font-weight: 600;
  cursor: pointer;
  background-color: transparent;
  border: 5px solid #00d7c3;
  border-radius: 100px;
  -webkit-transition: all .15s ease-in-out;
  transition: all .15s ease-in-out;
  color: #00d7c3;
}
.first1:hover {
  box-shadow: 0 0 10px 0 #00d7c3 inset, 0 0 20px 2px #00d7c3;
  border: 3px solid #00d7c3;
}
body{
	background-image: url("eq.jpg");

  /* Full height */
  height: 100%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}


.text{
	padding: 10px;
	width: 90%;
}
.label{
  color: white;
}
</style>
<body>
	<a class="first1" href="index.php">Home</a>
	<form name="form1" method="post" action="redit.php">
	
		<div class="col-sm-10">
			<input class="text" type="text" name="Recommendations" value="<?php echo $irecom;?>">
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<input type="hidden" name="id" value=<?php echo $_GET['id'];?>> <br>
			<input class='first' type="submit" name="update" value="Update">
		</div>
	</div>
	</form>
	
</body>
</html>