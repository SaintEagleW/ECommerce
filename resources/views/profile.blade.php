<html>

<head>
    <title>個人資訊</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            height: 100%;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            max-width: 400px;
            height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 15px 25px 30px 25px;
            border: 1px solid #ccc;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* 使按钮充满整个宽度 */
        .btn-full-width {
            width: 100%;
        }

        /* 移除按钮之间的上边距 */
        .btn-group {
            margin-top: 0;
        }
    </style>
</head>

<body>

    <div class="container text-center">

        <div class="rounded-circle mx-auto my-4" style="width: 150px; height: 150px; background-color: #ccc;">
            <img id="avatar" alt="Avatar" alt="Avatar" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
        </div>

        <h3 id="nickname"> </h3>

        <div class="mt-4 btn-group">
            <a href="http://localhost:8000/profile" class="btn btn-primary mx-2 btn-full-width">Edit Profile</a>
        </div>
        <div class="mt-4 btn-group">
            <a href="http://localhost:8000/resetpassword" class="btn btn-primary mx-2 btn-full-width">Change Password</a>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        console.log(localStorage.getItem('email'));
        // console.log(@json($email));
        // axios.get('api/user/profile', {
        //         params: {
        //             email: @json($email)
        //         }
        //     })
        //     .then(function(response) {
        //         const avatarUrl = response.data.avatar;
        //         const nickname = response.data.nickname;
        //         document.getElementById('avatar').src = avatarUrl;
        //         document.getElementById('nickname').textContent = nickname;
        //     })
        //     .catch(function(error) {
        //         console.error(error);
        //     });
    </script>
</body>

</html>