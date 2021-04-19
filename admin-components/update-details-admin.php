<div class="form-main-div">
    <form action="./db/updateDetails.php" id="update-details" method="POST">
        <fieldset>
            <legend> עדכון פרטים </legend>
            <input type="text" name="email" placeholder='שם משתמש'>
            <br>
            <input type="password" name="pass" id="regPass" placeholder="החלף סיסמא">
            <br>
            <input type="password" name="confirmPass" id="confirmPass" placeholder="אישור סיסמא">
            <br>
            <input type="password" name="oldPass" id="oldPass" placeholder="סיסמא קודמת">
            <br>
            <button name="update" value="UPDATE">עדכון</button>
            <br><br>
        </fieldset>
    </form>
</div>
