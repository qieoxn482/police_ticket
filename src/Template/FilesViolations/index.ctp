<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FilesViolation[]|\Cake\Collection\CollectionInterface $filesViolations
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Files Violation'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Violations'), ['controller' => 'Violations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Violation'), ['controller' => 'Violations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="filesViolations index large-9 medium-8 columns content">
    <h3><?= __('Files Violations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('violation_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('file_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($filesViolations as $filesViolation): ?>
            <tr>
                <td><?= $this->Number->format($filesViolation->id) ?></td>
                <td><?= $filesViolation->has('violation') ? $this->Html->link($filesViolation->violation->id, ['controller' => 'Violations', 'action' => 'view', $filesViolation->violation->id]) : '' ?></td>
                <td><?= $filesViolation->has('file') ? $this->Html->link($filesViolation->file->name, ['controller' => 'Files', 'action' => 'view', $filesViolation->file->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $filesViolation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $filesViolation->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $filesViolation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $filesViolation->id)]) ?>
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
