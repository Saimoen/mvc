<?php

namespace app;

abstract class Model
{
    // Informations de la base de données
    private $host = "localhost";
    private $db_name = "mvc";
    private $username = "root";
    private $password = "root";
    // Propriété qui contiendra l'instance de la connexion
    protected $_connexion;
    // Propriétés permettant de personnaliser les requêtes
    public $table;
    public $id;

    /**
     * Fonction d'initialisation de la base de données
     *
     * @return void
     */
    public function getConnection()
    {
        // On supprime la connexion précédente
        $this->_connexion = null;
        // On essaie de se connecter à la base
        try {
            $this->_connexion = new \mysqli($this->host, $this->username, $this->password, $this->db_name);
            $this->_connexion->set_charset("utf8");
        } catch (\mysqli_sql_exception $exception) {
            echo "Erreur de connexion : " . $exception->getMessage();
        }
    }
    /**
     * Méthode permettant d'obtenir un enregistrement
     * de la table choisie en fonction d'un id
     *
     * @return void
     */
    public function getOne()
    {
        $sql = "SELECT * FROM `" . $this->table . "`WHERE `id`=" . $this->id;
        $query = $this->_connexion->query($sql);
        return $query->fetch_assoc();
    }
    /**
     * Méthode permettant d'obtenir tous les
     * enregistrements de la table choisie
     *
     * @return void
     */
    public function getAll()
    {
        $sql = "SELECT * FROM `{$this->table}`";
        $query = $this->_connexion->query($sql);
        return $query->fetch_all(MYSQLI_ASSOC);
    }
    /**
     * Permet de charger un modèle
     *
     * @param string $model
     * @return void
     */
    public function loadModel(string $model)
    {
        // On va chercher le fichier correspondant au modèle souhaité
        require_once(ROOT . 'models/' . $model . '.php');
        // Le modèle souhaité se trouve dans le namespace models
        $c_model = "\\models\\" . $model;
        // On crée une instance de ce modèle. Ainsi "Articles" sera accessible par $this->Articles
        $this->$model = new $c_model();
    }

    /**
     * Afficher une vue
     *
     * @param string $fichier
     * @param array $data
     * @return void
     */
    public function render(string $fichier, array $data = [])
    {
        // Récupère les données et les extrait sous forme de variables
        extract($data);
        // Crée le chemin et inclut le fichier de vue
        require_once(ROOT . 'views/' . explode("\\", strtolower(get_class($this)))[1] . '/' . $fichier . '.php');
    }
}
