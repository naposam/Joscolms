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
      $query ="INSERT INTO scoretbl(fname,lname,index_number,course,level,score) VALUES(".$value.")";
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
    header("location: student_scoretb.php?status=create");
}else{
    header("location: student_scoretb.php?status=error");
}
    }


  

    public function export(){
        $this->state_csv =false;
        $q="SELECT users.fname, users.lname,users.email, coursetbl.course, users.level FROM users left join course_reg on users.user_id=course_reg.uid left join coursetbl on coursetbl.cid=course_reg.cid where users.role='Student'";
        $run = $this->query($q);
        if($run->num_rows >0){
        $fn = "scoresheet_".uniqid().".csv";
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