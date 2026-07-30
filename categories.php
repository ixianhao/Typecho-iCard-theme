<?php
/**
 * 模板名称：分类 & 标签
 * 展示所有分类和标签及其下属文章，支持搜索
 *
 * @package custom
 * @author ixianhao
 * @version 0.0.3
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('layout/header.php');
$this->need('layout/sidebar.php');
?>

<div class="col-12 col-md-12 col-lg-10 col_12" id="pjax">
    <div class="box box-content">
        <!-- 搜索框 -->
        <div class="pb-3">
            <form method="get" action="<?php $this->options->siteUrl(); ?>search/" style="display: flex; gap: 0.5rem;">
                <input type="text" name="s" placeholder="输入关键词搜索文章..." style="flex: 1; padding: 0.75rem 1rem; border: 1px solid #E0E4E8; border-radius: 0.75rem; font-size: 0.875rem; outline: none; background: #F7F9FA; color: #5E6E80;" />
                <button type="submit" style="padding: 0.75rem 1.5rem; background: linear-gradient(142.17deg, #3086FF 6.66%, #304CFD 91.48%); color: #fff; border: none; border-radius: 0.75rem; font-size: 0.875rem; cursor: pointer; font-weight: 500;">
                    <i class="icon-search" style="font-size: 0.875rem; margin-right: 0.25rem;"></i>搜索
                </button>
            </form>
        </div>

        <!-- 分类区域 -->
        <div class="pb-2">
            <h3 class="title title--h1 first-title title__separate">
                <i class="icon-folder" style="font-size: 1.75rem; margin-right: 0.5rem; vertical-align: middle;"></i><?php _e('分类'); ?>
            </h3>
        </div>
        <div class="news-grid">
            <?php $this->widget('Widget_Metas_Category_List')->to($categories); ?>
            <?php if ($categories->have()): ?>
                <?php while ($categories->next()): ?>
                <article class="news-item box">
                    <div class="news-item__image-wrap overlay overlay--45">
                        <a class="news-item__link" itemprop="url" href="<?php $categories->permalink(); ?>"></a>
                        <div class="news-item__sort">
                            <span style="color:#fff;">
                                <?php $categories->name(); ?>
                            </span>
                        </div>
                        <div class="news-item__date">
                            <span><?php echo intval($categories->count); ?> 篇</span>
                        </div>
                    </div>
                    <div class="news-item__caption">
                        <h2 class="title title--h4">
                            <?php $categories->name(); ?>
                        </h2>
                        <p class="news-excerpt" style="font-weight: bold;">
                            <?php echo $categories->description ?: '共 ' . intval($categories->count) . ' 篇文章'; ?>
                        </p>
                    </div>
                </article>
                <?php endwhile; ?>
            <?php else: ?>
                <article class="post">
                    <h2 class=""><?php _e('暂无分类'); ?></h2>
                </article>
            <?php endif; ?>
        </div>

        <!-- 标签区域 -->
        <div class="pb-2" style="margin-top: 2rem;">
            <h3 class="title title--h1 first-title title__separate">
                <i class="icon-tag" style="font-size: 1.75rem; margin-right: 0.5rem; vertical-align: middle;"></i><?php _e('标签'); ?>
            </h3>
        </div>
        <div class="news-grid">
            <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=count&ignoreZeroCount=1&desc=1&limit=100')->to($tags); ?>
            <?php if ($tags->have()): ?>
                <?php while ($tags->next()): ?>
                <article class="news-item box">
                    <div class="news-item__image-wrap overlay overlay--45">
                        <a class="news-item__link" itemprop="url" href="<?php $tags->permalink(); ?>"></a>
                        <div class="news-item__sort">
                            <span style="color:#fff;">
                                # <?php $tags->name(); ?>
                            </span>
                        </div>
                        <div class="news-item__date">
                            <span><?php echo intval($tags->count); ?> 篇</span>
                        </div>
                    </div>
                    <div class="news-item__caption">
                        <h2 class="title title--h4">
                            # <?php $tags->name(); ?>
                        </h2>
                        <p class="news-excerpt" style="font-weight: bold;">
                            共 <?php echo intval($tags->count); ?> 篇文章
                        </p>
                    </div>
                </article>
                <?php endwhile; ?>
            <?php else: ?>
                <article class="post">
                    <h2 class=""><?php _e('暂无标签'); ?></h2>
                </article>
            <?php endif; ?>
        </div>
    </div>

<script src="/usr/themes/iCard/assets/js/jquery-3.6.0.min.js"></script>
<script>
    // 搜索框回车提交
    $('form input[name="s"]').on('keypress', function(e) {
        if (e.which === 13) {
            $(this).closest('form').submit();
        }
    });
</script>

    <?php $this->need('layout/footer.php'); ?>
</div>
