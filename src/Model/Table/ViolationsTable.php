<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Violations Model
 *
 * @property \App\Model\Table\TicketsTable&\Cake\ORM\Association\BelongsToMany $Tickets
 *
 * @method \App\Model\Entity\Violation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Violation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Violation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Violation|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Violation saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Violation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Violation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Violation findOrCreate($search, callable $callback = null, $options = [])
 */
class ViolationsTable extends Table
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

        $this->setTable('violations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Tickets', [
            'foreignKey' => 'violation_id',
            'targetForeignKey' => 'ticket_id',
            'joinTable' => 'violations_tickets'
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('vehicule_licence')
            ->maxLength('vehicule_licence', 8)
            ->requirePresence('vehicule_licence', 'create')
            ->notEmptyString('vehicule_licence');

        $validator
            ->dateTime('violation_datetime')
            ->requirePresence('violation_datetime', 'create')
            ->notEmptyDateTime('violation_datetime');

        $validator
            ->scalar('violation_description')
            ->maxLength('violation_description', 255)
            ->requirePresence('violation_description', 'create')
            ->notEmptyString('violation_description');

        return $validator;
    }
}
