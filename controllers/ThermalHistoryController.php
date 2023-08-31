<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\ThermalHistory;

class ThermalHistoryController extends Controller {
  public function actionIndex (): array {
    $data = [];

    // Получить данные по температуре
    $query = ThermalHistory::find();
    $thermal_histories = $query->orderBy('created_at')->all();

    // Сформмировать результат
    foreach ($thermal_histories as $thermal_history) {
      $data[] = [
        'id' => (int)$thermal_history['id'],
        'createdAt' => $thermal_history['created_at'],
        'temperature' => (float)$thermal_history['temperature'],
      ];
    }

    // Рендер
    Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

    return $data;
  }

  public function actionCreate () {
    $current_temperature = ThermalHistory::getCurrentTemperature();

    $thermal_history = new ThermalHistory;
    $thermal_history->created_at = date('Y-m-d H:i:s');
    $thermal_history->temperature = $current_temperature['fact']['temp'];
    $thermal_history->insert();

    // Рендер
    Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

    return $thermal_history->toArray();
  }
}
