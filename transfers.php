
    <?php include("head.php"); ?>


    <style>
        body {
            background-color: #f7f7f7;
            font-family: 'Arial', sans-serif;
            color: #fff;
            margin: 0;
            padding: 0;
        }

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
            color: #ddd;
        }

        #img-left {
            width: 100%;
            max-width: 800px;
            height: auto;
            border-radius: 25px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-bottom: 40px; 
        }

        @media (max-width: 768px) {
            #img-left {
                width: 100%;
            }
        }
    </style>


<body>

    <main class="container mt-4">

        <?php
        $link = mysqli_connect("localhost", "root", "", "footballnews");

        if (!$link) {
            die("اتصال به دیتابیس موفق نبود: " . mysqli_connect_error());
        }

        $query = "SELECT * FROM news_asli1 ORDER BY id DESC LIMIT 1"; 
        $result = mysqli_query($link, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<section class="content">';
            echo '<h2>' . htmlspecialchars($row["title"]) . '</h2>';
            echo '<p>' . nl2br(htmlspecialchars($row["text"])) . '</p>';
            echo '</section>';

            if (!empty($row["imageurl"])) {
                echo '<section id="main-left" class="text-center">';
                echo '<img id="img-left" src="' . htmlspecialchars($row["imageurl"]) . '" alt="تصویر نقل و انتقالات فوتبال تابستان 2024" class="img-fluid rounded-3">';
                echo '</section>';
            }
        }

        mysqli_close($link);
        ?>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
<?php include("foot.html"); ?>
</html>
