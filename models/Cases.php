<?php

namespace app\models;

use Faker\Core\Number;
use yii\db\ActiveRecord;

class Cases extends ActiveRecord {
  public static function tableName (): string {
    return '{{cases}}';
  }
}
