<?php
/**
 * Created by PhpStorm.
 * User: SiarkoWodór
 * Date: 22.02.2018
 * Time: 16:55
 */

namespace app\widgets;


use app\assets\WeekCalendarAsset;
use DateTime;
use yii\base\Exception;
use yii\base\Model;
use yii\base\Widget;
use yii\helpers\Html;

class WeekCalendar extends Widget {

    const BR = '<br/>';

    /* @var Model $model */
    public $model;
    public $month;
    public $year;
    public $eventConfig = [];


    private $daysOfWeek = ['Niedziela', 'Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota'];
    private $tasks = [];
    private $linkData = [];

    public function init() {//TODO toleracja na błędy w konfigu
        if ($this->model === null) {
            throw new Exception("Model has not been set!");
        }
        if ($this->month === null) {
            $this->month = date('n');
        }
        if ($this->year === null) {
            $this->year = date('Y');
        }
        $this->normalizeLinkData();

        WeekCalendarAsset::register($this->view);
        parent::init();
    }

    public function run() {
        return $this->buildTable();
    }

    /**
     * @return string html zbudowanej tabeli
     */
    private function buildTable() {
        $render = '';

        $month = $this->month;
        $year = $this->year;

        $dateObj = DateTime::createFromFormat('!m', $month);
        $render .= Html::tag('h2', $dateObj->format('F') . ' ' . $year);

        $this->tasks = $this->mapTasks($month, $year);

        $tableContent = $this->renderTableHeader();

        $rowContent = '';
        $startingDay = $this->getCalendarStartingDay($month, $year);
        $looseDays = $this->getLooseEndDays($month, $year);
        if ($startingDay != 0) {
            $rowContent .= Html::tag("td", '', ['colspan' => $startingDay]);
        }
        $rows = '';
        for ($day = 1; $day <= $this->getNumDaysInMonth($month, $year); $day++) {
            $rowContent .= $this->getCell($day, $month, $year);
            if ($this->isLastDayInWeek($day, $month, $year)) {
                $rows .= Html::tag('tr', $rowContent);
                $rowContent = '';
            }
        }
        if (!$this->isLastDayInWeek($day, $month, $year)) {
            $rows .= $rowContent;
        }
        if ($looseDays != 0) {
            $rows .= Html::tag('td', '', ['colspan' => $looseDays]);
        }
        $tableContent .= $rows;
        $render .= Html::tag("table", $tableContent, ['class' => 'table table-striped table-bordered']);

        return $render;
    }

    /**
     * @return string html nagłówka z dniami tygodnia
     */
    private function renderTableHeader() {
        $rowContent = '';
        foreach ($this->daysOfWeek as $day) {
            $rowContent .= Html::tag("td", Html::encode($day));
        }
        return Html::tag("tr", $rowContent);
    }

    /**
     * @param $day int
     * @param $month int
     * @param $year int
     * @return string html pojedynczej komórki
     */
    private function getCell($day, $month, $year) {
        $cellContent = $this->getCellContent($day, $month, $year);
        $cellCssClasses = '';
        if ($this->isToday($day, $month, $year)) {
            $cellCssClasses .= 'today';
        }

        $cell = Html::tag('td', $cellContent, ['class' => $cellCssClasses]);
        return $cell;
    }

    /**
     * @param $day int
     * @param $month int
     * @param $year int
     * @return string zawartość pojedynczej komórki tabeli
     */
    private function getCellContent($day, $month, $year) {
        $ret = Html::tag('div', $day, ['class' => 'calendarDay']);
        foreach ($this->tasks[$day] as $task) {
            $link = $this->getDetailLink('Szczegóły', $task['id']);
            $taskCssClasses = 'task '.$this->eventConfig['stateCss'][$task[$this->eventConfig['state']]];
            $taskInfo = '';
            $taskInfo .= 'Data oddania:' . $task[$this->eventConfig['dayTo']] . self::BR;
            $taskInfo .= 'Godzina nadania:' . $task[$this->eventConfig['timeFrom']] . self::BR;
            $taskInfo .= 'Godzina oddania:' . $task[$this->eventConfig['timeTo']] . self::BR;
            $content = $task[$this->eventConfig['title']] . ' - ' . $link;
            $content .= Html::tag('div', $taskInfo, ['class' => $this->eventConfig['descriptionCss']]);
            $ret .= Html::tag('div', $content, ['class' => $taskCssClasses]);
        }
        return $ret;
    }

    private function isToday($d, $m, $y) {
        return $d == date('j') and $m == date('n') and $y == date('Y');
    }

    /**
     * @param $month
     * @param $year
     * @return false|int ilość dni w miesiącu
     */
    private function getNumDaysInMonth($month, $year) {
        return date('t', mktime(0, 0, 0, $month, 1, $year));
    }

    /**
     * @param $month
     * @param $year
     * @return int ilość wierszy bez nagłówka z dniami
     */
    private function getCalendarRows($month, $year) {
        $num = $this->getNumDaysInMonth($month, $year) + $this->getCalendarStartingDay($month, $year);
        return ceil($num / 7);
    }

    /**
     * @param $month
     * @param $year
     * @return int dzień tygodnia przy którym wypada 1 dzień miesiąca - 0 to niedziela
     */
    private function getCalendarStartingDay($month, $year) {
        return date('w', mktime(0, 0, 0, $month, 1, $year));
    }

    /**
     * @param $month
     * @param $year
     * @return int Ilość dni do końca tygodnia z następnego miesiąca
     */
    private function getLooseEndDays($month, $year) {
        $daysFromPrev = $this->getCalendarStartingDay($month, $year);
        $rows = $this->getCalendarRows($month, $year);
        $dayCount = $this->getNumDaysInMonth($month, $year);
        return (7 * $rows) - ($daysFromPrev + $dayCount);
    }

    /**
     * @param $day int dzień miesiąca
     * @param $month int
     * @param $year int
     * @return bool Czy dany dzień miesiąca jest ostatnim dniem tygodnia
     */
    private function isLastDayInWeek($day, $month, $year) {
        return ($this->getCalendarStartingDay($month, $year) + $day) % 7 == 0;
    }

    private function mapTasks($month, $year) {
        $map = [];
        for ($d = 1; $d <= 31; $d++) {
            $map[$d] = [];
        }

        foreach ($this->model as $row) {
            $dateTime = new DateTime($row[$this->eventConfig['dayFrom']]);
            if ($dateTime->format('n') == $month and $dateTime->format('Y') == $year) {
                array_push($map[$dateTime->format('j')], $row);
            }
        }
        return $map;
    }

    private function normalizeLinkData() {
        $this->linkData['c'] = $this->eventConfig['detailLink']['controller'];
        $this->linkData['a'] = $this->eventConfig['detailLink']['action'];
        $this->linkData['i'] = $this->eventConfig['detailLink']['idParam'];
    }

    /**
     * @param $text string napis linku
     * @param $id string identyfikator elementu przesyłany do akcji
     * @return string element a w html
     */
    private function getDetailLink($text, $id) {
        return Html::a($text,
            'index.php?r=' .
            $this->linkData['c'] .
            '%2F' . $this->linkData['a'] .
            '&' . $this->linkData['i'] .
            '=' . $id
        );
    }
}