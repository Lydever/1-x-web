<div class="container indextop">
    <h4>中国移动互联网教育品牌</h4>
    <ul class="nav nav-pills pull-right">
        <li>
        <a href="{{route('index')}}">IT网在线学校</a>
        </li>
        <li>
            <a href="">联系我们</a>
        </li>
        <li>
            <a href="">加入收藏</a>
        </li>
        <li>
            <a href=""><img src="img/qq.png" /></a>
        </li>
        <li>
            <a href=""><img src="img/wechat.png" /></a>
        </li>
        <li>
            <a href=""><img src="img/weibo.png" /></a>
        </li>
        <li>400-025-8883</li>
    </ul>
</div>
<!--导航条组件-->
<nav class="navbar navbar-default" role="navigation" >
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarcollapse1">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
            <a class="navbar-brand" href="{{route('index')}}" style="margin:0;padding:0">
                <img src="img/news_logo.png" alt="" style="height:50px;width:auto;" />
            </a>
        </div>
        <!--收缩框开始-->
        <div class="collapse navbar-collapse" id="navbarcollapse1">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{route('index')}}">首页</a>
                </li>
                <li>
                    <a href="{{route('info')}}">资讯</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">课程系统 <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="#">web前端</a>
                        </li>
                        <li>
                            <a href="#">室内设计</a>
                        </li>
                        <li>
                            <a href="#">室外设计</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">工业设计</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">平面设计</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <form class="navbar-form navbar-left" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="找课程">
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-primary">提交</button>
                    </div>
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{route('login')}}" id="login">登录</a>
                </li>
                <li>
                    <a href="{{route('login')}}" id="register">注册</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">关注我们 <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="#" id="yonganli" data-toggle="popover" data-placement="auto left" data-trigger="hover" title="联系电话" data-content="张老师：12345678965">永安里校区</a>
                        </li>
                        <li>
                            <a href="#">国贸校区</a>
                        </li>
                        <li>
                            <a href="#">中关村校区</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!--收缩框结束-->
    </div>
</nav>
<!--导航条结束-->