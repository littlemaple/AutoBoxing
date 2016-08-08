<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Typed.js - Type your heart out</title>
    <!-- Get jQuery -->
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/typed.js" type="text/javascript"></script>
    <script>
    $(function(){

        $("#typed").typed({
            // strings: ["Typed.js is a <strong>jQuery</strong> plugin.", "It <em>types</em> out sentences.", "And then deletes them.", "Try it out!"],
            stringsElement: $('#typed-strings'),
            typeSpeed: 30,
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
    <link href="../../css/main.css" rel="stylesheet"/>
    <style>
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
</head>
<body>

    <div class="wrap">
        <h1 class="h1">Typed.js</h1>
        <div class="type-wrap">
            <div id="typed-strings">
                <span>Typed.js is a <strong>jQuery</strong> plugin.</span>
                <p>It <em>types</em> out sentences.</p>
                <p>And then deletes them.</p>
                <p>Try it out!</p>
            </div>
            <span id="typed" style="white-space:pre;"></span>
        </div>

        <div class="links">
            <a href="http://www.mattboldt.com/demos/typed-js">View original demo</a> | <a href="http://www.mattboldt.com">View mattboldt.com</a> | <a href="http://www.twitter.com/atmattb">Complain to Matt about how awful this is</a>
        </div>
    </div>

</body>
</html>