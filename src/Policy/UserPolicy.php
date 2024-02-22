<?php
declare(strict_types=1);

namespace App\Policy;

use Authorization\IdentityInterface;
use Authorization\Policy\BeforePolicyInterface;
use Authorization\Policy\ResultInterface;
use Authorization\Policy\Result;

/**
 * User policy
 */
class UserPolicy implements BeforePolicyInterface
{

     /**
     * Check if $user can access Users
     *
     * @param \Authorization\IdentityInterface $identity The user.
     * @param \App\Model\Entity\User $resource
     * @param \Authorization\Policy\ResultInterface $action
     * @return bool
     */
    public function before(?IdentityInterface $identity, mixed $resource, string $action): ResultInterface|bool|null
    {
        if ($identity->getOriginalData()->is_admin) {
            return new Result(true);
        }
        // User can access profile page.
        if($identity->getOriginalData()->id && $action == 'profile'){
            return new Result(true);
        }
        return new Result(false, 'not-admin');
    }
    
}
