<script>
    // shorten querySelector funcs
    function qs(whichElems){
       return document.querySelector(whichElems);
    };
    function qsa(whichElems){
       return document.querySelectorAll(whichElems)
    };


    // make navbar fixed position and tranparent when scrolling
    let prevAmountOfPixlesScrolledFromTop = 0;
    let scrollDirection = 'down';

    window.addEventListener('scroll', () => {
        let xAmountOfPixlesToMakeNavFixedPosition = 10;
        let xAmountOfPixlesToMakeNavTransparent = 50;

        if (prevAmountOfPixlesScrolledFromTop < window.pageYOffset) {
            scrollDirection = 'down';
        } else {
            scrollDirection = 'up';
        }
        prevAmountOfPixlesScrolledFromTop  = window.pageYOffset;

        if (window.pageYOffset >= xAmountOfPixlesToMakeNavFixedPosition && 
            window.pageYOffset <= xAmountOfPixlesToMakeNavFixedPosition + 300 &&
            scrollDirection == 'down') {
            qs('.header').classList.add('onscroll-nav-fixed');
        } else if (window.pageYOffset <= xAmountOfPixlesToMakeNavFixedPosition &&
            scrollDirection == 'up') {
            qs('.header').classList.remove('onscroll-nav-fixed');
        }

        if (window.pageYOffset >= xAmountOfPixlesToMakeNavTransparent &&
            window.pageYOffset <= xAmountOfPixlesToMakeNavTransparent + 300 &&
            scrollDirection == 'down') {
                qs(".header").classList.add('onscroll-nav-transparent');
            } else if (window.pageYOffset <= xAmountOfPixlesToMakeNavTransparent &&
                scrollDirection == 'up') {
                qs(".header").classList.remove('onscroll-nav-transparent');
                }   

    });
    //=========================================================================================

    function changeNavbarCurrentPageColor(currentItem) {
            var navItems = qsa(".main-nav a");
            for (i = 0; i < navItems.length; ++i) {
                navItems[i].classList.remove('currentNavItem');
            }
            qs(currentItem).classList.add('currentNavItem');
        } 
    //===================================================================================================

    function changeAdminCurrentComponentColor(currentBtn) {
       qs(currentBtn).style.backgroundColor = "var(--theme-color-btn-pressed)";
       qs(currentBtn).style.color = "var(--theme-color-header2)";
       qs(currentBtn).style.borderColor = "var(--theme-color-header2)";
        } 
    //===================================================================================================

    function passConfirm(pass,confirm) {
    if(pass!==confirm){
        qs(".input.confirmPass").classList.add("err");
    } 
    else {  
        qs(".input.confirmPass").classList.remove("err");
    };
    } ; 

    //===================================================================================================
    //   this function is onclick related to update-article form and adds another section
    //   to the form in which the user can upload another paragraph and another related img
    // i'd like to create an incrementing value to each newInputTxt & newInputImg 
    //(or maybe for each containing div is easier) so i can easily manage the DB

    // var articlePrgNumber = 2;

    // function addArticleSection() {
    //     const newArticleDiv = document.createElement("div");
    //     newArticleDiv.className = "article-body2";
        
    //     var articlePrgName = "paragraph" + articlePrgNumber;
    //     const newTextarea = document.createElement("textarea");
    //     newTextarea.className = articlePrgName;
    //     newTextarea.setAttribute('type', 'text');
    //     newTextarea.setAttribute('name', articlePrgName);
    //     newTextarea.setAttribute('rows', '20');
    //     newTextarea.setAttribute('cols', '91');
    //     newTextarea.setAttribute('autofocus','true');
    //     newTextarea.setAttribute('required','true');
    //     newTextarea.setAttribute('placeholder', '...הכנס/הדבק טקסט');


    //     const newLbl = document.createElement("lable");
    //     newLbl.className = articleImgName;
    //     newLbl.setAttribute('for', articleImgName);
    //     const lblTxt = document.createTextNode(".אנא הוסף קבצי תמונות בלבד. חשוב לשמור על איכות תמונה גבוהה");
    //     newLbl.appendChild(lblTxt);

    //     var articleImgName = "articleImg" + articlePrgNumber;
    //     const newInputImg = document.createElement("input");
    //     newInputImg.className = articleImgName;
    //     newInputImg.setAttribute('type', 'file');
    //     newInputImg.setAttribute('name', articleImgName);
    //     newInputImg.setAttribute('accept', 'image/*');

    //     const addPrgBtn = document.createElement("button");
    //     addPrgBtn.id = "tempBtn";
    //     addPrgBtn.setAttribute('onclick', 'addArticleSection()');
    //     const prgBtnTxt = document.createTextNode("הוסף פסקה");
    //     addPrgBtn.appendChild(prgBtnTxt);

    //     const br = document.createElement("br");
    //     function removeTempBtn(){
    //        var tempBtn = document.getElementById('tempBtn');
    //        tempBtn.remove();
    //     };
    //     removeTempBtn();

    //     newArticleDiv.appendChild(newTextarea);
    //     newArticleDiv.appendChild(br);
    //     newArticleDiv.appendChild(newLbl);
    //     newArticleDiv.appendChild(newInputImg);
    //     newArticleDiv.appendChild(addPrgBtn);
    //     let currentDiv = document.getElementById("article-body");
    //     currentDiv.insertBefore(newArticleDiv, null);

    //     // returning the number of times the func was invoked 
    //     // in order to increment newTextarea.className & newInputImg.className
        
    //     articlePrgNumber++;
    //     console.log(`the next prgNumber will be ${articlePrgNumber}`);
        
    // }
//===================================================================================================
//  beneath i tried to implement the above function preparing elemnts vars in order to use in multiple admin components and save code lines - it didn't work so well

    // const inputTxtEl = document.createElement('input');
    // const inputImgEl = document.createElement('input');
    // const divEl = document.createElement('div');
    // const lblEl = document.createElement('lable');
    // const brEl  = document.createElement('br');
    // const lblTxt = document.createTextNode("לצרף תמונה");

    // function addArticleSection() {
    //     const articleDiv = divEl;
    //     articleDiv.className = "article-body";

    //     let articleInputTxt = inputTxtEl;
    //     articleInputTxt.className = "article-text";
    //     articleInputTxt.setAttribute('type', 'text');
    //     articleInputTxt.setAttribute('name', 'paragraph');

    //     const articleImgLbl = lblEl;
    //     articleImgLbl.className = "articleImg";
    //     articleImgLbl.setAttribute('for', 'articleImg');
    //     articleImgLbl.appendChild(lblTxt);

    //     let articleInputImg = inputImgEl;
    //     articleInputImg.className = "articleImg";
    //     articleInputImg.setAttribute('type', 'file');
    //     articleInputImg.setAttribute('name', 'articleImg');
    //     articleInputImg.setAttribute('accept', 'image/*');


    //     articleDiv.appendChild(articleInputTxt);
    //     articleDiv.appendChild(brEl);
    //     articleDiv.appendChild(articleImgLbl);
    //     articleDiv.appendChild(articleInputImg);
    //     let currentDiv = document.getElementById("article-body");
    //     currentDiv.insertBefore(articleDiv, null);
        
    // }


    //===================================================================================================

    // function addAboutPrg() {
    //     const newAboutDiv = document.createElement("div");
    //     newAboutDiv.className = "about-text";

    //     const aboutInputTxt = document.createElement("input");
    //     aboutInputTxt.className = "about-par";
    //     aboutInputTxt.setAttribute('type', 'text');
    //     aboutInputTxt.setAttribute('name', 'par');

    //     const newAboutLbl = document.createElement("lable");
    //     newAboutLbl.className = "about-img";
    //     newAboutLbl.setAttribute('for', 'about-img');
    //     const lblTxt = document.createTextNode("לצרף תמונה");
    //     newAboutLbl.appendChild(lblTxt);

    //     const aboutInputImg = document.createElement("input");
    //     aboutInputImg.className = "about-img";
    //     aboutInputImg.setAttribute('type', 'file');
    //     aboutInputImg.setAttribute('name', 'about-img');
    //     aboutInputImg.setAttribute('accept', 'image/*');

    //     const addPrgBtn = document.createElement("button");
    //     addPrgBtn.id = "tempBtn";
    //     addPrgBtn.setAttribute('onclick', 'addAboutPrg()');
    //     const prgBtnTxt = document.createTextNode("הוסף פסקה");
    //     addPrgBtn.appendChild(prgBtnTxt);
        
    //     const br = document.createElement("br");

    //     function removeTempBtn(){
    //        var tempBtn = document.getElementById('tempBtn');
    //        tempBtn.remove();
    //     };
    //     removeTempBtn();

    //     newAboutDiv.appendChild(aboutInputTxt);
    //     newAboutDiv.appendChild(br);
    //     newAboutDiv.appendChild(newAboutLbl);
    //     newAboutDiv.appendChild(aboutInputImg);
    //     newAboutDiv.appendChild(addPrgBtn);
    //     let currentAboutDiv = document.getElementById("about-text");
    //     currentAboutDiv.insertBefore(newAboutDiv, null);

    // }


    
</script>

