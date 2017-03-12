
<!DOCTYPE html>
<html>
  <head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="{{URL::to('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- styles -->
    <link href="{{URL::to('css/forms.css')}}" rel="stylesheet">
    <link href="{{URL::to('css/styles.css')}}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-5">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="{{ route('admin') }}">{{ config('app.name', 'Laravel') }}</a></h1>
	              </div>
	           </div>
	           <div class="col-md-5">
	              <div class="row">
	                <div class="col-lg-12">

	                </div>
	              </div>
	           </div>
	           <div class="col-md-2">
	              <div class="navbar navbar-inverse" role="banner">
	                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	                    <ul class="nav navbar-nav">
	                      <li class="dropdown">
	                        <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();"
                                   data-toggle="dropdown">
                                   Logout
                                   <i class="glyphicon glyphicon-log-out"></i>
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
	                      </li>
	                    </ul>
	                  </nav>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

    <div class="page-content">
      <div class="row">
      <div class="col-md-2">
        <div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->

                    <li class="{{!Request::is('*configuration*') ?: 'current'}}"><a href="{{ URL::to('admin/configuration') }}"><i class="glyphicon glyphicon-record"></i> Configurações </a></li>
                    <li class="{{!Request::is('*users*') ?: 'current'}}"><a href="{{ URL::to('users') }}"><i class="glyphicon glyphicon-list"></i> Usuários </a></li>
                    <li class="{{!Request::is('*gallery*') ?: 'current'}}"><a href="{{ URL::to('admin/gallery') }}"><i class="glyphicon glyphicon-tasks"></i> Galeria </a></li>
                </ul>
             </div>
      </div>
      <div class="col-md-10">
        @if(isset($message))
          @if($success)
            <div class="alert alert-success">{{$message}}</div>
          @else
            <div class="alert alert-danger">{{$message}}</div>
          @endif
        @endif
      	@yield('content')
      </div>
      </div>
    </div>
<!--
    <footer>
         <div class="container">

            <div class="copy text-center">
               Copyright 2014 <a href='#'>Website</a>
            </div>

         </div>
      </footer> -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{URL::to('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::to('js/custom.js')}}"></script>
  </body>
</html>
