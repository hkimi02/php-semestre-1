<?php
require_once "../db_connect.php";
$error=[];
if(isset($_POST['submit'])){
    extract($_POST);
    if($username=="" || $email=="" || $password=="" || $password2==""){
        $error[0]="all form feilds should be feild";
        goto show;
    }
    $req=$db->prepare('SELECT * FROM users where email=:email');
    $req->execute(['email'=>$email]);
    if($req->rowCount()){
        $error[0]="enter a not excisting email";
        goto show;
    }
    else{
        // $name_file= $_POST['avatar']['name'];
        // $type=pathinfo($name_file,PATHINFO_EXTENSION);
        // $type_dispo=['png','jpg','jpeg','gif'];
        // if(!in_array($type,$type_dispo)){
        //     $error[0]="extantion invalid";
        //     goto show;
        // }
        // $size=$_FILES['avatar']['size'];
        // if($size>999999999){
        //     $error[0]="image size too large";
        //     goto show;
        // }
        // $name_file=md5(mt_rand()).'.'.$type;
        // $avatar='./storage/'.$name_file;
        // if(!move_uploaded_file($_FILES['avatar']['tmp_name'],'./storage/'.$name_file)){
        //     $error[0]="image not uploaded";
        //     goto show;
        // }
        if($password!=$password2){
            $error[0]="passwords dont match";
            goto show;
        }
        else{
            $password=password_hash($password,PASSWORD_DEFAULT);
        }
            $req=$db->prepare("INSERT INTO users (username,email,password) VALUES(:username,:email,:password)");
            $req->execute(['username'=>$username,
                            'email'=>$email,
                            'password'=>$password,
        ]);
        header("location:home.phtml?msg=user saved you may now log in");
    }
}
show:
include "./home.phtml";
?>