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
<?php $this->need('layout/footer.php'); ?>
