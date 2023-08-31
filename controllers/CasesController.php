<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Cases;

class CasesController extends Controller {
  public $enableCsrfValidation = false;

  public function actionIndex () {
    // Получить данные по температуре
    $query = Cases::find();
    $cases = $query->orderBy('id')->all();

    // Рендер
    return $this->render('index', [
      'cases' => $cases,
    ]);
  }

  public function actionCreate () {
    $request = Yii::$app->request;
    $post = $request->post();

    if (!empty($post['data']['name'])) {
      $case = new Cases;
      $case->name = $post['data']['name'];
      $case->insert();
    }

    if (isset($post['return_url'])) {
      $this->redirect($post['return_url'] ?: $_SERVER['HTTP_REFERER']);
    }
  }

  public function actionUpdate () {
    $request = Yii::$app->request;
    $post = $request->post();

    if (!empty($post['data']['id']) and !empty($post['data']['name'])) {
      $case = Cases::findOne($post['data']['id']);
      $case->name = $post['data']['name'];
      $case->save();
    }

    if (isset($post['return_url'])) {
      $this->redirect($post['return_url'] ?: $_SERVER['HTTP_REFERER']);
    }
  }

  public function actionDelete () {
    $request = Yii::$app->request;
    $post = $request->post();

    if (!empty($post['data']['id'])) {
      $case = Cases::findOne($post['data']['id']);
      $case->delete();
    }

    if (isset($post['return_url'])) {
      $this->redirect($post['return_url'] ?: $_SERVER['HTTP_REFERER']);
    }
  }
}
