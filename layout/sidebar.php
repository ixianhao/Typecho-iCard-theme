<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!-- Sidebar nav -->
<aside class="col-12 col-md-12 col-lg-2 col_12">
    <div class="sidebar box sticky-column">
        <ul class="nav">
            <li class="nav__item">
                <a href="<?php $this->options->siteUrl(); ?>" data-pjax-state class=" <?php if($this->is('index')): ?> active <?php endif; ?>">
                    <i class="icon-home"></i>首页
                </a>
            </li>

            <?php if ($this->options->showCategories == '1'): ?>
            <!-- 分类入口 —— Typecho 系统默认分类 Widget（弹出展开） -->
            <?php $this->widget('Widget_Metas_Category_List')->to($categories); ?>
            <?php if ($categories->have()): ?>
            <li class="nav__item" style="position: relative; overflow: visible;">
                <a href="javascript:;" data-pjax-state class="nav-category-toggle">
                    <i class="icon-folder"></i>分类
                </a>
                <ul class="nav-sub" style="position: absolute; left: calc(100% + 0.75rem); top: 0; z-index: 100; min-width: 180px; background: #fff; border-radius: 1rem; box-shadow: 0 0.5rem 2rem rgba(0,0,0,0.15); padding: 0.75rem 0; list-style: none; display: none;">
                    <?php while ($categories->next()): ?>
                    <li style="border-bottom: none;">
                        <a href="<?php $categories->permalink(); ?>" data-pjax-state class=" <?php if($this->is('category', $categories->slug)): ?> active <?php endif; ?>" style="display: flex; flex-direction: row; align-items: center; justify-content: flex-start; padding: 0.5rem 1rem; color: #5E6E80; font-size: 0.875rem; text-decoration: none; white-space: nowrap; height: auto; border-radius: 0; background: transparent;">
                            <i class="icon-chevron-right" style="font-size: 0.75rem; margin-right: 0.5rem; margin-top: 0; margin-bottom: 0;"></i><?php $categories->name(); ?>
                            <span style="margin-left: auto; font-size: 0.7rem; color: #999;"><?php echo intval($categories->count); ?></span>
                        </a>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </li>
            <?php endif; ?>
            <?php endif; ?>

            <?php if ($this->options->showTags == '1'): ?>
            <!-- 标签入口 —— Typecho 系统默认标签 Widget（弹出展开） -->
            <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=count&ignoreZeroCount=1&desc=1&limit=50')->to($tags); ?>
            <?php if ($tags->have()): ?>
            <li class="nav__item" style="position: relative; overflow: visible;">
                <a href="javascript:;" data-pjax-state class="nav-tag-toggle">
                    <i class="icon-tag"></i>标签
                </a>
                <ul class="nav-sub" style="position: absolute; left: calc(100% + 0.75rem); top: 0; z-index: 100; min-width: 200px; max-width: 320px; background: #fff; border-radius: 1rem; box-shadow: 0 0.5rem 2rem rgba(0,0,0,0.15); padding: 0.75rem; list-style: none; display: none; display: flex; flex-wrap: wrap; gap: 6px; display: none;">
                    <?php while ($tags->next()): ?>
                    <li style="display: inline-block; border-bottom: none;">
                        <a href="<?php $tags->permalink(); ?>" data-pjax-state style="display: inline-block; padding: 4px 10px; font-size: 0.75rem; border-radius: 2rem; background: rgba(48,108,253,0.08); color: #304CFD; text-decoration: none; white-space: nowrap; height: auto;">
                            #<?php $tags->name(); ?>
                        </a>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </li>
            <?php endif; ?>
            <?php endif; ?>

            <li class="nav__item">
                <a href="<?php echo $this->options->siteUrl() . $this->options->side_bar2_url(); ?>" data-pjax-state class=" <?php if($this->is('page', $this->options->side_bar2_url)): ?> active <?php endif; ?>">
                    <i class="icon-smile"></i><?php $this->options->side_bar2_mc() ?>
                </a>
            </li>
            <li class="nav__item">
                <a href="<?php echo $this->options->siteUrl() . $this->options->side_bar3_url(); ?>" data-pjax-state class=" <?php if($this->is('page', $this->options->side_bar3_url)): ?> active <?php endif; ?>">
                    <i class="icon-code"></i><?php $this->options->side_bar3_mc() ?>
                </a>
            </li>
            <li class="nav__item">
                <a href="<?php echo $this->options->siteUrl() . $this->options->side_bar4_url(); ?>" data-pjax-state class=" <?php if($this->is('page', $this->options->side_bar4_url)): ?> active <?php endif; ?>">
                    <i class="icon-link"></i><?php $this->options->side_bar4_mc() ?>
                </a>
            </li>
            <li class="nav__item">
                <a href="<?php echo $this->options->siteUrl() . $this->options->side_bar5_url(); ?>" data-pjax-state class=" <?php if($this->is('page', $this->options->side_bar5_url)): ?> active <?php endif; ?>">
                    <i class="icon-user"></i><?php $this->options->side_bar5_mc() ?>
                </a>
            </li>
        </ul>
    </div>
</aside>
