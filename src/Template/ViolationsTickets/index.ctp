<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ViolationsTicket[]|\Cake\Collection\CollectionInterface $violationsTickets
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Violations Ticket'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tickets'), ['controller' => 'Tickets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ticket'), ['controller' => 'Tickets', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Violations'), ['controller' => 'Violations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Violation'), ['controller' => 'Violations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="violationsTickets index large-9 medium-8 columns content">
    <h3><?= __('Violations Tickets') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ticket_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('violation_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($violationsTickets as $violationsTicket): ?>
            <tr>
                <td><?= $this->Number->format($violationsTicket->id) ?></td>
                <td><?= $violationsTicket->has('ticket') ? $this->Html->link($violationsTicket->ticket->id, ['controller' => 'Tickets', 'action' => 'view', $violationsTicket->ticket->id]) : '' ?></td>
                <td><?= $violationsTicket->has('violation') ? $this->Html->link($violationsTicket->violation->id, ['controller' => 'Violations', 'action' => 'view', $violationsTicket->violation->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $violationsTicket->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $violationsTicket->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $violationsTicket->id], ['confirm' => __('Are you sure you want to delete # {0}?', $violationsTicket->id)]) ?>
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
