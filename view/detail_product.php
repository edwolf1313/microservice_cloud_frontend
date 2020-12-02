<section id="container">
			<div class="wrap-container">
				<article class="single-post zerogrid">
					<div class="row wrap-post"><!--Start Box-->
						<div class="entry-header">
							<span class="time"><?= date("Y-m-d H:i:s",strtotime($product_data->date))?></span>
							<h1 class="entry-title"><?= $product_data->name;?></h1>
							<span class="cat-links"><a href="#">PRODUCT</a>, <a href="#">LIFESTYLE</a></span>
						</div>
						<div class="post-thumbnail-wrap">
							<img src="<?=$product_url.$product_data->product_picture;?>">
						</div>
						<div class="entry-content">
							<div class="excerpt">
              <p><?=$product_data->description;?></p>
						</div>
						<div class="entry-content">
							<p>Product Stock : <?=$product_data->stock;?></p>
						</div>
						<form class="" action="<?= $web_url;?>/index/add_to_cart" method="post">
						<div class="row" style="text-align:end">
						<div class="col-3-6">
							<div class="input-group">
									<input type="hidden" id="product_id" name="product_id" value="<?=$product_data->id;?>">
									<input type="button" value="-" class="button-minus" data-field="quantity">
									<input type="number" step="1" max="" value="1" name="quantity" class="quantity-field">
									<input type="button" value="+" class="button-plus" data-field="quantity">
									</div>
						</div>
						<div class="col-1-3">
								<input class="sendButton" type="submit" name="Submit" value="Add to Cart">
						</div>
							</div>
						</form>
						</div>
					</div>
				</article>
			</div>
		</section>
