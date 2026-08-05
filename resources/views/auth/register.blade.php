<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
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
        <h2 style="text-align:center; margin-bottom:25px;">Register</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div style="margin-bottom:20px;">
                <label>Name</label><br>
                <input type="text" name="name" required
                    style="
                        width:90%;
                        padding:12px;
                        margin-top:6px;
                        border:1px solid #ccc;
                        border-radius:6px;
                    ">
            </div>

            <!-- Email Address -->
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

            <!-- Phone Number -->
            <div style="margin-bottom:20px;">
                <label>Phone Number</label><br>
                <input type="text" name="phone_number" required
                    style="
                        width:90%;
                        padding:12px;
                        margin-top:6px;
                        border:1px solid #ccc;
                        border-radius:6px;
                    ">
            </div>

            <!-- Password -->
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
                <label>Confirm Password</label><br>
                <input type="password" name="password_confirmation" required
                    style="
                        width:90%;
                        padding:12px;
                        margin-top:6px;
                        border:1px solid #ccc;
                        border-radius:6px;
                    ">
            </div>

            <div class="flex items-center justify-end mt-4">
                <p style="text-align:center; margin-top:20px;">
                    Already have an account?
                    <a href="{{ route('login') }}">Login</a>
                </p>

                <button type="submit" style="
                    width:100%;
                    padding:12px;
                    background:#ffde59;
                    border:none;
                    border-radius:6px;
                    font-weight:bold;
                    cursor:pointer;
                ">
                    Register
                </button>
            </div>
        </form>
    </div>
</body>
</html>