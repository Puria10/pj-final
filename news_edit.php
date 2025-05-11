<?php
include("head.php");
$id=$_GET["id"];
$link=mysqli_connect("localhost","root","","footballnews");
$result=mysqli_query($link,"SELECT * FROM `news` WHERE id=$id");
mysqli_close($link);
$row=mysqli_fetch_array($result);
$title="";
$text="";
$imageurl="";
if($row){
    $title=$row["title"];
    $text=$row["text"];
    $imageurl=$row["imageurl"];
}
?>

<div class="row">
    <p class="col">خبر را وارد کنید</p>
</div>
<form action="news_edit_action.php" method="post" enctype="multipart/form-data" class="row m-2">
    <?php if (!empty($imageurl)): ?>
        <div class="col-12 col-md card m-1">
            <p>تصویر قبلی:</p>
            <img src="<?php echo($imageurl); ?>" alt="News Image" class="img-fluid">
        </div>
    <?php endif; ?>

    <input type="file" class="col-12 col-md card m-1" name="image">

    <input type="text" class="col-12 col-md card m-1" name="title" placeholder="عنوان" value="<?php echo($title); ?>">

    <input type="text" class="col-12 col-md card m-1" name="id" placeholder="id" hidden value="<?php echo($id); ?>">

    <textarea class="col-12 col-md card m-1" name="text" placeholder="متن خبر"><?php echo($text); ?></textarea>

    <input type="submit" class="col-12 col-md card m-1" value="ذخیره">
</form>


<?php
include("foot.html");
?>