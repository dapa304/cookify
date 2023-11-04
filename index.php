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
  <title>Cookify - Share your ideas</title>
  <meta name="title" content="Cooky - Share your cooking ideas.">
  <meta name="description" content="Find your favorite cooking recipes. Or share your recipes, stories and ideas.">

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

          <h1 class="h1 hero-title">
            <strong class="strong">Find your favorite cooking recipes. </strong> Or share your recipes, stories and ideas.
          </h1>

<br>

        </div>
      </section>





      <!-- 
        - #FEATURED POST
      -->

      <section class="section featured" aria-label="featured post">
        <div class="container">

          <p class="section-subtitle">
            Start with <strong class="strong">most liked recipes</strong>
          </p>

          <ul class="has-scrollbar">

          <?php
require_once 'db.php';

    $sql = "SELECT * FROM recipes ORDER BY love DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

?>

            <li class="scrollbar-item">
              <div class="blog-card">

                <figure class="card-banner img-holder" style="--width: 500; --height: 600;">
                  <img src="<?php echo $row["image"] ?>" width="500" height="600" loading="lazy"
                    alt="<?php echo $row["title"] ?>" class="img-cover">

                </figure>

                <div class="card-content">


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
    echo "No recipes found.";
}

?>            

          </ul>

        </div>
      </section>






<!-- Recommended -->
<section class="section recommended" aria-label="recommended post">
        <div class="container">

          <p class="section-subtitle">
            <strong class="strong">Or searching recommended recipes</strong>
          </p>

          <ul class="grid-list">

          <li>

<?php
require_once 'db.php';

$sql = "SELECT * FROM recipes LIMIT 6";
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
echo "No recipes found.";
}

$conn->close();
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