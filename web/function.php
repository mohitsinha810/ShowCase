<?php 

define('SERVERNAME' , "localhost");
define('PASSWORD' , "password");
define('DATABASENAME',"showcase");

class DB_connect
{
	function __construct()
	{
		$conn = new mysqli(SERVERNAME, 'root', PASSWORD,DATABASENAME);
		if ($conn->connect_error)
		{
    		die("Connection failed: " . $conn->connect_error);
		} 
		$this->dbh=$conn;
	}
	public function insert($data,$tablename)
	{
		$sql="";	$table_data="";	$values_data="";
		foreach($data as $x=>$x_value)
		{
			if(is_string($x_value))
			{
				$table_data.="$x".",";
				$values_data.="'$x_value'".",";
			}
		}
		$table_data=rtrim($table_data,",");
		$values_data=rtrim($values_data,",");
		$sql="INSERT INTO $tablename($table_data) VALUES($values_data);";
		if (mysqli_query($this->dbh,$sql)) 
		{
    		echo "New record created successfully";
		}
		else 
		{
    		echo "Error: " . $sql . "<br>" . $this->dbh->error;
		}
	}
	public function update($data,$tablename,$id)
	{
		foreach($data as $x=>$x_value)
		{
			$sql="UPDATE $tablename SET $x='$x_value' WHERE id='$id'";
			if(mysqli_query($this->dbh,$sql))
			{
				echo "Success";
			}
			else 
			{
    			echo "Error: " . $sql . "<br>" . $this->dbh->error;
			}
		}
	}

	public function update_column($data,$tablename,$colname,$colvalue)
	{
		foreach($data as $x=>$x_value)
		{
			$sql="UPDATE $tablename SET $x='$x_value' WHERE $colname=$colvalue;";
			if(mysqli_query($this->dbh,$sql))
			{
				
			}
			else 
			{
    			echo "Error: " . $sql . "<br>" . $this->dbh->error;
			}
		}
	}


	public function select($tablename)
	{
		$result = mysqli_query($this->dbh,"SELECT * FROM $tablename;");
		return $result;
	}
	public function select_cols($tablename,$cols)
	{
		$col="";
		foreach($cols as $x)
		{
			$col.=$x.",";
		}
		$col=rtrim($col,",");
		$sql="SELECT $col FROM $tablename";
		$result=mysqli_query($this->dbh,$sql);
		return $result;
	}
	
	public function delete($id,$tablename)
	{
		mysqli_query($this->dbh,"DELETE FROM $tablename WHERE id=$id;");
		header("Location:index.php");
	}

	public function delete_column($tablename,$colname,$colvalue)
	{
		mysqli_query($this->dbh,"DELETE FROM $tablename WHERE $colname=$colvalue;");
	}

	public function edit($id,$name,$email,$mobile,$gender,$address,$qualification,$s,$image,$bankname,$accountnumber,
	$ifsc,$accounttype,$businessemail,$branchaddress)
	{
		if($image!="")
		{
			$sql="UPDATE student2 SET name='$name',gender='$gender',email='$email',address='$address',qualification='$qualification',hobbies='$s',mobile=$mobile,images='$image',bankname='$bankname',accountnumber='$accountnumber',
				ifsc='$ifsc',accounttype='$accounttype',businessemail='$businessemail',branchaddress='$branchaddress' WHERE id='$id'";
		}
		else 
		{
			$sql="UPDATE student2 SET name='$name',gender='$gender',email='$email',address='$address',qualification='$qualification',hobbies='$s',mobile=$mobile,bankname='$bankname',accountnumber='$accountnumber',
				ifsc='$ifsc',accounttype='$accounttype',businessemail='$businessemail',branchaddress='$branchaddress' WHERE id='$id'";	
		}
		if (mysqli_query($this->dbh, $sql))
		{
    		echo "New record created successfully";
    		header("Location: index.php");
		} 	
		else 
		{
    		echo "Error: " . $sql . "<br>" . mysqli_error($this->dbh);
		}
	}
	public function selectbyid($id,$tablename)
	{
		$result=mysqli_query($this->dbh,"SELECT * FROM $tablename WHERE id=$id;");
		return $result;
	}
	public function delete_image($id,$tablename)
	{
		$result=mysqli_query($this->dbh,"SELECT images FROM $tablename WHERE id=$id;");
		$row = mysqli_fetch_array($result);
		$images=$row['images'];
		echo 'hello';
		$res=mysqli_query($this->dbh,"SELECT count(1) FROM $tablename WHERE images='$images';");
		$row2=mysqli_fetch_array($res);
		$number=$row2['count(1)'];
		if($number<=1)
		{
			unlink("images/$images");
		}
		else
		{
			return;
		}
	}
	public function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	public function select_by_colname($tablename,$selectcolumn,$colname,$colvalue)
	{
		$sql="SELECT $selectcolumn FROM $tablename WHERE $colname='$colvalue'";
		$result=mysqli_query($this->dbh,$sql);
		if ($result) 
		{
    			return $result;
		}
		else 
		{
    		echo "Error: " . $sql . "<br>" . $this->dbh->error;
		}
	}
	
	public function select_by_colname_reloaded($tablename,$cols,$colname,$colvalue)
	{
		$col="";
		foreach($cols as $x)
		{
			$col.=$x.",";
		}
		$col=rtrim($col,",");
		$sql="SELECT $col FROM $tablename WHERE $colname='$colvalue'";
		$result=mysqli_query($this->dbh,$sql);
		if ($result) 
		{
    			return $result;
		}
		else 
		{
    		echo "Error: " . $sql . "<br>" . $this->dbh->error;
		}
	}

	public function run_query($sql)
	{
		mysqli_query($this->dbh,$sql);
	}
	public function get_max($tablename,$colname)
	{	
		$sql="SELECT max($colname) FROM $tablename;";
		$result=mysqli_query($this->dbh,$sql);
		$row=mysqli_fetch_array($result);
		return $row['max(id)'];
	}

}

?>