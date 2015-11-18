<?php
namespace App\Model\Table;

use App\Model\Entity\Event;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Events Model
 *
 * @property \Cake\ORM\Association\HasMany $EventGames
 * @property \Cake\ORM\Association\HasMany $EventUsers
 */
class EventsTable extends Table
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

        $this->table('events');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->hasMany('EventGames', [
            'foreignKey' => 'event_id'
        ]);
        $this->hasMany('EventUsers', [
            'foreignKey' => 'event_id'
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
            ->add('start', 'valid', ['rule' => 'datetime'])
            ->requirePresence('start', 'create')
            ->notEmpty('start');

        $validator
            ->add('end', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('end');

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
