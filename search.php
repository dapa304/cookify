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
  <title>Cookify - Search Results</title>
  <meta name="title" content="Blogy - Hey, we’re Blogy. See our thoughts, stories and ideas.">
  <meta name="description" content="This is a blog html template made by codewithsadee">

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
            <strong class="strong">Search for recipes. </strong>
          </h1>

          <div class="wrapper">

          <form action="search.php" method="GET" class="newsletter-form">
              <input type="text" name="keyword" placeholder="Type something..." class="email-field" autocomplete="off">

              <button type="submit" class="btn">Search</button>
            </form>

            <p class="newsletter-text">
              Start searching for wished menu recipes or dishes with uncomparable taste right now.
            </p>

          </div>

        </div>
      </section>

      <!-- 
        - #RECENT POST
      -->

      <section class="section recent" aria-label="recent post">
        <div class="container">

          <div class="title-wrapper">

            <h2 class="h2 section-title">
              <strong class="strong">Search result:</strong>
            </h2>



          </div>

          <ul class="grid-list">

            <li>

<?php
require_once 'db.php';

if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];

    // Prepare and execute a search query
    $sql = "SELECT * FROM recipes WHERE title LIKE ?";
    $stmt = $conn->prepare($sql);
    $searchTerm = '%' . $keyword . '%';
    $stmt->bind_param("s", $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
?>




              <div class="blog-card">

                <figure class="card-banner img-holder" style="--width: 550; --height: 660;">
                  <img src="<?php echo $row["image"] ?>" width="550" height="660" loading="lazy"
                    alt="<?php echo $row["title"] ?>" class="img-cover">

                  
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
        echo "<p>No recipes found matching the search term.</p>";
    }

    $stmt->close();
}

$conn->close();
?>

          </ul>


        </div>
      </section>
<br>

      <!-- 
        - #NEWSLETTER
      -->

      <section class="section newsletter">

        <h2 class="h2 section-title">
          Subscribe to <strong class="strong">new posts</strong>
        </h2>

        <form action="" class="newsletter-form">
          <input type="email" name="email_address" placeholder="Your email address" required class="email-field">

          <button type="submit" class="btn">Subscribe</button>
        </form>

      </section>

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