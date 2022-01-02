<?php
class csv extends mysqli{
    private $state_csv = false;
   public  function __construct(){
        parent::__construct("localhost","root","","josco_lms");
        if($this->connect_error){
            echo "failed to connect to database:".$this->connect_error;
        }
    }

   public function import($file){
       $first = false;
     $file= fopen($file,'r');
    while ($row= fgetcsv($file)){
        if(!$first){
            $first= true;  
           }else{
     $value = "'".implode("','", $row)."'";
      $query ="INSERT INTO student_list(fname,mname,lname,index_number) VALUES(".$value.")";
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
    header("location: index.php?status=create");
}else{
    header("location: index.php?status=error");
}
    }


   public function importData($file){
       $first = false;
     $file= fopen($file,'r');
    while ($row= fgetcsv($file)){
        if(!$first){
            $first= true;  
           }else{
     $value = "'".implode("','", $row)."'";
      $query ="INSERT INTO list_staff(fname,mname,lname,staff_id) VALUES(".$value.")";
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
   header("location: index.php?status=create");
}else{
    header("location: index.php?status=error");
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
      $query ="INSERT INTO coursetbl(course) VALUES(".$value.")";
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


    public function export(){
        $this->state_csv =false;
        $q="SELECT  t.fname, t.lname, t.age FROM file as t";
        $run = $this->query($q);
        if($run->num_rows >0){
        $fn = "studentIndex_".uniqid().".csv";
        $file = fopen("files/".$fn, 'w');
        while($row = $run->fetch_array(MYSQLI_NUM)){
           if(fputcsv($file, $row)){
            $this->state_csv = true;  
           }else{
            $this->state_csv = false; 
           }
        }if($this->state_csv){
            echo "Successfully exported";
        }else{
            echo "Something went wrong unable to export";
        }
        fclose($file);
        }else{
          echo "No data found";  
        }

    }
}
?> 