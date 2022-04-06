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
            <button type="button" class=" col-lg-4 btn-file" data-toggle="modal" data-target="#filter">
                <img src="images/filter.png" class="filter" />
                Lọc vé
            </button>
            <button type="button" class="col-lg-4 btn-file">

                Xuất file (.csv)
            </button>

        </div>

        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="filter" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button> -->
                        <h4 class="modal-title">Lọc vé</h4>
                    </div>
                    <div class="modal-body">

                        <form action="{{URL::to('filter')}}" method="GET" role="form">
                            {{csrf_field()}}
                            <!-- <div class="form-group">
                                <label for="exampleInputEmail1">Tên gói vé<label style="color:red;">*</label></label>
                                <input type="text" class="form-control1" id="exampleInputEmail3" name="ticket_name" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mã gói<label style="color:red;">*</label></label>
                                <input type="text" class="form-control1" id="exampleInputEmail3" name="ticket_code" required>
                            </div> -->
                            <div class="form-inline">
                                <div class="form-group" style="padding-right:35px;  ">
                                    <label for="exampleInputPassword1">Từ ngày</label>
                                    <input type="date" class="form-control2" id="exampleInputPassword3" name="apply_date" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Đến ngày</label>
                                    <input type="date" class="form-control2" id="exampleInputPassword3" name="exp" >
                                </div>
                            </div><br>
                           
                     
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tình trạng sử dụng</label>
                                <div style="display: block;" class="form-inline">
                                    <div class="form-check form-group"  style="padding-right: 50px;">
                                        <input type="radio" class="form-check-input" id="radio1" name="optradio" value="">Tất cả
                                        <label class="form-check-label" for="radio1"></label>
                                    </div>
                                    <div class="form-check form-group" style="padding-right: 50px;">
                                        <input type="radio" class="form-check-input" id="radio2" name="optradio" value="1">Đã sử dụng
                                        <label class="form-check-label" for="radio2"></label>
                                    </div>
                                    <div class="form-check form-group" style="padding-right: 50px;">
                                        <input type="radio" class="form-check-input" id="radio3" name="optradio" value="0">Chưa sử dụng
                                        <label class="form-check-label" for="radio3"></label>
                                    </div>
                                    <div class="form-check form-group">
                                        <input type="radio" class="form-check-input" id="radio4" name="optradio" value="2">Hết hạn
                                        <label class="form-check-label" for="radio4"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Cổng Check-in</label>
                                <div style="padding: 10px;" class="form-inline">
                                    <div class="form-group" style="margin-right: 150px;">
                                        <input class="form-check-input" type="checkbox" id="all" value="all">
                                        <label class="form-check-label" for="all">Tất cả</label>
                                    </div>
                                    <div class="form-group" style="margin-right: 160px;">
                                        <input class="form-check-input" type="checkbox" id="gate1" value="gate1">
                                        <label class="form-check-label" for="gate1">Cổng 1</label>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-check-input" type="checkbox" id="gate2" value="gate2">
                                        <label class="form-check-label" for="gate2">Cổng 2</label>
                                    </div>
                                </div>
                                <div style="padding: 10px;" class="form-inline">
                                    <div class="form-group" style="padding-right: 141px;" >
                                        <input class="form-check-input" type="checkbox" id="gate3" value="gate3">
                                        <label class="form-check-label" for="gate3">Cổng 3</label>
                                    </div>
                                    <div class="form-group" style="padding-right: 156px;">
                                        <input class="form-check-input" type="checkbox" id="gate4" value="gate4">
                                        <label class="form-check-label" for="gate4">Cổng 4</label>
                                    </div>
                                    <div class="form-group" >
                                        <input class="form-check-input" type="checkbox" id="gate5" value="gate5">
                                        <label class="form-check-label" for="gate5">Cổng 5</label>
                                    </div>
                                </div>
                            </div>


                            <div class="button-grp">

                                <button type="submit" class="btn-cancel">Lọc</button>
                                <button aria-hidden="true" data-dismiss="modal" type="submit" class="btn-save">Hủy</button>
                                <!-- <div class="clear"></div> -->
                            </div>

                        </form>
                    </div>
                </div>
            </div>
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

            @foreach($filters as $manage)
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