<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/images/favicon.png" rel="icon">

  <!-- 
    - primary meta tags
  -->
  <title>Cookify - Settings</title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="./assets/css/account.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&display=swap" rel="stylesheet">

</head>

<body>


<?php include_once 'header.php'; ?>

<?php

// Check if the user is logged in
if (!isset($_SESSION["id"])) {
    header("Location: login.php"); // Redirect to the login page if not logged in
    exit();
}

require_once 'db.php';

$user_id = $_SESSION["id"];

// Query the user's settings from the database
$sql = "SELECT * FROM users WHERE id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
?>

  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="section hero" aria-label="home">
        <div class="container">
        <div class="tombol"> 
          <a  href="account.php"><-- back</a>
        </div>
          <h1 class="h1 hero-title">
            <strong class="strong">Settings </strong>
          </h1>

          <?php
    if (isset($_GET["success"])) {
        echo "<h2 style='color: green;'>Settings updated successfully!</h3>";
    }
    ?>
    <br>

          <div class="wrapper">

          <form action="login/update_settings.php" method="post" enctype="multipart/form-data" class="newsletter-form">

        <label for="username">Username:</label>
        <input type="text" value="<?php echo $row['username']; ?>" name="new_username" class="email-field" autocomplete="off"><br><br>
        
        <label for="password">New Password:</label>
        <input type="password" name="new_password" class="email-field"><br><br>

        <label for="confirm_password">Confirm New Password:</label>
        <input type="password" name="confirm_new_password" class="email-field"><br><br>

        <label for="recipe">Edit Bio:</label>
        <textarea name="bio" rows="30" class="textarea-create"><?php echo $row['bio']; ?></textarea><br><br>

        <label for="profile_image">Old Profile Image:</label>
        <img src="login/<?php echo $row['profile_image']; ?>" width="100" alt="" style="border-radius: 25px;"><br><br>

        <label for="profile_image">New Profile Image:</label>
        <input type="file" name="new_profile_image" accept="image/*" class="email-field"><br><br>

              <button type="submit" class="buttons buttonsave">Save</button>
            </form>


          </div>

        </div>
      </section>

<?php
} else {
  echo "User not found or you don't have permission to view settings.";
  exit();
}
?>

      <?php include_once 'newsletter.php'; ?>

    </article>
  </main>

<?php require_once 'footer.php'; ?>

  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js" defer></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>