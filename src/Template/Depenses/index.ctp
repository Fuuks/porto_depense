<h2> Liste des depenses </h2>


<p class=""> Votre montant a ne pas depasser est de : <strong><?= $seuil ?> euros </strong></p>

<p> <?= $this->Html->Link('Ajouter une depense',['action' => 'add']) ?> </p>



<table>
<tr>
	
	<th>Somme</th>
	<th>Activite</th>
	<th>Date</th>
	<th>Options</th>
</tr>

<?php echo $mois; ?>

<?php foreach ($depenses as $depense): ?>

<?php if( $depense->creation->isThisMonth()): ?>
<tr>
	<td> <?php echo $depense->somme; ?> euros</td>
	<td> <?php echo $this->Html->link($depense->activite,['action' => 'view',$depense->id]); ?></td>
	<td> <?php echo $depense->creation->nice('Europe/Paris', 'fr-FR'); ?></td>
	<td> <?= $this->Form->postLink(
		'Supprimer',
		['action' => 'delete',$depense->id],
		['confirm' => 'Etes vous certain ?'])
	 ?>
		
		<?=
			$this->Html->Link('Modifier',['action' => 'edit', $depense->id]);
		?>
	
	</td>

</tr> 
<?php endif; endforeach; ?>


<tr>
	<td class="" > Total : <?php echo $total; ?> euros</td>
</tr>
</table>
