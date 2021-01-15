<html>
<head>
    <link type="text/css" href="themes/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link type="text/css" href="themes/default/css/style.css" rel="stylesheet">
    <title>CSS-Schul-Forum</title>
</head>
<?php
error_reporting(E_ERROR | E_PARSE);
include '../Domain/Model/DBConnect.php';
include '../Domain/Model/models.php';
include '../Domain/Service/DBService.php';

$Service = new \bll\service\DBService();
session_start();
$cat_id = $_GET['cat_id'];
$user_id = $_SESSION['id'];
?>
<div class="headerfixedBar">
    <div class="row">
        <div class="col-lg-12">
            <div class="pullLeft">
                <a class="headerlogoText" href="index.php" title="CSS-Schul-Forum"><img class="headerlogoImage" src="themes/default/images/150x150_Logo.png"> CSS-Schul-Forum</a>
            </div>
            <div class="pullRigth">
                <?php
                if(isset($_SESSION['id']) == null){
                    ?>
                    <a class="btn btn-primary themeButton" href="loginform/index.php" title="CSS-Schul-Forum">Login</a>
                    <?php
                }else{
                    ?>
                    <a class="btn btn-primary themeButton" href="loginform/logout.php" title="CSS-Schul-Forum"><?php $user = $Service->getUserById($_SESSION['id']); echo $user->name;?> Logout</a>
                    <?php
                }
                ?>
            </div>

        </div>


    </div>

</div>

<body>
<div class="container">
    <div class="row">
        <div class="col-lg-12 paginationBar forumModule forumMargin">
            <div class="card">
                <form  method="post" action="<?php echo "insertPost.php?cat_id=" . $cat_id ."&user_id=" . $user_id;  ?>">
                    <div class="card-header">
                        <h4>Post Title</h4>
                        <input style="width: 100%" type="text" name="title">
                    </div>
                    <div class="card-body">
                        <h4>Inhalt</h4>
                        <textarea type="text" name="text" class="note-codable" style="width: 100%; height: 500px" role="textbox" aria-multiline="true"></textarea>
                        <button type="submit" class="btn btn-primary themeButton pullRigth" style="margin-top: 20px" >Speichern</button>
                    </div>
                </form>

            </div>
        </div>
    </div>



</div>
</body>

<script src="themes/default/js/forum_home.js"></script>
<script src="themes/bootstrap/js/bootstrap.bundle.min.js"></script>
</html>