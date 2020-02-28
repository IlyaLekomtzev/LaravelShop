<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	@yield('title')
    <link rel="stylesheet" href="{{asset('src/css/animate.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css">
    <link rel="stylesheet" href="{{asset('src/css/bootstrap-grid.min.css')}}">
    <link rel="stylesheet" href="{{asset('src/css/bootstrap-reboot.css.map')}}">
    <link rel="stylesheet" href="{{asset('src/css/fonts.css')}}">
    <link rel="stylesheet" href="{{asset('src/css/style.css')}}">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
    @auth
        <section class="auth-line">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="auth-line__wrap">
                            <a href="{{route('admin')}}">Админ. панель</a>
                            <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Выйти') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endauth
	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col-6 col-lg-2">
					<div class="header__logo">
						<a href="/">
							<img src="{{asset('src/img/logo.png')}}" alt="logo" width="70" height="70">
						</a>
					</div>
				</div>
				<div class="d-none d-lg-block col-lg-7">
					<nav class="header__menu">
						<ul>
							<li>
								<a href="{{route('catalog')}}">Каталог</a>
							</li>
							<li>
								<a href="#">О нас</a>
							</li>
							<li>
								<a href="#">Контакты</a>
							</li>
							<li>
								<a href="{{route('stocks')}}">Акции</a>
							</li>
						</ul>
					</nav>
				</div>
				<div class="d-none d-lg-block col-lg-3">
					<div class="header__links">
						<a href="https://vk.com/wearmeshell">
							<div class="header__links--item vk">
								<img src="{{asset('src/img/vk.svg')}}" alt="Vk" width="20" height="20">
							</div>
						</a>
						<a href="https://www.instagram.com/wearmeshell/">
							<div class="header__links--item inst">
								<img src="{{asset('src/img/insta.svg')}}" alt="Insta" width="20" height="20">
							</div>
						</a>
						<a href="{{route('cart')}}">
							<div class="header__links--item cart">
								<img src="{{asset('src/img/cart.svg')}}" alt="Cart" width="20" height="20">
							</div>
						</a>
					</div>
				</div>
				<div class="col-6 d-lg-none">
					<div class="header__burger">
						<img id="mobile-click" src="{{asset('src/img/burger.svg')}}" alt="burger">
					</div>
				</div>
			</div>
			<div id="mobile-menu" class="mobile">
					<div class="header__mob-menu">
						<ul>
							<li>
								<a href="{{route('catalog')}}">Каталог</a>
							</li>
							<li>
								<a href="#">О нас</a>
							</li>
							<li>
								<a href="#">Контакты</a>
							</li>
							<li>
								<a href="{{route('stocks')}}">Акции</a>
							</li>
						</ul>
					</div>
					<div class="header__links">
						<a href="#">
							<div class="header__links--item vk">
								<img src="{{asset('src/img/vk.svg')}}" alt="Vk" width="20" height="20">
							</div>
						</a>
						<a href="#">
							<div class="header__links--item inst">
								<img src="{{asset('src/img/insta.svg')}}" alt="Insta" width="20" height="20">
							</div>
						</a>
						<a href="{{route('cart')}}">
							<div class="header__links--item cart">
								<img src="{{asset('src/img/cart.svg')}}" alt="Cart" width="20" height="20">
							</div>
						</a>
					</div>
			</div>
		</div>
    </header>
    
    @yield('content')

</body>
</html>