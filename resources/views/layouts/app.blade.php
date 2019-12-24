<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'KIT Project') }}</title>
  <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/simple-sidebar.css')}}" rel="stylesheet">
  @section('styles')
  @show
</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">
	  			<a href="{{ url('/') }}">
                    {{ config('app.name', 'KIT') }}
                </a> 
	  </div>
      <div class="list-group list-group-flush">
	          <div id="basket">
            <table id="bascets">
                <tbody>
                <tr style="display: none;" class="hPb">
                    <td>Выбрано:</td>
                    <td><span id="totalGoods">0</span> товаров</td>
                    <td>Сумма: &asymp; </td>
                    <td><span id="totalPrice">0</span> руб.</td>
                </tr>
                <tr style="display: table-row;" class="hPe">
                    <td colspan="2">Корзина пуста</td>
                </tr>
                <tr>
                    <td><a style="display: none;" id="clearBasket" href="#">Очистить</a></td>
                    <td><a style="display: none;" id="checkOut" href="{{asset('basket')}}">Оформить</a></td>
                </tr>
                </tbody>
            </table>
        </div>
	    @foreach($v_categories as $cat)
         <a href="{{asset('category/'.$cat->id)}}" class="list-group-item list-group-item-action bg-light">{{$cat->name}}</a> 
		@endforeach
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="{{asset('about')}}">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{asset('construct')}}">Contstruct</a>
            </li>
						@guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="{{asset('home')}}" >
                                        Кабинет пользователя
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
        <main class="py-4">
            @yield('content')
        </main>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/jquery.cookie.js')}}"></script>
  <script src="{{asset('js/cart.js')}}"></script>
  @section('scripts') 
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
  @show
</body>

</html>
