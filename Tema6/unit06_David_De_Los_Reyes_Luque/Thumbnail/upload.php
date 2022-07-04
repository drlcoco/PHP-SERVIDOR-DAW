<?php
    if($_FILES['image']['error'] != UPLOAD_ERR_OK){
        echo 'Error';
        //Icheck for all the errors
        switch ($_FILES['image']['error']){
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                echo 'The file is too big';
                break;
            case UPLOAD_ERR_PARTIAL:
                echo 'Only part of the file could be uploaded';
                break;
            case UPLOAD_ERR_NO_FILE:
                echo ': The file could not be uploaded';
                break;
            default:
                echo 'Undefined error';
        }
        echo '<br/><a href="thumbnails.php">Volver</a>'; 
    }else if($_FILES['image']['type'] != 'image/gif' && $_FILES['image']['type'] != 'image/png' 
        && $_FILES['image']['type'] != 'image/jpeg'){
        echo 'Error: The file type is not correct.';
    }else if(is_uploaded_file($_FILES['image']['tmp_name'])){
        $name = "./uploads/".$_FILES['image']['name'];
        if (is_file($name) === true){
            $name="./uploads/".time()."_".$_FILES['image']['name'];
        }
        if (move_uploaded_file($_FILES['image']['tmp_name'], $name)){
            if($_FILES['image']['type'] == 'image/jpeg'){
                header('Content-type: image/jpeg'); 
            }
            if($_FILES['image']['type'] == 'image/gif'){
                header("Content-type: image/gif");
            }
            if($_FILES['image']['type'] == 'image/png'){
                header('Content-type: image/png');
            }
            // I open the file, read it and display its content on the screen.
            /* $fp = fopen($name, 'r');
            $content =fread($fp, filesize($name));
            fclose($fp); */
           // echo $content;
          
        }else{
            echo "error: The file can not be moved into its destiny.";
        }
    }else{
        echo 'Error: possible attack2. Name: '.$_FILES['image']['name'];
    }

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
    }
    if(!empty($_FILES['image']['name'])){
        $arrayName = explode(".", $_FILES['image']['name']);
        $ext=$arrayName[1];

        thumbnail($name,"./uploads/sample120.".$ext, 120,120);
        thumbnail($name,"./uploads/sample200.".$ext,200,200);
        header("location: thumbnails.php?ext=".$ext);
    }
    
?>