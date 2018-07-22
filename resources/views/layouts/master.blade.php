<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Short-Link</title>
    <link rel="stylesheet" href="/css/app.css" />
</head>
<body>
<nav class="navbar navbar-dark bg-primary navbar-expand-lg">
    <a class="navbar-brand" href="/">Short-Link</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if(Auth::check())
                        {{ Auth::user()->email}}
                    @else
                        Login
                    @endif
                </a>
                @if(Auth::check())
                    <div class="dropdown-menu dropdown-menu-right" id="login-dp" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/links">My Links</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                    @else
                <div class="dropdown-menu dropdown-menu-right" id="login-dp" aria-labelledby="navbarDropdownMenuLink">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
                                @csrf
                                <div class="form-group">
                                    <label class="sr-only" for="email">Email address</label>
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="password">Password</label>
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                </div>
                                <div class="help-block text-right"><a href="/password/reset ">Forgot password ?</a></div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> keep me logged-in
                                    </label>
                                </div>
                            </form>
                        </div>
                        <div class="bottom text-center mx-auto">
                            <a href="/register"><b>Register</b></a>
                        </div>
                    </div>
                </div>
                @endif
            </li>
        </ul>
    </div>
</nav>

<div class="container d-flex h-100">
    <div class="row align-self-center w-100 mx-auto">
        @yield('content')
    </div>
</div>


<footer class="footer" id="footer">
    <div class="container">
        <span class="text-muted">Adrien Maranville &copy; 2018</span>
    </div>
</footer>
    <script src="/js/app.js"></script>
</body>
</html>