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
<?php if ( $data[ "perfil" ] == "Vendedor" || $data[ "perfil" ] == "Jefe de Ventas" ): ?>
    <div class="acumulado">
        <h3>Mi Acumulado (<?php echo $data["mes"]?>)</h3>

        <div class="estrellas"><?php echo number_format( $data[ "estrellas" ], 0, ",", "." ) ?></div>
    </div>
<?php endif ?>
<hr/>
<div class="grupo">
    <h3>Periodo de reporte</h3>

    <div class="content">
        <div class="meses">Escoja un periodo a continuación:
            <select name="mes" id="mes" onchange="document.location.href='/desafios?cedula=<?php echo $data["cedula"]?>&mes='+this.options[this.selectedIndex].value;">
                <?php foreach ( $data[ "meses" ] as $mes ): ?>
                    <option <?php echo ($mes == $data["mes"])?"selected":""?> value="<?php echo $mes ?>"><?php echo $mes ?></option>
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
<?php if ( isset( $data[ "vendedores" ] ) ): ?>
    <?php if ( count( $data[ "vendedores" ] ) > 0 ): ?>
        <?php $distribuidor = $data[ "vendedores" ][ 0 ][ "distribuidor" ] ?>
    <?php else: ?>
        <?php $distribuidor = "Grupo de vendedores" ?>
    <?php endif ?>
    <div class="grupo">
    <h3><?php echo $distribuidor ?></h3>

    <div class="content">
    <?php if ( count( $data[ "vendedores" ] ) > 0 ): ?>
        <table width="100%">
        <thead>
        <tr>
            <th>Cédula</th>
            <th>Nombre y Perfil</th>
            <th class="text-right">Estrellas</th>
            <th class="text-right">Detalles</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ( $data[ "vendedores" ] as $vendedor ): ?>
            <?php if ( $vendedor[ "distribuidor" ] != $distribuidor ): ?>
                <?php $distribuidor = $vendedor[ "distribuidor" ] ?>
                </tbody>
                </table>
                </div></div>
                <div class="grupo">
                <h3><?php echo $distribuidor ?></h3>
                <div class="content">
                <table width="100%">
                <thead>
                <tr>
                    <th>Cédula</th>
                    <th>Nombre y Perfil</th>
                    <th class="text-right">Estrellas</th>
                    <th class="text-right">Detalles</th>
                </tr>
                </thead>
                <tbody>
            <?php endif ?>
            <tr>
                <td><?php echo $vendedor[ "cedula" ] ?></td>
                <td><?php echo $vendedor[ "nombre" ] ?><br>
                    <small><strong><?php echo $vendedor[ "distribuidor" ] ?></strong>
                        - <?php echo $vendedor[ "perfil" ] ?></small>
                    <br/>
                </td>
                <td class="text-right"><?php echo number_format( $vendedor[ "estrellas" ], 0, ",", "." ) ?></td>
                <td class="text-right">
                    <button style="margin-bottom: 0"
                            onclick="jQuery('tr.<?php echo $vendedor[ "cedula" ] ?>').toggle();"
                            class="tiny success">Ver detalle
                    </button>
                </td>
            </tr>
            <?php if ( isset( $vendedor[ "desafios" ][ "individual" ] ) ): ?>
                <?php foreach ( $vendedor[ "desafios" ][ "individual" ] as $desafio ): ?>
                    <tr class="<?php echo $vendedor[ "cedula" ] ?> desafio" style="display: none;">
                        <td>&nbsp;</td>
                        <td>
                            <div><?php echo $desafio[ "nombre" ] ?></div>
                            <?php if ( $desafio[ "mostrar" ] == "No" ): ?>
                            <?php else: ?>
                                <div class="item" style="width: 350px;padding: 5px 0;">Cumplimiento: <span
                                        class="data"><?php echo number_format( $desafio[ "cumplimiento" ], "2", ",", "." ) ?>
                                        %</span></div>
                            <?php endif ?>
                            <?php if ( $desafio[ "mostrar" ] == "No" ): ?>
                            <?php else: ?>
                                <div class="item" style="width: 350px;padding: 5px 0;">
                                    <?php if ( $desafio[ "unidades" ] == "Pesos" ): ?>
                                        Presupuesto: <span
                                            class="data">$<?php echo number_format( $desafio[ "presupuesto" ], "0", ",", "." ) ?></span>
                                    <?php else: ?>
                                        Presupuesto: <span
                                            class="data"><?php echo number_format( $desafio[ "presupuesto" ], "0", ",", "." ) . " " . $desafio[ "unidades" ] ?></span>
                                    <?php endif ?>
                                </div>
                            <?php endif ?>
                            <div class="item" style="width: 350px;padding: 5px 0;">
                                <?php if ( $desafio[ "unidades" ] == "Pesos" ): ?>
                                    Venta: <span
                                        class="data">$<?php echo number_format( $desafio[ "valor" ], "0", ",", "." ) ?></span>
                                <?php else: ?>
                                    Valor: <span
                                        class="data"><?php echo number_format( $desafio[ "valor" ], "0", ",", "." ) . " " . $desafio[ "unidades" ] ?></span>
                                <?php endif ?>
                            </div>
                        </td>
                        <td class="text-right"><?php echo $desafio[ "estrellas" ] ?></td>
                        <td></td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
            <?php if ( isset( $vendedor[ "desafios" ][ "grupal" ] ) ): ?>
                <?php foreach ( $vendedor[ "desafios" ][ "grupal" ] as $desafio ): ?>
                    <tr class="<?php echo $vendedor[ "cedula" ] ?> desafio" style="display: none;">
                        <td>&nbsp;</td>
                        <td>
                            <div><?php echo $desafio[ "nombre" ] ?> <strong>(Grupal)</strong></div>
                            <?php if ( $desafio[ "mostrar" ] == "No" ): ?>
                            <?php else: ?>
                                <div class="item" style="width: 350px;padding: 5px 0;">Cumplimiento: <span
                                        class="data"><?php echo number_format( $desafio[ "cumplimiento" ], "2", ",", "." ) ?>
                                        %</span></div>
                            <?php endif ?>
                            <?php if ( $desafio[ "mostrar" ] == "No" ): ?>
                            <?php else: ?>
                                <div class="item" style="width: 350px;padding: 5px 0;">
                                    <?php if ( $desafio[ "unidades" ] == "Pesos" ): ?>
                                        Presupuesto: <span
                                            class="data">$<?php echo number_format( $desafio[ "presupuesto" ], "0", ",", "." ) ?></span>
                                    <?php else: ?>
                                        Presupuesto: <span
                                            class="data"><?php echo number_format( $desafio[ "presupuesto" ], "0", ",", "." ) . " " . $desafio[ "unidades" ] ?></span>
                                    <?php endif ?>
                                </div>
                            <?php endif ?>
                            <div class="item" style="width: 350px;padding: 5px 0;">
                                <?php if ( $desafio[ "unidades" ] == "Pesos" ): ?>
                                    Venta: <span
                                        class="data">$<?php echo number_format( $desafio[ "valor" ], "0", ",", "." ) ?></span>
                                <?php else: ?>
                                    Valor: <span
                                        class="data"><?php echo number_format( $desafio[ "valor" ], "0", ",", "." ) . " " . $desafio[ "unidades" ] ?></span>
                                <?php endif ?>
                            </div>
                        </td>
                        <td class="text-right"><?php echo $desafio[ "estrellas" ] ?></td>
                        <td></td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        <?php endforeach ?>
        </tbody>
        </table>
    <?php else: ?>
        No hay vendedores activos a su cargo.
    <?php endif; ?>
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