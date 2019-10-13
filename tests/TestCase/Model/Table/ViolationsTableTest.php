<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ViolationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ViolationsTable Test Case
 */
class ViolationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ViolationsTable
     */
    public $Violations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Violations',
        'app.Tickets'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Violations') ? [] : ['className' => ViolationsTable::class];
        $this->Violations = TableRegistry::getTableLocator()->get('Violations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Violations);

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
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
