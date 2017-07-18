<!DOCTYPE html>
<html lang="en" class="body-full-height">

<head>
    <!-- META SECTION -->
    <title>Neoconnect</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="{{URL::to('img/favicon.ico')}}" type="image/x-icon" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="{{URL::to('css/theme-default.css')}}" />
    <!-- EOF CSS INCLUDE -->
</head>

<body>

    <div class="row">
        <div class="col-md-12">

            <div class="error-container">
                <div class="error-code">503</div>
                <div class="error-text">INTERNAL SERVER ERROR</div>
                <div class="error-subtext">{{$exception->message}}</div>
                <div class="error-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-6">
                            <button class="btn btn-info btn-block btn-lg" onClick="document.location.href = '/';">Back to Home</button>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>

</body>

</html>