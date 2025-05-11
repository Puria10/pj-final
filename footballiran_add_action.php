<?php
include("head.php");

$link = mysqli_connect("localhost", "root", "", "footballnews");
if (!$link) {
    die("خطا در اتصال به دیتابیس: " . mysqli_connect_error());
}

$title = mysqli_real_escape_string($link, $_POST["title"]);
$text = mysqli_real_escape_string($link, $_POST["text"]);

$image = "";
$imageurl = "";

if (!empty($_FILES["image"]["name"])) {
    $image = $_FILES["image"]["name"];
    $imageurl = "images/" . $image;
    move_uploaded_file($_FILES["image"]["tmp_name"], $imageurl);
} else {
    $imageurl = "images/default.jpg"; 
}

$result = mysqli_query($link, "INSERT INTO `news_asli`(`title`, `text`, `imageurl`) 
VALUES ('$title','$text','$imageurl')");

if($result===true){
    ?>
<script>
    location.replace("footballiran_edit.php");
</script>
<?php
}else{
    echo("ذخیره  نشد");
}

mysqli_close($link);
include("foot.html");
?>
