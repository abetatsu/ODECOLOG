<?php

namespace App;

use Carbon\Carbon;
use Auth;

class Calendar
{
     private $records;

     function __construct($records)
     {
          $this->records = $records;
     }

     private $html;
     public function showCalendarTag($m, $y)
     {
          $now = Carbon::now();
          $year = $y;
          $month = $m;
          if ($year == null) {
               $year = $now->year;
               $month = $now->month;
          }

          $prev = $now->setDate($year, $month, 1)->subMonth();
          $prev_year = $prev->year;
          $prev_month = $prev->month;

          $next = $now->setDate($year, $month, 1)->addMonth();
          $next_year = $next->year;
          $next_month = $next->month;

          $firstWeekDay = Carbon::create($year, $month, 1)->dayOfWeek;
          $lastDay = Carbon::create($year, $month, 1)->daysInMonth;
          $day = 1 - $firstWeekDay;
          $this->html = <<< EOS
          <h1>
          <a class="btn btn-primary" href="/records/?year={$prev_year}&month={$prev_month}" role="button">&lt;前月</a>
          {$year}年{$month}月
          <a class="btn btn-primary" href="/records/?year={$next_year}&month={$next_month}" role="button">翌月&gt;</a>
          </h1>
          <table class="table table-bordered">
          <tr>
          <th scope="col">日</th>
          <th scope="col">月</th>
          <th scope="col">火</th>
          <th scope="col">水</th>
          <th scope="col">木</th>
          <th scope="col">金</th>
          <th scope="col">土</th>
          </th>
EOS;

          while ($day <= $lastDay) {
               $this->html .= "<tr>";
               for ($i = 0; $i < 7; $i++) {
                    if ($day <= 0 || $day > $lastDay) {
                         $this->html .= "<td>&nbsp;</td>";
                    } else {
                         $target = $now->setDate($year, $month, $day)->toDateString();
                         $this->html .= "<td><a href=\"/records/create?date={$target}\">" . $day . "&nbsp";
                         foreach ($this->records as $record) {
                              if ($record->day == $target && $record->user_id == Auth::id() ) {
                                   $this->html .= <<< EOS
                                   <a href="/records/{$record->id}">●</a>
                                   EOS;
                                   break;
                              }
                         }
                         $this->html .= "</a></td>";
                    }
                    $day++;
               }
               $this->html .= "</tr>";
          }
          return $this->html .= '</table>';
     }
}
