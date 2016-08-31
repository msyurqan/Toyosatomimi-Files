<?php
$folder		= './page/download/';
if(isset($_POST['btnDownload'])){
	$fp=fopen($link_file, "rb");
	header('Content-type:application/octet-stream');
	header('Content-disposition: attachment;filename="'.$file_name.'"');
	header('Content-length: '.$file_size);
	fpassthru($fp);
	fclose($fp);
}
?>
<htmt>
<head>
<title>Thank you for downloading...</title>
</head>
<body>
</body>