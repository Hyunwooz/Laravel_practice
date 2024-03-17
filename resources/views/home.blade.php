<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    .container {
        max-width: 500px;
        margin-top: 50px;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mb-4">홈 화면</h1>

        @auth
        <p>안녕하세요, {{ auth()->user()->name }} 님!</p>
        <p>가입일시 : {{ auth()->user()->created_at }} 님!</p>
        <p>생년월일 : {{ auth()->user()->birthdate }} 님!</p>
        <div class="d-flex gap-3">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-warning text-white" type="submit">로그아웃</button>
            </form>
            <a class="btn btn-primary" href="/mypage">회원정보수정</a>
            <a class="btn btn-success" href="/withdraw">회원탈퇴</a>
        </div>
        @else
        <a class="btn btn-primary" href="/login">로그인</a>
        <a class="btn btn-success" href="/register">회원가입</a>

        @endauth

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>