<!doctype html>
<html lang="en">
  <head>
    <title>Print ID Card</title>
    <link href="img/piaic_logo.png" rel="icon">
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style2.css" rel="stylesheet">
  </head>

  <body>
    <form class="form-signin" action="Creating_Pdf.php" method="POST?cnic_no">
      <div class="text-center mb-4">
        <a href="index.php"><img class="mb-4" src="img/piaic_logo.png" alt="" width="180" height="180"></a>
        <h1 class="h3 mb-3 font-weight-normal" style="color: #24252a">Insert Your CNIC Number</h1>
      </div>

    <input type="text" name="cnic_no" class="form-control" pattern="[0-9]{11}" placeholder="CNIC number without - only insert numeric values">

            <br><br>

      <button class="btn btn-lg btn-outline-primary btn-block" type="submit">Show ID Card</button>

      <p class="mt-5 mb-3 text-muted text-center">&copy; 2019 PanaCloud.ai</p>
    </form>
  </body>
</html>
