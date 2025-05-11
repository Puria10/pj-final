<?php
include("head.php");
$id=$_GET["id"];

$link=mysqli_connect("localhost","root","","footballnews");
$result=mysqli_query($link,"DELETE FROM `news_asli1` WHERE `id`=$id");
mysqli_close($link);

if($result===true)
    ?>
<script>
    location.replace("transfers_edit.php");
</script>
<?php
?>

<?php
include("foot.html");
?>