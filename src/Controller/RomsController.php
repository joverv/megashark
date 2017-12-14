<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Roms Controller
 *
 *
 * @method \App\Model\Entity\Rom[] paginate($object = null, array $settings = [])
 */
class RomsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $roms = $this->paginate($this->Roms);

        $this->set(compact('roms'));
        $this->set('_serialize', ['roms']);
    }

    /**
     * View method
     *
     * @param string|null $id Rom id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rom = $this->Roms->get($id, [
            'contain' => []
        ]);

        $this->set('rom', $rom);
        $this->set('_serialize', ['rom']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rom = $this->Roms->newEntity();
        if ($this->request->is('post')) {
            $rom = $this->Roms->patchEntity($rom, $this->request->getData());
            if ($this->Roms->save($rom)) {
                $this->Flash->success(__('The rom has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rom could not be saved. Please, try again.'));
        }
        $this->set(compact('rom'));
        $this->set('_serialize', ['rom']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Rom id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rom = $this->Roms->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rom = $this->Roms->patchEntity($rom, $this->request->getData());
            if ($this->Roms->save($rom)) {
                $this->Flash->success(__('The rom has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rom could not be saved. Please, try again.'));
        }
        $this->set(compact('rom'));
        $this->set('_serialize', ['rom']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Rom id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rom = $this->Roms->get($id);
        if ($this->Roms->delete($rom)) {
            $this->Flash->success(__('The rom has been deleted.'));
        } else {
            $this->Flash->error(__('The rom could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
