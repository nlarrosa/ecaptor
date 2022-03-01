<html>
    <head>
        <style>
            @page {
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
            <div style="font-weight: 'bold';">Pedido N°: <span> {{ $saleProduct['id'] }}</span></div>
            <div>Cliente: {{ $saleProduct->Sale->User->bussines }}</div>
            <hr style="margin-top: 10px; margin-bottom: 10px"/>
        </header>
        <main>
            <div style="font-size: 24px; font-weight: bold; margin-bottom: 5px; margin-top: 10px;">{{ $saleProduct->Product->name }} - {{ $saleProduct->Product->Line->design }}</div>
            <div style="margin-bottom:3px; font-size: 19px; font-weight:bolder">{{ $saleProduct->width }} x {{ $saleProduct->height }} cm.</div>
            <div style="margin-bottom:3px; font-size: 19px;">{{ $saleProduct->Product->Line->type }}</div>
            <div style="margin-bottom:3px; font-size: 19px;">{{ $saleProduct->format }}</div>
            
            @if(!empty($imagePath))
                <div 
                    style='width: 100%;  
                    height: 310px;
                    margin-top: 30px;
                    margin-bottom: 30px;
                '> 
                <img src="{{ $imagePath }}" style="max-height:100%;" >
                </div>
            @endif
            <table>
                <tr>
                    <th>Color Base:</th>
                    <td>{{ $baseColors }}</td>
                </tr>
                <tr>
                    <th>Color Logo:</th>
                    <td>{{ $logoColors }}</td>
                </tr>
                <tr>
                    <th>Color Letras:</th>
                    <td>{{ $letrasColors }}</td>
                </tr>
            </table>
            <table>
                <tr>
                    <th>Borde:</th>
                    <td>{{ $saleProduct->SaleBorderProduct->type }}</td>
                </tr>
                <tr>
                    <th>Borde Lados:</th>
                    <td>{{ $saleProduct->SaleBorderProduct->lados }}</td>
                </tr>
                <tr>
                    <th>Borde Color:</th>
                    <td>{{ $bordesColors }}</td>
                </tr>
            </table>
        </main>
    </body>
</html>