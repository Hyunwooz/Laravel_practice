<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mypage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    .container {
        max-width: 500px;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-5 mb-4">마이페이지</h1>
        @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        @php
        $user_id = auth()->user()->user_id;
        $birthdate = auth()->user()->birthdate;
        $name = auth()->user()->name;
        $email = auth()->user()->email;
        list($first, $second) = explode('@', $email);
        @endphp
        <form method="POST" action="{{ route('mypage') }}">
            @csrf
            <div class="mb-3">
                <label for="user_id" class="form-label">
                    아이디
                </label>
                <input type="text" class="form-control" id="user_id" name="user_id" readonly value="{{$user_id}}">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">이름</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$name}}">
            </div>
            <div class="mb-3">
                <label for="email_id" class="form-label">이메일</label>
                <input type="text" class="form-control" id="email_id" name="email_id" value="{{$first}}"></input>
                <div class="input-group">
                    <input type="text" class="form-control" id="email_suffix" name="email_suffix" value="{{$second}}">
                    <select class="form-select" id="email_suffix" name="email_suffix"
                        onchange="handleEmailSuffixChange(this)">
                        <option value="type">직접 입력</option>
                        <option value="naver.com">naver.com</option>
                        <option value="gmail.com">gmail.com</option>
                        <option value="hanmail.net">hanmail.net</option>
                        <option value="nate.com">nate.com</option>
                        <option value="kakao.com">kakao.com</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="birthdate" class="form-label">
                        생년월일
                    </label>
                    <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{$birthdate}}">
                </div>
                <button type="submit" class="btn btn-primary">정보 저장</button>
        </form>
        <a href="/changepassword" class="btn btn-dark">비밀번호 변경</a>
    </div>
    <script>
    function handleEmailSuffixChange(selectElement) {
        const emailInput = document.getElementById('email_suffix');
        const emailSuffixSelect = selectElement;
        const selectedOption = emailSuffixSelect.options[emailSuffixSelect.selectedIndex].value;

        if (selectedOption === 'type') {
            emailInput.disabled = false;
            emailInput.value = ''; // Clear input
        } else {
            emailInput.disabled = true;
            emailInput.value = selectedOption;
        }
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>