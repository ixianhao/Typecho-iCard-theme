<?php
/**
 * 这是一款简约的icard样式模板
 * 
 * @package iCard
 * @author ixianhao
 * @version 0.0.3
 * @link https://ixianhao.com
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('layout/header.php');
 ?>
<?php $this->need('layout/sidebar.php'); ?>
<!-- Content -->
<div class="col-12 col-md-12 col-lg-10 col_12" id='pjax'>

	<div class="box box-content">
		<div class="pb-3">
			<h1 class="title title--h1 first-title title__separate">Blog</h1>
		</div>

		<!-- News -->
		<div class="news-grid" id="content">
			<!-- Post -->
			<?php while($this->next()): ?>
	<article class="news-item box">
		<div class="news-item__image-wrap overlay overlay--45">
			<a class="news-item__link" itemprop="url" href="<?php $this->permalink() ?>"></a>
			<?php if($this->options->slimg && 'guanbi'==$this->options->slimg): ?>
			<?php else: ?>
			<?php if($this->options->slimg && 'showoff'==$this->options->slimg): ?>
			<?php else: ?>
			<img class="news-item-image cover ls-is-cached lazyloaded" src="<?php showThumbnail($this); ?>" alt="">
			<?php endif; ?>
			<?php endif; ?>
			<div class="news-item__sort">
				<span style="color:#fff;">
					<?php $this->category('.'); ?>
				</span>
			</div>
			<div class="news-item__date">
				<span>
					<?php $this->date('M jS'); ?>
				</span>
			</div>
		</div>
		<div class="news-item__caption">
                        <h2 class="title title--h4">
                            <?php $this->sticky(); $this->title(20, '') ?>
                        </h2>

                        <p class="news-excerpt" style="font-weight: bold;">
                            <?php $this->excerpt(48, '');?>
                        </p>
                </div>


	</article>

			<?php endwhile; ?>




		</div>
		<div class="posts-nav" style="
    padding: 1rem 0 1rem 0;
    font-size: 2rem;
">

			<div style="float:right;">
				<?php $this->pageLink('<span class="page-numbers">→</span>','next'); ?>
			</div>
			&nbsp;&nbsp;
			<?php $this->pageLink('<span class="page-numbers">←</span>'); ?>
		</div>

	</div>
<!-- layout/footer -->
<script src="/usr/themes/iCard/assets/js/jquery-3.6.0.min.js"></script>
<script>
// 侧边栏高亮 —— 修复不稳定的 active 状态
  function updateActiveLink() {
    var currentPath = window.location.pathname;
    // 去掉尾部斜杠统一对比
    currentPath = currentPath.replace(/\/$/, '');
    
    // 遍历所有侧边栏链接，按路径匹配
    $('.nav__item a[data-pjax-state]').each(function () {
      var linkHref = $(this).attr('href');
      if (!linkHref || linkHref === 'javascript:;') return;
      
      // 构造 URL 对象提取路径
      try {
        var linkUrl = new URL(linkHref, window.location.origin);
        var linkPath = linkUrl.pathname.replace(/\/$/, '');
      } catch (e) {
        var linkPath = linkHref.replace(/\/$/, '');
      }
      
      // 匹配后添加 active
      $(this).toggleClass('active', linkPath === currentPath);
    });
  }

  // 分类/标签折叠展开
  $('.nav-category-toggle').on('click', function(e) {
    e.preventDefault();
    $(this).parent().find('.nav-sub').slideToggle(200);
  });
  $('.nav-tag-toggle').on('click', function(e) {
    e.preventDefault();
    $(this).parent().find('.nav-sub').slideToggle(200);
  });

// 页面首次加载时运行
updateActiveLink();

// Pjax 替换内容后运行
$(document).on('pjax:complete', function() {
  updateActiveLink();
});
</script>

<!-- layout/header -->
<script>
        function toggleImage() {
            var xhoverlay = document.querySelector('.xhoverlay');
            var image = document.querySelector('#overlayImage');
            var imageUrl = '<?php $this->options->hd_wx() ?>'; // 图片的URL

            if (xhoverlay.style.display === 'none') {
                // 设置图片的URL
                image.src = imageUrl;

                // 显示遮罩层和图片
                xhoverlay.style.display = 'flex';
            } else {
                // 隐藏遮罩层和图片
                xhoverlay.style.display = 'none';
            }
        }
</script>


	<?php $this->need('layout/footer.php'); ?>
