<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Cidade> $cidades
 */
?>
<div class="cidades index content">
    <?= $this->Html->link(__('New Cidade'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Cidades') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('kmdaanterior') ?></th>
                    <th><?= $this->Paginator->sort('kmacumulado') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cidades as $cidade): ?>
                <tr>
                    <td><?= $this->Number->format($cidade->id) ?></td>
                    <td><?= h($cidade->nome) ?></td>
                    <td><?= h($cidade->kmdaanterior) ?></td>
                    <td><?= h($cidade->kmacumulado) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $cidade->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cidade->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cidade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cidade->id)]) ?>
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
