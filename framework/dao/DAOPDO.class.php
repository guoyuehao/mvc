<?php 
	namespace framework\dao;
	use framework\dao\I_DAO;
	use \PDO;

	class DAOPDO implements I_DAO{
		private static $instance;
		private $pdo;
		private function __construct($option){
			//初始化服务器信息
			$this->initOptions($option);
			//初始化PDO对象
			$this->initPDO();
		}
		private function __clone(){}
		public static function getSingleton($option){
			if (!self::$instance instanceof self) {
				self::$instance = new self($option);
			}
			return self::$instance;
		}

		private function initOptions($option){

			$this->host = isset($option['host'])?$option['host']:'';
			$this->user = isset($option['user'])?$option['user']:'';
			$this->pwd = isset($option['pwd'])?$option['pwd']:'';
			$this->dbname = isset($option['dbname'])?$option['dbname']:'';
			$this->port = isset($option['port'])?$option['port']:'';
			$this->charset = isset($option['charset'])?$option['charset']:'';
		}

		private function initPDO(){
			$dns = "mysql:host=$this->host;dbname=$this->dbname;port=$this->port;charset=$this->charset";
			$this->pdo = new PDO($dns,$this->user,$this->pwd);
		}

		//查询所有数据
	    public function getAll($sql){
	    	$res = $this->pdo->query($sql);
	    	//PDO::FETCH_ASSOC  指定只返回关联数组
			//PDO::FETCH_NUM    执行只返回索引数组
	    	$res1 = $res->fetchAll(PDO::FETCH_ASSOC);
	    	if ($res1===false) {
	            $error_info = $this -> pdo -> errorInfo();
	            $error_str = "SQL语句有错误，详细信息如下:<br>".$error_info[2];
	            echo $error_str;
	            return false;	    		
	    	}
	    	$res = $this->pdo->query($sql);
	    	return $res->fetchAll(PDO::FETCH_ASSOC);

	    }
	    //查询一条数据
	    public function getOne($sql){
	    	$res = $this->pdo->query($sql);
	    	
	        if($res==false){
	            //说明sql有错误，输出错误信息

	            $error_info = $this -> pdo -> errorInfo();
	            $error_str = "SQL语句有错误，详细信息如下:<br>".$error_info[2];
	            echo $error_str;
	            return false;
	        }
		        $res = $this->pdo->query($sql);
		        return $res -> fetch(PDO::FETCH_ASSOC);
		    }
	    //查询一个字段
	    public function getColumn($sql){
	    	$res = $this->pdo->query($sql);
	        if($res==false){
	            //说明sql有错误，输出错误信息
	            $error_info = $this -> pdo -> errorInfo();
	            $error_str = "SQL语句有错误，详细信息如下:<br>".$error_info[2];
	            echo $error_str;
	            return false;
	        }
	        return $res->fetchColumn();
	    }
	    //执行增删改结果
	    public function exec($sql){
	    	$res = $this-> pdo ->exec($sql);

	    	// if ($res) {
	     //        $error_info = $this -> pdo -> errorInfo();
	     //        $error_str = "SQL语句有错误，详细信息如下:<br>".$error_info[2];
	     //        echo $error_str;
	     //        return false;
	    	// }else{
	    	// 	return true;	    		
	    	// }

	    	return $res;
	    }
	    //查询上次插入操作的主键值
	    public function lastInsertId(){
	    	return $this->pdo->lastInsertId();

	    }
	}
