<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CidadesFixture
 */
class CidadesFixture extends TestFixture
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
                'nome' => 'Lorem ipsum dolor sit amet',
                'kmdaanterior' => 'Lorem ipsum dolor sit amet',
                'kmacumulado' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
