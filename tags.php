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

// 获取随机图数量用于封面计算
$dir = './usr/themes/iCard/assets/img/sj/';
$scanned = @scandir($dir);
$n = is_array($scanned) ? count($scanned) - 2 : 0;
if ($n <= 0) $n = 5;
?>

<div class="col-12 col-md-12 col-lg-10 col_12" id="pjax">
    <div class="box box-content">
        <!-- 搜索框 -->
        <div class="pb-3">
            <form onsubmit="return false;" style="display: flex; gap: 0.5rem;">
                <input type="text" id="tag-search" placeholder="输入关键词查找标签..." style="flex: 1; padding: 0.75rem 1rem; border: 1px solid #E0E4E8; border-radius: 0.75rem; font-size: 0.875rem; outline: none; background: #F7F9FA; color: #5E6E80;" />
                <button type="button" onclick="filterItems()" style="padding: 0.75rem 1.5rem; background: linear-gradient(142.17deg, #3086FF 6.66%, #304CFD 91.48%); color: #fff; border: none; border-radius: 0.75rem; font-size: 0.875rem; cursor: pointer; font-weight: 500;">
                    <i class="icon-search" style="font-size: 0.875rem; margin-right: 0.25rem;"></i>查找
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
                    // 保证一个标签固定对应一张缩略图
                    $imgIndex = (abs(crc32($tags->slug)) % $n) + 1;
                    $bg = $this->options->themeUrl . '/assets/img/sj/' . $imgIndex . '.jpg';
                ?>
                <article class="news-item box">
                    <div class="news-item__image-wrap overlay overlay--45">
                        <a class="news-item__link" itemprop="url" href="<?php $tags->permalink(); ?>"></a>
                        <img class="news-item-image cover ls-is-cached lazyloaded" src="<?php echo $bg; ?>" alt="<?php $tags->name(); ?>">
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

    <script>
    function filterItems() {
        const keyword = document.getElementById('tag-search').value.toLowerCase();
        const items = document.querySelectorAll('.news-grid .news-item');
        items.forEach(item => {
            const title = item.querySelector('.title--h4 a').innerText.toLowerCase();
            if (title.includes(keyword)) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        });
    }
    document.getElementById('tag-search').addEventListener('input', filterItems);
    </script>

    <?php $this->need('layout/footer.php'); ?>
</div>