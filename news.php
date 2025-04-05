<?php
include("head.php");
?>

<div class="row" style="background-image: url('path_to_image.jpg'); background-size: cover; background-position: center; color: #fff; direction: rtl;">
    <p class="col">
        <a href="news_add.php">+</a>
        لیست اخبار
    </p>
</div>

<?php
$link=mysqli_connect("localhost","root","","footballnews");
$result=mysqli_query($link,"SELECT * FROM `news`");
mysqli_close($link);
$row=mysqli_fetch_array($result);

while($row){
?>
    <div class="row" style="direction: rtl; margin-bottom: 20px; text-align: right;">
        <div class="col-12 col-md-8" style="color: white;">
            <div class="d-flex mb-2" style="justify-content: flex-start; align-items: center;">
                <span class="h5" style="font-size: 24px; font-weight: bold; margin-left: 10px;"><?php echo($row["title"]) ?></span>
                <a class="btn btn-danger mr-2" href="news_delete.php?id=<?php echo($row["id"]); ?>">-</a>
                <a class="btn btn-success" href="news_edit.php?id=<?php echo($row["id"]); ?>">*</a>
            </div>
            <p class="h6" style="font-size: 18px;"><?php echo($row["text"]) ?></p>
        </div>
    </div>

    <div class="row" style="direction: rtl;">
        <div class="col-12 col-md-12" style="text-align: center;">
            <img class="img-fluid rounded m-2" src="<?php echo($row["imageurl"]) ?>" alt="" style="max-width: 100%; height: auto;">
        </div>
    </div>

<?php
$row=mysqli_fetch_array($result);
}

include("foot.html");
?>
