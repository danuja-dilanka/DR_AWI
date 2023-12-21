<?php

#Author: Danuja Dilanka
namespace DR_AWI;

require dirname(__FILE__) . '/req/combine.php';

use DR_AWI\AWI as AWI;

$enc_img="logo-bg.jpg";
$img = new AWI($enc_img,"1000,500");
//$img->set_size(2,2);
//$img->crop_starting_pos("ml");
//$img->setNewBG("600,375", "200,0,0");

//$img->resizeIt(2, 2);
//
////$img->setBaseEffect("GRAY");
////$img->setBorder(100, "0,0,0","r");
//////$img->setBrightness(50);
////$img->setBorder(100, "0,0,0", "l");
////$img->setBorder(50, "0,0,0", "b");
////$img->setBorder(25, "0,0,0", "r");
////$img->setBorder(12, "0,0,0", "t");
////$img->setTextShadow(2, "250,0,100");
//////$img->rotateIt(15,"0,0,0");
////$img->setFont(1, 30);
////$img->setFont(2, 20);
////$img->setCaption("2020-04-05", "BL");
////$img->setBorder(200, "255,0,0", "l");
////$img->setBorder(50, "0,0,25", "l");
//
$img->setFont(3, 50);
//
////$img->setCaption("Hey", "280,200");
////$img->setBorder(50, "0,0,25");
//
$img->rotateIt(2, "255,255,255");
$img->setCaption("DR_AWI", "tm(-250,250)");
$img->setFont(2, 30);
$img->setCaption("v2.0", "m(250,100)");
$img->addNewImage(null, "500,1000", "500,0", "EFF_OVERLAY");
$img->addNewImage(null, "200,1000", "200,0", "EFF_OVERLAY");
$img->addNewImage(null, "200,1000", "100,0", "EFF_OVERLAY");
//
////$img->setBorder(50, "0,0,25","l");
////$img->setFont(1, 20, "255,255,255");
////$img->setTopBlockColour("0,0,0");
$img_name ="tested/".$img->saveIt('tested');
$img_name = $img->getImage64BaseString();
?>
<img src="data:image/png;base64,<?= $img_name ?>">
