<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>404 Not Found</title>
<style>
  /* Reset and basic flex center */
  body, html {
    margin: 0; padding: 0; height: 100%;
    font-family: Arial, sans-serif;
    background-color: #f3f4f6;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 20px;
  }
  .container {
    max-width: 480px;
  }
  .error-code {
    font-size: 8rem;
    font-weight: 900;
    color: #dc2626; /* red-600 */
    animation: bounce 2s infinite;
    margin: 0;
    line-height: 1;
  }
  .title {
    font-size: 2.5rem;
    margin: 20px 0 10px;
    animation: fadeInUp 1s ease forwards;
  }
  .message {
    color: #555;
    font-size: 1.125rem;
    margin-bottom: 30px;
    animation: fadeInUp 1s ease forwards;
    animation-delay: 0.3s;
  }
  .btn {
    display: inline-block;
    background-color: #dc2626;
    color: white;
    padding: 12px 28px;
    font-size: 1.125rem;
    font-weight: 600;
    border-radius: 8px;
    text-decoration: none;
    box-shadow: 0 6px 12px rgba(220, 38, 38, 0.4);
    transition: background-color 0.3s ease;
    animation: fadeInUp 1s ease forwards;
    animation-delay: 0.6s;
  }
  .btn:hover {
    background-color: #b91c1c; /* darker red */
  }

  /* Animations */
  @keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-20px); }
  }
  @keyframes fadeInUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }

  /* Responsive text scaling */
  @media (max-width: 480px) {
    .error-code {
      font-size: 5rem;
    }
    .title {
      font-size: 2rem;
    }
    .message, .btn {
      font-size: 1rem;
    }
  }
</style>
</head>
<body>
  <div class="container">
    <h1 class="error-code">404</h1>
    <h2 class="title">Oops! Page Not Found</h2>
    <p class="message">Sorry, the page you are looking for doesn’t exist or has been moved.</p>
    <a href="{{ url('/') }}" class="btn">Go Back Home</a>
  </div>
</body>
</html>
