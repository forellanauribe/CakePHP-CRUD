<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Propietarios Controller
 *
 * @property \App\Model\Table\PropietariosTable $Propietarios
 * @method \App\Model\Entity\Propietario[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PropietariosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $propietarios = $this->paginate($this->Propietarios);

        $this->set(compact('propietarios'));
    }

    /**
     * View method
     *
     * @param string|null $id Propietario id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $propietario = $this->Propietarios->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('propietario'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $propietario = $this->Propietarios->newEmptyEntity();
        if ($this->request->is('post')) {
            $propietario = $this->Propietarios->patchEntity($propietario, $this->request->getData());
            if ($this->Propietarios->save($propietario)) {
                $this->Flash->success(__('The propietario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The propietario could not be saved. Please, try again.'));
        }
        $this->set(compact('propietario'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Propietario id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $propietario = $this->Propietarios->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $propietario = $this->Propietarios->patchEntity($propietario, $this->request->getData());
            if ($this->Propietarios->save($propietario)) {
                $this->Flash->success(__('The propietario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The propietario could not be saved. Please, try again.'));
        }
        $this->set(compact('propietario'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Propietario id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $propietario = $this->Propietarios->get($id);
        if ($this->Propietarios->delete($propietario)) {
            $this->Flash->success(__('The propietario has been deleted.'));
        } else {
            $this->Flash->error(__('The propietario could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
