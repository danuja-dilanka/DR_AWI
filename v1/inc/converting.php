<?php

namespace DR_AWI;

$required_file = dirname(__FILE__) . '/effecting.php';

if (!file_exists($required_file)) {
    die("File Error: effecting.php Not Available!");
}

require $required_file;

class Convert extends effects {

    function saveItAs(string $imgType = "PNG") {
        $type = strtoupper(trim($imgType));
        for ($i = 0; $i < count($this->allow_types); $i++) {
            if ($this->allow_types[$i] == $type) {
                $this->img_save_type = $type;
                break;
            }
        }
    }

}
