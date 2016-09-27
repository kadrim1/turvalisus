<?php

if (!isset($_SESSION)) {
    session_start();

}

if ((!empty($_POST['username']) && !empty($_POST['password']))) {
    require_once "config.php";
    require_once "Db.php";




        $db = Db::getInstance()->getConn();
        $q = $db->prepare('SELECT * FROM csrf.users WHERE username=? AND password=?;');
        $q->execute(array($_POST['username'], $_POST['password']));
        $rows = $q->fetch(PDO::FETCH_ASSOC);

        if (!$rows) {
            $_SESSION['login'] = 'fail';
            header('location: login.php');
            die();
        } else {
            $_SESSION['login'] = true;
            $_SESSION['auth'] = true;
            $_SESSION['user_id'] = $rows['user_id'];



    }





} else {
    $_SESSION['login'] = false;
    header('location: login.php');
    die();
}
