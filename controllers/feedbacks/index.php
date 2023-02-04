<?php Block::put('breadcrumb') ?>
    <ul>
        <li><a href="<?= Backend::url('webmaxx/forms') ?>">Формы</a></li>
        <li><?= e($this->pageTitle) ?></li>
    </ul>
<?php Block::endPut() ?>

<?= $this->listRender() ?>
