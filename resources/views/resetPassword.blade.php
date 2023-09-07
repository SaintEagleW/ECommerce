<html>

<head>
    <title>忘記密碼</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* 使用 CSS 調整整個註冊頁面的位置 */
        body {
            height: 100%;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 50px auto;
            /* 調整上下間距，將畫面置中 */
            max-width: 400px;
            /* 設定最大寬度 */
            padding: 20px;
            /* 設定內距 */
            border: 1px solid #ccc;
            /* 加入邊框 */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            /* 加入陰影效果 */
        }

        /* 調整輸入框之間的間距 */
        .input-group {
            display: block;
            margin-bottom: 15px;
        }

        #submit {
            display: block;
            /* 將按鈕設為區塊元素，以便調整寬度 */
            margin: 0 auto;
            /* 自動偵測左右邊距，從而置中 */
        }

        .center {
            text-align: center;
            /* 水平居中 */
            display: block;
            /* 将链接元素转换为块级元素，以便应用text-align */
            margin-top: 20px;
            /* 可选：设置上边距以垂直居中 */
            font-size: 12px;
        }

        .banner {
            width: 111.2%;
            margin-top: -20px;
            /* 負的 margin 來調整位置 */
            margin-left: -20px;
            /* 負的 margin 來調整位置 */

        }
    </style>
</head>

<body>
    <div class="container">
        <div class="mb-5">
            <img src="https://e1.pxfuel.com/desktop-wallpaper/478/256/desktop-wallpaper-funny-facebook-cover-funny-facebook.jpg" class="banner">
        </div>

        <div class="input-group">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="name@example.com" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">New Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
                <div class="col-auto">
                    <span id="passwordHelpInline" class="form-text">
                        Must be 3-10 characters long.
                    </span>
                </div>
            </div>

            <div class="mb-4">
                <label for="passwordConfirm" class="form-label">Password Confirm</label>
                <input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control" required>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" id="submit" class="form-control btn btn-secondary"> Confirm </button>
            </div>

        </div>

        <div class="center">
            <a href="http://localhost:8000/login">Log in</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            const buttonClick = () => {
                const email = $('#email').val();
                const password = $('#password').val();
                const passwordConfirm = $('#passwordConfirm').val();
                // console.log(email, password, passwordConfirm);

                axios.patch(
                    'api/user/password', {
                        email: email,
                        password: password,
                        passwordConfirm: passwordConfirm
                    }
                ).then(function(response) {
                    console.log(response.data.message);
                    alert(response.data.message);
                    if (response.data.code === 1) {
                        window.location.href = 'http://localhost:8000/login';
                    }
                }).catch(function(error) {
                    console.error(error);
                    alert(error.response.data.message);
                });
            }

            $('#submit').on('click', buttonClick);
        });
    </script>
</body>

</html>