<!DOCTYPE html>
<html lang="fa">

<head>
    <?php include("head.php"); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="گرانترین نقل و انتقالات تابستانی سال 2024">
    <meta name="keywords" content="نقل و انتقالات، فوتبال، تابستان 2024">
    <meta name="author" content="Your Name">
    <title>نقل و انتقالات</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        #main-left {
            margin-top: 30px;
        }

        .content {
            margin-top: 40px;
            text-align: center;
            font-size: 18px;
            color: #fff;
        }

        .content h2 {
            color: #fff; 
        }

        .content p {
            line-height: 1.6;
        }

        #img-left {
            width: 100%;
            max-width: 800px;
            height: auto;
            border-radius: 25px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 768px) {
            #img-left {
                width: 100%;
            }
        }
    </style>
</head>

<body>
<?php
$link = mysqli_connect("localhost", "root", "", "footballnews");

if (!$link) {
    die("اتصال به دیتابیس موفق نبود: " . mysqli_connect_error());
}

$query = "SELECT * FROM news_asli1 ORDER BY id DESC"; 
$result = mysqli_query($link, $query);

while ($row = mysqli_fetch_array($result)) {
    echo '<div class="news-item">';
    echo '<h2>' . $row['title'] . '</h2>';
    echo '<p>' . $row['text'] . '</p>';
    echo '<img src="' . $row['imageurl'] . '" alt="خبر">';
    echo '</div>';
}

mysqli_close($link);
?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
<?php
include("foot.html");
?>

</html>
