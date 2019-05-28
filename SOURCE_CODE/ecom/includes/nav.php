<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light bg-transparent">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <?php if(!isset($_SESSION['userinfo']['id'])): ?>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Sign In</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>
      <?php endif; ?>
      <?php if(isset($_SESSION['userinfo']['id'])): ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Control Panel
        </a>
        <?php if(isset($_SESSION['userinfo']['level']) && $_SESSION['userinfo']['level'] == 0 ): ?>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="admin/index.php">Gestion des produits</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">Sign out</a>
        </div>
        <?php else: ?>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="logout.php">Sign out</a>
        </div>
        <?php endif; ?>
      </li>
      <?php endif; ?>
    </ul>
  </div>
</nav>
</div>