<?php
// namespace Tests;

include_once "TypeEtat.php";
include_once "DAO.php";

class Fossile {
    private int $id;
    private string $nom;
    private array $images;
    private TypeEtat $etat;
    private float $longueur;
    private float $largeur;
    private float $hauteur;
    private string $description;


    // CONSTRUCTEUR FOSSILE
    public function __construct(string $nom, array $images, string $etat, float $longueur, float $largeur, float $hauteur, string $description){
        $this->id = Fossile::getLastId() +1;
        $this->nom = $nom;
        $this->images = $images;
        $this->etat = Fossile::strToEtat($etat);
        $this->longueur = $longueur;
        $this->largeur = $largeur;
        $this->hauteur = $hauteur;
        $this->description = $description;
    }

    // DEBUT GETTERS
    public function getLongueur() : float{
        return $this->longueur;
    }

    public function getImage() : array{
        return $this->images;
    }

    public function getLargeur() : float{
        return $this->largeur;
    }

    public function getHauteur() : float{
        return $this->hauteur;
    }

    public function getDescription() : string{
        return $this->description;
    }

    public function getEtat() : TypeEtat{
        return $this->etat;
    }

    public function getNom() : string{
        return $this->nom;
    }
    public function getId() : int{
        return $this->id;
    }
    // FIN GETTERS

    // DEBUT SETTERS
    public function setLongueur(float $longueur) : void{
        $this->longueur = $longueur;
    }

    public function setImage(string $image) : void{
        $this->image = $image;
    }

    public function setLargeur(float $largeur) : void{
        $this->largeur = $largeur;
    }

    public function setHauteur(float $hauteur) : void{
        $this->hauteur = $hauteur;
    }

    public function setDescription(string $description) : void{
        $this->description = $description;
    }

    public function setEtat(TypeEtat $etat) : void{
        $this->etat = $etat;
    }
    // FIN SETTERS

    // DEBUT ADDERS
    public function addImage(string $image) : void{
        $this->images[] = $image;
    }
    // FIN ADDERS
    public static function strToEtat(string $etat) : TypeEtat{
        switch ($etat){
            case 'I':
                return TypeEtat::Intact;
            case 'B':
                return TypeEtat::BonEtat;
            case 'D':
                return TypeEtat::Delabre;
            default:
                throw new Exception("Erreur lors de la conversion du char en TypeEtat");
        }
    }

    // FONCTION CREATE --- FOSSILE
    /**
     * @throws Exception --> si la requête échoue
     */
    public function create(){
        // id nom images etat longueur largeur hauteur description
        $dao = DAO::get();

        $id = $this->id;
        $nom = $this->nom;
        $images = $this->images;
        $etat = $this->getEtat()->value; // pour récup le char ( B, I ou D )
        $longueur = $this->longueur;
        $largeur = $this->largeur;
        $hauteur = $this->hauteur;
        $description = $this->description;

        $query = 'INSERT INTO Fossile VALUES (:id, :nom, :etat, :longueur, :largeur, :hauteur, :description)';
        $data = ['id' => $id, ':nom' => $nom, ':etat' => $etat, ':longueur' => $longueur, ':largeur' => $largeur,
            ':hauteur' => $hauteur, ':description' => $description];

        $stmt = $dao->exec($query, $data);

        if ($stmt === false){
        throw new Exception("Erreur lors de la création du fossile");
        }


        foreach ($images as $image){
            $query2 = 'INSERT INTO FOSSILE_IMAGE VALUES (:id, :image)';
            $data2 = [':id' => $id, ':image' => $image];

            $stmt2 = $dao->exec($query2, $data2);

            if ($stmt2 === false){
                throw new Exception("Erreur lors de la création d'une image");
            }
        }
        
    }

    // FONCTION READ --- FOSSILE
    /**
     * @throws Exception --> si erreur lors de la lecture du fossile
     * @return Fossile --> le fossile lu
     * @param int $id --> id du fossile à lire
     */
    public static function read(int $id){
        $query = 'SELECT * FROM Fossile WHERE id = :id';
        $data = [':id' => $id];

        $dao = DAO::get();
        $stmt = $dao->query($query, $data);
        if ($stmt === false){
            throw new Exception("Erreur lors de la lecture du fossile");
        }

        $fossile = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($fossile === false){
            throw new Exception("Le fossile n'existe pas");
        }
        $fossile = new Fossile($fossile['nom'], $fossile['images'], $fossile['etat'], $fossile['longueur'], $fossile['largeur'],
            $fossile['hauteur'], $fossile['description']);
        return $fossile;

    }

    // Récupérer l'id du dernier fossile dans la base de données, si l'id est null, on renvoie 0
    /**
     * @throws Exception --> si erreur lors de la lecture du dernier id
     * @return int --> id du dernier fossile
     */
    public static function getLastId(){
        $query = 'SELECT id FROM Fossile ORDER BY id DESC LIMIT :limit';
        $data = [':limit' => 1];
        $dao = DAO::get();
        $stmt = $dao->query($query,$data);
        
        if ($stmt === false){
            throw new Exception("Erreur lors de la lecture du dernier id");
        }
        if(count($stmt) == 0){
            return 0;
        }
        else{
            return $stmt[0]['id'];  
        }   
        
        
    }

    public static function recupInfoFossile(int $id) : array{
        $query = 'SELECT * FROM Fossile WHERE id = :id';
        $data = [':id' => $id];
        $queryImage = 'SELECT * FROM Fossile_Image WHERE id = :id';
        $dao = DAO::get();
        $stmt = $dao->query($query, $data);
        $stmtImage = $dao->query($queryImage, $data);
        
        if ($stmt === false){
            throw new Exception("Erreur lors de la lecture du fossile");
        }
        $info = array();
        $info['nom'] = $stmt[0]['nom'];
        $info['etat'] = TypeEtat::strToEtat($stmt[0]['etat']);
        $info['image'] = $stmtImage[0]['image'];
        return $info;
    }
}
?>