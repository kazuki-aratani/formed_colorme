<div class="bl_breadcrumbs product">
	<div class="bl_breadcrumbs_cont">
		<a href="<?= home_url('/') ?>">トップ</a>
		<span>-</span>
		<a href="https://ai135bzrpi.smartrelease.jp/formed/products/?colorme_page=items">製品紹介</a>
    <span>-</span>
		<span><?php echo $product['name']; ?></span>
	</div>
</div>
<!-- /.bl_breadcrumbs -->

<div class="bl_colorme_page">
	<main class="product_wrp">
		<div class="inner_flex">
			<div class="left">
				<!-- メイン画像 -->
				<img id="main_image" class="main_image" src="<?php echo $product['image_url']; ?>">
				<div class="switch_image">
          <img class="hover_image" src="<?php echo $product['image_url']; ?>" />
					<!-- その他の画像 -->
					<?php if (!empty($product['images'])) : ?>
							<?php foreach ($product['images'] as $i) : ?>
                <!-- PC用 -->
                <img class="hover_image" src="<?php echo $i['src']; ?>" />
							<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="right">
				<h2 class="name_detail"><?php echo $product['name']; ?></h2>
				<p class="simple_text_detail">
					<?php echo $product['simple_expl']; ?>
				</p>
				<div class="price_detail">
					<p class="main_price"><?php echo $product['sales_price']; ?>円<span>(税込)</span></p>
					<div class="price_detail_other">
						<?php if (!empty($product['price'])) : ?>
							<p>定価: <?php echo number_format( $product['price'] ) ?>円</p>
						<?php endif; ?>
						<?php if (!empty($product['members_price'])) : ?>
							<p>会員向け価格: <?php echo number_format( $product['members_price'] ) ?>円</p>
						<?php endif; ?>
						<?php if (!empty($product['cost'])) : ?>
							<p>原価: <?php echo number_format( $product['cost'] ) ?>円</p>
						<?php endif; ?>
					</div>
				</div>
				<div class="cart_detail"><?php echo do_shortcode('[colormeshop_cart_button product_id=' . $product['id'] . ']'); ?></div>
        <a href="" class="law_link">>特定商取引法に基づく表記</a>
				<div class="explanation">
					<div class="explanation_ttl">製品説明</div>
					<div class="text_explanation">
							<?php echo $product['expl']; ?>
					</div>
				</div>
				<div class="detail">
					<div class="detail_ttl">製品詳細</div>
					<div class="text_detail">
            <table>
              <tbody>
                <tr>
                  <th>製品ID</th>
                  <td><?php echo $product['id']; ?></td>
                </tr>
                <tr>
                  <th>型番</th>
                  <td><?php echo $product['model_number']; ?></td>
                </tr>
                <tr>
                  <th>重量</th>
                  <td><?php echo $product['weight']; ?></td>
                </tr>
                <tr>
                  <th>単位</th>
                  <td><?php echo $product['unit']; ?></td>
                </tr>
              </tbody>
            </table>
					</div>
				</div>
			</div>
		</div>
	</main>
</div>
<script>
$(document).ready(function() {
    $('.hover_image').hover(
        function() {
            // すべての.hover_imageからactiveクラスを削除
            $('.hover_image').removeClass('active');
            
            // 現在ホバーしている画像にactiveクラスを追加
            $(this).addClass('active');
            
            // メイン画像のsrcを新しいsrcに変更
            var newSrc = $(this).attr('src');
            $('#main_image').attr('src', newSrc);
        },
        function() {
            // ホバーが外れたときの処理（必要に応じて追加）
        }
    );
});

</script>
<script>
$(document).ready(function() {
    $(".detail_ttl").click(function() {
        $(this).next(".text_detail").slideToggle();
        $(this).toggleClass('open');
    });

    $(".explanation_ttl").click(function() {
        $(this).next(".text_explanation").slideToggle();
        $(this).toggleClass('open');
    });
});

</script>
