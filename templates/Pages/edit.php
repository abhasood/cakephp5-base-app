<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Page $page
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $page->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $page->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Pages'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="pages form content">
            <?= $this->Form->create($page) ?>
            <fieldset>
                <legend><?= __('Edit Page') ?></legend>
                <?php
                    echo $this->Form->control('title');
                    echo $this->Form->control('content');
                    echo $this->Form->control('is_draft');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
