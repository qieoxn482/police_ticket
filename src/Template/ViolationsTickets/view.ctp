<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ViolationsTicket $violationsTicket
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Violations Ticket'), ['action' => 'edit', $violationsTicket->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Violations Ticket'), ['action' => 'delete', $violationsTicket->id], ['confirm' => __('Are you sure you want to delete # {0}?', $violationsTicket->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Violations Tickets'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Violations Ticket'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tickets'), ['controller' => 'Tickets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ticket'), ['controller' => 'Tickets', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Violations'), ['controller' => 'Violations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Violation'), ['controller' => 'Violations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="violationsTickets view large-9 medium-8 columns content">
    <h3><?= h($violationsTicket->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Ticket') ?></th>
            <td><?= $violationsTicket->has('ticket') ? $this->Html->link($violationsTicket->ticket->id, ['controller' => 'Tickets', 'action' => 'view', $violationsTicket->ticket->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Violation') ?></th>
            <td><?= $violationsTicket->has('violation') ? $this->Html->link($violationsTicket->violation->id, ['controller' => 'Violations', 'action' => 'view', $violationsTicket->violation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($violationsTicket->id) ?></td>
        </tr>
    </table>
</div>
