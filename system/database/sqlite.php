<?php
/**
**sqlite.php
*/
//namespace DATABASE;
class DBLI extends SQLite3
{
     public function __construct($database)
      {
         $this->open($database);
      }

	public function queryli($sql) {
      		$resource = $this->query($sql);

      		if ($resource) {
      			
      				$i = 0;
          	
      				$data = array();
      		
      				while ($result = $resource->fetchArray()) {
      					$data[$i] = $result;
          	
      					$i++;
      				}
      				
      				
      				$query = new stdClass();
      				$query->row = isset($data[0]) ? $data[0] : array();
      				$query->rows = $data;
      				$query->num_rows = $i;
      				
      				unset($data);

      				return $query;	
          		
      		} else {
            		exit('Error: ' . $this->lastErrorMsg() . '<br />' . $sql);
          	}
	}

  	public function getLastId() {
		$last_id = FALSE;
		
		$resource = $this->query("SELECT @@identity AS id", $this->connection);
		
		if ($row = $resource->fetchArray()) {
			$last_id = trim($row[0]);
		}
		return $last_id;
  	}	

  	public function __destruct() {
	
		$this->close();
	}
}