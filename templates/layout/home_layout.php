<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
if($this->request->getSession()->read('Auth')){
    $homeUrl = $this->Url->build(['controller' => 'pages', 'action' => 'index']);
    if($this->request->getSession()->read('Auth.is_admin')){
        $homeUrl = $this->Url->build(['prefix' => 'Admin', 'controller' => 'users', 'action' => 'index']);
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake', 'page']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>"><span>Cake</span>PHP</a>
        </div>
        <div class="top-nav-links">
            <?php if ($this->request->getSession()->read('Auth')) { ?>
                <a href="<?= $homeUrl ?>" class="user-name">
                    <?= $this->request->getSession()->read('Auth.full_name') ?>
                </a>
                <?php
                echo $this->Html->link(
                    'Logout',
                    ['prefix' => false, 'controller' => 'Users', 'action' => 'logout'],
                    ['class' => 'button button-clear']
                );
                ?>
            <?php } else { ?>
                <?php
                echo $this->Html->link(
                    'Login',
                    ['prefix' => false, 'controller' => 'Users', 'action' => 'login'],
                    ['class' => 'button button-clear']
                );

                echo $this->Html->link(
                    'Register',
                    ['prefix' => false, 'controller' => 'Users', 'action' => 'register'],
                    ['class' => 'button button-clear']
                );
                ?>
            <?php } ?>
        </div>
    </nav>
    <div class="topsubnav">
        <?php foreach($pages as $page): ?>
            <a class="<?= ($slug == $page->slug) ?  'active' : '' ?>" href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'home', $page->slug]) ?>">
                <?= $page->title; ?>
            </a>
        <?php endforeach; ?>
    </div>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
        Copyright &copy; <?php echo date("Y"); ?>
    </footer>
</body>

</html>