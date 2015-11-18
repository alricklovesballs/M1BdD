<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Event'), ['action' => 'edit', $event->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Event'), ['action' => 'delete', $event->id], ['confirm' => __('Are you sure you want to delete # {0}?', $event->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Event Games'), ['controller' => 'EventGames', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event Game'), ['controller' => 'EventGames', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Event Users'), ['controller' => 'EventUsers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event User'), ['controller' => 'EventUsers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="events view large-9 medium-8 columns content">
    <h3><?= h($event->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($event->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($event->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($event->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Start') ?></th>
            <td><?= h($event->start) ?></td>
        </tr>
        <tr>
            <th><?= __('End') ?></th>
            <td><?= h($event->end) ?></td>
        </tr>
        <tr>
            <th><?= __('Nb Min') ?></th>
            <td><?= h($event->nb_min) ?></td>
        </tr>
        <tr>
            <th><?= __('Nb Max') ?></th>
            <td><?= h($event->nb_max) ?></td>
        </tr>
        <tr>
            <th><?= __('Age Min') ?></th>
            <td><?= h($event->age_min) ?></td>
        </tr>
        <tr>
            <th><?= __('Age Max') ?></th>
            <td><?= h($event->age_max) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Event Games') ?></h4>
        <?php if (!empty($event->event_games)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Event Id') ?></th>
                <th><?= __('Game Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($event->event_games as $eventGames): ?>
            <tr>
                <td><?= h($eventGames->event_id) ?></td>
                <td><?= h($eventGames->game_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'EventGames', 'action' => 'view', $eventGames->event_id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'EventGames', 'action' => 'edit', $eventGames->event_id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'EventGames', 'action' => 'delete', $eventGames->event_id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventGames->event_id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Event Users') ?></h4>
        <?php if (!empty($event->event_users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Event Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Type') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($event->event_users as $eventUsers): ?>
            <tr>
                <td><?= h($eventUsers->event_id) ?></td>
                <td><?= h($eventUsers->user_id) ?></td>
                <td><?= h($eventUsers->type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'EventUsers', 'action' => 'view', $eventUsers->event_id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'EventUsers', 'action' => 'edit', $eventUsers->event_id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'EventUsers', 'action' => 'delete', $eventUsers->event_id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventUsers->event_id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
