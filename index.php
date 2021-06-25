<?php
require_once('libraries/database.php');
require_once('libraries/utils.php');
require('libraries/Models/Article.php');

$article = new Article;

$articles = $article->findAllArticles();

$pageTitle = "Accueil";
render('articles/index', compact('articles', 'pageTitle'));
