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
  <title>Cookify - User Profile</title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="assets/css/detail.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&display=swap" rel="stylesheet">

</head>

<body>

<?php include_once 'header.php'; ?>


  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="section hero" aria-label="home">
        <div class="container">
          <div class="section__hero">
              <div class="hero"></div>
              <h1 class="h1 hero-title">
                <strong class="strong">User Profile</strong>
              </h1>
          </div>        
        </div>

        <!-- Recipes -->

        <?php

require_once 'db.php';

// Check if the user ID is provided via a GET parameter
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // Query the user's account information
    $userSql = "SELECT * FROM users WHERE id = $user_id";
    $userResult = $conn->query($userSql);

    if ($userResult->num_rows == 1) {
        $userRow = $userResult->fetch_assoc();
    } else {
        echo "User not found or you don't have permission to view this account.";
        exit();
    }

    // Query the follower count
    $followerCountSql = "SELECT COUNT(id) AS count FROM follows WHERE followed_id = $user_id";
    $followerCountResult = $conn->query($followerCountSql);
    $followerCount = $followerCountResult->fetch_assoc()['count'];
} else {
    echo "User ID not provided.";
    exit();
}

    // Query the user's posts
    $postsSql = "SELECT * FROM recipes WHERE user_id = $user_id";
    $postsResult = $conn->query($postsSql);


?>







      <section class="section__details">
        <div class="wrapper">
          <div class="recipes">

<div class="recipes__like flexy">
              <form method="post" action="follow.php">
              <input type="hidden" name="follow_user_id" value="<?php echo $user_id ?>">
              <input type="submit" name="follow" value="Follow ❤️" class="inputlike">
              </form>
              <h1 class="likecount"><?php echo $followerCount; ?></h1>
</div>
<br>

              <div class="recipes__account">

              <div class="profile">
                  <img src="login/<?php echo $userRow["profile_image"] ?>" alt="" width="50px" class="recipes__profile">
                  <h3 style="margin-left: 10px;"><?php echo $userRow["username"] ?></h3>
                </div>
                
                <br>
<hr>
                <div class="recipes__description">
                  <p><?php echo $userRow["bio"] ?></p>
                </div>
              </div>


                

    </article>
  </main><br><br>



<!-- Recommended -->
<section class="section recommended" aria-label="recommended post">
        <div class="container">

          <p class="section-subtitle">
            <strong class="strong">Recipes posted by <?php echo $userRow["username"] ?></strong>
          </p>
<br>
          <ul class="grid-list">

          <li>

          <?php
    if ($postsResult->num_rows > 0) {
        while ($postRow = $postsResult->fetch_assoc()) {
?>


  <div class="blog-card">

    <figure class="card-banner img-holder" style="--width: 550; --height: 660;">
      <img src="<?php echo $postRow["image"] ?>" width="550" height="660" loading="lazy"
        alt=" <?php echo $postRow["title"] ?>" class="img-cover">


    </figure>

    <div class="card-content">
<br>
      <h3 class="h4">
        <a href="detail.php?id=<?php echo $postRow["id"] ?>" class="card-title hover:underline">
        <?php echo $postRow["title"] ?>
        </a>
      </h3>

      <p class="card-text">
      <?php echo $postRow["description"] ?>
      </p>


    </div>

  </div>
</li>

<?php
        }
    } else {
        echo "No posts found for this user.";
    }
    ?>

</ul>

        </div>
      </section>

<?php include_once 'footer.php'; ?>

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