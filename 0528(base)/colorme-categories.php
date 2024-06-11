<link rel="stylesheet" href="https://use.typekit.net/wqb2jvo.css">
<style>
  h2 {
    font-family: poppins, sans-serif;
    font-size: 22px;
    font-weight: 600;
    color: #00A2E0;
    border-bottom: 2px solid #00A2E0;
    padding-bottom: 30px;
    letter-spacing: 0.1em;
    margin-bottom: initial;
  }
  .products_list {
    padding: initial;
    margin: initial;
  }
  .products_list li {
    font-size: 15px;
    border-bottom: 1px solid #ddd;
    color: #000;
    position: relative;
    list-style: none;
  }
  .products_list li:before {
    content: "";
    display: block;
    position: absolute;
    top: 35px;
    right: 0;
    width: 8px;
    height: 8px;
    border-top: 1px solid #000;
    border-right: 1px solid #000;
    transform: translateX(-50%) rotate(45deg);
  }
  .products_list li.active:before {
    border-top: 1px solid #00A2E0;
    border-right: 1px solid #00A2E0;
  }
  .products_list li:hover:before {
    border-top: 1px solid #00A2E0;
    border-right: 1px solid #00A2E0;
  }
  .products_list li a {
    color: #000;
    text-decoration: none;
    display: inline-block;
    width: 100%;
    padding: 30px 0;
  }
  .products_list li.active a {
    color: #00A2E0;
  }
  .products_list li:hover a {
    color: #00A2E0;
  }
</style>

  <?php
  $current_category_id = $_GET['category_id_big'] ?? ''; // 現在の URL からカテゴリー ID を取得
  
  $response = $this->container['swagger.api.category']->getProductCategories();
  $url = $this->container['url_builder'];
  ?>
  
  <h2>CATEGORY</h2>
  
  <ul class="products_list">
    <?php
      $current_category_id = $_GET['category_id_big'] ?? ''; // 現在の URL からカテゴリー ID を取得
  
      // 親ページのカテゴリーIDを取得
      $parentCategoryId = '';
      try {
          $parentUrl = $_SERVER['HTTP_REFERER'];
          $urlParts = parse_url($parentUrl);
          if (isset($urlParts['query'])) {
              parse_str($urlParts['query'], $query);
              $parentCategoryId = $query['category_id_big'] ?? '';
          }
      } catch (Exception $e) {
          error_log("Failed to get parent category ID: " . $e->getMessage());
      }
  
      $response = $this->container['swagger.api.category']->getProductCategories();
      $url = $this->container['url_builder'];
  
      // フラグを設定
      $categoryFound = false;
    ?>
  
    <li <?php echo (!$parentCategoryId) ? 'class="active"' : '' ?>>
      <a href="<?= home_url('/products/?colorme_page=items') ?>" target="_top">全ての製品</a>
    </li>
  
    <?php if ($response) : ?>
      <?php foreach ($response['categories'] as $c) :
        if ('showing' !== $c['display_state']) :
          continue;
        endif;
        if ($c['id_big'] == $parentCategoryId) {
          $categoryFound = true;
        }
        ?>
        <!-- カテゴリー名 -->
        <li <?php echo ($c['id_big'] == $parentCategoryId) ? 'class="active"' : '' ?>>
          <a href="<?php echo $url->items([
              'category_id_big' => $c['id_big'],
          ]) ?>" target="_top">
            <?php echo $c['name'] ?>
          </a>
        </li>
      <?php endforeach; ?>
    <?php else : ?>
      <p>商品カテゴリーが登録されていません。</p>
    <?php endif; ?>
  
    <!-- カテゴリが一致しない場合は一番上のliにactiveを付ける -->
    <script>
      if (!<?php echo json_encode($categoryFound); ?>) {
        document.querySelector('.products_list li').classList.add('active');
      }
    </script>
  </ul>
