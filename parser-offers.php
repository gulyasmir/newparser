<?php
header("Content-type: text/html, charset=utf-8;");
require_once "SimpleXMLReader/library/SimpleXMLReader.php";


class ParserXML extends SimpleXMLReader
{
    public function __construct()
    {
        // by node name
        $this->registerCallback("Предложение", array($this, "callbackGroup"));
    }


    public function callbackGroup($reader)
    {
        $xml = $reader->expandSimpleXml();
        $id = $xml->Ид;
        $code =  $xml->Код;
        $title = $xml->Наименование;
        $price = $xml->Цены->Цена->ЦенаЗаЕдиницу." ".$xml->Цены->Цена->Валюта;
        $quantity = $xml->Количество;



        echo "Id = ".$id." <br> price = ". $price ."<br>  quantity = ".$quantity ." <br> ========================================= <br> <br>";

        include ('writetodb.php');

        return true;
    }
}