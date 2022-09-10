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
