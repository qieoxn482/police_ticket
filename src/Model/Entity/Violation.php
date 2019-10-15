<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Violation Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $fee_amount
 * @property \Cake\I18n\FrozenTime $violation_datetime
 * @property string $violation_description
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Ticket[] $tickets
 */
class Violation extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'fee_amount' => true,
        'violation_datetime' => true,
        'violation_description' => true,
        'user' => true,
        'tickets' => true,
        'files' => true
    ];
}
