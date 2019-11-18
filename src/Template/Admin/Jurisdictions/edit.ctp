<?php
/**
 * @var \App\View\AppView $this
 */
?>
<?php
$this->extend('/Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $jurisdiction->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $jurisdiction->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Jurisdictions'), ['action' => 'index']) ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $jurisdiction->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $jurisdiction->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Jurisdictions'), ['action' => 'index']) ?></li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($jurisdiction); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Jurisdiction']) ?></legend>
    <?php
    echo $this->Form->control('name');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
