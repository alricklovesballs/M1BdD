<?php
namespace App\Model\Table;

use App\Model\Entity\Game;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Games Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Categories
 */
class GamesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('games');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->belongsToMany('Categories', [
            'foreignKey' => 'game_id',
            'targetForeignKey' => 'category_id',
            'joinTable' => 'categories_games'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->allowEmpty('description');

        $validator
            ->add('nb_min', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('nb_min');

        $validator
            ->add('nb_max', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('nb_max');

        $validator
            ->add('age_min', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('age_min');

        $validator
            ->add('age_max', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('age_max');

        return $validator;
    }
}
