<nav class="navbar navbar-static-top">
    <div class="container-fluid m-0">
        <a class="navbar-brand float-left text-center" href="index.html">
            <h4 class="text-white"><img src="/img/logow.png" class="admin_img" alt="logo"> {{ strtoupper(config('app.name')) }}</h4>
        </a>
        <div class="menu">
            <span class="toggle-left" id="menu-toggle">
                <i class="fa fa-bars text-white"></i>
            </span>
        </div>
        <div class="topnav dropdown-menu-right float-right">
            <div class="btn-group">
                <div class="notifications no-bg">
                    <a class="btn btn-default btn-sm messages" data-toggle="dropdown"> <i class="fa fa-envelope fa-1x text-white"></i>
                        <!--<span class="bg-warning message_tags">4</span>-->
                        <span class="badge badge-warning">8</span>
                    </a>
                    <div class="dropdown-menu drop_box_align" role="menu" id="messages_dropdown">
                        <div class="popover-title">You have 8 Messages</div>
                        <div class="popover-footer">
                            <a href="mail_inbox.html">Inbox</a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="btn-group">
                <div class="notifications messages no-bg">
                    <a class="btn btn-default btn-sm" data-toggle="dropdown"> <i class="fa fa-bell text-white"></i>
                        <!--<span class="bg-danger notification_tags">4</span>-->
                        <span class="badge badge-danger">9</span>
                    </a>
                    <div class="dropdown-menu drop_box_align" role="menu">
                        <div class="popover-title">You have 9 Notifications</div>
                        <div class="popover-footer">
                            <a href="#">View All</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn-group">
                <a class="btn btn-default btn-sm messages toggle-right">
                    &nbsp;
                    <i class="fa fa-cog text-white"></i>
                    &nbsp;
                </a>
            </div>
            <div class="btn-group">
                <div class="user-settings no-bg">
                    <button type="button" class="btn btn-default no-bg micheal_btn" data-toggle="dropdown">
                        <strong>Admin</strong>
                        <span class="fa fa-sort-down white_bg"></span>
                    </button>
                    <div class="dropdown-menu admire_admin">
                        <a class="dropdown-item title" href="#">
                            {{ config('app.name') }}</a>
                        <a class="dropdown-item" href="edit_user.html"><i class="fa fa-cogs"></i>
                            Account Settings</a>
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-user"></i>
                            User Status
                        </a>
                        <a class="dropdown-item" href="mail_inbox.html"><i class="fa fa-envelope"></i>
                            Inbox</a>

                        <a class="dropdown-item" href="lockscreen.html"><i class="fa fa-lock"></i>
                            Lock Screen</a>
                        <a class="dropdown-item" href="login.html"><i class="fa fa-sign-out"></i>
                            Log Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>