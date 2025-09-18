<?php
// 🔒 Protect page: only logged in users can access
if (!isset($_SESSION['user_id'])) {
    header("Location: " . site_url('login'));
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cute Cat Table</title>
  <style>
    body {
      font-family: 'Comic Sans MS', cursive, sans-serif;
      background-color: #fff8f0;
      margin: 0;
      padding: 10px;
      overflow-x: hidden; /* only hide horizontal scrollbar */
      overflow-y: auto;   /* enable vertical scrolling */
      text-align: center;
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

    /* Header */
    h1 {
      font-size: 32px;
      color: #333;
      margin-bottom: 10px;
      text-shadow: 2px 2px #ffe4e1;
    }

    .top-actions {
      margin-bottom: 20px;
    }

    /* Add Button */
    .btn-add {
      background-color: #ffb6c1;
      color: white;
      border: none;
      padding: 12px 24px;
      font-size: 16px;
      font-weight: bold;
      border-radius: 30px;
      cursor: pointer;
      transition: 0.3s ease-in-out;
      box-shadow: 0 4px 8px rgba(0,0,0,0.15);
    }
    .btn-add:hover {
      background-color: #ff69b4;
      transform: scale(1.08) rotate(-2deg);
      box-shadow: 0 6px 12px rgba(0,0,0,0.2);
    }
    .btn-add:active {
      transform: scale(0.95);
    }

    /* Table */
     table {
      margin: 0 auto;
      border-collapse: collapse;
      width: 80%;
      background-color: #fff0f5;
      border-radius: 0 0 15px 15px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0,0,0,0.12);
      animation: fadeIn 1s ease-in-out;
      z-index: 10;
      position: relative;
    }
    td {
      padding-top: 15px;
      padding-bottom: 15px;
      padding-right: 30px;
      padding-left: 60px;
      text-align: center;
    }
    tr:nth-child(even) {
      background-color: #ffe4e1;
    }
    tr {
      transition: 0.3s;
      animation: slideUp 0.8s ease forwards;
      opacity: 0;
    }
    tr:hover {
      background-color: #ffdab9;
      transform: scale(1.02);
    }

    /* Action Buttons */
    .actions {
      text-align: center;
      padding: 8px;
    }
    .btn {
      display: inline-block;
      padding: 6px 14px;
      margin: 2px;
      font-size: 14px;
      font-weight: 500;
      text-decoration: none;
      border-radius: 20px;
      transition: 0.2s ease-in-out;
    }
    .btn.update {
      background: #6c63ff;
      color: #fff;
    }
    .btn.update:hover {
      background: #574bff;
      transform: scale(1.05) rotate(-3deg);
    }
    .btn.delete {
      background: #ff6b6b;
      color: #fff;
    }
    .btn.delete:hover {
      background: #ff4c4c;
      transform: scale(1.05) rotate(3deg);
    }

    /* Animations */
    @keyframes fadeIn {
      from { opacity: 0; transform: scale(0.95); }
      to { opacity: 1; transform: scale(1); }
    }
    @keyframes slideUp {
      from { opacity: 0; transform: translateY(15px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* Pagination */
    .pagination {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 10px;
      margin: 25px 0;
      font-family: 'Comic Sans MS', cursive, sans-serif;
    }
    .pagination a,
    .pagination span {
      display: inline-block;
      padding: 8px 14px;
      background-color: #ffccd5;
      border-radius: 20px;
      color: #333;
      font-size: 14px;
      font-weight: bold;
      text-decoration: none;
      transition: 0.3s;
      box-shadow: 0 3px 6px rgba(0,0,0,0.1);
    }
    .pagination a:hover {
      background-color: #ff99ac;
      color: white;
      transform: translateY(-2px);
    }
    .pagination .current {
      background-color: #ff4da6;
      color: white;
    }
    .pagination a:first-child::before {
      content: "🐱 ";
    }
    .pagination a:last-child::after {
      content: " 🐾";
    }

    .search-container {
      margin: 20px auto 30px auto;
      width: 80%;
      position: relative;
    }
    .search-box {
      width: 50%;
      padding: 14px 18px 14px 50px; /* padding-left for icon */
      border: 2px solid #ffb6c1;
      border-radius: 30px;
      font-size: 16px;
      outline: none;
      background-color: #fff0f5;
      box-shadow: 0 4px 10px rgba(255, 182, 193, 0.4);
      transition: 0.3s;
    }
    .search-box:focus {
      border-color: #ff69b4;
      background-color: #ffe6f0;
      box-shadow: 0 6px 14px rgba(255, 105, 180, 0.5);
    }
    .search-icon {
      position: absolute;
      left: 18px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 20px;
      color: #ff69b4;
      pointer-events: none;
    }

      .table-header {
      display: grid;
      grid-template-columns: 1fr 2fr 2fr 3fr 2fr 2fr;
      background-color: #ffb6c1;
      color: white;
      font-weight: bold;
      padding-top: 10px;
      padding-bottom: 10px;
      
      width: 80%;
      margin: 0 auto;
      border-radius: 15px 15px 0 0;
      animation: slideUp 0.8s ease forwards;
      opacity: 0;
    }

    .id{
      padding-left: 55px;
    }
    .id1{
      padding-left: 55px;
    }

     .header-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: #ffb6c1;
      padding: 12px 20px;
      border-radius: 10px;
      margin-bottom: 20px;
      color: white;
      font-weight: bold;
      box-shadow: 0 4px 8px rgba(0,0,0,0.15);
    }
    .header-bar .welcome {
      font-size: 16px;
    }
    .header-bar a {
      color: white;
      text-decoration: none;
      background: #ff69b4;
      padding: 6px 12px;
      border-radius: 20px;
      transition: 0.3s;
    }
    .header-bar a:hover {
      background: #ff1493;
      transform: scale(1.05);
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

    <div class="header-bar">
    <div class="welcome">🐱 Welcome, <?= htmlspecialchars($_SESSION['username']); ?>!</div>
    <div><a href="<?= site_url('logout'); ?>">🚪 Logout</a></div>
  </div>

  <h1>🐾 Student Management 🐾</h1>

  <div class="top-actions">
    <a href="<?=site_url('create')?>">
      <button class="btn-add">🐱 + Add Student ✨</button>
    </a>
  </div>

  <div class="search-container">
    <input type="text" id="searchInput" class="search-box" placeholder="🔍 Search students...">
  </div>
  
  <div class="table-header">
    <div class="id1">Profile Pic 🐾</div>
    <div class="id">Id 🐱</div>
    <div class="id">First Name 😺</div>
    <div>Last Name 😸</div>
    <div>Email 😻</div>
    <div>Action 😹</div>
  </div>

  <table id="studentTable">
    <tbody>
    <?php 
      $catIcons = ["🐱","😺","😸","😹","😻","😽","🙀","😿","😾"];
      $i = 0;
      foreach($students as $students): 
    ?>
    <tr style="animation-delay: <?= $i * 0.2 ?>s;">
        
       <td>
        <?php if (!empty($students['profile_pic'])): ?>
          <img src="/upload/students/<?= $students['profile_pic'] ?>" 
              alt="Profile" width="60" height="60" style="border-radius:50%;">
        <?php else: ?>
          <img src="/upload/default.png" 
              alt="No Profile" width="60" height="60" style="border-radius:50%;">
        <?php endif; ?>
      </td> 
      <td><?=$students['id']; ?> <?= $catIcons[$i % count($catIcons)] ?></td>
      <td><?=$students['first_name']; ?></td>
      <td><?=$students['last_name']; ?></td>
      <td><?=$students['emails']; ?></td>
      <td class="actions">
        <a href="<?= site_url('/update/'.$students['id']); ?>" class="btn update">✏️ Update</a>
        <a href="<?= site_url('/delete/'.$students['id']); ?>" 
           class="btn delete"
           onclick="return confirm('Are you sure you want to delete this record?');">
           🗑️ Delete
        </a>
      </td>
    </tr>
    <?php $i++; endforeach; ?>
    </tbody>
  </table>

  <div class="pagination">
    <?= isset($pagination_links) ? $pagination_links : '' ?>
  </div>

   <script>
let typingTimer;
document.getElementById("searchInput").addEventListener("keyup", function() {
  clearTimeout(typingTimer);
  let keyword = this.value;

  typingTimer = setTimeout(() => {
    fetch("<?= site_url('students/search') ?>?keyword=" + keyword)
      .then(res => res.text())
      .then(data => {
        // Replace table body with DB results
        document.querySelector("#studentTable tbody").innerHTML = data;
      });
  }, 300); // debounce 300ms to avoid too many requests
});
</script>

</body>
</html>
