<?php

namespace DR_AWI;

session_start();

require dirname(__FILE__) . '/inc/combine.php';

use DR_AWI\AWI as AWI;

$obj = [];

function getNewPreferVal($new_value, $newImgData, $prevImgData = array('x' => 364, 'y' => 243)) {

    $pIw = intval($prevImgData['x']);
    $pIh = intval($prevImgData['y']);
    $nIw = intval($newImgData['x']);
    $nIh = intval($newImgData['y']);
    $defX = intval($nIw / $pIw);
    $defY = intval($nIh / $pIh);
    $avDef = intval(($defX + $defY) / 2);
    return intval($new_value) * $avDef;
}

$img_save_type = 'JPEG';
if (isset($_GET['img_save_type'])) {
    $the_type = intval($_GET['img_save_type']);
    if ($the_type == 2) {
        $img_save_type = "PNG";
    } else if ($the_type == 3) {
        $img_save_type = "XBM";
    } else if ($the_type == 4) {
        $img_save_type = "WBMP";
    }
}


if (isset($_SESSION['style_set'])) {
    $data = $_SESSION['style_set'];
    $img = new AWI("face/tmp/temp.jpeg");
    $actualImgSizes = $img->get_actual_size();
    foreach ($data as $key1 => $value1) {
        $img_pos = "M";
        $img_text = null;
        $text_size = 10;
        $text_agestY = $text_agestX = $text_font = $text_effect = $text_shadow_gap = $text_rotate = 0;
        $rgb = $shadowC = "255,255,255";

        foreach ($value1 as $key2 => $value2) {
            if ($key2 == "img_text") {
                $img_text = trim($value2);
            } elseif ($key2 == "text_pos") {
                $img_pos = trim($value2);
            } elseif ($key2 == "text_size") {
                $text_size = getNewPreferVal(intval($value2), $actualImgSizes);
            } elseif ($key2 == "text_colour") {
                $text_colour = trim($value2);
                $rgb = $img->getRgbCFromHex($text_colour);
            } elseif ($key2 == "text_font") {
                $text_font = intval($value2);
            } elseif ($key2 == "text_rotate") {
                $text_rotate_val = getNewPreferVal(intval($value2), $actualImgSizes);
                if ($text_rotate_val > 0 && $text_rotate_val < 360) {
                    $text_rotate = $text_rotate_val;
                }
            } elseif ($key2 == "text_effect") {
                $text_effect = intval($value2);
            } elseif ($key2 == "text_agestX") {
                $text_agestX = getNewPreferVal(intval($value2), $actualImgSizes);
            } elseif ($key2 == "text_agestY") {
                $text_agestY = getNewPreferVal(intval($value2), $actualImgSizes);
            } elseif ($key2 == "text_shadow_gap") {
                $text_shadow_gap = getNewPreferVal(intval($value2), $actualImgSizes);
            } elseif ($key2 == "text_shadow_colur") {
                $shadowC = $img->getRgbCFromHex(trim($value2));
            }
        }
        if ($text_effect == 1) {
            $img->setTextShadow(1);
        } elseif ($text_effect == 2 && $text_shadow_gap > 1) {

            $img->setTextShadow($text_shadow_gap, $shadowC);
        }
        $img_pos .= "(" . $text_agestY . "," . $text_agestX . ")";
        $img->setFont($text_font, $text_size);
        $img->setCaption($img_text, $img_pos, 0, $rgb, $text_rotate);
    }
    $obj["image_string"] = $img->getImage64BaseString($img_save_type);
    $img->destroyAll();
}
echo json_encode($obj);
