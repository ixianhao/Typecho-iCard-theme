<?php
/**
 * 模板名称：标签
 * 展示所有标签及其下属文章数，支持搜索
 *
 * @package custom
 * @author ixianhao
 * @version 0.0.3
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('layout/header.php');
$this->need('layout/sidebar.php');

// 预定义一些漂亮的渐变色，用于标签卡片封面
$gradients = [
    'linear-gradient(135deg, #ff9a9e 0%, #fecfef 99%, #fecfef 100%)',
    'linear-gradient(135deg, #a1c4fd 0%, #c2e9fb 100%)',
    'linear-gradient(135deg, #fbc2eb 0%, #a6c1ee 100%)',
    'linear-gradient(135deg, #f6d365 0%, #fda085 100%)',
    'linear-gradient(135deg, #84fab0 0%, #8fd3f4 100%)',
    'linear-gradient(135deg, #d4fc79 0%, #96e6a1 100%)',
    'linear-gradient(135deg, #a18cd1 0%, #fbc2eb 100%)',
    'linear-gradient(135deg, #cfd9df 0%, #e2ebf0 100%)'
];
?>

<div class="col-12 col-md-12 col-lg-10 col_12" id="pjax">
    <div class="box box-content">
        <!-- 搜索框 -->
        <div class="pb-3">
            <form method="get" action="<?php $this->options->siteUrl(); ?>" style="display: flex; gap: 0.5rem;">
                <input type="text" name="s" placeholder="输入关键词搜索文章..." style="flex: 1; padding: 0.75rem 1rem; border: 1px solid #E0E4E8; border-radius: 0.75rem; font-size: 0.875rem; outline: none; background: #F7F9FA; color: #5E6E80;" />
                <button type="submit" style="padding: 0.75rem 1.5rem; background: linear-gradient(142.17deg, #3086FF 6.66%, #304CFD 91.48%); color: #fff; border: none; border-radius: 0.75rem; font-size: 0.875rem; cursor: pointer; font-weight: 500;">
                    <i class="icon-search" style="font-size: 0.875rem; margin-right: 0.25rem;"></i>搜索
                </button>
            </form>
        </div>

        <!-- 标签区域 -->
        <div class="pb-2">
            <h3 class="title title--h1 first-title title__separate">
                <i class="icon-tag" style="font-size: 1.75rem; margin-right: 0.5rem; vertical-align: middle;"></i><?php _e('全部标签'); ?>
            </h3>
        </div>
        <div class="news-grid">
            <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=count&ignoreZeroCount=1&desc=1&limit=200')->to($tags); ?>
            <?php if ($tags->have()): ?>
                <?php while ($tags->next()): 
                    // 保证一个标签固定对应一个渐变色
                    $colorIndex = abs(crc32($tags->slug)) % count($gradients);
                    $bg = $gradients[$colorIndex];
                ?>
                <article class="news-item box">
                    <div class="news-item__image-wrap overlay overlay--45" style="background: <?php echo $bg; ?>; display: flex; align-items: center; justify-content: center; min-height: 140px;">
                        <a class="news-item__link" itemprop="url" href="<?php $tags->permalink(); ?>"></a>
                        <i class="icon-tag" style="font-size: 3rem; color: rgba(255,255,255,0.8); z-index: 1;"></i>
                        <div class="news-item__sort">
                            <span style="color:#fff; background: rgba(0,0,0,0.3); padding: 4px 10px; border-radius: 4px;">
                                # <?php $tags->name(); ?>
                            </span>
                        </div>
                        <div class="news-item__date">
                            <span style="background: rgba(0,0,0,0.3); padding: 4px 10px; border-radius: 4px;"><?php echo intval($tags->count); ?> 篇</span>
                        </div>
                    </div>
                    <div class="news-item__caption">
                        <h2 class="title title--h4">
                            <a href="<?php $tags->permalink(); ?>"># <?php $tags->name(); ?></a>
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

    <?php $this->need('layout/footer.php'); ?>
</div>