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
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.5.2/angular.min.js" ></script>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?php
        echo $this->Html->css([
            'base.css',
            'style.css',
            'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css',
            'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'
        ]);
        ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?php
        echo $this->Html->script([
            'https://code.jquery.com/jquery-1.12.4.js',
            'https://code.jquery.com/ui/1.12.1/jquery-ui.js',
            'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'
                ], ['block' => 'scriptLibraries']
        );
        ?>

</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                <li><?php
                    $loguser = $this->request->session()->read('Auth.User');
                    if ($loguser) {
                        $user = $loguser['email'];
                        echo $this->Html->link($user . ' logout', ['controller' => 'Users', 'action' => 'logout']);
                    } else {
                        echo $this->Html->link('login', ['controller' => 'Users', 'action' => 'login']);
                    }
                    ?></li>

                <li><?= $this->Html->link('Info', ['controller' => 'Users', 'action' => 'view', $loguser['id']]);?></li>
                <li>
                    <?= $this->Html-> link('About', ['controller' => 'about', 'action' => 'index']); ?>
                </li>
                <li>
                    <?= $this->Html-> link('Jurisdictions (AJAX)', ['controller' => 'jurisdictions', 'action' => 'index']); ?>
                </li>
                <li>
                    <?= $this->Html-> link('Home', ['controller' => 'violations', 'action' => 'index']); ?>
                </li>
                <li>
                    <?= $this->Html->link('Français', ['action' => 'changeLang', 'fr_CA'], ['escape' => false]) ?>
                </li>

                <li>
                    <?= $this->Html->link('English', ['action' => 'changeLang', 'en_US'], ['escape' => false]) ?>
                </li>
                <li>
                    <?= $this->Html->link('Portugese', ['action' => 'changeLang', 'pt_BR'], ['escape' => false]) ?>
                </li>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
    <?= $this->fetch('scriptLibraries') ?>
        <?= $this->fetch('script'); ?>
        <?= $this->fetch('scriptBottom') ?>
</body>
</html>
