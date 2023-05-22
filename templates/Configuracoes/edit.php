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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $configuraco->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $configuraco->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Configuracoes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="configuracoes form content">
            <?= $this->Form->create($configuraco) ?>
            <fieldset>
                <legend><?= __('Edit Configuraco') ?></legend>
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
