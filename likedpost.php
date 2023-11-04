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
  <title>Cookify - Liked Post</title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">

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
        <div class="tombol"> 
          <a  href="account.php"><-- back</a>
        </div>
          <h1 class="h1 hero-title">
            <strong class="strong">Liked Post</strong>
          </h1>

        </div>
      </section>


<!-- Recommended -->
<section class="section recommended" aria-label="recommended post">
        <div class="container">

<br>

          <ul class="grid-list">

          <li>

          <?php


// Check if the user is logged in
if (!isset($_SESSION["id"])) {
    header("Location: login.php"); // Redirect to the login page if not logged in
    exit();
}

require_once 'db.php';
?>

          <?php
    $user_id = $_SESSION["id"];

    // Query the liked recipes for the logged-in user
    $sql = "SELECT recipes.* FROM recipes
            INNER JOIN likes ON recipes.id = likes.recipe_id
            WHERE likes.user_id = $user_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
?>


  <div class="blog-card">

    <figure class="card-banner img-holder" style="--width: 550; --height: 660;">
      <img src="<?php echo $row["image"] ?>" width="550" height="660" loading="lazy"
        alt=" <?php echo $row["title"] ?>" class="img-cover">


    </figure>

    <div class="card-content">
<br>
      <h3 class="h4">
        <a href="detail.php?id=<?php echo $row["id"] ?>" class="card-title hover:underline">
        <?php echo $row["title"] ?>
        </a>
      </h3>

      <p class="card-text">
      <?php echo $row["description"] ?>
      </p>

    </div>

  </div>
</li>

<?php
}
} else {
    echo "<h1>You haven't liked any posts yet.</h1>";
}
?>

</ul>

        </div>
      </section>
<br>
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