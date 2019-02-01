<link rel="stylesheet" href="/css/header.css">
<div class="header" id="vue-header-js">
    <div class="container">
        <div class="row">
            <a href="#" class="header__logo col-3">
                Steam story
            </a>
            <ul class="header__navigation col-8">
                <li>
                    <a href="#" @click="hide_account(),hide_statistic(),restore_main()">Главная</a>
                </li>
                <li>
                    <a href="#" @click="clear_main(),hide_account(),show_statistic()">Статистика</a>
                </li>
                <li>
                    <a href="#" @click="clear_main(),show_account(),hide_statistic()">Личный кабинет</a>
                </li>
                
            </ul>
            <?php   
                if(isset($_SESSION['steamid'])) {
                    require 'authentication/userInfo.php';
                    echo"<div class='steam__logout col-1'><img src='$fullavatar' alt=''><a href='authentication/logout.php'><i class='fas fa-sign-out-alt'></i></a></div>";
                }
                else{
                    loginButton();
                }
            ?>
        </div>
    </div>
</div>