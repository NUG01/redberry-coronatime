<tr>
    <td class="header">

        <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">


    </td>
</tr>

@component('mail::message')
    <p>Confirmation email</p>
    <p>click this button to verify your email</p>
@endcomponent

<table class="action" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation">
    <tr>
        <td align="center">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                    <td align="center">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation">
                            <tr>
                                <td>
                                    <a href="http://127.0.0.1:8000/verify?code={{ $url }}" class="button"
                                        target="_blank" rel="noopener">verify email</a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
