<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>RabIT 2020 | SG</title>
    <link rel="stylesheet" type="text/css" href="assets/semantic/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <script src="assets/semantic/jquery-3.1.1.min.js"></script>
    <script src="assets/semantic/semantic.min.js"></script>
    <script>
        function home() {
            window.location.href = 'https://www.rabit.hu/';
        }
        function back() {
            window.location.href = './';
        }
    </script>
</head>

<body>
    <div class="ui centered grid" >
        <div class="row"></div>
        <div class="row">
            <div class="six wide computer only sixteen wide mobile only tablet only column">
                <img src="assets/images/logo.png" class="mcenter logo" onclick="home()">
            </div>
        </div>

        <?php
$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : '/';

if ($url == '/')
{
    include_once ('./views/Index.php');

    $indexView = new IndexView();

    print ($indexView->make());

}
else
{

    $req = ucfirst($url[0]);
    $reqSingular = $req;
    if(substr($reqSingular, -1) === 's')
    {
        $reqSingular = substr($reqSingular, 0, -1);
    }
    $ctrlPath = __DIR__ . '/controllers/' . $reqSingular . '.php';
    if (file_exists($ctrlPath))
    {
        include_once ('./models/DB.php');
        $DB = new DB();
        require_once $ctrlPath;
        require_once __DIR__ . '/views/' . $req . '.php';
        require_once __DIR__ . '/models/' . $reqSingular . '.php';

        $modelName = ucfirst($reqSingular) . '';
        $controllerName = ucfirst($reqSingular) . 'Controller';
        $viewName = ucfirst($req) . 'View';

        $controllerObj = new $controllerName($DB);
        $viewObj = new $viewName($controllerObj);
        print ($viewObj->make());
    }
    else
    {

        header('HTTP/1.1 404 Not Found');
        die('404 - The file - ' . $ctrlPath . ' - not found');
        
    }
}

?>
        <div class="footer row">
            <div class="sixteen wide center aligned column">
            <link rel="stylesheet" type="text/css" href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
                <b style="color:#ac2929">2020 RabIT</b>
            </div>
        </div>
    </div>
</body>

</html>