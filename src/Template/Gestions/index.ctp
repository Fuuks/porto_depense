<h3> Liste des depenses total </h3>


<ul>
	<li>Mon profil</li>
	<li> <?php echo $this->Html->link('Seuil',['controller'=>'users','action' => 'edit_seuil',1]); ?></li>
</ul>

		
		
<table>
	<tr>
		
		<th>Somme</th>
		<th>Activite</th>
		<th>Date</th>
	</tr>
	
	<?php foreach ($depenses as $depense): ?>
	
	
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
	<?php endforeach; ?>
	
	
	<tr>
		<td class="" > Total : <?php echo $total; ?> euros</td>
</tr>
</table>
						
