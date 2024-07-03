<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content=<?php bloginfo('description'); ?>>
  <title><?php echo esc_html(wp_get_document_title()); ?></title>
  <link rel="shortcut icon" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/favicon.ico" />
  <script src="https://kit.fontawesome.com/cafd1deda7.js" crossorigin="anonymous"></script>
  <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>
  <div class="container">
    <header class="header">
<p>gitdiff</p>
      <!-- ここからモバイルメニュー -->
      <div class="mobile-menu__btn">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <!-- mobile-menu__btn -->
      <div class="mobile-menu fullwidth">
        <!-- モバイル用検索 -->
        <form class="search-form-mobile" role="search" method="get" action="<?php echo esc_url(home_url()); ?>">
          <div class="search-box">
            <input type="text" name="s" class="search-input" placeholder="検索" />
          </div>
        </form>
        <div class="mobile-menu__inner">
          <nav class="header-nav-mobile">
            <?php
            wp_nav_menu([
              'theme_location' => 'place_header',
              'container' => false,
              'menu_class' => 'header-nav-mobile'
            ]);
            ?>
          </nav>
        </div>
        <!-- mobile-menu__inner -->
      </div>
      <!-- mobile-menu -->

      <!-- ここからPCヘッダーインナー -->
      <div class="header__inner flex inner-width">
        <figure class="header__logo">
          <a href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/header/logo.png" alt="code-crew">
          </a>
        </figure>
        <nav class="header-nav flex">
          <?php
          wp_nav_menu([
            'theme_location' => 'place_header',
            'container' => false,
            'menu_class' => 'header-menu flex'
          ]);
          ?>
          <div class="search-icon">
            <i class="fa-solid fa-magnifying-glass"></i>
          </div>
          <!-- 検索 -->
          <form class="search-form" role="search" method="get" action="<?php echo esc_url(home_url()); ?>">
            <div class="search-box">
              <input type="text" name="s" class="search-input" placeholder="検索" />
            </div>
            <!-- search-box -->
          </form>
        </nav>
      </div>
      <!-- header__inner -->
      <!-- パンクズ -->

      <!-- bread_crumb -->
    </header>

    <!-- ここからFV -->

    <!-- ホームページ -->
    <?php if (is_home() || is_front_page()) : ?>
      <section class="fv fullwidth">
        <div class="fv__inner">
          <div class="fv__tagline">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php echo the_content(); ?>
          </div>
          <div class="fv__logo">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/fv/fv-logo.png" alt="code-crew-logo">
          </div>
          <div class="fv__text">
            <img class="fullwidth" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/fv/fv-logo-text.png" alt="code-crew">
          </div>
        </div>
      </section>
    <?php endwhile; ?>
  <?php endif; ?>

  <!-- archiveページ -->
<?php elseif (is_post_type_archive()) : ?>
  <?php get_template_part('header-common'); ?>
  <div class="fv__text">
    <h2 class="section__title"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></h2>
  </div>
  </div>
  </section>

  <!-- カテゴリーページ -->
<?php elseif (is_category()) : ?>
  <?php get_template_part('header-common'); ?>
  <div class="fv__text">
    <?php
      $cat = get_the_category();
      $catname = $cat[0]->cat_name;
    ?>
    <h2 class="section__title"><?php echo $catname; ?>一覧</h2>
  </div>
  </div>
  </section>

<?php else : ?>
  <?php get_template_part('header-common'); ?>
  <div class="fv__text">
    <h2 class="section__title"><?php the_title(); ?></h2>
  </div>
  </div>
  </section>
<?php endif; ?>
