<?php

namespace DR_AWI;

$required_file = dirname(__FILE__) . '/on_img.php';

if (!file_exists($required_file)) {
    die("File Error: on_img.php Not Available!");
}

require $required_file;

class AWI extends imgOnImg {
    
}
