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
            <!-- 分类入口 —— 跳转到独立分类聚合页面 -->
            <li class="nav__item">
                <a href="<?php $this->options->siteUrl(); ?>categories.html" data-pjax-state class=" <?php if($this->is('page', 'categories')): ?>active<?php endif; ?>">
                    <i class="icon-folder"></i>分类
                </a>
            </li>
            <?php endif; ?>

            <?php if ($this->options->showTags == '1'): ?>
            <!-- 标签入口 —— 跳转到独立标签聚合页面 -->
            <li class="nav__item">
                <a href="<?php $this->options->siteUrl(); ?>tags.html" data-pjax-state class=" <?php if($this->is('page', 'tags')): ?>active<?php endif; ?>">
                    <i class="icon-tag"></i>标签
                </a>
            </li>
            <?php endif; ?>

            <li class="nav__item">
                <a href="<?php echo $this->options->siteUrl() . $this->options->side_bar2_url(); ?>" data-pjax-state class=" <?php if($this->is('page', $this->options->side_bar2_url())): ?>active<?php endif; ?>">
                    <i class="icon-smile"></i><?php $this->options->side_bar2_mc() ?>
                </a>
            </li>
            <li class="nav__item">
                <a href="<?php echo $this->options->siteUrl() . $this->options->side_bar3_url(); ?>" data-pjax-state class=" <?php if($this->is('page', $this->options->side_bar3_url())): ?>active<?php endif; ?>">
                    <i class="icon-code"></i><?php $this->options->side_bar3_mc() ?>
                </a>
            </li>
            <li class="nav__item">
                <a href="<?php echo $this->options->siteUrl() . $this->options->side_bar4_url(); ?>" data-pjax-state class=" <?php if($this->is('page', $this->options->side_bar4_url())): ?>active<?php endif; ?>">
                    <i class="icon-link"></i><?php $this->options->side_bar4_mc() ?>
                </a>
            </li>
            <li class="nav__item">
                <a href="<?php echo $this->options->siteUrl() . $this->options->side_bar5_url(); ?>" data-pjax-state class=" <?php if($this->is('page', $this->options->side_bar5_url())): ?>active<?php endif; ?>">
                    <i class="icon-user"></i><?php $this->options->side_bar5_mc() ?>
                </a>
            </li>
        </ul>
    </div>
</aside>
