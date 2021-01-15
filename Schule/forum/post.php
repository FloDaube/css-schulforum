<html>
<head>
    <link type="text/css" href="themes/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="themes/adminltd3/css/adminlte.css"/>
    <link type="text/css" href="themes/default/css/style.css" rel="stylesheet"/>

    <?php
    error_reporting(E_ERROR | E_PARSE);
    include '../Domain/Model/DBConnect.php';
    include '../Domain/Model/models.php';
    include '../Domain/Service/DBService.php';

    $Service = new \bll\service\DBService();

    session_start();

    $post_id = $_GET["post"];
    $post = $Service->getPostById($post_id);
    $cat = $Service->getCategoryById($post->category_id);
    $replys = $Service->getReplys($post_id);
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
                <?php
                session_start();
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
            <a href="index.php">Home</a> <i class="fa fa-chevron-right paginationArrow"></i> <a href="#"><?php echo $cat->title; ?></a> <i class="fa fa-chevron-right paginationArrow "></i> <a href="#"><?php echo $post->title; ?></a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-widget">
                <div class="card-header">
                    <div class="user-block" style="width: 100%">
                        <span class="username">
                            <a href="#"><?php $user = $Service->getUserById($post->user_id); echo $user->name ?></a>
                        </span>
                        <span class="description ">
                            <?php $date = new DateTime($post->timestamp); echo $date->format( 'Y.m.d H:i'); ?>
                        </span>
                    </div>

                </div>
                <div class="card-body">
                    <h3 href="#"><?php echo $post->title; ?></h3>
                    <span class="text"><?php echo $post->text; ?></span>
                </div>
                <div class="card-footer card-comments">
                    <?php
                    foreach ($replys as $reply){
                       ?>
                    <div class="card-comment">
                        <div class="comment-text">
                            <span class="username">
                                <?php $user = $Service->getUserById($reply->user_id); echo $user->name ?>
                                <span class="text-muted float-right">
                                    <?php
                                    try{
                                        $date = new DateTime($reply->timestamp);
                                        echo $date->format( 'Y.m.d H:i');
                                    }catch (\mysql_xdevapi\Exception $e){
                                        echo "Error" . $e;
                                    } ?>
                                </span>
                                </span>
                            <?php
                            echo $reply->text;
                                ?>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                <?php
                if(isset($_SESSION['id']) != null){
                    ?>
                    <div class="card-footer">
                        <form action="<?php echo "insertReply.php?user_id=". $_SESSION['id'] ."&post_id=" . $post_id?>" method="Post">
                            <div class="img-push">
                                <input type="text" name="text" class="form-control form-control-sm" placeholder="Press enter to post comment">
                            </div>
                        </form>
                    </div>
                    <?php
                }
                ?>

            </div>
        </div>
    </div>

</div>
</body>

<script src="themes/default/js/forum_home.js"></script>
<script src="themes/bootstrap/js/bootstrap.bundle.min.js"></script>
</html>