<?php

$cat = $_GET['var'];
if($cat == "cpu"){
	$dao = new Cpu();
	$link = "cpu";
	$url = "modify_from.php?var=cpu&id=";
	$dir="files/cpu/";
  $product = "cpu";
}
else if($cat == "mainboard"){
	$dao = new MainBoard();
	$link = "mainboard";
	$url = "modify_from.php?var=mainboard&id=";
	$dir="files/mainboard/";
  $product = "mainboard";
}else if($cat == "memory"){
	$dao = new Memory();
	$link = "memory";
	$url = "modify_from.php?var=memory&id=";
	$dir="files/memory/";
  $product = "memory";
}
else if($cat == "odd"){
	$dao = new Odd();
	$link = "odd";
	$url = "modify_from.php?var=odd&id=";
	$dir="files/odd/";
  $product = "odd";
}
else if($cat == "power"){
	$dao = new Power();
	$link = "power";
	$url = "modify_from.php?var=power&id=";
	$dir="files/power/";
  $product = "power";
}
else if($cat == "graphicscard"){
	$dao = new GraphicsCard();
	$link = "graphicscard";
	$url = "modify_from.php?var=graphicscard&id=";
	$dir="files/graphicscard/";
  $product = "graphicscard";
}
else if($cat == "cooler"){
	$dao = new Cooler();
	$link = "cooler";
	$url = "modify_from.php?var=graphicscard&id=";
	$dir="files/cooler/";
  $product = "cooler";
}
else if($cat == "storage"){
	$dao = new Storage();
	$link = "storage";
	$url = "modify_from.php?var=storage&id=";
	$dir="files/storage/";
  $product = "storage";
}else if($cat == "case"){
	$dao = new Case_board();
	$link = "case";
	$url = "modify_from.php?var=case&id=";
	$dir="files/case/";
  $product = "case";
}
?>
