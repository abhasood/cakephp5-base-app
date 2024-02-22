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
            'action' => 'resetPassword',
            $token
        ],
    ]) ?>
    <fieldset>
        <legend>
            <?= __('Reset new password') ?>
        </legend>
        <?php
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