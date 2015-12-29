<?php
$this->assign('title', 'Evénement : ' . h($event->title));
?>
<article class="actions">
    <?php if($authUser && $authUser['role'] === 'admin'): ?>
        <?= $this->Html->link('Modifier', ['controller' => 'events', 'action' => 'edit', $event->id], ['class' => 'button small']) ?>
        <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $event->id], ['class' => 'button small alert', 'confirm' => __('Êtes-vous sûr de vouloir supprimer {0}?', $event->title)]) ?>
    <?php endif; ?>
</article>
<article class="event-view">
    <h2 class="event-title"><?= h($event->title) ?></h2>
    <div class="event-date"><?= $this->element('calendar-day', ['date' => $event->start]) ?></div>
    <div class="event-description"><?= h($event->description) ?></div>
    <div class="event-data-sup">
        <strong>Âges : </strong><?php if($event->age_min === null && $event->age_max === null) echo __('Tous'); else { if($event->age_min !== null) echo __('à partir de {0} ans ', $this->Number->format($event->age_min)); if($event->age_max !== null) echo __('jusqu\'à {0} ans', $this->Number->format($event->age_max)); } ?>
        <br>
        <strong>Nombre de places : </strong>minimum : <?= $this->Number->format($event->nb_min) ?>, maximum : <?= $this->Number->format($event->nb_max) ?>
        <br>
        <strong>Nombre de participants : </strong>0
        <br>
        <strong>Fin de l'événement : </strong><?= $event->end->i18nFormat('dd/MM/yyyy HH:mm') ?>
    </div>
</article>