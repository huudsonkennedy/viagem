<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cidade $cidade
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Cidades'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cidades form content">
            <?= $this->Form->create($cidade) ?>
            <fieldset>
                <legend><?= __('Add Cidade') ?></legend>
                <?php
                    echo $this->Form->control('nome');
                    echo $this->Form->control('kmdaanterior');
                    echo $this->Form->control('kmacumulado');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
