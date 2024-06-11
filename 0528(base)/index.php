<?php
get_header();
// カテゴリを全て取得
$all_category = get_categories();


// $args = [
//   'mv_bg_img' => 'mv_blog.jpg',
//   'mv_ttl_img' => 'mv_blog_ttl.svg'
// ];
$page_id = 101;
$mv = get_field('page_mv', $page_id);
$args = [
  'mv_bg_img' => $mv['img'],
  'sp_mv_bg_img' => $mv['sp_img'],
  'mv_ttl_en' => $mv['heading_en'],
  'mv_ttl_en_2' => $mv['heading_en_2'],
  'mv_ttl_ja' => $mv['heading_ja']
]
?>
<?php get_template_part('templates/page_mv', null, $args) ?>
<main class="ly_main bl_blogPage">
  <div class="bl_blogPage_bg">
    <h2 class="bl_blogPage_head hp_scrollUp">
      <p class="bl_blogPage_head_ja">ブログ</p>
      <p class="bl_blogPage_head_en hp_ff_Europa hp_clr_theme">BLOG</p>
    </h2>
    <!-- /.bl_blogPage_head -->
    <div class="bl_blogPage_body bl_blogList bl_1140Inner bl_innerPad hp_scrollUp">
      <div class="bl_blogList_head">
        <div class="bl_blogCatenav">
          <button class="bl_blogCatenav_btn bl_acoHead">CATEGORY</button>
          <ul class="bl_blogCatenav_list bl_acoBody">
            <?php foreach ($all_category as $category) : ?>
              <a href="<?= home_url('blog/category/' . $category->slug) ?>" class="bl_blogCatenav_item"><?= $category->name ?></a>
            <?php endforeach; ?>
          </ul>
          <!-- <p class="bl_blogCatenav_current">ALL</p> -->
        </div>
      </div>
      <div class="bl_blogList_cont bl_blogCard_unit">

        <?php
        if (have_posts()) :
          while (have_posts()) : the_post();
            $categories = get_the_category();
            // $category_link = get_category_link($categories[0]->term_id);
        ?>
            <a href="<?php the_permalink() ?>" class="bl_blogCard hp_hoverScale_img_wrapper hp_hoverScale_img_wrapper">
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
        <?php endwhile;
        endif; ?>

      </div>
    </div>
    <!-- /.bl_blogPage_body -->
    <div class="bl_blogPage_pagination bl_pagination">
      <?php the_posts_pagination(
        array(
          'mid_size'      => 2, // 現在ページの左右に表示するページ番号の数
          'prev_next'     => true, // 「前へ」「次へ」のリンクを表示する場合はtrue
          'prev_text'     => __('‹'), // 「前へ」リンクのテキスト
          'next_text'     => __('›'), // 「次へ」リンクのテキスト
          'type'          => 'list', // 戻り値の指定 (plain/list)
        )
      ); ?>
    </div>
  </div>
  <!-- /.bl_blogPage -->
  <?php
  // $page_id = get_the_ID();
  // var_dump($page_id);
  $page_bottom_arg = ['page_id' => $page_id];
  get_template_part('templates/page_bottom', null, $page_bottom_arg); ?>
</main>
<?php get_footer(); ?>