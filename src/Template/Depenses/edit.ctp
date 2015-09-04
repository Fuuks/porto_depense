<h1> Modifier un article </h1>

<?php
    echo $this->Form->create($depense);
    echo $this->Form->input('somme');
    echo $this->Form->input('activite');
    echo $this->Form->button(__('Modifier'));
    echo $this->Form->end();
?>

<p> <?= $this->Html->Link('Retour accueil ',['action' => 'index']) ?> </p>