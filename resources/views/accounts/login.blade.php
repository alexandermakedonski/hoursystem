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
<body class="page-login">
    <main class="page-content">
        <div class="page-inner">
            <div id="main-wrapper">
                <div class="row">
                    <div class="col-md-3 center">
                        <div class="login-box">
                            <div  class="logo-name text-lg text-center">
                                <img src={{ URL::to('assets/images/logos/logoStudio.png') }} alt="icon" class="icon">
                            </div>

                            <p class="text-center m-t-md">Моля влез с акаунтът си.</p>

                            {!! Form::open(['url' => ('/account/login')]) !!}
                                <div class="form-group">
                                    {!! Form::email('email',null,['class' => 'form-control','placeholder' => 'Имейл','required']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::password('password',['class' => 'form-control','placeholder' => 'Парола','required']) !!}
                                </div>
                                <div>
                                    {!! Form::checkbox(null,null,null,['checked']) !!}
                                    <label> Запомни ме</label>
                                </div>
                                <button type="submit" class="btn btn-success btn-block">Login</button>
                                <a href="forgot.html" class="display-block text-center m-t-md text-sm">Забравена Парола?</a>
                            {!! Form::close() !!}
                        </div>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Уупс!</strong> Има проблем.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                </div>
                <!-- Row -->
                <!-- Page Inner -->

            </div>
            <!-- Main Wrapper -->

        </div>

    </main>
<!-- Page Content -->


<!-- Javascripts -->
@include('partials.js')


</body>
</html>