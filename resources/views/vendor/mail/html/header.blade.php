<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                <img src="https://quantizd.com/google-drive-client-api-with-laravel/" alt="Dashboard">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>

{{-- <tr>
    <td class="header">

        <img src="images/emailConf.png" alt="Dashboard" style="width:40%; text-align:center; margin-bottom:40px">

    </td>
</tr> --}}
