<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Tempoparado> $tempoparados
 */
?>
<div class="tempoparados index content">
    <?= $this->Html->link(__('New Tempoparado'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Tempoparados') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('tempo') ?></th>
                    <th><?= $this->Paginator->sort('cidade_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tempoparados as $tempoparado): ?>
                <tr>
                    <td><?= $this->Number->format($tempoparado->id) ?></td>
                    <td><?= h($tempoparado->tempo) ?></td>
                    <td><?= $tempoparado->has('cidade') ? $this->Html->link($tempoparado->cidade->id, ['controller' => 'Cidades', 'action' => 'view', $tempoparado->cidade->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $tempoparado->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tempoparado->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tempoparado->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tempoparado->id)]) ?>
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
