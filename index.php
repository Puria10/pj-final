<?php
include("head.php");
?>
    <style>
        body {
            font-family: 'Vazirmatn', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .news-section {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 30px;
        }
        .news-card {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            flex: 1 1 45%;
            padding: 20px;
            transition: transform 0.3s ease;
        }
        .news-card:hover {
            transform: translateY(-10px);
        }
        .news-card h4 {
            font-size: 1.5em;
            color: #007bff;
            margin-bottom: 10px;
        }
        .news-card p {
            font-size: 1.1em;
            line-height: 1.6;
            color: #333;
        }

        .news-image {
            flex: 1 1 45%;
            padding: 20px;
        }
        .news-image img {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 1.1em;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            display: inline-block;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }

        .logout-message {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
    padding: 15px;
    border-radius: 6px;
    max-width: 600px;
    margin: 20px auto;
    text-align: center;
    font-size: 1.1em;
    transition: opacity 0.5s ease;
}


        .welcome-message {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 15px;
            border-radius: 6px;
            max-width: 600px;
            margin: 20px auto;
            text-align: center;
            font-size: 1.1em;
            transition: opacity 0.5s ease;
        }


    </style>
<body>
<?php
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    $username = null;
}
?>

<?php if ($username): ?>
    <div class="welcome-message" id="welcomeMsg">خوش آمدید, <?php echo htmlspecialchars($username); ?>!</div>
    <script>
        setTimeout(() => {
            const msg = document.getElementById('welcomeMsg');
            if (msg) {
                msg.style.opacity = '0'; 
                setTimeout(() => msg.remove(), 500); 
            }
        }, 3000); 
    </script>
<?php endif; ?>

<?php if (isset($_GET['logout']) && $_GET['logout'] == 1): ?>
    <div class="logout-message" id="logoutMsg">خروج با موفقیت انجام شد.</div>
    <script>
        setTimeout(() => {
            const msg = document.getElementById('logoutMsg');
            if (msg) {
                msg.style.opacity = '0'; 
                setTimeout(() => msg.remove(), 500); 
            }
        }, 3000);
    </script>
<?php endif; ?>


    <main class="container my-5">
        <div class="news-section">
            <div class="news-card">
                <h4 class="text-primary">خبر داغ</h4>
                <p>
                    تیم‌های رئال‌مادرید و بارسلونا در دیدار ال‌کلاسیکوی رفت به مصاف هم رفتند که آبی‌اناری‌ها با نتیجه غیرمنتظره ۴-۰ این بازی را بردند...
                </p>
                <a href="#" class="btn-primary">بیشتر بخوانید</a>
            </div>

            <div class="news-image">
                <img src="football.jpg" class="img-fluid rounded" alt="Football News">
            </div>
        </div>
    </main>

<?php
$link=mysqli_connect("localhost","root","","footballnews");
$result=mysqli_query($link,"SELECT * FROM news");
mysqli_close($link);
$row=mysqli_fetch_array($result);

while($row){
?>
    <div class="row" style="direction: rtl; margin-bottom: 20px; text-align: right;">
        <div class="col-12 col-md-8" style="color: white;">
            <div class="d-flex mb-2" style="justify-content: flex-start; align-items: center;">
                <span class="h5" style="font-size: 24px; font-weight: bold; margin-left: 10px;"><?php echo($row["title"]) ?></span>
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
 include("foot.html"); ?>
