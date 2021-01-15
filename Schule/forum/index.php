<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
?>
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
                <div class="col-lg-10 paginationBar forumModule forumMargin">
                    <a href="index.php" style="font-size: 1.5em">Home</a> <!-- <i class="fa fa-chevron-right paginationArrow"></i> <a href="#">Kategorie</a> <i class="fa fa-chevron-right paginationArrow "></i> <a href="#">Diskusionen</a> -->
                </div>
                <div class="col-lg-2 paginationBar forumModule forumMargin">
                    <?php
                    if(isset($_SESSION['id']) != null){
                        ?>
                        <!--<button type="button" class="btn btn-primary themeButtonMin"><i class="fa fa-plus paginationArrow" data-toggle="modal" data-target="#myModal"></i>New Kategorie</button>-->
                        <button type="button" class="btn btn-info btn-lg themeButtonMin" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus paginationArrow" data-toggle="modal" data-target="#myModal"></i>New Kategorie</button>
                        <?php
                    }
                    ?>
                </div>
            </div>




            <?php


            $cats = $Service->getCategorys();
            foreach ($cats as $cat){
                $posts = $Service->getPosts($cat->id);
                ?>
                <div  onclick="showDisscussions('<?php echo "category_" . $cat->id; ?>')" class="row categoryModule">
                    <div class="col-lg-12 columepad">
                        <div class="pullLeft">
                            <h1><?php echo $cat->title?></h1>
                        </div>
                        <div class="pullRigth" style="margin-top: 10px">
                            <?php
                            echo $cat->count . " Diskusionen";
                            ?>
                        </div>
                    </div>
                </div>
                <div id="<?php echo "category_" . $cat->id; ?>" class="row forumPad" style="display: none">
                    <?php
                    if(isset($_SESSION['id']) != null){
                    ?>
                        <a class="btn btn-primary themeButtonMin" href="newPost.php?cat_id=<?php echo $cat->id; ?>"><i class="fa fa-plus paginationArrow"></i>New Post</a>
                    <?php
                    }
                    ?>



                    <table class="forumTable">
                        <thead>
                        <th>
                            Thema
                        </th>
                        <th>
                            Autor
                        </th>
                        <th class="pullRigth">
                            Antworten
                        </th>
                        </thead>
                        <?php
                        foreach ($posts as $post){
                        ?>
                            <tr class="forumModule">
                                <td>
                                    <a href="post.php?post=<?php echo $post->id; ?>"><?php echo $post->title; ?></a>
                                </td>
                                <td>
                                    <a href="#"><?php
                                        $user = $Service->getUserById($post->user_id);
                                        echo $user->name;
                                        ?></a>
                                </td>
                                <td class="pullRigth">
                                    <?php echo $post->countreplys; ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </div>
            <?php
            }
            ?>
        </div>


        <!-- Modal new Category -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <form action="insertCategory.php" method="post">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Name der Kategorie</h4>
                        </div>
                        <div class="modal-body">
                            <input name="title">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Abbrechen</button>
                            <button type="submit" name="submit" class="btn btn-primary themeButtonMin">Speichern</button>
                        </div>
                    </div>
                </form>



            </div>
        </div>
    </body>

    <script src="themes/default/js/forum_home.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</html>