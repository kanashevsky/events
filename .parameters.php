<?php
	if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();

	$dbIBlockID = CIBlock::GetList(array("sort" => "asc"),array("ACTIVE" => "Y"));
	while ($arIBlock = $dbIBlockID->Fetch())
	{
		$arIblockID[$arIBlock["ID"]] = "[".$arIBlock["ID"]."] ".$arIBlock["NAME"];
	}

	$arComponentParameters = array(
		"PARAMETERS" => array(
			"IBLOCK_ID_CITY" => array (
				"PARENT" => "BASE",
				"NAME" => "Инфоблок с городами",
				"MULTYPLE" => "Y",
				"TYPE" => "LIST",
				"VALUES" => $arIblockID,
				"DEFAULT" => null,
			),
			"IBLOCK_ID_EVENT" => array (
				"PARENT" => "BASE",
				"NAME" => "Инфоблок с мероприятиями",
				"MULTYPLE" => "Y",
				"TYPE" => "LIST",
				"VALUES" => $arIblockID,
				"DEFAULT" => null,
			),
		),
	);
