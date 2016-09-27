<head>

    <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
    <script src="button.js"></script>
</head>

<?php
print_r($_POST);
require_once "Db.php";
require_once "config.php";
//võimaldab $SESSION-le ligipääsu
session_start();

//kontroll, kas $SESSION on õige (audentimine)
if (!key_exists('auth', $_SESSION) || $_SESSION['auth'] !== true) {
    require_once "authentication.php";
};
$userID = $_SESSION['user_id'];

?>

<button id="open_sesame">Vaheta parool</button>
<br>
<br>
<br>
<form method="post" id="change">
    <input type="password" placeholder="Uus parool" name="new"/>
    <input type="password" placeholder="Uue parooli kordus" name="new1"/>
    <button type="submit" value="Submit">OK</button>
</form>


<?php

if(!empty($_POST['new'])) {
    $passw = $_POST['new'];
//    print_r($passw);
    /*
    $query=$db->prepare('Select * from veebiturvalisus_aine.users where username=? and password=?');
    $query->execute(array($_GET["usern"], $_GET["passw"]));
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    print_r($rows);*/
    $db = Db::getInstance()->getConn();
    $q = $db->prepare("UPDATE csrf.users
    SET password = '$passw'");

    $q->execute();

}
?>

