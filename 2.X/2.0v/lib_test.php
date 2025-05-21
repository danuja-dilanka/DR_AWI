<?php

namespace DR_AWI;

require dirname(__FILE__) . '/req/combine.php';

use DR_AWI\AWI as AWI;

// Ensure the input image exists or AWI might create a default one
$inputFile = "test.jpeg";
if (!file_exists($inputFile)) {
    // Attempt to create a dummy test.jpeg if not found, as per problem context
    // This is a fallback, ideally the file should exist as per problem statement.
    $dummy_img = @imagecreatetruecolor(100, 100);
    if ($dummy_img) {
        $bgColor = imagecolorallocate($dummy_img, 255, 255, 255); // white
        imagefill($dummy_img, 0, 0, $bgColor);
        imagejpeg($dummy_img, $inputFile);
        imagedestroy($dummy_img);
        // echo "DEBUG: Created dummy $inputFile\n";
    } else {
        echo "ERROR: Input file $inputFile not found and could not create dummy.\n";
        exit;
    }
}

$img = new AWI($inputFile); 

$img->resizeIt(1, 1);
$img->setBorder(100, "0,0,0", "l");
$img->setBorder(50, "0,0,0", "b");
$img->setBorder(25, "0,0,0", "r");
$img->setBorder(12, "0,0,0", "t");
$img->setTextShadow(2, "250,0,100");
$img->setFont(1, 30);
$img->setFont(2, 20);
$img->setCaption("2020-04-05", "BL");
$img->setFont(2, 50);
$img->setTopBlockColour("255,255,255");
$img->addNewImage(null, "200,100", "200,0", "EFF_OVERLAY");
$img->setCaption("Hey! It's Me", "m(-50,45)");

// Set the desired output filename (without extension, saveIt adds it)
$img->renameIt("output_test");
// Save the image to the current directory ('.'), as PNG, don't create dir (0), don't delete source (0)
$save_result = $img->saveIt('.', 'PNG', 0, 0);

if ($save_result) {
    // $save_result is the filename (e.g., "output_test.png") if successful
    echo "IMAGE_TEST_SUCCESSFUL\n";
} else {
    echo "IMAGE_TEST_FAILED\n";
}

?>
