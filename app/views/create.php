<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create Form with File Upload</title>
<style>
  body {
    font-family: 'Comic Sans MS', cursive, sans-serif;
    background-color: #fff8f0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    overflow: hidden;
  }

  .cat {
    position: absolute;
    font-size: 40px;
    opacity: 0.8;
    animation: floatUp 15s linear infinite;
    pointer-events: none;
  }

  @keyframes floatUp {
    from {
      transform: translateY(100vh) rotate(0deg);
      opacity: 0.8;
    }
    to {
      transform: translateY(-10vh) rotate(360deg);
      opacity: 0;
    }
  }

  form {
    background-color: #fff0f5;
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.15);
    width: 350px;
    position: relative;
    z-index: 10;
    animation: popIn 0.8s ease;
  }

  @keyframes popIn {
    from { transform: scale(0.8); opacity: 0; }
    to { transform: scale(1); opacity: 1; }
  }

  h2 {
    text-align: center;
    color: #ff69b4;
    margin-bottom: 20px;
    animation: bounce 1.5s infinite;
  }

  @keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-5px); }
  }

  .cat-row {
    text-align: center;
    font-size: 20px;
    margin-bottom: 15px;
  }

  label {
    display: block;
    margin-bottom: 5px;
    color: #ff69b4;
    font-weight: bold;
  }

  input[type="text"],
  input[type="email"],
  input[type="file"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 20px;
    border: 2px solid #ffb6c1;
    border-radius: 10px;
    outline: none;
    transition: 0.3s;
    background-color: white;
  }

  input[type="text"]:focus,
  input[type="email"]:focus,
  input[type="file"]:focus {
    border-color: #ff69b4;
    background-color: #ffe4e1;
    box-shadow: 0 0 8px #ffb6c1;
  }

  input[type="submit"] {
    width: 100%;
    padding: 12px;
    background-color: #ff69b4;
    border: none;
    border-radius: 10px;
    color: white;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
  }

  input[type="submit"]:hover {
    background-color: #ff1493;
    transform: scale(1.05);
  }

   .actions {
    margin-top: 20px;
    text-align: center;
  }

  .back-link {
    display: inline-block;
    background-color: #ffe4e1;
    color: #ff69b4;
    font-weight: bold;
    text-decoration: none;
    padding: 10px 18px;
    border-radius: 20px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.15);
    transition: all 0.3s ease-in-out;
    font-family: 'Comic Sans MS', cursive, sans-serif;
  }

  .back-link:hover {
    background-color: #ffb6c1;
    color: white;
    transform: scale(1.05) rotate(-2deg);
    box-shadow: 0 6px 12px rgba(0,0,0,0.2);
  }

  .back-link:active {
    transform: scale(0.95);
  }
</style>
</head>
<body>

<!-- Floating cats background -->
<div class="cat" style="left:10%; animation-duration: 12s;">🐱</div>
<div class="cat" style="left:25%; animation-duration: 18s;">😺</div>
<div class="cat" style="left:40%; animation-duration: 14s;">😸</div>
<div class="cat" style="left:60%; animation-duration: 16s;">😹</div>
<div class="cat" style="left:75%; animation-duration: 20s;">😻</div>
<div class="cat" style="left:90%; animation-duration: 15s;">😽</div>

<form action="<?=site_url('/create');?>" method="POST" enctype="multipart/form-data">
  <h2>Add Student 🌸</h2>

  <div class="cat-row">🐱 😺 😸 😹 😻 😽</div>

   <?php if (!empty($errors)): ?>
    <div style="color:red;">
        <ul>
            <?php foreach ($errors as $e): ?>
                <li><?= htmlspecialchars($e) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
 
  <label for="first_name">First Name</label>
  <input type="text" id="first_name" name="first_name" placeholder="Your first name">

  <label for="last_name">Last Name</label>
  <input type="text" id="last_name" name="last_name" placeholder="Your last name">

  <label for="emails">Email</label>
  <input type="email" id="emails" name="emails" placeholder="you@example.com">

  <label for="profile_pic">Upload File</label>
  <input type="file" id="profile_pic" name="profile_pic">

  <input type="submit" value="Submit ✨">

  <div class="cat-row">😻 😹 😸 😺 🐱</div>

<div class="actions">
  <a class="back-link" href="<?=site_url('get_all')?>">⬅️ 🐱 Back to Students</a>
</div>

</form>

</body>
</html>
