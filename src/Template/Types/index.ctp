<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Type[]|\Cake\Collection\CollectionInterface $types
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Subcategories'), ['controller' => 'Subcategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Subcategory'), ['controller' => 'Subcategories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="types index large-9 medium-8 columns content">
    <h3><?= __('Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subcategory_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($types as $type): ?>
            <tr>
                <td><?= $this->Number->format($type->id) ?></td>
                <td><?= $type->has('category') ? $this->Html->link($type->category->name, ['controller' => 'Categories', 'action' => 'view', $type->category->id]) : '' ?></td>
                <td><?= $type->has('subcategory') ? $this->Html->link($type->subcategory->name, ['controller' => 'Subcategories', 'action' => 'view', $type->subcategory->id]) : '' ?></td>
                <td><?= h($type->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $type->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $type->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $type->id], ['confirm' => __('Are you sure you want to delete # {0}?', $type->id)]) ?>
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
