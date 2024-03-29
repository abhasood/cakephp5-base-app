<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\Utility\Text;
/**
 * User Entity
 *
 * @property int $id
 * @property string $uuid
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string|null $first_name
 * @property string|null $last_name
 * @property int|null $role_id
 * @property bool $active
 * @property bool $is_admin
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Role $role
 */
class User extends Entity
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
    protected array $_accessible = [
        'uuid' => true,
        'username' => true,
        'password' => true,
        'email' => true,
        'first_name' => true,
        'last_name' => true,
        'role_id' => true,
        'active' => true,
        'is_admin' => true,
        'created' => true,
        'modified' => true,
        'role' => true,
        'token' => true,
        'token_expires' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected array $_hidden = [
        'password',
    ];

    protected function _setPassword(string $password) : ?string
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
    }

    protected function _getFullName(): string
    {
        return $this->first_name . '  ' . $this->last_name;
    }
}
