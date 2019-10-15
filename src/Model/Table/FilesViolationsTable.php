<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FilesViolations Model
 *
 * @property \App\Model\Table\ViolationsTable&\Cake\ORM\Association\BelongsTo $Violations
 * @property \App\Model\Table\FilesTable&\Cake\ORM\Association\BelongsTo $Files
 *
 * @method \App\Model\Entity\FilesViolation get($primaryKey, $options = [])
 * @method \App\Model\Entity\FilesViolation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FilesViolation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FilesViolation|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FilesViolation saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FilesViolation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FilesViolation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FilesViolation findOrCreate($search, callable $callback = null, $options = [])
 */
class FilesViolationsTable extends Table
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

        $this->setTable('files_violations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Violations', [
            'foreignKey' => 'violation_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Files', [
            'foreignKey' => 'file_id',
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
        $rules->add($rules->existsIn(['violation_id'], 'Violations'));
        $rules->add($rules->existsIn(['file_id'], 'Files'));

        return $rules;
    }
}
