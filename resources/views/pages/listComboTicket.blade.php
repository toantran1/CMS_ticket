@extends('welcome')
@section('content')


<header class="agileits-box-header clearfix">
    <h3>Danh sách gói vé</h3>
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
            <button type="button" class=" col-lg-4 btn-add" data-toggle="modal" data-target="#form-add">
                Thêm gói vé
            </button>
        </div>
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="form-add" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button> -->
                        <h4 class="modal-title">Thêm gói vé</h4>
                    </div>
                    <div class="modal-body">

                        <form action="{{URL::to('add-new-ticket')}}" method="POST" role="form">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên gói vé<label style="color:red;">*</label></label>
                                <input type="text" class="form-control1" id="exampleInputEmail3" name="ticket_name" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mã gói<label style="color:red;">*</label></label>
                                <input type="text" class="form-control1" id="exampleInputEmail3" name="ticket_code" required>
                            </div>
                            <div class="form-inline">
                                <div class="form-group" style="padding-right:35px;  ">
                                    <label for="exampleInputPassword1">Ngày áp dụng</label>
                                    <input type="date" class="form-control2" id="exampleInputPassword3" name="apply_date" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Ngày hết hạn</label>
                                    <input type="date" class="form-control2" id="exampleInputPassword3" name="exp" required>
                                </div>
                            </div><br>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá vé áp dụng</label>

                                <div class="checkbox">

                                    <label class="checkbox_ticket">Vé lẻ (VNĐ/vé) với giá &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;/Vé

                                        <input type="checkbox" id="yourBox">
                                        <span class="checkmark"></span>

                                    </label>

                                </div>
                                <label class="checkbox_ticket"></label>
                                <input type="text" class="form-control3" id="yourText" name="price_ticket" required disabled>

                                <div class="checkbox">

                                    <label class="checkbox_ticket">Vé lẻ (VNĐ/vé) với giá &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;/&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Vé

                                        <input type="checkbox" id="yourBox2">
                                        <span class="checkmark"></span>

                                    </label>

                                </div>
                                <label class="checkbox_ticket"></label>
                                <input type="text" class="form-control4" id="yourText2" name="price_combo" required disabled>
                                <input type="text" class="form-control5" id="yourText3" name="qty_ticket" required disabled>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tình trạng</label>
                                <select class="form-select status1" name="status">
                                    <option value="0">Đang áp dụng</option>
                                    <option value="1">Tắt</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <i><label style="color:red;">* </label><label class="note">Là thông tin bắt buộc</label></i>
                            </div>
                            <div class="button-grp">

                                <button aria-hidden="true" data-dismiss="modal" type="submit" class="btn-cancel">Hủy</button>
                                <button type="submit" class="btn-save">Lưu</button>
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
                <th width="7.5%">Mã gói</th>
                <th width="12%">Tên gói vé</th>
                <th width="12.6%">Ngày áp dụng</th>
                <th width="12%">Ngày hết hạn</th>
                <th width="14%">Giá vé(VNĐ/Vé)</th>
                <th width="14%">Giá Combo (VNĐ/Combo)</th>
                <th width="18%">Tình trạng</th>
                <th width="15%"></th>
            </tr>
        </thead>
        <tbody>

            @foreach($comboTicket as $combo)
        
            <tr>

                <!-- <td> {{$loop->iteration}}</td> -->
                <td class="id"> {{$combo->combo_id}}</td>
               
                <td><span class="code">{{$combo->combo_code}}</span></td>
                <td><span class="name">{{$combo->combo_name}}</span></td>
                <td><span class="res_date">{{ Carbon\Carbon::parse($combo->res_date)->format('Y-m-d')}}</span></td>
                <td><span class="EXP">{{ Carbon\Carbon::parse($combo->EXP)->format('Y-m-d')}}</span></td>
                <td><span class="price">{{number_format(floatval($combo->priceTicket),0,',','.')}} </span>VNĐ</td>
                <?php
                $priceOfCombo = $combo->priceCombo;
                $qty = $combo->qty;
                ?>

                @if($qty != null && $priceOfCombo != null)
                <td><span class="price_combo">{{number_format(floatval($priceOfCombo),0,',','.')}}</span> VNĐ/<span class="qty_combo">{{$combo->qty}} </span>vé</td>
                @else
                <td><span class="price_combo">--</span></td>
                @endif

                <?php
                $result = $combo->status;
                ?>
                @if($result ==0)
                <td><span class="status-act status">
                        <img class="green" src="images/Ellipse 1.png" />
                        Đang áp dụng</span>
                </td>
                @else
                <td><span class="status-unact status">
                        <img class="red" src="images/Ellipse 2.png" />
                        Tắt</span>
                </td>

                @endif
                <!-- <td><span class="status">{{$combo->status}}</span></td> -->
                <td>
                    <a href="{{URL::to('/update-ticket/'.$combo->combo_id)}}" 
                    data-toggle="modal" data-target="#editModal" class="active editbtn" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active">Cập nhật</i></a>
                </td>

            </tr>
       

            @endforeach

            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="editModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <!-- <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button> -->
                            <h4 class="modal-title">Cập nhật thông tin gói vé</h4>
                        </div>
                        <div class="modal-body">

                            <form action="{{URL::to('update-ticket')}}" method="POST" id="editForm">
                                {{csrf_field()}}
                                <!-- {{method_field('PUT')}} -->
                                    <input type="hidden" id="id" value="" name="id"/>
                                <div class="form-group">
                                    <label for="">Tên gói vé<label style="color:red;">*</label></label>
                                    <input type="text" class="form-control1" id="t_name" value="" name="uticket_name" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Mã gói<label style="color:red;">*</label></label>
                                    <input type="text" class="form-control1" id="t_code" value="" name="uticket_code" required>
                                </div>

                                <div class="form-inline">
                                    <div class="form-group" style="padding-right:35px;  ">
                                        <label for="">Ngày áp dụng</label>
                                        <input type="date" class="form-control2" id="t_date" name="uapply_date" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Ngày hết hạn</label>
                                        <input type="date" class="form-control2" id="t_exp" name="uexp" required>
                                    </div>
                                </div><br>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá vé áp dụng</label>
                                    <div class="checkbox">
                                        <label class="checkbox_ticket">Vé lẻ (VNĐ/vé) với giá &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;/Vé

                                            <input type="checkbox" id="update_yourBox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    <label class="checkbox_ticket"></label>
                                    <input type="text" class="form-control3" id="update_yourText" name="uprice_ticket" required disabled>

                                    <div class="checkbox">

                                        <label class="checkbox_ticket">Vé lẻ (VNĐ/vé) với giá &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;/&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Vé

                                            <input type="checkbox" id="update_yourBox2">
                                            <span class="checkmark"></span>

                                        </label>

                                    </div>
                                    <label class="checkbox_ticket"></label>
                                    <input type="text" class="form-control4" id="update_yourText2" name="uprice_combo" required disabled>
                                    <input type="text" class="form-control5" id="update_yourText3" name="uqty_ticket" required disabled>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tình trạng</label>
                                    <select class="form-select" id="t_status" name="ustatus">
                                        <option value="0">Đang áp dụng</option>
                                        <option value="1">Tắt</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <i><label style="color:red;">* </label><label class="note">Là thông tin bắt buộc</label></i>
                                </div>
                                <div class="button-grp">

                                    <button aria-hidden="true" data-dismiss="modal" type="submit" class="btn-cancel">Hủy</button>
                                    <button type="submit" class="btn-save">Lưu</button>
                                    <!-- <div class="clear"></div> -->
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
           

        </tbody>
    </table>
    <!-- <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> 
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script> -->
    <script>
        // add
        document.getElementById('yourBox').onchange = function() {
            document.getElementById('yourText').disabled = !this.checked;
        };
        document.getElementById('yourBox2').onchange = function() {
            document.getElementById('yourText2').disabled = !this.checked;
            document.getElementById('yourText3').disabled = !this.checked;
        };
        //update 
        document.getElementById('update_yourBox').onchange = function() {
            document.getElementById('update_yourText').disabled = !this.checked;
        };
        document.getElementById('update_yourBox2').onchange = function() {
            document.getElementById('update_yourText2').disabled = !this.checked;
            document.getElementById('update_yourText3').disabled = !this.checked;
        };
    </script>
    <script>
        $(document).on('click','.editbtn',function(){
            console.log('opened');
            var data= $(this).parents('tr');
            $('#id').val(data.find('.id').text());
            $('#t_name').val(data.find('.name').text());
            $('#t_code').val(data.find('.code').text());
            $('#t_date').val(data.find('.res_date').text());
            $('#t_exp').val(data.find('.EXP').text());
            $('#update_yourText').val(data.find('.price').text());
            $('#update_yourText2').val(data.find('.price_combo').text());
            $('#update_yourText3').val(data.find('.qty_combo').text());
            console.log('get data success');
 
        });
    </script>
    <script>
        $(document).ready(function(){
            $('#datatable').Datatable({
                select:true
            });
        });
    </script>
    <!-- <script>
        $(document).ready(function(){
            $(document).on('click', '.editbtn',function(){
                var a= $(this).val();
                alert(a);
            });

        });
    </script> -->

</div>
@endSection