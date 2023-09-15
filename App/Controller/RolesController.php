<?php
namespace App\Controller;
// use App\Model\Roles;

use App\Model\Roles;
use App\Utils\Utilitaire;

class RolesController extends Roles{
    public function addRoles(){
        $error = "";
        //tester si le formulaire
        if(isset($_POST['submit'])){
            //test si les champs sont remplis
            if(!empty($_POST['nom_roles'])){
                $this->setNom(Utilitaire::cleanInput($_POST['nom_roles'])); 
                if(!$this->findOneBy()){    
                    //tester si le compte existe
                    $this->add(); 
                    $error = "Le role a été ajouté en BDD";
                }else{
                    $error = "Le role existe déja";
                }
            }else{
                $error = "il faut remplir le formulaire pour envoyer quelque chose Bozo";
            } 
        }
        include './App/Vue/vueAddRoles.php';
    }

}






?>