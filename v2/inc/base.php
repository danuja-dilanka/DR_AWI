<?php

namespace DR_AWI;

$required_file = dirname(__FILE__) . '/core.php';

if (!file_exists($required_file)) {
    die("File Error: core.php Not Available!");
}

require $required_file;

class DR_AWI_cores {

    use core_var,
        core_FC,
        core_img,
        core_path,
        core_cal;

    function __construct(string $src = null) {
        $image_src = trim($src);
        $reqSrc = $this->src = $image_src;
        if (filter_var($reqSrc, FILTER_VALIDATE_URL)) {
            $serverDet = explode("/", $reqSrc)[2];
            $connected = fsockopen($serverDet, 80);
            if (!$connected) {
                die("Need Internet Connection!");
            }
        }
        if ($image_src == null) {
            $this->setNewBG();
        }
    }

    function setNewBG(string $bgSize = "1200,720", string $bgColour = "0,0,0") {
        $rgbValues = $this->getRebValues(trim($bgColour));
        $sizes = explode(",", trim($bgSize));
        $width = abs(intval($sizes[0]));
        $height = abs(intval($sizes[1]));
        $img = imagecreate($width, $height);
        imagecolorallocate($img, $rgbValues["r"], $rgbValues["g"], $rgbValues["b"]);
        $new_img = $this->new_img;
        if ($new_img == null) {
            $this->new_img = $img;
        }
        $this->width = $this->Wpixel = $width;
        $this->height = $this->Hpixel = $height;
        return $img;
    }

    function deleteSource() {
        $src = $this->src;
        if (!filter_var($src, FILTER_VALIDATE_URL)) {
            if (file_exists($src)) {
                return (unlink($src)) ? true : false;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function renameIt(string $name) {
        $this->img_new_name = trim($name);
    }

    function saveIt(string $target_path, int $createDir = 0, int $deleteSource = 0) {
        if (!is_dir($target_path)) {
            if ($createDir == 1) {
                $is_DirCreted = $this->creatBasePath($target_path);
                if ($is_DirCreted == false) {
                    return false;
                }
            } else {
                return false;
            }
        }
        if ($this->width == 0) {
            $this->set_size();
        }
        $new_img = $this->new_img;
        $img_type = $this->img_type;
        if ($this->new_img == null) {
            $new_img = $this->create_new_img();
        }

        $is_croped = false;
        if ($new_img != FALSE) {
            $img_name = $this->img_new_name;
            if ($img_name == null) {
                $img_name = $this->width . "_" . $this->height . "_" . mt_rand(100000, 1000000);
            }
            $img_save_type = $this->img_save_type;
            if ($img_save_type == null) {
                if (($img_type == 1)) {
                    $img_name .= '.jpeg';
                    $is_croped = (imagejpeg($new_img, $target_path . '/' . $img_name)) ? true : false;
                } elseif (($img_type == 2)) {
                    $img_name .= '.png';
                    $is_croped = (imagepng($new_img, $target_path . '/' . $img_name)) ? true : false;
                } elseif (($img_type == 3)) {
                    $img_name .= '.gif';
                    $is_croped = (imagegif($new_img, $target_path . '/' . $img_name)) ? true : false;
                } elseif (($img_type == 4)) {
                    $img_name .= '.wbmp';
                    $is_croped = (imagewbmp($new_img, $target_path . '/' . $img_name)) ? true : false;
                } elseif (($img_type == 5)) {
                    $img_name .= '.xbm';
                    $is_croped = (imagexbm($new_img, $target_path . '/' . $img_name)) ? true : false;
                }
            } else {
                if (($img_save_type == "JPG" || $img_save_type == "JPEG")) {
                    $img_name .= '.jpeg';
                    $is_croped = (imagejpeg($new_img, $target_path . '/' . $img_name)) ? true : false;
                } elseif (($img_save_type == "PNG")) {
                    $img_name .= '.png';
                    $is_croped = (imagepng($new_img, $target_path . '/' . $img_name)) ? true : false;
                } elseif (($img_save_type == "GIF")) {
                    $img_name .= '.gif';
                    $is_croped = (imagegif($new_img, $target_path . '/' . $img_name)) ? true : false;
                } elseif (($img_save_type == "WBMP")) {
                    $img_name .= '.wbmp';
                    $is_croped = (imagewbmp($new_img, $target_path . '/' . $img_name)) ? true : false;
                } elseif (($img_save_type == "XBM")) {
                    $img_name .= '.xbm';
                    $is_croped = (imagexbm($new_img, $target_path . '/' . $img_name)) ? true : false;
                }
            }

            imagedestroy($this->new_img);
            if ($this->img != null) {
                imagedestroy($this->img);
            }

            if ($is_croped == true) {
                $is_deleted = ($deleteSource == 1) ? $this->deleteSource() : false;
                return $img_name;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function getRgbCFromHex($hexC = "#ffffff") {
        $hex = str_split(ltrim($hexC, $hexC[0]), 2);
        $r = hexdec($hex[0]);
        $g = hexdec($hex[1]);
        $b = hexdec($hex[2]);
        return strval($r) . "," . strval($g) . "," . strval($b);
    }

    function destroyAll() {
        if ($this->img != null) {
            imagedestroy($this->img);
        }
        if ($this->new_img != null) {
            imagedestroy($this->new_img);
        }
    }

}
