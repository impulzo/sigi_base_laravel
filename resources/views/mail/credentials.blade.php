<body bgcolor="#f5f5f5" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" offset="0"
    style="padding:70px 0 70px 0;">
    <table width="600" height="auto" align="center" cellpadding="0" cellspacing="0"
        style="background-color:#fdfdfd; border:1px solid #dcdcdc; border-radius:3px !important;">
        <tr>
            <td width="600" height="auto" bgcolor="#F25A2B" border="0"
                style="padding:36px 48px; display:block; margin: 0px auto;">
                <h1
                    style="color:#ffffff; font-family:Verdana, Geneva, Tahoma, sans-serif; font-size:30px; line-height:150%; font-weight:300; margin:0; text-align:left;">
                    {{ $company }}
                </h1>
            </td>
        </tr>
        <tr>
            <td width="600" bgcolor="#fdfdfd" border="0"
                style="color:#737373; font-family:Verdana, Geneva, Tahoma, sans-serif; font-size:14px; line-height:150%; text-align:left; padding:48px;">
                <p style="margin:0 0 16px;">
                    Hola, {{ $name }} <br /> Has sido registrado con éxito en el sistema de
                    <b>{{ $company }}</b>, tus claves de acceso al sistema son las siguientes:
                    <br /><br /><b>Usuario: </b> {{ $user }} <br /><b>Contraseña: </b> {{ $password }}
                    <br /><br /><b>¡Importante!</b> Es necesario que ingreses al sistema y cambies la contraseña actual
                    en el apartado de perfil.
                    <center>
                        <b>
                            <a href="{{url('/')}}/admin/profile" style="color: black;">example.com
                            </a>
                        </b>
                    </center>
                </p>
            </td>
        </tr>
    </table>
</body>
