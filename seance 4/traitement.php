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
<?php 
 $db = new PDO('mysql:host=localhost;dbname=dsi22_todo_app;charset:utf8', 'root','');
 $query=$db->query('SELECT * FROM id');
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
      <th scope="row"><input type="checkbox" <?php echo $todo['complete'] ?  'checked' : ''?>></th>
      <td class="<?php echo $todo['complete'] ?  'text-decoration-line-through' : ''?>"><?php echo $todo['title'] ?></td>
    <td>
        <button class="btn btn-warning">edit</button>
        <button class="btn btn-danger">delete</button>
        <button class="btn btn-primary">details</button>
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