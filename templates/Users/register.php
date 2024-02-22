<?php
/**
 * @var \App\View\AppView $this
 */
?>

<?php $this->extend('/layout/empty_layout'); ?>

<div class="users form content">
    <?= $this->Form->create(null, [
        'url' => [
            'controller' => 'Users',
            'action' => 'register',
        ],
    ]) ?>
    <fieldset>
        <legend>
            <?= __('Register') ?>
        </legend>
        <?php
        echo $this->Form->control('first_name', ['required' => true]);
        echo $this->Form->control('last_name', ['required' => true]);
        echo $this->Form->control('username', ['required' => true]);
        echo $this->Form->control('email', ['required' => true]);
        echo $this->Form->control('password', ['required' => true]);
        echo $this->Form->control('confirm_password', ['type' => 'password', 'required' => true]);
        ?>
    </fieldset>
    <div class="clearfix">
        <div class="float-left">
            <?= $this->Form->button(__('Submit')) ?>
        </div>
        <div class="float-right">
            <?= $this->Html->link(
                'Cancel',
                ['controller' => 'Users', 'action' => 'login'],
                ['class' => 'button button-outline']
            ); ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>