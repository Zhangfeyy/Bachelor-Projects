<?php
function upload($file,$filepath){
    $error = $file['name'];
    switch($error){
       case 0:
           $filename = $file['name'];
           $filetemp = $file['tmp_name'];
           $destination = $filepath."/".$filename;
           move_uploaded_file($filetemp,$destination);
           return "file uploads successfully";
       case 1:
           return"over the max size in php.ini";
       case 2:
           return"over the max size in FORM action";
       case 3:
           return "part upload";
       case 4:
           return "not choose";
    }
}
function download($file_dir,$file_name){ 
     if (!file_exists($file_dir.$file_name)) { //����ļ��Ƿ����  
     		exit("The document doesn't exit or is deleted!");  
     } else { 
     		$file = fopen($file_dir.$file_name,"r"); // ���ļ�  
     		//ǿ���������ʾ����Ի��򣬲��ṩһ���Ƽ����ļ��� 
     		header("Content-Disposition: attachment; filename=".$file_name);  
     		// ����ļ�����  
     		echo fread($file,filesize($file_dir.$file_name));  
     		fclose($file);  
     		exit; 
     }  
} 
?>