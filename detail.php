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
  <title>Cookify - Recipe</title>

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
              <div class="tombol"> 
                <a  href="index.php"><-- back</a>
              </div>
              <h1 class="h1 hero-title">
                <strong class="strong">Recipes</strong>
              </h1>
          </div>        
        </div>

        <!-- Recipes -->

        <?php

require_once 'db.php';

    if (isset($_GET['id'])) {
        $recipe_id = $_GET['id'];
        $sql = "SELECT recipes.*, users.username, users.profile_image FROM recipes
        INNER JOIN users ON recipes.user_id = users.id
        WHERE recipes.id = $recipe_id";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
?>
<img src="<?php echo $row["image"] ?>" alt="<?php echo $row["title"] ?>" width="700px" class="detail__image">

<div class="kotak">
    <section class="section__details">
        <div class="wrapper">
            
          <div class="recipes">
              <span><strong><?php echo $row["title"] ?></strong></span>

<div class="recipes__like flexy">
              <form method="post" action="like.php">
              <input type="hidden" name="recipe_id" value="<?php echo $row["id"] ?>">
              <input type="submit" name="like" value="Like 👍" class="inputlike">
              </form>
              <h1 class="likecount"><?php echo $row["love"] ?></h1>
</div>
<br>

              <div class="recipes__account">
              <a href="user.php?user_id=<?php echo $row["user_id"] ?>">
              <div class="profile">
                  <img src="login/<?php echo $row["profile_image"] ?>" alt="" width="50px" class="recipes__profile">
                  <h3 style="margin-left: 10px;"><?php echo $row["username"] ?></h3>
                </div>
                </a>
                <br>
<hr>
                <div class="recipes__description">
                  <p><?php echo $row["description"] ?></p>
                </div>
              </div>


                <div class="recipes__detail">
                  <p>Bahan Bahan</p>
<blockquote><?php echo nl2br($row["recipe"]) ?></blockquote>
<br>
<h5>Posted at: <?php echo $row["created_at"] ?></h5>
                </div>
          </div>
        </div>
        
        <?php
        } else {
            echo "Recipe not found.";
        }
    } else {
        echo "Recipe ID not provided.";
    }


    ?>

    </article>


<!-- COMMENT SECTION -->
<section>
        <div class="comment-form">
          <h2>Comment</h2>
          <form method="post" action="add_comment.php">
              <input type="hidden" name="post_id" value="<?php echo $recipe_id; ?>">
              <textarea id="comment" name="comment" placeholder="Write something.." style="height:100px" required></textarea>
              <input type="submit" value="Add Comment">
          </form>
      </div>
   



      </section>


    <style>
body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .comment-form {
            float: inline;
            max-width: 800px;
            margin: 100px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
           
        }

        h2 {
            text-align: center;
            color: #333333;
        }

        .comment-form input[type="text"],
        .comment-form textarea {
            width: calc(100% - 5px);
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: none;
        }

        .comment-form textarea {
            height: 100px;
        }

        .comment-form input[type="submit"] {
            width: 24%;
            display: inline;
            background-color: #020202;
            color: rgb(244, 239, 239);
            padding: 12px 20px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-size: 16px;
        }

        .comment-form input[type="submit"]:hover {
            background-color: #5c59f8;
        }
        
        .comment-form img {
          width: 30px;
        }

        .results textarea:focus {
          border: none;
          outline: none;
        }

        
    </style>  

  <title></title>
    <?php


require_once 'db.php';

// Get the post ID from the URL
if (isset($_GET['id'])) {
    $post_id = $_GET['id'];

    // Query the database to retrieve the post and its comments
    $postSql = "SELECT * FROM recipes WHERE id = $post_id";
    $postResult = $conn->query($postSql);

    if ($postResult->num_rows == 1) {
        $postRow = $postResult->fetch_assoc();
    } else {
        echo "Post not found.";
        exit();
    }

    // Query comments for the post
    $commentsSql = "SELECT c.id, c.comment, c.created_at, u.id AS commenter_id, u.username AS commenter_username, u.profile_image AS commenter_image
    FROM comments c
    JOIN users u ON c.user_id = u.id
    WHERE c.post_id = $post_id
    ORDER BY c.created_at ASC";
    $commentsResult = $conn->query($commentsSql);
} else {
    echo "Post ID not provided.";
    exit();
}
?>

<?php
    if ($commentsResult->num_rows > 0) {
        while ($commentRow = $commentsResult->fetch_assoc()) {
          ?>

		<ul id="comments-list" class="comments-list">
			<li>
				<div class="comment-main-level">
					<!-- AVATAR -->
					<div class="comment-avatar"><img src="login/<?php echo $commentRow['commenter_image'] ?>" alt=""></div>
					<!-- CONTENT -->
					<div class="comment-box">
						<div class="comment-head">
							<h6 class="comment-name"><a href="user.php?user_id=<?php echo $commentRow['commenter_id'] ?>"><?php echo $commentRow['commenter_username'] ?></a></h6>
							<span><?php echo $commentRow['created_at'] ?>&nbsp;</span>
<?php if ($_SESSION["id"] == $commentRow['commenter_id']) { ?>
              <form method="post" action="delete_comment.php">
                <input type="hidden" name="comment_id" value="<?php echo $commentRow['id'] ?>">
                <button type="submit" class="delcom">delete</button>
                </form>
                <?php } ?>

							<i class="fa fa-reply"></i>
							<i class="fa fa-heart"></i>
						</div>
						<div class="comment-content">
							<?php echo $commentRow['comment'] ?>
						</div>



					</div> 
				</div>


<?php }     } else {
        echo "No comments yet.";
    }  ?>

	</div>
    
  </main><br><br><br><br>



<!-- Recommended -->
<section class="section recommended" aria-label="recommended post">
        <div class="container">

          <p class="section-subtitle">
            <strong class="strong">Recommended</strong>
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

        <!-- COMMENT HERE -->


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