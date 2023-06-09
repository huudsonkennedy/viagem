<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Configuracoes Controller
 *
 * @property \App\Model\Table\ConfiguracoesTable $Configuracoes
 * @method \App\Model\Entity\Configuraco[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ConfiguracoesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $configuracoes = $this->paginate($this->Configuracoes);

        $this->set(compact('configuracoes'));
    }

    /**
     * View method
     *
     * @param string|null $id Configuraco id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $configuraco = $this->Configuracoes->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('configuraco'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $configuraco = $this->Configuracoes->newEmptyEntity();
        if ($this->request->is('post')) {
            $configuraco = $this->Configuracoes->patchEntity($configuraco, $this->request->getData());
            if ($this->Configuracoes->save($configuraco)) {
                $this->Flash->success(__('The configuraco has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The configuraco could not be saved. Please, try again.'));
        }
        $this->set(compact('configuraco'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Configuraco id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $configuraco = $this->Configuracoes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $configuraco = $this->Configuracoes->patchEntity($configuraco, $this->request->getData());
            if ($this->Configuracoes->save($configuraco)) {
           //    $this->Flash->success(__('The configuraco has been saved.'));
//
             //   return $this->redirect(['action' => 'index']);
            }
          //  $this->Flash->error(__('The configuraco could not be saved. Please, try again.'));
        }
        $this->set(compact('configuraco'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Configuraco id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $configuraco = $this->Configuracoes->get($id);
        if ($this->Configuracoes->delete($configuraco)) {
            $this->Flash->success(__('The configuraco has been deleted.'));
        } else {
            $this->Flash->error(__('The configuraco could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
