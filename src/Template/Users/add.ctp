<?php
$this->assign('title', $h1);
$this->Html->script(\Cake\Core\Configure::read('reCAPTCHA.scriptFile'), ['block' => true]);
?>
<article>
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend>Identifiants</legend>
        <?= $this->Form->input('email', ['label' => __('Adresse email')]) ?>
        <?= $this->Form->input('email_confirm', ['label' => __('Confirmation de l\'adresse email'), 'type' => 'email', 'required' => true]) ?>
        <?= $this->Form->input('password', ['label' => __('Mot de passe')]) ?>
        <?= $this->Form->input('password_confirm', ['label' => __('Confirmation du mot de passe'), 'type' => 'password', 'required' => true]) ?>
    </fieldset>
    <fieldset>
        <legend>Informations supplémentaires</legend>
        <?= $this->Form->input('firstname', ['label' => __('Prénom')]) ?>
        <?= $this->Form->input('lastname', ['label' => __('Nom')]) ?>
        <?= $this->Form->input('birthday', ['label' => __('Date de naissance')]) ?>
    </fieldset>
    <div
        class="g-recaptcha"
        data-sitekey="<?= \Cake\Core\Configure::read('reCAPTCHA.publicKey') ?>"
        data-theme="light"
    ></div>
    <?= $this->Form->submit(__('Créer le compte')) ?>
    <?= $this->Form->end() ?>
</article>
