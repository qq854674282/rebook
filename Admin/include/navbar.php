    <div class="navbar">
        <div class="navbar-inner">
                <ul class="nav pull-right">
                    
                    <li id="fat-menu" class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i><?php if($_COOKIE['admin_type']==1) echo "超级管理员";else echo "普通管理员"?>
                            <i class="icon-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="reset_password.php">修改密码</a></li>
                            <li class="divider"></li>
                            <li class="divider visible-phone"></li>
                            <li><a tabindex="-1" href="logout.php">退出</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <a class="brand" href="index.php"><span class="first">Re</span> <span class="second">Book</span></a>
        </div>
    </div>
