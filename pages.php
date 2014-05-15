<?php include('header.php'); ?><?php 
$page_type = 'page';
$draft =0;
if (isset($_GET['draft'])) {
	$draft = 1;
}
$query = mysql_query("select * from pages ");
$count = mysql_num_rows($query);

if (isset($_GET['id'])) {
  	mysql_query("delete from pages where id=".$_GET['id']);
  	header("location:pages.php?del");
}
?>

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Pages</a>
					</li>
				</ul>
			</div>
<?php if (isset($_GET['deleted'])) {?>
				<div class="alert alert-error">
							<button type="button" class="close" data-dismiss="alert">×</button>
							Page Deleted Succesfully.
						</div>
			<?php }?>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-picture"></i>All Pages</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<div style="margin-bottom:17px;"><a class="btn btn-primary" href="page-new.php?page_type=<?php echo $page_type;?>">
										<i class=" icon-star icon-white"></i>  
										Create new <?php echo $page_type;?>                                         
									</a></div>
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Title</th>
								  <th>Date</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						<?php if($count > 0): while($page = mysql_fetch_object($query)):?>
							<tr>
								<td><?php echo $page->title;?></td>
								<td><?php echo $page->date;?></td>
								<td class="center">
								
									<a class="btn btn-info" href="page-edit.php?id=<?php echo $page->id;?>">
										<i class="icon-edit icon-white"></i>  
										Edit                                            
									</a>
									<a class="btn btn-danger" onclick="return confirm('Are you sure ?');" href="delete.php?post_type=page&id=<?php echo $page->id;?>">
										<i class="icon-trash icon-white"></i> 
										Delete
									</a>
								</td>
							</tr>
						<?php endwhile;endif;?>
						</tbody>
						</table>
					</div>
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

    
<?php include('footer.php'); ?>
