<?php
declare(strict_types=1);

namespace App\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;
use Cake\Datasource\EntityInterface;
use Cake\Event\EventInterface;
use ArrayObject;
use Cake\Utility\Text;

/**
 * Uuid behavior
 */
class UuidBehavior extends Behavior
{
    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected array $_defaultConfig = [
        'field' => 'uuid',
    ];

    public function beforeSave(EventInterface $event, EntityInterface $entity, ArrayObject $options)
    {
        if ($entity->isNew()) {
            $config = $this->getConfig();
            $entity->set($config['field'], Text::uuid());
        }
    }
}
