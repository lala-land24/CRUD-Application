<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Update Form</title>
<style>
  body {
    font-family: 'Comic Sans MS', cursive, sans-serif;
    background-color: #fff8f0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    overflow: hidden; /* prevent scrollbars from floating cats */
  }

  .cat {
    position: absolute;
    font-size: 40px;
    opacity: 0.8;
    animation: floatUp 15s linear infinite;
    pointer-events: none;
  }

  @keyframes floatUp {
    from { transform: translateY(100vh) rotate(0deg); opacity: 0.8; }
    to { transform: translateY(-10vh) rotate(360deg); opacity: 0; }
  }

  form {
    background-color: #fff0f5;
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
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
  }

  input[type="text"]:focus,
  input[type="email"]:focus {
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
</style>
</head>
<body>

<!-- Floating cats -->
<div class="cat" style="left:5%; animation-duration: 12s;">🐱</div>
<div class="cat" style="left:20%; animation-duration: 18s;">😺</div>
<div class="cat" style="left:40%; animation-duration: 14s;">😸</div>
<div class="cat" style="left:60%; animation-duration: 16s;">😹</div>
<div class="cat" style="left:80%; animation-duration: 20s;">😻</div>
<div class="cat" style="left:90%; animation-duration: 15s;">😽</div>

<?php if (!empty($errors)): ?>
    <div style="color:red;">
        <ul>
            <?php foreach ($errors as $e): ?>
                <li><?= htmlspecialchars($e) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form action="<?=site_url('/update/'.segment(3));?>" method="POST" enctype="multipart/form-data">
  <h2>Update Student 🌸</h2>

  <label for="first_name">First Name</label>
  <input type="text" id="first_name" name="first_name" value="<?=$student['first_name'];?>" placeholder="Your first name">

  <label for="last_name">Last Name</label>
  <input type="text" id="last_name" name="last_name" value="<?=$student['last_name'];?>" placeholder="Your last name">

  <label for="emails">Email</label>
  <input type="email" id="emails" name="emails" value="<?=$student['emails'];?>" placeholder="you@example.com">

  <!-- Show current profile picture -->
  <?php if (!empty($student['profile_pic'])): ?>
    <div style="text-align:center; margin-bottom:15px;">
      <img src="/upload/students/<?=$student['profile_pic'];?>" 
           alt="Current Profile" width="80" height="80" style="border-radius:50%; border:2px solid #ffb6c1;">
      <p style="color:#ff69b4; font-size:14px; margin-top:5px;">Current Profile Picture</p>
    </div>
  <?php endif; ?>

  <!-- File input for new profile pic -->
  <label for="profile_pic">Change Profile Picture</label>
  <input type="file" id="profile_pic" name="profile_pic" accept="image/*">

  <input type="submit" value="Update ✨">

  <div class="actions">
    <a class="back-link" href="<?=site_url('get_all')?>">⬅️ 🐱 Back to Students</a>
  </div>
</form>

</body>
</html>
