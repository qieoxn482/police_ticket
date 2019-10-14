<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ViolationsTicketsFixture
 */
class ViolationsTicketsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'ticket_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'violation_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'violation_id' => ['type' => 'index', 'columns' => ['violation_id'], 'length' => []],
            'ticket_id' => ['type' => 'index', 'columns' => ['ticket_id'], 'length' => []],
        ],
        '_constraints' => [
            'violations_tickets_ibfk_1' => ['type' => 'foreign', 'columns' => ['violation_id'], 'references' => ['violations', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'violations_tickets_ibfk_2' => ['type' => 'foreign', 'columns' => ['ticket_id'], 'references' => ['tickets', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_unicode_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'ticket_id' => 1,
                'violation_id' => 1
            ],
        ];
        parent::init();
    }
}
