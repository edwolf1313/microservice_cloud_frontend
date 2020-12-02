<section id="container">
  <div class="wrap-container">
    <div id="main-content">
      <div class="wrap-content">
        <div class="zerogrid">
          <div class="row products">
            <?php foreach ($product_data as &$product) { ?>
              <div class="col-1-3">
                <div class="wrap-col list-product">
                  <a class="portfolio-box zoom-effect" href="<?=$web_url;?>/index/product_page?id=<?=$product->id;?>">
                    <img src="<?=$product_url.$product->product_picture;?>" class="img-responsive" alt="">
                    <div class="portfolio-box-caption">
                      <div class="portfolio-box-caption-content">
                        <div class="project-name">
                          <span><?=$product->price; ?></span>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
