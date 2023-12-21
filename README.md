
<!-- PROJECT LOGO -->
<br />
<p align="center">
  <h3 align="center">DR_AWI LIBRARY</h3>
  <h6 align="center">On Behalf Of RajDev-TM</h6>

  <p align="center">
    <img src="https://github.com/dilanka-rajapakshe/DR_AWI/blob/master/2.X/2.0v/logo.png">
     <br />
    PHP Image Editing Library
    <br />
    <a href="https://dr-web.000webhostapp.com/dr-awi-library/"><strong>Explore the docs »</strong></a>
    <br />
    <br />
    <a href="https://github.com/dilanka-rajapakshe/DR_AWI/issues">Report Bug</a>
    ·
    <a href="https://github.com/dilanka-rajapakshe/DR_AWI/issues">Request Feature</a>
  </p>
</p>



<!-- TABLE OF CONTENTS -->
## Table of Contents

* [About the Project](#about-the-project)
  * [Built With](#built-with)
* [Getting Started](#getting-started)
  * [Include Files](#include-files)
* [Basic Usage](#usage)
   * [Resize Image](#resize-image)
   * [Crop Image](#crop-image)
   * [Image Rotating](#image-rotating)
   * [Set Borders](#set-borders)
   * [Add Text](#add-text)
   * [Add New Image On Top](#add-new-image-on-top)
   * [Save Image](#save-image)



<!-- ABOUT THE PROJECT -->
## About The Project

PHP Image Editing Library For Image Cropping , Coping , Moving , Resizing , Scaling , Text Adding , Effect Adding , Rotating & Many More Functionality

### Built With
* [PHP](https://www.php.net/)



<!-- GETTING STARTED -->
## Getting Started

### Include Files

```
<?php
namespace DR_AWI;
require dirname(__FILE__) . '/inc/combine.php';
use DR_AWI\AWI as AWI;
```

### Usage

```
$img = new AWI($IMAGE);
 
 
 $IMAGE >> CAN BE AN URL OR A PATH OR A BASE64 ENCODED IMAGE STRING.
 Currently Supported Image Types : JPG/JPEG , PNG , WBMP , XBM , GIF
 ```
### EDITING

### Resize Image

```
$img->resizeIt($width ,$height );
 
 $width >> Preferred IMAGE WIDTH In PIXELS 
 $height >> Preferred IMAGE HEIGHT In PIXELS 
 
* EASY RESIZING ---------------------------------
 
 IF >> $width > 0 AND $width < 5
   $width :
         $width = $actualImageWidth / (2 ** $width) 
 
 IF >> $height > 0 AND $height < 5
   $height :
         $height= $actualImageHeight / (2 ** $height) 
 
```
### Crop Image
```
$img->set_size($width ,$height );
$img->crop_starting_pos($position);
 
 $width >> Preferred IMAGE WIDTH To Crop (In PIXELS) 
 $height >> Preferred IMAGE HEIGHT To Crop (In PIXELS)
 
* EASY CROPPING ---------------------------------
 
 IF >> $width > 0 AND $width < 5
   $width :
         $width = $actualImageWidth / (2 ** $width) 
 
 IF >> $height > 0 AND $height < 5
   $height :
         $height= $actualImageHeight / (2 ** $height) 
 
 
* SET CROP POSITION ---------------------------------
 
$position >> 
 
    'TL' >> TOP LEFT
    'TM' >> TOP MIDDLE
    'TR' >> TOP RIGHT
    'ML' >> TOP LEFT
    'M'  >> MIDDLE
    'MR' >> MIDDLE RIGHT
    'BL' >> BOTTOM LEFT
    'BM' >> BOTTOM MIDDLE
    'BR' >> BOTTOM RIGHT
    '$X,$Y' >> CUSTOM POSITION
        $X = Postion X In Pixels 
        $Y = Postion Y In Pixels 
         Ex: '0,0'
 ```   
### Image Rotating

```
$img->rotateIt( $degree, $uncoveredAColor);
 
$degree >> DEGREE TO ROTATE IMAGE
 
$uncoveredAColor >> Uncovered Area Color (Optional - Default '0,0,0')
   '$red,$green,$blue'
     $red = 0 - 255
     $green= 0 - 255
     $blue= 0 - 255
 
```
### Set Borders

```
$img->setBorder($borderSize, $borderColor, $borderType);
 

 
$borderSize >> Border Size In Pixels
$borderColor >> Border Color 
    Ex: '0,0,0'
$borderType >> (Optional - Default 'A')
    'L' >> Only Border Left
    'T' >> Only Border Top
    'R' >> Only Border Right
    'B' >> Only Border Bottom
```
### Add Text
```
$img->setFont($fontNo, $fontSize, $fontColour);
$img->setTextShadow($Ygap, $shadowColor);
$img->setCaption($theText, $textPos);

 
setFont() ---------------------------------------------
 
$fontNo = 0-5 (Still 5 Fonts Available)
$fontSize = Font Size
$fontColour = Font Color
     Ex: '0,0,0'
 

setTextShadow() -----------------------------------------
 
$Ygap= The (Y) Gap Between TEXT And SHADOW
$shadowColor= Shadow Color
     Ex: '0,0,0'
 
setCaption() --------------------------------------------
 
$theText >> The Text That You Want To Display 
$textPos >> Position Of Text
 
    'TL' >> TOP LEFT
    'TM' >> TOP MIDDLE
    'ML' >> TOP LEFT
    'M'  >> MIDDLE
    'BL' >> BOTTOM LEFT
    'BM' >> BOTTOM MIDDLE
    '$X,$Y' >> CUSTOM POSITION
        $X = Postion X In Pixels 
        $Y = Postion Y In Pixels 
         Ex: '0,0'
 
```
### Add New Image On Top
```
$img->addNewImage($imgSrc, $imgSize, $imgPos, $layerEffect);

$imgSrc - Path To Image File (Supported : JPG/JPEG , PNG , GIF , WBMP , XBM)
$imgSize - New Image Size In Pixels 
            '250,250'
$imgPos- New Image Position
 
          'TL' >> TOP LEFT
          'TM' >> TOP MIDDLE
          'ML' >> TOP LEFT
          'M'  >> MIDDLE
          'BL' >> BOTTOM LEFT
          'BM' >> BOTTOM MIDDLE
          '$X,$Y' >> CUSTOM POSITION
            $X = Postion X In Pixels 
            $Y = Postion Y In Pixels 
              Ex: '0,0'
 
$layerEffect - Add Image With Layer Effect
           'EFF_REPLACE' ,  'EFF_ALPHABLEND' ,  
           'EFF_NORMAL' ,  'EFF_OVERLAY'  , 'EFF_MULTIPLY'
 
```
### Save Image
```
$img->saveIt($target_path, $createDir, $deleteSource)

 

$target_path - Path To Save Image
             Ex: 'FromHere/To'
$createDir - If Path Not Exists Then Create Directory (Default 0)
             0 - Don't Create Directory
             1 - Create Directory
$deleteSource - If Original Image Is On Your Server , (Default 0)
             0 - Do Not Delete Original File After Editing It
             1 - Delete Original File After Editing It
```
Get Edited Image Without Saving It
```
$img_name = $img->getImage64BaseString();
?>
<img src="data:image/png;base64,<?= $img_name ?>">
```


<!-- SAMPLES -->
## Sample Images

<img src="https://github.com/dilanka-rajapakshe/DR_AWI/blob/master/2.X/2.0v/tested/1-original-image-after-resize-800,500.png" width="300" height="200"> <img src="https://github.com/dilanka-rajapakshe/DR_AWI/blob/master/2.X/2.0v/tested/3-add-black-color-block-with-EFF_OVERLAY-effect.png" width="300" height="200"> <img src="https://github.com/dilanka-rajapakshe/DR_AWI/blob/master/2.X/2.0v/tested/7-add-another-text-with-another-size.png" width="300" height="200">

#### <a href="https://github.com/dilanka-rajapakshe/DR_AWI/tree/master/2.X/2.0v/tested">See All Images (Step wise)</a> 
