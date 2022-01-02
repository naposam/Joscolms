$accepted=array('jpeg','jpg','png','gif','pdf','docx','doc','avi','swf','pptx','mp4');
  $uploadfiles1=$_FILES['thumbnail']['name'];
  $uploadfiles2=$_FILES['file']['name'];
  $extention=pathinfo($uploadfiles1,PATHINFO_EXTENSION);
  $extention=pathinfo($uploadfiles2,PATHINFO_EXTENSION);
  if(!in_array($extention, $accepted)){

  }else{
    $lesson_id=$_POST['lesson'];
    $content_tile=$_POST['content'];
    
    $target='../resources/'.$_FILES['file']['name'];
   
    $uploadfiles2=$_FILES['file']['name'];
    
    if(move_uploaded_file($_FILES['file']['tmp_name'],$target )){
     $insertqry="INSERT INTO `resources`( `lesson_id`, `content_tile`,content_link) VALUES ('$lesson_id','$content_tile','$uploadfiles1',$uploadfiles2)";
      mysqli_query($db,$insertqry); 
    }
  ///
   $up="SELECT ass.*,coursetbl.course FROM ass LEFT JOIN coursetbl ON ass.course=coursetbl.cid where level='$levelID' and ass.course='$course'";
                        $upData=mysqli_query($db,$up);
       

    
    
  }