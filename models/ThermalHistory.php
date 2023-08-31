<?php

namespace app\models;

use Faker\Core\Number;
use yii\db\ActiveRecord;

class ThermalHistory extends ActiveRecord {
  public static function tableName (): string {
    return '{{thermal_history}}';
  }

  public static function getCurrentTemperature ():array {
    $url = 'https://api.weather.yandex.ru/v1/forecast?lat=55.75396&lon=37.620393&limit=1&hours=false&extra=false';

    $opts = array(
      'http' => array(
        'method' => "GET",
        'header' => "X-Yandex-API-Key: 40e933f0-87ab-4354-96eb-477324396cd4"
      )
    );

    $context = stream_context_create($opts);
    $contents = file_get_contents($url, false, $context);

    $result = json_decode($contents, true);

    return $result;
  }
}
