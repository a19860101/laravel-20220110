<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gjun--@yield('page-title','Blog')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    @yield('css')
    <style>
        .carts_num {
            width: 18px;
            height: 18px;
            line-height: 18px;
            top:0;
            right:0
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
        <div class="container-fluid">
        <a class="navbar-brand" href="{{route('post.index')}}">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('post.index')}}">首頁</a>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{route('post.create')}}">建立文章</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('category.create')}}">分類管理</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('post.list')}}">文章管理</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('product.index')}}">商品管理</a>
                </li>
                @endauth
                <li class="nav-item">
                    <a class="nav-link" href="{{route('product.list')}}">所有商品</a>
                </li>
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                <li class="nav-item">
                    @php
                        $carts = App\Cart::where('user_id',Auth::id())->get();
                        $carts_num = count($carts);
                    @endphp
                    <a href="{{route('cart.cartList')}}" class="nav-link position-relative">
                        購物車
                        <span class="carts_num d-inline-block position-absolute rounded-circle text-white bg-danger text-center">{{$carts_num}}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('search')}}" class="nav-link">搜尋文章</a>
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
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
        </div>
    </nav>
    @yield('main')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    @yield('js')
</body>
</html>
