<?php 
include_once ('config.php');
session_start();
if(!isset($_SESSION['user'])){
    header("location:login.php");
}
if(isset($_POST['Register'])){
    $istanza = $_POST['Stanza'];
    $ititle = $_POST['title'];

    $sql = "insert into dbreformed.guia1";
    $sql .= "(Stanza, title) ";
    $sql .= "values (:pStanza, :ptitle)";
    $query = $conn -> prepare($sql);
    $query -> bindParam(':pStanza', $iStanza);
    $query -> bindParam(':ptitle', $ititle);
    $query -> execute();
    echo "Successfully Added";
    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Compositions</title>
     <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<style type="text/css">
            body{
            background-color: black;
        }
        h1{
            color: white;
            margin-top: 20px;
            text-shadow: 2px 2px 10px white;
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
        .btnhome {
            width: 170px;
            height: 400px;  
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
        .btnhome:hover {
            box-shadow: 0 0 10px 0 #00d7c3 inset, 0 0 20px 2px #00d7c3;
            border: 3px solid #00d7c3;
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

</style>
</head>
<body>
    <form action="addcomp.php" method="POST">
        <a class="btnhome" href="index.php">Home</a> 
        <div class="contain"></div>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-1">
                <label>Stanza:</label>
            </div>
            <div class="col-sm-2">
                <input type="text" name="Stanza">
            </div>
        <div class="row">
            <div class="col-sm-5">
                <label>Title:</label>
            </div>
            <div class="col-sm-7">
                <input type="text" name="title">
            </div>
        </div> <br>
        <div class="row">
            <div align="center" class="col-sm-12">.
                <input type="submit" name="Register" value="Add">
            </div>
        </div>
        
    </form>
    
        
</body>
</html>