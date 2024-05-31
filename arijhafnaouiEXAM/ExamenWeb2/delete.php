<?php
include('Commande.php');
if ($_SERVER['REQUEST_METHOD']=='POST')

{  
    $plat=new Commande();
    $id=$_POST['id'];

    if($plat->delete_plat($id)){
        echo "header(Location : cart.php) ";
    } else{
        echo " erreur de suppression !";
    }
}
?>