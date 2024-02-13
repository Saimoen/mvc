<?php

namespace app;

abstract class Controller
{
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
    public function render(string $fichier, array $data = []){
// Récupère les données et les extrait sous forme de variables
        extract($data);
// Crée le chemin et inclut le fichier de vue
        require_once(ROOT.'views/'.explode("\\",strtolower(get_class($this))
            )[1].'/'.$fichier.'.php');
    }
}
