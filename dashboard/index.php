<?php include('header.php'); ?>


			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Dashboard</a>
					</li>
				</ul>
			</div>

			<div class="sortable row-fluid">
				<a data-rel="tooltip" title="All Pages." class="well span3 top-block" href="pages.php">
					<span class="icon32 icon-red icon-book"></span>
					<div>Total Pages</div>
					<div><?php echo  execute_scalar("select count(*) from pages");?></div>
					
				</a>

				<a data-rel="tooltip" title="Job Vacancies." class="well span3 top-block" href="posts.php?post_type=career">
					<span class="icon32 icon-color icon-star-on"></span>
					<div>Career Openings</div>
					<div><?php echo execute_scalar("select count(*) from posts where post_type='career'"); ;?></div>
					
				</a>

				<a data-rel="tooltip" title="Market Projects." class="well span3 top-block" href="#">
					<span class="icon32 icon-color icon-flag"></span>
					<div>Projects</div>
					<div><?php echo execute_scalar("select count(*) from posts where post_type='project'"); ;?></div>
					
				</a>
				
				<a data-rel="tooltip" title="Settings" class="well span3 top-block" href="settings.php">
					<span class="icon32 icon-color icon-gear"></span>
					<div>General</div>
					<div>Settings</div>
					
				</a>
			</div>
			
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2><i class="icon-info-sign"></i> Introduction</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<h1>Hi, Welcome<small>  This is CMS Dashboard of bg&e.</small></h1>
						<p>Here you can manage all the contents of the site,create new pages,add job vacancies,post projects etc.</p>
						
						<p class="center">
							<a href="#" class="btn btn-large btn-primary"><i class="icon-chevron-left icon-white"></i> Back to site</a> 
							
						</p>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
					
			
				  

		  
       
<?php include('footer.php'); ?>
