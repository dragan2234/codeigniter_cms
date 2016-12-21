		<!-- Main content -->
 		<div class="col-lg-9">
<?php if($pagination): ?>
			<section class="pagination"><?php echo $pagination; ?></section>
<?php endif; ?>
 			<div class="row">
<?php if (count($articles)): foreach ($articles as $article): ?>
 				<article class="col-lg-9"><?php echo get_excerpt($article); ?><hr></article>
<?php endforeach; endif; ?>
 			</div>
 		</div>
 		
 		<!-- Sidebar -->
 		<div class="col-lg-3 sidebar">
 			<h2>Recent news</h2>
<?php $this->load->view('sidebar'); ?>
</div>