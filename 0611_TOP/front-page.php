<?php

// FV
$fv_slider = get_field('fv_slider');
$fv_heading = get_field('fv_heading');
$fv_heading_main = $fv_heading['fv_heading_en'];
$fv_heading_sub = $fv_heading['fv_heading_ja'];

// FV直下セクション
$section_1 = get_field('section_1');

// 事業一覧セクション
$business_array = get_field('business_sectionn');
$business_top = $business_array['top'][0];
$business_contents_array = $business_array['contents'];

// 下部リンクエリア
$bottom_links = get_field('top_bottom_');
$col2_1 = $bottom_links['2col'][0]['2col_item'];
$col2_2 = $bottom_links['2col'][1]['2col_item'];
$col1 = $bottom_links['1col_item'][0];

// 商品紹介セクション
$products = get_field('products');
$product_01 = $products['product_01'];
$product_02 = $products['product_02'];
$product_03 = $products['product_03'];

// ブログ クエリ
$blog_query = new WP_Query([
  'post_status' => 'publish',
  'post_type' => 'post',
  'posts_per_page' => 3,
]);

// 新着情報
$news = get_field('news');

// var_dump($bottom_links);
get_header();
?>
<main class="ly_main bl_topPage">
  <div class="bl_fv">
    <div class="bl_fv_left"></div>
    <!-- /.bl_fv_left -->
    <h2 class="bl_fv_heading js_hidden">
      <!-- <img src="<?= my_img(); ?>/pc_fv_heading.svg" alt=""> -->
      <p class="bl_fv_heading_main hp_ff_Europa">
        <span><?= $fv_heading_main['upper'] ?></span>
        <span><?= $fv_heading_main['lower'] ?></span>
      </p>
      <p class="bl_fv_heading_sub"><?= $fv_heading_sub ?></p>
    </h2>
    <!-- /.bl_fv_heading -->
    <div class="bl_fv_slider">
      <?php if (!empty($fv_slider)) :
        foreach ($fv_slider as $index => $fvimage) : ?>
          <img src="<?= $fvimage['fv_slide_img'] ?>" class="bl_fv_slider_img <?php
                                                                              if ($index === 0) {
                                                                                echo 'slide-add-animation';
                                                                              } ?>">
        <?php
          // スライダーが5以上ある場合止める
          if ($index === 4) {
            break;
          }
        endforeach;
      else : ?>
        <img src="noimage" class="bl_fv_slider_img slide-add-animation">
      <?php endif; ?>
    </div>
    <!-- /.bl_fv_slider -->
  </div>
  <!-- /.bl_fv -->
  <section class="bl_overviewSec bl_topPage_overview bl_1140Inner bl_innerPad">
    <h2 class="bl_overviewSec_head hp_scrollUp">
      <?php if ($section_1['heading_en']) : ?>
        <p class="bl_overviewSec_head_en hp_ff_Europa"><?= $section_1['heading_en'] ?></p>
      <?php endif; ?>
    </h2>
    <div class="bl_overviewSec_body">
      <?php if ($section_1['heading_ja']) : ?>
        <h3 class="bl_overviewSec_subTtl hp_scrollUp"><?= $section_1['heading_ja'] ?></h3>
      <?php endif; ?>
      <?php if (!empty($section_1['content'])) : ?>
        <p class="bl_overviewSec_desc hp_scrollUp">
          <?= gen_pc_wrap($section_1['content']) ?>
        </p>
      <?php endif; ?>
    </div>
    <div class="bl_topPage_overview_btn hp_scrollUp">
      <?php if ($section_1['btn_link']) : ?>
        <a href="<?= home_url($section_1['btn_link']) ?>/" class="el_lineBtn"><span>詳しく見る</span></a>
      <?php endif; ?>
    </div>
  </section>
  <!-- /.bl_overviewSec -->
  <?php if (!empty($business_top)) : ?>
    <section class="bl_topPage_businessSec">
      <!-- <div class="bl_topPage_businessSec_bg"></div> -->
      <div class="bl_1140Inner bl_innerPad">
        <div class="bl_topPage_businessSec_row1">
          <div class="bl_topPage_businessSec_row1_left">
            <h2 class="bl_heading bl_topPage_businessSec_row1_left_heading hp_scrollUp">
              <p class="bl_heading_en hp_clr_theme hp_ff_Europa"><?= $business_top['heading_en'] ?></p>
              <p class="bl_heading_ja"><?= $business_top['heading_ja'] ?></p>
            </h2>
            <p class="bl_topPage_businessSec_row1_left_txt hp_scrollUp"><?= $business_top['desc'] ?></p>
            <a href="<?= home_url($business_top['link']) ?>" class="el_lineLink bl_topPage_businessSec_row1_more hp_scrollUp">詳しくはこちら</a>
          </div>
          <!-- /.bl_topPage_businessSec_row1_left -->
          <div class="bl_topPage_businessSec_row1_right">
            <div class="bl_topPage_businessSec_row1_right_img bl_img_wrapper">
              <img src="<?= $business_top['img'] ?>" alt="" class="bl_img hp_hoverScale_img">
            </div>
          </div>
          <!-- /.bl_topPage_businessSec_row1_right -->
        </div>
        <!-- /.bl_topPage_businessSec_row1 -->
        <?php if (count($business_contents_array) >= 2) : ?>
          <div class="bl_topPage_businessSec_row2 bl_oblongCard_2colUnit">
            <?php
            foreach ($business_contents_array as $i => $business_contents) :
            ?>
              <a href="<?= $business_contents['item']['link'] ?>" class="bl_oblongCard hp_hoverScale_img_wrapper">
                <div class="bl_oblongCard_bg bl_img_wrapper">
                  <img src="<?= $business_contents['item']['img'] ?>" alt="" class="bl_img hp_hoverScale_img">
                </div>
                <div class="bl_oblongCard_cont hp_scrollUp">
                  <!--<p class="bl_oblongCard_cont_subTtl hp_ff_Europa"><?= $business_contents['item']['heading_en'] ?></p>-->
                  <p class="bl_oblongCard_cont_subTtl hp_ff_Europa">BUSINESS0<?= $i + 1 ?></p>
                  <p class="bl_oblongCard_cont_ttl"><?= $business_contents['item']['heading_ja'] ?></p>
                </div>
              </a>
            <?php
              if ($i === 1) {
                break;
              }
            endforeach;
            ?>
          </div>
          <!-- /.bl_topPage_businessSec_row2 -->
          <?php if (count($business_contents_array) >= 3) :
            $oblong_unit_class_name = '';
            if (count($business_contents_array) == 3) {
              $oblong_unit_class_name = 'bl_oblongCard_2colUnit';
            } else if (count($business_contents_array) == 4) {
              $oblong_unit_class_name = 'bl_oblongCard_2colUnit';
            } else {
              $oblong_unit_class_name = 'bl_oblongCard_3colUnit';
            }
          ?>
            <div class="bl_topPage_businessSec_row3 <?= $oblong_unit_class_name ?>">
              <?php foreach ($business_contents_array as $i => $business_contents) :
                if ($i > 1) :
              ?>
                  <a href="<?= $business_contents['item']['link'] ?>" class="bl_oblongCard hp_hoverScale_img_wrapper">
                    <div class="bl_oblongCard_bg bl_img_wrapper">
                      <img src="<?= $business_contents['item']['img'] ?>" alt="" class="bl_img hp_hoverScale_img">
                    </div>
                    <div class="bl_oblongCard_cont hp_scrollUp">
                      <!--<p class="bl_oblongCard_cont_subTtl hp_ff_Europa"><?= $business_contents['item']['heading_en'] ?></p>-->
                      <p class="bl_oblongCard_cont_subTtl hp_ff_Europa">BUSINESS0<?= $i + 1 ?></p>
                      <p class="bl_oblongCard_cont_ttl"><?= $business_contents['item']['heading_ja'] ?></p>
                    </div>
                  </a>
              <?php endif;
              endforeach; ?>
            </div>
            <!-- /.bl_topPage_businessSec_row3 -->
          <?php endif; ?>
        <?php endif; ?>
      </div>
    </section>
    <!-- /.bl_topPage_businessSec -->
  <?php endif; ?>
  
  <div class="bl_topPage_colormeProducts_bg">
    <div class="bl_topPage_colormeProducts bl_1140Inner bl_innerPad">
      <h2 class="bl_heading bl_topPage_businessSec_row1_left_heading hp_scrollUp">
        <p class="bl_heading_en hp_clr_theme hp_ff_Europa">PRODUCTS</p>
        <p class="bl_heading_ja">製品紹介</p>
      </h2>
      <ul class="product_flex">
        <?php if ($products) { ?>
          <?php
          if ($product_01) {
              // 画像フィールド 'product_img' の値を取得
              $product_img = $product_01['product_img'];
              $product_img_url = !empty($product_img) && !empty($product_img['url']) ? $product_img['url'] : get_template_directory_uri() . '/assets/images/noimage.png';

              // 商品名フィールド 'product_name' の値を取得
              $product_name = $product_01['product_name'];

              // 簡易説明フィールド 'product_explain' の値を取得
              $product_explain = $product_01['product_explain'];

              // 価格フィールド 'product_price' の値を取得
              $product_price = $product_01['product_price'];

              // 商品IDフィールド 'product_id' の値を取得
              $product_id = $product_01['product_id'];
              ?>

              <li class="product_flex_item">
                  <a class="bl_productsCard hp_hoverScale_img_wrapper" href="<?php echo esc_url(home_url("products/?colorme_item=$product_id")); ?>">
                      <!-- PC画像 -->
                      <div class="product_flex_item_img bl_productsCard_bg bl_img_wrapper">
                          <img class="bl_img hp_hoverScale_img" src="<?php echo esc_url($product_img_url); ?>" alt="<?php echo esc_attr($product_name); ?>" />
                      </div>
                      <!-- 商品名 -->
                      <p class="name"><?php echo esc_html($product_name); ?></p>
                      <!-- 簡易説明 -->
                      <p class="explain"><?php echo esc_html($product_explain); ?></p>
                      <!-- 価格 -->
                      <p class="price"><?php echo esc_html($product_price); ?>円<span class="tax">(税込)</span></p>
                  </a>
              </li>

          <?php
          }
          ?>

          <?php
          if ($product_02) {
              // 画像フィールド 'product_img' の値を取得
              $product_img = $product_02['product_img'];
              $product_img_url = !empty($product_img) && !empty($product_img['url']) ? $product_img['url'] : get_template_directory_uri() . '/assets/images/noimage.png';

              // 商品名フィールド 'product_name' の値を取得
              $product_name = $product_02['product_name'];

              // 簡易説明フィールド 'product_explain' の値を取得
              $product_explain = $product_02['product_explain'];

              // 価格フィールド 'product_price' の値を取得
              $product_price = $product_02['product_price'];

              // 商品IDフィールド 'product_id' の値を取得
              $product_id = $product_02['product_id'];
              ?>

              <li class="product_flex_item">
                  <a class="bl_productsCard hp_hoverScale_img_wrapper" href="<?php echo esc_url(home_url("products/?colorme_item=$product_id")); ?>">
                      <!-- PC画像 -->
                      <div class="product_flex_item_img bl_productsCard_bg bl_img_wrapper">
                          <img class="bl_img hp_hoverScale_img" src="<?php echo esc_url($product_img_url); ?>" alt="<?php echo esc_attr($product_name); ?>" />
                      </div>
                      <!-- 商品名 -->
                      <p class="name"><?php echo esc_html($product_name); ?></p>
                      <!-- 簡易説明 -->
                      <p class="explain"><?php echo esc_html($product_explain); ?></p>
                      <!-- 価格 -->
                      <p class="price"><?php echo esc_html($product_price); ?>円<span class="tax">(税込)</span></p>
                  </a>
              </li>

          <?php
          }
          ?>

          <?php
          if ($product_03) {
              // 画像フィールド 'product_img' の値を取得
              $product_img = $product_03['product_img'];
              $product_img_url = !empty($product_img) && !empty($product_img['url']) ? $product_img['url'] : get_template_directory_uri() . '/assets/images/noimage.png';

              // 商品名フィールド 'product_name' の値を取得
              $product_name = $product_03['product_name'];

              // 簡易説明フィールド 'product_explain' の値を取得
              $product_explain = $product_03['product_explain'];

              // 価格フィールド 'product_price' の値を取得
              $product_price = $product_03['product_price'];

              // 商品IDフィールド 'product_id' の値を取得
              $product_id = $product_03['product_id'];
              ?>

              <li class="product_flex_item">
                  <a class="bl_productsCard hp_hoverScale_img_wrapper" href="<?php echo esc_url(home_url("products/?colorme_item=$product_id")); ?>">
                      <!-- PC画像 -->
                      <div class="product_flex_item_img bl_productsCard_bg bl_img_wrapper">
                          <img class="bl_img hp_hoverScale_img" src="<?php echo esc_url($product_img_url); ?>" alt="<?php echo esc_attr($product_name); ?>" />
                      </div>
                      <!-- 商品名 -->
                      <p class="name"><?php echo esc_html($product_name); ?></p>
                      <!-- 簡易説明 -->
                      <p class="explain"><?php echo esc_html($product_explain); ?></p>
                      <!-- 価格 -->
                      <p class="price"><?php echo esc_html($product_price); ?>円<span class="tax">(税込)</span></p>
                  </a>
              </li>

          <?php
          }
          ?>
        <?php
        } else {
            echo 'No products found.';
        }
        ?>
      </ul>
      <div class="bl_topPage_blogSec_bottom">
        <a href="<?= home_url('products/?colorme_page=items') ?>" class="el_lineBtn el_lineBtn__rev hp_scrollUp"><span>もっと見る</span></a>
      </div>
    </div>
  </div>

  <?php if (!empty($col2_1) || !empty($col2_2) || !empty($col1)) : ?>
    <div class="bl_topPage_bottomLinks bl_1140Inner bl_innerPad">
      <?php if (!empty($col2_1) || !empty($col2_2)) :
        // 片方しかない場合フルサイズで出力
        $col2_modifier = '';
        if (empty($col2_1) || empty($col2_2)) {
          $col2_modifier = 'bl_companyLinksArea__col_1';
        }
      ?>
        <section class="bl_topPage_companyLinksArea bl_companyLinksArea <?= $col2_modifier ?>">
          <?php if (!empty($col2_1)) : ?>
            <a href="<?= home_url($col2_1['link']) ?>" class="bl_companyLinksArea_item hp_hoverScale_img_wrapper">
              <div class="bl_companyLinksArea_item_img bl_img_wrapper hp_ho">
                <img src="<?= $col2_1['img'] ?>" alt="" class="bl_img hp_hoverScale_img">
              </div>
              <div class="bl_companyLinksArea_item_cont hp_scrollUp">
                <p class="bl_companyLinksArea_item_subTtl hp_ff_Europa"><?= $col2_1['heading_en'] ?></p>
                <p class="bl_companyLinksArea_item_ttl"><?= $col2_1['heading_ja'] ?></p>
              </div>
              <p class="bl_companyLinksArea_item_more">詳しくはこちら</p>
            </a>
          <?php endif;
          if (!empty($col2_2)) : ?>
            <a href="<?= home_url($col2_2['link']) ?>" class="bl_companyLinksArea_item hp_hoverScale_img_wrapper">
              <div class="bl_companyLinksArea_item_img bl_img_wrapper">
                <img src="<?= $col2_2['img'] ?>" alt="" class="bl_img hp_hoverScale_img">
              </div>
              <div class="bl_companyLinksArea_item_cont hp_scrollUp">
                <p class="bl_companyLinksArea_item_subTtl hp_ff_Europa"><?= $col2_2['heading_en'] ?></p>
                <p class="bl_companyLinksArea_item_ttl"><?= $col2_2['heading_ja'] ?></p>
              </div>
            </a>
          <?php endif; ?>
        </section>
        <!-- /.bl_topPage_companyLinksArea -->
      <?php endif; ?>
      <?php if ($col1) : ?>
        <section class="bl_topPage_recruitSec">
          <a href="<?= $col1['link']; ?>" class="bl_topPage_recruitSec_card hp_hoverScale_img_wrapper">
            <div class="bl_topPage_recruitSec_card_img bl_img_wrapper">
              <img src="<?= $col1['1col_item_img'] ?>" alt="" class="bl_img hp_hoverScale_img">
            </div>
            <div class="bl_topPage_recruitSec_card_cont hp_scrollUp">
              <h2 class="bl_heading">
                <p class="bl_heading_en hp_ff_Europa hp_clr_fff"><?= $col1['heading_en'] ?></p>
                <p class="bl_heading_ja hp_clr_fff"><?= $col1['heading_ja'] ?></p>
              </h2>
              <p class="el_lineLink el_lineLink__white bl_topPage_recruitSec_card_more">詳しくはこちら</p>
            </div>
          </a>
        </section>
        <!-- /.bl_topPage_recruitSec -->
      <?php endif; ?>
    </div>
    <!-- ./bl_topPage_bottomLinks -->
  <?php endif; ?>
  <?php if ($blog_query->have_posts()) : ?>
    <section class="bl_topPage_blogSec bl_bg_lightThemeClr">
      <div class="bl_1140Inner bl_innerPad">
        <h2 class="bl_secTtl hp_scrollUp">
          <span class="bl_secTtl_en hp_clr_theme hp_ff_Europa">BLOG</span>
          <span class="bl_secTtl_ja">ブログ</span>
        </h2>
        <!-- /.bl_secTtl -->
        <div class="bl_blogCard_unit">
          <?php
          if ($blog_query->have_posts()) :
            $blog_count = 0;
            $blog_flex_class = 'bl_blogCard__flex';
            while ($blog_query->have_posts()) : $blog_query->the_post();
              $categories = get_the_category();
              // $category_link = get_category_link($categories[0]->term_id);
          ?>
              <a href="<?php the_permalink(); ?>" class="bl_blogCard hp_hoverScale_img_wrapper hp_scrollUp <?php if ($blog_count > 0) {
                                                                                                              echo $blog_flex_class;
                                                                                                            } ?>">
                <div class="bl_blogCard_img bl_img_wrapper">
                  <img src="<?= get_the_post_thumbnail_url() ?>" alt="" class="bl_img hp_hoverScale_img">
                </div>
                <div class="bl_blogCard_cont">
                  <h4 class="bl_blogCard_ttl"><?php the_title(); ?></h4>
                  <div class="bl_blogCard_info">
                    <div class="bl_blogCard_cate_unit">
                      <?php foreach ($categories as $category) : ?>
                        <span class="bl_blogCard_cate hp_flex_c"><?= $category->name ?></span>
                      <?php endforeach; ?>
                    </div>
                    <span class="bl_blogCard_date"><?= get_the_date('Y.m.d') ?></span>
                  </div>

                </div>
              </a>
              <!-- /.bl_blogCard -->
          <?php
              $blog_count++;
            endwhile;
          endif; ?>
        </div>
        <!-- /.bl_blogCard_unit -->
        <div class="bl_topPage_blogSec_bottom">
          <a href="<?= home_url('blog/') ?>" class="el_lineBtn el_lineBtn__rev hp_scrollUp"><span>もっと見る</span></a>
        </div>
      </div>
    </section>
    <!-- /.bl_topPage_blogSec -->
  <?php endif; ?>
  <?php if (!empty($news)) : ?>
    <section class="bl_topPage_newsSec">
      <div class="bl_1140Inner bl_innerPad">
        <h2 class="bl_secTtl hp_scrollUp">
          <span class="bl_secTtl_en hp_clr_theme hp_ff_Europa">NEWS</span>
          <span class="bl_secTtl_ja">新着情報</span>
        </h2>
        <!-- /.bl_secTtl -->
        <div class="bl_news_unit">
          <?php foreach ($news as $news_item) : ?>
            <div class="bl_news hp_scrollUp">
              <span class="bl_news_date hp_ff_Europa"><?= $news_item['date'] ?></span>
              <p class="bl_news_ttl "><?= $news_item['content'] ?></p>
            </div>
            <!-- /.bl_news -->
          <?php endforeach; ?>
        </div>
        <!-- /.bl_news_unit -->
      </div>
    </section>
    <!-- /.bl_topPage_newsSec -->
  <?php endif; ?>
</main>

<?php get_footer(); ?>