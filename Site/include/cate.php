<div class="col-xl-3 col-lg-4 col-md-5">
	<div class="sidebar-categories">
		<div class="head">Sản phẩm</div>
		<ul class="main-categories">

			<?php
			$thumuc = new categories();
			$danhsachthumuc = $thumuc->getlist();
			foreach ($danhsachthumuc as $danhmuc) :
				extract($danhmuc);
			?>
				<li class="main-nav-list"><a href="./index.php?pages=site&action=home&layout=category&id=<?php echo $danhmuc['id'] ?>" aria-expanded="false" aria-controls="meatFish"><span class="lnr lnr-arrow-right"></span><?php echo $danhmuc['name'] ?><span class="number">(<?php
																																																																					$count = $thumuc->countcate($danhmuc['id']);
																																																																					echo $count['countcate'];
																																																																					?>)</span></a>

				</li>
			<?php endforeach; ?>

		</ul>
	</div>
	
</div>