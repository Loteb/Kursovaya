<?php
require 'authentication/userInfo.php';
?>
<script src="/js/swiper.js"></script>
<link rel="stylesheet" href="/css/main_content.css">
<div class="main" id="vue-main-js">
  <div class="swiper-container">
    <div class="swiper-wrapper">
      <div class="swiper-slide"><img src="/img/slide1.png" alt=""></div>
      <div class="swiper-slide"><img src="/img/slide2.png" alt=""></div>
      <div class="swiper-slide"><img src="/img/slide3.png" alt=""></div>
    </div>
    <div class="swiper-pagination"></div>
  </div>
  <div class="steam_option">
    <div class="container">
      <div class="row">
        <span class="check">
          Взгляни на свою игровую статистику по новому!
        </span>
        <div class="main__content col-4">
          <a href="#">
            <img src="/img/grow.png" alt="">
          </a>
        </div>
        <div class="main__content col-4">
          <a href="#">
            <img src="/img/control.png" alt="">
          </a>
        </div>
        <div class="main__content col-4">
          <a href="#">
            <img src="/img/friend.png" alt="">
          </a>
        </div>
      </div>
    </div>
  </div>
  <script>
    var swiper = new Swiper('.swiper-container', {
      spaceBetween: 30,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
    });
  </script>
  <div class="info">
    <div class="container">
      <div class="row">
        <div class="info__logo col-6">
          <a href="#">
            <img src="/img/steamstory.png" alt="">
          </a>
        </div>
        <span class="info__text col-6">
          Steam story - это место, где миллионы игроков получают подробную статистику, делятся играми, профилями, и
          лучше
          понимают игры, которые мы все любим. Мы превращаем необработанные статистические данные миллиардов открытых
          матчей в полезную информацию, которую Вы можете изучать и улучшать.
        </span>
        <div class="info__follow col-12">
          <a href="#">
            <span>Начать отслеживать статистику</span>
            <img src="/img/follow.png" alt="">
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="account">
    <div class="container">
      <div class="row">
        <?php
        echo"
        <div class='col-lg-6 account__name'>
          <h1>
            Никнейм:  $name 
          </h1>
        </div>
        <div class='col-lg-6 account__avatar'>
          <img src=' $avatarfull '>
        </div>
        <span class='col-lg-12 account__id'>
          ID:  $id
        </span>
        <span class='col-lg-12 account__visibitily'>
        ";
        if($visible==1){
          $visible="Закрытый";
        }
        else if($visible==2){
          $visible="Закрытый";
        }
        else{
          $visible="Открытый";
        }
        echo"
          Аккаунт:  $visible
        </span>
        <span class='col-lg-12 account__state'>
        ";
        switch ($state) {
          case '0':
            $state="Сейчас не в сети";
            break;
          case '1':
            $state="Онлайн";
            break;
          case '2':
            $state="Занят";
            break;
          case '3':
            $state="Нет на месте";
            break;
          case '4':
            $state="Спит";
            break;
          case '5':
            $state="Обмениватся с кем-то";
            break;
          case '6':
            $state="Собирается играть";
            break;
          default:
            $state="Профиль приватный,не удалось получить данные";
            break;
        };
        echo"  
        Статус игрока: $state
         </span>
         <span class='col-lg-12 account__url'>
          Ссылка на профиль: <a href=' $url'target='_blank'>$url</a>
        </span>
        ";
        if($currentGame){
          echo"
          <span class='col-lg-12 account__currentGame'>
            В данный момент пользователь играет в:  $currentGame
          </span>
          <span class='col-lg-12 account__currentServer'>
          ";
          if(!$currentServer){
            $currentServer="Позльзователь не играет на онлайн сервере";
            echo"$currentServer
            </span>";
            
          }
          else{
            echo"
            Адресс сервера:  $currentServer
            </span>
          ";
          }
      }
        else{
          echo"
          <span class='col-lg-12 account__currentGame'>
            В данный момент пользователь не играет в игры
          </span>
          ";
        }
        echo"
        <span class='col-lg-12 account__realname'>
          Имя пользователя:  $realname
        </span>
        <span class='col-lg-12 account__logoff'>
          Последний раз был в сети:  $logoff
        </span>
        <span class='col-lg-12 account__gamecount'>
          Количество игр на аккаунте:  $gamecount
        </span>
        ";
        ?>
      </div>
    </div>
  </div>
  <div class="statistic">
    <div class="container">
      <div class="row">
        <?php
        for($i = 0; $i < $length; $i++){
          $gIMG = $games[$i]['img_logo_url'];
          $g4EVER = round($games[$i]['playtime_forever']/59.99653078924545,0,PHP_ROUND_HALF_DOWN);
          $gNAME = $games[$i]['name'];
          $gID = $games[$i]['appid'];
          if($gIMG!='http://media.steampowered.com/steamcommunity/public/images/apps/205790/.jpg'){
            echo"<div class='col-lg-4'>
            <img src='http://media.steampowered.com/steamcommunity/public/images/apps/".$gID."/".$gIMG.".jpg' alt = 'error' class='col-lg-12'>
            <span class='col-lg-12'>
              Название игры: $gNAME
            </span>
            <span class='col-lg-12'>
              ID игры: $gID
            </span>
            <span class='col-lg-12'>
              Часов сыгранно: $g4EVER
            </span>
          </div>";
          }
        }
      ?>  
      </div>
    </div>
  </div>
  <script src='/js/vue_elem.js'></script>
</div>