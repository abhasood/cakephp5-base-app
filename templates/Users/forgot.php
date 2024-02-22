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
            'action' => 'forgot',
        ],
    ]) ?>
    <fieldset>
        <legend>
            <?= __('Forgot your password?') ?>
        </legend>
        <?php
        echo $this->Form->control('email', ['required' => true, 'label' => __('Enter your email and we\'ll send you a reset link.')]);
        ?>
    </fieldset>
    <div class="clearfix">
        <div class="float-left">
            <?= $this->Form->button(__('Send rest link')) ?>
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