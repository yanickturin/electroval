<?php
/////////////////////////////////////////////////////////////////////////////////////////////
// Classe permettant de gérer les fichiers zip
// Version: 1.0
// Date: 24.02.09
/////////////////////////////////////////////////////////////////////////////////////////////
class Zip{
	// Déclaration des variables
	public $filename;
	public $dirForFiles;
	public $numberOfFiles;
	public $dirForThumbs;
	public $width;
	public $tempDir;
	// Fonction permettant d'enregistrer le zip
	public function moveZipToTemp(){
		if(move_uploaded_file($this -> tempName,$this -> tempDir.$this -> filename)){
			if($this -> openZip('/tmp/'.$this -> filename)){
				unlink($this -> tempDir.$this -> filename);
				return true;
			}
			else{
				unlink($this -> tempDir.$this -> filename);
				return false;
			}
		}
		else{
			return false;
		}
	}
	// Fonction permettant d'ouvrir le fichier zip
	private function openZip($zip){
		echo getcwd().$zip;
		$handle = zip_open(getcwd().$zip);
		if($handle){
			if($this -> exploreZip($handle)){
				zip_close($handle);
				return true;
			}
			else{
				zip_close($handle);
				return false;
			}
		}
		else{
			return false;
		}
	}
	// Fonction permettant d'explorer les fichiers contenus dans le zip et d'appeler d'autres fonctions si le fichier est une image
	private function exploreZip($zip){
		while($zipEntry = zip_read($zip)){
			$zipFile = zip_entry_open($zip,$zipEntry);
			if($zipFile == '.' OR $zipFile == '..'){
				$this -> exploreZip($zip.$zipFile);
			}
			else{
				$mimeContentType = mime_content_type($zipFile);
				if($mimeContentType == 'image/jpeg'){
					$this -> numberOfFiles++;
					$this -> moveImage($zipFile);
				}
			}
			zip_entry_close($zipFile);
		}
	}
	// Fonction permettant de redimentionner l'image
	private function resizeImage($zipFile){
		$newImage = imagecreatefromjpeg($zipFile);
		$size = getimagesize($zipFile);
		$pourcent=$this -> width/$size[0]*100;
		$height=$size[1]-(100-$pourcent)*($size[1]/100);
		$image = imagecreatetruecolor (200, $height);
		imagecopyresampled ($image,$newImage,0,0,0,0,$this -> width,$height,$size[0],$size[1]);
		imagejpeg($image,'image_'.$this -> numberOfFiles.'jpg',100);
		return $image;
	}
	// Fonction permettant de créer une miniature de l'image
	private function createThumb($image){
		$newImage = imagecreatefromjpeg($image);
		$size = getimagesize($image);
		$pourcent=$this -> width/$size[0]*100;
		$height=$size[1]-(100-$pourcent)*($size[1]/100);
		$thumb = imagecreatetruecolor (200, $height);
		imagecopyresampled ($thumb,$newImage,0,0,0,0,$this -> width,$height,$size[0],$size[1]);
		imagejpeg($thumb,'thumb_'.$this -> numberOfFiles.'jpg',100);
		return $thumb;
	}
	// Fonction permettant d'enregistrer l'images après l'avoir fait redimensionnée par la fonction resizeImage
	private function moveImage($zipFile){
		$image = resizeImage($zipFile);
		if(!move_uploaded_file(realpath($image),$this -> dirForFiles)){
			return false;
		}
		$thumb = $this -> createThumb($image);
		if(!move_uploaded_file(realpath($thumb),$this -> dirForThumbs)){
			return false;
		}
	}
}
?>