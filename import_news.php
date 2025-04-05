<?php
$link = mysqli_connect("localhost", "root", "", "footballnews");

if (!$link) {
    die("اتصال به دیتابیس موفق نبود: " . mysqli_connect_error());
}


$news = [
    [
        "title" => "نقل و انتقالات",
        "text" => "گرانترین نقل و انتقالات تابستانی سال 2024 در تابستان 2024، دنیای فوتبال شاهد جابجایی‌های بزرگ و نقل و انتقالات گران‌قیمت بود که تغییرات زیادی در ترکیب تیم‌ها به وجود آورد. در این صفحه به بررسی مهم‌ترین و پرهزینه‌ترین نقل و انتقالات پرداخته‌ایم.",
        "imageurl" => "transf.webp"
    ],
    [
    ],

];


foreach ($news as $item) {
    $title = $item['title'];
    $text = $item['text'];
    $imageurl = $item['imageurl'];


    $query = "INSERT INTO news_asli1 (title, text, imageurl) VALUES ('$title', '$text', '$imageurl')";

    if (mysqli_query($link, $query)) {
        echo "خبر '$title' با موفقیت اضافه شد!<br>";
    } else {
        echo "خطا در افزودن خبر '$title': " . mysqli_error($link) . "<br>";
    }
}

mysqli_close($link);
?>
