<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Game'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="games index large-9 medium-8 columns content">
    <h3><?= __('Games') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('nb_min') ?></th>
                <th><?= $this->Paginator->sort('nb_max') ?></th>
                <th><?= $this->Paginator->sort('age_min') ?></th>
                <th><?= $this->Paginator->sort('age_max') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($games as $game): ?>
            <tr>
                <td><?= $this->Number->format($game->id) ?></td>
                <td><?= h($game->title) ?></td>
                <td><?= h($game->description) ?></td>
                <td><?= $this->Number->format($game->nb_min) ?></td>
                <td><?= $this->Number->format($game->nb_max) ?></td>
                <td><?= $this->Number->format($game->age_min) ?></td>
                <td><?= $this->Number->format($game->age_max) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $game->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $game->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $game->id], ['confirm' => __('Are you sure you want to delete # {0}?', $game->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
