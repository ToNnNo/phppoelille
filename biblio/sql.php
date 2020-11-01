<?php require_once 'toolbox/sqlBuilder.php'; ini_set('display_errors', true)?>

<h1>SQL Builder</h1>

<p>
    <b>Delete:</b> <?php echo delete('livre', 'id = %d', [1]); ?>
</p>

<p>
    <b>Update:</b> <?php echo update('livre', ['resume' => 'bla bla bla [...] bla bla bla'], 'id = 1'); ?>
</p>

<p>
    <b>Insert:</b> <?php echo insert('livre', [
        'titre' => 'Twilight: Fascination',
        'resume' => 'bla bla bla [...] bla bla bla',
        'publication' => '2005-01-01'
    ]); ?>
</p>

<p>
    <b>Select:</b> <?php echo select('livre'); ?>
</p>

<p>
    <b>Select:</b> <?php echo select('livre', ['titre', 'publication' => 'parution', 'genre'], null, ['genre', 'parution'=>'desc']); ?>
</p>

<p>
    <b>Select with join:</b> <?php echo select_with_join('livre', ['genre', 'genre', 'id']); ?>
</p>

<p>
    <b>Select with join:</b> <?php echo select_with_join('livre', ['genre', 'genre', 'id'], ['titre', 'publication' => 'parution', 'nom' => 'genre']); ?>
</p>