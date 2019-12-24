<?php
   if(isset($_FILES['text'])){
      $errors= array();
      $file_name = $_FILES['text']['name'];
      $file_size =$_FILES['text']['size'];
      $file_tmp =$_FILES['text']['tmp_name'];
      $file_type=$_FILES['text']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['text']['name'])));
      
      $extensions= array("text");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a text file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
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
         <input type="file" name="text" />
         <input type="submit"/>
      </form>
      <td colspan='6' align= "center"><a href="TeacherHome.php" > Go Home  </a></td>
      
   </body>
</html>