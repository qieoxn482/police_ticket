<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FilesViolation $filesViolation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Files Violation'), ['action' => 'edit', $filesViolation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Files Violation'), ['action' => 'delete', $filesViolation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $filesViolation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Files Violations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Files Violation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Violations'), ['controller' => 'Violations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Violation'), ['controller' => 'Violations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="filesViolations view large-9 medium-8 columns content">
    <h3><?= h($filesViolation->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Violation') ?></th>
            <td><?= $filesViolation->has('violation') ? $this->Html->link($filesViolation->violation->id, ['controller' => 'Violations', 'action' => 'view', $filesViolation->violation->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('File') ?></th>
            <td><?= $filesViolation->has('file') ? $this->Html->link($filesViolation->file->name, ['controller' => 'Files', 'action' => 'view', $filesViolation->file->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($filesViolation->id) ?></td>
        </tr>
    </table>
</div>
