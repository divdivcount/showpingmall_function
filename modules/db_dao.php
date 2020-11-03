<?php

class ProDAO {
	// Field
	protected $db = null;
	protected $dburl = 'localhost';
	protected $dbid = 'prod';
	protected $dbpw = '1234';
	protected $dbtable = 'prodb';
	protected $dbtype = 'mysql';

	protected $quTable = 'tablename';
	protected $quTableId = 'id';
	protected $quTableName = '';
	protected $quTableFdate = '';
	protected $quTableFrname = '';
	protected $fdir = 'files';
  protected $fsize_limit = 50 * 1024 * 1024;

  public function __construct() {
    $argv = array();
    $size = func_num_args();
    for($i=0; $i<$size; $i++) {
        $argv[] = func_get_arg($i);
    }

    if(!empty($argv[0]) && is_string($argv[0])) {
      $this->dburl = $argv[0];
    }
    if(!empty($argv[1]) && is_string($argv[1])) {
      $this->dbid = $argv[1];
    }
    if(!empty($argv[2]) && is_string($argv[2])) {
      $this->dbpw = $argv[2];
    }
    if(!empty($argv[3]) && is_string($argv[3])) {
      $this->dbtable = $argv[3];
    }
    if(!empty($argv[4]) && is_string($argv[4])) {
      $this->dbtype = $argv[4];
    }
  }

  protected function openDB() {
    /*
      db가 열려있지 않으면 오픈합니다.
      ## parameter
      없음
      ## return
      없음
      ## return error code
      없음
    */
    if($this->db) return;

    $profile = '';
    if($this->dbtype === 'mysql') {
      $profile = "mysql:host=$this->dburl; dbname=$this->dbtable";
    }
    else if($this->dbtype === 'mariadb') {
      $profile = "mysql:host=$this->dburl; dbname=$this->dbtable; port=3306; charset=utf8";
    }
    else {
      throw new PDOException('존재하지 않는 db type');
    }

    $this->db = new PDO($profile, $this->dbid, $this->dbpw);
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
//제품 출력
	public function SelectAll($select = '*', $where = null) {
    $this->openDB();
    if($where) $query = $this->db->prepare("select $select from $this->quTable where $where");
    else $query = $this->db->prepare("select id, name, manufacturer, info, date_format(date,'%Y-%m'), price, file from $this->quTable");
    $query->execute();
    $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
    if($fetch) return $fetch;
    else return null;
  }
// 제품 추가
	public function listAdd($product, $name, $manufacturer, $info, $date, $price, $file){
		$this->openDB();
		try{
			$sql1 = "insert into {$product} values (null, :name, :manufacturer, :info, :date,:price,:file)";
		$sql = str_replace('"','',$sql1);
			$query = $this->db->prepare($sql);
		$query -> bindValue(":name", $name, PDO::PARAM_STR);
		$query -> bindValue(":manufacturer", $manufacturer, PDO::PARAM_STR);
		$query -> bindValue(":info", $info, PDO::PARAM_STR);
		$query -> bindValue(":date", $date, PDO::PARAM_STR);
		$query -> bindValue(":price", $price, PDO::PARAM_STR);
		$query -> bindValue(":file", $file, PDO::PARAM_STR);
			$query->execute();
		}catch(PDOException $e){
			exit($e ->getMessage());
		}
	}
	// 특정 아이디의 값 모두 불러오기
	public function SelectId($id) {
		$this->openDB();
		$query = $this->db->prepare("select * from $this->quTable where id=:id");
		$query->bindValue(":id", $id);
		$query->execute();
		$fetch = $query->fetch(PDO::FETCH_ASSOC);

		if(!$fetch) throw new CommonException('데이터가 존재하지 않습니다.');
		return $fetch;
	}
	// 제품 수정
	public function listModify($id, $name, $manufacturer, $info, $date, $price, $file){
		try{
		$this->openDB();
		$sql = "update $this->quTable set name=:name, manufacturer = :manufacturer, info = :info, date = :date, price=:price, file = :file where id = :id";
		$query = $this->db->prepare($sql);
		$query -> bindValue(":id", $id, PDO::PARAM_INT);
		$query -> bindValue(":name", $name, PDO::PARAM_STR);
		$query -> bindValue(":manufacturer", $manufacturer, PDO::PARAM_STR);
		$query -> bindValue(":info", $info, PDO::PARAM_STR);
		$query -> bindValue(":date", $date, PDO::PARAM_STR);
		$query -> bindValue(":price", $price, PDO::PARAM_STR);
		$query -> bindValue(":file", $file, PDO::PARAM_STR);
		$query->execute();
		}catch(PDOException $e){
		exit($e ->getMessage());
		}
	}
//제품 삭제

public function Delete($id) {
try{
$this->openDB();
// 파일 삭제
if( 'file' !=  '') {
$query = $this->db->prepare("select file from $this->quTable where id=:id");
$query->bindValue(":id", $id, PDO::PARAM_INT);
$query->execute();
$fetch = $query->fetch(PDO::FETCH_ASSOC);
$fname = $fetch['file'];
if($fname != '') {
	if($this->quTable == "cpu" && $s_value or $this->quTable == "mainboard" && $s_value or $this->quTable == "cases"&& $s_value or $this->quTable == "power" && $s_value or $this->quTable == "memory" && $s_value or $this->quTable == "odd" && $s_value or $this->quTable == "storage"  && $s_value or $this->quTable == "graphicscard" && $s_value or $this->quTable == "cooler"  && $s_value or $this->quTable == "gallery")
		{
		if(file_exists(`files/$this->quTable/`.$fname)) {
			unlink(`files/$this->quTable/`.$fname);
			}
		}
	}
}


	// 게시글 삭제
	$sql = "delete from $this->quTable where id=:id";
	$query = $this->db->prepare($sql);
	$query->bindValue(":id", $id, PDO::PARAM_INT);
	$query->execute();
	}catch(PDOException $e){
	exit($e ->getMessage());
		}
	}


	//페이지 내이션
  	public function SelectPageLength($cPage, $viewLen, $s_value) {
		$this->openDB();
		if($this->quTable == "cpu" && $s_value or $this->quTable == "mainboard" && $s_value or $this->quTable == "cases"&& $s_value or $this->quTable == "power" && $s_value or $this->quTable == "memory" && $s_value or $this->quTable == "odd" && $s_value or $this->quTable == "storage"  && $s_value or $this->quTable == "graphicscard" && $s_value or $this->quTable == "cooler"  && $s_value){
				$query = $this->db->prepare("select count(*) from $this->quTable where name  like  :s_value");
		}else{
			$query = $this->db->prepare("select count(*) from $this->quTable");
		}

		if($s_value){
			$query->bindValue(":s_value", "%$s_value%",  PDO::PARAM_STR);
		}
		else{
		}
		$query->execute();
		$fetch = $query->fetch(PDO::FETCH_ASSOC);
		$countLen = $fetch['count(*)'];

		// 페이지의 총 개수가 몇개인가
		$plen = ($countLen != 0)?$countLen/((int)$viewLen):1;

		$plen = ceil($plen);

		// 표시할 페이지 시작점은 몇번인가
		$pstart = (
			($cPage-2<1)?1:(
				($cPage+2>$plen)?(
					($plen-4>1)?($plen-4):1
				):($cPage-2)
			)
		);
		// 현재 페이지 번호가 몇번인가
		$pcurnt = ((1>$cPage)?1:(($cPage>$plen)?$plen:$cPage));

		return [
			"count" => $countLen,
			"page" => $plen,
			"start" => $pstart,
			"end" => ($pstart+4>$plen)?$plen:$pstart+4,
			"current" => $pcurnt
		];

	}


	public function SelectPageList($cPage, $viewLen,$s_value) {

		$start = ($cPage * $viewLen) - $viewLen;
		if($this->quTable == "cpu" || $this->quTable == "mainboard" || $this->quTable == "cases" || $this->quTable == "power" || $this->quTable == "memory" || $this->quTable == "odd" ||  $this->quTable == "cooler" || $this->quTable == "storage" || $this->quTable == "graphicscard" ){
				if($s_value){
					$sql= "select id, name, manufacturer, info, date_format(date,'%Y-%m'),price, file from $this->quTable  where name  like  :s_value or manufacturer like :s_value order by $this->quTableId asc limit :start, :viewLen";
				}
				else{
					$sql= "select id, name, manufacturer, info, date_format(date,'%Y-%m'),price, file from $this->quTable  order by $this->quTableId asc limit :start, :viewLen";
				}
		}else if(!$this->quTable){
			$sql ="SELECT * FROM ALL_COL_COMMENTS WHERE TABLE_NAME='cpu'";
		}else{
			echo "없는 값이 들어왔다.";
		}
		$this->openDB();
		$query = $this->db->prepare($sql);
		$query->bindValue(":start", $start, PDO::PARAM_INT);
		$query->bindValue(":viewLen", $viewLen, PDO::PARAM_INT);
		if($s_value)$query->bindValue(":s_value", "%$s_value%",  PDO::PARAM_STR);


		$query->execute();
		$fetch = $query->fetchAll(PDO::FETCH_ASSOC);
		try{
		if(!$fetch){
			echo "결과 값이 없습니다.";
		}
		return $fetch;
		}catch(PDOException $e){
			exit($e ->getMessage());
		  }
	}


	public function SelectGallery($select = '*', $where = null) {
    $this->openDB();
    if($where) $query = $this->db->prepare("select $select from $this->quTable where $where");
    else $query = $this->db->prepare("select file, description from $this->quTable limit 0, 3");
    $query->execute();
    $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
    if($fetch) return $fetch;
    else return null;
  }

	public function ModifyGallery($id, $datArray) {
		$dfield = '';
		$first = true;
		foreach($datArray as $key => $val) {
			$dfield = ($first)?($dfield.$key.'=:'.$key):($dfield.','.$key.'=:'.$key);
			$first = false;
		}

		$this->openDB();
		$query = $this->db->prepare("update $this->quTable set $dfield where $this->quTableId=:id");
		$query->bindValue(':id', $id);
		foreach($datArray as $key => $val) {
			if(is_string($val)) {
				$query->bindValue(":$key", $val);
			}
			else if(is_int($val)) {
				$query->bindValue(":$key", $val, PDO::PARAM_INT);
			}
			else {
				$query->bindValue(":$key", $val);
			}
		}
		$query->execute();
	}

	protected function fileUploader($fdat) {
		//$ftime
		$ftime = time();
		$fnslice = explode('.', $fdat['name']);
		$ftype = end($fnslice);
		$ftslice = explode('/', $fdat['tmp_name']);
		if(count($ftslice) <= 1) {
			$ftslice = explode('\\', $fdat['tmp_name']);
		}
		$ftemp = end($ftslice);
		$fname_save = "file$ftime$ftemp.$ftype";
		if($fdat['name'] != '' && $fdat['error'] == 0) {
			// 업로드 파일 확장자 검사 (필요시 확장자 추가)
			if($ftype=="html" ||
			$ftype=="htm" ||
			$ftype=="php" ||
			$ftype=="php3" ||
			$ftype=="inc" ||
			$ftype=="pl" ||
			$ftype=="cgi" ||
			$ftype=="txt" ||
			$ftype=="TXT" ||
			$ftype=="asp" ||
			$ftype=="jsp" ||
			$ftype=="phtml" ||
			$ftype=="js" ||
			$ftype=="") {
				throw new CommonException('허용되지 않은 파일 형식입니다.');
			}
			// 파일 용량을 검사합니다
			if($fdat['size'] > $this->fsize_limit) {
				throw new CommonException('파일 용량이 허가 용량을 넘습니다.');
			}
			// 임시 파일을 ../../upload_file 로 옮겨서 저장합니다.
			if(!move_uploaded_file($fdat['tmp_name'], $this->fdir.'/'.$fname_save)) {
				throw new CommonException('파일 저장에 실패했습니다.');
			}

			// 리턴값 만들기
			$farray = array();
			if($this->quTableFname) {
				$farray[$this->quTableFname] = $fname_save;
			}
			if($this->quTableFrname) {
				$farray[$this->quTableFrname] = $fdat['name'];
			}
			if($this->quTableFdate) {
				$farray[$this->quTableFdate] = date('Y-m-d');
			}
			return $farray;
		}
		return null;
	}

	public function Upload($fparam, $fnum, $datArray) {
		if(!is_array($datArray)) throw new CommonException('잘못된 인수');
		$farray = null;
		if(is_string($fparam) && ($fparam != '')) {
			if(isset($_FILES[$fparam]) && $this->quTableFname != '') {
				if(is_array($_FILES[$fparam]['name'])) {
					$farray = $this->fileUploader([
						'name' => $_FILES[$fparam]['name'][$fnum],
						'tmp_name' => $_FILES[$fparam]['tmp_name'][$fnum],
						'size' => $_FILES[$fparam]['size'][$fnum],
						'type' => $_FILES[$fparam]['type'][$fnum],
						'error' => $_FILES[$fparam]['error'][$fnum]
					]);
				}
				else {
					$farray = $this->fileUploader([
						'name' => $_FILES[$fparam]['name'],
						'tmp_name' => $_FILES[$fparam]['tmp_name'],
						'size' => $_FILES[$fparam]['size'],
						'type' => $_FILES[$fparam]['type'],
						'error' => $_FILES[$fparam]['error']
					]);
				}
			}
		}
		if($farray === null) {
			$farray = array();
		}
		$dfield = '';
		$dvalue = '';
		$first = true;
		foreach($datArray as $key => $val) {
			$dfield = ($first)?($dfield.$key):($dfield.','.$key);
			$dvalue = ($first)?($dvalue.':'.$key):($dvalue.',:'.$key);
			$first = false;
		}
		foreach($farray as $key => $val) {
			$dfield = ($first)?($dfield.$key):($dfield.','.$key);
			$dvalue = ($first)?($dvalue.':'.$key):($dvalue.',:'.$key);
			$first = false;
		}

		$this->openDB();
		$query = $this->db->prepare("insert into $this->quTable ($dfield) values ($dvalue)");
		foreach($datArray as $key => $val) {
			if(is_string($val)) {
				$query->bindValue(":$key", $val);
			}
			else if(is_int($val)) {
				$query->bindValue(":$key", $val, PDO::PARAM_INT);
			}
			else {
				$query->bindValue(":$key", $val);
			}
		}
		foreach($farray as $key => $val) {
			if(is_string($val)) {
				$query->bindValue(":$key", $val);
			}
			else if(is_int($val)) {
				$query->bindValue(":$key", $val, PDO::PARAM_INT);
			}
			else {
				$query->bindValue(":$key", $val);
			}
		}
		$query->execute();
	}


}
?>