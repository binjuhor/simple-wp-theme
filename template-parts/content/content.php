<article>
    <?php if (has_post_thumbnail()) { ?>
    <figure>
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail(); ?>
        </a>
    </figure>
    <?php } ?>
    <div>
        <time datetime="<?php echo get_the_date('Y-m-y'); ?>"><?php echo get_the_date('Y.m.d'); ?></time>
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <?php the_excerpt(); ?>
    </div>
</article>
