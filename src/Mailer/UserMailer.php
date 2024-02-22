<?php
declare(strict_types=1);

namespace App\Mailer;

use Cake\Mailer\Mailer;

/**
 * User mailer.
 */
class UserMailer extends Mailer
{
    /**
     * Mailer's name.
     *
     * @var string
     */
    public static string $name = 'User';

    public function resetPassword($user)
    {
        $this
            ->setTransport('gmail')
            ->setFrom(['admin@cakephpcms.com' => 'CakePHP CMS'])
            ->setTo($user->email)
            ->setSubject('Reset password.')
            ->setEmailFormat('html')
            ->setViewVars([
                'name' => $user->full_name,
                'token' => $user->token,
                'title' => 'CakeCMS'
            ])
            ->viewBuilder()
                ->addHelpers(['Html', 'Url', 'Text'])
                ->setTemplate('reset_password');

    }
}
