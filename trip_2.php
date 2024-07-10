<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Казань</title>

	<link rel="shortcut icon" href="images/icon.png">
	<link rel='stylesheet' href="css/style_2.css">
</head>
<body>
	<header>	<!-- шапка с кнопками-->
		<div class="all_header">
			<div class="top_menu">
				<ul>
					<li><a class="header_text" href="index.php">Главная</a></li>
					<li><a class="header_text" href="index.php#headertitle2">Сооружения</a></li>
				</ul>
			</div>
		</div>
	</header>
	
	<?php 
		if(isset($_GET['ref'])){
			$ref = htmlspecialchars($_GET['ref']); //получаем переменную из реферальной ссылки
			
			$fp = fopen("database/texts.txt","r");
			if(!$fp){
				echo "Ошибка открытия файла";}
			else{
				while(!feof($fp)){
					$string = fgets($fp,1000);
					$array = explode("~", $string);
					if ($array[0] == $ref){
						$text = "<h1 class='headertitle'>$array[1]</h1>";
						if(strlen($array[2] > 0)){
							$text = $text . "<div style='text-align: center;'><div class='text'>$array[2]</div></div>";
						}
						echo $text;
					}
				}
			}
		}
		else{echo "<h1 style='font-family: Arial; font-size: 30px; padding-top: 100px; text-align: center;'>Ошибка 404, страница не найдена</h1>";}
	?>

	<img src="images/left_side.png" alt="left_side_photo" class="side_photo" style="width: 300px; top: 300px; left: 0;">
	<img src="images/right_side.png" alt="right_side_photo" class="side_photo" style="width: 270px; bottom: -500px; right: 0;">

    <section class="card-section">	<!-- сетка с карточками фотографий -->
		<div class="container">
			<ul class="cards">
			
            <?php
				if(isset($_GET['ref'])){
					$ref = htmlspecialchars($_GET['ref']);

					$fp = fopen("database/database.txt","r");
					if(!$fp){
						echo "Ошибка открытия файла";}
					else{
						$counter = 0;
						$folder = $ref;
						while(!feof($fp)){
							$string = fgets($fp,50);
							$array = explode(" ", $string);
							if ($array[0] == $folder){
								if ($array[2][0] === 'H'){
									echo "<li class = \"card\">\n<img src=\"compressed/$folder/$array[1].JPG\" alt=\"compressed/$array[1]\" class=\"image\">\n</li>\n";
								}
								else if($array[2][0] === 'R'){
									echo "<li class = \"card\">\n<img style=\"transform: rotate(-90deg);\" src=\"compressed/$folder/$array[1].JPG\" alt=\"compressed/$array[1]\" class=\"image\">\n</li>\n";
								}
								else{
									echo "<li class = \"card\">\n<img style=\"transform: rotate(90deg);\" src=\"compressed/$folder/$array[1].JPG\" alt=\"compressed/$array[1]\" class=\"image\">\n</li>\n";
								}
							}
						}
					}
				}
            ?>
            
            </ul>
		</div>
	</section>

	<div id="slider" class="slider">	<!-- слайдер-->
		<button class="closing_layer" onclick="close_slider()"></button>
		<img onclick="close_slider()" src="slider/close.png" alt="slider/close.png" style="width: 30px" class="close_button">

	    <img id="button_left" onclick="prev_slide()" src="slider/left.png" alt="" style="left: 95px; width: 30px" class="button">
	    <img id="button_right" onclick="next_slide()" src="slider/right.png" alt="" style="right: 95px; width: 30px" class="button">

	    <div class="slider_content">
	        <img src="" alt="" id="slider_image" style="max-height: 600px; z-index: 10;  padding: 10px;
    background-color: rgba(255,255,255,0.7);" class="slider_image">
	    </div>
	</div>

	<script src="slider/script.js"></script>
	
	 <!--Объект на Яндекс картах-->
	<center>
		
		<?php
			if(isset($_GET['ref'])){
				$ref = htmlspecialchars($_GET['ref']);

				$fp = fopen("database/links.txt","r");
				if(!$fp){
					echo "Ошибка открытия файла";}
				else{
					while(!feof($fp)){
						$string = fgets($fp, 300);
						$array = explode("~", $string);
						if ($array[0] == $ref){
							echo "<h1 class='headertitle2'>Объект на карте</h1>";
							echo "<div class = 'yandex_map'>";
							echo "<script type='text/javascript' charset='utf-8' async src=" . $array[1] . "></script>";
							echo "</div>";
						}
					}
				}
			}
		?>
		
	</center>
</body>
</html>