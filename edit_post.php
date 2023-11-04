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
  <title>Cookify - Edit Post</title>
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

<?php

// Check if the user is logged in
if (!isset($_SESSION["id"])) {
    header("Location: login.php"); // Redirect to the login page if not logged in
    exit();
}

require_once 'db.php';

// Check if the post ID is provided via a GET parameter
if (isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];

    // Query the database to retrieve the post data
    $user_id = $_SESSION["id"];
    $sql = "SELECT * FROM recipes WHERE id = $post_id AND user_id = $user_id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "Post not found or you don't have permission to edit it.";
        exit();
    }
} else {
    echo "Post ID not provided.";
    exit();
}

// Handle form submission to update the post
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $newTitle = $_POST['title'];
    $newDescription = $_POST['description'];
    $newRecipe = $_POST['recipe'];

    // Update the post in the database
    $updateSql = "UPDATE recipes SET title = ?, description = ?, recipe = ? WHERE id = ? AND user_id = ?";
    $stmt = $conn->prepare($updateSql);
    $stmt->bind_param("sssii", $newTitle, $newDescription, $newRecipe, $post_id, $user_id);

    if ($stmt->execute()) {
        header("Location: edit_post.php?post_id=$post_id&success=1"); 
    } else {
        echo "Error updating post: " . $stmt->error;
    }

    $stmt->close();
}
?>

  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="section hero" aria-label="home">
        <div class="container">

          <h1 class="h1 hero-title">
            <strong class="strong">Edit Recipes</strong>
          </h1>
          <?php
    if (isset($_GET["success"])) {
        echo "<h2 style='color: green;'>Post edited successfully!</h3>";
    }
    ?><br>
          <div class="wrapper">

          <form action="" method="post" class="newsletter-form" enctype="multipart/form-data">

        <label for="title">Recipe Title:</label>
        <input type="text" name="title" class="email-field" value="<?php echo $row['title']; ?>" required><br><br>
        
        <label for="recipe">Short Desciption:</label>
        <textarea name="description" rows="30" class="textarea-create" required><?php echo $row['description']; ?></textarea><br><br>

        <label for="recipe">Recipe:</label>
        <textarea name="recipe" rows="30" class="textarea-create" required><?php echo $row['recipe']; ?></textarea><br><br>

        <label for="recipe_image">Recipe Image (unchangeable):</label>
<img src="<?php echo $row['image']; ?>" alt="Gambar <?php echo $row['title']; ?>" style="border-radius: 25px;">

<br><br>
              <button type="submit" class="buttons buttonsave">Post</button>
            </form>


          </div>

        </div>
      </section>

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