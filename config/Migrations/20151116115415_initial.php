<?php

use Phinx\Migration\AbstractMigration;

class Initial extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {

        $table = $this->table('categories');
        $table
            ->addColumn('label', 'string', ['limit' => 100])
            ->addColumn('description', 'string', ['null' => true])
            ->create();

        $table = $this->table('categories_games', ['id' => false, 'primary_key' => ['category_id', 'game_id']]);
        $table
            ->addColumn('category_id', 'integer')
            ->addColumn('game_id', 'integer')
            ->create();

        $table = $this->table('events');
        $table
            ->addColumn('title', 'string', ['limit' => 100])
            ->addColumn('description', 'string', ['null' => true])
            ->addColumn('start', 'datetime')
            ->addColumn('end', 'datetime', ['null' => true])
            ->addColumn('nb_min', 'datetime', ['null' => true])
            ->addColumn('nb_max', 'datetime', ['null' => true])
            ->addColumn('age_min', 'datetime', ['null' => true])
            ->addColumn('age_max', 'datetime', ['null' => true])
            ->create();

        $table = $this->table('event_games', ['id' => false, 'primary_key' => ['event_id', 'game_id']]);
        $table
            ->addColumn('event_id', 'integer')
            ->addColumn('game_id', 'integer')
            ->create();

        $table = $this->table('event_users', ['id' => false, 'primary_key' => ['event_id', 'user_id']]);
        $table
            ->addColumn('event_id', 'integer')
            ->addColumn('user_id', 'integer')
            ->addColumn('type', 'string', ['limit' => 15, 'default' => 'participant'])
            ->create();

        $table = $this->table('games');
        $table
            ->addColumn('title', 'string', ['limit' => 100])
            ->addColumn('description', 'string', ['null' => true])
            ->addColumn('nb_min', 'datetime', ['null' => true])
            ->addColumn('nb_max', 'datetime', ['null' => true])
            ->addColumn('age_min', 'datetime', ['null' => true])
            ->addColumn('age_max', 'datetime', ['null' => true])
            ->create();

        $table = $this->table('users');
        $table
            ->addColumn('username', 'string', ['limit' => 100])
            ->addColumn('password', 'string')
            ->addColumn('lastname', 'string', ['limit' => 100])
            ->addColumn('firstname', 'string', ['limit' => 100])
            ->addColumn('gender', 'boolean', ['null' => true])
            ->addColumn('birthday', 'datetime')
            ->addColumn('email', 'string', ['limit' => 150])
            ->create();

    }
}
