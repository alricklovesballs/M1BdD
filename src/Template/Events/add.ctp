<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Events'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="events form large-9 medium-8 columns content">
    <?= $this->Form->create($event) ?>
    <fieldset>
        <legend><?= __('Add Event') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('description');
            echo $this->Form->input('start');
            echo $this->Form->input('end');
            echo $this->Form->input('nb_min');
            echo $this->Form->input('nb_max');
            echo $this->Form->input('age_min');
            echo $this->Form->input('age_max');
            echo $this->Form->input('games._ids', ['multiple' => 'checkbox']); // @see http://book.cakephp.org/3.0/fr/views/helpers/form.html#creation-d-elements-de-formulaire
        ?>
    </fieldset>
    <?= $this->Form->button(__('Créer'), ['class' => 'button success']) ?>
    <?= $this->Form->end() ?>
</div>
