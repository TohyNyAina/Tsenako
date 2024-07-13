<?php
    function Connected():bool{
        if(session_status()==PHP_SESSION_NONE){
            session_start();
            return(!empty($_SESSION['user']));
        }
    }
    function Auth(){
        if(!Connected()){
            header('Location: ../View/client/medicament.php');
            exit();
        }
    }
?>