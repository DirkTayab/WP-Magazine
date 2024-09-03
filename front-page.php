<?php get_header() ?>

<!-- Banner -->
<section class="mb-10 hero">
        <div class="container">
          <div class="title-wrapper">
            <h1 class=""><?php the_field('title') ?></h1>
          </div>
          <div
            class="p-1 overflow-hidden md:pl-0 md:p-3 bg-dark text-light marquee-home"
          >
            <p
              class="relative mb-0 uppercase font-generalSemiBold whitespace-nowrap"
            >
              <small class="absolute left-0 z-40 px-5 bg-dark"
                >News Ticker ++</small
              >
              <span class="inline-block marquee">
                <?php  ?>
                <span class="inline-block ml-5 font-generalRegular">
                  <?php echo get_field('ticker-1') ?></span
                >
                <span class="inline-block ml-5 font-generalRegular">
                  <?php echo get_field('ticker-2') ?></span
                >
                <span class="inline-block ml-5 font-generalRegular">
                  <?php echo get_field('ticker-3') ?></span
                >
              </span>
            </p>
          </div>
        </div>
</section>

<!-- 2 -->
<?php $latest = new WP_Query(array(
    'post_type' => 'magazines',
    'posts_per_page' => 1,
))?>
<?php if($latest->have_posts()) : while($latest->have_posts()) : $latest->the_post() ?>
<section class="mb-10 feature-story">
        <div class="container">
          <article class="grid gap-4 py-5 md:grid-cols-2">
            <h2 class="uppercase" id="feature-header"><?php the_title()?></h2>
            <div class="flex flex-col">
              <p class="mb-5 grow" id="feature-content">
                <?php echo get_field('excerpt')?>
              </p>

              <div class="details" id="feature-details">
                <ul class="">
                  <li><span>Author:</span> <?php echo get_field('author')?></li>
                  <li><span>Date:</span> <?php echo get_the_date('j, F Y')?></li>
                  <li><span>Duration:</span> <?php echo get_field('duration') ?></li>
                </ul>
                <a href="#" class="category" id="feature-category"><?php echo get_the_terms($post->ID, 'categories')[0]->name  ?></a>
              </div>
            </div>
          </article>
          <div class="img-wrap">
            <img
              src="<?php echo get_field('thumbnail') ?>"
              alt=""
              class="w-full"
              id="feature-img"
            />
          </div>
        </div>
</section>
<?php endwhile;
    else:
        echo "No More Post";
    endif;
    wp_reset_postdata();
?>

<!-- Article -->
<section class="py-10 mb-10 articles">
        <div class="container">
          <div class="grid md:grid-cols-[1fr_300px] md:gap-20">
            <div class="article-wrapper">
              <div>
                <?php $magazine = new WP_Query(array(
                    'post_type' => 'magazines',
                    'posts_per_page' => 6,
                    'offset' => 1
                ))?>
                <?php if($magazine->have_posts()) : while($magazine->have_posts()) : $magazine->the_post() ?>
                <article
                  class="grid md:grid-cols-[240px_1fr] gap-12 pb-10 mb-10 border-b border-dark">
                  <div class="img-wrap">
                    <img
                      src="<?php echo get_field('thumbnail')?>"
                      alt=""
                      class="w-full h-[240px] object-cover"
                    />
                  </div>
                  <div class="flex flex-col article-content">
                    <div class="grow">
                      <a href="articles-single.html" class="nav-linkitem">
                        <h3 class="article-header"><?php the_title() ?></h3>
                      </a>
                      <p class="mb-5">
                        <?php echo get_field('excerpt')?>
                      </p>
                    </div>

                    <div class="details">
                      <ul>
                        <li><span>Author:</span> <?php echo get_field('author')?></li>
                        <li><span>Date:</span> <?php echo get_the_date('j, F Y')?></li>
                        <li><span>Duration:</span> <?php echo get_field('duration') ?></li>
                      </ul>
                      <a href="#" class="category"><?php echo get_the_terms($post->ID, 'categories')[0]->name  ?></a>
                    </div>
                  </div>
                </article>
                <?php endwhile;
                    else:
                        echo "No More Post";
                    endif;
                    wp_reset_postdata();
                ?>
              </div>
              <a href="#" class="link-arrow"
                >All Articles
                <svg class="icon-sm" role="image">
                  <use xlink:href="./img/sprite.svg#icon-arrow-right"></use>
                </svg>
              </a>
            </div>
            <aside class="sticky top-0 self-start">
              <h4 class="mb-5">Most Popular</h4>
              <div class="popular-wrapper">
                <?php $aside = new WP_Query(array(
                    'post_type' => 'magazines',
                    'posts_per_page' => 4,
                ))
                
                ?>
                <?php $counter = 1; if($aside->have_posts()) : while($aside->have_posts()) : $aside->the_post() ?>
                <div class="flex gap-5 pb-5 mb-5 border-b border-dark">
                  <p class="text-lg font-generalSemiBold">0<?php echo $counter++?></p>
                  <div>
                    <h5 class="text-lg font-generalSemiBold">
                      <?php the_title() ?>
                    </h5>
                    <small
                      ><span class="pr-3 font-generalMedium">Author:</span>
                      <?php echo get_field('author')?></small
                    >
                  </div>
                </div>
                <?php endwhile;
                    else:
                        echo "No More Post";
                    endif;
                    wp_reset_postdata();
                ?>
              </div>

              <div class="p-4 newsletter">
                <h5 class="uppercase font-generalSemiBold">newsletter</h5>
                <h4>Design News to your inbox</h4>
                <form action="" class="mt-5">
                  <input
                    type="text"
                    placeholder="Email"
                    class="mb-3 text-red-300 border border-gray-100"
                  />
                  <button
                    class="px-4 py-2 text-xs uppercase text-light bg-dark"
                  >
                    Sign Up
                  </button>
                </form>
              </div>
            </aside>
          </div>
        </div>
</section>
<?php get_footer() ?>