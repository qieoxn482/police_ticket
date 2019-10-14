<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ViolationsTickets Model
 *
 * @property \App\Model\Table\TicketsTable&\Cake\ORM\Association\BelongsTo $Tickets
 * @property \App\Model\Table\ViolationsTable&\Cake\ORM\Association\BelongsTo $Violations
 *
 * @method \App\Model\Entity\ViolationsTicket get($primaryKey, $options = [])
 * @method \App\Model\Entity\ViolationsTicket newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ViolationsTicket[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ViolationsTicket|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ViolationsTicket saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ViolationsTicket patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ViolationsTicket[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ViolationsTicket findOrCreate($search, callable $callback = null, $options = [])
 */
class ViolationsTicketsTable extends Table
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

        $this->setTable('violations_tickets');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Tickets', [
            'foreignKey' => 'ticket_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Violations', [
            'foreignKey' => 'violation_id',
            'joinType' => 'INNER'
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

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['ticket_id'], 'Tickets'));
        $rules->add($rules->existsIn(['violation_id'], 'Violations'));

        return $rules;
    }
}
