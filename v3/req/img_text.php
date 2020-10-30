<?php

namespace DR_AWI;

class DR_AWI_img_text extends DR_AWI_core {

    function setNewBG(string $bgSize = "600,375", string $bgColour = "0,0,0") {
        $rgbValues = $this->getRebValues(trim($bgColour));
        $sizes = explode(",", trim($bgSize));
        $width = abs(intval($sizes[0]));
        $height = abs(intval($sizes[1]));
        $img = imagecreate($width, $height);
        imagecolorallocate($img, $rgbValues["r"], $rgbValues["g"], $rgbValues["b"]);
        $this->new_img = $img;
        $this->width = $this->Wpixel = $width;
        $this->height = $this->Hpixel = $height;
        return $img;
    }

}
