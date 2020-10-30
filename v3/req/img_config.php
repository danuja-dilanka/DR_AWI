<?php

namespace DR_AWI;

$required_file = dirname(__FILE__) . '/base.php';

if (!file_exists($required_file)) {
    die("File Error: base.php Not Available!");
}

require $required_file;

class DR_AWI_img_config extends DR_AWI_cores {

    function get_actual_size($resource = null) {
        $sizes = [];
        $img_obj = ($resource != null) ? $resource : $this->create_img_copy();
        if ($img_obj == FALSE) {
            return FALSE;
        }
        if ($resource == null) {
            $sizes["x"] = $this->Wpixel = intval((imagesx($img_obj) != FALSE) ? imagesx($img_obj) : $this->width);
            $sizes["y"] = $this->Hpixel = intval((imagesy($img_obj) != FALSE) ? imagesy($img_obj) : $this->height);
        } else {
            $sizes["x"] = intval(imagesx($img_obj));
            $sizes["y"] = intval(imagesy($img_obj));
        }
        return $sizes;
    }

    function set_size(int $width = 0, int $height = 0) {
        if (!$this->get_actual_size()) {
            return FALSE;
        }
        if ($width > 4 && $height > 4) {
            if ($width > $this->Wpixel) {
                $this->width = $this->Wpixel;
            } else {
                $this->width = $width;
            }
            if ($height > $this->Hpixel) {
                $this->height = $this->Hpixel;
            } else {
                $this->height = $height;
            }
        } elseif ($width <= 0 && $height <= 0) {
            $this->height = $this->Hpixel;
            $this->width = $this->Wpixel;
        } else {
            if ($width > 0) {
                $this->width = ceil($this->Wpixel / (2 ** $width));
            } else {
                $this->width = $this->Wpixel;
            }
            if ($height > 0) {
                $this->height = ceil($this->Hpixel / (2 ** $height));
            } else {
                $this->height = $this->Hpixel;
            }
        }
    }

    function crop_starting_pos(string $point = "TL") {
        $startingPoint = $this->startingPoint = strtoupper(trim($point));
        $this->posXYArray = $point;

        if ($this->have_top_image != true) {
            $mainWidth = $this->Wpixel;
            $mainHeight = $this->Hpixel;
            $minWidth = $this->width;
            $minHeight = $this->height;
        } else {
            $mainWidth = $this->width;
            $mainHeight = $this->height;
            $minWidth = $this->topImgW;
            $minHeight = $this->topImgH;
            $this->have_top_image = false;
        }

        if ($startingPoint == "TR") {
            $calc = $mainWidth - $minWidth;
            $this->startX = ($calc > 0) ? $calc : 0;
        } elseif ($startingPoint == "TM") {
            $calc = ceil(($mainWidth - $minWidth) / 2);
            $this->startX = ($calc > 0) ? $calc : 0;
        } elseif ($startingPoint == "BL") {
            $calc = $mainHeight - $minHeight;
            $this->startY = ($calc > 0) ? $calc : 0;
        } elseif ($startingPoint == "BM") {
            $calc1 = ceil(($mainWidth - $minWidth) / 2);
            $calc2 = $mainHeight - $minHeight;
            $this->startX = ( $calc1 > 0) ? $calc1 : 0;
            $this->startY = ($calc2 > 0) ? $calc2 : 0;
        } elseif ($startingPoint == "BR") {
            $calc1 = $mainWidth - $minWidth;
            $calc2 = $mainHeight - $minHeight;
            $this->startX = ( $calc1 > 0) ? $calc1 : 0;
            $this->startY = ($calc2 > 0) ? $calc2 : 0;
        } elseif ($startingPoint == "M") {
            $newX = ceil(($mainWidth - $minWidth) / 2);
            $newY = ceil(($mainHeight - $minHeight) / 2);
            $this->startX = ($newX > 0) ? $newX : 0;
            $this->startY = ($newY > 0) ? $newY : 0;
        } elseif ($startingPoint == "ML") {
            $newY = ceil(($mainHeight - $minHeight) / 2);
            $this->startY = ($newY > 0) ? $newY : 0;
        } elseif ($startingPoint == "MR") {
            $newX = $mainWidth - $minWidth;
            $newY = ceil(($mainHeight - $minHeight) / 2);
            $this->startX = ($newX > 0) ? $newX : 0;
            $this->startY = ($newY > 0) ? $newY : 0;
        } else {
            $pos_data = explode(",", trim($startingPoint));
            if (count($pos_data) == 2) {
                $newX = abs(intval($pos_data[0]));
                $newY = abs(intval($pos_data[1]));
                $this->startX = ($newX < $mainWidth) ? $newX : 0;
                $this->startY = ($newY < $mainHeight) ? $newY : 0;
            }
        }
        return array("x" => $this->startX, "y" => $this->startY);
    }

    function create_img_copy(string $Newsrc = null) {
        $modSrc = trim($Newsrc);
        if ($modSrc == null) {
            $src = $this->src;
        } else {
            $src = $modSrc;
        }
        $image = FALSE;
        if (exif_imagetype($src) == IMAGETYPE_JPEG) {
            $image = imagecreatefromjpeg($src);
            $this->img = ($modSrc == null) ? $image : null;
        } elseif (exif_imagetype($src) == IMAGETYPE_PNG) {
            $image = imagecreatefrompng($src);
            $this->img = ($modSrc == null) ? $image : null;
            $this->img_type = 2;
        } elseif (exif_imagetype($src) == IMAGETYPE_GIF) {
            $image = imagecreatefromgif($src);
            $this->img = ($modSrc == null) ? $image : null;
            $this->img_type = 3;
        } elseif (exif_imagetype($src) == IMAGETYPE_WBMP) {
            $image = imagecreatefromwbmp($src);
            $this->img = ($modSrc == null) ? $image : null;
            $this->img_type = 4;
        } elseif (exif_imagetype($src) == IMAGETYPE_XBM) {
            $image = imagecreatefromwbmp($src);
            $this->img = ($modSrc == null) ? $image : null;
            $this->img_type = 5;
        } else {
            $imgData = base64_decode($src);
            $image = imagecreatefromstring($imgData);
            if ($image !== FALSE) {
                $this->img = ($modSrc == null) ? $image : null;
                $this->img_type = 2;
            }
        }
        return $image;
    }

}
