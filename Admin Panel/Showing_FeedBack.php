<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">

    <link href="../img/piaic_logo.png" rel="icon">

</head>
<body>



    <?php if (isset($_SESSION['userLoginName'])):?>

    <!-- <a class="nav-link btn btn-outline-danger btn-lg" href="logOut.php">LogOut</a>
    <a class="nav-link btn btn-outline-danger btn-lg" href="dashBoard.php">Dashboard</a> -->


    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:#2F363F;">
  <div class="container">
    <a class="navbar-brand" href="../index.php">
          <img src="favicon.png" height="75" width="80">
        </a>
    <button class="navbar-toggler btn btn-outline-danger" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
      <br>
        <li class="nav-item active" style="padding-right: 10px; padding-top: 10px;">
        <button type="button" class="btn btn-lg btn-light" disabled>Welcome Mr.<?php echo $_SESSION['userLoginName']?> To FeedBack Section <i class="fas fa-eye" style="color:green;"></i></button>
        </li>
        <li class="nav-item active" style="padding-right: 10px; padding-top: 10px;">
          <a class="nav-link btn btn-outline-danger btn-lg" href="index.php">DashBoard
          </a>
        </li>
        <li class="nav-item active" style="padding-right: 10px; padding-top: 10px;">
          <a class="nav-link btn btn-outline-danger btn-lg" href="logOut.php">LogOut</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<br>
<br>
<br>
<br>
<br>
<br>


<div class="container-fluid">
  <h1 class="display-3 text-center" style="font-family: 'Lobster', cursive;">Welcome FeedBack Section.</h1>
</div>
<br>
<br>
<br>


    <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Feedback by</th>
      <th scope="col">Message</th>
      <th scope="col">Email</th>
    </tr>
  </thead>


  <?php

    $server_Name = 'localhost';
    $user_Name = 'root';
    $user_Pass = '';
    $db_name = 'piaic_db';

    $setting_connection = mysqli_connect($server_Name,$user_Name,$user_Pass,$db_name);

    $query = "SELECT * FROM feedback";
    $running_query = mysqli_query($setting_connection,$query);

?>
  <tbody>
  <?php while($row = $running_query->fetch_array()):?>
    <tr>
      <th scope="row"><?php echo $row['id'];?></th>
      <td><a class="text-white" href="edit_feedback.php ?id=<?php echo $row['id'];?>"><?php echo $row['name'];?></a></td>
      <td><?php echo $row['message'];?></td>
      <td><?php echo $row['email'];?></td>
    </tr>
    <?php endwhile;?>
  </tbody>
</table>


<form action="" method="POST">
    <button type="submit" name="submit" class="btn btn-outline-primary btn-lg btn-block">Delete All FeedBack's</button>
</form>

<?php
$server_Name = 'localhost';
$user_Name = 'root';
$user_Pass = '';
$db_name = 'piaic_db';

$setting_connection = mysqli_connect($server_Name,$user_Name,$user_Pass,$db_name);
    if(isset($_POST['submit']))
    {
        $query2 = "TRUNCATE TABLE feedback"; 
        mysqli_query($setting_connection,$query2);
        header('location: Showing_FeedBack.php');
    }
?>



    <?php else  :?>
    <?php header('location: login.php');?>

    <?php endif; ?>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>