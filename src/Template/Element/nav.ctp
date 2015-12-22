<?php
$nav = [
    'home' => [
        'url' => '/',
        'txt' => 'Accueil',
    ],
    'events' => [
        'url' => ['controller' => 'events', 'action' => 'index'],
        'txt' => 'Évènements',
    ],
    'members' => [
        'url' => ['controller' => 'users', 'action' => 'index'],
        'txt' => 'Membres',
    ],
    'login' => [
        'url' => ['controller' => 'users', 'action' => 'login'],
        'txt' => 'Connexion',
    ],
];
?>
<nav class="top-bar expanded" data-topbar role="navigation">
    <ul class="title-area large-3 medium-4 columns">
        <li class="name">
            <h1><a href=""><?= $this->fetch('title') ?></a></h1>
        </li>
    </ul>
    <section class="top-bar-section">
        <ul class="right">
            <?php foreach($nav as $id => $n): ?>
                <li><?= $this->Html->link($n['txt'], $n['url'], ['id' => $id]) ?></li>
            <?php endforeach; ?>
        </ul>
    </section>
</nav>