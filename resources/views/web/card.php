<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"><meta name="viewport" content=" initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta name="format-detection" content="telephone=no">
        <title></title>
        <meta name="keywords" content="" /><style>
            body {
    margin: 0;
}
.card {
    display: inline-block;
    flex: 1;
    position: relative;
    min-width: 300px;
    height: 10rem;
    margin: 0rem;
    font-family: 'Lato', sans-serif;
    text-align: center;
    text-decoration: none;
    color: white;
    background-color: #3979b7;
    overflow: hidden;
}
.card__icon {
    display: block;
    position: absolute;
    top: 10px;
    right: 0;
    width: 50px;
    line-height: 2rem;
    text-align: center;
    transition: all 0.2s ease-in-out;
}
.card__circle {
    display: block;
    position: absolute;
    top: 10px;
    right: 10px;
    width: 30px;
    height: 30px;
    background-color: white;
    border-radius: 50%;
    opacity: 0.2;
    transition: all 0.4s ease-in-out;
}
.card > p {
    position: relative;
    top: 50%;
    margin: 0 2rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    transform: translateY(-50%);
    transition: all 0.2s ease-in-out;
}
.card--alt-1 {
    background-color: #7e3f82;
}
.card--alt-2 {
    background-color: #39b764;
}
.card--alt-3 {
    background-color: #cc3f82;
}
.card--alt-4 {
    background-color: #ef7c2b;
}
.card:hover .card__circle {
    transform: scale(40);
    opacity: 0.8;
}
.card:hover > p,
.card:hover .card__icon {
    color: #45556e;
}
.container {
    display: flex;
    flex-flow: row wrap;
    align-content: stretch;
}</style><script>
    var _hmt = _hmt || [];
    (function() {
      var hm = document.createElement("script");
      hm.src = "//hm.baidu.com/hm.js?8c68efa3648cdc01a3d8333e0becf3c7";
      var s = document.getElementsByTagName("script")[0];
      s.parentNode.insertBefore(hm, s);
    })();
    </script></head><body><script src="http://wow.techbrood.com/libs/jquery/jquery-1.11.1.min.js"></script>
<link href='http://fonts.useso.com/css?family=Lato:300' rel='stylesheet' type='text/css'>

<div class="container">

    <?php 
      function getStyle(){
          $i =  rand(0,4);
          if($i==0){
              return "";
          }
          return "card--alt-".$i;
          
      }
      getStyle();
    foreach($files as $value){
        echo "<a href='".$_SERVER['APP_URL']."/storage/".basename($value)."' class='card ".getStyle()."'>"
                ."<i class='card__circle'></i><i class='card__icon fa fa-info'></i>"
                . "<p>".basename($value)."</p></a>";
    }
 ?>
</div>
 </body></html>