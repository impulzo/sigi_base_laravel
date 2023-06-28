<body bgcolor="#f5f5f5" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" offset="0"
    style="padding:70px 0 70px 0;">
    <table width="600" height="auto" align="center" cellpadding="0" cellspacing="0"
        style="background-color:#fdfdfd; border:1px solid #dcdcdc; border-radius:3px !important;">
        <tr>
            <td width="200" height="auto" border="0">
                <?php $admin_logo_img = Voyager::setting('admin.icon_image', ''); ?>
                @if ($admin_logo_img == '')
                    <img src="{{ voyager_asset('images/logo-icon-light.png') }}" style="width: 100%" alt="Logo Icon">
                @else
                    <img src="{{ Voyager::image($admin_logo_img) }}" style="width: 100%" alt="Logo Icon">
                @endif
            </td>
            <td width="400" height="auto" border="0">
                <h1 style="font-weight: bold; color:#F25A2B; font-family:Verdana, Geneva, Tahoma, sans-serif; font-size:30px; font-weight:300; margin:0; text-align:center;">
                    {{ $company }}
                </h1>
            </td>
        </tr>
        <tr>
            <td width="600" bgcolor="#fdfdfd" border="0" colspan="2"
                style="color:#616161; font-family:Verdana, Geneva, Tahoma, sans-serif; font-size:14px; line-height:150%; text-align:left; padding:20px 25px;">
                <p style="margin:0 0 16px;">
                    Hola, <b>{{ $name }}, ¡Se ha generado la factura con éxito!</b>
                    <br />
                    Puedes consultar los archivos generados a través de los siguientes enlaces:
                    <br /><br />
                    <a href="" target="_blank"
                        style="background-color: #07294d; color: #fff; padding: 5px 10px; display: block; width: 25%; margin: auto; margin-top: 10px; text-align: center">XML</a>
                    <a href="" target="_blank"
                        style="background-color: #e01a1a; color: #fff; padding: 5px 10px; display: block; width: 25%; margin: auto; margin-top: 10px; text-align: center">PDF</a>
                </p>
            </td>
        </tr>
    </table>
</body>
