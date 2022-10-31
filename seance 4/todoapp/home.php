<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>TODO APP</title>
</head>
<body>
    <div class="container-md">
        <form method="post" action="addtodo.php" class="shadow-sm">
            <h1 class="text-center text-wieght-bold">add todo</h1>
            <?php if(count($error)!=0){ ?>
            <div class="alert alert-danger"><?php echo $error[0] ?></div> 
            <?php } ?>         
            <div class="mb-3">
                <label for="Title" class="form-label">todo title</label>
                <input type="text" class="form-control" id="Title" name="title">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">description</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <div class="mb-3">
                <label for="due_date" class="form-label">due date</label>
                <input type="date" class="form-control" id="due_date" name="due_date">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">ADD</button>
        </form>
    </div>
</body>
</html>