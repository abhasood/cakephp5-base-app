<div class="topnav">
    <div class="top-nav-title">
        <a href="<?= $this->Url->build('/') ?>"><span>Cake</span>PHP</a>
    </div>
    <?php
    if ($this->request->getSession()->read('Auth.is_admin')) {
        echo $this->Html->link(
            'Users',
            ['prefix' => 'Admin', 'controller' => 'Users', 'action' => 'index'],
        );
    }

    echo $this->Html->link(
        'Pages',
        ['prefix' => false, 'controller' => 'Pages', 'action' => 'index'],
    );
    ?>
    <div class="split dropdown">
        <button class="dropbtn">
            <?= $this->request->getSession()->read('Auth.full_name') ?> <i class="arrow down"></i>
        </button>
        <div class="dropdown-content">
            <?php
            echo $this->Html->link(
                'Profile',
                ['prefix' => false, 'controller' => 'Users', 'action' => 'profile'],
            );
            echo $this->Html->link(
                'Logout',
                ['prefix' => false, 'controller' => 'Users', 'action' => 'logout'],
            );
            ?>
        </div>
    </div>
</div>