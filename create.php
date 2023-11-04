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
  <title>Cookify - Create</title>

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
            <strong class="strong">Post Recipes</strong>
          </h1>

          <div class="wrapper">

          <form action="post_recipes.php" method="post" class="newsletter-form" enctype="multipart/form-data">

        <label for="title">Recipe Title:</label>
        <input type="text" name="title" class="email-field" required><br><br>
        
        <label for="recipe">Short Desciption:</label>
        <textarea name="description" rows="30" class="textarea-create" required></textarea><br><br>

        <label for="recipe">Recipe:</label>
        <textarea name="recipe" rows="30" class="textarea-create" required></textarea><br><br>

        <label for="recipe_image">Recipe Image:</label>
        <input type="file" name="image" accept="image/*" class="email-field" required><br><br>

              <button type="submit" class="buttons buttonsave">Post</button>
            </form>


          </div>

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