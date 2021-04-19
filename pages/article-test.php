<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article-Test</title>
</head>
<body>
<div class="admin-form" style="float: right;">
    <?php 
        include '../js-scripts.php';
        include '../style.php';
        include '../helpers/helper-php-funcs.php';
    ?>
    <div style="padding:20px; color:black;">
      <?php 
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
        if(isset($_FILES['articleImages'])){ 
            $sentImages = $_FILES['articleImages'];
            $countFiles = count($sentImages['name']);
            echo "<h2>The number of uploaded images is: " . $countFiles  . "</h2>". "<br>" . "*******************" . "<br>";

            // re-organize $_FILES array for an easier handle.

            // preArr($sentImages);
            $filesArray = reArrayFiles($sentImages, $countFiles);
            // echo "<br>***<br>";
            // preArr($filesArray);
            // echo "<br>***<br>";

            for ($i=0;$i<count($filesArray);$i++) {
                if($filesArray[$i]['error']){
                    ?> <div class="alert alert-danger">
                         <?php echo $filesArray[$i]['name']. '-' . $phpFileUploadErrors[$filesArray[$i]['error']];
                    ?> </div><?php 
                    
                }
                $articleName = $_POST['title'];
                $dirTale = $articleName . '_'; // this part is ment to let a hebrew dir-name.
                if (!is_dir('D:/xampp/htdocs/myphp/peimot/uploaded/' . $dirTale)){
                    mkdir('D:/xampp/htdocs/myphp/peimot/uploaded/' . $dirTale);
                };
                $destination = 'D:/xampp/htdocs/myphp/peimot/uploaded/' . $dirTale;
                $baseName = $filesArray[$i]['name'];
                $ext = pathinfo($baseName, PATHINFO_EXTENSION);
                echo "The file type is: " . $ext . "<br>";
                // $name = strval(time()) . ".$ext";
                $name = $filesArray[$i]['name'];
                move_uploaded_file($filesArray[$i]['tmp_name'], "$destination/$name");
                $imagePath = $destination . "/" . $name;
                echo "<h2>The image path on the server is:</h2> <br>" . $imagePath . "<br><br>";
                $showImage ="/myphp/peimot/uploaded/" . $dirTale . "/" . $name;
                echo "Pic: " .$i . "<div class='show-pics'> 
                   <img src='$showImage' style='height: 600px; width:400px; padding: 20px'>
                 </div>";

            }
        }
        ?>
                <div class="articlesTopics">
        <?php 
        for ($i = 0; $i < count($myImgsArr); $i++){ ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> <!-- why did i have to do this? htmlspecialchars--> <?php                 
                echo "<input type='hidden' class='hidden-topic' name='topic' value=$i>";
                echo "<input type='image' src='$myImgsArr[$i]' name='topic' class='topic-image-button'/>";?>
            </form> <?php
        } ?>
        </div>
        <?php
        if (isset($_POST['topic'])) {
            // $choise = $_POST['topic'];
            // echo "<br> <h3> You've chosen: </h3>" . $choise . "!!! <br>";
            echo "<br> <div>";
            switch ($_POST['topic']) {
                case '0':
                    echo '<h2> nutri </h2>';
                    createArticlesArray('nutri');
                    break;
                case '1':
                    echo '<h2> breath </h2>';
                    createArticlesArray('breath');
                    break;
                case '2':
                    echo '<h2> sleep </h2>';
                    createArticlesArray('sleep');
                    break;
                case '3':
                    echo '<h2> aware </h2>';
                    createArticlesArray('aware');
                    break;
                case '4':
                    echo '<h2> motion </h2>';
                    createArticlesArray('motion');

                        }
            echo  "</div>";
        } 
      ?>

    </div>
 

    <div>
        <form action="article-test.php" id="newArticle" method="POST" enctype="multipart/form-data" >
            <fieldset>
                <legend> מאמרים </legend>
                <p>אפשרות לסמן מאמר בבחירה מרובה לשם מחיקה ובנוסף מקום להוספת מאמרים חדשים טקסט ותמונות</p>
                <select id="articleSubject" name="articleSubject" required>
                    <option value="" disabled selected >בחר נושא</option>
                    <option value="nutri">תזונה</option>
                    <option value="breath">נשימה</option>
                    <option value="sleep">שינה</option>
                    <option value="aware">מודעות</option>
                    <option value="motion">תנועה</option>
                </select>
                <label for="articleSubject">:נושא המאמר</label>
                <br>
                <input type="text" name="title" size="91" required placeholder='כותרת'>
                <br><br>
                <div id="article-body">
                    <label for="text" ></label>
                    <textarea name="text" class="text" placeholder="...הכנס/הדבק טקסט" autofocus required cols="91" rows="20"></textarea>
                    <br>
                    <label for="articleImages">.אנא הוסף קבצי תמונות בלבד. חשוב לשמור על איכות תמונה גבוהה</label>
                    <input type="file" name="articleImages[]" class="articleImages" multiple accept="image/*">
                </div>
                <br><br>
                <button name="post-article" value="post-article">פרסום המאמר</button>
                <br><br>
            </fieldset>
        </form>
        
    </div>
</div>

</body>
</html>