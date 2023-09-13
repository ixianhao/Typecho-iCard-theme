<?php
/**
 * Setting
 * 
 * @author ixianhao
 * @link https://ixianhao.com/
 * @version 0.0.1
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {

echo '<link href="' . Helper::options()->themeUrl . '/assets/styles/options.css" rel="stylesheet" type="text/css" />';
echo <<<EOF
<div class="options-contain">
<div class="options-left-aside">
    <ul class="options-tab">
        <li data-current="options-notice">介绍</li>
        <li data-current="options-home">首页头部</li>
	<li data-current="options-contact">联系信息</li>
        <li data-current="options-more">更多页面</li>
        <li data-current="options-orther">其他</li>
    </ul>
</div>
<span id="theme-version" style="display: none;">$version</span>
<div class="options-notice"> 
<h1 class="theme-plane">iCard后台设置</h1>
    <p>欢迎食用iCard！目前还有很多不足，望见谅~</p>
    <p>开源地址：<a href="https://github.com/ixianhao/Typecho-iCard-theme">Github</a></p>
    <p>欢迎大家对本模板进行star~</p>
    <p>作者博客：<a href="https://ixianhao.com">ixianhao</a></p>

</div>
EOF;
echo '<script src="' . Helper::options()->themeUrl . '/assets/styles/options.js"></script>';
    $headTitle = new Typecho_Widget_Helper_Form_Element_Text('headTitle', NULL, "ixianhao", _t('首页头部昵称'), _t('请输入你的昵称'));
    $headTitle->setAttribute('class', 'options-content options-home');
    $form->addInput($headTitle);
    $headStatus = new Typecho_Widget_Helper_Form_Element_Text('headStatus', NULL, "曾经沧海难为水，除却巫山不是云", _t('首页头部一句话介绍'), _t('请输入你的介绍，用于展示在首页昵称下面'));
    $headStatus->setAttribute('class', 'options-content options-home');
    $form->addInput($headStatus);
    $hdAboutUrl = new Typecho_Widget_Helper_Form_Element_Text('hdAboutUrl', NULL, "about.html", _t('头像跳转地址'), _t('请输入需要跳转页面的缩略名'));
    $hdAboutUrl->setAttribute('class', 'options-content options-home');
    $form->addInput($hdAboutUrl);
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, "https://q1.qlogo.cn/g?b=qq&nk=7685082&s=640", _t('首页头部头像地址'), _t('在这里填入一个图片 URL 地址, 以在头部设置你的头像'));
    $logoUrl->setAttribute('class', 'options-content options-home');
    $form->addInput($logoUrl);
    $headbgImgUrl = new Typecho_Widget_Helper_Form_Element_Text('headbgImgUrl', NULL, "/usr/themes/iCard/assets/img/beijing.webp", _t('首页头部背景图片地址'), _t('在这里填入一个图片 URL 地址, 在首页显示头部背景'));
    $headbgImgUrl->setAttribute('class', 'options-content options-home');
    $form->addInput($headbgImgUrl);

    $side_bar2_mc = new Typecho_Widget_Helper_Form_Element_Text('side_bar2_mc', NULL, "闲言", _t('<h2>首页侧边栏地址</h2><h4>如果你修改了侧边栏按钮的链接地址，为保证页面状态追踪，请在主题目录中/layout/sidebar.php中修改page后的值，填写html前缀即可</h4>侧边栏第2个按钮名称'), _t('请输入显示名称'));
    $side_bar2_mc->setAttribute('class', 'options-content options-more');
    $form->addInput($side_bar2_mc);
    $side_bar2_url = new Typecho_Widget_Helper_Form_Element_Text('side_bar2_url', NULL, "sysy.html", _t('侧边栏第2个按钮链接地址'), _t('请输入显示链接地址'));
    $side_bar2_url->setAttribute('class', 'options-content options-more');
    $form->addInput($side_bar2_url);
    $side_bar3_mc = new Typecho_Widget_Helper_Form_Element_Text('side_bar3_mc', NULL, "工具", _t('侧边栏第3个按钮名称'), _t('请输入显示名称'));
    $side_bar3_mc->setAttribute('class', 'options-content options-more');
    $form->addInput($side_bar3_mc);
    $side_bar3_url = new Typecho_Widget_Helper_Form_Element_Text('side_bar3_url', NULL, "site.html", _t('侧边栏第3个按钮链接地址'), _t('请输入显示链接地址'));
    $side_bar3_url->setAttribute('class', 'options-content options-more');
    $form->addInput($side_bar3_url);
    $side_bar4_mc = new Typecho_Widget_Helper_Form_Element_Text('side_bar4_mc', NULL, "友链", _t('侧边栏第4个按钮名称'), _t('请输入显示名称'));
    $side_bar4_mc->setAttribute('class', 'options-content options-more');
    $form->addInput($side_bar4_mc);
    $side_bar4_url = new Typecho_Widget_Helper_Form_Element_Text('side_bar4_url', NULL, "link.html", _t('侧边栏第4个按钮链接地址'), _t('请输入显示链接地址'));
    $side_bar4_url->setAttribute('class', 'options-content options-more');
    $form->addInput($side_bar4_url);
    $side_bar5_mc = new Typecho_Widget_Helper_Form_Element_Text('side_bar5_mc', NULL, "关于", _t('侧边栏第5个按钮名称'), _t('请输入显示名称'));
    $side_bar5_mc->setAttribute('class', 'options-content options-more');
    $form->addInput($side_bar5_mc);
    $side_bar5_url = new Typecho_Widget_Helper_Form_Element_Text('side_bar5_url', NULL, "about.html", _t('侧边栏第5个按钮链接地址'), _t('请输入显示链接地址'));
    $side_bar5_url->setAttribute('class', 'options-content options-more');
    $form->addInput($side_bar5_url);




    $hd_qq = new Typecho_Widget_Helper_Form_Element_Text('hd_qq', NULL, "http://wpa.qq.com/msgrd?v=3&uin=7685082&site=qq&menu=yes", _t('qq'), _t('请输入联系qq'));
    $hd_qq->setAttribute('class', 'options-content options-contact');
    $form->addInput($hd_qq); 
    $hd_email = new Typecho_Widget_Helper_Form_Element_Text('hd_email', NULL, "mailto:a@dy.lc", _t('邮箱'), _t('请输入邮箱地址'));
    $hd_email->setAttribute('class', 'options-content options-contact');
    $form->addInput($hd_email); 
    $hd_github = new Typecho_Widget_Helper_Form_Element_Text('hd_github', NULL, "https://github.com/ixianhao", _t('github地址'), _t('请输入github地址'));
    $hd_github->setAttribute('class', 'options-content options-contact');
    $form->addInput($hd_github); 
    $hd_weibo = new Typecho_Widget_Helper_Form_Element_Text('hd_weibo', NULL, "https://weibo.com/u/1046904630", _t('微博'), _t('请输入微博地址'));
    $hd_weibo->setAttribute('class', 'options-content options-contact');
    $form->addInput($hd_weibo);
    $hd_gitee = new Typecho_Widget_Helper_Form_Element_Text('hd_gitee', NULL, "https://gitee.com/ixianhao", _t('gitee地址'), _t('请输入gitee地址'));
    $hd_gitee->setAttribute('class', 'options-content options-contact');
    $form->addInput($hd_gitee);
    $hd_wx = new Typecho_Widget_Helper_Form_Element_Text('hd_wx', NULL, "/usr/themes/iCard/assets/img/wx.jpg", _t('微信'), _t('请输入微信联系截图'));
    $hd_wx->setAttribute('class', 'options-content options-contact');
    $form->addInput($hd_wx); 
      
  
  
  
    $slimg = new Typecho_Widget_Helper_Form_Element_Select('slimg', array(
        'showon'=>'有图文章显示缩略图，无图文章随机显示缩略图',
        'Showimg' => '有图文章显示缩略图，无图文章只显示一张固定的缩略图',      
        'showoff' => '有图文章显示缩略图，无图文章则不显示缩略图',
        'allsj' => '所有文章一律显示随机缩略图',
        'guanbi' => '关闭所有缩略图显示'
    ), 'showon',
    _t('缩略图设置'), _t('默认选择“有图文章显示缩略图，无图文章随机显示缩略图”'));
    $slimg->setAttribute('class', 'options-content options-orther');
    $form->addInput($slimg->multiMode());
  
    

}









