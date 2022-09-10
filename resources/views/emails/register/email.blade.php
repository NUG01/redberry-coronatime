@component('mail::message')


    <img style="width:500px;height:420px;margin:0 auto 40px auto;" src="{{ public_path('/images/emailConf.png') }}" />

    <p style="font-size:25px;font-weight:900;text-align:center; margin-bottom:16px">Confirmation email</p>

    <p style="font-size:18px;font-weight:400;text-align:center; margin-bottom:40px;">Click this
        button to verify your
        email
    </p>
    <div
        style="background-color:#0FBA68;display:flex;border-radius:8px;align-items:center;justify-content:center;width:27rem;height:3.6rem;margin:auto;">
        <a href="http://127.0.0.1:8000/verify?code={{ $url }}"
            style="font-size:25px;font-weight:900;color:white;text-decoration:none;width:100%;height:100%;display:flex; align-items:center; justify-content:center">
            <span style="align-text:center;align-self:center;justify-self:center;">Verify
                email</span>
        </a>
    </div>

    {{-- @component('mail::button', ['url' => $url])
        Verify email
    @endcomponent --}}
