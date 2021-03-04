<?php
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

<?= $form->field($model, 'imageFile')->fileInput() ?>

    <button>Submit</button>

<?= $form->field($model, 'imageFile')->widget(FileInput::classname(), [
    'options' => ['accept' => 'image/*'],
    ]);?>
<?php ActiveForm::end() ?>