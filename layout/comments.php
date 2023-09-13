<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php function threadedComments($comments, $options) {
    $commentClass = '';$group = '';
        if ($comments->authorId) {
            if ($comments->authorId == $comments->ownerId) {
                $group = '博主';
                    $commentClass .= ' comment-by-author';  //如果是文章作者的评论添加 .comment-by-author 样式
                } else {
                    $group = '游客';
                    $commentClass .= ' comment-by-user';  //如果是评论作者的添加 .comment-by-user 样式
                }
            } 
    $commentLevelClass = $comments->_levels > 0 ? ' comment-child' : ' comment-parent';  //评论层数大于0为子级，否则是父级
?>
<li id="li-<?php $comments->theId(); ?>" class="
    <?php 
    if ($comments->levels > 0) {
        echo ' comment-child';
        $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
    } else {
        echo ' comment-parent';
    }
    $comments->alt(' comment-odd', ' comment-even');
    echo $commentClass;
    ?> comment-box">
    <div id="<?php $comments->theId(); ?>">
    <div class="comment-box__inner">
        <svg class="avatar avatar--60">
            <g class="avatar__hexagon">
                <image xlink:href="<?php ParseAvatar($comments->mail); ?>s=100" height="100%" width="100%" />
            </g>
        </svg>
        <div class="comment-box__body">
            <h5 class="comment-box__details">
            <span><?php $comments->author(); ?><span class="badge"><?php echo $group; ?></span></span> 
            <span style="font-size: 0.9375rem;"><?php $comments->reply('<i class="font-icon icon-reply"></i> 回复'); ?> </span>
            </h5>
            <div><?php echo getPermalinkFromCoid($comments->parent);echo preg_replace('#</?[p][^>]*>#','', reEmo($comments->content)); ?></div>
            <ul class="comment-box__footer">
                <li class="comment-box__details-date"> <?php echo timesince($comments->created);?></li>
                <li> <span><?php GetOs($comments->agent); ?> · <?php GetBrowser($comments->agent); ?></span></li>
            </ul>
        </div><!-- 单条评论者信息及内容 -->
    </div>
    </div>
    <?php if ($comments->children) { ?>
        <div class="comment-children">
            <?php $comments->threadedComments($options); ?>
        </div>
    <?php } ?>
</li>
<?php } ?>
<?php $this->comments()->to($comments); ?>

<?php if($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>">
        <div class="cancel-comment-reply">
            <span class="response">
                    <span class="cancel-reply" class="margin-left: 1rem;">
                    
                    </span>
            </span>
        </div>


<div class="v-comment" >
    <?php if ($comments->have()): ?>
        <h2 class="title title--h3 title__separate">评论 <span class="color--light">(<?php $this->commentsNum(_t('%d')); ?>)</span></h2>
        <div id="comments" style="padding: 1rem;">
        <ol class="comment-list">
        <?php $comments->listComments(); ?>
        </div>
        <div class="page-navigator">
        <?php $comments->pageNav('<', '>', 1, ''); ?>
        </div>
    <?php else: ?>
        <h3 class="vcount" style="text-align: center;"><?php if($this->allow('comment')): ?>  <?php else: ?>  <?php endif; ?></h3>
    <?php endif; ?>
</div>

<div class="page-navigator">
                </div>
        <h2 class="title title--h3 title__separate">发表评论</h2>
        <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form" class="comment-form">
            <?php if($this->user->hasLogin()): ?>
                <ul class="social-auth">
                            <li class="social-auth__item"><?php _e('登录身份: '); ?></li>
                            <li class="social-auth__item"><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a></li>
                            <li class="social-auth__item"><a href="<?php $this->options->logoutUrl(); ?>" title="Logout">退出 »</a></li>
                </ul>
                <textarea rows="5" cols="0" name="text" id="textarea" class="textarea form-control OwO-textarea" required="required" placeholder="请输入评论内容..."></textarea>
                        <br/> 
			<div class="row">
                                <div class="col-12 col-md-6 order-2 order-md-1 text-center text-md-left">
                                        <div id="validator-contact" class="hidden"></div>
                                 </div>
                                 <div class="col-12 col-md-6 order-1 order-md-2 text-right">
                                        <button class="btn" type="submit" value="Submit Comment">发送</button>
                                        <br/>
                                <br/>
                                        </div>
                                </div>
	    <?php else: ?>
                <div class="row">
                    <div class="form-group col-12 col-md-4">
                    <input type="text" name="author" id="author" class="form-control" placeholder="* 怎么称呼" autocomplete="on" oninvalid="setCustomValidity('Fill in the field')" value="<?php $this->remember('author'); ?>" required />
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-12 col-md-4">
                    <input type="email" name="mail" id="mail" lay-verify="email" class="form-control" placeholder="<?php if ($this->options->commentsRequireMail): ?>* <?php endif; ?>邮箱(放心~会保密~.~)" value="<?php $this->remember('mail'); ?>" <?php if ($this->options->commentsRequireMail): ?> autocomplete="on" oninvalid="setCustomValidity('Fill in the field')" required<?php endif; ?> />
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-12 col-md-4">
                    <input type="url" name="url" id="url" lay-verify="url" class="form-control" placeholder="<?php if ($this->options->commentsRequireURL): ?>* <?php endif; ?><?php _e('http://您的主页'); ?>" value="<?php $this->remember('url'); ?>" <?php if ($this->options->commentsRequireURL): ?> autocomplete="on" oninvalid="setCustomValidity('Fill in the field')" required<?php endif; ?> />
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <textarea rows="5" cols="0" name="text" id="textarea" class="textarea form-control OwO-textarea" required="required" placeholder="请输入评论内容..."></textarea>
			<br/>
			<div class="row">
				<div class="col-12 col-md-6 order-2 order-md-1 text-center text-md-left">
					<div id="validator-contact" class="hidden"></div>
				 </div>
				 <div class="col-12 col-md-6 order-1 order-md-2 text-right">
					<button class="btn" type="submit" value="Submit Comment">发送</button>
					<br/>
				<br/>
					</div>
				</div>
		<?php endif; ?>
	</form>
<?php endif; ?>

