<div class="info">
    <div><?php echo $data[ "nombre" ] ?></div>
    <div class="perfil"><?php echo $data[ "perfil" ] ?></div>
    <div class="ciudad">Ciudad:
        <small><?php echo $data[ "ciudad" ] ?></small>
    </div>
    <div class="cedula">Cédula:
        <small><?php echo $data[ "cedula" ] ?></small>
    </div>
</div>
<div class="acumulado">
    <h3>Mi Acumulado</h3>

    <div class="estrellas"><?php echo number_format( $data[ "estrellas" ], 0, ",", "." ) ?></div>
</div>
<hr/>
<div class="grupo">
    <h3>Periodo de reporte</h3>

    <div class="content">
        <div class="meses">Escoja un periodo a continuación:
            <select name="mes" id="mes">
                <?php foreach ( $data[ "meses" ] as $mes ): ?>
                    <option value="<?php echo $mes ?>"><?php echo $mes ?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>
</div>
<?php if ( isset( $data[ "desafios" ][ "individual" ] ) && count( $data[ "desafios" ][ "individual" ] ) > 0 ): ?>
    <div class="grupo">
        <h3>Desafíos individuales</h3>

        <div class="content">
            <?php foreach ( $data[ "desafios" ][ "individual" ] as $desafio ): ?>
                <div class="desafio">
                    <?php if ( $desafio[ "mostrar" ] == "No" ): ?>
                        
                    <?php else: ?>
                        <div class="item cumplimiento">Cumplimiento: <span
                                class="data"><?php echo number_format( $desafio[ "cumplimiento" ], "2", ",", "." ) ?>
                                %</span>
                        </div>
                    <?php endif ?>
                    <div class="nombre"><?php echo $desafio[ "nombre" ] ?></div>
                    <small><?php echo $desafio[ "descripcion" ] ?></small>
                    <div class="item estrellas">Estrellas obtenidas <span
                            class="data"><?php echo $desafio[ "estrellas" ] ?></span></div>
                    <?php if ( $desafio[ "mostrar" ] == "No" ): ?>

                    <?php else: ?>
                        <div class="item">
                            <?php if ( $desafio[ "unidades" ] == "Pesos" ): ?>
                                Presupuesto: <span
                                    class="data">$<?php echo number_format( $desafio[ "presupuesto" ], "0", ",", "." ) ?></span>
                            <?php else: ?>
                                Presupuesto: <span
                                    class="data"><?php echo number_format( $desafio[ "presupuesto" ], "0", ",", "." ) . " " . $desafio[ "unidades" ] ?></span>
                            <?php endif ?>
                        </div>
                    <?php endif ?>
                    <div class="item">
                        <?php if ( $desafio[ "unidades" ] == "Pesos" ): ?>
                            Venta: <span
                                class="data">$<?php echo number_format( $desafio[ "valor" ], "0", ",", "." ) ?></span>
                        <?php else: ?>
                            Valor: <span
                                class="data"><?php echo number_format( $desafio[ "valor" ], "0", ",", "." ) . " " . $desafio[ "unidades" ] ?></span>
                        <?php endif ?>
                    </div>

                </div>
                <hr/>
            <?php endforeach ?>
        </div>
    </div>
<?php endif ?>

<?php if ( isset( $data[ "desafios" ][ "grupal" ] ) && count( $data[ "desafios" ][ "grupal" ] ) > 0 ): ?>
    <div class="grupo">
        <h3>Desafíos grupales</h3>

        <div class="content">
            <?php foreach ( $data[ "desafios" ][ "grupal" ] as $desafio ): ?>
                <div class="desafio">
                    <?php if ( $desafio[ "mostrar" ] == "No" ): ?>

                    <?php else: ?>
                        <div class="item cumplimiento">Cumplimiento: <span
                                class="data"><?php echo number_format( $desafio[ "cumplimiento" ], "2", ",", "." ) ?>
                                %</span>
                        </div>
                    <?php endif ?>
                    <div class="nombre"><?php echo $desafio[ "nombre" ] ?></div>
                    <small><?php echo $desafio[ "descripcion" ] ?></small>
                    <div class="item estrellas">Estrellas obtenidas <span
                            class="data"><?php echo $desafio[ "estrellas" ] ?></span></div>
                    <?php if ( $desafio[ "mostrar" ] == "No" ): ?>

                    <?php else: ?>
                        <div class="item">
                            <?php if ( $desafio[ "unidades" ] == "Pesos" ): ?>
                                Presupuesto: <span
                                    class="data">$<?php echo number_format( $desafio[ "presupuesto" ], "0", ",", "." ) ?></span>
                            <?php else: ?>
                                Presupuesto: <span
                                    class="data"><?php echo number_format( $desafio[ "presupuesto" ], "0", ",", "." ) . " " . $desafio[ "unidades" ] ?></span>
                            <?php endif ?>
                        </div>
                    <?php endif ?>
                    <div class="item">
                        <?php if ( $desafio[ "unidades" ] == "Pesos" ): ?>
                            Venta: <span
                                class="data">$<?php echo number_format( $desafio[ "valor" ], "0", ",", "." ) ?></span>
                        <?php else: ?>
                            Valor: <span
                                class="data"><?php echo number_format( $desafio[ "valor" ], "0", ",", "." ) . " " . $desafio[ "unidades" ] ?></span>
                        <?php endif ?>
                    </div>

                </div>
                <hr/>
            <?php endforeach ?>
        </div>
    </div>
<?php endif ?>
<!--<pre>-->
<!--    --><?php
//    print_r( $data );
//    ?>
<!--</pre>-->

<!--<div id="chart" style="width:400px; height:400px;"></div>-->
<!--<script>-->
<!--    function sample() {-->
<!--        jQuery('#chart').highcharts({-->
<!--            chart: {-->
<!--                type: 'bar'-->
<!--            },-->
<!--            title: {-->
<!--                text: 'Fruit Consumption'-->
<!--            },-->
<!--            xAxis: {-->
<!--                categories: ['Apples', 'Bananas', 'Oranges']-->
<!--            },-->
<!--            yAxis: {-->
<!--                title: {-->
<!--                    text: 'Fruit eaten'-->
<!--                }-->
<!--            },-->
<!--            series: [{-->
<!--                name: 'Jane',-->
<!--                data: [1, 0, 4]-->
<!--            }, {-->
<!--                name: 'John',-->
<!--                data: [5, 7, 3]-->
<!--            }]-->
<!--        });-->
<!--    }-->
<!--    sample();-->
<!--</script>-->