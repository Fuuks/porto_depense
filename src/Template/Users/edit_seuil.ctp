<h2>Gestion du montant</h2>

Seuil actuel : <?php echo $montant ?> euros

<div class="users form " >


<?= $this->Form->create($user) ?>
<fieldset>
	<legend> <?= __('Modifier le seuil') ?> </legend>
	<?= $this->Form->input('seuil') ?>
	

</fieldset>

<?= $this->Form->button(__('Modifier')); ?>
<?= $this->Form->end() ?>

</div>