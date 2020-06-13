<?php

namespace DR_AWI;

$required_file = dirname(__FILE__) . '/adding.php';

if (!file_exists($required_file)) {
    die("File Error: adding.php Not Available!");
}

require $required_file;

class effects extends Adding {

    protected function setLayerEffect(string $effectType) {
        $effect = strtoupper(trim($effectType));
        $img = $this->new_img;
        if ($img == null) {
            $img = $this->create_new_img();
        }
        if ($effect == "EFF_REPLACE") {
            imagelayereffect($img, IMG_EFFECT_REPLACE);
        } elseif ($effect == "EFF_ALPHABLEND") {
            imagelayereffect($img, IMG_EFFECT_ALPHABLEND);
        } elseif ($effect == "EFF_NORMAL") {
            imagelayereffect($img, IMG_EFFECT_NORMAL);
        } elseif ($effect == "EFF_OVERLAY") {
            imagelayereffect($img, IMG_EFFECT_OVERLAY);
        } elseif ($effect == "EFF_MULTIPLY") {
            imagelayereffect($img, IMG_EFFECT_MULTIPLY);
        }
        return $img;
    }

    function setScatter(int $effLev, int $addEffLev) {
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
        return imagefilter($img, IMG_FILTER_SCATTER, $effLev, $addEffLev);
    }

    function setPixelate(int $blockSize, bool $ad_pixel = false) {
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
        return imagefilter($img, IMG_FILTER_PIXELATE, $blockSize, $ad_pixel);
    }

    function setColorize(int $red = 0, int $green = 0, int $blue = 0, int $alpha = 0) {
        if ($red < 0 || $red > 255) {
            $red = 0;
        }
        if ($green < 0 || $green > 255) {
            $green = 0;
        }
        if ($blue < 0 || $blue > 255) {
            $blue = 0;
        }
        if ($alpha < 0 || $alpha > 255) {
            $alpha = 0;
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
        return imagefilter($img, IMG_FILTER_COLORIZE, $red, $green, $blue, $alpha);
    }

    function setContrast(int $contrasttLev = 0) {
        $img = $this->new_img;
        if ($img == null) {
            $img = $this->create_new_img();
        }
        return imagefilter($img, IMG_FILTER_CONTRAST, $contrasttLev);
    }

    function setSmooth(int $smoothLev = 0) {
        $img = $this->new_img;
        if ($img == null) {
            $img = $this->create_new_img();
        }
        return imagefilter($img, IMG_FILTER_SMOOTH, $smoothLev);
    }

    function setBrightness(int $brightLev = 0) {
        if ($brightLev > 255 || $brightLev < -255) {
            $brightLev = 0;
        }
        $img = $this->new_img;
        if ($img == null) {
            $img = $this->create_new_img();
        }
        return imagefilter($img, IMG_FILTER_BRIGHTNESS, $brightLev);
    }

    function setBaseEffect(string $effectType, $resource = null) {
        $effect = strtoupper(trim($effectType));
        if ($resource == null) {
            $img = $this->new_img;
            if ($img == null) {
                $img = $this->create_new_img();
            }
        } else {
            $img = $resource;
        }
        if ($effect == "NEG") {
            imagefilter($img, IMG_FILTER_NEGATE);
        } elseif ($effect == "GRAY") {
            imagefilter($img, IMG_FILTER_GRAYSCALE);
        } elseif ($effect == "EDGED") {
            imagefilter($img, IMG_FILTER_EDGEDETECT);
        } elseif ($effect == "EMBOSS") {
            imagefilter($img, IMG_FILTER_GRAYSCALE);
        } elseif ($effect == "GBLUR") {
            imagefilter($img, IMG_FILTER_GAUSSIAN_BLUR);
        } elseif ($effect == "SBLUR") {
            imagefilter($img, IMG_FILTER_SELECTIVE_BLUR);
        } elseif ($effect == "MREMOV") {
            imagefilter($img, IMG_FILTER_MEAN_REMOVAL);
        }
        return $img;
    }

}
