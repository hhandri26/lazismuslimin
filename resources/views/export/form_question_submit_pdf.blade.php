<?php 
    $id         = request()->id;
    $id_task    = request()->id_task;
    $id_shoper  = request()->id_shoper;
    $sub_branch  = request()->sub_branch;
?>
<html>
<head>
    <title>Laporan Cabang {{$restorant}} Periode</title>
    <link href="{{ asset('/dist/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" /> 
    
   
</head>
<body>
<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
<div class="container">
	<center>
		<h5>Laporan Cabang {{$restorant}} Periode {{$periode}}</h5>
	</center> 
    <table class="table table-bordered">
    <thead>
        <tr>
            <th style="width:30px">No</th>
            <th></th>
            <th></th>
            <th style="width: 200px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php 
        $no2                 = 1;
        $row_count           = 0;
    ?>
    <!-- first looping -->
    @foreach(App\Models\QtModels::select('*')->orderby('sort','ASC')->where('id_h',$id)->get() as $row)
    <tr>
        <td colspan="4" class="question">{{$row->desc}}</td>
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
        <td colspan="2" class="question"><?php echo $row2->question?></td>
        <td>
           
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="hidden" name="id_soal" value="{{$row2->id}}">
                    @if($row2->type == 1)
                        <div class="row">
                            <div class="col-sm-12">
                                    @if($row2->score=='1')
                                        {{'Ya'}}
                                    @elseif($row2->score==null)
                                        {{'Tidak'}}
                                    @endif
                                
                            </div>
                            
                        </div>
                        @elseif($row2->type == 2)
                        <div class="row">
                            <div class="col-sm-12">
                                {{$row2->score}}
                            </div>
                        </div>
                        @elseif($row2->type == 5)
                        <div class="row">
                            <div class="col-sm-12">
                                @foreach(App\Models\BulletModels::select('*')->where('id_h',$row2->bullet)->where('score',$row2->score)->orderby('id','ASC')->get() as $row3)
                                    {{$row3->question}}
                                @endforeach
                            </div>
                        </div>
                        @elseif($row2->type == 7)
                        <div class="row">
                            <div class="col-sm-12">
                                {{$row2->jawaban}}
                            </div>  
                        </div>
                        @elseif($row2->type == 8)
                        <div class="row">
                            <div class="col-sm-12">
                                {{$row2->jawaban}}  
                            </div>                    
                        </div>
                        @elseif($row2->type == 9)
                        <div class="row">
                            <div class="col-sm-12">
                                {{$row2->jawaban}}
                            </div>
                        </div>
                        @elseif($row2->type == 3)
                        <div class="row">
                            <div class="col-sm-12">
                                {{$row2->jawaban}}
                            </div>
                        </div>
                        @elseif($row2->type == 4)
                        <div class="row">
                            <div class="col-sm-12">
                                {{$row2->jawaban}}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            
        </td>
    </tr>
    @if($row2->type == 6)
    <tr>
        <td colspan="4">
            <div class="row">
                <div class="col-sm-12">
                       <?php echo $row2->jawaban;?>
                </div>
                
            </div>
        </td>
    </tr>
   
   
    @endif
    <?php
        
        $row_count++;
        $saldo+= $row2->score;
        if($row2->jawaban ==''){
        $sum_row+= 1;
        }
    ?>
    @endforeach
    <?php 
        $no2++
    ?>
    <tr>
        <td colspan="3">Total </td>
        <td>
        @if($saldo)
            {{($saldo/$sum_row)*100}}
        @endif
        
        </td>
    </tr>
    @endforeach
    <tr>
        <td>Total</td>
        <td colspan="3">{{$row_count }}</td>
    </tr>
    </tbody>
</table>
</div>
 
</body>
</html>
