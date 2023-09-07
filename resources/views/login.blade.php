<html>

<head>
    <title>登入</title>
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

        .input-group {
            display: block;
            margin-bottom: 15px;
        }

        #submit {
            display: block;
            margin: 0 auto;
        }

        .center {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            margin-bottom: 5px;
            font-size: 12px;
        }

        .banner {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="mb-5">
            <img src="https://i.pinimg.com/736x/00/41/09/004109ee84c353253ce3851e2f83bd92--pikachu-pokemon.jpg" class="banner">
        </div>
        <div class="input-group">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="name@example.com">
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" class="form-control">
            </div>
            <div class="mb-4">
                <button type="submit" id="submit" class="form-control btn btn-primary"> Log In </button>
            </div>
            <div class="center">
                <a href="http://localhost:8000/register">Sign up</a>
            </div>
            <div class="center">
                <a href="http://localhost:8000/resetpassword">Forgot Password</a>

            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            const buttonClick = (e) => {
                const email = $('#email').val();
                const password = $('#password').val();
                console.log(email, password);

                axios.post(
                    'api/user/login', {
                        email: email,
                        password: password
                    }
                ).then(function(response) {
                    console.log(response.data.message);
                    // console.log(email);
                    localStorage.setItem('email', email);
                    if (response.data.code === 1) {
                        window.location.href = `http://localhost:8000/profile`;
                    }
                    if (response.data.code === 2) {
                        alert(response.data.message);
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