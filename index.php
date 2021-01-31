<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>CRUD</title>
  </head>
  <body>
  <div class="container">
  <?php require_once 'process.php';?>
  <?php if (isset($_SESSION['message'])) :?>

  <div class="alert alert-<?=$_SESSION['msg_type']?>">
    <?php echo $_SESSION['message'];
          unset($_SESSION['message']);
    ?>
  </div>

  <?php endif; ?>
  <?php $mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));
        $result = $mysqli -> query("SELECT * FROM data") or die (mysqli_error($mysqli)); ?>

        <div class="d-flex justify-content-center">
          <table class="table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Location</th>
                <th colspan="2">Action</th>
              </tr>          
            </thead>
            <?php 
              while($row = $result -> fetch_assoc()):?>
            <tr>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['location']; ?></td>
              <td>
                <a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
                <a href="index.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
              </td>
            </tr>
            <?php endwhile; ?>
          </table>
        </div>

<div class="d-flex justify-content-center">
        <form action="process.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id ?>"
            <div class="form-group p-2">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Enter your name">
            </div>
            <div class="form-group p-2">
                <label>Location</label>
                <input type="text" name="location" class="form-control" value="<?php echo $location; ?>" placeholder="Enter your location">
            </div>
            <div class="form-group p-2">
                <?php if ($update == true) : ?>
                  <button type="submit" class="btn btn-primary" name="update">Update</button>
                <?php else: ?>
                <button type="submit" class="btn btn-primary" name="save">Save</button>
                <?php endif; ?>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </div>
  </body>
</html>
