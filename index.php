<?php
header("Content-type: text/html, charset=utf-8;");
require_once "XMLReader/library/SimpleXMLReader.php";

$line = array();

$line[] = iconv("UTF-8", "CP1251", "ИД");
$line[] = iconv("UTF-8", "CP1251", "Наименование");


$fp = fopen('big.csv', 'w');
fputcsv($fp, $line, ';', '"');
fclose($fp);

class ParserXML extends SimpleXMLReader
{
    public function __construct()
    {
        // by node name
        $this->registerCallback("Группа", array($this, "callbackGroup")); //смотрим группы
    }


    public function callbackGroup($reader)
    {
        $xml = $reader->expandSimpleXml();
        $id = iconv("UTF-8", "CP1251", $xml->Ид);
        $title = iconv("UTF-8", "CP1251", $xml->name);


        $arr = array();
        $line = array();

        $line[] = $id;
        $line[] = $title;
        //  $line[] = $sort ;

        if ($fp) {
            fputcsv($fp, $line, ';', '"');
        } else {
            $fp = fopen('big.csv', 'a');
            fputcsv($fp, $line, ';', '"');
            fclose($fp);
        }
        unset($line);
          echo "Ид =".$id." <br> Наименование - ".$title ." <br> <br> <br>";
        return true;
    }
}

        $file = "offers7_1.xml";
        $reader = new ExampleXmlReader1();

        libxml_clear_errors();
        libxml_use_internal_errors(true);

        $reader->open($file);

        $reader->parse();

        $arrayErrors = libxml_get_errors();

        $reader->close();

        $xml_errors = "";
        foreach ($arrayErrors as $xmlError) $xml_errors .= $xmlError->message;
        if ($xml_errors != "") {
        echo "XML not valid: ".$xml_errors;
        }


