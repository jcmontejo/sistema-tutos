<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{ url('/home') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>C</b>BH</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>TUTORÍAS Cobach </span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">{{ trans('adminlte_lang::message.togglenav') }}</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <!-- Menu toggle button -->
                    @role('alumno')
                    <?php
                    $user = Auth::user();
                    $student = $user->student;
                    $comments = $student->comments;
                    ?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">{{$comments->count()}}</span>
                    </a>
                    <ul class="dropdown-menu">
                    <li class="header">Usted tiene {{$comments->count()}} nuevos mensajes</li>
                        <li>
                            <!-- inner menu: contains the messages -->
                            
                            <ul class="menu">
                                @foreach($comments as $comment)
                                <li><!-- start message -->
                                    <a href="{{ url('comments')}}/{{$comment->id}}">
                                        <div class="pull-left">
                                            <!-- User Image -->
                                            <img src="{{asset('/uploads/avatars/default.jpg')}}" class="img-circle" alt="User Image"/>
                                        </div>
                                        <!-- Message title and timestamp -->
                                        <h4>
                                            {{$comment->name}}
                                            <small><i class="fa fa-clock-o"></i> {{$comment->created_at}}</small>
                                        </h4>
                                        <!-- The message -->
                                        <p>{!!$comment->body!!}</p>
                                    </a>
                                </li><!-- end message -->
                                @endforeach
                            </ul><!-- /.menu -->
                        </li>
                        <li class="footer"><a href="#">c</a></li>
                    </ul>
                </li><!-- /.messages-menu -->
                @endrole
                <!-- Notifications Menu -->
                
                @if (Auth::guest())
                <li><a href="{{ url('/register') }}">{{ trans('adminlte_lang::message.register') }}</a></li>
                <li><a href="{{ url('/login') }}">{{ trans('adminlte_lang::message.login') }}</a></li>
                @else
                
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="{{asset('/uploads/avatars/')}}/{{ Auth::user()->avatar }}" class="user-image" alt="User Image"/>
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="{{asset('/uploads/avatars/')}}/{{ Auth::user()->avatar }}" class="img-circle" alt="User Image" />
                            <p>
                                {{ Auth::user()->name }}
                                <small>Inicio de sesión <script>
                                var today = new Date();
                                var dd = today.getDate();
                                var mm = today.getMonth()+1; //January is 0!
                                var yyyy = today.getFullYear();

                                if(dd<10) {
                                    dd='0'+dd
                                } 

                                if(mm<10) {
                                    mm='0'+mm
                                } 

                                today = dd+'/'+mm+'/'+yyyy;
                                document.write(today);
                            </script></small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="col-xs-12 btn-lg btn-block text-center">
                            <a href="{{ url('updatepassword')}}"><button class="btn uppercase btn-default">Actualizar contraseña</button></a>
                            </div>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ url('/profile')}}" class="btn btn-default btn-flat">{{ trans('adminlte_lang::message.profile') }}</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">{{ trans('adminlte_lang::message.signout') }}</a>
                            </div>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </nav>
</header>
