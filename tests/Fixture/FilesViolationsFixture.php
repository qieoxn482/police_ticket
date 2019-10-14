<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FilesViolationsFixture
 */
class FilesViolationsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'violation_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'file_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'violation_id' => ['type' => 'index', 'columns' => ['violation_id'], 'length' => []],
            'file_id' => ['type' => 'index', 'columns' => ['file_id'], 'length' => []],
        ],
        '_constraints' => [
            'files_violations_ibfk_1' => ['type' => 'foreign', 'columns' => ['violation_id'], 'references' => ['violations', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
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
                'violation_id' => 1,
                'file_id' => 1
            ],
        ];
        parent::init();
    }
}
