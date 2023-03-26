<?php
require_once 'config.php';
session_start();
if (isset($_POST['LOGIN'])) {
  $username = mysqli_real_escape_string($con, $_POST['User']);
  $password = md5(mysqli_real_escape_string($con, $_POST['Pass']));

  $query = "SELECT * FROM user_db WHERE password='$password' and email='$username'";
  $result = mysqli_query($con, $query);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $row['email'];
    $_SESSION['password'] = $row['password'];
    header("location: dashboard.php");
  }
  else{
    $_SESSION['errorMessage'] = "Wrong credentials";
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/login.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    body {
      background-color: #0b4366;
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .img-fluid {
      background: url(image/hotel.png);
      mix-blend-mode: lighten;
      opacity: 0.6;
    }
  </style>


</head>

<body class="hold-transition login-page">
<?php
  if (isset($_SESSION['errorMessage'])) { ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Error...',
        text: "<?php echo $_SESSION['errorMessage']; ?>",
      })
    </script>
  <?php unset($_SESSION['errorMessage']);
  } ?>
  <form action="" method="POST">
    <section class="vh-100">
      <div class="container py-5 h-100">
        <!-- <div class="title">
                <h2 style="font-size:18px ;"> Welcome back to</h2>
                 <BR> 
                    <h1 style="font-size:35px;">ELYSIAN SUITE</h1>
                    
            </div> -->
        <div class="row d-flex align-items-center justify-content-center h-100">
          <div class="col-md-8 col-lg-7 col-xl-6">

            <img src="image/hotel.png" class="img-fluid" alt="hotel">

          </div>

          <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
            <form>

              <div class="form-group">
                <!-- Email input -->
                <h4 style="font-size: 25px;color: #B38B50;text-align: center;margin-bottom: 1rem;">Sign In</h4>
                <!-- <i class="fas fa-user"></i> -->
                <div class="form-outline mb-4">
                  <input type="email" placeholder="Email" class="form-control form-control-md" name="User" required>
                </div>

                <!-- Password input -->


                <div class="form-outline mb-4">
                  <input type="password" placeholder="Password" class="form-control form-control-md" name="Pass" required>
                </div>





                <div class="d-flex justify-content-around align-items-center mb-4">
                  <!-- Checkbox -->
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                    <label class="form-check-label" for="form1Example3"> Remember me </label>
                  </div>
                  <a href="#!" onclick="forgotPassword();">Forgot password?</a>
                </div>

                <!-- Submit button -->


                <div class="actions">
                  <button type="submit" class="btn btn-primary btn-lg btn-block" name="LOGIN">LOGIN</button>
                </div>


              </div>
            </form>
            <div class="bottom-reserved">
              Copyright © 2023 ELYSIAN SUITE. All Rights Reserved
            </div>
          </div>

        </div>

      </div>
    </section>



    <script>
      function forgotPassword() {
        swal({
          title: "Forgot Password",
          text: "Please contact super admin for password resetting",
          icon: "info",
          button: "OK"
        })
      }
    </script>

    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>

</body>

</html>