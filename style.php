<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Frank+Ruhl+Libre&display=swap" rel="stylesheet"> 
<style>
    
    :root {
        --footer-height: 100px;
        /*lior-clinic-anciant-pink */
        --theme-color-main1: rgba(210, 203, 199, 1);
        --theme-color-main2: rgba(207, 210, 205, 1);
        --theme-color-main2-transparent: rgba(207, 210, 205, 0.9);
        --theme-color-scpecial: rgba(213, 192, 98, 0.9);
        /* --theme-color-scpecial: rgba(174, 107, 154, 0.9); */
        --theme-color-main3:rgba(190, 181, 174, 1);
        /* --theme-color-text1: rgba(128, 161, 193, 0.9); */
        --theme-color-text1: rgba(138, 184, 156, 0.9);
        --theme-color-text2: rgba(89, 97, 87, 0.7);
        /* --theme-color-header1: rgba(200, 200, 200, 1); */
        --theme-color-header1: rgba(92, 70, 80, 1);
        --theme-color-header2: rgba(243, 249, 227, 1);
        --theme-background-gradient: linear-gradient(297deg, rgba(210, 203, 199, 1) 3%, rgba(211, 204, 200, 1) 5%, rgba(212, 205, 201, 1) 30%, rgba(214, 207, 203, 1) 45%, rgba(210, 203, 199, 1) 70%);
        --theme-color-nav-border: rgba(110, 147, 136, 1);
        --theme-color-nav-border-shadow:rgba(110, 147, 136, 1);
        --theme-color-article-border-shadow:rgba(157, 168, 149, 1);

        --theme-color-err-msg:rgba(134, 60, 75, 1);
        --theme-color-err-bg:rgba(214, 88, 100, 1);
        /* --theme-color-btn-pressed:rgba(89, 73, 81,1); */
        --theme-color-btn-pressed:rgba(37, 108, 97,1);
        
    }


    * {
        margin: 0;
        padding: 0;
        font-family: 'Frank Ruhl Libre', serif;
        box-sizing: border-box;
    }

  body {
      margin-bottom: calc(10px + var(--footer-height));
      font-family: inherit;
    
      background-image: var(--theme-background-gradient);
      color: var(--theme-color-text1);
      position: relative;
      overflow: auto;
  }

/*===============footer=================*/
.main-footer {
    position: fixed;
    bottom: 0;
    min-height: var(--footer-height);
    padding-top: .5em;
    padding-bottom: .5em;
    border-top: 1px solid var(--theme-color-nav-border);
    background-color: var(--theme-color-main2-transparent);
    width: 100%;
    margin: 0;
    
    border-radius:   2px;
    box-shadow: 0px 0px 10px 0px var(--theme-color-nav-border-shadow);
}


/*===============header=================*/

.main-nav {
        margin: 5px 10px;
    }

.header .logo {
        margin: 0;
        font-size: 1.5rem;
    }
.header h4 {
    text-align: right;
    color: var(--theme-color-header1);  
}

.header ul {
    margin: 0;
    padding: 0;
    list-style: none;
}
.header a{
    color: var(--theme-color-header1);
    font-size: 1em;
    text-decoration: none;
    padding: 10px 15px;
    /* text-transform: uppercase; */
    text-align: center;
    display: block;
}

.header a:hover {
    color: var(--theme-color-header2);
    text-shadow: 0 0 5px #000;
}

.header {
    width: 100vw;
    transition: 0.2s;
    padding: .5em 20px;
    border-bottom: 1px solid var(--theme-color-nav-border);

    background-color: var(--theme-color-main2);
    margin: 0;
    
    border-radius: 2px;
    box-shadow: 0px 0px 10px 0px var(--theme-color-nav-border-shadow);
    z-index: 2;
}

header.onscroll-nav-fixed {
    position: fixed;
    top: 0;
}

header.onscroll-nav-transparent {
    position: fixed;
    top: 0;
    background-color: var(--theme-color-main2-transparent);
}

.header a.hidden {
    display: none;
}

.currentNavItem {
    background-color: var(--theme-color-scpecial);
    border-radius: 10% 66% 20% 66%;
}

.header img {
    box-sizing: border-box;
    height: 26px;
    width: 26px;
    border-radius:70%;
    display: block;
    outline-color: var(--theme-color-main3);
    padding: 0 ;
}
.header span {
    color: var(--theme-color-header1);
    padding: 10px 10px;
    font-size: 22px;
    display: block; 
}

    /*============ forms =============*/
.admin-form,
.form-main-div,
.admin-choise {
    margin: auto;
    display: flex;
    width: 40%;
    min-width: 600px;
    /* height: calc(100vh - 200px); */
    right: 0;
    background-color: var(--theme-color-main1);

}

.admin-form{
    text-align: right;
}

.adminHeader {
    min-height: var(--footer-height);
    background-color: var(--theme-color-main1);
    color: var(--theme-color-err-msg);
    box-sizing: border-box;
    border-width: 3px;
    border-color: var(--theme-color-scpecial);
    width: 100vw;
    margin: auto;
    text-align: center; 
    border-bottom: var(--theme-color-nav-border); 
    flex-wrap: wrap;
    float: right; 
}
.adminHeader button {
    font-size: 26px;
    background-color: var(--theme-color-text1);
    border-radius: 15%;
    padding: 0 5px;
    max-width: 175px;
}
.adminHeader button:hover {
    font-size: 26px;
    background-color: var(--theme-color-nav-border-shadow);
    color: var(--theme-color-header2);
}
.adminHeader h2 {
    text-align: right;
    padding-right: 5px;
}
form input[type=text],
form input[type=password],
form input[type=confirmPassword],
form button,
form h2,
form fieldset,
form select,
form legend {
    font-size: 1.5rem;
    min-height: 20px;
    color: var(--theme-color-text2);
    border-color: var(--theme-color-nav-border);
    /* display: inline-block; */
    text-align: center;
}
.admin-form h2,
.admin-form fieldset
{
    text-align: right;
    justify-content: right;
    background-color: var(--theme-color-scpecial);
    color: var(--theme-color-header1);
    border-color: var(--theme-color-nav-border);
    font-size: 20px;
}
.admin-form button,
.admin-form select,
.admin-form legend
{
    color: var(--theme-color-header1);
    background-color: var(--theme-color-main1);
    border-radius: 25%;
    border-width:1px;
    border-color: var(--theme-color-nav-border);
    text-align: center;
    width:auto ;
}
.admin-form input[name=title]{
    color: var(--theme-color-header1);
    background-color: var(--theme-color-main1);
    height: 26px;
    font-size: 16px;
    font-weight:bold;
    text-align: center;
}


.admin-form [type=file]{
    background-color: var(--theme-color-scpecial);
    border-width: 12px;
    border-color: var(--theme-color-nav-border);
}

.admin-form textarea{
    font-size:18px;
    text-align: justify;
    height: auto;
    padding: 0;
    margin: 0;
    text-transform: none;
    text-decoration: none;
    text-justify: auto;
    line-height: normal;
}
.admin-form ::-webkit-input-placeholder{
    text-align: right;
    font-size: 20px;
}
.admin-form button[type=submit]{
    height: 32px;
    width: 150px;
    font-size:22px;
}
form fieldset {
    margin: auto;
    padding: 10px;
    float: right;
    flex-wrap: wrap;
    
  
}
.article-body{
    float: right;
    flex-wrap: wrap-reverse;
}

form input[type=text],
form input[type=password],
form input[type=confirmPassword] {
    padding-right: 10px;
    text-align: right;
    }

form input,
form button {
    border: 2px var(--theme-color-nav-border);
    border-radius: 2px;
    box-shadow: 0px 0px 2px 0px #999;
    padding: 5px;
    outline-color: var(--theme-color-special);
    background-color: var(--theme-color-main2);
}


form button {
    margin-top: 10px;
    color: var(--theme-color-header1);
    width: 100%;
}
form input:hover
{
    background-color : var(--theme-color-header2);
}

form button:hover{
    background-color: var(--theme-color-text2);
    color: var(--theme-color-header2);
    text-shadow: 0 0 5px wheat;
}

form legend{
    color: var(--theme-color-header1);
}

/* input.confirmPass.err{
    color: var(--theme-color-err-msg);
    background-color: var(--theme-color-err-bg);
    
} */


.paragraph{
  size: 500px;
  line-height: 500px;
  background-color: var(--theme-color-main2-transparent);
  border: 1px var(--theme-color-nav-border);
}

#chosenTopic {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    flex-direction: row-reverse;
}
#topic-name{
    width: 100%;
    color: var(--theme-color-header1);
    background-color: var(--theme-color-scpecial);
    text-align: center;
}

/*============ end forms =============*/

/*============ articles =============*/
#being-read{
    width: 756px;
    border-style: double;
    border-color: var(--theme-color-nav-border);
    box-shadow: 2px 2px var(--theme-color-article-border-shadow);
    padding: 20px;
    margin-bottom: 20px;
    margin-top: 20px;
}
#one-image{
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding: auto;
    margin: auto;
}

/*============ general =============*/
.div-around-centered-content {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: flex-start;
    margin: 20px;
}
div.articlesTopics{
    /* background-color: var(--theme-background-gradient); */
    overflow: auto;
    white-space: nowrap;
    display: flex;
    flex-direction: row-reverse;
    /* background-color: var(--theme-background-gradient); */

}
div.articlesTopics form input[type=image]{
    height: 300px;
    width: 300px;
    padding: 10px;

}
div.articlesTopics form input[type=image]:hover{
    opacity: 0.8;
    padding: 7px;
    background-color: var(--theme-background-gradient);
}


.left-content {
    text-align: left;
}

.right-content {
    text-align: right;
}

.margin20Sides {
    margin: 0px 20px;
}

.itemsMainDiv,
.profileMainDiv,
.LoginHandleMainDiv {
    margin: 20px;
    background-color: transparent;
    height: calc(100vh + 600px);
    color: var(--theme-color-header1);
    text-align: right;
}

.homeBody {
    height: calc(100vh + 20px);
}

#gallery img {
    padding: 5px 10px;
    border-radius: 10%;
    }

#gallery img:hover {
    transition: 0.1ms;
    padding: 0;
}


/*============ end general =============*/


    /*============ parallax =============*/
    .wrapper {
        /* The height needs to be set to a fixed value for the effect to work.
             100vh is the full height of the viewport. */
            height: 100vh;
        /* The scaling of the images would add a horizontal scrollbar, so disable x overflow. */
        overflow-x: hidden;
        /* Enable scrolling on the page. */
        overflow-y: auto;
        /* Set the perspective to 2px. 
        This is the simulated distance from the viewport*/
        perspective: 2px;

    }


    .section {
        /* Needed for children to be absolutely positioned relative to the parent. */
        position: relative;
        /* The height of the container. Must be set. */
        height: 100vh;
        


        /* For text formatting. */
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-shadow: 0 0 5px #000;
        font-size: 32px;
    }

    .parallax::after {
        /* Display and position the pseudo-element */
        content: " ";
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;

        /* Move the pseudo-element back away from the camera,
         then scale it back up to fill the viewport.
         Because the pseudo-element is further away, 
         it appears to move more slowly */
        transform: translateZ(-1px) scale(1.5);
        /* Force the background image to fill the whole element. */
        background-size: 100%;
        /* Keep the image from overlapping sibling elements. */
        z-index: -1;
    }

    /* The styling for the static div. */
    .static {
        background: var(--theme-color-main1);
        text-align: center;
        font-size: 16px;
        color: var(--theme-color-err-msg);
        text-shadow: none;
    }

    /* Set the background images to our images. */
    
    /* i want to create an auto-feed for the articles 
       using a for loop that will print the array on the screen*/
    .bg1::after {
        background: var(--theme-color-main3);
        <?php
        include '../arrays/images-array.php';
        echo "background-image: url('$myImgsArr[0]'); background-repeat: no-repeat;background-size: 100% 100%;"
        ?>
    }

    .bg2::after {
        background: var(--theme-color-main3);
        <?php
        echo "background-image: url('$myImgsArr[1]'); background-repeat: no-repeat;background-size: 100% 100%;"
        ?>
    }

    .bg3::after {
        background: var(--theme-color-main3);
        <?php
        echo "background-image: url('$myImgsArr[2]'); background-repeat: no-repeat;background-size: 100% 100%;"
        ?>
    }

    .bg4::after {
        background: var(--theme-color-main3);
        <?php
        echo "background-image: url('$myImgsArr[3]'); background-repeat: no-repeat;  background-size: 100% 100%;"
        ?>
    }
    .bg5::after {
      background: var(--theme-color-main3);
     <?php
        echo "background-image: url('$myImgsArr[4]'); background-repeat: no-repeat;  background-size: 100% 100%;"
        ?>
    }

    /*============ end parallax =============*/


    /*=========== Media Queries ===========*/

    @media (min-width: 750px) {

        .header,
        .main-nav {
            display: flex;
        }

        .header {
            flex-direction: column;
            align-items: center;
            width: 100%;
            margin: 0 auto;
        }

    }

    @media (min-width: 1000px) {
        .header {
            width: 100%;
            flex-direction: row;
            justify-content: space-between;
        }

    }

    /*=========== end Media Queries ===========*/
</style>
