<?php include ROOT.'/views/db/db_connect.php'; ?>
<div class="col-lg-4 col-md-4 col-sm-4">
        <div class="latest_post">
          <h2><span>Latest post</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
              <li>
                
                <?php
                $colNews = R::count('news', 'id >= ?', array(0)); 

                //echo $colNews;

                

                for ($i = 1; $i < $colNews + 1; $i++) {
                $arr[$i - 1] = $i;
                $itogArr = $arr[$i - 1].',';
              

                //$raz = array($finde);
                $news = R::loadAll('news', array($itogArr));

                foreach ($news as $key => $value) {
                  ?>

                  <div class="media"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="template/images/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title" style="font-size: 1.1em"><? echo $value->title?></a>
                    <div style="background-color:#E7E7E7" style="margin-left:10px;">
                    <span><?php echo mb_substr(strip_tags($value->text), 0, 60, 'utf-8') . '...'; ?></span>
                    </div>
                  </div>


                  <?
                  
                }
                }

                ?>



              </li>
              <!-- <li>
                <div class="media"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="template/images/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                </div>
              </li>
              <li>
                <div class="media"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="template/images/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                </div>
              </li>
              <li>
                <div class="media"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="template/images/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                </div>
              </li>
              <li>
                <div class="media"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="template/images/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                </div>
              </li> -->
            </ul>
            <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
          </div>
        </div>
      </div>
    </div>