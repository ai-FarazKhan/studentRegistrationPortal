<?php
    session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Print ID Card</title>
    <link href="../img/piaic_logo.png" rel="icon">
    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="login.css" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  </head>
  <body class="text-center">


  <?php if (isset($_SESSION['userLoginName'])):?>


<form class="form-signin" method="POST?inputStudentCnic?fee_paid=fees_paid_options" action="Creating_Pdf.php">

    <div class="text-center mb-4">
    <a href="index.php"><img class="mb-4" src="img/piaic_logo.png" alt="" width="180" height="180"></a>
      <h1 class="h5 mb-3 font-weight-normal">Print Admit Card Of Student</h1>
    </div>

    <label style="color: #AE1438;">Select The Given options</label>
      <select id="inputState" name="fees_paid_options" class="form-control form-control-lg" required>
        <option selected="true" disabled="true">Fees Paid...</option>
        <option>Yes</option>
        <option>Dues</option>
      </select>

    <input type="text" name="inputStudentCnic" style="margin-top: 20px;" id="inputPassword" class="form-control" placeholder="Student CNIC No...." required>

    <button class="btn btn-outline-primary btn-block" name="print_card_btn" type="submit" style="margin-top: 20px;"><span style="font-weight:bold; font-size: 20px;">Print</span></button>
    <p class="mt-5 mb-3 text-muted">&copy 2019 Panacloud.ai</p>

</form>


<!-- Modal -->
<div class="modal fade text-center" style="background-color:#2F363F;" id="notification_of_incorrect_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body" style="background-color:#0A3D62;">
      <h1 class="display-3" style="color:#EAF0F1">Please Give Correct information !!</h1>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger btn-lg" style="margin:0 auto;" data-dismiss="modal">Ok Got it !!</button>
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