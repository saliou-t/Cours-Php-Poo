<?php
/**
 * Une fonction pour l'affichage de title et de contenue 
 */
function render(string $path, array $variables = []){ 

    extract($variables); //fonction d'extration des variable du tableau en de réelles variables
    ob_start();

    require('templates/'.$path.'.html.php');
    $pageContent = ob_get_clean();
    
    require('templates/layout.html.php');
}
/**
 * Une fonction de redirection
 */
function redirect($path){
    header("Location: $path");
    exit();
}

function findCommentaire(int $id): array{
    $pdo = getPdo();
    $query = $pdo->prepare("SELECT * FROM comments WHERE article_id = :article_id");
    $query->execute(['article_id' => $id]);
    $commentaires = $query->fetchAll();

    return $commentaires;

}