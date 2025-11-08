<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Feedback Portal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #1e3a8a, #4f46e5, #06b6d4);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
    }
    .orb {
      position: absolute;
      border-radius: 50%;
      filter: blur(120px);
      opacity: 0.45;
      animation: float 8s ease-in-out infinite;
    }
    .orb1 {
      width: 350px; height: 350px;
      top: -100px; left: -120px;
      background: #d9dfe9ff;
    }
    .orb2 {
      width: 400px; height: 400px;
      bottom: -150px; right: -100px;
      background: #facc15;
    }
    @keyframes float {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-25px); }
    }

    .glass-card {
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(14px);
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 25px;
      box-shadow: 0 15px 45px rgba(0, 0, 0, 0.25);
      color: #fff;
      padding: 50px 40px;
      width: 90%;
      max-width: 500px;
      text-align: center;
      z-index: 2;
    }
    .form-control {
      background: rgba(255, 255, 255, 0.2);
      border: none;
      border-radius: 12px;
      padding: 12px;
      color: #fff;
    }
    .form-control::placeholder {
      color: rgba(255, 255, 255, 0.7);
    }
    .form-control:focus {
      background: rgba(255, 255, 255, 0.3);
      box-shadow: 0 0 0 2px #60a5fa;
      color: #fff;
    }
    .btn-login {
      background: linear-gradient(135deg, #34d399, #10b981);
      border: none;
      padding: 12px;
      border-radius: 12px;
      font-weight: 600;
      color: #fff;
      width: 100%;
      box-shadow: 0 0 20px rgba(16, 185, 129, 0.4);
      transition: 0.3s ease;
    }
    .btn-login:hover {
      transform: scale(1.05);
      box-shadow: 0 0 35px rgba(16, 185, 129, 0.6);
    }
    .text-link {
      color: #facc15;
      text-decoration: none;
      font-weight: 500;
    }
    .text-link:hover {
      text-decoration: underline;
      color: #fde047;
    }
  </style>
</head>
<body>
  <div class="orb orb1"></div>
  <div class="orb orb2"></div>

  <div class="glass-card">
    <h2 class="fw-bold mb-4">Welcome Back 👋</h2>
    <p class="mb-4 text-light">Please login to your account</p>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="mb-3 text-start">
          <label for="email" class="form-label text-light">Email</label>
          <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required autofocus>
        </div>

        <!-- Password -->
        <div class="mb-3 text-start">
          <label for="password" class="form-label text-light">Password</label>
          <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
        </div>

        <!-- Remember Me -->
        <div class="form-check mb-3 text-start">
          <input type="checkbox" class="form-check-input" id="remember" name="remember">
          <label class="form-check-label text-light" for="remember">Remember Me</label>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn-login">Log In</button>

        <!-- Forgot password -->
        <div class="mt-3">
          @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="text-link">Forgot your password?</a>
          @endif
        </div>

        <!-- Register -->
        <p class="mt-4 text-light">Don’t have an account? 
          <a href="{{ route('register') }}" class="text-link">Register</a>
        </p>
    </form>
  </div>
</body>
</html>
