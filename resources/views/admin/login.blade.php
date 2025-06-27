<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Login Page</title>
  <style>
    body {
      background: #f2f2f2;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      font-family: Arial, sans-serif;
    }
    .login-container {
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      width: 300px;
    }
    .login-container h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    .login-container input[type="text"],
    .login-container input[type="password"] {
      width: 100%;
      padding: 12px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    .login-container button {
      width: 100%;
      padding: 12px;
      background: #4CAF50;
      border: none;
      color: white;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
    }
    .login-container button:hover {
      background: #45a049;
    }
    .login-container .signup {
      text-align: center;
      margin-top: 15px;
    }
    .login-container .signup a {
      color: #4CAF50;
      text-decoration: none;
    }
  </style>
</head>
<body>

  <div class="login-container">
    <h2>Admin Login</h2>
    <form action="{{ route('admin.login.post')}}" method="post">
        @csrf
        <input type="text" name="loginname" placeholder="Enter Name" required>
        <input type="text" name="loginpassword" placeholder="Enter password" required>
        <button>Login</button>
        @if(session('loginerror'))
            <div style="color: red; text-align: center; margin-top: 10px;">
                {{ session('loginerror') }}
            </div>
        @endif
    </form>
  </div>

  @auth('admin')

  @php
  header('Location: /admin/dashboard');
  exit();
  @endphp

  @endauth
</body>
</html>
