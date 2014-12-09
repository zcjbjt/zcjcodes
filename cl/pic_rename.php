<?php
define('SP', DIRECTORY_SEPARATOR);
echo "Pic_rename\n";
$dir = dirname(__FILE__);  // c:\btl
$config_dir = array();

//rename( 'tempFile.txt', 'tempFile2.txt' );
foreach($config_dir as $val){
	$tmp_dir = $dir . SP . $val;
	$res = my_scandir($tmp_dir);
	foreach($res as $valb){
		$oldname = $tmp_dir . SP . $valb;
		$newname = $tmp_dir . SP . $val . '-' .$valb;
		rename( $oldname, $newname);
		echo $oldname  . ' -> ' . $newname . "\n";				

	}
}

function my_scandir($dir){
	$files = array();
	if ( $handle = opendir($dir) ) {
			while ( ($file = readdir($handle)) !== false ) {
			if ( $file != ".." && $file != "." ) {
			if ( is_dir($dir . "/" . $file) ) {
				$files[$file] = scandir($dir . "/" . $file);
			}else {
				$files[] = $file;
			}
		}
	}
	closedir($handle);
	return $files;
	}
}
?>