<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\I18n\FrozenTime;

/**
 * Mascotas Controller
 *
 * @property \App\Model\Table\MascotasTable $Mascotas
 * @method \App\Model\Entity\Mascota[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MascotasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $mascotas = $this->paginate($this->Mascotas);

        $this->set(compact('mascotas'));
    }

    /**
     * View method
     *
     * @param string|null $id Mascota id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mascota = $this->Mascotas->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('mascota'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mascota = $this->Mascotas->newEmptyEntity();
        if ($this->request->is('post')) {

            $mascota = $this->Mascotas->patchEntity($mascota, $this->request->getData());
            
            $imagen = $this->request->getData('imagen');

            if($imagen){
                
                $tiempo = FrozenTime::now()->toUnixString();
                
                $nombreImagen = $tiempo."_".$imagen->getClientFileName();
                $destino = WWW_ROOT.'img/mascotas/'.$nombreImagen;
                $imagen->moveTo($destino);
                $mascota->imagen=$nombreImagen;

            }

            if ($this->Mascotas->save($mascota)) {
                $this->Flash->success(__('The mascota has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mascota could not be saved. Please, try again.'));
        }
        $this->set(compact('mascota'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Mascota id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mascota = $this->Mascotas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $nombreImagenAnterior=$mascota->imagen;

            $mascota = $this->Mascotas->patchEntity($mascota, $this->request->getData());

            $imagen=$this->request->getData('imagen');

            $mascota->imagen=$nombreImagenAnterior;

            if($imagen->getClientFileName()){
                
                if(file_exists(WWW_ROOT.'img/mascotas/'.$nombreImagenAnterior)){
                    unlink(WWW_ROOT.'img/mascotas/'.$nombreImagenAnterior);
                }
                $tiempo = FrozenTime::now()->toUnixString();
                
                $nombreImagen = $tiempo."_".$imagen->getClientFileName();
                $destino = WWW_ROOT.'img/mascotas/'.$nombreImagen;
                $imagen->moveTo($destino);
                $mascota->imagen=$nombreImagen;

            }

            if ($this->Mascotas->save($mascota)) {
                $this->Flash->success(__('The mascota has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mascota could not be saved. Please, try again.'));
        }
        $this->set(compact('mascota'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Mascota id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mascota = $this->Mascotas->get($id);

        if(file_exists(WWW_ROOT.'img/mascotas/'.$mascota['imagen'])){
            unlink(WWW_ROOT.'img/mascotas/'.$mascota['imagen']);
        }

        if ($this->Mascotas->delete($mascota)) {
            $this->Flash->success(__('The mascota has been deleted.'));
        } else {
            $this->Flash->error(__('The mascota could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
