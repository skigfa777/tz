<?
$current_date = date('d.m.Y H:i:s');
$filter = [
    "IBLOCK_ID" => 4,//ID инфоблока
    "ACTIVE" => 'Y',
    ">=DATE_ACTIVE_TO" => $current_date,//активно до
];
$select = ["DATE_ACTIVE_TO", "NAME", "PROPERTY_CITY.NAME", "PROPERTY_HUMAN.NAME"];
if (CModule::includeModule('iblock')) {
    $arSelect = CIBlockElement::GetList(["SORT" => "ASC"], $filter, false, false, $select);
}
while ($arItem = $arSelect->GetNext()) {
    $res[$arItem['PROPERTY_CITY_NAME']][$arItem['NAME'].', до '.$arItem['DATE_ACTIVE_TO']][] = 
        $arItem['PROPERTY_HUMAN_NAME'];
}
echo '<pre>',print_r($res,1),'</pre>';
