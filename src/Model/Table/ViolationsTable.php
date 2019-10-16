<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Violations Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property &\Cake\ORM\Association\BelongsToMany $Files
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
        $this->addBehavior('Translate', ['fields' => ['title']]);
        parent::initialize($config);

        $this->setTable('violations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Files', [
            'foreignKey' => 'violation_id',
            'targetForeignKey' => 'file_id',
            'joinTable' => 'files_violations'
        ]);
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
            ->scalar('fee_amount')
            ->maxLength('fee_amount', 255)
            ->requirePresence('fee_amount', 'create')
            ->notEmptyString('fee_amount');

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

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
