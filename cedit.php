<?php
// including the database connection file
include_once("config.php");
if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$iStanza=$_POST['Stanza'];
	$ititle=$_POST['title'];
	
	// checking empty fields
	if(empty($iStanza) || empty($ititle)) {	

		if(empty($Stanza)) {
			echo "<font color='red'>Stanza is empty.</font><br/>";
		}
		if(empty($ititle)) {
			echo "<font color='red'>Title is empty.</font><br/>";
		}
			
	} else {	
		//updating the table
		$sql = "UPDATE dbreformed.guia1 SET Stanza=:Stanza, title=:title WHERE id=:id";
		$query = $conn->prepare($sql);
				
		$query->bindparam(':id', $id);
		$query->bindparam(':Stanza', $Stanza);
		$query->bindparam(':title', $ititle);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':id' => $id, ':verse1' => $iverse1, ':chorus' => $ichorus, ':verse2' => $iverse2, ':title' => $ititle));
				
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];
//selecting data associated with this particular id
$sql = "SELECT * FROM dbreformed.guia1  WHERE id=:id";
$query = $conn->prepare($sql);
$query->execute(array(':id' => $id));
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$iStanza = $row['Stanza'];
	$ititle = $row['Title'];
}
?>
<html>
<head>	
	<title>Edit Composition</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<style type="text/css">
	body{
            background-color: black;
        }
        h1{
            color: white;
            margin-top: 20px;
            text-shadow: 2px 2px 10px white;
        }
		h2{
			color:white;
			float: right;
			font-size: 30px;
		}
		
        .box1{
            position: absolute;
            width: 65%;
            height: 50px;
            background-color: white;
            right: 0;
            margin-top: 22px;
            box-shadow: -5px 0px 18px white;
        }
        label{
            float: right;
            color: white;
        }
        .draw-border {
  box-shadow: inset 0 0 0 4px white;
  color: gray;
  transition: color 0.25s 0.0833333333s;
  position: relative;
  margin:10px;
}
.draw-border:hover {
  color: white;
}
.btn {
  background: none;
  border: none;
  cursor: pointer;
  line-height: 1.5;
  font: 700 1.2rem 'Roboto Slab', sans-serif;
  padding: 1em 2em;
  letter-spacing: 0.05rem;
}

.line{
    border-left: solid white 5px;
    margin-top: 80px;
    margin-left: 40px;
    border-radius: 50%;
    height: 420px;
    width: 420px;
    position: absolute;
}
.col-s-m-2{
	width:300px;
	height
}
</style>
<body>
	<a class="btn draw-border" href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="cedit.php">

		<div class="row">
			
			<div class="col-sm-1">
				<h2>Stanza</h2>
			</div>
			<div class="col-s-m-2">
				<td><input type="text" name="Stanza" value="<?php echo $iStanza;?>"></td>
			</div>
		<br><br>
		<div class="row">
			<div class="col-sm-5">
				<h2>Title</h2>
			</div>
			<div class="col-sm-7">
				<td><input type="text" name="title" value="<?php echo $ititle;?>"></td>
			</div>
		</div>
		<br>
		<div class="row">
			<div align="center" class="col-sm-12">
								<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</div>
		</div>




	</form>
</body>
</html>