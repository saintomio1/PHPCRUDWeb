<?php if (count($errors) > 0) : ?>
  <div class="msg errors" >
  	<?php foreach ($errors as $error) : ?>
  	  <li><?php echo $error; ?></li>
        <?php endforeach; ?>
  </div>
        <?php endif; ?>


        <?php /*
        
        if (count($errors) > 0) : ?>
  <div class="message error validation_errors" >
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php endif 
*/?>
