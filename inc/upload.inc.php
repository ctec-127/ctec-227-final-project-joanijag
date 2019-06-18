<!-- "inc/upload.inc.php -->
<?php 
        // Define these errors in an array
        $upload_errors = array(
                                UPLOAD_ERR_OK 				=> "No errors.",
                                UPLOAD_ERR_INI_SIZE  		=> "Larger than upload_max_filesize.",
                                UPLOAD_ERR_FORM_SIZE 		=> "Larger than form MAX_FILE_SIZE.",
                                UPLOAD_ERR_PARTIAL 			=> "Partial upload.",
                                UPLOAD_ERR_NO_FILE 			=> "No file.",
                                UPLOAD_ERR_NO_TMP_DIR 		=> "No temporary directory.",
                                UPLOAD_ERR_CANT_WRITE 		=> "Can't write to disk.",
                                UPLOAD_ERR_EXTENSION 		=> "File upload stopped by extension.");

        if($_SERVER['REQUEST_METHOD'] == "POST"){
            // what file do we need to move?
            $tmp_file = $_FILES['file_upload']['tmp_name'];
            // set target file name
            // basename gets just the file name
            $target_file = basename($_FILES['file_upload']['name']);
            // set upload folder name
            $upload_dir = 'images';
            // Now lets move the file
            // move_uploaded_file returns false if something went wrong
            if(move_uploaded_file($tmp_file, $upload_dir . "/" . $target_file)){
                $message = "File uploaded successfully";
            } else {
                $error = $_FILES['file_upload']['error'];
                $message = $upload_errors[$error];
            } // end of if(move_uploaded_file($tmp_file, $upload_dir . "/" . $target_file))
        }
        
        $dir = "images";
        if(isset($_GET['del'])){
            unlink($_GET['del']);
            echo "you have successfully deleted your image";
        }//end if             
  ?>       