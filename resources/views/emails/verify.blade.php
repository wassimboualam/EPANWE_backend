<x-mail.layout
    title="Verify Your New Email Address"
    heading="Verify Your New Email Address"
>

    <h2 class="mt-0 text-2xl font-semibold text-slate-800">
        Hello {{ $user->first_name }},
    </h2>

    <p class="text-base leading-8 text-slate-600">
        We received a request to change the email address associated with your
        EPANWE account.
    </p>

    <p class="text-base leading-8 text-slate-600">
        The request intends to change your email address from
        <strong>{{ $user->email }}</strong>
        to
        <strong>{{ $newEmail }}</strong>.
    </p>

    <p class="text-base leading-8 text-slate-600">
        To confirm that you own this new email address, please click the button
        below.
    </p>

    <div class="my-9 text-center">

        <a href="{{ $verificationUrl }}" class="inline-block">
            <button type="submit" class="cursor-pointer rounded-xl bg-[#B08A2F] px-8 py-4 font-semibold text-white">
                Verify Email Address
            </button>

        </a>

    </div>

    <hr class="my-10 border-slate-200">

    <p class="text-sm leading-7 text-slate-500">
        <strong>Didn't request this change?</strong><br>

        If you didn't request an email change, you can safely ignore this
        email. Your current email address will remain unchanged until this new
        address is verified.
    </p>

    <p class="mt-10 text-[15px] text-slate-700">
        Thank you,<br>

        <strong>The EPANWE Team</strong>
    </p>

</x-mail.layout>