<?php

	echo "<pre>";
	print_r($model);
	echo "</pre>";

	// die();
?>

<p>Display data post<p>

<ul>
	<li><label>Nama:</label><?= $model->name ?></li>
	<li><label>E-mail:</label><?= $model->email ?></li>
	<li><label>Alamat:</label><?= $model->address ?></li>
</ul>