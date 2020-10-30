<?php

namespace DR_AWI;

$required_file = dirname(__FILE__) . '/converting.php';

if (!file_exists($required_file)) {
    die("File Error: converting.php Not Available!");
}

require $required_file;

class imgOnImg extends Convert {

    function setTopBlockColour(string $rgbColur = null) {
        $val = trim($rgbColur);
        if ($val != null) {
            $this->newImgDefColour = $val;
        }
    }

    function addNewImage(string $src = null, string $size = null, string $position = null, string $layerEfeect = null, string $bEffect = null) {
        $newSizes = explode(",", trim($size));
        $newImgWidth = $this->newImgWidth;
        $newImgheight = $this->newImgheight;
        if (count($newSizes) == 2) {
            $newImgWidth = abs(intval($newSizes[0]));
            $newImgheight = abs(intval($newSizes[1]));
            if ($newImgWidth > 0) {
                $this->newImgWidth = $newImgWidth;
            }
            if ($newImgheight > 0) {
                $this->newImgheight = $newImgheight;
            }
        }
        $newImgSrc = trim($src);
        if ($newImgSrc == null) {
            $new_resorce = $this->setNewBG($size, $this->newImgDefColour);
        } else {
            $new_resorce = $this->create_img_copy($newImgSrc);
        }
        if ($new_resorce != false) {
            if ($this->width == 0) {
                $this->set_size();
            }
            $img = $this->new_img;
            if ($layerEfeect != null) {
                $this->setLayerEffect($layerEfeect);
            }
            if ($img == null) {
                $img = $this->create_new_img();
            }
            $this->new_resource = $new_resorce;
            $thumb = $this->resizeIt($newImgWidth, $newImgheight);
            if ($bEffect != null) {
                $thumb = $this->setBaseEffect($bEffect, $thumb);
            }
            $this->topImgH = $newImgheight;
            $this->topImgW = $newImgWidth;
            $this->have_top_image = true;
            $newPositions = $this->crop_starting_pos($position);
            if (imagecopyresized($img, $thumb, abs(intval($newPositions["x"])), abs(intval($newPositions["y"])), 0, 0, $newImgWidth, $newImgheight, $newImgWidth, $newImgheight)) {
                return $img;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}
