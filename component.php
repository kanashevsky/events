<?php
    if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
    CModule::IncludeModule("iblock");
    $request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();
    $eventIblockID = $arParams["IBLOCK_ID_EVENT"];
    $cityIblockID = $arParams["IBLOCK_ID_CITY"];

    //Получаем все города
    function getCities($iblockID){
        $resEvents = CIBlockElement::GetList(array('timestamp_x' => 'desc'), array("IBLOCK_ID" => $iblockID, "ACTIVE" => "Y"), Array("NAME","CODE"));
        while($arProperties = $resEvents->GetNext()){
            $cities[] = $arProperties;
        }
        return $cities;
    }

    //Отдает участников в заданном городе и в заданную дату
    function getParticipants($iblockID,$city,$date){
        $arFilter = array("IBLOCK_ID" => $iblockID, "ACTIVE"=>"Y", "PROPERTY_CITY.CODE" => $city, "PROPERTY_EVENT_DATE" => $date);
        $resEvents = CIBlockElement::GetList(array('timestamp_x' => 'desc'), $arFilter, Array("PROPERTY_PARTICIPANTS"));
        while($arProperties = $resEvents->GetNext()){
            $resParticipants = CIBlockElement::GetList(array('timestamp_x' => 'desc'),Array("ID" => $arProperties['PROPERTY_PARTICIPANTS_VALUE']), Array("NAME"));
            $arRes = $resParticipants->GetNext();
            $participants[]=$arRes['NAME'];   
        }
        return $participants;
    }

    $arResult["CITIES"] = getCities($cityIblockID);

    $currentCity = $request->getPost('city');
    $currentDate = date("Y-m-d");
    if(!empty($currentCity)){
        $arResult["PARTICIPANTS"] = getParticipants($eventIblockID,$currentCity,$currentDate);
    }

    $this->IncludeComponentTemplate();
