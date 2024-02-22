<?php
/**
 * @var \App\View\AppView $this
 */
?>

<?php $this->extend('/layout/empty_layout'); ?>

<div class="users form content">
    <?= $this->Flash->render() ?>
    <h3>Login</h3>
    <?= $this->Form->create(null, [
        'url' => [
            'controller' => 'Users',
            'action' => 'login',
        ],
    ]) ?>
    <fieldset>
        <?= $this->Form->control('username', ['required' => true, 'label' => __('Username or Email'), 'placeholder' => __('Please Enter Username or Email')]) ?>
        <?= $this->Form->control('password', ['required' => true, 'placeholder' => __('Please Enter Password')]) ?>
    </fieldset>

    <div class="row">
        <div class="column column-50">
            <div class="input checkbox">
                <?= $this->Form->control('remember_me', ['type' => 'checkbox', 'label' => 'Remember me']); ?>
            </div>
        </div>
        <div class="column column-50">
            <?= $this->Html->link(
                'Forgot password?',
                ['controller' => 'Users', 'action' => 'forgot'],
                ['class' => 'button button-clear']
            ); ?>
        </div>
    </div>
    <?= $this->Form->submit(__('Login')); ?>
    <?= $this->Form->end() ?>
    <div>
        Not a member?
        <?= $this->Html->link(
            'Register',
            ['controller' => 'Users', 'action' => 'register'],
            ['class' => '']
        ); ?>
    </div>
</div>