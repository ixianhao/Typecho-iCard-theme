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
            <!-- 分类入口 —— Typecho 系统默认分类 Widget -->
            <?php $this->widget('Widget_Metas_Category_List')->to($categories); ?>
            <?php if ($categories->have()): ?>
            <li class="nav__item">
                <a href="javascript:;" data-pjax-state class="nav-category-toggle">
                    <i class="icon-folder"></i>分类
                </a>
                <ul class="nav-sub" style="padding-left: 1.5rem; list-style: none; display: none;">
                    <?php while ($categories->next()): ?>
                    <li class="nav__item" style="border-bottom: none;">
                        <a href="<?php $categories->permalink(); ?>" data-pjax-state class=" <?php if($this->is('category', $categories->slug)): ?> active <?php endif; ?>">
                            <i class="icon-chevron-right" style="font-size: 0.75rem;"></i><?php $categories->name(); ?>
                        </a>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </li>
            <?php endif; ?>
            <!-- 标签入口 —— Typecho 系统默认标签 Widget -->
            <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=count&ignoreZeroCount=1&desc=1&limit=50')->to($tags); ?>
            <?php if ($tags->have()): ?>
            <li class="nav__item">
                <a href="javascript:;" data-pjax-state class="nav-tag-toggle">
                    <i class="icon-tag"></i>标签
                </a>
                <ul class="nav-sub" style="padding-left: 1.5rem; list-style: none; display: none; flex-wrap: wrap; gap: 4px;">
                    <?php while ($tags->next()): ?>
                    <li style="display: inline-block; margin: 2px;">
                        <a href="<?php $tags->permalink(); ?>" data-pjax-state style="font-size: 0.75rem; padding: 2px 6px; border-radius: 4px; background: rgba(255,255,255,0.1);">
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
