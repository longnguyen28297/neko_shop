<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login | Neko Shop</title>
    <!-- Bootstrap CSS -->
    <base href="{{asset('')}}">
    <link rel="stylesheet" href="public/admin/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="public/admin/assets/libs/css/style.css">
    <link rel="stylesheet" href="public/admin/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="public/admin/assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="public/admin/assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="public/admin/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="public/admin/assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="public/admin/assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <link rel="stylesheet" href="public/admin/assets/libs/css/myStyle.css">
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }
    </style>
</head>

<body>
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="./administrator"><img class="logo-img" src="public/img/core-img/logo.png" alt="logo" width="100"></a></div>
            <div class="card-body">
                <form method="post" action="" role="form" method="POST">
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="email" name="email" type="text" placeholder="Tên đăng nhập" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password" name="password" type="password" placeholder="Mật khẩu">
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="remember"><span class="custom-control-label">Ghi nhớ đăng nhập</span>
                        </label>
                    </div>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Đăng nhập</button>
                </form>
            </div>
            @isset($error)
            <p class="error_noti">{{$error}}</p>
            @endisset
            
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="./administrator/forgotPw" class="footer-link">Quên mật khẩu</a>
                </div>
            </div>
        </div>
    </div>

    <script src="public/admin/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="public/admin/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="public/admin/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="public/admin/assets/libs/js/main-js.js"></script>
    <script src="public/admin/assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <script src="public/admin/assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <script src="public/admin/assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="public/admin/assets/vendor/charts/morris-bundle/morris.js"></script>
    <script src="public/admin/assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="public/admin/assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="public/admin/assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="public/admin/assets/libs/js/dashboard-ecommerce.js"></script>
</body>

</html>