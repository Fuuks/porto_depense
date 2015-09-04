
<h1> Liste des utilisateurs </h1>

<table>
	<tr>
		<th> Nom </th>
		<th> Role </th>
		<th> Cree </th>
	
	
	</tr>
	
	
<?php foreach ($users as $user): ?>
		<tr>
			<td> <?= h($user->username) ?> </td>
			<td> <?= h($user->role) ?> </td>
			<td> <?php echo $user->created; ?> </td>
		
		</tr>
<?php endforeach; ?>
	
</table>