@extends('welcome')
@section('content')


<header class="agileits-box-header clearfix">
    <h3>Quản lý vé</h3>
    <div class="toolbar">


    </div>
</header>
<div class="agileits-box-body clearfix">
    <div id="hero-area"></div>
</div>
<div class="row w3-res-tb">
    <div class="col-sm-5 m-b-xs">
        <!-- <form class="search" class="d-flex" style="width: 31%;">
            <input class="form-control me-2 search-query" type="text" placeholder="Tìm bằng số vé">
            <i class="bi bi-search"></i>
        </form>              -->
    </div>

    <div class="col-sm-6">
        <div class="btn-group">
            <button type="button" class="col-lg-4 btn-file">
                Xuất file (.csv)
            </button>
            <!-- <button type="button" class=" col-lg-4 btn-add" data-toggle="modal" data-target="#form-add">
                Thêm gói vé
            </button> -->
        </div>

    </div>
</div>
<!-- <div class="d-flex justify-content-between mt-4">
       
        
    </div> -->
<div class="table-responsive">
    <table id="datatable" class="table table-striped b-t b-light">
        <thead>
            <tr>
                <th width="1%">STT</th>
                <th width="15%">Booking Code</th>
                <th width="10%">Số vé</th>
                <th width="20%">Tình trạng sử dụng</th>
                <th width="15%">Ngày sử dụng</th>
                <th width="15%">Ngày xuất vé</th>
                <th width="15%">Cổng check-in</th> 
                <th width="10%"></th>
            </tr>
        </thead>
        <tbody>

        @foreach($manageTicket as $manage)
            <tr>
              
                <td>{{$loop->iteration}}</td>
                <td>{{$manage->package_code}}</td>
                <td>{{$manage->quantity_ticket}}</td>
                <?php
                $status_use = $manage->status_use;
                ?>
                @if($status_use == 0)
                <td><span class="status-act">
                        <img class="green" src="images/Ellipse 1.png" />
                        Chưa sử dụng</span>
                </td>
                @elseif($status_use == 1)
                <td><span class="status-endDate">
                        <img class="blue" src="images/Ellipse 3.png" />
                        Đã sử dụng</span>
                </td>
                @elseif($status_use == 2)
                <td><span class="status-unact ">
                        <img class="red" src="images/Ellipse 2.png" />
                        Hết hạn</span>
                </td>
                @endif
                <td>{{$manage->date_use}}</td>
                <td>{{$manage->created_at}}</td>

                @if($status_use == 0 || $status_use == 2 )
                <td><span>-</span></td>
                @elseif($status_use == 1)
                <td><span>Cổng 1</span></td>
                @endif

                <td><i class="fa fa-ellipsis-v" aria-hidden="true"></i></td>
                
            </tr>
            @endforeach


        </tbody>
    </table>
    
 

</div>

@endSection