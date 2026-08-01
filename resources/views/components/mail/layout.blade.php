<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        {!! Vite::content('resources/css/mails.css') !!}
    </style>

    <title>{{ $title ?? 'EPANWE' }}</title>
</head>

<body class="m-0 bg-slate-100 font-sans">

    <table role="presentation" cellpadding="0" cellspacing="0" width="100%" class="bg-slate-100 py-10">
        <tr>
            <td align="center">

                <table
                    role="presentation"
                    cellpadding="0"
                    cellspacing="0"
                    width="600"
                    class="overflow-hidden rounded-2xl bg-white shadow-lg"
                >

                    {{-- Header --}}
                    <tr>
                        <td class="bg-[#B08A2F] px-8 py-10 text-center text-white">

                            <h1 class="m-0 text-3xl font-bold">
                                EPANWE
                            </h1>

                            @isset($heading)
                                <p class="mt-3 mb-0 text-base opacity-90">
                                    {{ $heading }}
                                </p>
                            @endisset

                        </td>
                    </tr>

                    {{-- Content --}}
                    <tr>
                        <td class="px-10 py-12">

                            {{ $slot }}

                        </td>
                    </tr>

                    {{-- Footer --}}
                    <tr>
                        <td class="bg-slate-50 px-6 py-6 text-center text-xs leading-6 text-slate-500">

                            © {{ now()->year }} EPANWE. All rights reserved.

                            <br><br>

                            This is an automated email. Please do not reply.

                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>