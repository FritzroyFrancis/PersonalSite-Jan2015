<?php

	$title = $_POST['songID'];
	echo wp_get_attachment_url($title);
?>