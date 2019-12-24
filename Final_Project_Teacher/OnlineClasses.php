<?php
   if(isset($_FILES['file'])){
      $errors= array();
      $file_name = $_FILES['file']['name'];
      $file_size =$_FILES['file']['size'];
      $file_tmp =$_FILES['file']['tmp_name'];
      $file_type=$_FILES['file']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));
      
      $extensions= array("mp4, FLV, AVI, WMV");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a video file.";
      }
      
      if($file_size > 25097152){
         $errors[]='File size must be excately 25 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"jahin/notes/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>
<html>
   <body>
      
      <form method="POST" enctype="multipart/form-data">
         <input type="file" name="file" />
         <input type="submit"/>
      </form>
      <td colspan='6' align= "center"><a href="TeacherHome.php" > Go Home  </a></td>
      
   </body>
</html>