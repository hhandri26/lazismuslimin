<?php
namespace App\Exports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class DataExport implements FromView
{
    public function view(): View{
        $catagories  	= Request()->catagories;
        if ($catagories=='result_shoper') {
            $id         = request()->id;
            $id_task    = request()->id_task;
            $id_shoper  = request()->id_shoper;
            return view('export/export_result',compact('id','id_task','id_shoper'));

       }
    }
}