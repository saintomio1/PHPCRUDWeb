<?php
/*
<header>
    <a class="logo" href="<?php echo BASE_URL . '/index.php'; ?>">
    <h1 class="logo-text"><span>FC</span>Conceptz</h1>
    </a>
    <i class="fa fa-bars menu-toggle"></i>
    <ul class="nav">
  
      <?php if (isset($_SESSION['username'])): ?>
          
        <li>

          <a href="#">
            <i class="fa fa-user"></i>
            <?php echo $_SESSION['username']; ?>
            <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
          </a>
  <ul>
		<li><a href="<?php echo BASE_URL . '/logout.php'; ?>" class="logout">logout</a></li>
	</ul>
    </li>
<?php endif; ?>
    </ul>
  </header>
*/ 
?>
  <header class="clearfix">
    <div class="logo">
    <a class="logo" href="<?php echo BASE_URL . '/index.php'; ?>">
    <h1 class="logo-text"><span>FC</span>Conceptz</h1>
    </a>
    </div>

    <div class="fa fa-reorder menu-toggle"></div>
    <nav>

      <?php if (isset($_SESSION['username'])): ?>
      <ul>

        
        <li><a href="#">Home</a></li>
        <li>
          <a href="#" class="userinfo">
            <i class="fa fa-user"></i>
           <?php echo $_SESSION['username']; ?>
            <i class="fa fa-chevron-down"></i>
          </a>
          <ul class="dropdown">
            <li><a href="#">Dashboard</a></li>
            <li><a href="<?php echo BASE_URL . '/logout.php'; ?>" class="logout">logout</a></li>
          </ul>
        </li>
        <?php endif; ?>
      </ul>
    </nav>
  </header>
