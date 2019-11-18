<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JurisdictionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JurisdictionsTable Test Case
 */
class JurisdictionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\JurisdictionsTable
     */
    public $Jurisdictions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Jurisdictions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Jurisdictions') ? [] : ['className' => JurisdictionsTable::class];
        $this->Jurisdictions = TableRegistry::getTableLocator()->get('Jurisdictions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Jurisdictions);

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
