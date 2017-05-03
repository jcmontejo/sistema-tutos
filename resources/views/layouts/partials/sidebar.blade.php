<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('/uploads/avatars/')}}/{{ Auth::user()->avatar }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
            </div>
        </div>
        @endif

        <!-- search form (Optional) -->
        <!--<form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>-->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        @role('coordinador')
        <ul class="sidebar-menu">
            <li class="header">Menú de opciones</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="treeview">
                <a href="#"><i class='fa fa-users'></i> <span>Altas</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/students/create') }}">Alumnos</a></li>
                    <li><a href="{{ url('/tutors/create') }}">Tutores</a></li>
                    <li><a href="{{ url('/directors') }}">Coordinador</a></li>
                </ul>
            </li>
            <!-- Optionally, you can add icons to the links -->
            <li class="treeview">
                <a href="#"><i class='fa fa-archive'></i> <span>Seguimientos</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/tutors')}}">Seguimiento de Tutor</a></li>
                    <li><a href="{{ url('/students')}}">Seguimiento de Alumno</a></li>
                </ul>
            </li>
            <!-- Optionally, you can add icons to the links -->
            <li class="treeview">
                <a href="#"><i class='fa fa-file-pdf-o'></i> <span>Generar Documento</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/generals')}}">Realizar Programa General</a></li>
                    <li><a href="{{ url('/finalreports')}}">Realizar Informe Final de Tutorías</a></li>
                    <li><a href="{{ url('/tutorings')}}">Realizar Programa de Tutorías</a></li>
                    <li><a href="{{ url('/conformations')}}">Acta de Conformación</a></li>
                    <!--<li><a href="#">Nombramientos</a></li>-->
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-gears'></i> <span>Herramientas</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/activities')}}">Agregar Actividades</a></li>
                    <li><a href="{{ url('/news')}}">Agregar Noticias</a></li>
                    <!--<li><a href="#">Agregar Herramienta del Tutor</a></li>-->
                    <li><a href="{{ url('/periods')}}">Agregar Ciclo</a></li>
                </ul>
            </li>
            <!--<li><a href="#"><i class='fa fa-print'></i> <span>Resultado General</span></a></li>
            <li><a href="#"><i class='fa fa-bullhorn'></i> <span>Noticias</span></a></li>-->
        </ul><!-- /.sidebar-menu -->
        @endrole
        @role('tutor')
        <?php 
        $user = App\User::find(Auth::user()->id);
        $tutor = $user->tutor;
        ?>
        <ul class="sidebar-menu">
            <li class="header">Menú de opciones</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="treeview">
                <a href="#"><i class='fa fa-gears'></i> <span>Herramientas</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{!! route('students.exercise', [$tutor->id]) !!}">Agregar Actividades</a></li>
                    <li><a href="{{ url('/lessons')}}">Agregar sesión</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-gears'></i> <span>Alumnos</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{!! route('students.tutor', [$tutor->id]) !!}">Ver Alumnos</a></li>
                </ul>
            </li>
            <!-- Optionally, you can add icons to the links -->
            <li class="treeview">
                <a href="#"><i class='fa fa-file-pdf-o'></i> <span>Generar Documentos</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/tutorialreports')}}">Informe de Programa de Tutorías</a></li>
                    <li><a href="{{ url('/individuals')}}">Programa Individual de Tutorías</a></li>
                    <li><a href="">Calendario de Sesiones</a></li>
                </ul>
            </li>
            <!--<li><a href="#"><i class='fa fa-print'></i> <span>Resultado General</span></a></li>
            <li><a href="#"><i class='fa fa-bullhorn'></i> <span>Noticias</span></a></li>-->
        </ul><!-- /.sidebar-menu -->
        @endrole

        @role('alumno')
        <?php 
        $user = App\User::find(Auth::user()->id);
        $student = $user->student;
        ?>
        <ul class="sidebar-menu">
            <li class="header">Menú de opciones</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="treeview">
                <a href="#"><i class='fa fa-bullhorn'></i> <span>Noticias</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/view-news')}}">Ver Noticias</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-check-circle'></i> <span>Avances</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/advances')}}/{{Auth::user()->id}}">Ver mis Avances</a></li>
                </ul>
            </li>
            <!-- Optionally, you can add icons to the links -->
            <li class="treeview">
                <a href="#"><i class='fa fa-cloud'></i> <span>Tareas</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{!! route('view.tasks', [$student->id]) !!}">Tareas Recibidas</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-cubes'></i> <span>Actividades</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/view-activities')}}">Ver todas las actividades</a></li>
                    <li><a href="{{ url('/view-activities-suggested')}}">Ver actividades sugeridas</a></li>
                </ul>
            </li>
            <!--<li><a href="#"><i class='fa fa-print'></i> <span>Resultado General</span></a></li>
            <li><a href="#"><i class='fa fa-bullhorn'></i> <span>Noticias</span></a></li>-->
        </ul><!-- /.sidebar-menu -->
        @endrole
    </section>
    <!-- /.sidebar -->
</aside>
