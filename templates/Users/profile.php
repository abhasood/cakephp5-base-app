<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var string[]|\Cake\Collection\CollectionInterface $roles
 */
?>
<div class="row">
    <aside class="column">
    </aside>
    <div class="column column-60">
        <div class="users form content">

            <fieldset>
                <legend>
                    <?= __('User Profile') ?>
                </legend>
                <?= $this->Form->create(null, [
                    'url' => [
                        'controller' => 'Users',
                        'action' => 'profile',
                    ],
                ]) ?>
                <div class="row">
                    <div class="column">
                        <?= $this->Form->control('first_name', ['type' => 'text', 'required' => true, 'value' => $user->first_name]); ?>
                    </div>
                    <div class="column">
                        <?= $this->Form->control('last_name', ['type' => 'text', 'required' => true, 'value' => $user->last_name]); ?>
                    </div>
                </div>
                <?= $this->Form->control('email', ['type' => 'email', 'required' => true, 'value' => $user->email]); ?>
                <?= $this->Form->button(__('Update')) ?>
                <?= $this->Form->end() ?>
            </fieldset>

            <br>

            <fieldset>
                <legend>
                    <?= __('Change Password') ?>
                </legend>
                <?= $this->Form->create(null, [
                    'url' => [
                        'controller' => 'Users',
                        'action' => 'profile',
                    ],
                ]) ?>
                <?php
                echo $this->Form->control('password', ['required' => true]);
                echo $this->Form->control('confirm_password', ['type' => 'password', 'required' => true]);
                ?>
                <?= $this->Form->button(__('Change Password')) ?>
                <?= $this->Form->end() ?>
            </fieldset>

        </div>
    </div>
    <aside class="column">
    </aside>
</div>