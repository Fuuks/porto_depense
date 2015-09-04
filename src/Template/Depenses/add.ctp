<h1>Ajouter Article</h1>

<?php
    echo $this->Form->create($depense);
    echo $this->Form->input('somme');
    echo $this->Form->input('activite');
    echo $this->Form->button(__('Ajout'));
    echo $this->Form->end();
?>

<p> <?= $this->Html->Link('Retour accueil ',['action' => 'index']) ?> </p>