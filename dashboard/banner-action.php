<?php  require_once('../Connections/db_connect.php'); 
$upload_flag = 0;
$banner = 2923;?>
<?php if (isset($_POST['submit_form'])) {

	$post_type = 'banner';
	$title = $_POST['title'];
	$content = $_POST['content'];
	$date = date('Y-m-d');
	$sql = "INSERT INTO `posts` (`title`, `content`, `date`, `post_type`) VALUES ('$title', '$content', '$date','$post_type');";
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
						mysql_query("insert into uploads(file,title,belongs_to,type,post_type) values('$fileName','".$_FILES['upload_file']['name'][$i]."','$post_id','".$fileParts['extension']."','banner')");
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
						header("location: home-banners.php?src=new");
			}
}else{
	header("location: home-banners.php?error=1");
}?>