<?php
class csv extends mysqli{
    private $state_csv = false;
   public  function __construct(){
        parent::__construct("localhost","root","","josco_lms");
        if($this->connect_error){
            echo "failed to connect to database:".$this->connect_error;
        }
    }

 public function importCourse($file){
       $first = false;
     $file= fopen($file,'r');
    while ($row= fgetcsv($file)){
        if(!$first){
            $first= true;  
           }else{
     $value = "'".implode("','", $row)."'";
      $query ="INSERT INTO option_tbl(course) VALUES(".$value.")";
      //echo $query;
      if($this->query($query)){
       $this->state_csv = true;
      }else{
        $this->state_csv = false; 
        //echo $this->error;
      }
    }
    }

if($this->state_csv){
   header("location: courseupload.php?status=create");
}else{
    header("location: courseupload.php?status=error");
}
    }
}
?> 