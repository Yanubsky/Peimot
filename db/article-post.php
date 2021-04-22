<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'pdo-connection.php';
    include '../helpers/helper-php-funcs.php';
    postArticle();
    // header("location:/myphp/peimot/pages/home.php");
}

function postArticle() 
{
    global $con;
    if (isset($_POST['post-article'])) {
        $articleTopic = $_POST['articleSubject'];
        $articleName = $_POST['title'];
        $recievedContent = $_POST['text'];
        // reshaping the article 
        
        $textMap = array("(--)", "(---)", "(-)", "(..)", "(***)", "(****)", "|-|", "|--|");
        $textValue = array("<h2>", "</h2>", "<br>", "<br><br>", "<strong>", "</strong>", "<div id=one-image><img src='", "' width='500' height='600'> </div>");
        $content = str_replace($textMap, $textValue, $recievedContent);
            // checkig if the replacement was smooth:
        // for ($i=0;$i<count($textMap); $i++) {
        //     $found = strpos($recievedContent, $textMap[$i]);
        //     if ($found !== false) {
        //         $subjectCount = 1;
        //         for ($subjectCount=1;$found !== false; $subjectCount++) {
        //             $found++;
        //             strpos($recievedContent, $textMap[$i], $found);
        //         } ;
         
        //     };
        // };

        $updateArticles= $con->prepare(
            "CREATE TABLE IF NOT EXISTS articles(
                id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                topic varchar(10) NOT NULL,
                koteret varchar(60) NOT NULL,
                content text NOT NULL,
                postDate date NOT NULL,
                PRIMARY KEY (id),
                UNIQUE KEY (koteret)
            );"
        );
        $updateArticles->execute();

        $articlesQuery = "INSERT INTO `articles`
        (`topic`, `koteret`, `content`, `postDate`)
        VALUES
        (:topic,:koteret,:content, NOW())";

        $query1 = $con->prepare($articlesQuery);
            $query1->bindParam(':topic', $articleTopic);
            $query1->bindParam(':koteret', $articleName);
            $query1->bindParam(':content', $content);
        $query1->execute();
    
        $lastInsertId = $con->lastInsertId();
        //-------- images handle---------//
        $images = $_FILES['articleImages'];
        $countFiles = count($images['name']);
        if ($lastInsertId > 0 && $countFiles > 0 ) {
            $phpFileUploadErrors = array(
                0 => 'There is no error, the file uploaded with success',
                1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
                2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
                3 => 'The uploaded file was only partially uploaded',
                4 => 'No file was uploaded',
                6 => 'Missing a temporary folder',
                7 => 'Failed to write file to disk.',
                8 => 'A PHP extension stopped the file upload.',
            );
    
            $filesArray = reArrayFiles($images, $countFiles);
            for ($i=0;$i<count($filesArray);$i++) {
                if ($filesArray[$i]['error']) {
                    ?> <div class="alert alert-danger">
                         <?php echo $filesArray[$i]['name']. '-' . $phpFileUploadErrors[$filesArray[$i]['error']]; ?> </div><?php
                } 
                else 
                {
                    // getting the last added articleId
                    $select= $con->prepare("SELECT * FROM articles WHERE koteret = '$articleName'");
                    $select->setFetchMode(PDO::FETCH_ASSOC);
                    $select->execute();
                    $data=$select->fetch();

                    //saving the image on the server
                    $imageName = $filesArray[$i]['name'];
                    $tmpName = $filesArray[$i]['tmp_name']; 
                    $serverLocation = 'D:/xampp/htdocs/myphp/peimot/uploaded/';
                    $dirTale = $articleName . '_'; // this part is ment to let a hebrew dir-name.
                    if (!is_dir($serverLocation . $dirTale)){
                        $destination = mkdir($serverLocation . $dirTale);
                    };
                    // $destination = $serverLocation . $dirTale;
                    move_uploaded_file($tmpName, "$destination/$imageName");
                    
                    // populating vars for db query
                    $articleId = $data['id'];
                    $imageUrl = $destination . "/" . $imageName;
                    $imageSize = $filesArray[$i]['size'];
                    $imageType = $filesArray[$i]['type'];

                    $updateImgs = $con->prepare(
                        "CREATE TABLE IF NOT EXISTS images(
                            articleId INT (10) UNSIGNED NOT NULL,
                            imageId INT (10) UNSIGNED NOT NULL AUTO_INCREMENT,
                            imageName varchar (55),
                            img varchar,
                            size varchar (55),
                            imageType varchar (55),
                            -- themeImage boolean,
                            PRIMARY KEY (imageId),
                            FOREIGN KEY (articleId) REFERENCES articles(id)                
                        );"
                    );
                    $updateImgs->execute();
                    $imgsQuery = "INSERT INTO `images`
                    (`articleId`,`imageName`,`img`,`size`,`imageType`)
                    VALUES
                    (:articleId,:imageName,:img,:size,:imageType)";
                    $query3 = $con->prepare($imgsQuery);
                        $query3->bindParam(':articleId', $articleId);
                        $query3->bindParam(':imageName', $imageName);
                        $query3->bindParam(':img', $imageUrl);
                        $query3->bindParam(':size', $imageSize);
                        $query3->bindParam(':imageType', $imageType);
                    $query3->execute();
                    $lastInsertId_images = $con->lastInsertId();
                    if($lastInsertId_images > 0 && $lastInsertId_images !== $lastInsertId) {
                        echo `<h1> המאמר על בהצלחה</h1>`;
                        header("location:/myphp/peimot/pages/articles.php");
                    } 
                    else 
                    {
                        echo "<h2>המאמר לא התווסף לאתר, **בעיה בהוספת תמונות** אנא נסה שוב או פנה לתמיכה אם התקלה נשנית</h2>";
                        // i want the next code line will run only after 5 sec
                        sleep(5);
                        header("location:/myphp/peimot/pages/admin.php");
                    }
                }
            }
        }
    }
    else
    {
       
        header("location:/myphp/peimot/pages/admin.php");
    }
}


?>