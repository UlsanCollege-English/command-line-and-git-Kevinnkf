<?php
require('Config/database.php');
session_start();
$rand = rand(9999, 1000);
$error = '';

// cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];
    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM users WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ($key === hash('sha512', $row['username'])) {
        $_SESSION['login'] = true;
    }
}


if (isset($_SESSION["login"])) {
    header("location: loginn.php");
    exit;
}


if (isset($_POST['login'])) {
    $username = stripslashes($_POST['username']);
    $username = mysqli_real_escape_string($conn, $username);
    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($conn, $password);
    $captcha = $_POST["captcha"];
    $confirmcaptcha = $_POST["confirmcaptcha"];

    // Vaslidasi captcha
    if ($captcha != $confirmcaptcha) {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='width: 400px; text-align:center; margin-left: 485px; margin-top:15px; position:fixed;'>
        <strong> Captcha Salah </strong> ULANG!.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
        // echo "<div class='alert alert-danger' role='alert' style='width: 300px; text-align:center; margin-left:530px; margin-top:15px; position:fixed;'>
        // Invalid Captcha Code!
        // </div>";
    } else {
        $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
        $hitung = mysqli_num_rows($result);
        $pwd = mysqli_fetch_array($result);


        // cek username
        if ($hitung > 0) {
            // cek password
            // $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $pwd['password'])) {
                // set Session
                $_SESSION['name'] = $pwd['name'];
                $_SESSION['login'] = true;

                // Remember Me
                if (isset($_POST['remember'])) {
                    // Cookie
                    // setcookie('login', 'true', time() + 60);
                    setcookie('id', $row['id'], time() + 60);
                    setcookie('key', hash('sha512', $row['username']), time() + 60);
                }
                header("location: index.php");
            } else {
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='width: 400px; text-align:center; margin-left: 485px; margin-top:15px; position:fixed;'>
        <strong>Incorrect password or username!</strong> Enter Again.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
            }
        } else {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='width: 400px; text-align:center; margin-left: 485px; margin-top:15px; position:fixed;'>
            <strong>Incorrect password or username!</strong> Enter Again.
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="Asset/Css/style.css">
    <style>
        .center {
            text-align: justify center;
            margin-top: 100px;
        }

        .captcha {
            width: 200px;
            background: lightblue;
            text-align: center;
            font-size: 24px;
            font-weight: 700px;
            border-radius: 12px;
        }

    </style>
</head>

<body>
    <section class="containter-fluid mb-4">
        <section class="row justify-content-center">
            <section class="col-12 col-sm-6 col-md-4">
                <form action="" method="post">
                    <?php if ($error !=  '') { ?>
                        <div class="alert  alert-danger" role="alert"><?= $error; ?></div>
                    <?php } ?>
                    <div class="form-group">
                        <label for="username"> Username </label>
                        <input type="text" name="username" id="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password"> Passsword </label>
                        <input type="password" name="password" id="password" required>
                    </div>

                    <div class="form-group">
                        <label for="capthca-code">  Capthca </label>
                        <input type="text" class="captcha" name="captcha" style="pointer-events: none;" value="<?php echo substr(uniqid(), 8);?>"></input>
                    </div>


                    <div class="form-group">
                        <label for="capthca"> Enter Capthca </label>
                        <input type="text" name="confirmcaptcha" id="captcha" required data_parsley_trigger="keyup" value="" required>
                        <input type="hidden" name="captcha-rand" value="<?php echo $rand; ?>">
                    </div>
                    <button type="submit" name="login" id="login" class="btn btn-primary btn-block"> Login </button>
                    <div class="form-footer mt-2">
                        <p> Belum punya account?</p>
                        <a href="register.php"> Daftar Disini!</a>
                    </div>
                </form>
            </section>
        </section>
    </section>
    <script src="asset/js/captcha.js"></script>
    <script src="asset/js/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>