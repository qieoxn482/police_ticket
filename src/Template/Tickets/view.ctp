<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ticket $ticket
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ticket'), ['action' => 'edit', $ticket->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ticket'), ['action' => 'delete', $ticket->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ticket->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tickets'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ticket'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Violations'), ['controller' => 'Violations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Violation'), ['controller' => 'Violations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tickets view large-9 medium-8 columns content">
    <h3><?= h($ticket->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Licence Plate') ?></th>
            <td><?= h($ticket->licence_plate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ticket->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Datetime Issued') ?></th>
            <td><?= h($ticket->datetime_issued) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Datetime Paid') ?></th>
            <td><?= h($ticket->datetime_paid) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Violations') ?></h4>
        <?php if (!empty($ticket->violations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Fee Amount') ?></th>
                <th scope="col"><?= __('Violation Datetime') ?></th>
                <th scope="col"><?= __('Violation Description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($ticket->violations as $violations): ?>
            <tr>
                <td><?= h($violations->id) ?></td>
                <td><?= h($violations->user_id) ?></td>
                <td><?= h($violations->fee_amount) ?></td>
                <td><?= h($violations->violation_datetime) ?></td>
                <td><?= h($violations->violation_description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Violations', 'action' => 'view', $violations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Violations', 'action' => 'edit', $violations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Violations', 'action' => 'delete', $violations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $violations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
