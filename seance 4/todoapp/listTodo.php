<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>todo app</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  </head>
<body>
    <div class="container">
        <h1 class="text-center">todo list</h1>
        <a href="./addtodo/" class="btn btn-primary">add todo</a><br><br>
        <form action="./searchProcess.php" method="POST">
        <div class="input-group rounded">
  <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" name="search"/>
 <button class="btn btn-primary" type="submit">
  <span class="input-group-text border-0 btn btn-primary" id="search-addon">
  <i class="bi bi-search"></i>
  </span>
  </button>
</div>
</form>
<br><br>
<?php if(array_key_exists('msg',$_GET)) :?>
        <div class="alert alert-success">
            <?=$_GET['msg']?>
        </div>
        <?php endif; ?>
<?php 
require_once "./db_connect.php";
if(array_key_exists('id_searched',$_GET)){
$id_searched=$_GET["id_searched"];
  $query=$db->prepare('SELECT * FROM todos WHERE id=:id');
  $query->execute(['id'=>$id_searched]);
  $todos=$query->fetchAll();
}else{
$query=$db->query('SELECT * FROM todos');
$todos=$query->fetchAll();
}?>
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo $todo['title']; ?> details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      description : <?php echo $todo['description']; ?><br>
      due date : <?php echo $todo['due_date']; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    <tr>
      <a href="./addtodo/index.php?completed=<?=$todo['id']?>"><th scope="row"><input type="checkbox" name="completed" <?php echo $todo['complete'] ?  'checked' : ''?>></th></a>
      <td class="<?php echo $todo['complete'] ?  'text-decoration-line-through' : ''?>"><?php echo $todo['title'] ?></td>
    <td>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-info"></i></button>
        <a href="deletetodo.php?delete=<?= $todo['id']?>"><button class="btn btn-danger" onclick="return confirm('do you want delete this !! ')"><i class="bi bi-trash3-fill"></i></button></a>
        <a href="./addtodo/index.php?edit=<?= $todo['id']?>"><button class="btn btn-warning"><i class="bi bi-pen"></i></button></a>
    </td>
    </tr>
<?php
}
?>
  </tbody>
</table>
</div>
<script src="./script/script.js"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>