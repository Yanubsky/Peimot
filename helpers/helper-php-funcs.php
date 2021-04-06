<?php 
include '../db/pdo-connection.php';
    global $con;

function console_log( $info ){
    echo '<script>';
    echo 'console.log('. json_encode( $info ) .')';
    echo '</script>';
};

function preArr ($arr){
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
};

function reArrayFiles($arr, $count) {
    $imagesArray= [];
    $filesKeys = array_keys($arr);

    for ($i=0; $i<$count; $i++) {
        foreach ($filesKeys as $key) {
            $imagesArray[$i][$key] = $arr[$key][$i];
        };
    };
    return $imagesArray;
};

//================================================================================================================================================================================

    // creating an array from the articles in the db and arrange it by topics (nutri,breath,sleep,aware,motion)
function createArticlesArray($desiredTopic){
    global $con;
    $selectArticleTopic = $con->prepare("SELECT id, topic, koteret, img FROM articles a JOIN images i 
                                         ON (a.id = i.articleId) WHERE a.topic = '".$desiredTopic."' GROUP BY a.id");
    $selectArticleTopic->setFetchMode(PDO::FETCH_ASSOC);
    $selectArticleTopic->execute();
    $chosenTopic = $selectArticleTopic->fetchAll();
   
    //     echo "createArticlesArray prints:";
    //    preArr($nutriArticles);     // checking which kind of an array wa fetched
   
    foreach($chosenTopic as $key => $val) { 
        // echo $key . "<br> ******* <br>";
         $artImg= $val['img'];
         $finalImg = stristr($artImg , "/myphp"); 
         $articleId = $val['id'];

        echo "<div class='article-details-and-image'>";
        echo "<br>" . " <h4>"  . $val['koteret'] . "</h4>" . "<br>";
        echo "<div class='chosen-topic-articles'>"; 
?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> <!-- why did i have to do this? htmlspecialchars-->  
<?php                 
          echo "<input type='hidden' class='hidden-article' name='chosen-article' value=$articleId>";
          echo "<input type='image' src='$finalImg' style='height: 300px; width:300px; padding: 20px' name='article-image' class='article-image-button'/>"
?>
        </form> 
<?php

            // echo "<br>" . "id : " . $val['id'];
            // echo "<br>" . " <h4>"  . $val['koteret'] . "</h4>";
            // echo "<br>" . "topic : " .  $val['topic'];
            // echo "<img src='$finalImg' style='height: 300px; width:300px; padding: 20px''>";
          echo "</div> </div>";
    };
    //==== another option for implementing the iteration on an array of arrays:    
    //    foreach ($nutriArticles as $oneArticleKey => $theCurrArticle) {
    //        foreach ($theCurrArticle as $k => $v) {
    //            echo "<br>" . $k . ": " . $v;
    //            if ($k === "img"){
    //             $artImg=$v;
    //             $finalImg = stristr($artImg , "/myphp");
    //             echo "<br>" . "<br> ****=====*** <br>" . "<img src='$finalImg' style='height: 600px; width:400px; padding: 20px''>" . "<br> ****=====*** <br>" ;
    //            }
    //        }
    //    }

};
//================================================================================================================================================================================

    //scan the input text from the admin for handling the uploaded article- pulling the images out, 
    //keep the text symbols and layout that the admin ment

function articleFetch($chosenArticleId){ // it is possible that the param $chosenArticleId should be required also(or instead) to txtScan()
    global $con;
    $selectArticle = $con->prepare("SELECT * FROM articles a JOIN images i 
                                    ON (a.id = i.articleId) WHERE a.id = '".$chosenArticleId."'");
    $selectArticle-> setFetchMode(PDO::FETCH_ASSOC);
    $selectArticle-> execute();
    $articleToScan = $selectArticle->fetch();

    // echo " <br> ===== <br>";
    // preArr($articleToScan);
    // echo " <br> ===== <br>";

    $fetchedId = $articleToScan['id'] ;
    $fetchedContent = $articleToScan['content'];
    // $fetchedKoteret= $articleToScan['koteret'];
    // $fetchedTopic = $articleToScan['topic'];
    // $fetchedPostDate = $articleToScan['postDate'];

    // console_log("article id is:" . $fetchedId );
    // console_log("article content is:" . $fetchedContent );
    // console_log("article koteret is:" . $fetchedKoteret );
    // console_log("article topic is:" . $fetchedTopic );
    // console_log("article date is:" . $fetchedPostDate );
    global $imageSourceName;
    global $finalImg;
    $txtToPublish = str_replace($imageSourceName, $finalImg, $fetchedContent);

    echo "<div id= 'being-read' dir='rtl'>" . $txtToPublish;

    echo "</div>";

    echo "<br> <div>" ; 
    imagesFetch($fetchedId);
    echo "</div>";
    

}
function imagesFetch($fetchedId){
    global $con;
    $selectImages =  $con->prepare("SELECT * FROM images WHERE images.articleId = '".$fetchedId."'");
    $selectImages->setFetchMode(PDO::FETCH_ASSOC);
    $selectImages->execute();
    $imagesToPrintArray = $selectImages->fetchAll();

    echo " <br> ***** <br>";
    preArr($imagesToPrintArray);
    echo " <br> ***** <br>";

    foreach($imagesToPrintArray as $key => $val){
        $relatedArticleId = $val['articleId'];
        $imageId = $val['imageId'];
        $imageSize = $val['size'];
        $imagetype = $val['imageType'];
        $imageUrl = $val['img'];
        $imageSourceName = $val['imageName'];

        $finalImg = stristr($imageUrl , "/myphp"); 

        echo "<div id=one-image><img src='$finalImg' width='500' height='600'> </div>";
        
    };


};

// function txtScan($rawTxt){
//     $textMap = array("(--)","(/--)","(-)","(..)");
//     $textValue = array("<h2>","</h2>","<br>","<br><br>");
//     for ($i=0;$i<count($textMap); $i++) {
//         $found = strpos($rawTxt, $textMap[$i]);
//         if ($found !== false) {
//             $subjectCount = 1;
//             for ($subjectCount=1;$found !== false; $subjectCount++) {
//                 $found++;
//                 strpos($rawTxt, $textMap[$i], $found);
//             } ;
//         };
//     };
// };
?>

