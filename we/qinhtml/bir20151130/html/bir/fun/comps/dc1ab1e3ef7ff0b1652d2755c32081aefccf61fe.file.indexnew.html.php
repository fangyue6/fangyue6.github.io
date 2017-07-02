<?php /* Smarty version Smarty-3.1.17, created on 2016-04-15 09:01:15
         compiled from "/usr/local/nginx/html/bir/fun/templates/indexnew.html" */ ?>
<?php /*%%SmartyHeaderCode:95735296565d920f3319b9-17509484%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc1ab1e3ef7ff0b1652d2755c32081aefccf61fe' => 
    array (
      0 => '/usr/local/nginx/html/bir/fun/templates/indexnew.html',
      1 => 1460710870,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '95735296565d920f3319b9-17509484',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_565d920f3ff4c1_79196542',
  'variables' => 
  array (
    'flag' => 0,
    'nickname' => 0,
    'username' => 0,
    'fun' => 0,
    'friends' => 0,
    'friend' => 0,
    'message' => 0,
    'me' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565d920f3ff4c1_79196542')) {function content_565d920f3ff4c1_79196542($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/usr/local/nginx/html/bir/fun/libs/plugins/modifier.date_format.php';
?><!doctype>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="../favicon.ico">
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="http://v3.bootcss.com/examples/offcanvas/offcanvas.css" rel="stylesheet">
    <script src="http://v3.bootcss.com/assets/js/ie-emulation-modes-warning.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="js/modal.js"></script>
    <meta name="description" content="方月网 - 这是给方月女朋友的礼物，哈哈">
    <meta content="方月网站" name="keywords">
</head>
<body >
<!--导航条start-->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">ItisYue的网站</a>
        </div>
       <div class="navbar-inner">
            <div id="navbar" class="navbar-collapse collapse">
            <!-- &lt;!&ndash;<div id="navbar" class="nav-collapse collapse">&ndash;&gt;-->
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">首页</a></li>
                <li><a href="#about">关于我</a></li>
                <?php if ($_smarty_tpl->tpl_vars['flag']->value==0) {?>
                <li><a data-toggle="modal" href="#login">登陆</a></li>
                <li><a data-toggle="modal" href="#register">注册</a></li>
                <?php } else { ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">欢迎您:<?php echo $_smarty_tpl->tpl_vars['nickname']->value;?>
<b class="caret"></b></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <?php if ($_smarty_tpl->tpl_vars['flag']->value==1&&($_smarty_tpl->tpl_vars['username']->value=='fangyue'||$_smarty_tpl->tpl_vars['username']->value=='lvqinyan')) {?>
                        <li><a href="../mywebpage/index.html" target="_blank">关于我们</a></li>
                        <li><a href="templates/vedio.html" target="_blank">The Vedio</a></li>
                        <?php }?>
                        <li><a href="control/logout.php">退出</a></li>
                    </ul>
                </li>
                <?php }?>
            </ul>

<!--            <ul class="nav navbar-nav navbar-right">
                <li><a>Default</a></li>
                <li><a>Static top</a></li>
                <li class="active"><a>Fixed top <span class="sr-only">(current)</span></a></li>
            </ul>-->
             <?php if ($_smarty_tpl->tpl_vars['flag']->value==0) {?>
                <form class="navbar-form navbar-right"  onsubmit="return login1()" method="post">
                    <div class="form-group">
                        <input type="text" placeholder="Username" class="form-control" name="username" required="required" id="login1_username">
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Password" class="form-control" name="password" required="required" id="login1_password">
                    </div>
                    <button type="submit" class="btn btn-success">Sign in</button>
                </form>
            <?php }?>
        </div><!--&lt;!&ndash;/.nav-collapse &ndash;&gt;-->
        </div>
    </div>
</nav>
<!--导航条end-->
<!-- 注册Modal start-->
<div id="register" aria-hidden="true" aria-labelledby="registerModalLabel" role="dialog" tabindex="-1" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 id="registerModalLabel">注册</h3>
            </div>
            <div class="modal-body">
                <form action="control/register.php" onsubmit="return register()" method="post" id="registerform">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="register_username" class="control-label">用户名:</label> <!--<span id="register_username_message" style="color: red"></span>-->
                            <input type="text" class="form-control" placeholder="Username"  name="username" required="required" id="register_username">
                        </div>
                        <div class="form-group">
                            <label for="register_password" class="control-label">密码:</label><!--<span id="register_password_message" style="color: red"></span>-->
                            <input type="password" class="form-control" placeholder="请输入密码" name="password"  required="required" id="register_password">
                        </div>
                        <div class="form-group">
                            <label for="register_password1" class="control-label">确认密码:</label><!--<span id="register_password1_message" style="color: red"></span>-->
                            <input type="password" class="form-control" placeholder="请再次输入密码"   required="required" id="register_password1">
                        </div>
                        <div class="form-group">
                            <label for="register_email" class="control-label">输入邮箱:</label><!--<span id="registe_email_message" style="color: red"></span>-->
                            <input type="email" class="form-control" placeholder="abc@qq.com" name="email"  required="required" id="register_email">
                        </div>
                        <div class="form-group">
                            <label for="register_nickname" class="control-label">输入昵称:</label><!--<span id="register_nickname_message" style="color: red"></span>-->
                            <input type="text" class="form-control" placeholder="德玛西亚" name="nickname"  required="required" id="register_nickname">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="text-align: center">
                <button aria-hidden="true"  class="btn" form="registerform">注册</button>
                <button aria-hidden="true" data-dismiss="modal" class="btn">关闭</button>
            </div>
        </div>
    </div>
</div>
<!-- 注册Modal end-->

<!-- 登陆Modal start-->
<div id="login" aria-hidden="true" aria-labelledby="loginModalLabel" role="dialog" tabindex="-1" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h3 id="loginModalLabel">登陆</h3>
            </div>
            <div class="modal-body" >
                <form onsubmit="return login()" method="post" id="loginform">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="login_username" class="control-label">用户名/邮箱/昵称：</label> <!--<span id="login_username_message" style="color: red"></span>-->
                            <input type="text" class="form-control" name="username" placeholder="用户名/邮箱/昵称"  required="required" id="login_username">
                        </div>
                        <div class="form-group">
                            <label for="login_password" class="control-label">请输入密码：</label> <!-- <span id="login_password_message" style="color: red"></span>-->
                            <input type="password" class="form-control" name="password" placeholder="请输入密码"  required="required" id="login_password">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="text-align: center">
                <button class="btn" aria-hidden="true" form="loginform">登陆</button>
                <button aria-hidden="true" data-dismiss="modal" class="btn">关闭</button>
            </div>
        </div>
    </div>
</div>
<!-- 登陆Modal end-->

<div class="container">

    <div class="row row-offcanvas row-offcanvas-right active">

        <div class="col-xs-12 col-sm-9">

                <p class="pull-right visible-xs">
                    <button type="button" class="btn btn-success btn-xs" data-toggle="offcanvas">收起 / 打开侧边栏</button>
                </p>

            <!--最新笑话，动态，新闻的图片   start-->
            <div class="jumbotron" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['fun']->value['pic'];?>
);background-repeat:no-repeat;background-position: center">
                <h2 style="color: #002a80"><?php echo $_smarty_tpl->tpl_vars['fun']->value['title'];?>
</h2>
                <p style="color: #007700"><?php echo $_smarty_tpl->tpl_vars['fun']->value['content'];?>
</p>
            </div>
            <!--最新笑话，动态，新闻的图片   end-->

            <hr>
            <hr>
            <!--根据生日预测结婚  start-->
            <div class="row">
                <h1 style="color: #00cc00">从出生年月看你几岁结婚？准到你尖叫！！！</h1>
            </div>
            <div class="row">
                <span class="col-xs-4 col-lg-4" style="color: red;font-size: large">选择你的农历生日(00后略过哟):</span>
                <input type="date" class="col-xs-4 col-lg-4" placeholder="请输入阴历(农历)生日" id="jisuanbirthday">
                <span class="col-xs-4 col-lg-2">
                    <button class="btn btn-success" type="button" onclick="jisuanBirthday()">Go!</button>
                </span>
            </div>
            <div class="row">
                <div style="text-align: center" id="showbirthday">

                </div>
            </div>
            <!--根据生日预测结婚  end-->

            <hr>
            <hr>
            <?php if ($_smarty_tpl->tpl_vars['flag']->value==1) {?>
            <div class="row">
                <!--留言区域start-->
                <div class="col-xs-12 col-lg-12">
                    <div>
                    <span style="font-size:40px;font-weight:blod;color: green">留言给:</span>
                        <select id="friendid">
                            <?php  $_smarty_tpl->tpl_vars['friend'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['friend']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['friends']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['friend']->key => $_smarty_tpl->tpl_vars['friend']->value) {
$_smarty_tpl->tpl_vars['friend']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['friend']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['friend']->value['nickname'];?>
</option>
                            <?php } ?>
                        </select>
                    </div>
                    <textarea class="form-control" rows="3" id="message" style="text-align: left"></textarea>
                    <br>
                    <button class="btn btn-success" onclick="talk()">发表</button>
                </div>
                <!--留言区域end-->

        <!--        留言板 start
                <div class="col-xs-6 col-lg-4">
                    <h2>留言板</h2>
                    <div id="show_message" style=" height:400px; overflow:auto; text-align: left">
                        <?php  $_smarty_tpl->tpl_vars['me'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['me']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['message']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['me']->key => $_smarty_tpl->tpl_vars['me']->value) {
$_smarty_tpl->tpl_vars['me']->_loop = true;
?>
                                <span>
                                    在<span style="color: #7f0055">
                                     <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['me']->value['datetime'],"%Y-%m-%d %H:%M:%S");?>

                                    </span>
                                    <span style="color: #885500"><?php echo $_smarty_tpl->tpl_vars['me']->value['formNickName'];?>
</span>
                                    给<span style="color: #88ff44"><?php echo $_smarty_tpl->tpl_vars['me']->value['toNickName'];?>
</span>留言：
                                </span><br>
                        <?php if ($_smarty_tpl->tpl_vars['me']->value['datetime']%3==0) {?>
                        <span style="color: red;"><?php echo $_smarty_tpl->tpl_vars['me']->value['content'];?>
</span>
                        <?php } elseif ($_smarty_tpl->tpl_vars['me']->value['datetime']%2==0) {?>
                        <span style="color: green;"><?php echo $_smarty_tpl->tpl_vars['me']->value['content'];?>
</span>
                        <?php } else { ?>
                        <span style="color: blue;"><?php echo $_smarty_tpl->tpl_vars['me']->value['content'];?>
</span>

                        <?php }?>
                        <hr>
                        <?php } ?>
                    </div>
                </div>
                留言板 end-->
            </div>
            <?php }?>

        </div><!--/.col-xs-12.col-sm-9-->


        <div class="col-xs-6 col-sm-3 sidebar-offcanvas"  id="timezone">
            <div class="list-group">
                <?php if ($_smarty_tpl->tpl_vars['flag']->value==1&&($_smarty_tpl->tpl_vars['username']->value=='fangyue'||$_smarty_tpl->tpl_vars['username']->value=='lvqinyan')) {?>
                    <button class="btn btn-success" type="button">
                        时间轴： <span class="badge">0/6</span>
                    </button>
                    <!--<a href="#" class="list-group-item btn  disabled" target="_blank">08:00以前</a>-->
                    <a href="#" class="list-group-item btn  disabled"  target="_blank">08:00</a>
                    <a href="#" class="list-group-item btn disabled"  target="_blank">10:00</a>
                    <a href="#" class="list-group-item btn disabled"  target="_blank">12:00</a>
                    <a href="#" class="list-group-item btn disabled"  target="_blank">14:00</a>
                    <a href="#" class="list-group-item btn disabled"  target="_blank">16:00</a>
                    <a href="#" class="list-group-item btn disabled"  target="_blank">18:00以后</a>
                <?php } else { ?>
                    <button class="btn btn-success" type="button">
                       我的服务：
                    </button>
                    <a class="list-group-item btn btn-success" target="_blank" href="../test/web/aqiyi.php">爱奇艺</a>
                    <a class="list-group-item btn  disabled" target="_blank">IP地理位置信息</a>
                    <a class="list-group-item btn  disabled"  target="_blank">在线翻译</a>
                    <a class="list-group-item btn disabled"  target="_blank">在线二维码</a>
                <?php }?>
            </div>

            <?php if ($_smarty_tpl->tpl_vars['flag']->value==1) {?>
            <div class="row">
                <!--留言板 start-->
                <div class="col-xs-12 col-lg-12">
                    <h2 class="btn btn-success">留言板</h2>
                    <div id="show_message" style=" height:400px; overflow:auto; text-align: left">
                        <?php  $_smarty_tpl->tpl_vars['me'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['me']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['message']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['me']->key => $_smarty_tpl->tpl_vars['me']->value) {
$_smarty_tpl->tpl_vars['me']->_loop = true;
?>
                                <span>
                                    在<span style="color: #7f0055">
                                     <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['me']->value['datetime'],"%Y-%m-%d %H:%M:%S");?>

                                    </span>
                                    <span style="color: #885500"><?php echo $_smarty_tpl->tpl_vars['me']->value['formNickName'];?>
</span>
                                    给<span style="color: #88ff44"><?php echo $_smarty_tpl->tpl_vars['me']->value['toNickName'];?>
</span>留言：
                                </span><br>
                        <?php if ($_smarty_tpl->tpl_vars['me']->value['datetime']%3==0) {?>
                        <span style="color: red;"><?php echo $_smarty_tpl->tpl_vars['me']->value['content'];?>
</span>
                        <?php } elseif ($_smarty_tpl->tpl_vars['me']->value['datetime']%2==0) {?>
                        <span style="color: green;"><?php echo $_smarty_tpl->tpl_vars['me']->value['content'];?>
</span>
                        <?php } else { ?>
                        <span style="color: blue;"><?php echo $_smarty_tpl->tpl_vars['me']->value['content'];?>
</span>

                        <?php }?>
                        <hr>
                        <?php } ?>
                    </div>
                </div>
                <!--留言板 end-->
            </div>
            <?php }?>
        </div>

<!--        <?php if ($_smarty_tpl->tpl_vars['flag']->value==1) {?>
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas"  id="liulanzone">
            <div class="row">
                &lt;!&ndash;留言板 start&ndash;&gt;
                <div class="col-xs-10 col-lg-11">
                    <h2>留言板</h2>
                    <div id="show_message" style=" height:400px; overflow:auto; text-align: left">
                        <?php  $_smarty_tpl->tpl_vars['me'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['me']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['message']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['me']->key => $_smarty_tpl->tpl_vars['me']->value) {
$_smarty_tpl->tpl_vars['me']->_loop = true;
?>
                                <span>
                                    在<span style="color: #7f0055">
                                     <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['me']->value['datetime'],"%Y-%m-%d %H:%M:%S");?>

                                    </span>
                                    <span style="color: #885500"><?php echo $_smarty_tpl->tpl_vars['me']->value['formNickName'];?>
</span>
                                    给<span style="color: #88ff44"><?php echo $_smarty_tpl->tpl_vars['me']->value['toNickName'];?>
</span>留言：
                                </span><br>
                        <?php if ($_smarty_tpl->tpl_vars['me']->value['datetime']%3==0) {?>
                        <span style="color: red;"><?php echo $_smarty_tpl->tpl_vars['me']->value['content'];?>
</span>
                        <?php } elseif ($_smarty_tpl->tpl_vars['me']->value['datetime']%2==0) {?>
                        <span style="color: green;"><?php echo $_smarty_tpl->tpl_vars['me']->value['content'];?>
</span>
                        <?php } else { ?>
                        <span style="color: blue;"><?php echo $_smarty_tpl->tpl_vars['me']->value['content'];?>
</span>

                        <?php }?>
                        <hr>
                        <?php } ?>
                    </div>
                </div>
                &lt;!&ndash;留言板 end&ndash;&gt;
            </div>
        </div>
        <?php }?>-->



    </div><!--/row-->

    <hr>

<!--    <footer>
        <p>方月</p>
    </footer>-->

</div>


<!-- jQuery文件。务必在bootstrap.min.js 之前引入-->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


<script src="js/my.js"></script>

<script src="http://v3.bootcss.com/examples/offcanvas/offcanvas.js"></script>
<script src="http://v3.bootcss.com/assets/js/ie10-viewport-bug-workaround.js"></script>


<script>
    <?php if ($_smarty_tpl->tpl_vars['flag']->value==1&&($_smarty_tpl->tpl_vars['username']->value=='fangyue'||$_smarty_tpl->tpl_vars['username']->value=='lvqinyan')) {?>
    timezone1();
    <?php }?>
</script>
</body>
</html>

<?php }} ?>
