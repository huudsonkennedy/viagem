<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ConfiguracoesFixture
 */
class ConfiguracoesFixture extends TestFixture
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
                'velocidade' => 'Lorem ipsum dolor sit amet',
                'horasaida' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
