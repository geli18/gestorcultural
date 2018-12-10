<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

/* @var $this \yii\web\View */
/* @var $content string */

$this->beginContent('@frontend/views/layouts/_clear.php')
?>

 	 <div class="probootstrap-search" id="probootstrap-search">
      <a href="#" class="probootstrap-close js-probootstrap-close"><i class="icon-cross"></i></a>
      <form action="#">
        <input type="search" name="s" id="search" placeholder="Search a keyword and hit enter...">
      </form>
    </div>
    
    <div class="probootstrap-page-wrapper">
    
     <div class="probootstrap-header-top">
        <div class="container">
          <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-9 probootstrap-top-quick-contact-info">
              <span><i class="icon-location2"></i>Av. 5 de Mayo & Av Hidalgo, Centro, 90300 Apizaco, Tlax.</span>
              <span><i class="icon-phone2"></i>+1-123-456-7890</span>
              <span><i class="icon-mail"></i>info@lalibertad.com</span>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 probootstrap-top-social">
              <ul>
                <li><a href="#"><i class="icon-twitter"></i></a></li>
                <li><a href="#"><i class="icon-facebook2"></i></a></li>
                <li><a href="#"><i class="icon-instagram2"></i></a></li>
                <li><a href="#"><i class="icon-youtube"></i></a></li>
                <li><a href="#" class="probootstrap-search-icon js-probootstrap-search"><i class="icon-search"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <nav class="navbar navbar-default probootstrap-navbar">
        <div class="container">
          <div class="navbar-header">
            <div class="btn-more js-btn-more visible-xs">
              <a href="#"><i class="icon-dots-three-vertical "></i></a>
            </div>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html" title="Centro cyltural de Apizaco">Centro cultural de Apizaco</a>
          </div>

          <div id="navbar-collapse" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="/site/index">Home</a></li>
              <li><a href="/site/talleres">Talleres</a></li>
              <li><a href="/site/profesores">Profesores</a></li>
              <li><a href="/site/eventos">Eventos</a></li>
             <!-- <li class="dropdown">
                 <a href="#" data-toggle="dropdown" class="dropdown-toggle">Paginas</a>
                <ul class="dropdown-menu">
                  <li><a href="about.html">Nosotros</a></li>
                  <li><a href="courses.html">Talleres</a></li>
                  <li><a href="course-single.html">Cursos</a></li>
                  <li><a href="gallery.html">Gelería</a></li>
             
                  <li><a href="news.html">Noticias</a></li>
                </ul>
              </li> -->
              <li><a href="/site/contact">Contacto</a></li>
              <?php if(Yii::$app->user->isGuest): ?>
              <li><a href="/user/sign-in/signup">Registrarse</a></li>
              <li><a href="/user/sign-in/login">Login</a></li>
              
              <?php else:?>
              	 <li class="dropdown">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle"><?=Yii::$app->user->identity->getPublicIdentity() ?></a>
                <ul class="dropdown-menu">
                  <li><a href="/user/default/index"><?=Yii::t('frontend', 'Settings')?></a></li>
                   <?php if(Yii::$app->user->can('manager')): ?>
                  <li><a href="<?php echo Yii::getAlias('@backendUrl')?>"><?=Yii::t('frontend', 'Backend')?></a></li>
                  <?php endif;?>
                  <li><a href="/user/sign-in/logout" data-method="post"><?= Yii::t('frontend', 'Logout')?></a></li>
                </ul>
              </li>
              
              <?php endif; ?>
              
              
              <li class="dropdown">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle"><?= Yii::t('frontend', 'Language') ?></a>
                <ul class="dropdown-menu">
                
                <?php 
                 $lenguajes = array_map(function ($code) {
                    return [
                        'label' => Yii::$app->params['availableLocales'][$code],
                        'url' => ['/site/set-locale', 'locale'=>$code],
                        'active' => Yii::$app->language === $code
                    ];
                }, array_keys(Yii::$app->params['availableLocales']));
                 
                 
                     foreach ($lenguajes as $key=>$value):
                ?>
                  <li><a href="<?=$value['url'][0]?>?locale=<?=$value['url']['locale']?>"><?=$value['label']?></a></li>
                  
                  <?php endforeach;?>
                
                </ul>
              </li>
              
            </ul>
          </div>
        </div>
      </nav>
    

<?php echo $content ?>


  <footer class="probootstrap-footer probootstrap-bg">
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <div class="probootstrap-footer-widget">
                <h3>About The School</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro provident suscipit natus a cupiditate ab minus illum quaerat maxime inventore Ea consequatur consectetur hic provident dolor ab aliquam eveniet alias</p>
                <h3>Social</h3>
                <ul class="probootstrap-footer-social">
                  <li><a href="#"><i class="icon-twitter"></i></a></li>
                  <li><a href="#"><i class="icon-facebook"></i></a></li>
                  <li><a href="#"><i class="icon-github"></i></a></li>
                  <li><a href="#"><i class="icon-dribbble"></i></a></li>
                  <li><a href="#"><i class="icon-linkedin"></i></a></li>
                  <li><a href="#"><i class="icon-youtube"></i></a></li>
                </ul>
              </div>
            </div>
            <div class="col-md-3 col-md-push-1">
              <div class="probootstrap-footer-widget">
                <h3>Links</h3>
                <ul>
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Courses</a></li>
                  <li><a href="#">Teachers</a></li>
                  <li><a href="#">News</a></li>
                  <li><a href="#">Contact</a></li>
                </ul>
              </div>
            </div>
            <div class="col-md-4">
              <div class="probootstrap-footer-widget">
                <h3>Contact Info</h3>
                <ul class="probootstrap-contact-info">
                  <li><i class="icon-location2"></i> <span>198 West 21th Street, Suite 721 New York NY 10016</span></li>
                  <li><i class="icon-mail"></i><span>info@domain.com</span></li>
                  <li><i class="icon-phone2"></i><span>+123 456 7890</span></li>
                </ul>
              </div>
            </div>
           
          </div>
          <!-- END row -->
          
        </div>

        <div class="probootstrap-copyright">
          <div class="container">
            <div class="row">
              <div class="col-md-8 text-left">
                <p>&copy; 2017 <a href="https://probootstrap.com/">ProBootstrap:Enlight</a>. All Rights Reserved. Designed &amp; Developed with <i class="icon icon-heart"></i> by <a href="https://probootstrap.com/">ProBootstrap.com</a></p>
              </div>
              <div class="col-md-4 probootstrap-back-to-top">
                <p><a href="#" class="js-backtotop">Back to top <i class="icon-arrow-long-up"></i></a></p>
              </div>
            </div>
          </div>
        </div>
      </footer>

    </div>

<?php $this->endContent() ?>