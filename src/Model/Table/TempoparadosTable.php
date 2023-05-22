<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tempoparados Model
 *
 * @property \App\Model\Table\CidadesTable&\Cake\ORM\Association\BelongsTo $Cidades
 *
 * @method \App\Model\Entity\Tempoparado newEmptyEntity()
 * @method \App\Model\Entity\Tempoparado newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Tempoparado[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tempoparado get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tempoparado findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Tempoparado patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tempoparado[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tempoparado|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tempoparado saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tempoparado[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tempoparado[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tempoparado[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Tempoparado[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TempoparadosTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('tempoparados');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Cidades', [
            'foreignKey' => 'cidade_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('tempo')
            ->maxLength('tempo', 45)
            ->allowEmptyString('tempo');

        $validator
            ->integer('cidade_id')
            ->allowEmptyString('cidade_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('cidade_id', 'Cidades'), ['errorField' => 'cidade_id']);

        return $rules;
    }
}
