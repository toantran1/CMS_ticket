<div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="{{\Request::route()->getName() == 'trang-chu' ? 'active' : null}}" href="{{route('trang-chu')}}">
                        <i class="fa fa-home"></i>
                        <!-- <img class="home-icons" src="images/home-icon.png"/> -->
                        <span>Trang chủ</span>
                    </a>
                </li>
                <li>
                    <a class="{{\Request::route()->getName() == 'manage-ticket' ? 'active' : ''}}" href="{{route('manage-ticket')}}">
                        <i class="fa fa-ticket"></i>
                        <!-- <img class="home-icons" src="images/Vector-quanlyve.svg"/> -->
                        <span>Quản lý vé</span>
                    </a>
                </li>
 
                <li>
                    <a class="{{\Request::route()->getName() == 'check-ticket' ? 'active' : ''}}" href="{{route('check-ticket')}}">
                        <img class="home-icons" src="images/doisoatve.png"/>
                        <span>Đối soát vé</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-list-ul"></i>
                        <span>Danh sách sự kiện</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-desktop"></i>
                        <span>Quản lý thiết bị</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-cog"></i>
                        <span>Cài đặt</span>
                    </a>
                    <ul class="sub">
                        <li ><a class="{{\Request::route()->getName() == 'list-ticket' ? 'active' : ''}}" href="{{URL::to('/list-ticket')}}">Gói dịch vụ</a></li>
                        
                    </ul>
                </li>
               
            </ul>           
         </div>