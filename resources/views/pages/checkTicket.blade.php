@extends('welcome')
@section('content')


<header class="agileits-box-header clearfix">
    <h3>Đối soát vé</h3>
    <div class="toolbar">


    </div>
</header>
<div class="agileits-box-body clearfix">
    <div id="hero-area"></div>
</div>
<div class="row w3-res-tb">
    <div class="col-sm-5 m-b-xs">
 
    </div>

    <div class="col-sm-6">
        <div class="btn-group">
            <button type="button" class=" col-lg-4 btn-file" data-toggle="modal" data-target="#filter">
                <img src="images/filter.png" class="filter" />
                Lọc vé
            </button>
            <!-- <button type="button" class="col-lg-4 btn-file">

                Xuất file (.csv)
            </button> -->

        </div>


        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="filter" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button> -->
                        <h4 class="modal-title">Lọc vé</h4>
                    </div>
                    <div class="modal-body">

                        <form action="{{URL::to('check-ticket-filter')}}" method="GET" role="form">
                            {{csrf_field()}}
                            
                            <div class="mb-3" style="padding:1em;">
                                <label for="exampleInputEmail1" class="form-label">Tình trạng đối soát</label>
                                <div  class="form-inline" style="padding:10px 0 10px 0;">
                                    <div class="form-check form-group"  style="padding-right: 50px;">
                                        <input type="radio" class="form-check-input" id="radio1" name="optradio" value="">Tất cả
                                        <label class="form-check-label" for="radio1"></label>
                                    </div>
                                    <div class="form-check form-group" style="padding-right: 50px;">
                                        <input type="radio" class="form-check-input" id="radio2" name="optradio" value="1">Đã đối soát
                                        <label class="form-check-label" for="radio2"></label>
                                    </div>
                                    <div class="form-check form-group" style="padding-right: 50px;">
                                        <input type="radio" class="form-check-input" id="radio3" name="optradio" value="0">Chưa đối soát
                                        <label class="form-check-label" for="radio3"></label>
                                    </div>
                              
                                </div>
                            </div>
                            <div class="mb-3">
                            <label style="padding: 0 1em 1em;" for="exampleInputEmail1" class="form-label">Loại vé : vé cổng</label>
                            </div>
                            <div class="form-inline" style="padding: 0 1em 1em;">
                                <div class="form-group" style="padding-right:35px;  ">
                                    <label for="exampleInputPassword1">Từ ngày</label>
                                    <input type="date" class="form-control2" id="exampleInputPassword3" name="apply_date" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Đến ngày</label>
                                    <input type="date" class="form-control2" id="exampleInputPassword3" name="exp" >
                                </div>
                            </div><br>
                           
                     
                            


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

<div class="table-responsive">
    <table id="datatable" class="table table-striped b-t b-light">
        <thead>
            <tr>
                <th width="10%">STT</th>               
                <th width="20%">Số vé</th>
                <th width="20%">Ngày sử dụng</th>
                <th width="15%">Tên loại vé</th>
                <th width="15%">Cổng check-in</th>
                <th width="20%"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($checkTicket as $check)
           <tr>
               <td>{{$loop->iteration}}</td>
               <td>{{$check->package_code}}</td>
               <td>{{$check->date_use}}</td>
               <td>Vé cổng</td>
               <td>{{$check->Gate}}</td>
               @if(($check->status_use) == 0)
               <td><i>Chưa đối soát</i></td>
               @elseif(($check->status_use) == 1 || ($check->status_use) == 2)
               <td><i style="color:#FD5959;">Đã đối soát</i></td>
               @endif
           </tr>
            @endforeach

        </tbody>
    </table>



</div>

@endSection