<?php

namespace controllers;

class Images extends \app\Controller
{
        // Declare the property $Images
        public $Images;

        /**
         * Cette méthode affiche la liste des articles
         *
         * @return void
         */
        public function index()
        {
                // On instancie le modèle "Images"
                $this->loadModel('Images');
                // On stocke la liste des images dans $images
                $images = $this->Images->index();
                // On envoie les données à la vue index
                $this->render('index', compact('images'));
        }
}
