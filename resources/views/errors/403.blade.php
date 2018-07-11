<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noodp,index,follow" />
    <meta name='revisit-after' content='1 days' />
    <link href="https://fonts.googleapis.com/css?family=Source Sans Pro:300,400" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>403 Permission</title>
    <style type="text/css">
        .errors {
            background-color: #f7f7f7;
        }
        .errors div {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .a403 {
            font-size: 120px;
            font-weight: 700;
            color: #121212;
        }
        .content {
            font-size: 20px;
            font-weight: 300;
        }
        .back-to-home {
            margin-top: 30px;
            padding: 10px 40px;
        }
        .home {
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <div class="container-fluid errors">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <span class="a403">403!</span>
                    <span class="content">Rất tiếc, bạn không có quyền để xem trang này !</span>
                    <a href="{{ env('APP_URL') }}" class="btn btn-danger back-to-home">
                        <span class="home">Về trang chủ</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
