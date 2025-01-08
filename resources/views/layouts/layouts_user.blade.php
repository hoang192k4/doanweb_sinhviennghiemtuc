<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css" />
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/layout_user.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user_min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user_min_two.css') }}">
    <title>@yield('title', 'Trang chủ') - Sinh Viên Nghiêm Túc</title>
</head>

<body>
    <!-- Header -->
    @include('user.partials.header_user')
    <!-- Header -->
    <div class="cskh">
        <i id="scroll" class="far fa-hand-point-up"></i>
        <a href="" id="room_chat"><i class="fas fa-robot"></i></a>
    </div>
    {{-- chat --}}
    @include('user.partials.chat')
    {{-- chat --}}
    {{-- login register --}}
    @include('user.partials.login_register')
    {{-- login register --}}
    <main>
        @yield('content')
    </main>
    <!-- Footer -->
    @include('user.partials.footer_user')
    <!-- Footer -->

    <script src="{{ asset('js/layout_user.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @yield('script')
</body>

</html>
