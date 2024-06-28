<?php
include_once('Particulier.php');
class DAO{
    //Definition des constantes permettant d'ouvrir la BD
    private const HOST = 'localhost';
    private const DBNAME = 'Hopefield';
    private const USER = 'postgres';
    private const PASSWORD = 'root';
    private const  DSN = 'pgsql:host=' . self::HOST . ';dbname=' . self::DBNAME;
    // Instance unique de la classe DAO
    private static $instance = null;
    // Instance de la classe PDO
    private PDO $db;

    // Constructeur privé, crée l'instance de PDO qui sera sollicitée
    private function __construct(){
      
        try{
            $this->db = new PDO(self::DSN, self::USER, self::PASSWORD);
            if (!$this->db) {
                throw new Exception("Impossible d'ouvrir la base de donnee");
                ("Database error");
              }
                // Positionne PDO pour lancer les erreurs sous forme d'exeptions
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            throw new Exception("Erreur PDO : ".$e->getMessage());
        }
    }
    // Retourne l'unique objet DAO de la classe
    /**
     * @return DAO --> l'unique objet DAO de la classe
     */
    public static function get() : DAO {
      // Si l'objet n'a pas encore été crée, le crée
      if(is_null(self::$instance)) {
        self::$instance = new DAO();
      }
      return self::$instance;
    }

    // Exécute une requête SQL de type SELECT et retourne le résultat
    /**
     * @param string $query --> requête SQL à exécuter
     * @param array $data --> tableau associatif des paramètres de la requête
     * @return array --> tableau associatif contenant le résultat de la requête
     * @throws Exception --> PDOException
     * @throws PDOException --> en cas d'erreur de requête
     */
    public function query(string $query, array $data): array {

      try {
        // Compile la requête, produit un PDOStatement
        $statement = $this->db->prepare($query);
        // Exécute la requête avec les données
        $statement->execute($data);
      }catch (Exception $e) {
        // Attrape l'exception pour y ajouter la requête
        throw new PDOException(__METHOD__ . " at " . __LINE__ . ": " . $e->getMessage() . " Query=\"" . $query . '"');
      }

    // Affiche en clair l'erreur PDO si la requête ne peut pas s'exécuter
    if ($statement === false) {
      throw new PDOException(__METHOD__ . " at " . __LINE__ . ": " . implode('|', $this->db->errorInfo()) . " Query=\"" . $query . '"');
    }
    $table = $statement->fetchAll();
    return $table;
  }

      // Exécute une requête SQL de type INSERT, UPDATE ou DELETE
      /**
       * @param string $query --> requête SQL à exécuter
       * @param array $data --> tableau associatif contenant les données à insérer dans la requête
       * @return bool --> true si la requête a réussi, false sinon
       * @throws PDOException --> si la requête ne peut pas s'exécuter
       */
      public function exec(string $query,array $data) {

        try {
          // Compile la requête, produit un PDOStatement
          $statement = $this->db->prepare($query);
          // Exécute la requête avec les données
          $statement->execute($data);
        }catch (Exception $e) {
          // Attrape l'exception pour y ajouter la requête
          throw new PDOException(__METHOD__ . " at " . __LINE__ . ": " . $e->getMessage() . " Query=\"" . $query . '"');
        }
        // Affiche en clair l'erreur PDO si la requête ne peut pas s'exécuter
        if ($statement === false) {
          throw new PDOException(__METHOD__ . " at " . __LINE__ . ": " . implode('|', $this->db->errorInfo()) . " Query=\"" . $query . '"');
        }
      }
      
      public function findParticulier(string $login) : array {
        $query = "SELECT login_p, mdp FROM particulier WHERE login_p = :login";
        $data = array(':login' => $login);
        $table = $this->query($query, $data);
        return $table;
      }
}
?>
