<!doctype html>
<html>

<head>
	<title>Login</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="css/form_login.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
<main class="main_log">
        <div class="container conts">
            <div class="signup-content">
                <form method="POST" id="signup-form" class="form-signin">
                  <!--  -->
                  <h2 class="form-title">Login</h2>
                  <br/>
                  <div class="form-label-group">
                      <input type="text" id="inputEmail" class="form-input form-control" placeholder="Email address" required autofocus>
                      <label for="inputEmail"><i class="fa fa-envelope"></i> Email/Username</label>
                  </div>
              
                  <div class="form-label-group">
                      <input type="password" id="inputPassword" class="form-input form-control" placeholder="Password" required>
                      <label for="inputPassword"><i class="fa fa-lock"></i> Password</label>
                  </div>

                  <div class="form-group">
                      <p class="term-service">
                        <a href="#" class="term-service-link">Lupa Password?</a>
                      </p>
                  </div>
                  <div class="form-group">
                      <input type="submit" name="submit" id="submit" class="form-submit" value="Masuk"/>
                  </div>                                       
                </form>
                <p class="loginhere">
                    Belum Punya Akun?<a href="register" class="loginhere-link"> Daftar di Sini</a>
                </p>                                        
            </div>
        </div>
    </main>
    

</body>
</html>
