<?php
enum TypeEtat: string{ // --> string obligatoire, il faudra le changer en char dans les méthodes pour la BD qui elle stocke un char
    case Intact = 'I';
    case BonEtat = 'B';
    case Delabre = 'D';

    
    


    // EQUIVALENT CONSTRUCTEUR TYPEETAT
    public static function fromTypeEtat(char $typeEtat){
        return match(true){
            $typeEtat === 'I' => TypeEtat::Intact,
            $typeEtat === 'B' => TypeEtat::BonEtat,
            $typeEtat === 'D' => TypeEtat::Delabre
        };
    }

    //get typeEtat
    /**
     * @return char --> le char correspondant à l'état du fossile
     */
    public function getEtat() : char{
        return $this->value;

    }

    public function getAttributeName() : string{
        switch($this->value){
            case 'I':
                return 'Intact';
            case 'B':
                return 'Bon État';
            case 'D':
                return 'Délabré';
        }

    }

    public static function strToEtat(string $etat) : string{
        switch ($etat){
            case 'I':
                return 'Intact';
            case 'B':
                return 'Bon état';
            case 'D':
                return 'Delabre';
            default:
                throw new Exception("Erreur lors de la conversion du char en TypeEtat");
        }
    }
};
?>