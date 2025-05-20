<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register Page</title>
  <style>
    body {
      background: #f2f2f2;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      font-family: Arial, sans-serif;
    }
    .register-container {
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      width: 320px;
    }
    .register-container h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    .register-container input[type="text"],
    .register-container input[type="email"],
    .register-container input[type="password"] {
      width: 100%;
      padding: 12px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    .register-container button {
      width: 100%;
      padding: 12px;
      background: #4CAF50;
      border: none;
      color: white;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
    }
    .register-container button:hover {
      background: #45a049;
    }
    .register-container .login-link {
      text-align: center;
      margin-top: 15px;
    }
    .register-container .login-link a {
      color: #4CAF50;
      text-decoration: none;
    }
  </style>
</head>
<body>
@auth
  @php
   header('Location: /');
   exit();
  @endphp

  @else
  <div class="register-container">
    <h2>Register</h2>
    <form action="/register" method="post">
        @csrf
      <input type="text" name="name" placeholder="Full Name" required>
      <input type="text" name="email" placeholder="Email Address" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Register</button>
    </form>
    <div class="login-link">
      Already have an account? <a href="/login">Login here</a>
    </div>
  </div>



  @endauth

</body>

</html>