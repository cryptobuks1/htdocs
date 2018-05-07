<?php
	
	if ($_FILES['file']['name']) {
            if (!$_FILES['file']['error']) {
                $name = md5(rand(100, 200));
                $ext = explode('.', $_FILES['file']['name']);
                $filename = $name . '.' . $ext[1];
                $destination = '../userfiles/' . $filename; 
                $location = $_FILES["file"]["tmp_name"];
                move_uploaded_file($location, $destination);
                echo '../userfiles/' . $filename;
            }
            else
            {
              echo  $message = 'Ooops!  La carga del archivo provocó el error siguiente:  '.$_FILES['file']['error'];
            }
        }
?>