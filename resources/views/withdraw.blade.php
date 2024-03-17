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
        <h1 class="mb-4">회원 탈퇴</h1>
        <form method="POST" action="{{ route('withdraw') }}">
            @csrf

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="withdraw_approve" required>
                <label class="form-check-label" for="withdraw_approve">회원탈퇴 동의여부</label>
            </div>
            <button type="submit" class="btn btn-primary">탈퇴</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>