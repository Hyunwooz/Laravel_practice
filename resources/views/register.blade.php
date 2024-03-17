<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
        @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <h1 class="text-center mt-10 mb-4">회원가입</h1>
        <form method="POST" action="/register">
            @csrf
            <div class="mb-3">
                <label for="user_id" class="form-label">아이디</label>
                <input type="text" class="form-control" id="user_id" name="user_id">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">비밀번호</label>
                <input type="password" class="form-control" id="password" name="password" autocomplete="new-password">
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">비밀번호 확인</label>
                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation"
                    required autocomplete="new-password">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">이름</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="birthdate" class="form-label">생년월일</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate">
            </div>
            <div class="mb-3">
                <label for="email_id" class="form-label">이메일</label>
                <input type="text" class="form-control" id="email_id" name="email_id"></input>
                <div class="input-group">
                    <input type="text" class="form-control" id="email_suffix" name="email_suffix">
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
                <!-- <!-- </div> -->
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="terms_and_conditions" required>
                    <label class="form-check-label" for="terms_and_conditions">개인(신용)정보의 수집·이용에 관한 사항</label>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="privacy_policy" required>
                    <label class="form-check-label" for="privacy_policy">서비스 이용에 관한 사항</label>
                </div>
                <button type="submit" class="btn btn-primary">회원가입</button>
        </form>
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