<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Violation $violation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $violation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $violation->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Violations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Tickets'), ['controller' => 'Tickets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ticket'), ['controller' => 'Tickets', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="violations form large-9 medium-8 columns content">
    <?= $this->Form->create($violation) ?>
    <fieldset>
        <legend><?= __('Edit Violation') ?></legend>
        <?php
            echo $this->Form->control('vehicule_licence');
            echo $this->Form->control('violation_datetime');
            echo $this->Form->control('violation_description');
            echo $this->Form->control('tickets._ids', ['options' => $tickets]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
