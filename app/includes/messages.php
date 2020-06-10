<?php 

if (isset($_SESSION['message'])): ?>
      <div class="msg <?php echo $_SESSION['type']; ?> ">
      	<li><?php echo $_SESSION['message']; ?></li>
      <?php 
      unset($_SESSION['message']);
      unset($_SESSION['type']);
      ?>
      </div>
<?php endif; ?>


<?php /*
 if (isset($_SESSION['message'])) : ?>
      <div class="message" >
      	<p>
          <?php 
          	echo $_SESSION['message']; 
          	unset($_SESSION['message']);
          ?>
      	</p>
      </div>
<?php endif 
*/ ?>
