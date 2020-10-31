<?php
			$file = $_FILES['file']['name'];
			if(strcmp($product, "cpu") == 0){
				$dir= "./files/cpu/";
			}else if(strcmp($product, "mainboard") == 0){
				$dir= "./files/mainboard/";
			}else if(strcmp($product, "memory") == 0){
				$dir= "./files/memory/";
			}else if(strcmp($product, "cases") == 0){
				$dir= "./files/case/";
			}else if(strcmp($product, "cooler") == 0){
				$dir= "./files/cooler/";
			}else if(strcmp($product, "odd") == 0){
				$dir= "./files/odd/";
			}else if(strcmp($product, "power") == 0){
				$dir= "./files/power/";
			}else if(strcmp($product, "storage") == 0){
				$dir= "./files/storage/";
			}else if(strcmp($product, "graphicscard") == 0){
				$dir= "./files/graphicscard/";
			}else{
				echo "다시 해봐";
			}

			$upfile = $dir.$file;

			if(is_uploaded_file($_FILES['file']['tmp_name'])){

					if(!move_uploaded_file($_FILES['file']['tmp_name'], $upfile))
					{
							echo "upload error";
							exit;
					}
			}
?>
