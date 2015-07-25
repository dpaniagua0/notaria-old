<style>
    .title {
        width: 100%;
        margin: 0 auto;
        display: block;
        text-align: center;
    }
    .notaria-name {
        width: 100%;
        text-align: center;
        margin: 0 auto;
        display: block;
    }
    .declaranot-text {
        width: 100%;
        text-align: center;
        margin: 0 auto;
        display: block;
        font-size: 1.3em;
    }
    .pull-left {
        display: inline-block;
        width: 50%;
    }
    .pull-right {
        display: inline-block;
        width: 50%;
    }
    .under-line {
        border-bottom: 1px solid #000;
    }
    .full-table {
        width: 100%;
    }
    .border-cell {
        border: 1px solid #000;
    }
</style>
<h1 class="title">Lic. Nose que me vale verga puto wero</h1>
<h5 class="notaria-name">NOTARIA PUBLICA Nº.34</h5>
<h1 class="declaranot-text">DATOS PARA EL PAGO DE IMPUESTOS e INFORMACÓN PARA DECLARANOT {{ date('Y') }}</h1>
<br>
<div class="pull-left">
    <table class="full-table">
        <tr>
            <td>
                No. Escritura
            </td>
            <td class="under-line" style="width: 70%">
                {{ $data->numero_escritura }}
            </td>
        </tr>
        <tr>
            <td>
                Nombre Enajenante
            </td>
            <td class="under-line" style="width: 70%">
                {{ $data->numero_escritura }}
            </td>
        </tr>
        <tr>
            <td>
                RFC
            </td>
            <td class="under-line" style="width: 70%">
                {{ $data->numero_escritura }}
            </td>
        </tr>
        <tr>
            <td>
                Domicilio:
            </td>
        </tr>
        <tr>
            <td>
                Calle y No.
            </td>
            <td class="under-line" style="width: 70%">
                {{ $data->domicilio_numero }}
            </td>
        </tr>
        <tr>
            <td>
                Colonia
            </td>
            <td class="under-line" style="width: 70%">
                {{ $data->colonia }}
            </td>
        </tr>
        <tr>
            <td>
                Mpio y/o Loc.
            </td>
            <td class="under-line" style="width: 70%">
                {{ $data->municipio_localidad }}
            </td>
        </tr>
        <tr>
            <td>
                Ent. Fed.
            </td>
            <td class="under-line">
                {{ $data->entidad_federativa }}
            </td>
        </tr>
        <tr>
            <td>
                CP
            </td>
            <td class="under-line" style="width: 70%">
                {{ $data->codigo_postal }}
            </td>
        </tr>
        <tr>
            <td>
                Concepto:
            </td>
        </tr>
        <tr>
            <td>
                Transmición/Enajenación
            </td>
            <td class="under-line" style="width: 70%">
                {{ $data->concepto }}
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>
                VALOR OPERACIÓN
            </td>
            <td class="border-cell" style="width: 70%">
                {{ $data->valor_operacion }}
            </td>
        </tr>
        <tr>
            <td>
                IVA CAUSADO
            </td>
            <td class="border-cell" style="width: 70%">
                {{ $data->iva_causado }}
            </td>
        </tr>
        <tr>
            <td>
                ISR CAUSADO
            </td>
            <td class="border-cell" style="width: 70%">
                {{ $data->isr_causado }}
            </td>
        </tr>
        <tr>
            <td>Exentó</td>
            <td class="border-cell" style="width: 70%">
                {{ $data->exento }}
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>
                Fecha de elaboración
            </td>
            <td class="border-cell" style="width: 70%">
                {{ date("d/m/Y", strtotime("$data->fecha_elaboracion")) }}
            </td>
        </tr>
    </table>
</div>
<div class="pull-right">
    <table class="full-table">
        <tr>
            <td>
                Fecha Firma
            </td>
            <td class="under-line" style="width: 70%">
                {{ date("d/m/Y", strtotime("$data->fecha_firma_adq")) }}
            </td>
        </tr>
        <tr>
            <td>
                Nombre Adquiriente
            </td>
            <td class="under-line" style="width: 70%">
                {{ $data->numero_escritura }}
            </td>
        </tr>
        <tr>
            <td>
                RFC
            </td>
            <td class="under-line" style="width: 70%">
                {{ $data->numero_escritura }}
            </td>
        </tr>
        <tr>
            <td>
                Domicilio:
            </td>
        </tr>
        <tr>
            <td>
                Calle y No.
            </td>
            <td class="under-line" style="width: 60%">
                {{ $data->domicilio_numero_adq }}
            </td>
        </tr>
        <tr>
            <td>
                Colonia
            </td>
            <td class="under-line" style="width: 70%">
                {{ $data->colonia_adq }}
            </td>
        </tr>
        <tr>
            <td>
                Mpio y/o Loc.
            </td>
            <td class="under-line" style="width: 70%">
                {{ $data->municipio_adq }}
            </td>
        </tr>
        <tr>
            <td>
                Ent. Fed.
            </td>
            <td class="under-line" style="width: 70%">
                {{ $data->entidad_adq }}
            </td>
        </tr>
        <tr>
            <td>
                CP
            </td>
            <td class="under-line" style="width: 70%">
                {{ $data->codigo_postal }}
            </td>
        </tr>
    </table>
    <br/>
    <br/>
    <table class="full-table">
        <tr>
            <td class="border-cell" style="width: 30%">
                COMPLEMENTO
            </td>
            <td class="border-cell"></td>
        </tr>
        <tr>
            <td class="border-cell" style="width: 30%">
                DECLARANOT
            </td>
            <td class="border-cell" ></td>
        </tr>
        <tr>
            <td class="border-cell" style="width: 30%">
                IMPUESTOS
            </td>
            <td class="border-cell"></td>
        </tr>
        <tr>
            <td class="border-cell" style="width: 30%">
                FACTURAS
            </td>
            <td class="border-cell"></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
    </table>
</div>
