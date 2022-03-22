<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Aayusmain{

	function createHtmlName($string){
		$string = strtolower(preg_replace("/[^a-zA-Z0-9_-]/","-",$string));
		$string = str_replace("(","",$string);
		$string = str_replace(")","",$string);
		$string = str_replace("---","-",$string);
		return str_replace("--","-",$string);
	}

}