<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'pdo-connection.php';
    postArticle();
    // header("location:/myphp/peimot/pages/home.php");
}

function postArticle() 
{
    global $con;
    if (isset($_POST['post-article'])) {
        $articleTopic = $_POST['articleSubject'];
        $articleName = $_POST['title'];
        $updateArticles= $con->prepare("CREATE TABLE IF NOT EXISTS Articles(
            ArticleId int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
            Title varchar(60) NOT NULL,
            Topic varchar(10) NOT NULL,
            PRIMARY KEY (ArticleId)
            );"
        );
        $updateArticles->execute();

        $articlesQuery = "INSERT INTO `articles`
        (`topic`, `title`)
        VALUES
        (:topic,:title)";

        $query1 = $con->prepare($articlesQuery);

        $query1->bindParam(':topic', $articleTopic);
        $query1->bindParam(':title', $articleName);

        $query1->execute();

        $lastInsertId = $con->lastInsertId();
        //-------- paragraphs handle---------//
        if ($lastInsertId > 0 ) { 
            $prg1 = $_POST['paragraph1'];


            if(isset($_POST['paragraph2'])){
                $prg2 = $_POST['paragraph2'];

                if(isset($_POST['paragraph3'])){
                    $prg3 = $_POST['paragraph3'];
        
                }
            }
            
            $updatePrgs = $con->prepare("CREATE TABLE IF NOT EXISTS Paragraphs(
                ArticleId INT (10) UNSIGNED NOT NULL,
                ParId INT (10) UNSGIGNED NOT NULL AUTO_INCREMENT,
                Paragraph TEXT,
                PRIMARY KEY (ParId),
                FOREIGN KEY (ArticleId) REFERENCES Articles(ArticleId)                
                );"
            );
            $updatePrgs->execute();
            $prgsQuery = "INSERT INTO `Paragraphs`
            (`Paragraph`)
            VALUES
            (:Paragraph1)";
            $query2 = $con->prepare($prgsQuery);

            $query2->bindParam(':Paragraph1', $prg1);
            $query2->bindParam(':Paragraph2', $prg2);
            $query2->bindParam(':Paragraph3', $prg3);

            $query2->execute();
            // can i use the below condition as a loop inside itself?? i have an issue debugging with PHP... 
            $lastInsertId = $con->lastInsertId();
            if ($lastInsertId > 0 ) { // added images handle
                $img1 = $_POST['articleImg1'];
                if(isset($_POST['articleImg2'])){
                    $img2 = $_POST['articleImg2'];
                    if(isset($_POST['articleImg3'])){
                        $img3 = $_POST['articleImg3'];
        
                    }
                }
                $updateImgs = $con->prepare("CREATE TABLE IF NOT EXISTS Images(
                    ArticleId INT (10) UNSIGNED NOT NULL,
                    ImageId INT (10) UNSIGNED NOT NULL AUTO_INCREMENT,
                    Img LONGBLOB,
                    PRIMARY KEY (ImageId),
                    FOREIGN KEY (ArticleId) REFERENCES Articles(ArticleId)                
                    );"
                );
                $updateImgs->execute();
                $imgsQuery = "INSERT INTO `Images`
                (`Image1`)
                VALUES
                (:Image1)";
                $query3 = $con->prepare($imgsQuery);

                $query3->bindParam(':Image1', $img1);
                $query3->bindParam(':Image2', $img2);
                $query3->bindParam(':Image3', $img3);

                $query3->execute();
                $lastInsertId = $con->lastInsertId();
                if ($lastInsertId > 0 ) {
                    echo `<h1> המאמר על בהצלחה</h1>`;
                    // i want the next code line will run only after 5 sec
                    header("location:/myphp/peimot/pages/articles.php");
                }
                else
                {
                    echo "<h2>המאמר לא התווסף לאתר, **בעיה בהוספת תמונות** אנא נסה שוב או פנה לתמיכה אם התקלה נשנית</h2>";
                    // i want the next code line will run only after 5 sec
                    header("location:/myphp/peimot/pages/articles.php");
                }
        

            }
            else
            {
                echo "<h2>המאמר לא התווסף לאתר, **בעיה בהוספת טקסט** אנא נסה שוב או פנה לתמיכה אם התקלה נשנית</h2>";
                // i want the next code line will run only after 5 sec
                header("location:/myphp/peimot/pages/home.php");

            }
    
         
        }
        else
        {
            echo "<h2>המאמר לא התווסף לאתר, אנא נסה שוב או פנה לתמיכה אם התקלה נשנית</h2>";
            // i want the next code line will run only after 5 sec
            header("location:/myphp/peimot/pages/about.php");

        }



    }
}

?>