<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mascota[]|\Cake\Collection\CollectionInterface $mascotas
 */
?>
<div class="mascotas index content">
    <?= $this->Html->link(__('New Mascota'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Mascotas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('imagen') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mascotas as $mascota): ?>
                <tr>
                    <td><?= $this->Number->format($mascota->id) ?></td>
                    <td><?= h($mascota->nombre) ?></td>
                    <td>
                    
                    <?= $this->Html->image('Mascotas/'.$mascota->imagen, array('width'=>100)) ?>
                
                    </td>
                    <td><?= h($mascota->created) ?></td>
                    <td><?= h($mascota->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $mascota->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mascota->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mascota->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mascota->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
