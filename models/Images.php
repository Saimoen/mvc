<?php
namespace models;
class Images extends \app\Model{
    public function __construct()
    {
// Nous définissons la table par défaut de ce modèle
        $this->table = "images";
// Nous ouvrons la connexion à la base de données
        $this->getConnection();
    }
    /**
     * Retourne un article en fonction de son slug
     *
     * @param string $slug
     * @return void
     */
    public function index(){
        $sql = "SELECT * FROM `" . $this->table . "`";
        $query = $this->_connexion->query($sql);
        return $query->fetch_all(MYSQLI_ASSOC);
    }
}
?>