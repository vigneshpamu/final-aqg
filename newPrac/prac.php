<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/init.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://cdn.ckeditor.com/4.19.0/full/ckeditor.js"></script>
    <!--    <script src="/ckeditor.js"></script>-->
    <!--    <script src="--><?php //echo $_SERVER['DOCUMENT_ROOT'] . 'ckeditor.js'; ?><!--"></script>-->

    <style>

    </style>
</head>
<body>
<div class="container">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <textarea id="editor" name="editor1"></textarea>
        <br>
        <input type="submit" name="submit" value="Submit">
    </form>
</div>


<?php
// PHP logic to handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
	// Get the textarea value
	$textValue = isset($_POST['editor1']) ? $_POST['editor1'] : '';

	// Display the value
	echo "Textarea content: " . htmlspecialchars($textValue);
}
?>

<script>
    CKEDITOR.replace("editor1");
</script>

</body>
</html>
