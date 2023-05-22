<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tempoparado Entity
 *
 * @property int $id
 * @property string|null $tempo
 * @property int|null $cidade_id
 *
 * @property \App\Model\Entity\Cidade $cidade
 */
class Tempoparado extends Entity
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
        'tempo' => true,
        'cidade_id' => true,
        'cidade' => true,
    ];
}
