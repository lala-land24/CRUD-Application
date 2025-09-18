<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>🐱 Login Page 🐾</title>
  <style>
    body {
      font-family: 'Comic Sans MS', cursive, sans-serif;
      background-color: #fff8f0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      overflow: hidden;
    }

    /* Floating cats */
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

    form {
      background: #fff0f5;
      padding: 25px;
      border-radius: 20px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.12);
      width: 320px;
      text-align: center;
      animation: fadeIn 1s ease-in-out;
      position: relative;
      z-index: 10;
    }
    h2 {
      margin-bottom: 15px;
      color: #333;
      text-shadow: 2px 2px #ffe4e1;
    }
    input {
      width: 90%;
      padding: 12px;
      margin: 8px 0;
      border: 2px solid #ffb6c1;
      border-radius: 30px;
      outline: none;
      font-size: 15px;
      transition: 0.3s;
    }
    input:focus {
      border-color: #ff69b4;
      background-color: #ffe6f0;
      box-shadow: 0 0 10px rgba(255,105,180,0.5);
    }
    button {
      width: 100%;
      padding: 12px;
      margin-top: 12px;
      background: #ffb6c1;
      color: white;
      border: none;
      border-radius: 30px;
      cursor: pointer;
      font-size: 16px;
      font-weight: bold;
      transition: 0.3s;
      box-shadow: 0 4px 8px rgba(0,0,0,0.15);
    }
    button:hover {
      background: #ff69b4;
      transform: scale(1.05);
    }
    .error {
      color: red;
      margin: 10px 0;
      font-weight: bold;
    }
    p {
      margin-top: 15px;
      font-size: 14px;
    }
    a {
      color: #ff69b4;
      text-decoration: none;
      font-weight: bold;
    }
    a:hover {
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
  <div class="cat" style="left:10%; animation-duration: 15s;">🐱</div>
  <div class="cat" style="left:30%; animation-duration: 18s;">😺</div>
  <div class="cat" style="left:50%; animation-duration: 12s;">😸</div>
  <div class="cat" style="left:70%; animation-duration: 20s;">😹</div>
  <div class="cat" style="left:85%; animation-duration: 14s;">😻</div>

  <form action="<?= site_url('login') ?>" method="POST">
    <h2>🐾 Login 🐾</h2>
    <?php if (!empty($error)) : ?>
      <p class="error"><?= $error ?></p>
    <?php endif; ?>

    <input type="text" name="username" placeholder="😺 Username" required>
    <input type="password" name="password" placeholder="🔒 Password" required>
    <button type="submit">✨ Login ✨</button>

    <p>Don't have an account? <a href="<?= site_url('register') ?>">Register here 🐱</a></p>
  </form>
</body>
</html>
