<?php
function page($total_records,$page_size,$page_current,$url,$keyword){ 
     $total_pages = ceil($total_records/$page_size); 
     $page_previous = ($page_current<=1)?1:$page_current-1; 
     $page_next = ($page_current>=$total_pages)?$total_pages:$page_current+1; 
     $page_next = ($page_next==0)?1:$page_next; 
     $page_start = ($page_current-5>0)?$page_current-5:0; 
     $page_end = ($page_start+10<$total_pages)?$page_start+10:$total_pages; 
     $page_start = $page_end-10; 
     if($page_start<0) $page_start = 0; 
     if(empty($keyword)){ 
     		$navigator = "<a href=$url?page_current=$page_previous>former page</a>  "; 
     		for($i=$page_start;$i<$page_end;$i++){ 
     			$j = $i+1; 
     			$navigator.="<a href='$url?page_current=$j'>$j</a>  "; 
     		} 
     		$navigator.="<a href=$url?page_current=$page_next>next page</a>"; 
     		$navigator.= "<br/>There are&nbsp".$total_records."&nbsprecords&nbsp&nbsp".$total_pages."&nbsppages&nbsp&nbsp now&nbsp".$page_current."&nbsppage"; 
     }else{ 
     		$keyword = $_GET["keyword"]; 
     		$navigator = "<a href=$url?keyword=$keyword&page_current=$page_previous>former page</a>  "; 
     		for($i=$page_start;$i<$page_end;$i++){ 
     			$j = $i+1; 
     			$navigator.="<a href='$url?keyword=$keyword&page_current=$j'>$j</a>  "; 
     		} 
     		$navigator.="<a href=$url?keyword=$keyword&page_current=$page_next>next page</a>"; 
     		$navigator.= "<br/>There are".$total_records."records£¬There are".$total_pages."pages£¬This is the".$page_current."page"; 
     } 
     echo $navigator; 
} 
?> 


