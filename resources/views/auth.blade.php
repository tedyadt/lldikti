<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <title>Login Page</title>
</head>
<body>

<section class="vh-100">
  <div class="container-fluid">
    <div class="row align-items-top">
      <!-- Logo di pojok kiri atas -->
        <div class="col-1 col-sm-1 mt-2 mr-5 d-flex align-items-top">
            <img src="https://dev2.kopertis7.go.id/images/logo_dikbud.png"  alt="" style="width: 50x; height: 50px; auto;">
        </div>

      <!-- Form login -->
      <div class="col-sm-5 text-center text-sm-start mt-sm-5">
        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-1 mt-xl-n5">
          <form style="width: 23rem;" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <h1 class="fw-semibold mb-2 pb-3" style="letter-spacing: 1px; font-size: 2rem;">Welcome to LLDIKTI VII Sign in to your account</h1>
            <?php
              if (isset($error_message)) {
                echo '<div class="alert alert-danger" role="alert">' . $error_message . '</div>';
              }
            ?>
            <div class="form-outline mb-4">
              <input type="email" id="form2Example18" class="form-control form-control-lg" name="email" required placeholder="Email address" />
            </div>
            <div class="form-outline mb-4">
              <input type="password" id="form2Example28" class="form-control form-control-lg" name="password" required placeholder="Password" />
            </div>
            <div class="pt-1 mb-4">
              <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
            </div>  
          </form>
        </div>
      </div>

      <!-- Gambar -->
      <div class="col-sm-6 px-0 d-none d-sm-block">
        <img src="https://images7.alphacoders.com/131/1311868.jpeg" alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
      </div>
    </div>
  </div>
</section>

</body>
</html>
