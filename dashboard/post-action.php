<?php  require_once('../Connections/db_connect.php'); 
$upload_flag = 0;?>
<?php if (isset($_POST['submit_form'])) {
	$post_type = $_POST['post_type'];
	$title = GetSQLValueString($_POST['title'],'text');
	$content = GetSQLValueString($_POST['content'],'text');
	$category = $_POST['category'];
	$date = date('Y-m-d');
	$is_sub = 0;
	if (isset($_POST['sub_category']) ) {
		if ($_POST['sub_category'] != '' ) {
		 $category = $_POST['sub_category'];
		 $is_sub = 1;
		}
		
	}
	$ft_fileName='';
	if (!empty($_FILES['ft_img']['tmp_name']) && isset($_FILES['ft_img'])) {
		$ft_tempFile = $_FILES['ft_img']['tmp_name'];
		$ft_fileName = rand(1000,5000).$_FILES['ft_img']['name'];
		copy($ft_tempFile, "uploads/ft_images/".$ft_fileName);
	}
	$sql = "INSERT INTO `posts` (`title`, `content`, `date`, `post_cat`, `post_type`, `draft`,`is_sub_cat`,`featured_img`) VALUES ($title, $content, '$date', '$category', '$post_type', '0','$is_sub','$ft_fileName');";
	mysql_query($sql);
	$post_id = mysql_insert_id();
	    if(isset($_REQUEST['AddFiles'])){
			$targetFolder = 'uploads'; //Path to the Uploads Folder 
				if (isset($_FILES['upload_file']) && count($_FILES['upload_file']['error']) == 1 && $_FILES['upload_file']['error'][0] > 0 ) {
					$upload_flag = 1;
				}else{
					for($i=0;$i<count($_FILES['upload_file']['name']);$i++){
						  $tempFile = $_FILES['upload_file']['tmp_name'][$i];
					      $fileName = rand(1000,5000).$_FILES['upload_file']['name'][$i];
					      $targetFile = rtrim($targetFolder,'/') . '/' .$fileName;
					      $fileTypes = array('jpeg','jpg','png','gif','pdf','doc','docx'); // Allowed File extensions
					      $fileParts = pathinfo($_FILES['upload_file']['name'][$i]);
						mysql_query("insert into uploads(file,title,belongs_to,type,post_type) values('$fileName','".$_FILES['upload_file']['name'][$i]."','$post_id','".$fileParts['extension']."','$post_type')");
						if(isset($fileParts['extension'])){
							if (in_array($fileParts['extension'],$fileTypes)) {
								move_uploaded_file($tempFile,$targetFile);
								$upload_flag = 1;
							}else{
								$upload_flag = 0;
							}
						}else{
							$upload_flag = 0;
						}
					}
				}
			}

			if ($upload_flag == 1) {
						header("location: post-edit.php?post_type=$post_type&id=$post_id&src=new");
			}
}else{
	header("location: post-new.php?post_type=$post_type&error=1");
}?>