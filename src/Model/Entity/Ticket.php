<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ticket Entity
 *
 * @property int $id
 * @property string $licence_plate
 * @property \Cake\I18n\FrozenTime $datetime_issued
 * @property \Cake\I18n\FrozenTime|null $datetime_paid
 *
 * @property \App\Model\Entity\Violation[] $violations
 */
class Ticket extends Entity
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
        'licence_plate' => true,
        'datetime_issued' => true,
        'datetime_paid' => true,
        'violations' => true
    ];
}
