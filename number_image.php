<?php

	$user_name = $_GET['uNumb'];
	$image_width = 200;
	$image_height = 50;
	$str = $user_name;
	$input = $str[$i];
	$position = -10;
	
	//create the image

	$img = imagecreatetruecolor($image_width, $image_height);

	//Setup colors for use

	$back_color = imagecolorallocate($img, 201, 151, 0); //gold
	$font_color = imagecolorallocate($img, 0, 40, 85); //blue
	$accent_color = imagecolorallocate($img, 255, 255, 255); //white

	//Fill the background

	imagefilledrectangle($img, 0, 0, $image_width, $image_height, $back_color);

	//Add random lines
	$randomlines = rand(5, 10);
	for ($i = 0; $i < $randomlines; $i++) {

			imageline($img, 0, rand() % $image_height, $image_width, rand() % $image_height, $accent_color);
	}

	//Add some random dots

	$dots = rand(50, 100); //random 50-100 dots

	for ($i = 0; $i < $dots; $i++) {

		imagesetpixel($img, rand() % $image_width, rand() % $image_height, $graphic_color);

	}

	//Draw user number
	$angle = rand(0, 20); //randon 0-20 angle

	for ($i = 0; $i < 5; $i++) { //start for loop for user number array

		$input = $str[$i];
		$position = $position + 30; //set position of each character on the array.

		imagettftext($img, 50, $angle, $position, $image_height - 10, $font_color, './fonts/LuxuryImport.ttf',$input);

		$angle=$angle+10; // increase angle by 10 degrees

 	}
 	
	//output image

	header("Content-type: image/png");
	imagepng($img);

	//System clean up
	imagedestroy($img);


?>
