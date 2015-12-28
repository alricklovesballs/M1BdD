<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Event'), ['action' => 'edit', $event->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Event'), ['action' => 'delete', $event->id], ['confirm' => __('Are you sure you want to delete # {0}?', $event->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['action' => 'add']) ?> </li>
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
            <th><?= __('Nb Min') ?></th>
            <td><?= $this->Number->format($event->nb_min) ?></td>
        </tr>
        <tr>
            <th><?= __('Nb Max') ?></th>
            <td><?= $this->Number->format($event->nb_max) ?></td>
        </tr>
        <tr>
            <th><?= __('Age Min') ?></th>
            <td><?= $this->Number->format($event->age_min) ?></td>
        </tr>
        <tr>
            <th><?= __('Age Max') ?></th>
            <td><?= $this->Number->format($event->age_max) ?></td>
        </tr>
        <tr>
            <th><?= __('Start') ?></th>
            <td><?= $this->element('calendar-day', ['date' => $event->start]) ?></td>
        </tr>
        <tr>
            <th><?= __('End') ?></th>
            <td><?= $this->element('calendar-day', ['date' => $event->end]) ?></td>
        </tr>
    </table>
</div>
