<!DOCTYPE html>
<html>
    <head>
        <title>Error Occur at <?php echo $code?></title>

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
                margin-left: 6em;
                margin-right: 6em;
                display: block;
                padding:10px 28px; 
                margin-bottom:20px;
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
                 <?php 
                 
                try {
                   echo $code;
                   echo $message;
               } catch (Exception $exc) {
                    
                } ?>
            </div>
        </div>
    </body>
</html>
