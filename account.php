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
  <title>Cookify - Account</title>

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



  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="section hero" aria-label="home">
        <div class="container">

          <h1 class="h1 hero-title">
            <strong class="strong">My Account</strong>
          </h1>

          <div class="wrapper">

          <div class="cards-list">
  
  <a href="mypost.php">
  <div class="card 1">
    <div class="card_image"> <img src="assets/images/back.png" /> </div>
    <div class="card_title title-white">
    <center><ion-icon name="image-outline"></ion-icon></center> <p>My Post</p>
    </div>
  </div>
  </a>
  
    <a href="likedpost.php">
    <div class="card 2">
    <div class="card_image">
      <img src="assets/images/back.png" />
      </div>
    <div class="card_title title-white">
    <center><ion-icon name="heart-outline"></ion-icon></center> <p>Liked Post</p>
    </div>
  </div>
  </a>
  
  <a href="settings.php">
  <div class="card 3">
    <div class="card_image">
      <img src="assets/images/back.png" />
    </div>
    <div class="card_title title-white">
    <center><ion-icon name="settings-outline"></ion-icon></center> <p>Settings</p>
    </div>
  </div>
  </a>

  <a href="logout.php">
    <div class="card 4">
    <div class="card_image">
      <img src="assets/images/back.png" />
      </div>
    <div class="card_title title-white">
    <center><ion-icon name="log-out-outline"></ion-icon></center> <p>Logout</p>
    </div>
    </div>
    </a>
  
  </div>

          </div>

        </div>
      </section>
      

<?php require_once 'newsletter.php'; ?>

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