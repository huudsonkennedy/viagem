<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cidade Entity
 *
 * @property int $id
 * @property string|null $nome
 * @property int|null $kmdaanterior
 * @property int|null $kmacumulado
 *
 * @property \App\Model\Entity\Tempoparado[] $tempoparados
 */
class Cidade extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'nome' => true,
        'kmdaanterior' => true,
        'kmacumulado' => true,
        'tempoparados' => true,
    ];
}
