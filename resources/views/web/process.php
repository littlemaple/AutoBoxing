<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<title>a</title>  
<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">  
  
</head>  
  
<body>  

 <div id="demo" style="width:200px; height:500px;"><canvas id="c" height="2px" width="500px"></canvas></div>

<script> 
    var b = document.body;
    var c = document.getElementsByTagName('canvas')[0];
    var a = c.getContext('2d');
    var canvas = document.getElementsByTagName('canvas')[0];
    var ctx = canvas.getContext('2d');
    document.body.clientWidth; 

    with(m=Math)C=cos,S=sin,P=pow,R=random;
    c.width=c.height=f=640;h=-250;
    function p(a,b,c){
        if(c>60)
            return[S(a*7)*(13+5/(.2+P(b*4,4)))-S(b)*50,b*f+50,625+C(a*7)*(13+5/(.2+P(b*4,4)))+b*400,a*1-b/2,a];
        A=a*2-1;
        B=b*2-1;
        if(A*A+B*B<1)
        {
            if(c>37)
            {
                n=(j=c&1)?6:4;o=.5/(a+.01)+C(b*125)*3-a*300;
                w=b*h;
                return[o*C(n)+w*S(n)+j*610-390,o*S(n)-w*C(n)+550-j*350,1180+C(B+A)*99-j*300,.4-a*.1+P(1-B*B,-h*6)*.15-a*b*.4+C(a+b)/5+P(C((o*(a+1)+(B>0?w:-w))/25),30)*.1*(1-B*B),o/1e3+.7-o*w*3e-6]
            }
            if(c>32)
            {
                c=c*1.16-.15;o=a*45-20;w=b*b*h;z=o*S(c)+w*C(c)+620;
                return[o*C(c)-w*S(c),28+C(B*.5)*99-b*b*b*60-z/2-h,z,(b*b*.3+P((1-(A*A)),7)*.15+.3)*b,b*.7]
            }
            o=A*(2-b)*(80-c*2);
            w=99-C(A)*120-C(b)*(-h-c*4.9)+C(P(1-b,7))*50+c*2;z=o*S(c)+w*C(c)+700;
            return[o*C(c)-w*S(c),B*99-C(P(b, 7))*50-c/3-z/1.35+450,z,(1-b/1.2)*.9+a*.1, P((1-b),20)/4+.05]
        }
    }
    var draw = setInterval('for(i=0;i<1e4;i++)if(s=p(R(),R(),i%46/.74)){z=s[2];x=~~(s[0]*f/z-h);y=~~(s[1]*f/z-h);if(!m[q=y*f+x]|m[q]>z)m[q]=z,a.fillStyle="rgb("+~(s[3]*h)+","+~(s[4]*h)+","+~(s[3]*s[3]*-80)+")",a.fillRect(x,y,1,1)}',0);

    var demo = document.getElementById('demo');
    function redraw(){
        /*
        var d_c = document.createElement("canvas");
        d_c.setAttribute("id","c");
        d_c.setAttribute("width","520");
        d_c.setAttribute("height","500");
        demo.appendChild(d_c);
        */
        draw = setInterval('for(i=0;i<1e4;i++)if(s=p(R(),R(),i%46/.74)){z=s[2];x=~~(s[0]*f/z-h);y=~~(s[1]*f/z-h);if(!m[q=y*f+x]|m[q]>z)m[q]=z,a.fillStyle="rgb("+~(s[3]*h)+","+~(s[4]*h)+","+~(s[3]*s[3]*-80)+")",a.fillRect(x,y,1,1)}',0);
        //alert(d_c);
    }

    function clear_canvas()
    {
        ctx.clearRect(0,0,520,500);
        //canvas.parentNode.removeChild(canvas);   //删除
    }

    function stop_draw(obj){
        clearInterval(obj);
    }

</script>
</body>  
</html>  
