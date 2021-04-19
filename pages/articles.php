<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include '../style.php' ?>
</head>
<body>
<?php include '../nav.php';
    include '../vars.php';
    include '../helpers/helper-php-funcs.php';
?>
    <div class="itemsMainDiv">

        <?php 
            if (isset($_SESSION['email'])) {
                echo '<h1>' . $articles . " במיוחד עבורך " . '</h1>';
                echo "<h3>" . $_SESSION['email'] ."</h3>";   

            } else {
                echo '<h1>' . $articles  . '</h1>';
                echo "<h4> אינך מחובר</h4>";
            }
        ?>

        <div class="articlesTopics">
            <?php 
                include '../arrays/images-array.php';
                global $myImgsArr;
                global $tinshemmet;
            ?>
            <?php 
                for ($i = 0; $i < count($myImgsArr); $i++){ ?>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> <!-- why did i have to do this? htmlspecialchars--> <?php                 
                        echo "<input type='hidden' class='hidden-topic' name='topic' value=$i>";
                        echo "<input type='image' src='$myImgsArr[$i]' name='topic-image' class='topic-image-button'/>";?>
                    </form> <?php
                }
            ?>

        </div>

        <div id="chosenTopic">
            <?php 
                if (isset($_POST['topic'])) {
                    // $choise = $_POST['topic'];
                    // echo "<br> <h3> You've chosen: </h3>" . $choise . "!!! <br>";

                    switch ($_POST['topic']) {
                        case '0':
                            echo "<div id='topic-name'> <h2> מאמרים בנושא תזונה </h2> </div>";
                            createArticlesArray('nutri');
                            break;
                        case '1':
                            echo "<div id='topic-name'> <h2> מאמרים בנושא נשימה </h2> </div>";
                            createArticlesArray('breath');
                            break;
                        case '2':
                            echo "<div id='topic-name'> <h2> מאמרים בנושא שינה </h2> </div>";
                            createArticlesArray('sleep');
                            break;
                        case '3':
                            echo "<div id='topic-name'> <h2> מאמרים בנושא מודעות </h2> </div>";
                            createArticlesArray('aware');
                            break;
                        case '4':
                            echo "<div id='topic-name'> <h2> מאמרים בנושא תנועה </h2> </div>";
                            createArticlesArray('motion');
                                        }
                } 
                else 
                {
                    console_log("no topic was chosen");
                };

                // for ($i = 0; $i < count($nutriArticles); $i++) {
                //     echo "<div><img src='$nutriArticles[$i]' width='300px' height='200px' alt='free soul'/></div>";
                // }

                if (isset($_POST['chosen-article'])){
                    $chosenArticle = $_POST['chosen-article'];
                    console_log("the chosen article id is: " . $chosenArticle);
                    articleFetch($chosenArticle); 
                    
                };

            ?>  
        </div>

    </div>

    <!-- <?php include '../footer.php'?> -->
    <?php include '../js-scripts.php'?>
        <script>
        changeNavbarCurrentPageColor('#articles');
    </script>
</body>

</html>

