<?php

namespace DR_AWI;

session_start();

require dirname(__FILE__) . '/inc/combine.php';

use DR_AWI\AWI as AWI;

$obj = [];

if (isset($_GET["new_img_src"]) && !isset($_GET["data"])) {
    $img = new AWI(trim($_GET["new_img_src"]));
    $img->saveItAs("jpeg");
    $img->renameIt("temp");
    $status = $img->saveIt("face/tmp");
    if ($status != false) {
        $obj["status"] = 1;
    } else {
        $obj["status"] = 0;
    }
}


if (isset($_GET["data"])) {

    $img = new AWI("face/tmp/temp.jpeg");
    $img->resizeIt(364, 243);
    $data = json_decode(trim($_GET["data"]), TRUE);
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
                $text_size = intval($value2);
            } elseif ($key2 == "text_colour") {
                $text_colour = trim($value2);
                $rgb = $img->getRgbCFromHex($text_colour);
            } elseif ($key2 == "text_font") {
                $text_font = intval($value2);
            } elseif ($key2 == "text_rotate") {
                $text_rotate_val = intval($value2);
                if ($text_rotate_val > 0 && $text_rotate_val < 360) {
                    $text_rotate = $text_rotate_val;
                }
            } elseif ($key2 == "text_effect") {
                $text_effect = intval($value2);
            } elseif ($key2 == "text_agestX") {
                $text_agestX = intval($value2);
            } elseif ($key2 == "text_agestY") {
                $text_agestY = intval($value2);
            } elseif ($key2 == "text_shadow_gap") {
                $text_shadow_gap = intval($value2);
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
    $obj["image_string"] = $img->getImage64BaseString();
    $img->destroyAll();
}


echo json_encode($obj);
