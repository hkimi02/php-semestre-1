<?php
session_start();
require_once "../db_connect.php";

$title="";
$description="";
$due_date="";
$id=null;
if(array_key_exists('completed',$_GET)){
    $req=$db->prepare('UPDATE todos SET complete=:complete  WHERE id=:id');
    $req->execute([
        'id' =>$_GET['completed'],
        'complete'=>1,
    ]);
    header("location:../listTodo.php?msg=todo completed");
}


if(isset($_GET['edit']) && !empty($_GET['edit'])){
    $req=$db->prepare('SELECT * FROM todos WHERE id=:id');
    $req->execute(['id'=>$_GET['edit'],
    ]);
    $res=$req->fetch();
    if(!$res){
        header("location:../listTodo.php");
        exit;
    }else{
    $title=$res['title'];
    $description=$res['description'];
    $due_date=$res['due_date'];
    $id=$res['id'];
    }
}else{
    header("location:../listTodo.php");
    exit;
}

if(isset($_POST['edit'])){
    extract($_POST);
    $req=$db->prepare('UPDATE todos SET title=:title , description=:description , due_date=:due_date WHERE id=:id');
    $req->execute([
        'id' =>$id,
        'title'=>$title,
        'description'=>$description,
        'due_date'=>$due_date,
    ]);
    header("location:../listTodo.php?msg=record edited succesfully");
}
$error=array();
    if(isset($_POST['submit'])){
        extract($_POST);
        if($title=="" || $description=="" || $due_date==""){
            $error[0]="all input feilds should be feild";
            goto show;
        }
        if(strlen($title)<3){
            $error[0]="enter a valid title";
        }
        else{
        $req=$db->prepare('INSERT INTO todos (title,description,due_date,complete,id_user)
        VALUES(:title,:description,:due_date,:complete,:id_user)');
        $req->execute([
            'title'=>$title,
            'description'=>$description,
            'due_date'=>$due_date,
            'complete'=>0,
            'id_user'=>$_SESSION['id'],
        ]);
        header("location:../listTodo.php?msg=todo added succesfully");
    }}
    show:
    include "./home.phtml";
?>