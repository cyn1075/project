<?php

	header('Content-Type: text/html; charset=utf-8');

	$db = new mysqli('13.124.103.127', 'choi', 'choichoi', 'mysql'); 
	$db->set_charset("utf8");

	function mq($sql)
	{
		global $db;
		return $db->query($sql);
	}
?>