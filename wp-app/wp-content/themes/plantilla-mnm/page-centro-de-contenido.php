<?php get_header(); ?>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	

    <?php
        $contenidoID = get_query_var('contenido');
        $proyectoID = get_query_var('proyecto');

        if($contenidoID !=  ''):
    ?>

    <?php
        $url = "http://cc.museodememoria.gov.co/wp-json/wp/v2/posts/" . $contenidoID;

        $resultado = requestJSON($url);

        $args = array( 'posts_per_page' => 4, 'category' => 'informativa' );

        $noticias = get_posts($args);
        
    ?>

    <div id="cc-contenido-top">
        <div class="left">
            <div class="titulo"><?php echo $resultado['titulo'] ?></div>
            <div class="tipo"><?php echo $resultado['tipo-de-contenido'][0]['name'] ?></div>

            <div class="descripcion">
                <div class="top">Descripción:</div>
                <div class="inside"><?php echo $resultado['descripcion'] ?></div>
            </div>
        </div>
        <div class="right">
            <?php
                if($resultado['tipo-de-contenido'][0]['name'] == 'Sonoro'):
            ?>
            <div class="player">
                    <audio id="audio-cc" src="<?php echo $resultado['archivo']['archivo']['url'] ?>"></audio>
                    <div class="slider_player">
                        <div class="current"></div>
                    </div>
                    <div class="btn-play">Reproducir</div>
            </div>
            <?php elseif($resultado['tipo-de-contenido'][0]['name'] == 'Audiovisual'): ?>
                <div class="player">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $resultado['enlace'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            <?php elseif($resultado['tipo-de-contenido'][0]['name'] == 'Publicación'): ?>
                <div class="player">
                    <a href="<?php echo $resultado['archivo']['archivo']['url'] ?>" class="btn-play publicacion">Descargar publicación</a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="tarjetas galeria noticias btm">
        <div class="inside">
            <?php foreach($noticias as $noticia): ?>

            <?php
                $imagen = get_the_post_thumbnail_url($noticia->ID)
            ?>

            <a href="<?php echo get_permalink($noticia->ID) ?>" class="item">

                <div class="img" style="background-image:url('<?php echo $imagen ?>')"></div>

                <div class="tarjeta-description">
                    <h3><?php echo $noticia->post_title ?></h3>
                </div>
            </a>

            <?php endforeach; ?>
        </div>
    </div>
    <!-- <div id="cc-acordeon">
        <div class="top">
            Detalles básicos
        </div>
        <div class="inside">
            <div class="col">
                <?php darDetalles('Titulo', $result['titulo']) ?>
                <?php darDetalles('Tipo de archivo o contenido', $result['tipo-de-contenido'][0]['name']) ?>
                <?php darDetalles('Fecha', $result['fecha']) ?>
                <?php darDetalles('País', $result['pais'][0]['name']) ?>
                <?php darDetalles('Departamento', $result['departamento'][0]['name']) ?>
            </div>
        </div>
    </div> -->

    <?php elseif($proyectoID != ''): ?>

    <?php
        $url = "http://cc.museodememoria.gov.co/wp-json/wp/v2/proyecto/" . $proyectoID;
        $resultado_detalles = requestJSON($url);

        $url = "http://cc.museodememoria.gov.co/wp-json/wp/v2/posts/?per_page=20&proyecto=" . $proyectoID;
        $resultado_contenido= requestJSON($url);
    ?>

    <div id="cc-contenido-top">
        <div class="left">
            <div class="titulo"><?php echo $resultado_detalles['name'] ?></div>
            <div class="tipo"><?php echo $resultado_detalles['count'] ?> contenidos indexados</div>

            <div class="descripcion">
                <div class="top">Descripción:</div>
                <div class="inside"><?php echo $resultado_detalles['descripcion'] ?></div>
            </div>
        </div>
    </div>

    <div class="titulo-modulo halfbtm">
        <h2 class="sec">Contenido</h2>
        <!-- <div class="subtitulo-sec">Nuestros destacados en el marco del tema del mes: Desplazamiento forzado</div> -->
    </div>

    <div class="cc-contenido-thumbs">

        <div class="inside">
            
            <?php
                $icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path d="M96.74,47.1C96,45.77,78.1,14.37,50,14.37c-28.24,0-46,31.41-46.76,32.74a6,6,0,0,0,0,5.79C4,54.24,21.91,85.63,50,85.63c27.94,0,46-31.38,46.73-32.71A6,6,0,0,0,96.74,47.1ZM50,73.78C33.16,73.78,20.09,56.93,15.45,50,20.07,43.08,33.06,26.26,50,26.26S79.91,43.09,84.55,50C79.9,56.94,66.85,73.78,50,73.78Z"/><circle cx="50.01" cy="50" r="11.88"/></svg>';
                darItemThumb($icon, 'audiovisual');

                $icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path d="M72.85,88.35a8.81,8.81,0,0,1-3.47-.69,15.92,15.92,0,0,1-7.82-10.88A26.9,26.9,0,0,0,50.64,63.07,34.79,34.79,0,0,1,40,51.5a28.69,28.69,0,0,1-3.74-13.44,22.86,22.86,0,0,1,45.71,0h9.14a31.62,31.62,0,0,0-31.26-32c-.25,0-.49,0-.74,0a31.63,31.63,0,0,0-32,31.26v.73A37.93,37.93,0,0,0,32,55.89a43.65,43.65,0,0,0,13,14.4,18.41,18.41,0,0,1,7.82,9.37A24.88,24.88,0,0,0,65.36,95.89,18.29,18.29,0,0,0,91.14,79.2H82A9.18,9.18,0,0,1,72.85,88.35Z"/><path  d="M30.07,9,23.58,2.5a50.32,50.32,0,0,0,0,71.13L30,67.18A41.17,41.17,0,0,1,30.07,9Z"/><circle cx="59.14" cy="38.06" r="11.43"/></svg>';
                darItemThumb($icon, 'sonoro');

                $icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path class="b0f20949-7040-402c-a1ca-b2c5bba52598" d="M75.15,38.82H2.5V50h74a11.18,11.18,0,1,1,0,22.35H64V61.18L47.21,77.94,64,94.71V83.53H75.15a22.36,22.36,0,0,0,0-44.71Z"/><rect x="2.5" y="5.29" width="89.41" height="11.18"/><rect x="2.5" y="72.35" width="33.53" height="11.18"/></svg>';
                darItemThumb($icon, 'publicacion');

                $icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path d="M35.3,39.78V22.86a11.31,11.31,0,0,1,22.61,0V39.78a20.37,20.37,0,1,0-22.61,0Z"/><path d="M79.81,60.73,59.27,50.5a6.57,6.57,0,0,0-2.44-.5H53.39V22.86a6.79,6.79,0,0,0-13.57,0V71.45L24.31,68.19a8.13,8.13,0,0,0-1.09-.14,5,5,0,0,0-3.57,1.5l-3.58,3.61L38.42,95.51a6.77,6.77,0,0,0,4.79,2H73.93a6.58,6.58,0,0,0,6.51-5.79l3.39-23.84A6.49,6.49,0,0,0,79.81,60.73Z"/></svg>';
                darItemThumb($icon, 'iteractivo');
            ?>


            <?php
                foreach($resultado_contenido as $result):
            ?>
            <a href="/centro-de-contenido/?contenido=<?php echo $result['id']?>" class="item">
                <div class="thumb">
                    <?php $tipo = $result['tipo-de-contenido'][0]['name']; ?>
                    <?php if($tipo == 'Sonoro'): ?>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path d="M72.85,88.35a8.81,8.81,0,0,1-3.47-.69,15.92,15.92,0,0,1-7.82-10.88A26.9,26.9,0,0,0,50.64,63.07,34.79,34.79,0,0,1,40,51.5a28.69,28.69,0,0,1-3.74-13.44,22.86,22.86,0,0,1,45.71,0h9.14a31.62,31.62,0,0,0-31.26-32c-.25,0-.49,0-.74,0a31.63,31.63,0,0,0-32,31.26v.73A37.93,37.93,0,0,0,32,55.89a43.65,43.65,0,0,0,13,14.4,18.41,18.41,0,0,1,7.82,9.37A24.88,24.88,0,0,0,65.36,95.89,18.29,18.29,0,0,0,91.14,79.2H82A9.18,9.18,0,0,1,72.85,88.35Z"/><path  d="M30.07,9,23.58,2.5a50.32,50.32,0,0,0,0,71.13L30,67.18A41.17,41.17,0,0,1,30.07,9Z"/><circle cx="59.14" cy="38.06" r="11.43"/></svg>
                    <?php elseif($tipo == 'Publicación'): ?>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path class="b0f20949-7040-402c-a1ca-b2c5bba52598" d="M75.15,38.82H2.5V50h74a11.18,11.18,0,1,1,0,22.35H64V61.18L47.21,77.94,64,94.71V83.53H75.15a22.36,22.36,0,0,0,0-44.71Z"/><rect x="2.5" y="5.29" width="89.41" height="11.18"/><rect x="2.5" y="72.35" width="33.53" height="11.18"/></svg>
                    <?php endif; ?> 
                </div>
                <div class="details">
                    <div class="name"><?php echo $result['titulo'] ?></div>
                </div>
            </a>
            <?php
                endforeach;
            ?>
        </div>

        <?php if(count($resultado_contenido = 20)): ?>
            <a href="<?php echo $url ?>&page=" data-page="2" class="btn">Cargar más</a>
        <?php endif; ?>

    </div>
    <?php elseif(current_user_can('edit_posts')): ?>

        <div class="iconos-cc">
            <a class="item">
                <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path d="M50,2.5A47.5,47.5,0,1,0,97.5,50,47.5,47.5,0,0,0,50,2.5ZM45.4,24A4.93,4.93,0,1,1,50.31,29,4.94,4.94,0,0,1,45.4,24ZM24.22,55.09a4.93,4.93,0,1,1,4.93-4.93A4.93,4.93,0,0,1,24.22,55.09Zm26.1,26.1a4.93,4.93,0,1,1,4.93-5v0A4.92,4.92,0,0,1,50.32,81.19ZM72.61,72.1a1.07,1.07,0,0,1-1.47.37L44.43,56.41a1.09,1.09,0,0,1-.37-.37L28,29.34a1,1,0,0,1,0-1.1,1.06,1.06,0,0,1,1.46-.37L56.18,43.93a1.06,1.06,0,0,1,.36.37L72.61,71A1.08,1.08,0,0,1,72.61,72.1Zm3.8-17a4.93,4.93,0,0,1-4.91-4.93v0a4.93,4.93,0,1,1,4.91,4.95Z"/><polygon points="32.12 31.95 45.76 54.72 68.53 68.33 54.88 45.59 32.12 31.95"/></svg>
                </div>
                <div class="name">
                    Explorar
                </div>
            </a>

            <a class="item active">
                <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path d="M72.43,68.66a40,40,0,1,0-3.77,3.77L93.74,97.5l3.76-3.76ZM42.41,77A34.59,34.59,0,1,1,77,42.41,34.63,34.63,0,0,1,42.41,77Z"/></svg>
                </div>
                <div class="name">
                    Buscar
                </div>
            </a>

            <!-- <a class="item">
                <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path d="M49.82,4.88a1.14,1.14,0,0,0-.85.59l-15.18,27L3.44,38.94a1.19,1.19,0,0,0-.91,1.41,1.13,1.13,0,0,0,.31.59l21.7,21.58L20.2,93.76a1.19,1.19,0,0,0,1,1.36,1.31,1.31,0,0,0,.68-.09L50,82,78.19,95a1.21,1.21,0,0,0,1.58-.59,1.31,1.31,0,0,0,.09-.68L75.49,62.52,97.16,41a1.2,1.2,0,0,0,0-1.68,1.22,1.22,0,0,0-.59-.32L66.21,32.47,51,5.5A1.18,1.18,0,0,0,49.82,4.88Z"/></svg>
                </div>
                <div class="name">
                    Colaborar
                </div>
            </a>

            <a class="item">
                <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path d="M84.4,97.5,50,77.85,15.6,97.5V9.05A6.56,6.56,0,0,1,22.15,2.5h55.7A6.56,6.56,0,0,1,84.4,9.05Z"/></svg>
                </div>
                <div class="name">
                    Coleccionar
                </div>
            </a> -->
        </div>
        <div id="cc_contenedor_buscador">
            <div id="mapa_cc_general">
            </div>
            <div id="cc_buscador_input">
                <input placeholder="Búsqueda" type="text">
            </div>
        </div>
        
    <?php endif;?>

	<?php endwhile; endif; ?>

    <?php 
    
        function darDetalles($name, $item) {
            if($item != '' && $item): ?>
                <div class="item">
                    <div class="name"><?php echo $name ?>:</div>
                    <div class="content"><?php echo $item ?></div>
                </div>
        <?php
            endif;
        }

        function requestJSON($url) {
            $client = curl_init($url);
            curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
            $response = curl_exec($client);

            $result = json_decode($response, true);

            return $result;
        }

        function darItemThumb($icono, $slug) { ?>
            <a href="#" class="item hide <?php echo $slug ?>">
                <div class="thumb">
                    <?php echo $icono ?>
                </div>
                <div class="details">
                    <div class="name"></div>
                </div>
            </a>
        <?php }
    ?>

<?php get_footer(); ?>
