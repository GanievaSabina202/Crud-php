<?php 


require_once "db.php";

$db = new DBConnection();

require_once "class.php";

$crud = new CRUD();

$data = $crud->Select();
$count = 1;

if(isset($_POST["gnd"])){
    $crud->Insert($_POST) ? header("Location:index.php?status=ok") : header("Location:index.php?status=no");
}

if(isset($_POST["rdk"])){
    $crud->Update($_POST) ? header("Location:index.php?status=ok") : header("Location:index.php?status=no");
}

if(@$_GET["sil"]=="ok"){
    $crud->Delete(@$_GET["id"]) ? header("Location:index.php?status=ok") : header("Location:index.php?status=no");
}