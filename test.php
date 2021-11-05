<?php 
require('./vendor/autoload.php');
require_once "conn.php";

$random_no1 = mt_rand ( 000 , 999 );
$random_no2 = mt_rand ( 0000 , 9999 );
$random_no3 = mt_rand ( 0000 , 9999 );
$random_no4 = mt_rand ( 000 , 999 );

$text = $random_no1 . '-' . $random_no2 . '-' . $random_no3 . '-' . $random_no4;


$faker = Faker\Factory::create();

//Faker no te vayas de SKT1