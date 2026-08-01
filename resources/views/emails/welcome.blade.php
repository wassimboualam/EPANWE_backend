<x-mail.layout
    title="Welcome to EPANWE"
    heading="Welcome to EPANWE"
>

    <h2 class="mt-0 text-2xl font-semibold text-slate-800">
        Welcome!
    </h2>

    <p class="text-base leading-8 text-slate-600">
        Your EPANWE account has been successfully created.
    </p>

    <p class="text-base leading-8 text-slate-600">
        Below is the password that will be associated with your account.
    </p>

    <div class="my-8 rounded-xl border border-slate-200 bg-slate-50 p-6 text-center">

        <p class="mb-2 text-sm uppercase tracking-wide text-slate-500">
            Password: 
            <span style="background-color: yellow">{{ ($password) }}</span>
        </p>


    </div>
    <div class="my-8 text-center">

        <a
            href="{{ $loginUrl }}"
            class="inline-block rounded-xl bg-[#B08A2F] px-8 py-4 font-semibold text-white no-underline"
        >
            Sign In
        </a>

    </div>

    <hr class="my-10 border-slate-200">

    <p class="text-sm leading-7 text-slate-500">
        Thank you for joining EPANWE. We are excited to have you as part of our
        community.
    </p>

    <p class="mt-10 text-[15px] text-slate-700">
        The EPANWE Team
    </p>

</x-mail.layout>