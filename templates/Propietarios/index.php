<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Propietario[]|\Cake\Collection\CollectionInterface $propietarios
 */
?>
<div class="propietarios index content">
    <?= $this->Html->link(__('New Propietario'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Propietarios') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($propietarios as $propietario): ?>
                <tr>
                    <td><?= $this->Number->format($propietario->id) ?></td>
                    <td><?= h($propietario->nombre) ?></td>
                    <td><?= h($propietario->created) ?></td>
                    <td><?= h($propietario->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $propietario->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $propietario->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $propietario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $propietario->id)]) ?>
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
