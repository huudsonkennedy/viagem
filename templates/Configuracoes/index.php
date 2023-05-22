<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Configuraco> $configuracoes
 */
?>
<div class="configuracoes index content">
    <?= $this->Html->link(__('New Configuraco'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Configuracoes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('velocidade') ?></th>
                    <th><?= $this->Paginator->sort('horasaida') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($configuracoes as $configuraco): ?>
                <tr>
                    <td><?= $this->Number->format($configuraco->id) ?></td>
                    <td><?= h($configuraco->velocidade) ?></td>
                    <td><?= h($configuraco->horasaida) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $configuraco->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $configuraco->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $configuraco->id], ['confirm' => __('Are you sure you want to delete # {0}?', $configuraco->id)]) ?>
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
