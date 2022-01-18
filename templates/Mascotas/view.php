<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mascota $mascota
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Mascota'), ['action' => 'edit', $mascota->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Mascota'), ['action' => 'delete', $mascota->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mascota->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Mascotas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Mascota'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="mascotas view content">
            <h3><?= h($mascota->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($mascota->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Imagen') ?></th>
                    <td><?= $this->Html->image('Mascotas/'.$mascota->imagen, array('width'=>100)) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($mascota->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($mascota->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($mascota->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
