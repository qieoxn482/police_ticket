<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Violation $violation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Violation'), ['action' => 'edit', $violation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Violation'), ['action' => 'delete', $violation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $violation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Violations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Violation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tickets'), ['controller' => 'Tickets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ticket'), ['controller' => 'Tickets', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?></li>

    </ul>
</nav>
<div class="violations view large-9 medium-8 columns content">
    <h3><?= h($violation->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Created by User') ?></th>
            <td><?= $violation->has('user') ? $this->Html->link($violation->user->name, ['controller' => 'Users', 'action' => 'view', $violation->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fee Amount') ?></th>
            <td><?= h($violation->fee_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Violation Description') ?></th>
            <td><?= h($violation->violation_description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($violation->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Violation Datetime') ?></th>
            <td><?= h($violation->violation_datetime) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Tickets') ?></h4>
        <?php if (!empty($violation->tickets)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Licence Plate') ?></th>
                <th scope="col"><?= __('Datetime Issued') ?></th>
                <th scope="col"><?= __('Datetime Paid') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($violation->tickets as $tickets): ?>
            <tr>
                <td><?= h($tickets->id) ?></td>
                <td><?= h($tickets->licence_plate) ?></td>
                <td><?= h($tickets->datetime_issued) ?></td>
                <td><?= h($tickets->datetime_paid) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Tickets', 'action' => 'view', $tickets->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Tickets', 'action' => 'edit', $tickets->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tickets', 'action' => 'delete', $tickets->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tickets->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Files') ?></h4>
        <?php if (!empty($violation->files)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col"><?= __('Image') ?></th>
                </tr>
                <?php foreach ($violation->files as $files): ?>
                    <tr>
                        <td>
                            <?php
                            echo $this->Html->image($files->path . $files->name, [
                                "alt" => $files->name,
                            ]);
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</div>
