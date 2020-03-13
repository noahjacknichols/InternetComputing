

<?php 
session_start();
if(!isset($_SESSION['user'])){
    $id = $_GET['PaintingID'];
    if(!empty($id)){
        $fileName = $_GET['ImageFileName'];
        if(!empty($fileName)){
            $title = $_GET['Title'];
            if(!empty($title)){
                //we do the thing.
            }
        }
    }
}

?> 