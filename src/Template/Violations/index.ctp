<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Violation[]|\Cake\Collection\CollectionInterface $violations
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Violation'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tickets'), ['controller' => 'Tickets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ticket'), ['controller' => 'Tickets', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="violations index large-9 medium-8 columns content">
    <h3><?= __('Violations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <!--<th scope="col"><?= $this->Paginator->sort('id') ?></th>-->
                <th scope="col"><?= $this->Paginator->sort('created by user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fee_amount') ?></th>
                <!--<th scope="col"><?= $this->Paginator->sort('violation_datetime') ?></th>-->
                <th scope="col"><?= $this->Paginator->sort('violation_description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($violations as $violation): ?>
            <tr>
                <!--<td><?= $this->Number->format($violation->id) ?></td>-->
                <td><?= $violation->has('user') ? $this->Html->link($violation->user->name, ['controller' => 'Users', 'action' => 'view', $violation->user->id]) : '' ?></td>
                <td><?= h($violation->fee_amount) ?></td>
                <!--<td><?= h($violation->violation_datetime) ?></td>-->
                <td><?= h($violation->violation_description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $violation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $violation->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $violation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $violation->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
