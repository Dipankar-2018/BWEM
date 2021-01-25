<?php
class database{
    
    private $host;
    private $user;
    private $password;
    private $db_name;

    protected function connect(){
        $this->host = 'localhost';
        $this->user = 'root';
        $this->password = '';
        $this->db_name = 'btrlm_db';
        $conn = new mysqli($this->host, $this->user, $this->password, $this->db_name);
        return $conn;
    }
}

class query extends database{
	public function getData($table,$field='*',$condition_arr='',$order_by_field='',$order_by_type='desc',$limit=''){
		$sql="select $field from $table ";
		if($condition_arr!=''){
			$sql.=' where ';
			$c=count($condition_arr);	
			$i=1;
			foreach($condition_arr as $key=>$val){
				if($i==$c){
					$sql.="$key='$val'";
				}else{
					$sql.="$key='$val' and ";
				}
				$i++;
			}
		}else{
			$sql.=' where 1 ';
		}
		if($order_by_field!=''){
			$sql.=" order by $order_by_field $order_by_type ";
		}
		
		if($limit!=''){
			$sql.=" limit $limit ";
		}
		//die($sql);
		$result=$this->connect()->query($sql);
		if($result->num_rows>0){
			$arr=array();
			while($row=$result->fetch_assoc()){
				$arr[]=$row;
			}
			return $arr;
		}else{
			return array();
		}
	}
	
	public function insertData($table,$condition_arr){
		if($condition_arr!=''){
			foreach($condition_arr as $key=>$val){
				$fieldArr[]=$key;
				$valueArr[]=$val;
			}
			$field=implode(",",$fieldArr);
			$value=implode("','",$valueArr);
			$value="'".$value."'";			
			$sql="insert into $table($field) values($value) ";
			$result=$this->connect()->query($sql);
			return $result==true;
		}
	}
	
	public function deleteData($table,$condition_arr){
		if($condition_arr!=''){
			$sql="delete from $table where ";
			$c=count($condition_arr);	
			$i=1;
			foreach($condition_arr as $key=>$val){
				if($i==$c){
					$sql.="$key='$val'";
				}else{
					$sql.="$key='$val' and ";
				}
				$i++;
			}
			$result=$this->connect()->query($sql);
			return $result==true;
		}
	}
	
	public function updateData($table,$condition_arr,$where_field,$where_value){
		if($condition_arr!=''){
			$sql="update $table set ";
			$c=count($condition_arr);	
			$i=1;
			foreach($condition_arr as $key=>$val){
				if($i==$c){
					$sql.="$key='$val'";
				}else{
					$sql.="$key='$val', ";
				}
				$i++;
			}
			$sql.=" where $where_field='$where_value' ";
			$result=$this->connect()->query($sql);
			return $result==true;
		}
	}
	
	public function get_safe_str($str){
		if($str!=''){
			return mysqli_real_escape_string($this->connect(),$str);
		}
	}

	private function getRandomString($length = 10, $chars = '0123456789A') {
		$str = '';
		$size = strlen($chars);
		for ($i = 0; $i < $length; $i++) {
			$str .= $chars[mt_rand(0, $size - 1)];
		}
		return $str;
	}
	
	public function getFormId($str1,$table){
		$formID=$str1.$this->getRandomString();
		$dbData=$this->getData($table,'formID',array('formID'=>$formID));
		while(count($dbData)!=0)
			$formID=$str1.$this->getRandomString();
		return $formID;
	}
	
}







?>