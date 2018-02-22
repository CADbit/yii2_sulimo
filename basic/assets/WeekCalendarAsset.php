<?php
/**
 * Created by PhpStorm.
 * User: SiarkoWodór
 * Date: 22.02.2018
 * Time: 19:22
 */

namespace app\assets;


use yii\web\AssetBundle;

class WeekCalendarAsset  extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/weekCalendarWidget/weekCalendar.css'
    ];
}