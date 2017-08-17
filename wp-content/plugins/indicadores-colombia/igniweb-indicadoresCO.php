<?php

/*

Plugin Name: Indicadores Economicos en Colombia 

Plugin URI: http://igniweb.com/

Description: Widget que muestra los indicadores básicos económicos de Colombia, ver ejemplo funcional en http://fenalcoquindio.com.co/

Version: 1.0

Author: IGNIWEB

Author URI: http://igniweb.com/

*/

add_action( 'widgets_init', array( 'Widget_economicIndicatorsCO', 'register' ) );


register_activation_hook( __FILE__, array( 'Widget_economicIndicatorsCO', 'activate' ) );

register_deactivation_hook( __FILE__, array( 'Widget_economicIndicatorsCO', 'deactivate' ) );


class Widget_economicIndicatorsCO

{

    function activate() {

        $aData = array( 'WIDGET_NAME' => 'Indicadores Económicos CO',

                        'WIDGET_WIDTH' => '100' );



        if( ! get_option( 'economicIndicatorsCO' ) ) {

            add_option( 'economicIndicatorsCO' , $aData );

        }

        else {

            update_option( 'economicIndicatorsCO' , $data);

        }

    }



    function deactivate() {

        delete_option( 'economicIndicatorsCO' );

    }



    function control() {

        $aData = get_option( 'economicIndicatorsCO' );

        ?>

            <p>

                <label>Título:</label>

                <input name="economicIndicatorsCO_WIDGET_NAME" type="text" value="<?php echo $aData['WIDGET_NAME']; ?>" size="30" />

            </p>

        <?php

        if( isset( $_POST['economicIndicatorsCO_WIDGET_NAME'] ) )

        {

            $aData['WIDGET_NAME'] = esc_attr( $_POST['economicIndicatorsCO_WIDGET_NAME'] );

            update_option( 'economicIndicatorsCO', $aData );

        }

    }



    function widget($args) {

        $aData = get_option( 'economicIndicatorsCO' );

        echo $args['before_widget'];

        echo $args['before_title'] . $aData['WIDGET_NAME'] . $args['after_title'];

        ?>

        <!-- Dolar Wilkinsonpc Ind-Eco-Basico Start -->
        <style type="text/css">
            #ecoInd{
                text-align: center;
            }
            #over_content{
                position: relative
            }

            #over_content div{
                width: 100%;height: 85px;z-index: 9999999;position: absolute;
            }
        </style>
        <div id="ecoInd">
            <div id="over_content">
                <div></div>
            </div>
            <div id="IndEcoBasico">
                <h2><a href="http://dolar.wilkinsonpc.com.co/">Dolar Hoy</a></h2>
                <a href="http://dolar.wilkinsonpc.com.co/indicadores-economicos-dolar.html">Indicadores Economicos</a>
            </div>
            <script type="text/javascript" src="http://dolar.wilkinsonpc.com.co/js/ind-eco-basico.js?fsize=12"></script><!-- Dolar Wilkinsonpc Ind-Eco-Basico End -->
        </div>
        <?php

        echo $args['after_widget'];

    }

    function register() {

        wp_register_sidebar_widget( '1','Indicadores Económicos - CO', array( 'Widget_economicIndicatorsCO', 'widget' ), array('description' => 'Widget que muestra los indicadores basicos economicos de Colombia'));

        wp_register_widget_control( '1','Indicadores Económicos - CO', array( 'Widget_economicIndicatorsCO', 'control' ));

    }

}

?>