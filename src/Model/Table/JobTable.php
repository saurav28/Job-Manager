<?php
namespace App\Model\Table;

use App\Model\Entity\Job;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Job Model
 */
class JobTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('job');
        $this->displayField('name');
        $this->primaryKey('id');
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
            ->allowEmpty('name');
            
        $validator
            ->add('status', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('status');
            
        $validator
            ->allowEmpty('comment');
            
        $validator
            ->requirePresence('link', 'create')
            ->notEmpty('link');
            
        $validator
            ->add('applied_date', 'valid', ['rule' => 'date'])
            ->requirePresence('applied_date', 'create')
            ->notEmpty('applied_date');
            
        $validator
            ->add('userid', 'valid', ['rule' => 'numeric'])
            ->requirePresence('userid', 'create')
            ->notEmpty('userid');

        return $validator;
    }
}
