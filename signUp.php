<?php 
    session_start();
    $isLoggedIn = (isset($_SESSION['is_login'])) ? true : false;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/main.css">
</head>

<!-- Alert Error -->
<!-- <div class="alert alert-error">Wow. Error!</div> -->

<!-- Alert Success -->
<!-- <div class="alert alert-success">Wow. Success!</div> -->

<body class="hack dark">
    <div class="header">
        <div class="header-main-menu-button-container">
            <button type="button" class="header-button-menu">
                <a href="./index.php">Menu</a>
            </button>
        </div>
        <div class="header-navbar">
            <a href="./calculator.php"> Calculator </a>
            <a href="https://discord.gg/HqZrp82nAB"> Discord </a>
            <a href="#" style="color:red"> Article (Coming soon)</a>
            <a href="#"> </a>
        </div>
        <div class="header-user hide-small">
        </div>
    </div>
    <div class="grid-main-form">
        <form action="./controllers/register.php" method="POST">
            <input type="hidden" name="csrf_token" value="" />
            <fieldset class="form-group form-success">
                <label for="username">USERNAME</label>
                <input id="username" name="username" type="text" placeholder="abcd123" class="form-control" required>
            </fieldset>
            <fieldset class="form-group form-success">
                <label for="email" class="email">EMAIL</label>
                <input id="email" name="email" type="text" placeholder="john@example.com" class="form-control" required>
            </fieldset>
            <fieldset class="form-group form-success">
                <label for="password">PASSWORD</label>
                <input id="password" name="password" type="password" placeholder="" class="form-control" required>
            </fieldset>
            <br>
            <div class="button-border">
                <button class="login-button" name="register" value="register">Register</button>
                <div class="help-block">Already a member?
                    <a href="./login.php" style="color:blue">Login here!</a>
                </div>
            </div>
        </form>
    </div>
<div class="footer">
    &copy; 2023 Steam Market Calculator. All rights reserved.
</div>
</body>

</html>