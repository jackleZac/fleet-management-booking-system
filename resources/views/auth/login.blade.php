<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body style="
    margin:0;
    font-family:Arial;
    background:#f5f5f5;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
">

    <div style="
        width:380px;
        background:white;
        padding:30px;
        border-radius:12px;
        box-shadow:0 4px 20px rgba(0,0,0,0.1);
    ">
        <h2 style="text-align:center; margin-bottom:25px;">Login</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div style="margin-bottom:20px;">
                <label>Email</label><br>
                <input type="email" name="email" required
                    style="
                        width:90%;
                        padding:12px;
                        margin-top:6px;
                        border:1px solid #ccc;
                        border-radius:6px;
                    ">
            </div>

            <div style="margin-bottom:20px;">
                <label>Password</label><br>
                <input type="password" name="password" required
                    style="
                        width:90%;
                        padding:12px;
                        margin-top:6px;
                        border:1px solid #ccc;
                        border-radius:6px;
                    ">
            </div>

            <div style="margin-bottom:20px;">
                <label>
                    <input type="checkbox" name="remember">
                    Remember me
                </label>
            </div>

            <button type="submit" style="
                width:100%;
                padding:12px;
                background:#ffde59;
                border:none;
                border-radius:6px;
                font-weight:bold;
                cursor:pointer;
            ">
                Login
            </button>
        </form>

        <p style="text-align:center; margin-top:20px;">
            Don't have an account?
            <a href="{{ route('register') }}">Register</a>
        </p>
    </div>

</body>
</html>