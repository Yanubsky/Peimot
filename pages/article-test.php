<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="admin-form">
    <?php 
        include '../js-scripts.php';
        include '../style.php';
    ?>
    <form action="../db/article-post.php" id="newArticle" method="POST" enctype="multipart/form-data" ></form>
        <fieldset>
            <legend> מאמרים </legend>
            <p>אפשרות לסמן מאמר בבחירה מרובה לשם מחיקה ובנוסף מקום להוספת מאמרים חדשים טקסט ותמונות</p>
            <select id="articleSubject" required>
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
                <label for="paragraph1" ></label>
                <textarea name="paragraph1" class="paragraph1" placeholder="...הכנס/הדבק טקסט" autofocus required cols="91" rows="20"></textarea>
                <br>
                <label for="articleImg1">.אנא הוסף קבצי תמונות בלבד. חשוב לשמור על איכות תמונה גבוהה</label>
                <input type="file"  name="articleImg1" class="articleImg" accept="image/*"  >
                <button id="tempBtn" onclick="addArticleSection()">הוסף פסקה</button>
            </div>
            <br><br>
            <button name="newArticle" value="newArticle">פרסום המאמר</button>
            <br><br>
        </fieldset>
    </form>
</div>

</body>
</html>