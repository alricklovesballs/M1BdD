<?php
$this->assign('title', $h1);
?>
<article>
    <?= $this->Form->create($user) ?>
    <?= $this->Form->input('username', ['label' => __('Pseudonyme')]) ?>
    <?= $this->Form->input('password', ['label' => __('Mot de passe')]) ?>
    <?= $this->Form->submit(__('Connecter'), ['class' => 'button success']) ?>
    <?= $this->Form->end() ?>
    <?= $this->Html->link(__('Pas encore de compte ?'), ['controller' => 'users', 'action' => 'add']) ?>
</article>
