<header>
    <div class="top">
        <div class="container">
            <div class="search-sign">
                <div class="right">
                    <div class="top-nav">
                        <div class="nav_responsive_top"><i class="fa fa-bars"></i></div>
                        <ul>
                            
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a data-value="{{ __('Login') }}" class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif
                                
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a data-value="{{ __('Register') }}" class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a data-value="{{ Auth::user()->name }}" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="fa fa-user"></i> {{ Auth::user()->name }}
                                    </a>
    
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a data-value="{{ __('Logout') }}" class="dropdown-item" href="{{ route('logout') }}"
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
                            <li class="active"><a data-value="الرئيسية" href="{{ route('home.page') }}">الرئيسية</a></li>
                            <li><a data-value="من نحن" href="">من نحن</a></li>
                            <li><a data-value="سياسة الخصوصية" href="">سياسة الخصوصية</a></li>
                            <li><a data-value="اتصل بنا" href="">اتصل بنا</a></li>
                        </ul>
                    </div>
                </div>
                <div class="left">
                    <div class="search">
                        <a href=""><span><i class="fa fa-search"></i></span></a>
                        <form role="search" method="get" id="searchform">
                            <input type="text" name="s" placeholder="ابحث هنا...">
                            <input type="submit" id="searchsubmit" name="submit" hidden="">
                        </form>
                    </div>
                    <div class="social_media">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="bottom">
        <div class="container">
            <div class="inner_header">
                <!-- start logo -->
                <div class="logo">
                    <a href="{{ route('home.page') }}">
                        <img src="{{URL::asset('assets/frontend/img/logo.png')}}" alt="" title="">
                    </a>
                </div>
                <!-- end logo -->
                <div class="nav_responsive"><i class="fa fa-bars"></i></div> 
                <div class="nav">
                    <ul>
                        <li><a href="{{ route('home.page') }}"><i class="fa fa-home"></i>الرئيسية</a></li>
                        <li class="menu-item-has-children">
                            <a href="#"><i class="fa fa-home"></i>الاقسام</a>
                            <ul class="sub-menu">
                                @foreach ($categories as $category)
                                    <li><a href="{{ route('category.home.index',[$category->id]) }}"><i class="fa fa-home"></i>{{ $category->name }}</a></li>
                                @endforeach
                            </ul>    
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>