<!DOCTYPE html>
<html>
    <head>
        <title>webview</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
                background: #eee;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                font-weight: 100; 
                font-family: 'Lato', sans-serif;
            }

            .message {
                margin-left: 6px;
                margin-right: 6px;
                display: block;
                word-wrap: break-word;
                padding:10px 28px; 
                margin-bottom:20px;
                text-align: left;
                -webkit-border-bottom-right-radius: 16px;
                -webkit-border-bottom-left-radius: 16px;
                -moz-border-radius-bottomright: 16px;
                -moz-border-radius-bottomleft: 16px;
                border-bottom-right-radius: 16px;
                border-bottom-left-radius: 16px;
                border-bottom:1px solid #ccc;
                border-right:1px solid #ccc;
                border-left:1px solid #ccc;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="message">
                <pre>
                 <?php 
                 if(isset($_SERVER['HTTP_USER_AGENT'])){
                      echo "user_agent:".$_SERVER['HTTP_USER_AGENT'];
                 }
                 echo "<br><br>";
                 if(isset($_SERVER['HTTP_AUTHORIZATION'])){
                      echo "authorization:".$_SERVER['HTTP_AUTHORIZATION'];
                 }
                 ?>
                </pre>
            </div>
        </div>
    </body>
</html>
