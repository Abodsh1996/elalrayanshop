<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">ElalRaya Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{$route == 'index_page' ? 'active' : ''}}" aria-current="page" href="{{url('/')}}">{{trans('website_navbar.Home')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{$route == 'categories_page' ? 'active' : ''}}"  href="{{route('get_categories')}}">{{trans('website_navbar.category')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{$route == 'cart_page' ? 'active' : ''}}"  href="{{route('cart.index')}}">{{trans('website_navbar.cart')}}</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{trans('website_navbar.login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ trans('website_navbar.register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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

                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @if ( Config::get('app.locale')  == 'ar')
                            {{ LaravelLocalization::getCurrentLocaleName() }}
                            <img src="{{asset('assets/img/flags/ar.png') }}" alt="ar" style="max-width: 20px">
                        @else
                            {{ LaravelLocalization::getCurrentLocaleName() }}
                            <img src="{{asset('assets/img/flags/en.png') }}" alt="en" style="max-width: 20px">
                        @endif
                    </button>
                    <ul class="dropdown-menu">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        @endforeach
                    </ul>
                </div>
            </ul>
        </div>
    </div>
</nav>
