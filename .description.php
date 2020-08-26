<?php
	if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
	$arComponentDescription = [
		"NAME"          =>  GetMessage("EVENTS_NAME"),
		"DESCRIPTION"   =>  GetMessage("EVENTS_DESCRIPTION"),
		"CACHE_PATH"    =>  'Y',
		"PATH"          =>  [
			"ID"        =>  'sopdu',
			"NAME"      =>  GetMessage("EVENTS_DEVELOPER")
		]
	];
