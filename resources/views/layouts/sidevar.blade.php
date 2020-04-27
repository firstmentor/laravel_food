  <!-- this part will show when usertype=0 or is_active == 1 admin dashboard will show--->
@if(Auth::user()->usertype == 0 && Auth::user()->is_active == 1)
	<aside class="main-sidebar"><!-- sidebar: style can be found in sidebar.less -->
	    <section class="sidebar">
	    	<br>
		    <ul class="sidebar-menu"> 
		        <CENTER> 
		            <p style="color:white;"><b><span>Welcome &nbsp;{{ Auth::user()->name }} </span></b></p> 
                 </CENTER>
		        <li>
			        <a href="{{url('dashboard')}}">
			          <i class="fa fa-dashboard"></i><span>Dashboard</span>
			        </a>
		        </li>
		        <li>
		        	<a href="{{url('alluser')}}"><i class="fa fa-search"></i><span>View All Users</span></a>
		        </li>
		        <li class="treeview">
			        <a href="#">
			          <i class="fa fa-pie-chart"></i>
			          <span> Manage Restaurants</span>
			          <i class="fa fa-angle-left pull-right"></i>
			        </a>
			        <ul class="treeview-menu"> 
			            <li>
				          	<a href="{{url('admin')}}"><i class="fa fa-circle-o"></i><span>Add Restaurants</span>
				            </a>
				        </li>
			            <li>
			            	<a href="{{url('allrestaurant')}}"><i class="fa fa-circle-o"></i><span>View All Restaurants</span>
			               </a>
			            </li>
			            <li>
			            	<a href="{{url('approvenow')}}"><i class="fa fa-circle-o"></i><span>View For Approval</span>
			               </a>
			            </li>
			        </ul>
		        </li>
		        <li class="treeview">
			        <a href="#">
			          <i class="fa fa-pie-chart"></i>
			          <span> Manage Delivery Boy</span>
			          <i class="fa fa-angle-left pull-right"></i>
			        </a>
			        <ul class="treeview-menu"> 
			            <li>
				          	<a href="{{url('adddelivery')}}"><i class="fa fa-circle-o"></i><span>Add Delivery Boy</span>
				            </a>
				        </li>
			            <li>
			            	<a href="{{url('showdeliveryboy')}}"><i class="fa fa-circle-o"></i><span>View All Delivery Boy</span>
			               </a>
			            </li>
			            <li>
			            	<a href="{{url('approve_delivery_boy')}}"><i class="fa fa-circle-o"></i><span>View For Approval</span>
			               </a>
			            </li>
			        </ul>
		        </li>
		        <li>
		        	<a href="{{url('editor')}}"><i class="fa fa-pie-chart"></i><span>Manage Content</span></a>
		        </li>
		        <li class="treeview">
			        <a href="#">
			          <i class="fa fa-pie-chart"></i>
			           <span>Settlements</span>
			          <i class="fa fa-angle-left pull-right"></i>
			        </a>

			        <ul class="treeview-menu"> 
			          <li>
			            <a href="{{url('outstandingpayout')}}"><i class="fa fa-circle-o"></i><span>Outstanding Payout</span>
			            </a>
			          </li> 
			        </ul>
			    </li>
		    </ul>
	    </section><!-- /.sidebar -->
	</aside>

    <!-- this part will show when usertype=1 or is_active == 1 in restaurant after approval--->
@elseif(Auth::user()->usertype == 1 && Auth::user()->is_active == 1) 
    <aside class="main-sidebar">
	    <section class="sidebar"><br>
		    <ul class="sidebar-menu"> 
		        <CENTER> 
		          <p style="color:white;"><b><span>Welcome &nbsp;{{ Auth::user()->name }} </span></b></p> 
                 </CENTER>
		        <li>
		        <li>
			        <a href="{{url('dashboard')}}">
			          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
			        </a>
		        </li> 
		        <li class="treeview">
			        <a href="#">
			          <i class="fa fa-pie-chart"></i>
			           <span> Manage Cuisine/Dishes</span>
			          <i class="fa fa-angle-left pull-right"></i>
			        </a>

			        <ul class="treeview-menu"> 
			          <!-- <li>
			            <a href="{{url('addcategory')}}"><i class="fa fa-circle-o"></i><span>Manage Menu Category</span>
			            </a>
			          </li> -->
			          <li>
			            <a href="{{url('choose-category')}}"><i class="fa fa-circle-o"></i><span>Choose Menu Category</span>
			            </a>
			          </li>
			          <li>
			            <a href="{{url('addcuisine')}}"><i class="fa fa-circle-o"></i><span>Add Item</span>
			            </a>
			          </li>

			          <li>
			            <a href="{{url('allmenu')}}"><i class="fa fa-circle-o"></i><span>All Item</span>
			            </a>
			          </li> 
			        </ul>
		        </li>
		        <li class="treeview">
			        <a href="#">
			          <i class="fa fa-pie-chart"></i>
			           <span> Manage Orders</span>
			          <i class="fa fa-angle-left pull-right"></i>
			        </a>

			        <ul class="treeview-menu"> 
			          <li>
			            <a href="{{url('neworder')}}"><i class="fa fa-circle-o"></i><span>All New Orders</span>
			            </a>
			          </li>

			          <li>
			            <a href="{{url('allorder')}}"><i class="fa fa-circle-o"></i><span>All Order</span>
			            </a>
			          </li> 
			        </ul>
			    </li>
			    <li class="treeview">
			        <a href="#">
			          <i class="fa fa-pie-chart"></i>
			           <span>Settlements</span>
			          <i class="fa fa-angle-left pull-right"></i>
			        </a>

			        <ul class="treeview-menu"> 
			          <li>
			            <a href="{{url('outprofile')}}"><i class="fa fa-circle-o"></i><span>Outstanding balance</span>
			            </a>
			          </li> 

			          <li>
			            <a href="{{url('payment/show')}}"><i class="fa fa-circle-o"></i><span>Previous Payout</span>
			            </a>
			          </li> 
			        </ul>
			    </li>
		        <li>
		            <a href="{{url('setting')}}"><i class="fa fa-pie-chart"></i><span>Setting</span>
		            </a>
		        </li> 
		        <li>
		            <a href="{{url('profile')}}"><i class="fa fa-pie-chart"></i><span>Profiles<span>
		            </a>
		        </li>  
		    </ul>
	    </section>
    </aside>

    <!-- this part will show when usertype=1 or is_active == 3 in restaurant before approval--->
@elseif(Auth::user()->usertype == 1 && Auth::user()->is_active == 3) 
    <aside class="main-sidebar">
	    <section class="sidebar"><br>
		    <ul class="sidebar-menu"> 
		        <CENTER> 
		          <p style="color:white;"><b><span>Welcome &nbsp;{{ Auth::user()->name }} </span></b></p> 
                 </CENTER>
		        <li>
		        <li>
			        <a href="{{url('dashboard')}}">
			          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
			        </a>
		        </li> 
		        <li class="treeview">
			        <a href="#">
			          <i class="fa fa-pie-chart"></i>
			           <span> Manage Cuisine/Dishes</span>
			          <i class="fa fa-angle-left pull-right"></i>
			        </a>

			        <ul class="treeview-menu"> 
			          <li>
			            <a href="{{url('addcategory')}}"><i class="fa fa-circle-o"></i><span>Manage Menu Category</span>
			            </a>
			          </li>
			          <li>
			            <a href="{{url('choose-category')}}"><i class="fa fa-circle-o"></i><span>Choose Menu Category</span>
			            </a>
			          </li>
			          <li>
			            <a href="{{url('addcuisine')}}"><i class="fa fa-circle-o"></i><span>Add Item</span>
			            </a>
			          </li>

			          <li>
			            <a href="{{url('allmenu')}}"><i class="fa fa-circle-o"></i><span>All Item</span>
			            </a>
			          </li> 
			        </ul>
		        </li> 
		        <li>
		            <a href="{{url('setting')}}"><i class="fa fa-pie-chart"></i><span>Setting</span>
		            </a>
		        </li> 
		        <li>
		            <a href="{{url('profile')}}"><i class="fa fa-pie-chart"></i><span>Profiles<span>
		            </a>
		        </li>  
		    </ul>
	    </section>
    </aside>
       
 
@endif 
 
 