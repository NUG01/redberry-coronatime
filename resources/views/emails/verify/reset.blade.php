<tr>
    <td class="header">

        <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">


    </td>
</tr>


<p>{!! $body !!}</p>
<p>click this button to verify your email</p>


<table class="action" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation">
    <tr>
        <td align="center">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                    <td align="center">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation">
                            <tr>
                                <td>
                                    <a href="{{ $action_link }}" class="button" target="_blank" rel="noopener">reset
                                        password</a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
