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
            <?= $this->Html->link(__('Edit Cidade'), ['action' => 'edit', $cidade->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Cidade'), ['action' => 'delete', $cidade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cidade->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Cidades'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Cidade'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cidades view content">
            <h3><?= h($cidade->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($cidade->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Kmdaanterior') ?></th>
                    <td><?= h($cidade->kmdaanterior) ?></td>
                </tr>
                <tr>
                    <th><?= __('Kmacumulado') ?></th>
                    <td><?= h($cidade->kmacumulado) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($cidade->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Tempoparados') ?></h4>
                <?php if (!empty($cidade->tempoparados)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Tempo') ?></th>
                            <th><?= __('Cidade Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($cidade->tempoparados as $tempoparados) : ?>
                        <tr>
                            <td><?= h($tempoparados->id) ?></td>
                            <td><?= h($tempoparados->tempo) ?></td>
                            <td><?= h($tempoparados->cidade_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Tempoparados', 'action' => 'view', $tempoparados->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Tempoparados', 'action' => 'edit', $tempoparados->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tempoparados', 'action' => 'delete', $tempoparados->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tempoparados->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
