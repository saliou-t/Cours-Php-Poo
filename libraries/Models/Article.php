<?php
    require_once('../database.php');
    class Article {
            
        /**
         * Fonction de recherche de tous les articles
         */

        public function findAllArticles(): array{
            $pdo = getPdo();
            $resultats = $pdo->query('SELECT * FROM articles ORDER BY created_at DESC');
            // On fouille le résultat pour en extraire les données réelles
            $articles = $resultats->fetchAll();
            return $articles;
        }

        
        /**
         * Fonction qui premet de rechercher un article
         * @return array
         */
        public function findArticle(int $id){
            $pdo = getPdo();
            $query = $pdo->prepare("SELECT * FROM articles WHERE id = :article_id");

            // On exécute la requête en précisant le paramètre :article_id 
            $query->execute(['article_id' => $id]);

            $resultats = $query->fetchAll();

            return $resultats;
        }
        /**
         * Fonction de suppréssion d'un article
        */

        public function deleteArticle(int $id):void{

            $pdo = getPdo();
            $query = $pdo->prepare('DELETE FROM articles WHERE id = :id');
            $query->execute(['id' => $id]);
        }
    }