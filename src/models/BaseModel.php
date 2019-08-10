<?php
/**
 * Created by PhpStorm.
 * User: ar2r
 * Date: 10.08.2019
 * Time: 11:09
 */

namespace ar2rsoft\yakassa\models;

use yii\base\Model;
use Yii;

/**
 * Class BaseModel
 * @package ar2rsoft\yakassa\models
 *
 * @property \ar2rsoft\yakassa\YaKassa $component
 */

class BaseModel extends Model
{
    /**
     * @var string
     */
    public $component = 'yakassa';

    /**
     * @return \ar2rsoft\yakassa\YaKassa;
     */
    public function getComponent()
    {
        return Yii::$app->get($this->component);
    }

}