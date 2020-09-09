<?php
include_once('./functions/db.php');
include_once('./functions/queries.php');
include_once('./models/admin.php');
$DB = new DB();
function checkSession()
{
    if (!isset($_SESSION['admin']) || empty($_SESSION['admin'])) {
        header("Location: index.php");
        exit;
    }
}
function checkLevel($level)
{
    checkSession();
    $admin = unserialize($_SESSION['admin']);
    if ($admin->level < $level) {
        echo '<div class="ui floating error message mcenter">
            <p>You have no right to do this!</p>
          </div>';
        exit;
    }
}
?>
<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>2MBEAUTY 2020 | SG</title>
    <link rel="stylesheet" type="text/css" href="assets/semantic/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon" />
    <script src="assets/semantic/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
    <script src="assets/semantic/semantic.min.js"></script>
    <script>
    function home() {
        //alert("asd");
        window.location.href = 'index.php';
    }
    </script>
</head>

<body>
    <img src="assets/images/logo.jpg" class="mcenter logo" onclick="home()">
    <div class="ui centered grid">
        <div class="row">
            <div class="eleven wide computer only fourteen wide mobile tablet only column">
                <?php
                if (isset($_SESSION['admin']) && !empty($_SESSION['admin'])) {
                    echo '<div class="ui three item menu">
                <a href="./costumers.php" class="item">Costumers</a>
                <a href="./log.php" class="item">Log</a>
                <a href="./logout.php" class="item">Logout</a>
            </div>';
                }
                ?>
            </div>
        </div>
    </div>