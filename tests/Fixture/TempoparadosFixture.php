<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TempoparadosFixture
 */
class TempoparadosFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'tempo' => 'Lorem ipsum dolor sit amet',
                'cidade_id' => 1,
            ],
        ];
        parent::init();
    }
}
