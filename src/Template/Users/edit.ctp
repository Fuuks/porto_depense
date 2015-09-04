<h1> Ajout User </h1>

<div class="users form " >


<?= $this->Form->create($user) ?>
<fieldset>
	<legend> <?= __('Ajouter un utilisateur') ?> </legend>
	<?= $this->Form->input('username') ?>
	<?= $this->Form->input('password') ?>

</fieldset>

<?= $this->Form->button(__('S inscrire')); ?>
<?= $this->Form->end() ?>

</div>