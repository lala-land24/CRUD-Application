<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <style>
    body {
      font-family: 'Comic Sans MS', cursive, sans-serif;
      background-color: #fff8f0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      overflow: hidden;
      margin: 0;
    }

    /* Floating cat background */
    .cat {
      position: absolute;
      font-size: 40px;
      opacity: 0.8;
      animation: floatUp 12s linear infinite;
      pointer-events: none;
    }
    @keyframes floatUp {
      from { transform: translateY(100vh) rotate(0deg); opacity: 0.7; }
      to { transform: translateY(-10vh) rotate(360deg); opacity: 0; }
    }

    /* Form container */
    form {
      background: #fff0f5;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 6px 15px rgba(0,0,0,0.15);
      width: 340px;
      z-index: 10;
      animation: fadeIn 1s ease-in-out;
    }
    h2 {
      text-align: center;
      color: #ff69b4;
      margin-bottom: 15px;
      text-shadow: 2px 2px #ffe4e1;
    }

    label {
      font-weight: bold;
      color: #333;
    }
    input {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 2px solid #ffb6c1;
      border-radius: 30px;
      font-size: 14px;
      outline: none;
      background-color: #fffafc;
      box-shadow: 0 3px 6px rgba(255,182,193,0.3);
      transition: 0.3s;
    }
    input:focus {
      border-color: #ff69b4;
      background-color: #ffe6f0;
      box-shadow: 0 4px 10px rgba(255,105,180,0.4);
    }

    button {
      width: 100%;
      padding: 12px;
      background: #ffb6c1;
      color: white;
      font-size: 16px;
      font-weight: bold;
      border: none;
      border-radius: 30px;
      cursor: pointer;
      margin-top: 10px;
      transition: 0.3s;
      box-shadow: 0 4px 8px rgba(0,0,0,0.15);
    }
    button:hover {
      background: #ff69b4;
      transform: scale(1.05) rotate(-2deg);
      box-shadow: 0 6px 12px rgba(0,0,0,0.2);
    }

    .error {
      color: red;
      text-align: center;
      margin-bottom: 10px;
    }

    p {
      text-align: center;
      margin-top: 15px;
      font-size: 14px;
    }
    p a {
      color: #ff69b4;
      font-weight: bold;
      text-decoration: none;
    }
    p a:hover {
      text-decoration: underline;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: scale(0.9); }
      to { opacity: 1; transform: scale(1); }
    }
  </style>
</head>
<body>
  <!-- Floating cats -->
  <div class="cat" style="left:15%; animation-duration: 15s;">🐱</div>
  <div class="cat" style="left:35%; animation-duration: 18s;">😺</div>
  <div class="cat" style="left:55%; animation-duration: 12s;">😻</div>
  <div class="cat" style="left:75%; animation-duration: 20s;">😸</div>

  <form method="POST" action="/index.php/register">
    <h2>🐾 Register 🐾</h2>

    <?php if (!empty($error)): ?>
      <p class="error"><?= $error ?></p>
    <?php endif; ?>

    <label>Username:</label>
    <input type="text" name="username" placeholder="Enter username" required>

    <label>Password:</label>
    <input type="password" name="password" placeholder="Enter password" required>

    <label>Confirm Password:</label>
    <input type="password" name="confirm_password" placeholder="Re-enter password" required>

    <button type="submit">✨ Register 🐱</button>

    <p>Already have an account? <a href="/index.php/login">Login here 😺</a></p>
  </form>
</body>
</html>
