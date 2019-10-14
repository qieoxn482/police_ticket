<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ViolationsTicket $violationsTicket
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $violationsTicket->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $violationsTicket->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Violations Tickets'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Tickets'), ['controller' => 'Tickets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ticket'), ['controller' => 'Tickets', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Violations'), ['controller' => 'Violations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Violation'), ['controller' => 'Violations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="violationsTickets form large-9 medium-8 columns content">
    <?= $this->Form->create($violationsTicket) ?>
    <fieldset>
        <legend><?= __('Edit Violations Ticket') ?></legend>
        <?php
            echo $this->Form->control('ticket_id', ['options' => $tickets]);
            echo $this->Form->control('violation_id', ['options' => $violations]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
