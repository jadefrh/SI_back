<?php 

$user_q = '';

if (!empty($_POST)) 
{
	//set variables
	$user_q = trim($_POST['user_q']);

		//RESET VALUES
		$user_q = '';
	}
