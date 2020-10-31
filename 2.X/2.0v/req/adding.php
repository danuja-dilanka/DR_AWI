<?php

namespace DR_AWI;

$required_file = dirname(__FILE__) . '/img_config.php';

if (!file_exists($required_file)) {
    die("File Error: img_config.php Not Available!");
}

require $required_file;

class Adding extends DR_AWI_img_config {
    
    function setDefaultCapMargin(int $theMargin) {
        $this->defaultMargin = $theMargin;
    }

    function setFontColour(string $capColor) {
        $this->captionColour = trim($capColor);
    }

    function setTextShadow(int $gap = 5, string $shadowColour = null) {
        $this->shadowGap = $gap;
        $this->shadowColour = $shadowColour;
    }

    function setBorder(int $bSize = 1, string $borColor = "0,0,0", string $btype = "A") {
        $rgbValu = $this->getRebValues(trim($borColor));
        if ($this->width == 0) {
            $this->set_size();
        }
        if ($this->startingPoint == null) {
            $this->crop_starting_pos();
        }
        $img = $this->new_img;
        if ($img == null) {
            $img = $this->create_new_img();
        }

        $borderDet = $this->borderCalc($bSize, $btype);
        $newWidth = $borderDet["w"];
        $newHeight = $borderDet["h"];
        $startX = $borderDet["x"];
        $startY = $borderDet["y"];

        $background = imagecreatetruecolor($newWidth, $newHeight);
        if ($background != FALSE) {
            if (imagefilledrectangle($background, 0, 0, $newWidth, $newHeight, imagecolorallocate($background, $rgbValu["r"], $rgbValu["g"], $rgbValu["b"]))) {
                if (imagecopyresized($background, $this->new_img, $startX, $startY, 0, 0, $this->width, $this->height, $this->width, $this->height)) {
                    $this->new_img = $background;
                    $this->width = $newWidth;
                    $this->height = $newHeight;
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function rotateIt(int $degree = 180, string $uncoverCol = "255,255,255") {
        $rgbValu = $this->getRebValues(trim($uncoverCol));
        if ($degree > 360) {
            $degree = 0;
        }
        if ($this->width == 0) {
            $this->set_size();
        }
        if ($this->startingPoint == null) {
            $this->crop_starting_pos();
        }
        $img = $this->new_img;
        if ($img == null) {
            $img = $this->create_new_img();
        }
        $rotate = imagerotate($img, $degree, imagecolorallocate($img, $rgbValu["r"], $rgbValu["g"], $rgbValu["b"]));
        if ($rotate != FALSE) {
            $this->new_img = $rotate;
            return $img;
        } else {
            return false;
        }
    }

    function setFont(int $fontNo = 0, int $fontSize = 10, string $fontColour = null) {
        $Allfonts = $this->Allfonts;
        if ($fontNo < count($Allfonts)) {
            $this->fontFamily = $fontNo;
        }
        if ($fontColour != null) {
            $this->captionColour = $fontColour;
        }
        $this->fontSize = $fontSize;
    }

    function setCaption(string $caption, string $pos = "M", int $fontSize = 0, string $capColor = null, int $textRotate = 0) {
        if ($fontSize == 0) {
            $fontSize = $this->fontSize;
        }
        if ($capColor == null) {
            $rgbValu = $this->getRebValues(trim($this->captionColour));
        } else {
            $rgbValu = $this->getRebValues(trim($capColor));
        }
        $startingPos = strtoupper(trim($pos));

        if ($this->width == 0) {
            $this->set_size();
        }
        if ($this->startingPoint == null) {
            $this->crop_starting_pos();
        }
        $img = $this->new_img;
        if ($img == null) {
            $img = $this->create_new_img();
        }
        $this->agestCPos($startingPos);
        $tc = imagecolorallocate($img, $rgbValu["r"], $rgbValu["g"], $rgbValu["b"]);
        $base_dir = dirname(__FILE__) . '/fonts/';
        $fontFamily = $this->fontFamily;
        if ($fontFamily == 0) {
            $font = $base_dir . "arial.ttf";
        } else {
            $font = $base_dir . $this->getFont($fontFamily);
        }
        imagettftext($img, $fontSize, $textRotate, $this->capPosX, $this->capPosY, $tc, $font, $caption);
        $shadow = $this->shadowGap;
        if ($shadow > 0) {
            $shadowColour = $this->shadowColour;
            if ($shadowColour != null) {
                $rgbValu = $this->getRebValues(trim($shadowColour));
                $tc = imagecolorallocate($img, $rgbValu["r"], $rgbValu["g"], $rgbValu["b"]);
            }
            imagettftext($img, $fontSize, $textRotate, $this->capPosX, $this->capPosY + $shadow, $tc, $font, $caption);
            $this->shadowGap = 0;
        }
    }

    function scaleIt(int $newWidth = 0, int $newHeight = 0) {
        if ($this->width == 0) {
            $this->set_size();
        }
        if ($this->startingPoint == null) {
            $this->crop_starting_pos();
        }
        $img = $this->new_img;
        if ($img == null) {
            $img = $this->create_new_img();
        }
        $new_mod_w = $this->width;
        $new_mod_h = $this->height;
        if ($newWidth > 0 && $newWidth < 5) {
            $new_mod_w = ceil($this->width / 2 ** $newWidth) + $this->width;
        } elseif ($newWidth > 5) {
            $new_mod_w = $newWidth;
        }
        if ($newHeight > 0 && $newHeight < 5) {
            $new_mod_h = ceil($this->height / 2 ** $newHeight) + $this->height;
        } elseif ($newHeight > 5) {
            $new_mod_h = $newHeight;
        }
        $scaleStatus = imagescale($img, $new_mod_w, $new_mod_h, IMG_BILINEAR_FIXED);
        if ($scaleStatus != false) {
            $this->width = $newWidth;
            $this->height = $newHeight;
            $this->new_img = $scaleStatus;
            return true;
        } else {
            return false;
        }
    }

   

}
