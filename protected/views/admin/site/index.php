<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
$this->breadcrumbs=array(
    'Dashboard'
);
?>

<div class="row-fluid">
	<div class="span12 center" style="text-align: center;">
		<ul class="stat-boxes">
			<li class="popover-visits">
				<div class="left peity_bar_good">
					<span>2,4,9,7,12,10,12</span>+10%
				</div>
				<div class="right">
					<strong>36094</strong> Visits
				</div>
			</li>
			<li class="popover-users">
				<div class="left peity_bar_neutral">
					<span>20,15,18,14,10,9,9,9</span>0%
				</div>
				<div class="right">
					<strong>1433</strong> Users
				</div>
			</li>
			<li class="popover-orders">
				<div class="left peity_bar_bad">
					<span>3,5,9,7,12,20,10</span>-50%
				</div>
				<div class="right">
					<strong>8650</strong> Orders
				</div>
			</li>
			<li class="popover-tickets">
				<div class="left peity_line_good">
					<span>12,6,9,23,14,10,17</span>+70%
				</div>
				<div class="right">
					<strong>2968</strong> Tickets
				</div>
			</li>
		</ul>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		<div class="alert alert-info">
			Welcome in the <strong>Unicorn Admin Theme</strong>. Don't forget to check all the pages! <a href="#" data-dismiss="alert" class="close">×</a>
		</div>
		<div class="widget-box">
			<div class="widget-title">
				<span class="icon"><i class="icon-signal"></i></span>
				<h5>Site Statistics</h5>
				<div class="buttons">
					<a href="#" class="btn btn-mini"><i class="icon-refresh"></i> Update stats</a>
				</div>
			</div>
			<div class="widget-content">
				<div class="row-fluid">
					<div class="span4">
						<ul class="site-stats">
							<li>
								<i class="icon-user"></i><strong>1433</strong><small>Total Users</small>
							</li>
							<li>
								<i class="icon-arrow-right"></i><strong>16</strong><small>New Users (last week)</small>
							</li>
							<li class="divider"></li>
							<li>
								<i class="icon-shopping-cart"></i><strong>259</strong><small>Total Shop Items</small>
							</li>
							<li>
								<i class="icon-tag"></i><strong>8650</strong><small>Total Orders</small>
							</li>
							<li>
								<i class="icon-repeat"></i><strong>29</strong><small>Pending Orders</small>
							</li>
						</ul>
					</div>
					<div class="span8">
						<div class="chart"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row-fluid">
	<div class="span6">
		<div class="widget-box">
			<div class="widget-title">
				<span class="icon"><i class="icon-file"></i></span>
				<h5>Recent Posts</h5>
				<span title="54 total posts" class="label label-info tip-left">54</span>
			</div>
			<div class="widget-content nopadding">
				<ul class="recent-posts">
					<li>
						<div class="user-thumb">
							<img width="40" height="40" alt="User" src="<?php echo Yii::app()->baseUrl; ?>/images/demo/av2.jpg">
						</div>
						<div class="article-post">
							<span class="user-info"> By: neytiri on 2 Aug 2012, 09:27 AM, IP: 186.56.45.7 </span>
							<p>
								<a href="#">Vivamus sed auctor nibh congue, ligula vitae tempus pharetra...</a>
							</p>
							<a href="#" class="btn btn-primary btn-mini">Edit</a><a href="#" class="btn btn-success btn-mini">Publish</a><a href="#" class="btn btn-danger btn-mini">Delete</a>
						</div>
					</li>
					<li>
						<div class="user-thumb">
							<img width="40" height="40" alt="User" src="<?php echo Yii::app()->baseUrl; ?>/images/demo/av3.jpg">
						</div>
						<div class="article-post">
							<span class="user-info"> By: john on on 24 Jun 2012, 04:12 PM, IP: 192.168.24.3 </span>
							<p>
								<a href="#">Vivamus sed auctor nibh congue, ligula vitae tempus pharetra...</a>
							</p>
							<a href="#" class="btn btn-primary btn-mini">Edit</a><a href="#" class="btn btn-success btn-mini">Publish</a><a href="#" class="btn btn-danger btn-mini">Delete</a>
						</div>
					</li>
					<li>
						<div class="user-thumb">
							<img width="40" height="40" alt="User" src="<?php echo Yii::app()->baseUrl; ?>/images/demo/av1.jpg">
						</div>
						<div class="article-post">
							<span class="user-info"> By: michelle on 22 Jun 2012, 02:44 PM, IP: 172.10.56.3 </span>
							<p>
								<a href="#">Vivamus sed auctor nibh congue, ligula vitae tempus pharetra...</a>
							</p>
							<a href="#" class="btn btn-primary btn-mini">Edit</a><a href="#" class="btn btn-success btn-mini">Publish</a><a href="#" class="btn btn-danger btn-mini">Delete</a>
						</div>
					</li>
					<li class="viewall">
						<a title="View all posts" class="tip-top" href="#"> + View all + </a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>