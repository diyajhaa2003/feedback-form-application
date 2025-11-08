<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome | Feedback Portal</title>
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

    /* Glassmorphism card */
    .glass-card {
      background: rgba(221, 213, 213, 0.15);
      backdrop-filter: blur(14px);
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 25px;
      box-shadow: 0 15px 45px rgba(0, 0, 0, 0.25);
      color: #fff;
      text-align: center;
      padding: 60px 40px;
      z-index: 2;
      width: 90%;
      max-width: 500px;
      transition: all 0.4s ease;
    }
    .glass-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.35);
    }

    /* Buttons */
    .btn-modern {
      border: none;
      border-radius: 12px;
      padding: 14px 20px;
      font-size: 1.1rem;
      font-weight: 600;
      letter-spacing: 0.5px;
      transition: all 0.3s ease;
      width: 100%;
      text-decoration: none;
    }
    .btn-admin {
      background: linear-gradient(135deg, #fde047, #facc15);
      color: #111;
      box-shadow: 0 0 20px rgba(250, 204, 21, 0.4);
    }
    .btn-admin:hover {
      transform: scale(1.05);
      box-shadow: 0 0 35px rgba(250, 204, 21, 0.6);
    }
    .btn-user {
      background: linear-gradient(135deg, #34d399, #10b981);
      color: #fff;
      box-shadow: 0 0 20px rgba(16, 185, 129, 0.4);
    }
    .btn-user:hover {
      transform: scale(1.05);
      box-shadow: 0 0 35px rgba(16, 185, 129, 0.6);
    }

   
  </style>
</head>
<body>

  <!-- Background glow elements -->
  <div class="orb orb1"></div>
  <div class="orb orb2"></div>

  <div class="glass-card">
    <h1 class="fw-bold mb-3">Welcome to <span class="text-warning">Feedback Portal</span></h1>
    <p class="mb-5 text-light">We value your feedback! Please select your role to proceed.</p>

    <div class="d-flex flex-column gap-3">
      <a href="{{ route('login') }}" class="btn-modern btn-admin">Admin Login</a>
      <a href="{{ route('feedback.types') }}" class="btn-modern btn-user">Give Feedback</a>
    </div>
  </div>

</body>
</html>
