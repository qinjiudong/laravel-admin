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
            $a = 111;
            $content->row(function ($row) {
                $row->column(3, new InfoBox('总计', 'file', 'red', '', '1024'));
                $row->column(3, new InfoBox('本月', 'file', 'red', '', '1024'));
                $row->column(3, new InfoBox('当天', 'file', 'red', '', '1024'));
                $row->column(3, new InfoBox('上月', 'file', 'red', '', '1024'));
            });

            $content->row(function (Row $row) {

                $row->column(12, function (Column $column) {

                    $sql = 'select create_date,money from qjd order by id desc limit 10';
                    $res = DB::select($sql);
                    $data = [];
                    $head = [];
                    foreach ($res as $key => $v) {
                        $data[] = -$v->money;
                        $head[] = $v->create_date;
                    }

                    $collapse = new Collapse();

                    $bar = new Bar(
                        $head,
                        [
                            ['First', $data],
                 
                        ]
                    );
                    $collapse->add('Bar', $bar);
                    
                    $column->append($collapse);


                });



            });

            $headers = ['Id', 'Email', 'Name', 'Company', 'Last Login', 'Status'];
            $rows = [
                [1, 'labore21@yahoo.com', 'Ms. Clotilde Gibson', 'Goodwin-Watsica', '1997-08-13 13:59:21', 'open'],
                [2, 'omnis.in@hotmail.com', 'Allie Kuhic', 'Murphy, Koepp and Morar', '1988-07-19 03:19:08', 'blocked'],
                [3, 'quia65@hotmail.com', 'Prof. Drew Heller', 'Kihn LLC', '1978-06-19 11:12:57', 'blocked'],
                [4, 'xet@yahoo.com', 'William Koss', 'Becker-Raynor', '1988-09-07 23:57:45', 'open'],
                [5, 'ipsa.aut@gmail.com', 'Ms. Antonietta Kozey Jr.', 'Braun Ltd', '2013-10-16 10:00:01', 'open'],
            ];

            $content->row((new Box('Table', new Table($headers, $rows)))->style('info')->solid());
        });
    }
}
