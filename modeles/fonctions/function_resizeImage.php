<?php
function resizeImage($file,$width){
	list($widthSource,$heightSource,$type) = getimagesize($file);
	if($widthSource > $width){
		$pourcentage = $width/($widthSource/100);
		$height = $heightSource - (100-$pourcentage)*($heightSource/100);
		if($type == 2){
			$im = imagecreatetruecolor($width,$height);
			$image = imagecreatefromjpeg($file);
			imagecopyresampled($im, $image, 0, 0, 0, 0, $width, $height, $widthSource, $heightSource);
			$image = imagejpeg($im,$file,80);
			imagedestroy($im);
		}
	}
}
?>