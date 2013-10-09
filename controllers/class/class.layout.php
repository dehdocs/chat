<?php
class Layout{
	
	public function theTitle(){
		echo DESCSITE;
	}
	public function theName(){
		echo NOMESITE;
	}
	public function theCss(){
		foreach(glob("assets/css/*.css") as $arquivo){
			echo '<link href="'.__BASEURL__.$arquivo.'" type="text/css" rel="stylesheet" />';
		}
	}
	public function theJs(){
		foreach(glob("assets/js/*.js") as $arquivo){
			echo '<script src="'.__BASEURL__.$arquivo.'"></script>';
		}
	}
}

