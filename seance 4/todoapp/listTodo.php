<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>todo app</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center">todo list</h1>
        <a href="./addtodo/" class="btn btn-primary">add todo</a>
<?php if(array_key_exists('msg',$_GET)) :?>
        <div class="alert alert-success">
            <?=$_GET['msg']?>
        </div>
        <?php endif; ?>
<?php 
require_once "./db_connect.php";
 $query=$db->query('SELECT * FROM todos');
$todos=$query->fetchAll();
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
 <?php
 foreach($todos as $todo){
?>

    <tr>
      <th scope="row"><input type="checkbox" name="completed" <?php echo $todo['complete'] ?  'checked' : ''?>></th>
      <td class="<?php echo $todo['complete'] ?  'text-decoration-line-through' : ''?>"><?php echo $todo['title'] ?></td>
    <td>
        <button class="btn btn-primary">details</button>
        <a href="deletetodo.php?delete=<?= $todo['id']?>"><button class="btn btn-danger">delete</button></a>
        <a href="./addtodo/index.php?edit=<?= $todo['id']?>"><button class="btn btn-warning">edit</button></a>
    </td>
    </tr>
<?php
}
?>
  </tbody>
</table>
</div>
</body>
</html>