<?php include("../../path.php"); ?>
<?php include(ROOT_PATH . '/app/controllers/topics.php'); 
adminOnly();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

  <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">

  <!-- Custom Styles -->
  <link rel="stylesheet" href="../../assets/css/style.css">

  <!-- Admin Styling -->
  <link rel="stylesheet" href="../../assets/css/admin.css">

  <title>Admin Section - Manage Topic</title>
</head>

<body>
<?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>
  
  <div class="admin-wrapper clearfix">
    
<?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>
    
    <!-- Admin Content -->
        <div class="admin-content clearfix">
      <div class="button-group">
        <a href="create.php" class="btn btn-sm">Add Topic</a>
        <a href="index.php" class="btn btn-sm">Manage Topics</a>
      </div>

      <div class="content">
      
        <h2 class="page-title" style="text-align: center;">Manage Topics</h2>

        
        <!-- Display notification message -->
			<?php include(ROOT_PATH . '/app/includes/messages.php'); ?>

			<?php if (empty($topics)): ?>
				<h1>No topics in the database.</h1>
			<?php else: ?>
				<table class="table">
					<thead>
						<th>SN</th>
						<th>Topic Name</th>
						<th colspan="2">Action</th>
					</thead>
			  <tbody>
          <?php foreach ($topics as $key => $topic): ?>
						<tr>
							<td><?php echo $key + 1; ?></td>
							<td><?php echo $topic['name']; ?></td>
							<td>
								<a class="edit"
									href="edit.php?id=<?php echo $topic['id'] ?>">edit
								</a>
							</td>
							<td>
								<a class="delete"								
									href="index.php?del_id=<?php echo $topic['id'] ?>">delete
								</a>
							</td>
						</tr>
					<?php endforeach ?>
					</tbody>
				</table>
			<?php endif ?>
          </tbody>
        </table>

      </div>
    </div>
    <!-- // Admin Content -->

  </div>


  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- CKEditor 5 -->
  <script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>

  <!-- Custome Scripts -->
  <script src="../../assets/js/scripts.js"></script>

</body>

</html>
