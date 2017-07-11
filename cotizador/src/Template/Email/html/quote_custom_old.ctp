<table width="80%" border="0" style="font-family: Arial, Verdana; margin: 0 auto;">
    <tr>
        <td colspan="5" style="padding: 10px; background-color:#D7272D; color:#fff; font-weight: bolder;text-align: center;">SERVICIOS DE NUBE</td>
    </tr>
    <tr>
        <td style="padding:20px; border-right: 2px solid #ECECEC;">
            <img src="http://asic.linktic.com/img/asic_logo.png"  />
            <br/>
            <span style="font-size:13px;">VISI&Oacute;N TIC DE NEGOCIO</span>
        </td> 
        <td colspan="2" style="padding:20px; border-right: 2px solid #ECECEC; text-align: center">
            <span style="color:#333;">SERVICIOS DE NUBE <br/><br/>
                <?php if (isset($data['customer']['company']['nit']) && $data['customer']['company']['nit']) { ?>Para <?= $data['customer']['company']['name'] ?><?php } ?>
                Solicitado(a) por <?= $data['customer']['name'] ?>  <?= $data['customer']['surname'] ?> 
                <br/>Correo <?= $data['customer']['email'] ?>
                <br/>
                <br/>
                COMPONENTES Y CARACTERISTICAS<br/>
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
        <td style="padding: 10px; background-color:#D7272D; color:#fff; font-weight: bolder; text-align: center">TIER</td>
        <td style="padding: 10px; background-color:#D7272D; color:#fff; font-weight: bolder; text-align: center; width: 120px;">TOTAL</td> 
    </tr>
    <tr>
        <td style="background-color: #f5f5f7; padding: 5px;">
            <span style="color:#333;">
                <?= $data['servers']['name'] ?> 
            </span>
        </td> 
        <td style="background-color: #f5f5f7; padding: 5px;">
            <span style="color:#333;">
                <?= $data['servers']['description'] ?> 
            </span>
        </td> 
        <td style="background-color: #f5f5f7; padding: 5px;text-align: center;">    
            <span style="color:#333;">
                <?= $data['servers']['quantity'] ?>
            </span>    
        </td> 
        <td style="background-color: #f5f5f7; padding: 5px; text-align: center;">
            <span style="color:#333;">
                <?= $data['servers']['tir'] ?>
            </span>
        </td> 
        <td style="background-color: #f5f5f7; padding: 5px; text-align: center;">
            <span style="color:#333;">
                $ <?= number_format($data['servers']['total'], 2, '.', ',') ?>
            </span>
        </td> 
    </tr>
    <tr >
        <td style="background-color: #f5f5f7; padding: 5px;">
            <span style="color:#333;">
                <?= $data['system']['name'] ?> 
            </span>
        </td> 
        <td style="background-color: #f5f5f7; padding: 5px;">
            <span style="color:#333;">
                <?= $data['system']['description'] ?> 
            </span>
        </td> 
        <td style="background-color: #f5f5f7; padding: 5px; text-align: center;">
            <span style="color:#333;">
                <?= $data['system']['quantity'] ?>
            </span>
        </td> 
        <td style="background-color: #f5f5f7; padding: 5px; text-align: center;">
            <span style="color:#333;">
                <?= $data['system']['tir'] ?>
            </span>
        </td> 
        <td style="background-color: #f5f5f7; padding: 5px; text-align: center">
            <span style="color:#333;">
                $ <?= number_format($data['system']['total'], 2, '.', ',') ?>
            </span>
        </td> 
    </tr>
    <tr>
        <td style="background-color: #f5f5f7; padding: 5px;">
            <span style="color:#333;">
                <?= $data['processor']['name'] ?>
            </span>
        </td> 
        <td style="background-color: #f5f5f7; padding: 5px;">
            <span style="color:#333;">
                <?= $data['processor']['description'] ?> 
            </span>
        </td> 
        <td style="background-color: #f5f5f7; padding: 5px; text-align: center;">
            <span style="color:#333;">
                <?= $data['processor']['quantity'] ?>
            </span>
        </td> 
        <td style="background-color: #f5f5f7; padding: 5px; text-align: center;">
            <span style="color:#333;">
                <?= $data['processor']['tir'] ?>
            </span>
        </td> 
        <td style="background-color: #f5f5f7; padding: 5px; text-align: center;">
            <span style="color:#333;">
                $ <?= number_format($data['processor']['total'], 2, '.', ',') ?>    
            </span>
        </td> 
    </tr>
    <tr >
        <td style="background-color: #f5f5f7; padding: 5px;">
            <span style="color:#333;">
                <?= $data['memory']['name'] ?>
            </span>
        </td> 
        <td style="background-color: #f5f5f7; padding: 5px;">
            <span style="color:#333;">
                <?= $data['memory']['description'] ?> 
            </span>
        </td> 
        <td style="background-color: #f5f5f7; padding: 5px; text-align: center;">    
            <span style="color:#333;"><?= $data['memory']['quantity'] ?>
            </span>

        </td> 
        <td style="background-color: #f5f5f7; padding: 5px; text-align: center;">
            <span style="color:#333;">
                <?= $data['memory']['tir'] ?>
            </span>
        </td> 
        <td style="background-color: #f5f5f7; padding: 5px; text-align: center;">
            <span style="color:#333;">
                $ <?= number_format($data['memory']['total'], 2, '.', ',') ?>
            </span>
        </td> 
    </tr>
    <tr>
        <td style="background-color: #f5f5f7; padding: 5px;">
            <span style="color:#333;">
                <?= $data['harddisk']['name'] ?>
            </span>
        </td> 
        <td style="background-color: #f5f5f7; padding: 5px;">
            <span style="color:#333;">
                <?= $data['harddisk']['description'] ?>
            </span>
        </td> 
        <td style="background-color: #f5f5f7; padding: 5px; text-align: center;">    
            <span style="color:#333;">
                <?= $data['harddisk']['quantity'] ?>
            </span>    
        </td> 
        <td style="background-color: #f5f5f7; padding: 5px; text-align: center;">
            <span style="color:#333;">
                <?= $data['harddisk']['tir'] ?>
            </span>
        </td> 
        <td style="background-color: #f5f5f7; padding: 5px; text-align: center">
            <span style="color:#333;">
                $ <?= number_format($data['harddisk']['total'], 2, '.', ',') ?>
            </span>
        </td> 
    </tr>
    <tr >
        <td style="background-color: #f5f5f7; padding: 5px;">
            <span style="color:#333;">
                <?= $data['connectivity']['name'] ?> 
            </span>
        </td> 
        <td style="background-color: #f5f5f7; padding: 5px;">
            <span style="color:#333;">
                <?= $data['connectivity']['description'] ?> 
            </span>
        </td> 
        <td style="background-color: #f5f5f7; padding: 5px; text-align: center;">    
            <span style="color:#333;">
                <?= $data['connectivity']['quantity'] ?>
            </span>    
        </td> 
        <td style="background-color: #f5f5f7; padding: 5px; text-align: center;">
            <span style="color:#333;">
                <?= $data['connectivity']['tir'] ?>
            </span>
        </td> 
        <td style="background-color: #f5f5f7; padding: 5px; text-align: center;">
            <span style="color:#333;">
                $ <?= number_format($data['connectivity']['total'], 2, '.', ',') ?>
            </span>
        </td> 
    </tr>

    <tr >
        <td colspan="3" style="height: 40px;"></td>  
    </tr>
    <tr>
        <td colspan="5" style="padding: 10px; background-color:#D7272D; color:#fff; font-weight: bolder;text-align: center;">ADICIONALES</td>
    </tr>
    <?php foreach ($data['additionals'] as $additional) { ?>
    <tr>
        <td style="background-color: #f5f5f7; padding: 5px;">
            <span style="color:#333;">
                <?= $additional['name'] ?> 
            </span>
        </td> 
        <td style="background-color: #f5f5f7; padding: 5px;">
            <span style="color:#333;">
                <?= $additional['description'] ?> 
            </span>
        </td> 
        <td style="background-color: #f5f5f7; padding: 5px; text-align: center;">

            <span style="color:#333;">
                <?= $additional['quantity'] ?>
            </span>

        </td> 
        <td style="background-color: #f5f5f7; padding: 5px; text-align: center;">
            <span style="color:#333;">
                <?= $additional['tir'] ?>
            </span>
        </td> 
        <td style="background-color: #f5f5f7; padding: 5px; text-align: center;"> 
            <span style="color:#333;">
                $ <?= number_format($additional['total'], 2, '.', ',') ?>
            </span>
        </td>
    </tr>
    <?php } ?>
    <tr>
        <td colspan="4" style="background-color: #f5f5f7; padding: 20px; text-align: right; color:#D7272D">
            VALOR TOTAL
        </td>
        <td style="background-color: #f5f5f7; padding: 20px; text-align: center; color:#D7272D">
            $ <?= number_format($data['subtotal'], 2, '.', ',') ?>
        </td>
    </tr>
</table>
