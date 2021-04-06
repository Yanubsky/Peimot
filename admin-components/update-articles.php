<div class="admin-form">
    <?php 
        // include '../js-scripts.php';
        include '../style.php';
    ?>
    <form id="post-article" method="POST" action="../db/article-post.php" enctype="multipart/form-data" >
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
