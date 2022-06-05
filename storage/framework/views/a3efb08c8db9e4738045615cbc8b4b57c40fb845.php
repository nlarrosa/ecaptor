<html>
    <head>
        <style>
            @page  {
                margin: 0cm 0cm;
                font-family: Arial;
            }

            body {
                margin: 1cm 1cm 1cm 1cm;
            }

            header {
                /* position: fixed; */
                top: 1cm;
                left: 1cm;
                right: 1cm;
                height: 3cm;
                text-align: left;
                line-height: 20px;
            }
            th, td {
                border: 1px solid black;
                border-collapse: collapse;
                padding: 10px;
            }
            table{
                width:100%;
                overflow-wrap: break-word;
                margin-top: 20px;
            }
            th{
                width: 100px;
            }
        </style>
    </head>
    <body>
        <header>
            <h3>Soicitud de Pedido</h3>
            <div style="font-weight: 'bold';">Pedido N°: <span> <?php echo e($saleProduct['id']); ?></span></div>
            <div>Cliente: <?php echo e($saleProduct->Sale->User->bussines); ?></div>
            <hr style="margin-top: 10px; margin-bottom: 10px"/>
        </header>
        <main>
            <div style="font-size: 24px; font-weight: bold; margin-bottom: 5px; margin-top: 10px;"><?php echo e($saleProduct->Product->name); ?> - <?php echo e($saleProduct->Product->Line->design); ?></div>
            <div style="margin-bottom:3px; font-size: 19px; font-weight:bolder"><?php echo e($saleProduct->width); ?> x <?php echo e($saleProduct->height); ?> cm.</div>
            <div style="margin-bottom:3px; font-size: 19px;">Cantidad: <?php echo e($saleProduct->quantity); ?> unid.</div>
            <div style="margin-bottom:3px; font-size: 19px;"><?php echo e($saleProduct->Product->Line->type); ?></div>
            <div style="margin-bottom:3px; font-size: 19px;"><?php echo e($saleProduct->format); ?></div>
            
            <?php if(!empty($imagePath)): ?>
                <div 
                    style='width: 100%;  
                    height: 310px;
                    margin-top: 30px;
                    margin-bottom: 30px;
                '> 
                <img src="<?php echo e($imagePath); ?>" style="max-height:100%;" >
                </div>
            <?php endif; ?>
            <table>
                <tr>
                    <th>Color Base:</th>
                    <td><?php echo e($baseColors); ?></td>
                </tr>
                <tr>
                    <th>Color Logo:</th>
                    <td><?php echo e($logoColors); ?></td>
                </tr>
                <tr>
                    <th>Color Letras:</th>
                    <td><?php echo e($letrasColors); ?></td>
                </tr>
            </table>
            <table>
                <tr>
                    <th>Borde:</th>
                    <td><?php echo e($saleProduct->SaleBorderProduct->type); ?></td>
                </tr>
                <tr>
                    <th>Borde Lados:</th>
                    <td><?php echo e($saleProduct->SaleBorderProduct->lados); ?></td>
                </tr>
                <tr>
                    <th>Borde Color:</th>
                    <td><?php echo e($bordesColors); ?></td>
                </tr>
            </table>
        </main>
    </body>
</html><?php /**PATH C:\xampp\htdocs\grupo_hermida\ecaptor\resources\views/livewire/sale/sale-planilla.blade.php ENDPATH**/ ?>