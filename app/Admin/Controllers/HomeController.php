<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\Box;
use Encore\Admin\Widgets\Chart\Bar;
use Encore\Admin\Widgets\Chart\Doughnut;
use Encore\Admin\Widgets\Chart\Line;
use Encore\Admin\Widgets\Chart\Pie;
use Encore\Admin\Widgets\Chart\PolarArea;
use Encore\Admin\Widgets\Chart\Radar;
use Encore\Admin\Widgets\Collapse;
use Encore\Admin\Widgets\InfoBox;
use Encore\Admin\Widgets\Tab;
use Encore\Admin\Widgets\Table;
use DB;

class HomeController extends Controller
{
    public function index()
    {

        return Admin::content(function (Content $content) {

            $content->header('HOME');
            $content->description('统计...');
            $data = [
                '总计'=>'0',
                '本月'=>'0',
                '当天'=>'0',
                '上月'=>'0',
            ];
            $sql = 'select sum(money) total from qjd';
            $res = DB::select($sql);
            if($res)
                $data['总计'] = $res['0']->total;
            $sql = 'select sum(money) total from qjd where DATE_FORMAT(create_date,"%Y-%m-%d")="'.date('Y-m-d').'"';
            $res = DB::select($sql);
            if($res)
                $data['当天'] = $res['0']->total;
            $sql = 'select sum(money) total from qjd where DATE_FORMAT(create_date,"%Y-%m")="'.date('Y-m').'"';
            $res = DB::select($sql);
            if($res)
                $data['本月'] = $res['0']->total;

            $last_month = date('Y-m',(strtotime(date('Y-m-01 00:00:00')) - 60));
            $sql = 'select sum(money) total from qjd where DATE_FORMAT(create_date,"%Y-%m")="'.$last_month.'"';
            $res = DB::select($sql);
            if($res)
                $data['上月'] = $res['0']->total;

            $content->row(function ($row) use($data) {
                $row->column(3, new InfoBox('总计', 'file', 'red', '', $data['总计']));
                $row->column(3, new InfoBox('本月', 'file', 'red', '', $data['本月']));
                $row->column(3, new InfoBox('当天', 'file', 'red', '', $data['当天']));
                $row->column(3, new InfoBox('上月', 'file', 'red', '', $data['上月']));
            });

            $content->row(function (Row $row) {

                $row->column(6, function (Column $column) {
                    $sql = 'select create_date,money from qjd order by id desc limit 10';
                    $res = DB::select($sql);
                    $data = [];
                    $head = [];
                    foreach ($res as $key => $v) {
                        $data[] = -$v->money;
                        $head[] = $v->create_date;
                    }
                    
                    $collapse = new Collapse();
                    $bar = new Bar($head,[['First', $data]]);
                    $collapse->add('Bar', $bar);
                    $column->append($collapse);
                });

                $row->column(6, function (Column $column) {
                    $sql = 'select create_date,money from qjd order by id desc limit 10';
                    $res = DB::select($sql);
                    $data = [];
                    $head = [];
                    foreach ($res as $key => $v) {
                        $data[] = -$v->money;
                        $head[] = $v->create_date;
                    }

                    $collapse = new Collapse();
                    $bar = new Bar($head,[['First', $data]]);
                    $collapse->add('Bar', $bar);
                    $column->append($collapse);
                });
            });

            $headers = ['id', 'num', 'date'];
            $rows = [];
            $sql = 'select id,money,create_date from qjd order by id desc limit 5';
            $res = DB::select($sql);
            if($res)
                $rows = $res;
            $content->row((new Box('Table', new Table($headers, $rows)))->style('info')->solid());
        });
    }
}
