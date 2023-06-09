<?php
/**
 * Block Name: Carrousel cuadros
 *
 */

// id unico para el bloque
$id = 'botones-' . $block['id'];

$titulo = get_field('titulo');

?>

<div class="cuadros-carrousel pad btm">
    <h1 class="sec"><?php echo $titulo; ?></h1>
    <nav class="hori_scroll">
        <div class="prev"></div>
        <div class="next"></div>
    </nav>

    <ul class="cuadros">
        <?php if(have_rows('listado_cuadros')): while(have_rows('listado_cuadros')): the_row(); ?>
        <?php
            $imagen = get_sub_field('imagen');
        ?>
            <li class="cuadro">
                <a href="<?php echo get_sub_field('enlace') ?>">
                    <div class="img" style="background-image:url('<?php echo $imagen['sizes']['large'] ?>')"></div>
                    <h2 class="name"><?php the_sub_field('nombre') ?></h2>
                    <div class="txt"><?php the_sub_field('texto') ?></div>
                </a>
            </li>
        <?php endwhile; endif; ?>
    </ul>
</div>