<html>
    <head>
        <link type="text/css" href="themes/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="themes/default/css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <title>CSS-Schul-Forum</title>
    </head>

    <div class="headerfixedBar">
        <div class="row">
            <div class="col-lg-12">
                <div class="pullLeft">
                    <a class="headerlogoText" href="index.php" title="CSS-Schul-Forum"><img class="headerlogoImage" src="themes/default/images/150x150_Logo.png"> CSS-Schul-Forum</a>
                </div>

                <div class="pullRigth">
                    <a class="btn btn-primary themeButton" href="loginform/index.php" title="CSS-Schul-Forum">Login</a>
                </div>
            </div>

        </div>

    </div>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 paginationBar forumModule forumMargin">
                    <a href="index.php">Home</a> <!-- <i class="fa fa-chevron-right paginationArrow"></i> <a href="#">Kategorie</a> <i class="fa fa-chevron-right paginationArrow "></i> <a href="#">Diskusionen</a> -->
                </div>
            </div>

            <?php
            error_reporting(E_ERROR | E_PARSE);
            include '../Domain/Model/DBConnect.php';
            include '../Domain/Model/models.php';
            include '../Domain/Service/DBService.php';

            $Service = new \bll\service\DBService();

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
                <div id="<?php echo "category_" . $cat->id; ?>" class="row forumPad" style="display: block">
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
    </body>

    <script src="themes/default/js/forum_home.js"></script>
    <script src="themes/bootstrap/js/bootstrap.bundle.min.js"></script>
</html>