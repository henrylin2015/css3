<?php

    session_start();

    $image = imagecreatetruecolor(100, 30);
    $bgcolor = imagecolorallocate($image, 255, 255, 255);
    imagefill($image,0,0,$bgcolor);//GD库需要了解一下~~~

    $captch_code='';
    for($i=0;$i<4;$i++){
        $fontsize=6;
        $fontcolor=imagecolorallocate($image, rand(0,120), rand(0,120),rand(0,120));
        $data='abcdefghigklmnopqrstuvwxyz1234567890';
        $fontcontent=substr($data, rand(0,strlen($data)),1);//选取子字符
        $x=($i*100/4)+rand(5,10);
        $y=rand(5,10);
        imagestring($image,$fontsize,$x,$y,$fontcontent,$fontcolor);
        $captch_code.=$fontcontent;
    }
       $_SESSION['authcode']=$captch_code;

    for($i=0;$i<200;$i++){
        $pointcolor=imagecolorallocate($image, rand(50,200),rand(50,200), rand(50,200));
        imagesetpixel($image,rand(1,99),rand(1,29),$pointcolor);//画点
    }
    for ($i=0; $i<3 ; $i++) { 
        $linecolor= imagecolorallocate($image, rand(80,220), rand(80,220),rand(80,220));//浅颜色
        imageline($image, rand(1,99), rand(1,29), rand(1,99), rand(1,29), $linecolor);//避免干扰元素过多，颜色过深
    }

    header( "Content-type:image/png" );
    imagepng($image);
    imagedestroy($image);//别忘了释放资源
?>