<?php
$this->assign('title', 'Membre : ' . h($user->username));
?>
<article class="actions">
    <?php if($authUser && $authUser['role'] === 'admin'): ?>
        <?= $this->Form->postLink('Supprimer', ['controller' => 'users', 'action' => 'delete', $user->id], ['class' => 'button small alert', 'confirme' => __('Êtes vous sûr de vouloir supprimer le membre {0} ?', $user->username)]) ?>
    <?php endif; ?>
    <?php if($authUser && $authUser['id'] === $user->id): ?>
        <?= $this->Html->link('Modifier', ['controller' => 'users', 'action' => 'edit', $user->id], ['class' => 'button small']) ?>
    <?php endif; ?>
</article>
<article>
    <h2><?= h($user->username) ?></h2>
    <table class="vertical-table">
        <tr>
            <th><?= __('Lastname') ?></th>
            <td><?= h($user->lastname) ?></td>
        </tr>
        <tr>
            <th><?= __('Firstname') ?></th>
            <td><?= h($user->firstname) ?></td>
        </tr>
        <tr>
            <th><?= __('Birthday') ?></th>
            <td><?= h($user->birthday) ?></td>
        </tr>
    </table>
</article>
