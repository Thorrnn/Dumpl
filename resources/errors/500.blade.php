<!DOCTYPE html>
<html>
<head>
    <!-- set the encoding of your site -->
    <meta charset="utf-8">
    <!-- set the viewport width and initial-scale on mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ошибка доступа</title>
    <!-- include the site animate stylesheet -->
    <link href='https://fonts.googleapis.com/css?family=Bangers' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Poppins:400,300' rel='stylesheet' type='text/css'>
    <style>
        /*------------------------------------------------------------------
        1. Body
        2. Wrapper / #wrapper
        3. Blue Sky / #mt-bluesky
        4. Sun / #mt-sun
        5. Night Sun / #mt-sun2
        6. Clouds / #mt-cloud
        7. Earth / #mt-base
        8. Night / #night
        9. Stars / #stars
        10. Moon / #moon
        11. Pahe Title / #title
        12. Hock / #hock
        13. Oh / #oh
        14. Text / .txt
        15. Responsive Start
        -------------------------------------------------------------------*/
        html{background: #8ab407;}
        /* html{background: #1c2401;} */
        /*------------------------------------------------------------------
                1. Body
        -------------------------------------------------------------------*/
        body{margin: 0;}
        /*------------------------------------------------------------------
                2. Wrapper / #wrapper
        -------------------------------------------------------------------*/
        #wrapper{
            height: 969px;
            overflow: hidden;
            min-height: 969px;
            position: relative;
        }
        #mt-cloud,
        #mt-bluesky,
        #night,
        #stars{
            top:0px;
            left:0px;
            right:0px;
            bottom:0px;
            width:100%;
            position:absolute;
        }
        /*------------------------------------------------------------------
                3. Blue Sky / #mt-bluesky
        -------------------------------------------------------------------*/
        #mt-bluesky{
            z-index:1;
            background:#fff url({{asset('images/sky.png')}}) repeat-x top left;
        }
        /*------------------------------------------------------------------
                4. Sun / #mt-sun
        -------------------------------------------------------------------*/
        #mt-sun{
            top:50%;
            left:45%;
            z-index:2;
            width:150px;
            height:152px;
            position:absolute;
            background:transparent url({{asset('images/sun.png')}}) no-repeat center center;
        }
        /*------------------------------------------------------------------
                5. Night Sun / #mt-sun2
        -------------------------------------------------------------------*/
        #mt-sun2{
            top:50%;
            left:45%;
            z-index:2;
            opacity:0;
            width:150px;
            height:152px;
            position:absolute;
            background:transparent url({{asset('images/sun2.png')}}) no-repeat center center;
        }
        /*------------------------------------------------------------------
                6. Clouds / #mt-cloud
        -------------------------------------------------------------------*/
        #mt-cloud{
            z-index:3;
            background:transparent url({{asset('images/clouds.png')}}) repeat-x top left;
        }
        /*------------------------------------------------------------------
                7. Earth / #mt-base
        -------------------------------------------------------------------*/
        #mt-base{
            position:absolute;
            left:0px;
            right:0px;
            bottom:0px;
            width:100%;
            height:232px;
            background:transparent url({{asset('images/ground.png')}}) repeat-x bottom center;
            z-index:3;
        }
        #base-overlay{
            position:absolute;
            left:0px;
            right:0px;
            bottom:0px;
            width:100%;
            height:232px;
            opacity: 0;
            background:transparent url({{asset('images/night-glow.png')}}) repeat-x bottom center;
            z-index:7;
        }
        /*------------------------------------------------------------------
                8. Night / #night
        -------------------------------------------------------------------*/
        #night{
            z-index:4;
            opacity:0;
            background-color:#000;
        }
        /*------------------------------------------------------------------
                9. Stars / #stars
        -------------------------------------------------------------------*/
        #stars{
            z-index:5;
            opacity:0;
            bottom:200px;
            background:transparent url({{asset('images/stars-old.png')}}) repeat-x bottom center;
        }
        #sstar{
            top:10%;
            left:40%;
            z-index:5;
            opacity:0;
            width:126px;
            height:80px;
            position:absolute;
            background:transparent url({{asset('images/shootingstar.png')}}) no-repeat 80px -200px;
        }
        /*------------------------------------------------------------------
                10. Moon / #moon
        -------------------------------------------------------------------*/
        #moon{
            top:60%;
            left:45%;
            z-index:6;
            opacity:0;
            width:292px;
            height:292px;
            position:absolute;
            background:transparent url({{asset('images/moon.png')}}) no-repeat center center;
        }
        /*------------------------------------------------------------------
                11. Pahe Title / #title
        -------------------------------------------------------------------*/
        #title{
            top:80%;
            z-index:6;
            opacity:0;
            left: 45%;
            color: #fff;
            width: 292px;
            position:absolute;
            letter-spacing: 23px;
            font: 108px/120px 'Bangers', cursive;
        }
        #title span{
            top: 0;
            right: 64.8%;
            position: absolute;
            transform: rotate(-19deg);
        }
        #title span:after{
            top: -8px;
            left: 169px;
            width: 17px;
            content: "";
            height: 43px;
            position: absolute;
            transform: rotate(19deg);
            background: url('{{asset('images/img01.png')}}') no-repeat;
        }
        /*------------------------------------------------------------------
                12. Hock / #hock
        -------------------------------------------------------------------*/
        #hock{
            top: 37.9%;
            width: 2px;
            z-index: 5;
            opacity: 0;
            left: 47.2%;
            position: absolute;
            background: url('{{asset('images/img03.png')}}') repeat-y;
        }
        #hock:after{
            left: 0;
            width: 2px;
            content: "";
            bottom: 100%;
            height: 153px;
            position: absolute;
            background: url('{{asset('images/img02.png')}}') no-repeat;
        }
        /*------------------------------------------------------------------
                13. Oh / #oh
        -------------------------------------------------------------------*/
        #oh{
            opacity: 0;
            z-index: 7;
            left: 34.6%;
            bottom: 42%;
            color: #96bb06;
            word-spacing: 2px;
            position: absolute;
            letter-spacing: 3px;
            transform: rotate(-23deg);
            font: 40px/50px 'Bangers', cursive;
        }
        /*------------------------------------------------------------------
                14. Text / .txt
        -------------------------------------------------------------------*/
        .txt{
            left: 50%;
            opacity: 0;
            z-index: 7;
            color: #fff;
            width: 380px;
            bottom: 180px;
            color: #f6f6f6;
            position: absolute;
            text-align: center;
            margin: 0 0 0 -290px;
            font: 300 16px/20px 'Poppins', sans-serif;
        }
        .txt p{
            margin: 0 0 35px;
            letter-spacing: 1px;
        }
        .btn{
            color: #fff;
            width: 170px;
            padding: 10px;
            border-radius: 5px;
            vertical-align: top;
            background: #96bb06;
            display: inline-block;
            text-decoration: none;
            text-transform: uppercase;
            font: 16px/20px 'Poppins', sans-serif;
        }
        /*------------------------------------------------------------------
                15. Responsive Start
        -------------------------------------------------------------------*/
        @media only screen and (max-width: 1870px){
            #hock{left: 47.25%;}
            #title{top: 77%;}
        }
        @media only screen and (max-width: 1760px){
            #hock{left: 47.35%;}
        }
        @media only screen and (max-width: 1680px){
            #wrapper{min-height: 870px;height: 870px;}
            #hock{left: 47.45%; top: 40.9%;}
            #oh{left: 33.2%;}
        }
        @media only screen and (max-width: 1600px){
            #hock{left: 47.6%;}
        }
        @media only screen and (max-width: 1570px){
            #hock{left: 47.7%;}
            #oh{left: 32.2%;}
        }
        @media only screen and (max-width: 1462px){
            #hock{left: 47.85%;}
        }
        @media only screen and (max-width: 1400px){
            #wrapper{min-height: 768px;height: 768px;}
            #hock{left: 48.05%; top: 45.9%;}
            #oh{left: 31.2%;}
            .txt{
                bottom: 127px;
                margin: 0 0 0 -230px;
            }
            .txt p{margin: 0 0 23px;}
            #title{top: 76%;}
        }
        @media only screen and (max-width: 1370px){
            #wrapper{min-height: 650px;height: 650px;}
            #hock{left: 48.095%; top: 41.9%;}
            #oh{left: 29.9%; bottom: 39%;}
            .txt{bottom: 86px;}
            #moon{margin: -60px 0 0;}
            #title{top: 70%;}
        }
        @media only screen and (max-width: 1300px){
            #hock{left: 48.2%;}
            #oh{left: 30.2%;}
        }
        @media only screen and (max-width: 1240px){
            #hock{left: 48.3%; top: 41.9%;}
        }
        @media only screen and (max-width: 1240px){
            #hock{left: 48.4%;}
            #oh{left: 28%;}
        }
        @media only screen and (max-width: 1180px){
            #hock{left: 48.6%;}
            #oh{left: 27%;}
        }
        @media only screen and (max-width: 1120px){
            #hock{left: 48.7%;}
            #oh{left: 25%;}
        }
        @media only screen and (max-width: 1090px){
            #hock{left: 48.9%;}
        }
        @media only screen and (max-width: 1030px){
            #hock{left: 49.1%;}
        }
        @media only screen and (max-width: 970px){
            #hock{left: 49.3%;}
            #oh{left: 25%;}
            .txt{margin: 0 0 0 -210px;}
        }
        @media only screen and (max-width: 920px){
            #hock{left: 49.5%;}
        }
        @media only screen and (max-width: 880px){
            #wrapper{min-height: 1000px;height: 1000px;}
            #hock{left: 49.8%; top: 35.9%;}
            #title{top: 82%;}
            #moon{margin: 0;}
            #oh{left: 20%; bottom: 42%;}
        }
        @media only screen and (max-width: 835px){
            #hock{left: 50.0%;}
        }
        @media only screen and (max-width: 785px){
            #hock{left: 50.4%; top: 37%;}
            #oh{left: 19%;}
        }
        @media only screen and (max-width: 755px){
            #hock{left: 50.6%;}
        }
        @media only screen and (max-width: 700px){
            #hock{left: 50.9%;}
        }
        @media only screen and (max-width: 670px){
            #wrapper{min-height: 920px;height: 920px;}
            #hock{left: 51.2%; top: 39.9%;}
            #oh{left: 17%;}
        }
        @media only screen and (max-width: 630px){
            #hock{left: 51.6%;}
            #oh{left: 16%;}
        }
        @media only screen and (max-width: 595px){
            #hock{left: 52.0%;}
            #oh{left: 12%;}
        }
        @media only screen and (max-width: 565px){
            #hock{left: 52.4%;}
            #oh{left: 8%;}
        }
        @media only screen and (max-width: 540px){
            #hock{left: 52.8%;}
        }
        @media only screen and (max-width: 510px){
            #hock{left: 53.1%;}
        }
        @media only screen and (max-width: 490px){
            #wrapper{min-height: 840px;height: 840px;}
            #moon{margin: -22px 0 0;}
            #hock{left: 53.6%;}
            #oh{left: 6%;}
        }
        @media only screen and (max-width: 469px){
            #hock{left: 54.3%;}
        }
        @media only screen and (max-width: 430px){
            #hock{left: 54.8%;}
        }
        @media only screen and (max-width: 415px){
            #hock{left: 55.4%;}
            .txt{margin: 0 0 0 -180px;}
        }
        @media only screen and (max-width: 385px){
            #hock{left: 56.1%;}
            .txt{
                width: 340px;
                bottom: 150px;
                margin: 0 0 0 -170px;
            }
        }
        @media only screen and (max-width: 355px){
            #hock{left: 57.4%;}
        }
        @media only screen and (max-width: 325px){
            #hock{left: 57.8%;}
        }
    </style>

</head>
<body>
<!-- Page Loader -->
<div id="pre-loader" class="loader-container">
    <div class="loader">
        <div></div>
        <div></div>
    </div>
</div>
<!-- main container of all the page elements -->
<div id="wrapper">
    <!-- mt bluesky -->
    <div id="mt-bluesky"></div>
    <!-- Page Loader -->
    <div id="mt-sun"></div>
    <!-- mt sun -->
    <div id="mt-sun2"></div>
    <!-- mt cloud -->
    <div id="mt-cloud"></div>
    <!-- mt base -->
    <div id="mt-base"></div>
    <!-- base overlay -->
    <div id="base-overlay"></div>
    <!-- night -->
    <div id="night"></div>
    <!-- stars -->
    <div id="stars"></div>
    <!-- sstar -->
    <div id="sstar"></div>
    <!-- moon -->
    <div id="moon"></div>
    <!-- hock -->
    <div id="hock"></div>
    <!-- title -->
    <span id="title"><span>503</span></span>
    <!-- oh -->
    <span id="oh">oh no</span>
    <!-- txt -->
    <div class="txt">
        <p>Данная страница вам недоступна</p>
        <a href="/" class="btn">На Главную</a>
    </div>
</div>
<script type="text/javascript" src="{{asset('js/jquery.color-503.js')}}">
</script>
<script type="text/javascript" src="{{asset('js/jquery-1.11.3.min-503.js')}}">
</script>
<script type="text/javascript">
    $(function() {
        $('#mt-sun').animate({'top':'96%','opacity':0.4}, 4000,function(){
            $('#stars').animate({'opacity':1}, 1200,function(){
                $('#moon').animate({'top':'10%','opacity':1}, 1500, function(){
                    $('#hock').animate({'bottom':'190px','opacity':1}, 750, function(){
                        $('#hock').animate({'bottom':'49%'}, 500);
                        $('#title').animate({'top':'44%','opacity':1}, 500);
                        $('#sstar').animate({'opacity':0.8}, 75);
                        $('#sstar').animate({'backgroundPosition':'0px 0px','top':'15%', 'opacity':0
                        }, 75,function(){
                            $('#ground-overlay').animate({'opacity':1}, 380);
                            $('#title').animate({'top':'53%','opacity':1}, 500, function(){
                                $('#oh').animate({'opacity':1},250);
                                $('.txt').animate({'opacity':1}, 250);
                            });
                        });
                    });
                });
            });
        });
        $('#mt-sun').animate({'top':'96%','opacity':0.8}, 4000);
        $('#mt-bluesky').animate({'backgroundColor':'#4F0030'}, 6000);
        $('#mt-cloud').animate({'backgroundPosition':'1000px 0px','opacity':0}, 9500);
        $('#night').animate({'opacity':0.8},6600);
        $('html').animate({'backgroundColor':'#1c2401'}, 6600);
    });
</script>
</body>
</html>
