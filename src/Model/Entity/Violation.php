<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Violation Entity
 *
 * @property int $id
 * @property string $vehicule_licence
 * @property \Cake\I18n\FrozenTime $violation_datetime
 * @property string $violation_description
 *
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
        'vehicule_licence' => true,
        'violation_datetime' => true,
        'violation_description' => true,
        'tickets' => true
    ];
}
