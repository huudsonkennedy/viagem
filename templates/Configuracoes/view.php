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
            <?= $this->Html->link(__('Edit Configuraco'), ['action' => 'edit', $configuraco->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Configuraco'), ['action' => 'delete', $configuraco->id], ['confirm' => __('Are you sure you want to delete # {0}?', $configuraco->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Configuracoes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Configuraco'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="configuracoes view content">
            <h3><?= h($configuraco->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Velocidade') ?></th>
                    <td><?= h($configuraco->velocidade) ?></td>
                </tr>
                <tr>
                    <th><?= __('Horasaida') ?></th>
                    <td><?= h($configuraco->horasaida) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($configuraco->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
