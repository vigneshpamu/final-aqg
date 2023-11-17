<?php
if (isset($_POST['content'])) {
	$content = $_POST['content'];
	echo "Textarea content: " . $content;
} else {
	echo "No data received";
}
?>
