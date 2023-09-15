<?php
namespace App\Utils;
class Utilitaire{
    public static function cleanInput(?string $valeur):?string{
        //trim = supprimer les espaces en début de chaine
        // strip_tags enleve les balises de script
        return htmlspecialchars(strip_tags(trim($valeur)));

    }
}
?>