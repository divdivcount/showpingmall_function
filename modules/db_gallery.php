<?php
/*
FileName: db_gallery.php
Modified Date: 20190902
Description: YoYangGallery 클래스
*/
// Load Modules
require_once('modules/module_protect1.php');

// Parameter

// Functions
class Gallery extends ProDAO {
	protected $quTable = 'gallery';
	protected $quTableId = 'id';
	protected $quTableFname = 'file';
	protected $quTableFdate = 'fdate';
	protected $fdir = 'files/gallery';
}

// Process

?>
