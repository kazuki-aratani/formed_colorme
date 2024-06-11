<?php get_header(); ?>

<div class="bl_mv">
  <div class="bl_mv_left"></div>
  <h1 class="bl_mv_heading js_hidden">
    <p class="bl_mv_heading_main hp_ff_Europa"><span class="hp_d_ib">PRODUCTS</span></p>
    <p class="bl_mv_heading_sub">製品紹介</p>
  </h1>
  <div class="bl_mv_img hp_sp_none">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/products_pc.jpg" alt="" class="zoom">
  </div>
  <div class="bl_mv_img hp_pc_none">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/products_sp.jpg" alt="" class="zoom">
  </div>
</div>
<!-- /.bl_mv -->
<div class="bl_breadcrumbs">
	<div class="bl_breadcrumbs_cont">
		<a href="<?= home_url('/') ?>">トップ</a>
		<span>-</span>
		<a href="https://ai135bzrpi.smartrelease.jp/formed/products/?colorme_page=items">製品紹介</a>
    <?php
    // 取得できるカテゴリー情報
    // @see https://shop-pro.jp/?mode=api_interface#get-v1categoriesjson
    $response = $this->container['swagger.api.category']->getProductCategories();
    $url = $this->container['url_builder'];
    
    // 現在のURLを取得
    $currentUrl = $_SERVER['REQUEST_URI'];
    // URLからカテゴリーIDを取得（例：?category_id_big=123）
    parse_str(parse_url($currentUrl, PHP_URL_QUERY), $queryParams);
    $currentCategoryId = isset($queryParams['category_id_big']) ? $queryParams['category_id_big'] : null;
    ?>
    
    <?php if ($response && $currentCategoryId) : ?>
      <?php 
      foreach ($response['categories'] as $c) :
        if ('showing' !== $c['display_state'] || $c['id_big'] != $currentCategoryId) :
          continue;
        endif;
        // 現在のURLに一致するカテゴリーを表示
      ?>
      <!-- カテゴリー名 -->
      <span>-</span>
      <a href="<?php echo $url->items([
          'category_id_big' => $c['id_big'],
      ]) ?>" target="_top"><?php echo $c['name'] ?></a>
      <?php 
        break; // 一致するカテゴリーを表示した後、ループを終了
      endforeach; 
      ?>
    <?php endif; ?>
	</div>
</div>
<!-- /.bl_breadcrumbs -->




<?php
// @see https://shop-pro.jp/?mode=api_interface#get-v1productsjson
// 表示件数
$params = [
	'limit' => 2,
];
if ( 0 === (int) get_query_var( 'page_no' ) ) {
	$params['offset'] = 0;
} else {
	$params['offset'] = $params['limit'] * ( (int) get_query_var( 'page_no' ) - 1);
}
foreach ( [ 'category_id_big', 'category_id_small' ] as $k ) {
	$v = get_query_var( $k );
	if ( $v ) {
		$params[ $k ] = $v;
	}
}

$paginator = $this->container['api.product_api']->paginate( $params );
$url = $this->container['url_builder'];

?>
<div class="bl_colorme_page">

  <div class="bl_h2">
    <h2>製品紹介</h2>
    <p class="h2_en">PRODUCTS</p>
  </div>

  <div class="inner_flex">

    <div class="sidebar">
      <div class="hp_sp_none">
        <?php
        $current_category_id = $_GET['category_id_big'] ?? '';

        $response = $this->container['swagger.api.category']->getProductCategories();
        $url = $this->container['url_builder'];
        ?>

        <h2>CATEGORY</h2>

        <ul class="products_list">
            <li <?= (!$current_category_id) ? 'class="active"' : '' ?>>
                <a href="<?= home_url('/products/?colorme_page=items') ?>" target="_top">全ての製品</a>
            </li>

            <?php
            $categoryFound = false;

            if ($response) :
                foreach ($response['categories'] as $c) :
                    if ('showing' !== $c['display_state']) :
                        continue;
                    endif;
                    if ($c['id_big'] == $current_category_id) {
                        $categoryFound = true;
                    }
                    ?>
                    <li <?= ($c['id_big'] == $current_category_id) ? 'class="active"' : '' ?>>
                        <a href="<?= $url->items([
                            'category_id_big' => $c['id_big'],
                        ]) ?>" target="_top">
                            <?= $c['name'] ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            <?php else : ?>
                <p>商品カテゴリーが登録されていません。</p>
            <?php endif; ?>
        </ul>

        <script>
            // カテゴリが一致しない場合は一番上のliにactiveを付ける
            document.addEventListener('DOMContentLoaded', function () {
                if (!<?= json_encode($categoryFound) ?>) {
                    document.querySelector('.products_list li').classList.add('active');
                }
            });
        </script>
      </div>

      <div class="hp_pc_none">
        <div class="bl_blogList_head">
          <div class="bl_blogCatenav">
            <?php
            $current_category_id = $_GET['category_id_big'] ?? '';

            $response = $this->container['swagger.api.category']->getProductCategories();
            $url = $this->container['url_builder'];

            $categoryFound = false;
            $currentCategoryName = '全ての製品';

            if ($response) {
                foreach ($response['categories'] as $c) {
                    if ('showing' !== $c['display_state']) {
                        continue;
                    }
                    if ($c['id_big'] == $current_category_id) {
                        $categoryFound = true;
                        $currentCategoryName = $c['name'];
                        break;
                    }
                }
            }
            ?>

            <button class="bl_blogCatenav_btn bl_acoHead"><?= $currentCategoryName; ?></button>
            <ul class="bl_blogCatenav_list bl_acoBody">
                <li class="<?= (!$current_category_id) ? 'active' : '' ?>">
                    <a href="<?= home_url('/products/?colorme_page=items') ?>" class="bl_blogCatenav_item">全ての製品</a>
                </li>

                <?php if ($response) : ?>
                    <?php foreach ($response['categories'] as $c) :
                        if ('showing' !== $c['display_state']) :
                            continue;
                        endif;
                        ?>
                        <li class="<?= ($c['id_big'] == $current_category_id) ? 'active' : '' ?>">
                            <a href="<?= $url->items(['category_id_big' => $c['id_big']]) ?>" class="bl_blogCatenav_item">
                                <?= $c['name'] ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                <?php else : ?>
                    <li>
                        <a href="#" class="bl_blogCatenav_item">商品カテゴリーが登録されていません。</a>
                    </li>
                <?php endif; ?>
            </ul>
          </div>
          <script>
              document.addEventListener('DOMContentLoaded', function() {
                  if (!<?= json_encode($categoryFound) ?>) {
                      document.querySelector('.bl_blogCatenav_list li').classList.add('active');
                  }
              });
          </script>
        </div>
      </div>
    </div>

    <div class="main_column">
      <?php if ( $paginator->data() ) : ?>
        <p class="product_num">全 <?php echo number_format( $paginator->total() ) ?> 件</p>
        <ul class="product_grid">
          <?php foreach ( $paginator->data() as $p ) : ?>
            <li class="product_grid_item">
              <a href="<?php echo $url->item( $p['id'] ) ?>">
                <!-- PC画像 -->
                  <img src="<?php echo $p['image_url'] ?>" />

                <!-- 商品名 -->
                <p class="name"><?php echo $p['name'] ?></p>
                  
                <!-- 簡易説明 -->
                <?php if ( $p['simple_expl'] ) : ?>
                  <p class="explain"><?php echo nl2br( $p['simple_expl'] ) ?></p>
                <?php endif; ?>
                <?php if ( $this->container['is_mobile'] && $p['smartphone_expl'] ) : ?>
                  <!-- モバイル用 説明 -->
                  <p class="explain"><?php echo nl2br( $p['smartphone_expl'] ) ?></p>
                  <?php elseif ( $p['expl'] ) : ?>
                  <!-- PC用 説明 -->
                  <p class="explain"><?php echo nl2br( $p['expl'] ) ?></p>
                <?php endif; ?>
                  
                <p class="price"><?php echo number_format( $p['sales_price'] ) ?>円<span class="tax">(税込)</span></p>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
    
      
      <?php else : ?>
        該当する商品がありません。
      <?php endif; ?>
    </div>
  </div>
  <!-- ページャ -->
  <?php echo $paginator->links() ?>

  <div class="bl_pageBottomUnit">
      <section class="bl_defaultPage_businessLinkArea bl_companyLinksArea bl_companyLinksArea__col_1 bl_1140Inner">
        <a href="<?= home_url('/business-list') ?>" class="hp_hoverScale_img_wrapper bl_companyLinksArea_item">
          <div class="bl_companyLinksArea_item_img bl_img_wrapper">
            <img src="https://ai135bzrpi.smartrelease.jp/formed/wp-content/uploads/2023/04/business.jpeg" alt="" class="bl_img hp_hoverScale_img">
          </div>
          <div class="bl_companyLinksArea_item_cont hp_scrollUp">
            <p class="bl_companyLinksArea_item_subTtl hp_ff_Europa">OUR BUSINESS</p>
            <p class="bl_companyLinksArea_item_ttl">事業一覧</p>
          </div>
          <p class="bl_companyLinksArea_item_more">詳しくはこちら</p>
        </a>
      </section>
      <!-- /.bl_businessLinkArea -->
      <section class="bl_defaultPage_companyLinksArea bl_companyLinksArea bl_1140Inner">
        <a href="<?= home_url('/about#company') ?>" class="bl_companyLinksArea_item hp_hoverScale_img_wrapper">
          <div class="bl_companyLinksArea_item_img bl_img_wrapper">
            <img src="https://ai135bzrpi.smartrelease.jp/formed/wp-content/uploads/2023/04/company.jpeg" alt="" class="bl_img hp_hoverScale_img">
          </div>
          <div class="bl_companyLinksArea_item_cont hp_scrollUp">
            <p class="bl_companyLinksArea_item_subTtl hp_ff_Europa">COMPANY</p>
            <p class="bl_companyLinksArea_item_ttl">会社概要</p>
          </div>
          <p class="bl_companyLinksArea_item_more">詳しくはこちら</p>
        </a>
        <a href="<?= home_url('/about#message') ?>" class="bl_companyLinksArea_item hp_hoverScale_img_wrapper">
          <div class="bl_companyLinksArea_item_img bl_img_wrapper">
            <img src="https://ai135bzrpi.smartrelease.jp/formed/wp-content/uploads/2023/04/about-message-btm-img.jpg" alt="" class="bl_img hp_hoverScale_img">
          </div>
          <div class="bl_companyLinksArea_item_cont hp_scrollUp">
            <p class="bl_companyLinksArea_item_subTtl hp_ff_Europa">MESSAGE</p>
            <p class="bl_companyLinksArea_item_ttl">代表メッセージ</p>
          </div>
        </a>
      </section>
      <!-- /.bl_defaultPage_companyLinksArea -->
  </div>
</div>


<script>
    // JavaScriptを使用して前後のページナビゲーションのテキストを消す
    document.querySelector('.prev').textContent = ''; // テキストを空にする
    document.querySelector('.next').textContent = ''; // テキストを空にする
</script>
<?php get_footer(); ?>