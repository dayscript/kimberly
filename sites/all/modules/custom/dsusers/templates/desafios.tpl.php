<div class="row">
    <div class="info columns small-10">
        <div><?php echo $data[ "nombre" ] ?></div>
        <div class="perfil"><?php echo $data[ "perfil" ] ?></div>
        <div class="ciudad">Ciudad:
            <small><?php echo $data[ "ciudad" ] ?></small>
        </div>
        <div class="cedula">Cédula:
            <small><?php echo $data[ "cedula" ] ?></small>
        </div>
        <?php if ( isset($data["cuotas"]) && ($data[ "perfil" ] == "Vendedor" || $data[ "perfil" ] == "Jefe de Ventas") ): ?>
            <div class="grupo cuotas">
                <h3><?php echo $data["cuotas"]["titulo"]?></h3>
                <?php foreach($data["cuotas"]["datos"] as $desafio):?>
                    <?php if($desafio[ "presupuesto" ]>0):?>
                        <div class="cuota row">
                            <div class="nombre columns small-10"><?php echo $desafio[ "nombre" ] ?></div>
                            <div class="columns small-6"> <?php echo number_format( $desafio[ "presupuesto" ], "0", ",", "." ) . " " . $desafio[ "unidades" ] ?></div>

                        </div>
                    <?php endif?>
                <?php endforeach?>
            </div>
        <?php endif ?>
    </div>
    <?php if ( $data[ "perfil" ] == "Vendedor" || $data[ "perfil" ] == "Jefe de Ventas" ): ?>
        <div class="acumulado columns small-6">
            <h3>Mi Acumulado</h3>

            <div class="estrellas"><?php echo number_format( $data[ "estrellas" ], 0, ",", "." ) ?></div>
        </div>
    <?php endif ?>
</div>
<hr/>
<div class="grupo">
    <h3>Filtros del reporte</h3>

    <div class="content">
        <?php if ( count( $data[ "distribuidores" ] ) > 1 ): ?>
            <div class="meses">Escoja un distribuidor:
                <select name="distribuidor" id="distribuidor"
                        onchange="document.location.href='/desafios?cedula=<?php echo $data[ "cedula" ] ?>&mes=<?php echo $data[ "mes" ] ?>&did='+this.options[this.selectedIndex].value;">
                    <?php foreach ( $data[ "distribuidores" ] as $did => $distribuidor ): ?>
                        <option <?php echo ( $did == $data[ "did" ] ) ? "selected" : "" ?>
                            value="<?php echo $did ?>"><?php echo $distribuidor ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        <?php endif ?>
        <div class="row">
            <div class="meses small-12 columns">Escoja un periodo a continuación:
                <select name="mes" id="mes"
                        onchange="document.location.href='/desafios?cedula=<?php echo $data[ "cedula" ] ?>&did=<?php echo $data[ "did" ] ?>&mes='+this.options[this.selectedIndex].value;">
                    <?php foreach ( $data[ "meses" ] as $mes ): ?>
                        <option <?php echo ( $mes == $data[ "mes" ] ) ? "selected" : "" ?>
                            value="<?php echo $mes ?>"><?php echo $mes ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="meses small-4 columns right" style="font-size: 1.2rem;">
                Total de Estrellas <br/>
                <strong><?php echo $data["mes"]?></strong>:
                <span class="red"><?php echo number_format( $data["liquidaciones"][$data["mes"]][ "estrellas" ], 0, ",", "." ) ?></span>
            </div>
        </div>
    </div>
</div>
<?php if ( isset( $data["liquidaciones"][$data["mes"]][ "desafios" ][ "individual" ] ) && count( $data["liquidaciones"][$data["mes"]][ "desafios" ][ "individual" ] ) > 0 ): ?>
    <div class="grupo">
        <h3>Desafíos individuales</h3>

        <div class="content">
            <?php foreach ( $data["liquidaciones"][$data["mes"]][ "desafios" ][ "individual" ] as $desafio ): ?>
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

<?php if ( isset( $data["liquidaciones"][$data["mes"]][ "desafios" ][ "grupal" ] ) && count( $data["liquidaciones"][$data["mes"]][ "desafios" ][ "grupal" ] ) > 0 ): ?>
    <div class="grupo">
        <h3>Desafíos grupales</h3>

        <div class="content">
            <?php foreach ( $data["liquidaciones"][$data["mes"]][ "desafios" ][ "grupal" ] as $desafio ): ?>
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
        <?php $distribuidor = $data["distribuidores"][$data["did"]] ?>
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
            <?php if($vendedor["distribuidor"]!=$data["distribuidores"][$data["did"]])continue;?>
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