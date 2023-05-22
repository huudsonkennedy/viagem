<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Configuracoes Model
 *
 * @method \App\Model\Entity\Configuraco newEmptyEntity()
 * @method \App\Model\Entity\Configuraco newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Configuraco[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Configuraco get($primaryKey, $options = [])
 * @method \App\Model\Entity\Configuraco findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Configuraco patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Configuraco[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Configuraco|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Configuraco saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Configuraco[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Configuraco[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Configuraco[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Configuraco[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ConfiguracoesTable extends Table
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

        $this->setTable('configuracoes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->scalar('velocidade')
            ->maxLength('velocidade', 45)
            ->allowEmptyString('velocidade');

        $validator
            ->scalar('horasaida')
            ->maxLength('horasaida', 45)
            ->allowEmptyString('horasaida');

        return $validator;
    }
}
