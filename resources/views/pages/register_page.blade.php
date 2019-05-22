<!doctype html>
<html>

<head>
	<title>Register</title>
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
                    <h2 class="form-title">Daftar</h2>
                    <div class="form-label-group"> 
                        <select class="form-control" id="role_as" name="sections" onchange="selectRedirect();">
                            <option value="">Mendaftar Sebagai</option>
                            <option value="users">Pelanggan</option>
                            <option value="eos">Pemilik EO</option>
                        </select>
                    </div>
                    <div class="form-label-group">
                        <input type="text" id="inputNama" class="form-input form-control" placeholder="Nama" required autofocus>
                        <label for="inputNama"><i class="fa fa-user"></i> Nama Lengkap</label>
                    </div>
                    <div class="form-label-group">
                        <input type="email" id="inputEmail" class="form-input form-control" placeholder="Email address" required autofocus>
                        <label for="inputEmail"><i class="fa fa-envelope"></i> Email</label>
                    </div>
                    <div class="form-label-group">
                        <input type="number" id="inputTelp" class="form-input form-control" placeholder="Nama" required autofocus>
                        <label for="inputTelp"><i class="fas fa-phone"></i> No. Telepon</label>
                    </div>
                    <div class="form-label-group">
                        <input type="password" id="inputPassword" class="form-input form-control" placeholder="Password" required>
                        <label for="inputPassword"><i class="fa fa-lock"></i> Password</label>
                    </div>
                    <div class="form-group">
                        <label for="agree-term" class="label-agree-term"><span><span></span></span>Dengan Mendaftar, Anda telah menyetujui 
                          <a href="#" class="term-service">Syarat </a> dan <a href="#" class="term-service">Ketentuan </a> Kami</label>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
                    </div>    
                </form>                                        
                <p class="loginhere">
                    Sudah Punya Akun?<a href="login" class="loginhere-link"> Login</a>
                </p>                                        
            </div>
        </div>
    </main>

    <script>
        function selectRedirect() {
            switch (document.getElementById('role_as').value) {
                case "users":
                    window.location = "";
                    break;
                case "eos":
                    window.location = "regist_eo";
                    break;  
                default:
                    break;
            }
        }
    </script>
</body>
</html>
