<?php
    ini_set('display_errors', true);
    require_once './config/bdd.php';

    $sql = "SELECT l.id, l.titre, l.publication, g.nom AS genre, a.nom, a.prenom 
    FROM livre AS l 
    LEFT JOIN genre AS g ON l.genre = g.id
    JOIN livre_auteur AS la ON l.id = la.livre
    JOIN auteur AS a ON la.auteur = a.id";
    $result = mysqli_query($link, $sql);
    $datas = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $livreModel = ['id', 'titre', 'publication', 'genre'];
    $auteurModel = ['nom', 'prenom'];
    $livres = [];

    foreach($datas as $data){
        $livre = array_intersect_key($data, array_flip($livreModel));
        $auteur = array_intersect_key($data, array_flip($auteurModel));

        $key = array_search($livre['id'], array_column($livres, 'id'));

        if($key === false){
            $livre['auteurs'][] = $auteur;
            $livres[] = $livre;
        } else {
            $livres[$key]['auteurs'][] = $auteur;
        }
    }

    mysqli_close($link);

    $page_title = "Liste des livres";
    require_once './template/header.php';
?>

<h2>Liste des livres disponibles</h2>

<?php if(count($livres) > 0): ?>
    <ul class="list">
    <?php foreach ($livres as $livre): ?>
        <li>
            <a href="./livre.php?id=<?php echo $livre['id']; ?>">
                <?php echo $livre['titre']; ?>
            </a> -
            Genre: <?php echo $livre['genre'] ?? 'Aucun'; ?> -
            <small>Date de publication: <?php echo $livre['publication']; ?></small> -
            Auteurs:
            <?php foreach ($livre['auteurs'] as $key => $auteur){
                echo $auteur['prenom']." ".$auteur['nom'];
                echo (count($livre['auteurs'])-1 != $key ) ? ", ": "";
            } ?>
        </li>
    <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Aucun livres disponibles pour le moment</p>
<?php endif; ?>

<?php require_once './template/footer.php'; ?>
