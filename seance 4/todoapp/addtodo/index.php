<?php
    

require_once "../db_connect.php";
$error=array();
    if(isset($_POST['submit'])){
        extract($_POST);
        if($title=="" || $description=="" || $due_date==""){
            $error[0]="all input feilds should be feild";
            goto show;
        }
        if(strlen($title)<5){
            $error[0]="enter a valid name";
        }
        else{
            //$due_date=strtotime($due_date,'y-m-d');
        $req=$db->prepare('INSERT INTO todos (title,description,due_date,complete)
        VALUES(:title,:description,:due_date,:complete)');
        $req->execute([
            'title'=>$title,
            'description'=>$description,
            'due_date'=>$due_date,
            'complete'=>0,
        ]);
        header("location:../lisTtodo.php?msg=todo added succesfully");
    }}
    show:
    include "./home.phtml";



?>