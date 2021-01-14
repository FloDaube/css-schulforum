<html>
<head>
    <link type="text/css" href="themes/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link type="text/css" href="themes/default/css/style.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="themes/adminltd3/css/adminlte.min.css"/>

    <?php
    error_reporting(E_ERROR | E_PARSE);
    include '../Domain/Model/DBConnect.php';
    include '../Domain/Model/models.php';
    include '../Domain/Service/DBService.php';

    $Service = new \bll\service\DBService();

    $post_id = $_GET["post"];
    $post = $Service->getPostById($post_id);
    ?>
    <title><?php echo $post->title;?></title>
</head>

<div class="headerfixedBar">
    <div class="row">
        <div class="col-lg-12">
            <div class="pullLeft">
                <a class="headerlogoText" href="index.php" title="CSS-Schul-Forum"><img class="headerlogoImage" src="themes/default/images/150x150_Logo.png"> CSS-Schul-Forum</a>
            </div>

            <div class="pullRigth">
                <a class="btn btn-primary themeButton" href="index.php?logout" title="CSS-Schul-Forum">Login</a>
            </div>
        </div>

    </div>

</div>

<body>
<div class="container">
    <div class="row">
        <div class="col-lg-12 paginationBar forumModule forumMargin">
            <a href="index.php">Home</a> <i class="fa fa-chevron-right paginationArrow"></i> <a href="#">Kategorie</a> <i class="fa fa-chevron-right paginationArrow "></i> <a href="#">Diskusion</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 forumModule ">
            <div class="card card-widget">
                <div class="card-header">
                    <span class="username">
                        <a href="#"><?php $user = $Service->getUserById($post->user_id); echo $user->name ?></a>
                    </span>
                    <span class="description">
                        <a href="#"><?php echo $post->timestamp ?></a>
                    </span>
                </div>
                <div class="card-body">

                </div>
                <div class="card-footer card-comments">

                </div>
            </div>
        </div>
    </div>

</div>
</body>

<script src="themes/default/js/forum_home.js"></script>
<script src="themes/bootstrap/js/bootstrap.bundle.min.js"></script>
</html>