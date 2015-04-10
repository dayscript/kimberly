<a target="_blank"
   href="<?php echo file_create_url( $data[ 'presentacion' ]->field_documento_adjunto[ 'und' ][ 0 ][ 'uri' ] ) ?>">
    <img
        src="<?php echo image_style_url( 'escalar_a_341', $data[ 'presentacion' ]->field_image[ 'und' ][ 0 ][ 'uri' ] ) ?>"/>
</a>
<?php
//print_r($data['presentacion']->field_documento_adjunto);
global $user;
$user_profile = user_load( $user->uid );
if ( isset( $user_profile->field_segmento ) && isset( $user_profile->field_segmento[ 'und' ][ 0 ] ) ){
    $segmento = $user_profile->field_segmento[ 'und' ][ 0 ][ 'tid' ];
} else{
    return true;
}
if ( isset( $row->field_segmento ) && isset( $row->field_segmento[ 'und' ] ) && is_array( $row->field_segmento[ 'und' ] ) && count( $row->field_segmento[ 'und' ] ) > 0 ){
    foreach($row->field_segmento[ 'und' ] as $rowsegmento){
        if($rowsegmento['tid'] == $segmento)
            return false;
    }
    return true;
} else{
    return true;
}
