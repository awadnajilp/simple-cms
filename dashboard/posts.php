<?php include('header.php'); ?>
<?php 
$post_type = $_GET['post_type'];
$draft =0;
if (isset($_GET['draft'])) {
	$draft = 1;
}
$query = mysql_query("select * from posts where post_type='$post_type' and draft=$draft");
$count = mysql_num_rows($query);
?>

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">All <?php echo $_GET['post_type'];?></a>
					</li>
				</ul>
			</div>
<?php if (isset($_GET['deleted'])) {?>
				<div class="alert alert-error">
							<button type="button" class="close" data-dismiss="alert">×</button>
							 Deleted Succesfully.
						</div>
			<?php }?>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-picture"></i>All <?php echo $_GET['post_type'];?></h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
					<div style="margin-bottom:17px;"><a class="btn btn-primary" href="post-new.php?post_type=<?php echo $post_type;?>">
										<i class=" icon-star icon-white"></i>  
										Create new <?php echo $post_type;?>                                         
									</a></div>
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Title</th>
								  <th>Date posted</th>
								  <th>Category</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						<?php if($count > 0): while($post = mysql_fetch_object($query)):?>
							<tr>
								<td><?php echo $post->title;?></td>
								<td><?php echo $post->date;?></td>
								<td><?php if($post->post_cat != ''):$sql = mysql_query("select * from category where cat_id=".$post->post_cat); 
								if(mysql_num_rows($sql) > 0):
								$category = mysql_fetch_object($sql);
								echo $category->title; else: echo "No Category"; endif; else: echo "No Category"; endif; ?></td>
								<td class="center">
									
									<a class="btn btn-info" href="post-edit.php?post_type=<?php echo $post_type?>&id=<?php echo $post->id;?>">
										<i class="icon-edit icon-white"></i>  
										Edit                                            
									</a>
									<a class="btn btn-danger" onclick="return confirm('Are you sure?');" href="delete.php?post_type=<?php echo $post_type?>&id=<?php echo $post->id;?>">
										<i class="icon-trash icon-white"></i> 
										Delete
									</a>
								</td>
							</tr>
						<?php endwhile;endif;?>
						</tbody>
						</table>
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

    
<?php include('footer.php'); ?>
