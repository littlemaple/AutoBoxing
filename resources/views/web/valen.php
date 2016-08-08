<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Valentine</title>
        <style type="text/css">
            body {
                background-color: #fff;
            }
            #container {
                margin: auto;
                width: 600px;
            }
           p{
                line-height: 2em;
                margin:0 0 20px;
                text-align: center;
           }

        .wrap{
                max-width: 600px;
                text-align: center;
                margin: auto;
        }

        .type-wrap{
                margin: auto;
                padding:20px;
                text-align: center;
                background:#f0f0f0;
                border-radius:5px;
                border:#CCC 1px solid;
        }
        /* code for animated blinking cursor */
        .typed-cursor{
            opacity: 1;
            font-weight: 100;
            -webkit-animation: blink 0.7s infinite;
            -moz-animation: blink 0.7s infinite;
            -ms-animation: blink 0.7s infinite;
            -o-animation: blink 0.7s infinite;
            animation: blink 0.7s infinite;
        }
        @-keyframes blink{
            0% { opacity:1; }
            50% { opacity:0; }
            100% { opacity:1; }
        }
        @-webkit-keyframes blink{
            0% { opacity:1; }
            50% { opacity:0; }
            100% { opacity:1; }
        }
        @-moz-keyframes blink{
            0% { opacity:1; }
            50% { opacity:0; }
            100% { opacity:1; }
        }
        @-ms-keyframes blink{
            0% { opacity:1; }
            50% { opacity:0; }
            100% { opacity:1; }
        }
        @-o-keyframes blink{
            0% { opacity:1; }
            50% { opacity:0; }
            100% { opacity:1; }
        }
        </style>
         <script src="../../js/jquery.min.js"></script>
        <script src="../../js/typed.js" type="text/javascript"></script>
    </head>

        <?php
            echo "_";
          echo "<div id='origin' style='display:none'>".json_encode($origin)."</div>";
        ?>
       <div class="wrap">
        <div class="type-wrap">
            <div id="typed-strings">
                <span><strong><?php echo $name?>:</strong>Happy  valentine  day!!!</span>
            </div>
            <span id="typed" style="white-space:pre;"></span>
        </div>
    </div>
          <body>
              <video width="100px" height="100px" autoplay loop autobuffer style="display:hide" >
            <source src="../../media/still_love_you.mp3" type="video/mp4">
        Your browser does not support the video tag.
        </video>
        <div id="container"></div>
        <script src="../../js/rainbow/kinetic.js" type="text/javascript"></script>
        <script src="../../js/rainbow/heart.js" type="text/javascript"></script>
        <script src="../../js/rainbow/script.js" type="text/javascript"></script>
    <!-- Get jQuery -->
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/typed.js" type="text/javascript"></script>
         <script>
    $(function(){

        $("#typed").typed({
            // strings: ["Typed.js is a <strong>jQuery</strong> plugin.", "It <em>types</em> out sentences.", "And then deletes them.", "Try it out!"],
            stringsElement: $('#typed-strings'),
            typeSpeed: 50,
            backDelay: 500,
            loop: false,
            contentType: 'html', // or text
            // defaults to false for infinite loop
            loopCount: false,
            callback: function(){ foo(); },
            resetCallback: function() { newTyped(); }
        });

        $(".reset").click(function(){
            $("#typed").typed('reset');
        });

    });

    function newTyped(){ /* A new typed object */ }

    function foo(){ console.log("Callback"); }

    </script>
    </body>
</html>
