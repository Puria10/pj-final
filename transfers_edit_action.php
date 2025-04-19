<?php
include("head.php");

$link = mysqli_connect("localhost", "root", "", "footballnews");
if (!$link) {
    die("خطا در اتصال به دیتابیس: " . mysqli_connect_error());
}

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$title = mysqli_real_escape_string($link, $_POST["title"]);
$text = mysqli_real_escape_string($link, $_POST["text"]);

$imageurl = "images/default.jpg";
if (!empty($_FILES["image"]["name"])) {
    $image = $_FILES["image"]["name"];
    $imageurl = "images/" . $image;
    move_uploaded_file($_FILES["image"]["tmp_name"], $imageurl);
} else if (!empty($_POST["old_image"])) {
    $imageurl = $_POST["old_image"];
}

if ($id > 0) {
    $query = "UPDATE `news_asli1` SET `title`='$title', `text`='$text', `imageurl`='$imageurl' WHERE `id`=$id";
} else {
    $query = "INSERT INTO `news_asli1`(`title`, `text`, `imageurl`) VALUES ('$title','$text','$imageurl')";
}

$result = mysqli_query($link, $query);

if ($result === true) {
    ?>
    <script>
        location.replace("transfers_edit.php");
    </script>
    <?php
} else {
    echo("ذخیره نشد");
}

mysqli_close($link);
include("foot.html");
?>
