<?php
/**
 * Created by IntelliJ IDEA.
 * User: Javier
 * Date: 12/09/2017
 * Time: 14:20
 */



if(isset($_POST['submit'])){ //check if form was submitted

    $target_dir = 'uploads/';
    $target_file = $target_dir . basename($_FILES["filepath"]["name"]);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    move_uploaded_file($_FILES["filepath"]["tmp_name"], $target_file);

    //require_once dirname(__FILE__) . '/Includes/Classes/PHPExcel/IOFactory.php';

    $inputFileType = PHPExcel_IOFactory::identify($target_file);

    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($target_file);

    print_r($objPHPExcel);

//    $i=2;
//    $val=array();
//    $count=0;
//    for($i=2;$i<34;$i++)
//    {
//        $val[$count++]=$objPHPExcel->getActiveSheet()->getCell('C'.$i)->getValue();
//    }
//
//    print_r($val);
}