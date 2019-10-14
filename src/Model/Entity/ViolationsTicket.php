<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ViolationsTicket Entity
 *
 * @property int $id
 * @property int $ticket_id
 * @property int $violation_id
 *
 * @property \App\Model\Entity\Ticket $ticket
 * @property \App\Model\Entity\Violation $violation
 */
class ViolationsTicket extends Entity
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
        'ticket_id' => true,
        'violation_id' => true,
        'ticket' => true,
        'violation' => true
    ];
}
