
<div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
          <div class="single_sidebar">
            <h2><span>Popular Post</span></h2>
            <ul class="spost_nav">
              <li>

              <?php

              $popularPost = R::getAll('SELECT * FROM `news` ORDER BY `views` DESC LIMIT ?', array(3));

              

              foreach ($popularPost as $key => $value2) {
                  ?>

              
                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="template/images/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title" style="font-size: 1.1em"><? echo $value2["title"];?></a>
                    <div style="background-color:#E7E7E7" style="margin-left:10px;">
                    <span><?php echo mb_substr(strip_tags($value2["text"]), 0, 60, 'utf-8') . '...'; ?></span>
                    </div>
                  </div>
                </div>
              

                  <?php

                }
              ?>
              </li>

              <!-- <li>

                

                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="template/images/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                </div>
              </li> -->
              
            </ul>
          </div>