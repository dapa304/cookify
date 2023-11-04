<header class="header section" data-header>
    <div class="container">

      <a href="index.php" class="logo">
        <img src="assets/images/favicon.png" width="60" height="40" alt="Blogy logo">
      </a>

      <?php
      session_start();

      if (isset($_SESSION["username"])) {
      ?>

<nav class="navbar" data-navbar>
        <ul class="navbar-list">

          <li class="navbar-item">
            <a href="index.php" class="navbar-link hover:underline" data-nav-link>Home</a>
          </li>

          <li class="navbar-item">
            <a href="discover.php" class="navbar-link hover:underline" data-nav-link>Discover</a>
          </li>

          <li class="navbar-item">
            <a href="create.php" class="navbar-link hover:underline" data-nav-link>Create</a>
          </li>

          <li class="navbar-item">
            <a href="account.php" class="navbar-link hover:underline" data-nav-link>Account</a>
          </li>

        </ul>
      </nav>

      <?php } else { ?>

      <nav class="navbar" data-navbar>
        <ul class="navbar-list">

          <li class="navbar-item">
            <a href="index.php" class="navbar-link hover:underline" data-nav-link>Home</a>
          </li>

          <li class="navbar-item">
            <a href="discover.php" class="navbar-link hover:underline" data-nav-link>Discover</a>
          </li>

          <li class="navbar-item">
            <a href="about.php" class="navbar-link hover:underline" data-nav-link>About</a>
          </li>

        </ul>
      </nav>

      <?php } ?>

      <div class="wrapper">

        <button class="search-btn" aria-label="search" data-search-toggler>
          <ion-icon name="search-outline" aria-hidden="true"></ion-icon>

          <span class="span">Search</span>
        </button>

        <button class="nav-toggle-btn" aria-label="toggle menu" data-nav-toggler>
          <span class="span one"></span>
          <span class="span two"></span>
          <span class="span three"></span>
        </button>

        <?php

      if (isset($_SESSION["username"])) {
      ?>

        <a href="logout.php" class="btn">Logout</a>

        <?php } else { ?>

        <a href="login/" class="btn">Login</a>

        <?php } ?>


      </div>

    </div>
  </header>

    <!-- 
    - #SEARCH BAR
  -->

  <div class="search-bar" data-search-bar>

    <div class="input-wrapper">
    <form action="search.php" method="GET">
      <input type="search" name="keyword" placeholder="Search" class="input-field" autocomplete="off" required>

      <button type="submit" class="search-close-btn" aria-label="close search bar">
        <ion-icon name="search-outline" aria-hidden="true"></ion-icon>
      </button>
      </form>

    </div>

    <p class="search-bar-text">Please enter at least 3 characters</p>

  </div>

  <div class="overlay" data-overlay data-search-toggler></div>
