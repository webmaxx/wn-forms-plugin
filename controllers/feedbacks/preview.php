<?php Block::put('breadcrumb') ?>
    <ul>
        <li><a href="<?= Backend::url('webmaxx/forms') ?>"><?= e(trans('webmaxx.forms::lang.navigation.forms.label')); ?></a></li>
        <li><a href="<?= Backend::url('webmaxx/forms/feedbacks') ?>"><?= e(trans('webmaxx.forms::lang.models.feedback.list.title')); ?></a></li>
        <li><?= "{$formModel->code}: {$formModel->id}" ?></li>
        <li><?= e($this->pageTitle) ?></li>
    </ul>
<?php Block::endPut() ?>

<?php if (!$this->fatalError): ?>

    <div class="form-preview">
        <?= $this->formRenderPreview() ?>
    </div>

<?php else: ?>

    <p class="flash-message static error"><?= e($this->fatalError) ?></p>
    <p><a href="<?= Backend::url('webmaxx/forms/feedbacks') ?>" class="btn btn-default"><?= e(trans('backend::lang.form.return_to_list')); ?></a></p>

<?php endif ?>
