<div class="violations view large-9 medium-8 columns content">
    <h3><?= h($violation->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User ID') ?></th>
            <td><?= h($violation->user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fee Amount') ?></th>
            <td><?= h($violation->fee_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('violation_datetime') ?></th>
            <td><?= h($violation->violation_datetime) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('violation_description') ?></th>
            <td><?= h($violation->violation_description) ?></td>
        </tr>
    </table>
</div>
