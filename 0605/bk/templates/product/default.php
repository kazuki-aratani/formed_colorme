<div class="bl_breadcrumbs">
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
					<!-- サムネイル画像 -->
					<?php if (!empty($product['thumbnail_image_url'])) : ?>
							<img class="hover_image" src="<?php echo $product['image_url']; ?>" />
					<?php endif; ?>
	
					<!-- その他の画像 -->
					<?php if (!empty($product['images'])) : ?>
							<?php foreach ($product['images'] as $i) : ?>
									<?php
									// モバイルデバイスかどうかの判定を単純化する
									$is_mobile = strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false;
									?>
									<?php if ($is_mobile && !empty($i['mobile'])) : ?>
											<!-- モバイル用 -->
											<img class="hover_image" src="<?php echo $i['src']; ?>" />
									<?php elseif (!$is_mobile && empty($i['mobile'])) : ?>
											<!-- PC用 -->
											<img class="hover_image" src="<?php echo $i['src']; ?>" />
									<?php endif; ?>
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
					<p><?php echo $product['sales_price']; ?>円<span>(税込)</span></p>
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
				<div class="explanation">
					<div id="explanation_ttl" class="explanation_ttl">製品説明</div>
					<div id="text_explanation" class="text_explanation">
							<?php echo $product['expl']; ?>
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
            // ホバー時にメイン画像のsrcを変更
            var newSrc = $(this).attr('src');
            $('#main_image').attr('src', newSrc);
        },
        function() {
            // ホバーが外れたときにメイン画像のsrcを元に戻す（必要ならば）
            // var originalSrc = '<?php echo $product['image_url']; ?>';
            // $('#main-image').attr('src', originalSrc);
        }
    );
});
</script>
<script>
$(document).ready(function() {
    $("#explanation_ttl").click(function() {
        $("#text_explanation").slideToggle();
        $("#explanation_ttl").toggleClass('open');
    });
});
</script>
