<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Games'), ['controller' => 'Games', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Game'), ['controller' => 'Games', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="categories view large-9 medium-8 columns content">
    <h3><?= h($category->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Label') ?></th>
            <td><?= h($category->label) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($category->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($category->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Games') ?></h4>
        <?php if (!empty($category->games)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Nb Min') ?></th>
                <th><?= __('Nb Max') ?></th>
                <th><?= __('Age Min') ?></th>
                <th><?= __('Age Max') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($category->games as $games): ?>
            <tr>
                <td><?= h($games->id) ?></td>
                <td><?= h($games->title) ?></td>
                <td><?= h($games->description) ?></td>
                <td><?= h($games->nb_min) ?></td>
                <td><?= h($games->nb_max) ?></td>
                <td><?= h($games->age_min) ?></td>
                <td><?= h($games->age_max) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Games', 'action' => 'view', $games->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Games', 'action' => 'edit', $games->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Games', 'action' => 'delete', $games->id], ['confirm' => __('Are you sure you want to delete # {0}?', $games->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
