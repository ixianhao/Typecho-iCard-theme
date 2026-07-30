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
        <li data-current="options-more">侧边栏设置</li>
        <li data-current="options-orther">其他</li>
    </ul>
</div>
<span id="theme-version" style="display: none;">0.0.3</span>
<div class="options-notice"> 
<h1 class="theme-plane">iCard后台设置</h1>
    <p>欢迎食用iCard！目前还有很多不足，望见谅~</p>
    <p>开源地址：<a href="https://github.com/ixianhao/Typecho-iCard-theme">Github</a></p>
    <p>欢迎大家对本模板进行star~</p>
    <p>作者博客：<a href="https://ixianhao.com">ixianhao</a></p>

</div>
EOF;
echo '<script src="' . Helper::options()->themeUrl . '/assets/styles/options.js"></script>';
    $headTitle = new Typecho_Widget_Helper_Form_Element_Text('headTitle', NULL, "ixianhao", _t('<h2>首页头部</h2><hr>首页头部昵称'), _t('请输入你的昵称'));
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

    // 分类显示开关 —— 调用 Typecho 系统默认分类能力
    $showCategories = new Typecho_Widget_Helper_Form_Element_Radio('showCategories', array(
        '0' => '关闭',
        '1' => '开启',
    ), '0', _t('<h2>侧边栏设置</h2>
    <div style="background-color: #fff3cd; color: #856404; padding: 10px 15px; border-radius: 4px; border-left: 4px solid #ffeeba; margin-bottom: 15px;">
        <strong>📢 站点链接提示：</strong>因侧边栏链接调用了站点地址，请确保在「后台 - 设置 - 基本 - 站点地址」中正确配置了你的域名，否则侧边栏按钮可能会跳转异常或出现 404。
    </div>
    <hr>
    <div style="background-color: #e8f4fd; color: #0056b3; padding: 10px 15px; border-radius: 4px; border-left: 4px solid #b8daff; margin-bottom: 15px;">
        <strong>💡 分类与标签独立页面配置提醒：</strong><br>
        如果您开启了下方的「侧边栏分类」或「侧边栏标签」，为了让它们能正常点击跳转，您必须完成以下操作：<br>
        1. 在后台「管理 - 独立页面」中点击【新增】<br>
        2. 分类页面：标题随意，<strong>缩略名必须填 <code>categories</code></strong>，右侧展开高级选项，<strong>自定义模板选择「分类」</strong><br>
        3. 标签页面：标题随意，<strong>缩略名必须填 <code>tags</code></strong>，右侧展开高级选项，<strong>自定义模板选择「标签」</strong><br>
        完成后发布页面即可正常使用。
    </div>
    <h3>侧边栏分类</h3>是否在侧边栏显示分类入口？'), _t('开启后将使用 Typecho 默认分类系统，自动列出所有分类。'));
    $showCategories->setAttribute('class', 'options-content options-more');
    $form->addInput($showCategories);

    // 标签显示开关 —— 调用 Typecho 系统默认标签能力
    $showTags = new Typecho_Widget_Helper_Form_Element_Radio('showTags', array(
        '0' => '关闭',
        '1' => '开启',
    ), '0', _t('<h3>侧边栏标签</h3>是否在侧边栏显示标签入口？'), _t('开启后将使用 Typecho 默认标签系统，自动列出所有标签。'));
    $showTags->setAttribute('class', 'options-content options-more');
    $form->addInput($showTags);

    $side_bar2_mc = new Typecho_Widget_Helper_Form_Element_Text('side_bar2_mc', NULL, "闲言", _t('<hr><div style="background-color: #f8f9fa; padding: 10px; border-left: 4px solid #17a2b8; margin-bottom: 10px;"><strong>💡 独立页面提醒：</strong>若配置了此按钮，请务必在「管理 - 独立页面」中创建一个缩略名为对应前缀（不带 .html）的页面，否则点击将 404 报错。</div><strong>🔘 【侧边栏自定义按钮 1】</strong><br>按钮名称'), _t('请输入侧边栏显示的文字，例如：闲言'));
    $side_bar2_mc->setAttribute('class', 'options-content options-more');
    $form->addInput($side_bar2_mc);
    $side_bar2_url = new Typecho_Widget_Helper_Form_Element_Text('side_bar2_url', NULL, "xysy.html", _t('按钮链接（缩略名）'), _t('请输入目标页面的缩略名后缀，例如：<code>xysy.html</code>'));
    $side_bar2_url->setAttribute('class', 'options-content options-more');
    $form->addInput($side_bar2_url);
    
    $side_bar3_mc = new Typecho_Widget_Helper_Form_Element_Text('side_bar3_mc', NULL, "工具", _t('<hr><div style="background-color: #f8f9fa; padding: 10px; border-left: 4px solid #17a2b8; margin-bottom: 10px;"><strong>💡 独立页面提醒：</strong>若配置了此按钮，请务必在「管理 - 独立页面」中创建一个缩略名为对应前缀（不带 .html）的页面，否则点击将 404 报错。</div><strong>🔘 【侧边栏自定义按钮 2】</strong><br>按钮名称'), _t('请输入侧边栏显示的文字，例如：工具'));
    $side_bar3_mc->setAttribute('class', 'options-content options-more');
    $form->addInput($side_bar3_mc);
    $side_bar3_url = new Typecho_Widget_Helper_Form_Element_Text('side_bar3_url', NULL, "site.html", _t('按钮链接（缩略名）'), _t('请输入目标页面的缩略名后缀，例如：<code>site.html</code>'));
    $side_bar3_url->setAttribute('class', 'options-content options-more');
    $form->addInput($side_bar3_url);
    
    $side_bar4_mc = new Typecho_Widget_Helper_Form_Element_Text('side_bar4_mc', NULL, "友链", _t('<hr><div style="background-color: #f8f9fa; padding: 10px; border-left: 4px solid #17a2b8; margin-bottom: 10px;"><strong>💡 独立页面提醒：</strong>若配置了此按钮，请务必在「管理 - 独立页面」中创建一个缩略名为对应前缀（不带 .html）的页面，否则点击将 404 报错。</div><strong>🔘 【侧边栏自定义按钮 3】</strong><br>按钮名称'), _t('请输入侧边栏显示的文字，例如：友链'));
    $side_bar4_mc->setAttribute('class', 'options-content options-more');
    $form->addInput($side_bar4_mc);
    $side_bar4_url = new Typecho_Widget_Helper_Form_Element_Text('side_bar4_url', NULL, "link.html", _t('按钮链接（缩略名）'), _t('请输入目标页面的缩略名后缀，例如：<code>link.html</code>'));
    $side_bar4_url->setAttribute('class', 'options-content options-more');
    $form->addInput($side_bar4_url);
    
    $side_bar5_mc = new Typecho_Widget_Helper_Form_Element_Text('side_bar5_mc', NULL, "关于", _t('<hr><div style="background-color: #f8f9fa; padding: 10px; border-left: 4px solid #17a2b8; margin-bottom: 10px;"><strong>💡 独立页面提醒：</strong>若配置了此按钮，请务必在「管理 - 独立页面」中创建一个缩略名为对应前缀（不带 .html）的页面，否则点击将 404 报错。</div><strong>🔘 【侧边栏自定义按钮 4】</strong><br>按钮名称'), _t('请输入侧边栏显示的文字，例如：关于'));
    $side_bar5_mc->setAttribute('class', 'options-content options-more');
    $form->addInput($side_bar5_mc);
    $side_bar5_url = new Typecho_Widget_Helper_Form_Element_Text('side_bar5_url', NULL, "about.html", _t('按钮链接（缩略名）'), _t('请输入目标页面的缩略名后缀，例如：<code>about.html</code>'));
    $side_bar5_url->setAttribute('class', 'options-content options-more');
    $form->addInput($side_bar5_url);




    $hd_qq = new Typecho_Widget_Helper_Form_Element_Text('hd_qq', NULL, "http://wpa.qq.com/msgrd?v=3&uin=7685082&site=qq&menu=yes", _t('<h2>联系信息</h2><hr>qq'), _t('请输入联系qq'));
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
    _t('<h2>其他设置</h2><hr>缩略图设置'), _t('默认选择“有图文章显示缩略图，无图文章随机显示缩略图”'));
    $slimg->setAttribute('class', 'options-content options-orther');
    $form->addInput($slimg->multiMode());
  
    

}









