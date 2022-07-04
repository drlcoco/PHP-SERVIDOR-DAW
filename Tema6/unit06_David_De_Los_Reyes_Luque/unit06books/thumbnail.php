<?php
    function thumbnail($name_orig, $name_dest,$width, $height){
        $arrayName = explode("/", $name_orig);
        $name=explode(".",$arrayName[2]);
        $ext=$name[1];
       
        if($ext =="jpg" || $ext =="jpeg"){
            $source= imagecreatefromjpeg($name_orig);
        }else if($ext =="png"){
            $source= imagecreatefrompng($name_orig);
        }else if($ext =="gif"){
            $source = imagecreatefromgif($name_orig);
        }
        $thumb = imagecreatetruecolor($width, $height);
        $width_orig = imagesx($source);
        $height_orig = imagesy($source);
        imagecopyresampled($thumb, $source, 0,0,0,0, $width, $height, $width_orig, $height_orig);
        
        if($ext=="jpg" || $ext=="jpeg"){
           
            imagejpeg($thumb,$name_dest, 90);
            
        }else if($ext=="png") {
           
            imagepng($thumb, $name_dest);
        
        }else if($ext=="gif"){
           
            imagegif($thumb, $name_dest);
        }   
        imagedestroy($source);
        imagedestroy($thumb); 
        return $ext;
    }
    /* if(!empty($_FILES['image']['name'])){
        $arrayName = explode(".", $_FILES['image']['name']);
        $ext=$arrayName[1];

        thumbnail($name,"./uploads/thumbnail60".$id.$ext, 60,60);
        /* thumbnail($name,"./uploads/sample200.".$ext,200,200); */
        /*header("location: books.php?ext=".$ext);
    } */
    
?>
