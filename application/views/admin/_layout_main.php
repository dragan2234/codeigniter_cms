<?php $this->load->view('admin/components/page_head'); ?>
<body>
<body>
<nav class="navbar navbar-default navbar-static-top ">
  <div class="container">
  <div class="navbar-header">
    <a class="navbar-brand" href="<?php echo site_url('admin/dashboard'); ?>"><?php echo $meta_title; ?></a>
		    <ul class="nav navbar-nav">
			    <li class="active"><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
			    <li><?php echo anchor('admin/page', 'pages'); ?></li>
			    <li><?php echo anchor('admin/page/order', 'order pages'); ?></li>
			    <li><?php echo anchor('admin/article', 'news articles'); ?></li>
			    <li><?php echo anchor('admin/user', 'users'); ?></li>
		    </ul>
  </div>
  </div>
</nav>

	<div class="container">
		<div class="row">
			<!-- Main column -->
			<div class="col-lg-9">
						<section>
					<?php $this->load->view($subview); ?>
						</section>
			</div>
			<!-- Sidebar -->
			<div class="col-lg-3">
				<section>
					<?php echo mailto('draganpilipovic1997bp@gmail.com', '<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> draganpilipovic1997bp@gmail.com'); ?><br>
					<?php echo anchor('admin/user/logout', '<span class="glyphicon glyphicon-off" aria-hidden="true"></span></i> logout'); ?>
				</section>
			</div>
		</div>
	</div>

<?php $this->load->view('admin/components/page_tail'); ?>