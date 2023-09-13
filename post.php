<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('layout/header.php'); ?>
<?php $this->need('layout/sidebar.php'); ?>
<div class="col-12 col-md-12 col-lg-10 col_12" id='pjax'>
    <div class="box box-content" style="border-radius:20px 20px 20px 20px;">

        <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
 <div class="pb-2">
                <h1 class="title title--h1 first-title title__separate" itemprop="name headline">
                   <?php echo '正文' ?>
                </h1>
            </div>

	    <div class="caption-post" itemprop="articleBody">
		<header class="header-post">
                    <h1 class="title title--h1"><?php $this->title() ?></h1>
                    <p style="font-size:7px;display:inline;font-weight: bold;" class="title title--h1">发布时间：<time datetime="2023-05-12T00:47:36+08:00" itemprop="datePublished"><?php $this->date('Y.m.d'); ?></time></p>
                    <p style="font-size:7px;display:inline;padding-left:3em;font-weight: bold;" class="title title--h1">文章作者：<?php $this->author(); ?></p>
		</header> 
<br /><br />
                <?php
                $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i';
                $replacement = '<a href="$1" data-fancybox="gallery"  ><img src="$1" alt="'.$this->title.'" title="点击放大图片" ></a>';
                $content = preg_replace($pattern, $replacement, $this->content);
                echo $content;
            ?>
            </div>
        </article>
<br />
        <div class="post_end">- THE END -</div>
		<footer class="footer-post">
        <a class="footer-post__share" href="http://facebook.com/sharer.php?u=<?php $this->permalink() ?>" target="_blank"><i class="font-icon icon-facebook"></i><span _msthash="2658461" _msttexthash="10556117">脸谱网</span></a><a class="footer-post__share" href="http://twitter.com/intent/tweet?url=<?php $this->permalink() ?>" target="_blank"><i class="font-icon icon-twitter"></i><span _msthash="2658462" _msttexthash="1985711">推特</span></a><a class="footer-post__share" href="http://linkedin.com/sharing/share-offsite/?url=<?php $this->permalink() ?>" target="_blank"><i class="font-icon icon-linkedin"></i><span _msthash="2658463" _msttexthash="107016">LinkedIn</span></a>
    </footer> 

        <div class="copy-text"> 
	    <div>
                <p>非特殊说明，本博所有文章均为博主原创。</p>
                <p class="hidden-xs">如若转载，请注明出处：<a href="<?php $this->permalink() ?>"><?php $this->permalink() ?></a></p>
            </div>
        </div>   



        <div style="margin-bottom: 15px;">
            <span class="post-next">上一篇:</span>
            <?php $this->theNext('%s','没有了'); ?>
        </div>





        <div>
            <span class="post-next">下一篇:</span>
            <?php $this->thePrev('%s','没有了'); ?>
        </div>


        <br />
        <?php $this->need('layout/comments.php'); ?>
   </div>
</div>
    <?php $this->need('layout/footer.php'); ?>
