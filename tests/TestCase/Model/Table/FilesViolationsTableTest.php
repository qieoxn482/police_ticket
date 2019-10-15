<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FilesViolationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FilesViolationsTable Test Case
 */
class FilesViolationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FilesViolationsTable
     */
    public $FilesViolations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.FilesViolations',
        'app.Violations',
        'app.Files'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('FilesViolations') ? [] : ['className' => FilesViolationsTable::class];
        $this->FilesViolations = TableRegistry::getTableLocator()->get('FilesViolations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FilesViolations);

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
