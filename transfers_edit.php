
    <?php include("head.php"); ?>
    <title>نقل و انتقالات</title>


    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
            color: #fff;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            position: relative;
            padding: 30px;
            box-sizing: border-box;
        }

        .container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.4);
            z-index: -1;
        }

        .news-box {
            background: rgba(255, 255, 255, 0.05);
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 40px;
            word-wrap: break-word;
            overflow-wrap: break-word;
            word-break: break-word;
        }

        .news-box img {
            max-width: 100%;
            border-radius: 10px;
            margin-top: 15px;
        }

        .news-title {
            font-size: 24px;
            font-weight: bold;
            color: white;
            margin-bottom: 15px;
        }

        .news-text {
            font-size: 18px;
            color: white;
            text-align: justify;
            margin-bottom: 20px;
            line-height: 1.8;
        }

        .action-btns a {
            margin-left: 10px;
        }

        .text-end {
            text-align: right;
        }

        .news-box .action-btns {
            display: flex;
            justify-content: flex-start;
            margin-top: 15px;
        }

        @media (max-width: 768px) {
            .news-title {
                font-size: 20px;
            }

            .news-text {
                font-size: 16px;
            }

            .action-btns {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>

<body>
    <div class="container">
        <h1 class="text-center mb-4">ویرایش اخبار اصلی</h1>

        <div class="text-end mb-4">
            <a href="transfers_add.php" class="btn btn-primary">افزودن خبر جدید</a>
        </div>

        <?php
        $link = mysqli_connect("localhost", "root", "", "footballnews");
        if (!$link) {
            die("خطا در اتصال به دیتابیس: " . mysqli_connect_error());
        }

        $result = mysqli_query($link, "SELECT * FROM news_asli1 ORDER BY id DESC");

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="news-box">';
            echo '<div class="d-flex justify-content-between align-items-center mb-2">';
            echo '<div class="news-title">' . htmlspecialchars($row["title"]) . '</div>';
            echo '<div class="action-btns">';
            echo '<a class="btn btn-success" href="transfers_edit1.php?id=' . $row["id"] . '">ویرایش</a>';
            echo '<a class="btn btn-danger" href="transfers_delete.php?id=' . $row["id"] . '" onclick="return confirm(\'آیا مطمئن هستید؟\')">حذف</a>';
            echo '</div>';
            echo '</div>';
            echo '<div class="news-text">' . nl2br(htmlspecialchars($row["text"])) . '</div>'; // تبدیل خط‌های جدید به <br>
            if (!empty($row["imageurl"])) {
                echo '<img src="' . htmlspecialchars($row["imageurl"]) . '" alt="news image" class="img-fluid">'; // تصویر ریسپانسیو
            }
            echo '</div>';
        }

        mysqli_close($link);
        ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <?php include("foot.html"); ?>
</body>

</html>
