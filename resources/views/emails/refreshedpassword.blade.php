<x-mail.layout
    title="Your New Temporary Password"
    heading="Password Reset Successful"
>

    <h2 class="mt-0 text-2xl font-semibold text-slate-800">
        Hello {{ $user->first_name }},
    </h2>

    <p class="text-base leading-8 text-slate-600">
        Your password has been successfully reset.
    </p>

    <p class="text-base leading-8 text-slate-600">
        You can now sign in to your EPANWE account using the password shown below.
    </p>

    <div class="my-8 rounded-xl border border-slate-200 bg-slate-50 p-6 text-center">

        <p class="mb-2 text-sm uppercase tracking-wide text-slate-500">
            Password: <span style="background-color: yellow">{{ ($password) }}</span>
        </p>
    </div>

    {{-- <div class="my-8 text-center">

        <a
            href="{{ $loginUrl }}"
            class="inline-block rounded-xl bg-[#B08A2F] px-8 py-4 font-semibold text-white no-underline"
        >
            Sign In
        </a>

    </div> --}}

    <hr class="my-10 border-slate-200">

    <p class="text-sm leading-7 text-slate-500">
        If you did not request a password reset, please contact an
        administrator immediately, as someone may have attempted to access your
        account.
    </p>

    <p class="mt-10 text-[15px] text-slate-700">
        Thank you,<br>

        <strong>The EPANWE Team</strong>
    </p>

</x-mail.layout>