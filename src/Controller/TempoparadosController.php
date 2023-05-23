<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Tempoparados Controller
 *
 * @property \App\Model\Table\TempoparadosTable $Tempoparados
 * @method \App\Model\Entity\Tempoparado[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TempoparadosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cidades'],
        ];
        $tempoparados = $this->paginate($this->Tempoparados);

        $this->set(compact('tempoparados'));
    }

    /**
     * View method
     *
     * @param string|null $id Tempoparado id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tempoparado = $this->Tempoparados->get($id, [
            'contain' => ['Cidades'],
        ]);

        $this->set(compact('tempoparado'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tempoparado = $this->Tempoparados->newEmptyEntity();
        if ($this->request->is('post')) {
            $tempoparado = $this->Tempoparados->patchEntity($tempoparado, $this->request->getData());
            if ($this->Tempoparados->save($tempoparado)) {
               // $this->Flash->success(__('The tempoparado has been saved.'));

                return $this->redirect(['Controller'=>'Pages','action' => 'index']);
            }
            //$this->Flash->error(__('The tempoparado could not be saved. Please, try again.'));
        }
        $cidades = $this->Tempoparados->Cidades->find('list', ['limit' => 200])->all();
        $this->set(compact('tempoparado', 'cidades'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tempoparado id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tempoparado = $this->Tempoparados->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tempoparado = $this->Tempoparados->patchEntity($tempoparado, $this->request->getData());
            if ($this->Tempoparados->save($tempoparado)) {
               // $this->Flash->success(__('The tempoparado has been saved.'));

              //  return $this->redirect(['action' => 'index']);
            }
         //   $this->Flash->error(__('The tempoparado could not be saved. Please, try again.'));
        }
        $cidades = $this->Tempoparados->Cidades->find('list', ['limit' => 200])->all();
        $this->set(compact('tempoparado', 'cidades'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tempoparado id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tempoparado = $this->Tempoparados->get($id);
        if ($this->Tempoparados->delete($tempoparado)) {
            $this->Flash->success(__('The tempoparado has been deleted.'));
        } else {
            $this->Flash->error(__('The tempoparado could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
