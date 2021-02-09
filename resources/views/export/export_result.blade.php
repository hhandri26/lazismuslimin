<?php 
    $id         = request()->id;
    $id_task    = request()->id_task;
    $id_shoper  = request()->id_shoper;
    $sub_branch  = request()->sub_branch;
?>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <!-- first looping -->
    @foreach(App\Models\QtModels::select('*')->orderby('sort','ASC')->where('id_h',$id)->get() as $row)
    <tr>
        <td>{{$row->desc}}</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <!-- looping 2 -->
    <?php 
        $no                 = 1;
        $saldo               = 0;
        $sum_row             = 0;
    ?>
    @foreach(App\Models\SbModels::select('a.*','b.jawaban','b.score')->leftjoin('t_shoper_answer_s as b','a.id','=','b.id_soal')->where('a.id_h',$row->id)->where('b.id_shoper',$id_shoper)->where('b.id_restorant',$sub_branch)->where('b.id_h',$id_task)->orderby('a.id','ASC')->get() as $row2)
    <tr>
        <td>{{$no++}}</td>
        <td>{{strip_tags($row2->question)}}</td>
        <td>{{strip_tags($row2->jawaban)}}</td>
        <td>{{$row2->score}}</td>
    </tr>
    <?php
        $saldo+= $row2->score;
        if($row2->jawaban ==''){
        $sum_row+= 1;
        }
    ;?>
    @endforeach
    <tr>
        <td colspan="3">Total </td>
        <td>
        @if($saldo)
            {{($saldo/$sum_row)*100}}
        @endif
        
        </td>
    </tr>
    
   
    @endforeach
    
    </tbody>
</table>
