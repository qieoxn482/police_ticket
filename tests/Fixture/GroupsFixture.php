<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * GroupsFixture
 */
class GroupsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'categories_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'subcategories_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'name' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'category_id' => ['type' => 'index', 'columns' => ['categories_id', 'subcategories_id'], 'length' => []],
            'category_id_2' => ['type' => 'index', 'columns' => ['categories_id', 'subcategories_id'], 'length' => []],
            'subcategory_id' => ['type' => 'index', 'columns' => ['subcategories_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'groups_ibfk_1' => ['type' => 'foreign', 'columns' => ['categories_id'], 'references' => ['categories', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'groups_ibfk_2' => ['type' => 'foreign', 'columns' => ['subcategories_id'], 'references' => ['subcategories', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
                'id' => 1,
                'categories_id' => 1,
                'subcategories_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet'
            ],
        ];
        parent::init();
    }
}
