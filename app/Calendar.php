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
     public function showCalendar($y, $m)
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
          <h1 class="calendar-top">
          <a href="/records/?year={$prev_year}&month={$prev_month}" role="button"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601012680/chevron-left_yrrcyg.svg" class="calendar-arrow"></a>
          {$year} / {$month}
          <a href="/records/?year={$next_year}&month={$next_month}" role="button"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601012718/chevron-right_dddbda.svg" class="calendar-arrow"></a>
          </h1>
          <table class="table table-bordered">
          <thead>
          <tr>
          <th scope="col" class="sunday">日</th>
          <th scope="col">月</th>
          <th scope="col">火</th>
          <th scope="col">水</th>
          <th scope="col">木</th>
          <th scope="col">金</th>
          <th scope="col" class="saturday">土</th>
          </tr>
          </thead>
EOS;

          while ($day <= $lastDay) {
               $this->html .= "<tbody><tr>";
               for ($i = 0; $i < 7; $i++) {
                    if ($day <= 0 || $day > $lastDay) {
                         $this->html .= "<td>&nbsp;</td>";
                    } else {
                         $today = Carbon::now()->toDateString();
                         $target = $now->setDate($year, $month, $day)->toDateString();
                         if($target === $today) {
                              $this->html .= "<td><a href=\"/records/create?date={$target}\"  class=\"today\">" . $day . "&nbsp";
                         } else {
                              $this->html .= "<td><a href=\"/records/create?date={$target}\">" . $day . "&nbsp";
                         }
                         foreach ($this->records as $record) {
                              if ($record->day == $target && $record->user_id == Auth::id() ) {
                                   $this->html .= <<< EOS
                                   <a href="/records/{$record->id}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601289851/check_gtaxat.svg" alt="check" class="calendar-check"></a>
                                   EOS;
                                   break;
                              }
                         }
                         $this->html .= "</a></td>";
                    }
                    $day++;
               }
               $this->html .= "</tr></tbody>";
          }
          return $this->html .= '</table>';
     }
}
