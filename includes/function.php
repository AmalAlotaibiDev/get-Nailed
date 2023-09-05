<?php 

//get title page
function getTitle()
{
	global $pagetitle;
	if (isset($pagetitle)) {
		echo $pagetitle;
	} else {
		echo 'Defult Title';
	}
	
}