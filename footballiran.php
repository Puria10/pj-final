
    <?php include("head.php"); ?>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
            color: #fff;
        }

        main {
            padding: 10px;
            text-align: center;
        }

        #main_left {
            margin-top: 30px;
            position: relative;
            display: inline-block;
            text-align: center;
        }

        #img1 {
            width: 220px; 
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease;
            margin-top: 20px;
        }

        #img1:hover {
            transform: scale(1.1);
        }

        p {
            font-size: 18px;
            line-height: 1.8;
            margin-bottom: 20px;
            text-align: right; 
            color: #fff;
            word-wrap: break-word; 
            overflow-wrap: break-word; 
            word-break: break-word;  
        }

        .container {
            max-width: 900px;
            margin: auto;
            position: relative;
            padding: 10px; 
            box-sizing: border-box;
        }

        .container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: -1;
        }

        @media (max-width: 768px) {
            #img1 {
                width: 180px;
            }

            p {
                font-size: 16px;
            }

            main {
                padding: 10px;
            }
        }
    </style>

<body>

    <main class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                $link = mysqli_connect("localhost", "root", "", "footballnews");

                if (!$link) {
                    die("اتصال به دیتابیس موفق نبود: " . mysqli_connect_error());
                }

                $query = "SELECT * FROM news_asli ORDER BY id DESC";
                $result = mysqli_query($link, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<p>' . nl2br(htmlspecialchars($row["text"])) . '</p>';
                    if (!empty($row["imageurl"])) {
                        echo '<div id="main_left"><img id="img1" src="' . htmlspecialchars($row["imageurl"]) . '" alt="news image"></div>';
                    }
                }

                mysqli_close($link);
                ?>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <?php include("foot.html"); ?>

</body>

</html>
