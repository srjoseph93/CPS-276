<?php
    Class Directories{
        public function makeDirectory($name, $content){ 
            $rootDir = "/CPS_276/Assignments/Assignment 5/Directories";
            $dir_name = $rootDir . $name . "/";
            $data = $content;
            $dirContents = scandir($rootDir);
            $alreadyExists = FALSE;
            $operSuccess = FALSE;

            if (empty($name)) {
                return "<label class=\"errLabel\">Folder Name is empty.</label><br><br>";
            } else if (empty($data)) {
                return "<label class=\"errLabel\">File content is empty.</label><br><br>";
            } else {
                foreach ($dirContents as $entry) {
                    if (is_dir($rootDir . $entry) and $entry === $dir_name) {
                        $alreadyExists = TRUE;
                        break;
                        }
                }    
                if ($alreadyExists) {
                    return "<label>A directory already exists with that name.</label>";
                } else {

                    $operSuccess = mkdir($dir_name, 0777, true);
                    chmod($dir_name, 0777);

                    if ($operSuccess) {
                        file_put_contents($dir_name . "readme.txt", $data);  
                        return "<label> File Operation Successful</label>";
                    } else {
                        return "<label>File Operation Failed.</label>";
                    }
                }
            }  
        }
    }
?>