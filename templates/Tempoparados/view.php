<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tempoparado $tempoparado
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Tempoparado'), ['action' => 'edit', $tempoparado->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Tempoparado'), ['action' => 'delete', $tempoparado->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tempoparado->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Tempoparados'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Tempoparado'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tempoparados view content">
            <h3><?= h($tempoparado->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Tempo') ?></th>
                    <td><?= h($tempoparado->tempo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cidade') ?></th>
                    <td><?= $tempoparado->has('cidade') ? $this->Html->link($tempoparado->cidade->id, ['controller' => 'Cidades', 'action' => 'view', $tempoparado->cidade->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($tempoparado->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
