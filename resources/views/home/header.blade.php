<!-- Navbar -->
<nav class="custom-navbar navbar navbar-expand-lg navbar-dark fixed-top" data-spy="affix" data-offset-top="10">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item d-flex align-items-center mr-2">
                <a href="{{ url('/learn_facts') }}" class="d-inline-flex align-items-center justify-content-center rounded-circle"
                   style="width:44px;height:44px;border:1px solid rgba(255,255,255,.7);color:#fff;text-decoration:none;font-size:22px;"
                   title="Learn Facts">
                    🐾
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#gallary">Shelter</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#book-table">Request Cat-Sitting</a>
            </li>
        </ul>
        <a class="navbar-brand m-auto" href="#">
            <img src="assets/imgs/logo.png" class="brand-img" alt="">
            <span class="brand-txt">Cat Tales</span>
        </a>
        <ul class="navbar-nav">
            @if (Route::has('login'))
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('my_cart')}}">Cart</a>
                    </li>


                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <input class="btn btn-primary ml-xl-4" type="submit" value="Logout">
                    </form>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @endauth
            @endif
            <li class="nav-item">
                <a class="nav-link" href="#blog">Make Adoption<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#testmonial">Reviews</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#contact">Contact Us</a>
            </li>
            
        </ul>
    </div>
</nav>
<!-- header -->
<header id="home" class="header">
    <div class="overlay text-white text-center">
        <h1 class="display-2 font-weight-bold my-3">Cat Tales</h1>
        <h2 class="display-4 mb-5">Cat Tales, Every Paw Deserves a Home.</h2>
        <a class="btn btn-lg btn-primary" href="#gallary">View Our Gallary</a>
    </div>
</header>
