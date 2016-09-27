<!doctype html>
<html lang="et">
<head>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
    <script src="button.js"></script>

    <meta charset="UTF-8">


    <style>
        #title {
            width: 300px;
            margin: auto;
            display: table;
            text-align: center;
        }

        div.container {
            margin-top: 30px;
            width: 220px;
        }
    </style>
</head>
<body>

<?php
if (!isset($_SESSION)) {
    session_start();
}
$msg = '';
if (!empty($_SESSION['login']) && $_SESSION['login'] === 'fail') {

    $msg = 'Invalid username or password!';
    session_unset();
    session_destroy();

} ?>

<div class="container">


    <form class="form-signin" action="index.php" method="post">

        <p class="form-signin-heading" id="errorMsg" style="color: red"><?= $msg ?></p>
        Username: <input class="form-control" placeholder="Username" type="text" name="username" required autofocus>
        <br/>
        Password: <input class="form-control" type="password" name="password" required>
        <br/>
        <input class="btn btn-sm btn-primary" type="submit" value="Log in">
    </form>
    <br/>
    <br/>

</div>
</body>
</html>




