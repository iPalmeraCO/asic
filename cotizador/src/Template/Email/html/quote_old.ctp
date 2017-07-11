<table width="80%" border="0" style="font-family: Arial, Verdana; margin: 0 auto;">
    <tr>
        <td colspan="4" style="padding: 10px; background-color:#D7272D; color:#fff; font-weight: bolder;text-align: center;">SERVICIOS DE NUBE</td>
    </tr>
    <tr>
        <td style="padding:20px; border-right: 2px solid #ECECEC;">
            <img src="http://asic.linktic.com/img/asic_logo.png"  />
            <br/>
            <span style="font-size:13px;">VISI&Oacute;N TIC DE NEGOCIO</span>
        </td> 
        <td style="padding:20px; border-right: 2px solid #ECECEC; text-align: center">
            <span style="color:#333;">SERVICIOS DE NUBE <br/><br/>
                <?php if (isset($data['customer']['company']['nit']) && $data['customer']['company']['nit']) { ?>Para <?= $data['customer']['company']['name'] ?><?php } ?>
                Solicitado(a) por <?= $data['customer']['name'] ?>  <?= $data['customer']['surname'] ?> 
                <br/>Correo <?= $data['customer']['email'] ?>
                <br/>
                <br/>
                COMPONENTES Y CARACTERISTICAS<br>
                DEL SERVICIO SOLICITADO
            </span>
        </td>
        <td colspan="2" style="text-align: left; padding: 20px; color:#D7272D;">            
            Fecha: 
            <span style="color:#333;">
                <?= date("Y-m-d"); ?>
            </span>
            <br>
            Cotizaci&oacute;n No: 
            <span style="color:#333;">
                <?= $data['id'] ?>
            </span>
        </td> 
    </tr>
    <tr >
        <td colspan="3" style="height: 40px;"></td>  
    </tr>
    <tr>
        <td style="padding: 10px; background-color:#D7272D; color:#fff; font-weight: bolder; text-align: center">ELEMENTO</td> 
        <td style="padding: 10px; background-color:#D7272D; color:#fff; font-weight: bolder; text-align: center">DESCRIPCION</td> 
        <td style="padding: 10px; background-color:#D7272D; color:#fff; font-weight: bolder; text-align: center">CANTIDAD</td> 
        <td style="padding: 10px; background-color:#D7272D; color:#fff; font-weight: bolder; text-align: center; width: 120px;">TOTAL</td> 
    </tr>
    <?php $total = 0; ?>
    <?php foreach($data['package']['packages_elements'] as $pe){ ?>
    <tr>
        <td style="background-color: #f5f5f7; padding: 5px;">
            <span style="color:#333;">
              <?= $pe['element']['name'] ?> 
            </span>
        </td> 
        <td style="background-color: #f5f5f7; padding: 5px;">
            <span style="color:#333;">
                 <?= $pe['element']['description'] ?> 
            </span>
        </td> 
        <td style="background-color: #f5f5f7; padding: 5px;text-align: center;">    
            <span style="color:#333;">
                1
            </span>    
        </td> 
        <td style="background-color: #f5f5f7; padding: 5px; text-align: center;">
            <span style="color:#333;">
               $ <?= number_format($pe['element']['configuracion'][0]['total_sale_price'], 2, '.', ',') ?>
            </span>
        </td> 
    </tr>
    

    
    <?php $total += $pe['element']['configuracion'][0]['total_sale_price']; } ?>
    
    <tr>
        <td colspan="3" style="background-color: #f5f5f7; padding: 20px; text-align: right; color:#D7272D">
            VALOR TOTAL
        </td>
        <td style="background-color: #f5f5f7; padding: 20px; text-align: center; color:#D7272D">
             $ <?= number_format($total, 2, '.', ',') ?>
        </td>
    </tr>
</table>
