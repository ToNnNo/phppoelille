<?php
require_once './config/bdd.php';

$sql = "SELECT l.id, l.titre, l.publication, g.nom AS genre, concat(a.nom, ' ', a.prenom) 
    FROM livre AS l 
    LEFT JOIN genre AS g ON l.genre = g.id
    JOIN livre_auteur AS la ON l.id = la.livre
    JOIN auteur AS a ON la.auteur = a.id";

$result = mysqli_query($link, $sql);
$datas = mysqli_fetch_all($result, MYSQLI_ASSOC);

$livreModel = ['id', 'titre', 'publication', 'genre'];
$auteurModel = ['nom', 'prenom'];

$livres = [];

echo "<pre>";

// var_dump(array_intersect_key($datas[0], array_flip($livreModel)));

foreach($datas as $data){
    $livre = array_intersect_key($data, array_flip($livreModel));
    $auteur = array_intersect_key($data, array_flip($auteurModel));

    /*foreach ($data as $key => $value) {
        if( in_array($key, $livreModel) ){
            $livre[$key] = $value;
        }elseif(in_array($key, $auteurModel) ){
            $auteur[$key] = $value;
        }
    }*/

    $key = array_search($livre['id'], array_column($livres, 'id'));

    if($key === false){
        $livre['auteur'][] = $auteur;
        $livres[] = $livre;
    } else {
        $livres[$key]['auteur'][] = $auteur;
    }

}

/*$livres = array_map(function($data) use ($livreModel, $auteurModel) {

    $livre = [];
    $auteur = [];

    foreach ($data as $key => $value) {
        if( in_array($key, $livreModel) ){
            $livre[$key] = $value;
        }elseif(in_array($key, $auteurModel) ){
            $auteur[$key] = $value;
        }
    }

    $livre['auteur'] = $auteur;

    return $livre;

}, $livres);*/

print_r($livres);