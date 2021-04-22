<?php 
include '../db/pdo-connection.php';
    global $con;
    $fetchedContent;

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
    $filesKeys = array_keys($arr); // returns the keys of an assoc array

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
    $chosenTopicArticlesArray = $selectArticleTopic->fetchAll();
   
    //     echo "createArticlesArray prints:";
    //    preArr($nutriArticles);     // checking which kind of an array was fetched
   
    foreach($chosenTopicArticlesArray as $key => $val) { 
        // echo $key . "<br> ******* <br>";

        $artImg= $val['img'];
        $finalImg = stristr($artImg , "/myphp"); 
        $articleId = $val['id'];

        echo "<div class='article-details-and-image'>";
        echo "<br>" . " <h4>"  . $val['koteret'] . "</h4>" . "<br>";
        echo "<div class='chosen-topic-articles'>"; 
?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
<?php                 
          echo "<input type='hidden' class='hidden-article' name='chosen-article' value=$articleId>";
          echo "<input type='image' src='$finalImg' style='height: 300px; width:300px; padding: 20px' name='article-image' class='article-image-button'/>"
?>
        </form>
<?php
          echo "</div> </div>";
    };
//========= another option for implementing the iteration on an array of arrays: ============   
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

    //fetching the article and the related images and replacing the images names with the urls for the final printing of the article on the screen

function articleFetch($chosenArticleId){ 
    global $con;

    $selectArticle = $con->prepare("SELECT content FROM articles a WHERE a.id = '".$chosenArticleId."'");
    $selectArticle-> setFetchMode(PDO::FETCH_ASSOC);
    $selectArticle-> execute();
    $contentToScan = $selectArticle->fetch();

    $selectImages = $con->prepare("SELECT * FROM images i WHERE i.articleId = '".$chosenArticleId."'");
    $selectImages->setFetchMode(PDO::FETCH_ASSOC);
    $selectImages->execute();
    $imagesArray = $selectImages->fetchAll();

    $positionsArray = array();
    $urlsArray = array();
    foreach($imagesArray as $curr){
        $positionInText = $curr['imageName'];
        array_push($positionsArray,$positionInText);

        $imageUrl = $curr['img'];
        $finalImg = stristr($imageUrl , "/myphp"); 
        array_push($urlsArray, $finalImg);
    }
    $txtToPublish = str_replace($positionsArray, $urlsArray, $contentToScan);
    $printableArticle = $txtToPublish['content'];
    echo "<div id='being-read' dir='rtl'>" . "<br>". $printableArticle . "<br>";
    echo "</div>";

}
?>

