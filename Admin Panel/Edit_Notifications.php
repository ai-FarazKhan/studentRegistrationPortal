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
        <button type="button" class="btn btn-lg btn-light" disabled>Welcome Mr.<?php echo $_SESSION['userLoginName']?> To Edit Notifications Section <i class="fas fa-eye" style="color:green;"></i></button>
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
  <h1 class="display-3 text-center" style="font-family: 'Lobster', cursive;">Welcome To Edit Notifications Section.</h1>
</div>
<br>
<br>
<br>


<?php

$server_Name = 'localhost';
$user_Name = 'root';
$user_Pass = '';
$db_name = 'piaic_db';

$setting_connection = mysqli_connect($server_Name,$user_Name,$user_Pass,$db_name);

    $getting_id_of_notification = $_GET['id'];
    $query1 = "SELECT * FROM notifications WHERE id = '$getting_id_of_notification'"; 
    $running_query1 = mysqli_query($setting_connection,$query1);
  

    if(isset($_POST['delete_btn']))
    {
        $query2 = "DELETE FROM notifications WHERE id = '$getting_id_of_notification'";
        mysqli_query($setting_connection,$query2);
        header('location: Showing_Notifications.php');

    }

    if(isset($_POST['update_btn']))
    {
        $taking_input_notifyby =$_POST['notify_by_txt'];
        $taking_input_notification = $_POST['notification_txt'];

        if($taking_input_notifyby == '' && $taking_input_notification == '')
        {
            echo"
            <script>
                $(document).ready(function(){
                $('#Insert_Something_notification').modal();
            
            });
            </script>";
            // echo "insert something";
        }

        else{
            $query3 = "UPDATE notifications SET notify_by = '$taking_input_notifyby', notifiy_content = '$taking_input_notification' WHERE id = ('$getting_id_of_notification')";
            mysqli_query($setting_connection,$query3);
            header ('location: Showing_Notifications.php');
        }


    }

    if(isset($_POST['cancel_btn']))
    {
        header ('location: Showing_Notifications.php');
    }

?>


<div class="container" style="text-align: center;">
<form action="" method="post">
  
  <?php while($row = $running_query1->fetch_array()) : ?>

  <div class="form-group">
  <label style="color:#AE1438; font-size: 30px; display:inline;">Notify By</label>
    <input type="text" name="notify_by_txt" class="form-control" value="<?php echo $row['notify_by']?>">
    <label style="color:#AE1438; font-size: 30px; display:inline;">Notification</label>
    <input type="text" name="notification_txt" class="form-control" value="<?php echo $row['notifiy_content']?>">
  </div>

<?php endwhile;?>


  <button type="submit" name="update_btn" class="btn btn-primary btn-lg">Update Notification</button>
  <button type="submit" name="delete_btn" class="btn btn-danger btn-lg">Delete Delete Notification</button>
  <button type="submit" name="cancel_btn" class="btn btn-success btn-lg">Cancel</button>
  

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