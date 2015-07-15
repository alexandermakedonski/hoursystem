<!DOCTYPE html>
<html>
<head>

    <!-- Title -->
    <title>СТУДИО ШИК</title>

    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta charset="UTF-8">
    <meta name="description" content="Admin Dashboard Template"/>
    <meta name="keywords" content="admin,dashboard"/>
    <meta name="author" content="Steelcoders"/>

    @include('partials.css')

</head>
<body class="page-lock-screen">
<main class="page-content">
    <div class="page-inner">
        <div id="main-wrapper">
            <div class="row">
                <div class="col-md-3 center">
                    <div class="login-box">
                        <div class="user-box m-t-lg row">
                            <div class="col-md-12 m-b-md">
                                <img src={{ $data[0]['profile_picture'] }} class="img-circle m-t-xxs" alt="">
                            </div>
                            <div class="col-md-12">
                                <p class="lead no-m text-center">Добре дошъл, Име!</p>
                                <p class="text-sm text-center">Въведи парола за отключване!</p>
                                {!! Form::open(['url' => '/lock-screen','class'=>'form-inline text-center']) !!}
                                    <div class="input-group">
                                        {!! Form::password('password',['class'=>'form-control','placeholder'=>'Парола','required']) !!}
                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-success">Потвърди</button>
                                        </div><!-- /btn-group -->
                                    </div><!-- /input-group -->
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- Row -->

        </div><!-- Main Wrapper -->
        <div class="row">
            <div class="col-md-3 center">
                @include('partials.errors')
            </div>
        </div>

    </div><!-- Page Inner -->
</main><!-- Page Content -->


@include('partials.js')

</body>
</html>