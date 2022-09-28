<?php
class DataBase{
    private $db_host = "localhost";
    private $db_user = "root";
    private $db_pass = "";
    private $db_name = "news-site";
    
    private $mysql = "";
    private $result = array();
    private $conn = false;


    public function __construct(){
        if(!$this->conn){
            $this->mysql = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name );
            // var_dump($this->mysqli);
            $this->conn = true;
            if($this->mysql->connect_error){
                array_push($this->result,$this->mysql->connect_error );
                return false;
            }
        }else{
            return true;
        }

    }
    // function for insert data in to the database
    public function insert($table,$params=array()){

        if($this->table_ex($table)){
            // echo "<pre>";
            // print_r($params);
            // echo "</pre>";
            // echo "goioeroejg";
            
            $table_col = implode(',',array_keys($params));
            $table_value = implode("','",$params);

           

            $sql = "INSERT INTO $table ($table_col) VALUES ('$table_value')";
            if($this->mysql->query($sql)){
                array_push($this->result , $this->mysql->insert_id);
                return true;
            }else{
                array_push($this->result,$this->mysql->error);
                return false;
            }
        }else{

        }
    }
    // function for update data in to the database
    public function update($table,$params=array(),$where = null){
        // echo "function worke";
        if($this->table_ex($table)){
            // echo 'table exist';
            $args = array();
            foreach ($params as $key =>$valu){
                $args[] = "$key = '$valu'";
            }
            
           $sql = "UPDATE $table SET " . implode(', ' , $args);
           if($where != null){
            $sql .= " WHERE $where";
           }
           if($this->mysql->query($sql)){
            array_push($this->result , $this->mysql->affected_rows);
            return true;
           }else{
            array_push($this->result , $this->mysql->error);
           }
        }else{
            return false;
        }
    }
    // function for delete table or row from database
    public function delete($table,$where = null){
        if($this->table_ex($table)){
            $sql = "DELETE FROM $table";
            if($where != null){
                $sql .= " WHERE $where" ;
            }
            if($this->mysql->query($sql)){
                array_push($this->result , $this->mysql->affected_rows);
                return true;
               }else{
                array_push($this->result , $this->mysql->error);
               }
        }else{
            return false;
        }

    }
    // function for select from data base 
    public function select($table, $rows="*", $join= null, $where= null, $order= null, $limit= null){
        if($this->table_ex($table)){
            $sql = "SELECT $rows FROM $table";
            if($join != null){
                $sql .= " JOIN $join";
            }
            if($where != null){
                $sql .= " WHERE $where";
            }
            if($order != null){
                $sql .= " ORDER BY $order";
            }
            if($limit != null){
                if(isset($_GET["page"])){
                    $page = $_GET['page'];
                }else{
                    $page = 1;
                }
                $start = ($page - 1)*$limit;
                $sql .= " LIMIT $start,$limit";
            }
            // echo $sql;
            $query = $this->mysql->query($sql);
            if($query){
                $this->result = $query->fetch_all(MYSQLI_ASSOC);
                return true;
            }else{
                array_push($this->result,$this->mysql->error);
                return false;
            }
            
        }else{
            return false;
        }
    }
    // paginatoin code=============
    public function pagination($table, $join= null, $where= null, $limit= null){

    if($this->table_ex($table)){
        if($limit != null){
            $sql = "SELECT COUNT(*) FROM $table";
            if($join != null){
                $sql .= " JOIN $join";
            }
            if($where != null){
                $sql .= " WHERE $where";
            }
            $query = $this->mysql->query($sql);

            $total_record = $query->fetch_array();
            $total_record = $total_record[0];
            
            $total_page = ceil($total_record/$limit);

            $url = basename($_SERVER['PHP_SELF']);

            if(isset($_GET["page"])){
                $page = $_GET['page'];
            }else{
                $page = 1;
            }
            $output = "<ul class='pagination'>";

            if($page>1){
                $output .= "<li><a href='$url?page=".($page-1)."'>prev</a></li>";
            }
            
            if($total_record > $limit){
                for($i=1; $i <= $total_page; $i++){
                    if($i==$page){
                         $class= "class='active'";
                    }else{
                        $class = "";
                    }
                    $output .= "<li><a $class  href='$url?page=$i'>$i</a></li>";
                }
            }
            if($page<$total_page){
                $output .= "<li><a href='$url?page=".($page+1)."'>Next</a></li>";
            }
            $output .= "</ul>";
            
            echo $output;
            
        }else{
            return false;
        }
    }else{
        return false;
    }
}
    // function for SQLI statment
    public function sql($sql){
        $query = $this->mysql->query($sql);
        if($query){
            $this->result = $query->fetch_all(MYSQLI_ASSOC);
            return true;
        }else{
            array_push($this->result,$this->mysql->error);
            return false;
        }
    }

    // function for chake tavle existing 
    private function table_ex($table){
        // echo "method is worke";
        // echo $table;
        // $sql1 = "SHOW TABLES FROM $this->db_name LIKE '$table' ";
        // $tableInDb = $this->mysql->query($sql1);
    
        
        // if($tableInDb){
        //     echo "SQLI worke";
        //     if($tableInDb->num_rows == 1){
        //         return true;
        //         echo "table exist ";
        //     }else{
        //         // array_push($this->result,$table . "dose not exist in this data base .");
        //         // return false;
        //         echo "table not exist";

        //     }
        // }else{
        //     echo $tableInDb ."........ is not working .";
        // }
        if($tableInDb = $this->mysql->query("SHOW TABLES LIKE '$table' ")){
           if($tableInDb){
            if($tableInDb->num_rows == 1){
               return true;
            }else{
                return false;
                array_push($this->result,$table . "dose not exist in this data base .");
                echo "<pre>";
                echo($this->result);
                echo "</pre>";
                
            }
           }
        }
    }
    // get result ================
    public function get_result(){
        $val = $this->result;
        $this->result = array();
        return $val;
    }
    // function for close database connsection 
    public function __destruct(){
        
        if($this->conn){
            if($this->mysql->close()){
                
                $this->conn = false;
                return true;
                
            }else{
               echo 'connection is not close .' ; 
            }
        }else{
            return false;
            
        }
    }
}

?>