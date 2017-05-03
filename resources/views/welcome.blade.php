@extends('layouts.auth')

@section('htmlheader_title')
Log in
@endsection

@section('content')
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('/') }}"><b>Sistema de</b>TUTORÍAS</a>
        </div><!-- /.login-logo -->

        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="login-box-body">
            <p class="login-box-msg"> {{ trans('adminlte_lang::message.siginsession') }} </p>
            <form action="{{ url('/login') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <img id="profile-img" class="profile-img-card" src="{{ asset('/img/login.png') }}" />
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="{{ trans('adminlte_lang::message.email') }}" name="email"/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.password') }}" name="password"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-lg btn-block btn-default btn-flat">{{ trans('adminlte_lang::message.buttonsign') }}</button>
                    </div><!-- /.col -->
                </div>
            </form>

            <!--<a href="{{ url('/password/reset') }}">{{ trans('adminlte_lang::message.forgotpassword') }}</a><br>-->

        </div><!-- /.login-box-body -->

    </div><!-- /.login-box -->

    @include('layouts.partials.scripts_auth')
    <!-- The content of your page would go here. -->

    <!---<footer class="footer-distributed">

        <div class="footer-left">
            <p class="footer-company-name">Colegio de Bachilleres de Chiapas &copy; 2017</p>
        </div>

        <div class="footer-center">

            <div>
                <i class="fa fa-map-marker"></i>
                <p><span>Articulo 123 s/n, Electricista, </span> Tuxtla Gutiérrez, Chiapas</p>
            </div>

            <div>
                <i class="fa fa-phone"></i>
                <p>01 961 614 3059 ext. 6143009</p>
            </div>
        </div>

        <div class="footer-right">
            <div class="footer-icons">

                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>

        </div>

    </footer>-->
    <!-- Main Footer -->
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

@endsection
