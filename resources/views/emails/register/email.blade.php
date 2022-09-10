@component('mail::message')

    {{-- <div alt="Dashboard"
        style="margin:0 auto 40px auto;width:420px;height:500px;border-radius:16px;background-image:url">
      </div> --}}

    <img style="width:500px;height:420px;margin:0 auto 40px auto;" src="{{ public_path('/images/emailConf.png') }}"
        {{-- style="margin:0 auto 40px auto;width:420px;height:500px;border-radius:16px; text-align:center"> --}} {{-- !['alt_tag']({{ Storage::url('/images/emailConf.png') }}) --}} <p
        style="font-size:25px;font-weight:900;text-align:center; margin-bottom:16px">Confirmation email</p>
    <p style="font-size:18px;font-weight:400;text-align:center; margin-bottom:40px;">Click this button to verify your
        email
    </p>

    @component('mail::button', ['url' => '#'])
        Verify email
    @endcomponent
