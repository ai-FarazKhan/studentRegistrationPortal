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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <link href="../img/piaic_logo.png" rel="icon">

</head>
<body>



    <?php if (isset($_SESSION['userLoginName'])):?>


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
        <button type="button" class="btn btn-lg btn-light" disabled>Welcome Mr.<?php echo $_SESSION['userLoginName']?> To Notifications Section <i class="fas fa-eye" style="color:green;"></i></button>
        </li>
        <li class="nav-item active" style="padding-right: 10px; padding-top: 10px;">
          <a class="nav-link btn btn-outline-danger btn-lg" href="#add_notification_section_btn">Add Notifications
          </a>
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
  <h1 class="display-3 text-center" style="font-family: 'Lobster', cursive;">Welcome To Notifications Section.</h1>
</div>
<br>
<br>
<br>


  <table class="table table-striped table-dark">
   <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Notify By</th>
      <th scope="col">Message</th>
    </tr>
  </thead>

  <?php

    $server_Name = 'localhost';
    $user_Name = 'root';
    $user_Pass = '';
    $db_name = 'piaic_db';

    $setting_connection = mysqli_connect($server_Name,$user_Name,$user_Pass,$db_name);

    $query = "SELECT * FROM notifications";
    $running_query = mysqli_query($setting_connection,$query);

?>
  <tbody>
  <?php while($row = $running_query->fetch_array()):?>
    <tr>
      <th scope="row"><?php echo $row['id'];?></th>
      <td><a class="text-white" href="Edit_Notifications.php ?id=<?php echo $row['id'];?>"><?php echo $row['notify_by'];?></a></td>
      <td><?php echo $row['notifiy_content'];?></td>
    </tr>
    <?php endwhile;?>
  </tbody>
</table>


<form action="" method="POST">
    <button type="submit" name="delete_all_notifications_Btn" class="btn btn-outline-primary btn-lg btn-block">Delete All Notifications</button>
</form>

<?php
$server_Name = 'localhost';
$user_Name = 'root';
$user_Pass = '';
$db_name = 'piaic_db';

$setting_connection = mysqli_connect($server_Name,$user_Name,$user_Pass,$db_name);

    if(isset($_POST['delete_all_notifications_Btn']))
    {
        $query2 = "TRUNCATE TABLE notifications"; 
        mysqli_query($setting_connection,$query2);
        header('location: Showing_Notifications.php');
    }
    if(isset($_POST['add_btn']))
    {
        $taking_notify_by_txt = $_POST['Notify_by_txt'];
        $taking_notification_txt = $_POST['Notification_txt'];

        if($taking_notify_by_txt == '' || $taking_notification_txt == '')
        {
            echo"<script>
            $(document).ready(function(){
                $('#Insert_Something_notification').modal();
            
            });
            </script>";
        }
        else{
            $query3 = "INSERT INTO notifications (notify_by,notifiy_content) VALUES('$taking_notify_by_txt','$taking_notification_txt')";
            mysqli_query($setting_connection,$query3);
            header ('location: Showing_Notifications.php');
        }
    }
?>

<br>
<br>
<br>


<div class="container" style="text-align: center;background-color: #0A3D62;">
<form method="POST">
<div class="form-group">
    <label style="color:#f0ff00; font-size: 30px;">Add Notifications</label>
    <input type="text" name="Notify_by_txt" class="form-control" placeholder="Enter Your Name, Rank">
    <br>
    <input type="text" name="Notification_txt" class="form-control" placeholder="Enter your message">
    <br>
    <button type="submit" name="add_btn" class="btn btn-primary btn-lg" id="add_notification_section_btn">Add Notification</button>
  </div>
</form>
</div>



<!-- Modal -->
<div class="modal fade text-center" id="Insert_Something_notification" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
      <h1 class="display-4" style="color:orange;">Please Insert Full Information !!</h1>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger btn-lg" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>










    <?php else  :?>
    <?php header('location: login.php');?>

    <?php endif; ?>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>