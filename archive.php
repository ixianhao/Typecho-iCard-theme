<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('layout/header.php'); ?>
<?php $this->need('layout/sidebar.php'); ?>

<div class="col-12 col-md-12 col-lg-10 col_12">
    <div class="box box-content">
        <div class="pb-2">
            <h3 class="title title--h1 first-title title__separate">
                <?php $this->archiveTitle(array(
            'category'  =>  _t('分类【 %s 】下的文章'),
            'search'    =>  _t('包含关键字【 %s 】的文章'),
            'tag'       =>  _t('标签【 %s 】下的文章'),
            'author'    =>  _t('【%s 】发布的文章')
        ), '', ''); ?>
            </h3>
        </div>

        <div class="news-grid">

            <?php if ($this->have()): ?>
            <?php while($this->next()): ?>

            <!-- Post -->
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
            <?php else: ?>
            <article class="post">

                <h2 class="">
                    <?php _e('暂无文章~'); ?>
                </h2>

            </article>
            <?php endif; ?>

            <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
        </div>
    </div>


    <?php $this->need('layout/footer.php'); ?>
