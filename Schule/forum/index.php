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
                    <a class="btn btn-primary themeButton" href="index.php?logout" title="CSS-Schul-Forum">Login</a>
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

            <div  onclick="showDisscussions('category_Name1')" class="row categoryModule">
                <div class="col-lg-12 columepad">
                    <div class="pullLeft">
                        <h1>Category Name</h1>
                    </div>
                    <div class="pullRigth" style="margin-top: 10px">
                        1234Discusions
                    </div>
                </div>
            </div>
            <div id="category_Name1" class="row forumPad" style="display: block">
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
                    <tr class="forumModule">
                        <td>
                            <a href="#">Thema</a>
                        </td>
                        <td>
                            <a href="#">Autor</a>
                        </td>
                        <td class="pullRigth">
                            TEst
                        </td>
                    </tr>
                    <tr class="forumModule">
                        <td>
                            <a href="#">Thema</a>
                        </td>
                        <td>
                            <a href="#">Autor</a>
                        </td>
                        <td class="pullRigth">
                            TEst
                        </td>
                    </tr>
                    <tr class="forumModule">
                        <td>
                            <a href="#">Thema</a>
                        </td>
                        <td>
                            <a href="#">Autor</a>
                        </td>
                        <td class="pullRigth">
                            TEst
                        </td>
                    </tr>
                </table>
            </div>

            <div  onclick="showDisscussions('category_Name2')" class="row categoryModule">
                <div class="col-lg-12 columepad">
                    <div class="pullLeft">
                        <h1>Category Name</h1>
                    </div>
                    <div class="pullRigth" style="margin-top: 10px">
                        1234Discusions
                    </div>
                </div>
            </div>
            <div id="category_Name2" class="row forumPad" style="display: block">
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
                    <tr class="forumModule">
                        <td>
                            <a href="#">Thema</a>
                        </td>
                        <td>
                            <a href="#">Autor</a>
                        </td>
                        <td class="pullRigth">
                            TEst
                        </td>
                    </tr>
                    <tr class="forumModule">
                        <td>
                            <a href="#">Thema</a>
                        </td>
                        <td>
                            <a href="#">Autor</a>
                        </td>
                        <td class="pullRigth">
                            TEst
                        </td>
                    </tr>
                    <tr class="forumModule">
                        <td>
                            <a href="#">Thema</a>
                        </td>
                        <td>
                            <a href="#">Autor</a>
                        </td>
                        <td class="pullRigth">
                            TEst
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </body>

    <script src="themes/default/js/forum_home.js"></script>
    <script src="themes/bootstrap/js/bootstrap.bundle.min.js"></script>
</html>