<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
use Cake\I18n\DateTime;
use Cake\Utility\Security;
use Cake\Mailer\MailerAwareTrait;

class UsersController extends AppController
{
    use MailerAwareTrait;
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['login', 'register', 'forgot', 'resetPassword']);
    }

    /**
     * login method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful, renders view otherwise.
     */
    public function login()
    {
        $this->viewBuilder()->disableAutoLayout();
        $this->Authorization->skipAuthorization();
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in

        if ($result && $result->isValid()) {
            if ($this->Authentication->getIdentity()->is_admin) {
                // redirect to /articles after login success
                $redirect = $this->request->getQuery('redirect', [
                    'prefix' => 'Admin',
                    'controller' => 'Users',
                    'action' => 'index',
                ]);
            } else {
                $redirect = $this->request->getQuery('redirect', ['controller' => 'Pages', 'action' => 'index']);
            }

            return $this->redirect($redirect);
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
    }

     /**
     * logout method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful to login.
     */
    public function logout()
    {
        $this->Authorization->skipAuthorization();
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['prefix' => false, 'controller' => 'Users', 'action' => 'login']);
        }
    }

    /**
     * register method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful, renders view otherwise.
     */
    public function register()
    {
        $this->viewBuilder()->disableAutoLayout();
        $this->Authorization->skipAuthorization();
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->role_id = 2;
            $user->active = 1;
            $errorMessage = null;
            if ($user->getErrors()) {
                $errors = $user->getErrors();
                if ($errors['confirm_password']) {
                    $errorMessage = $errors['confirm_password']['no-misspelling'];
                }
            } else {
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The user has been saved.'));
                    return $this->redirect('/login');
                }
            }
            $message = $errorMessage ? $errorMessage : __('The user could not be saved. Please, try again.');
            $this->Flash->error($message);
        }
        $roles = $this->Users->Roles->find('list', limit: 200)->all();
        $this->set(compact('user', 'roles'));
    }

    /**
     * register method
     *
     * @return \Cake\Http\Response|null|void Send email on successful, renders view otherwise.
     */
    public function forgot()
    {
        $this->viewBuilder()->disableAutoLayout();
        $this->Authorization->skipAuthorization();

        if ($this->request->is('post')) {

            $email = trim($this->request->getData('email'));
            $user = $this->Users->find()->where(['email' => $email])->first();

            if($user) {
                $user->set('token', Security::hash(Security::randomBytes(25)));
                $dateTime = new DateTime('+24 hours');
                $user->set('token_expires', $dateTime);

                if ($this->Users->save($user)) {
                    // Send reset password email to user
                    try{
                        $this->getMailer('User')->send('resetPassword', [$user]);
                        $this->Flash->success(__('Email sent sucessfully with reset password link to your registered email.'));
                    } catch (\Exception $ex) {
                        $this->Flash->error(__('Email was not sent sucessfully with reset password link to your registered email.'));
                    }
                    return $this->redirect(['controller' => 'Users', 'action' => 'login']);
                }
            }
            $this->Flash->error(__('User could not found. Please, try again.'));

        }
    }

    /**
     * resetPassword method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful, renders view otherwise.
     */
    public function resetPassword($token = null)
    {
        $this->viewBuilder()->disableAutoLayout();
        $this->Authorization->skipAuthorization();
        if(empty($token)) {
            $this->Flash->error(__('Invalid token request.'));
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
        $user = $this->Users->find()->where(['token' => trim($token)])->first();
        if(empty($user)) {
            $this->Flash->error(__('Password reset token is invalid.'));
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
        $tokenDateTime = new DateTime($user->token_expires);
        if($tokenDateTime->isPast() ) {
            $this->Flash->error(__('Token already expired.'));
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }

        if ($this->request->is(['post', 'put'])) {
            $data = [
                'token' => null,
                'token_expires' => null,
                'password' => trim($this->request->getData('password')),
                'confirm_password' => trim($this->request->getData('confirm_password')),
            ];
            $user = $this->Users->patchEntity($user, $data);
            $errorMessage = $this->getConfirmPasswordError($user); //Check if confirm_password is not equal to password.
            if (!$errorMessage) {
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Password reset sucessfully. Please login to continue to access your account.'));
                    return $this->redirect(['controller' => 'Users', 'action' => 'login']);
                }
                $this->Flash->error(__('Unable to save new password. Please, try again.'));
            } else {
                $message = $errorMessage ? $errorMessage : __('Unable to reset your password. Please try again.');
                $this->Flash->error($message);
            }
        }
        $this->set(compact('user', 'token'));
    }

     /**
     * resetPassword method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful, renders view otherwise.
     */
    public function profile()
    {
        $user = $this->Users->get($this->request->getSession()->read('Auth.id'), ['fields' => ['id', 'first_name', 'last_name', 'email']]);
        $this->Authorization->authorize($user);
        if ($this->request->is('post')) {
            $success = false;
            $data = $this->request->getData();
            $user = $this->Users->patchEntity($user, $data);
            $errorMessage = $this->getConfirmPasswordError($user);
            if (!$errorMessage) {
                if ($this->Users->save($user)) {
                    $success = true;
                }
            }
            if ($success) {
                if (isset($data['password'])) {
                    $this->Flash->success(__('Password has been updated successfully. Use new password for login'));
                    return $this->redirect('/logout');
                }
                $this->Flash->success(__('The user has been updated successfully'));
            } else {
                $message = $errorMessage ? $errorMessage : __('The user could not be saved. Please, try again');
                $this->Flash->error($message);
            }
        }
        $this->set(compact('user'));
    }
    /**
     * getConfirmPasswordError method
     * @param object $user user object.
     * @return string|bool return error message on error or boolean.
     */
    private function getConfirmPasswordError($user)
    {
        if ($user->getErrors()) {
            $errors = $user->getErrors();
            if ($errors['confirm_password']) {
                return $errors['confirm_password']['no-misspelling'];
            }
        }
        return false;
    }
}
