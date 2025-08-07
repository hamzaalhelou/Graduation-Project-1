<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Page Not Found | Educenter</title>
    <style>
        /* إعدادات عامة */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f9c74f; /* اللون الأصفر */
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        /* الحاوية الرئيسية */
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* الشعار */
        .logo {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .logo .icon {
            width: 20px;
            height: 20px;
            background-color: #f8961e;
            margin-right: 8px;
            clip-path: polygon(0 0, 100% 0, 50% 100%);
        }

        .logo-text {
            font-size: 20px;
            font-weight: bold;
        }

        .logo-text span {
            color: #f8961e;
        }

        /* عنوان 404 */
        h1 {
            font-size: 100px;
            font-weight: bold;
            color: #7a4900;
        }

        /* النص */
        .error-text {
            font-size: 24px;
            margin: 10px 0;
            color: #333;
        }

        /* الأيقونة */
        .icon-illustration {
            font-size: 80px;
            margin: 20px 0;
        }

        /* الزر */
        .btn {
            display: inline-block;
            background-color: #f8961e;
            color: #fff;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background 0.3s;
        }

        .btn:hover {
            background-color: #d97904;
        }

        /* جعل الصفحة متجاوبة */
        @media (max-width: 600px) {
            h1 {
                font-size: 70px;
            }
            .icon-illustration {
                font-size: 60px;
            }
            .error-text {
                font-size: 18px;
            }
            .btn {
                padding: 10px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Logo -->
        <div class="logo">
            <div class="icon"></div>
            <span class="logo-text">edu<span>center</span></span>
        </div>

        <!-- 404 Content -->
        <h1>404</h1>
        <p class="error-text">Page Not Found</p>
        <div class="icon-illustration">📕</div>
        <a href="{{ route('site.home') }}" class="btn">Go to Homepage</a>
    </div>
</body>
</html>
