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
            <?= $this->Html->link(__('List Mascotas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="mascotas form content">
            <?= $this->Form->create($mascota, ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Add Mascota') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('imagen', ['type' => 'file']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
