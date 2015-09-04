<div class="text-center">
<h2> Description de la depense </h2>

<p > Somme : <?=  h($depense->somme) ?>e </p>

<p> Activite de la depense :  <?= h($depense->activite) ?></p>

</div>

<p> <?= $this->Html->Link('Retour accueil ',['action' => 'index']) ?> </p>