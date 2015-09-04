<div class="users form">
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __("Merci de rentrer votre pseudo et mot de passe") ?></legend>
        <?= $this->Form->input('username') ?>
        <?= $this->Form->input('password') ?>
		
    </fieldset>
    <?= $this->Form->button(__('Se Connecter')); ?>

<?= $this->Form->end() ?>
</div>

<div class="text-center">
<span class="">OU</span>

</div>

<div class="text-center">

	<span class="button">
		<?= $this->Html->Link('Inscription',['action' => 'add']); ?>
	</span>

</div>