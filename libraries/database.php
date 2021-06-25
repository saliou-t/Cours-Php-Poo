<?php
/**
 * Retourne une conexino à la base de données
 * @return PDO
 */
    function getPdo() :PDO
    {
        $pdo = new PDO('mysql:host=localhost;dbname=blogpoo;charset=utf8', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
         ]);
        return $pdo;
    }

    /**
     * Une fonction de suppréssion de commentaire
     */

    function deleteCommentaire(int $id):void{
        $pdo = getPdo();
        $query = $pdo->prepare('DELETE FROM comments WHERE id = :id');
        $query->execute(['id' => $id]);
    }
    /**
     * Une fonction qui permet de sauvegarder les commentaires postés
     */
    
    function saveCommentaire(string $author, string $content, int $article_id):void{

        $pdo = getPdo();
        $query = $pdo->prepare('INSERT INTO comments SET author = :author, content = :content, article_id = :article_id, created_at = NOW()');
        $query->execute(compact('author', 'content', 'article_id'));
    }