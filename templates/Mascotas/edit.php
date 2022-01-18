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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $mascota->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $mascota->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Mascotas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="mascotas form content">
            <?= $this->Form->create($mascota, ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Edit Mascota') ?></legend>
                
                <?php echo $this->Form->control('nombre'); ?>

                <?php echo $this->Form->control('imagen', ['type' => 'file', 'required' => false]); ?>

                <?= $this->Html->image('Mascotas/'.$mascota->imagen, array('width'=>100)) ?>

            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
