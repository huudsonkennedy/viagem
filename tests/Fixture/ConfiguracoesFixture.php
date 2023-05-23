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
                'velocidade' => 1,
                'horasaida' => '2023-05-23 19:01:54',
            ],
        ];
        parent::init();
    }
}
