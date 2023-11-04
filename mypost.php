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
  <title>Cookify - My Post</title>
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
            <strong class="strong">My Posted Recipes</strong>
          </h1>
        </div>
        <?php
    if (isset($_GET["success"])) {
        echo "<h2 style='color: green;'>Post deleted successfully!</h3>";
    }
    
    if (isset($_GET["posted"])) {
        echo "<h2 style='color: green;'>Post added successfully!</h3>";
    }
    ?>
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

    // Query the recipes posted by the logged-in user
    $sql = "SELECT * FROM recipes WHERE user_id = $user_id ORDER BY created_at DESC";
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
<br>
<b>
    <a href="edit_post.php?post_id=<?php echo $row["id"] ?>">Edit</a>
    <a href="delete_post.php?post_id=<?php echo $row["id"] ?>">Delete</a>
</b>
<br>
  </div>
</li>

<?php
        }
    } else {
        echo "You haven't posted any recipes yet.";
    }
?>

</ul>

        </div>
      </section>

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