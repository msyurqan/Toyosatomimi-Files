<?php
// upload_file.php
$usr = $_SESSION['username'];
$eror		= false;
$folder		= './page/download/';
//maximum size to upload
$max_size	= 100000000; // 100MB
if(isset($_POST['btnUpload'])){
	//Mulai memorises data
	$file_name	= $_FILES['data_upload']['name'];
	$file_size	= $_FILES['data_upload']['size'];
	//cari extensi file dengan menggunakan fungsi explode
	$explode	= explode('.',$file_name);
	$extensi	= $explode[count($explode)-1];

	//check apakah type file sudah sesuai
	if($file_size > $max_size){
		$eror   = true;
		$pesan .= 'File is too big!<br />';
	}
	//check ukuran file apakah sudah sesuai

	if($eror == true){
		echo '<div id="eror">'.$pesan.'</div>';
	}
	else{
		//mulai memproses upload file
		if(move_uploaded_file($_FILES['data_upload']['tmp_name'], $folder.$file_name)){
			//catat nama file ke database
			$md5_hash = md5(rand(0,999));
			$security_code = substr($md5_hash, 15, 10);
			$catat = mysql_query('insert into files(Filename,userowner,datecreated,size,downloadlink) values ("'.$file_name.'", "'.$usr.'", "'.date('Y-m-d H:i:s').'", "'.$file_size.'","'.$security_code.'")');
			echo '<div id="msg">Upload Success!</div>';
			header('location:page\account');
		} else{
			echo "Unexpected error.";
		}
	}
}
?>