<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
</head>
<body>
    <form action="" method="POST">
        @csrf
        <label>Full Name</label>
        <input type="text" name="full_name" id="">
        <label>User Name</label>
        <input type="text" name="user_name" id="">
        <label>Email</label>
        <input type="text" name="email" id="">
        <label>Password</label>
        <input type="text" name="password" id="">
        <label>Confirm Password</label>
        <input type="text" name="password_confirmation" id="">
        <label>Phone Number</label>
        <input type="number" name="phone" id="">
        <label>City</label>
        <input type="text" name="city" id="">
        <label>Country</label>
        <input type="text" name="country" id="">
        <label>Company</label>
        <input type="text" name="company_name" id="">
        <input type="submit" placeholder="Sign up">
    </form>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</body>
</html>