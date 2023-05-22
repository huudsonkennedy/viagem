<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Configuraco $configuraco
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Configuracoes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="configuracoes form content">
            <?= $this->Form->create($configuraco) ?>
            <fieldset>
                <legend><?= __('Add Configuraco') ?></legend>
                <?php
                    echo $this->Form->control('velocidade');
                    echo $this->Form->control('horasaida');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
