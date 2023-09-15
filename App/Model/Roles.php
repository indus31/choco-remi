<?php
namespace App\Model;
use App\Utils\BddConnect;
class Roles extends BddConnect{
    //Attributs
    private ?int $id_roles;
    private ?string $nom_roles;
    //constructeur
    //Getters et Setters
    public function getId():?int{
        return $this->id_roles;
    }
    public function setId(?int $id){
        $this->id_roles = $id;
    }
    public function getNom():?string{
        return $this->nom_roles;
    }
    public function setNom(?string $nom){
        $this->nom_roles = $nom;
    }
    public function add(){
        try {
            //récupérer les données de l'objet
            $nom = $this->nom_roles;
            $req = $this->connexion()->prepare(
                "INSERT INTO roles(nom_roles) VALUES(?)");
            $req->bindParam(1, $nom, \PDO::PARAM_STR);
            $req->execute();
        } catch (\Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }
    public function findOneBy(){
        try {
            //récupérer les données de l'objet
            $nom = $this->nom_roles;
            $req = $this->connexion()->prepare(
                "SELECT nom_roles FROM roles WHERE nom_roles = ?");
            $req->bindParam(1,$nom, \PDO::PARAM_STR);
            $req->setFetchMode(\PDO::FETCH_CLASS| \PDO::FETCH_PROPS_LATE, Utilisateur::class);
            $req->execute();
            return $req->fetch();
        } catch (\Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }
}
?>