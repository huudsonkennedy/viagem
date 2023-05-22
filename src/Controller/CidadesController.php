<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Cidades Controller
 *
 * @property \App\Model\Table\CidadesTable $Cidades
 * @method \App\Model\Entity\Cidade[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CidadesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $cidades = $this->paginate($this->Cidades);

        $this->set(compact('cidades'));
    }

    /**
     * View method
     *
     * @param string|null $id Cidade id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cidade = $this->Cidades->get($id, [
            'contain' => ['Tempoparados'],
        ]);

        $this->set(compact('cidade'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cidade = $this->Cidades->newEmptyEntity();
        if ($this->request->is('post')) {
            $cidade = $this->Cidades->patchEntity($cidade, $this->request->getData());
            if ($this->Cidades->save($cidade)) {
                $this->Flash->success(__('The cidade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cidade could not be saved. Please, try again.'));
        }
        $this->set(compact('cidade'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cidade id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cidade = $this->Cidades->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cidade = $this->Cidades->patchEntity($cidade, $this->request->getData());
            if ($this->Cidades->save($cidade)) {
                $this->Flash->success(__('The cidade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cidade could not be saved. Please, try again.'));
        }
        $this->set(compact('cidade'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cidade id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cidade = $this->Cidades->get($id);
        if ($this->Cidades->delete($cidade)) {
            $this->Flash->success(__('The cidade has been deleted.'));
        } else {
            $this->Flash->error(__('The cidade could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
