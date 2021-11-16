<?php

    require_once "Crud.php";

    class Upload{

        private $fileName;
        private $fileSize;
        private $fileType;
        private $fileEnteredName;

        function __construct() {

            $this->fileSize = $_FILES["selectedFile"]["size"];
            $this->fileType = $_FILES["selectedFile"]["type"];
            $this->fileName = $_FILES["selectedFile"]["name"];
            $this->enteredFileName = $_POST['enteredFileName'];
        }

        function checkFile(){
  
            if($this->fileSize > 100000){
                return "This file is too big.";
            }
            else if($this->fileType != "application/pdf"){
                return "File type is not okay. It must be a pdf file.";
            }else{
                return $this->moveFile();
            }   
        }

        function moveFile(){

           try{

                $crud = new Crud();
               return $crud->addFile();
                  
            }catch(PDOException $e){
                return "There was a problem uploading your file. Please try again.";
            }
        }

    } 

?>