<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ViolationsTicketsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ViolationsTicketsTable Test Case
 */
class ViolationsTicketsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ViolationsTicketsTable
     */
    public $ViolationsTickets;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ViolationsTickets',
        'app.Tickets',
        'app.Violations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ViolationsTickets') ? [] : ['className' => ViolationsTicketsTable::class];
        $this->ViolationsTickets = TableRegistry::getTableLocator()->get('ViolationsTickets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ViolationsTickets);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
