<?php
function printr($str){
	echo '<pre>';
	print_r($str);
	echo '<pre>';
}
function alert($str){
	alert('<script>alert('.$str.')</script>');
}