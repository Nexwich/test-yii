<?php

/**
 * @var yii\web\View $this
 * @var \app\models\Cases $cases
 */

use yii\helpers\Html;

$this->title = 'Cases';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="component-cases mb-0">
  <h1 class="mb-3"><?= Html::encode($this->title) ?></h1>

  <form class="mb-3" action="/restapi/cases/create" method="post">
    <input type="hidden" name="return_url" value="">
    <input
      type="hidden"
      name="<?php echo Yii::$app->request->csrfParam; ?>"
      value="<?php echo Yii::$app->request->csrfToken; ?>"
    >

    <label class="mb-3">
      <input
        name="data[name]"
        type="text"
        class="form-control"
        placeholder="Name"
        required="required"
      >
    </label>

    <button class="btn" type="submit">Create</button>
  </form>

  <div>
    <?php foreach ($cases as $case) { ?>
      <div class="mb-1">
        <div class="row">
          <form class="col" action="/restapi/cases/update" method="post">
            <input
              type="hidden"
              name="<?php echo Yii::$app->request->csrfParam; ?>"
              value="<?php echo Yii::$app->request->csrfToken; ?>"
            >
            <input type="hidden" name="return_url" value="">
            <input type="hidden" name="data[id]" value="<?= $case['id'] ?>">

            <label>
              <input
                name="data[name]"
                type="text"
                class="form-control"
                value="<?= $case['name'] ?>"
                required="required"
              >
            </label>

            <button class="btn" type="submit">Update</button>
          </form>

          <form class="col-auto" action="/restapi/cases/delete" method="post">
            <input
              type="hidden"
              name="<?php echo Yii::$app->request->csrfParam; ?>"
              value="<?php echo Yii::$app->request->csrfToken; ?>"
            >

            <input type="hidden" name="return_url" value="">
            <input type="hidden" name="data[id]" value="<?= $case['id'] ?>">

            <button class="btn" type="submit">Delete</button>
          </form>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
