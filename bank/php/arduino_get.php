<?php
session_id('batbank');
session_start();

$tempBedrag = $_SESSION["bedrag"];
$briefjes = $_SESSION["bedrag"].":".$_SESSION["bonKeuze"].":";

while ($tempBedrag > 0){
    if ($tempBedrag - 50 > 0 /*database connectie to check of er nog genoeg briefjes zijn*/){
        //database verminder 50
        $briefjes = $briefjes."50,";
        $tempBedrag -= 50;
    } else if ($tempBedrag - 20 > 0){
        $briefjes = $briefjes."20,";
        $tempBedrag -= 20;
    } else if ($tempBedrag - 10 > 0){
        $briefjes = $briefjes."10,";
        $tempBedrag -= 10;
    } else if ($tempBedrag - 5 > 0){
        $briefjes = $briefjes."05,";
        $tempBedrag -= 5;
    }
}

$briefjes = $briefjes."..";

	//stuur naar arduino


?>
