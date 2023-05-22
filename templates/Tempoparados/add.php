<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tempoparado $tempoparado
 * @var \Cake\Collection\CollectionInterface|string[] $cidades
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Tempoparados'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tempoparados form content">
            <?= $this->Form->create($tempoparado) ?>
            <fieldset>
                <legend><?= __('Add Tempoparado') ?></legend>
                <?php
                    echo $this->Form->control('tempo');
                    echo $this->Form->control('cidade_id', ['options' => $cidades, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
