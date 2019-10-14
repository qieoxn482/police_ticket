<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tickets Model
 *
 * @property \App\Model\Table\ViolationsTable&\Cake\ORM\Association\BelongsToMany $Violations
 *
 * @method \App\Model\Entity\Ticket get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ticket newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ticket[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ticket|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ticket saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ticket patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ticket[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ticket findOrCreate($search, callable $callback = null, $options = [])
 */
class TicketsTable extends Table
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

        $this->setTable('tickets');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Violations', [
            'foreignKey' => 'ticket_id',
            'targetForeignKey' => 'violation_id',
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
            ->scalar('licence_plate')
            ->maxLength('licence_plate', 255)
            ->requirePresence('licence_plate', 'create')
            ->notEmptyString('licence_plate');

        $validator
            ->dateTime('datetime_issued')
            ->notEmptyDateTime('datetime_issued');

        $validator
            ->dateTime('datetime_paid')
            ->allowEmptyDateTime('datetime_paid');

        return $validator;
    }
}
