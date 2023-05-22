<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TempoparadosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TempoparadosTable Test Case
 */
class TempoparadosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TempoparadosTable
     */
    protected $Tempoparados;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Tempoparados',
        'app.Cidades',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Tempoparados') ? [] : ['className' => TempoparadosTable::class];
        $this->Tempoparados = $this->getTableLocator()->get('Tempoparados', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Tempoparados);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TempoparadosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\TempoparadosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
