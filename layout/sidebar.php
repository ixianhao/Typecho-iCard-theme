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
            <li class="nav__item">
                <a href="<?php $this->options->side_bar2_url() ?>" data-pjax-state class=" <?php if($this->is('page','xysy')): ?> active <?php endif; ?>">
                    <i class="icon-smile"></i><?php $this->options->side_bar2_mc() ?>
                </a>
            </li>
            <li class="nav__item">
		<a href="<?php $this->options->side_bar3_url() ?>" data-pjax-state class="<?php if($this->is('page','site')): ?> active <?php endif; ?>">
                    <i class="icon-code"></i><?php $this->options->side_bar3_mc() ?>
                </a>
            </li>
            <li class="nav__item">
                <a href="<?php $this->options->side_bar4_url() ?>" data-pjax-state class=" <?php if($this->is('page','link')): ?> active <?php endif; ?>">
                    <i class="icon-link"></i><?php $this->options->side_bar4_mc() ?>
                </a>
            </li>
            <li class="nav__item">
                <a href="<?php $this->options->side_bar5_url() ?>" data-pjax-state class=" <?php if($this->is('page','about')): ?> active <?php endif; ?>">
                    <i class="icon-user"></i><?php $this->options->side_bar5_mc() ?>
                </a>
            </li>
        </ul>
    </div>
</aside>
