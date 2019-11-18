<?php
$this->extend('/Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Jurisdiction'), ['action' => 'edit', $jurisdiction->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Jurisdiction'), ['action' => 'delete', $jurisdiction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jurisdiction->id)]) ?> </li>
<li><?= $this->Html->link(__('List Jurisdictions'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Jurisdiction'), ['action' => 'add']) ?> </li>
<li><?=
    $this->Html->link('Section publique en JS', [
        'prefix' => false,
        'controller' => 'Jurisdictions',
        'action' => 'index'
    ]);
    ?>
</li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<div class="dropdown hidden-xs">
    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        <?= __("Actions") ?>
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
        <?= $this->fetch('tb_actions') ?>
    </ul>
</div>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($jurisdiction->location) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Location') ?></td>
            <td><?= h($jurisdiction->location) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($jurisdiction->id) ?></td>
        </tr>
    </table>
</div>

