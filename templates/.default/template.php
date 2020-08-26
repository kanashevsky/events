<?php
	if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>

	<form method="post">
		<select name="city">
			<?foreach ($arResult["CITIES"] as $city) { ?>
				<option value='<?=$city["CODE"]?>'><?=$city["NAME"]?></option>
			<?}?>
		</select>
		<button type="submit"><?=getMessage('SEARCH')?></button>
	</form>

	<div><?=getMessage('PARTICIPANTS')?></div>
	<div>
		<?if(!empty($arResult["PARTICIPANTS"])){?>
			<?foreach ($arResult["PARTICIPANTS"] as $participant) {
				echo $participant . "<br>";
			}
		}else{
			echo getMessage('NO_PARTICIPANTS_FOUND');
		}?>	
	</div>
