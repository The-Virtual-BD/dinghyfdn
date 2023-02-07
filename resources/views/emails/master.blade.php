<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        html,
        body {
            background: #eeeeee;
            font-family: 'Open Sans', sans-serif, Helvetica, Arial;
        }

        img {
            max-width: 100%;
        }

        /* This is what it makes reponsive. Double check before you use it! */
        @media only screen and (max-width: 480px) {
            table tr td {
                width: 100% !important;
                float: left;
            }
        }

        .font-raleway {
            font-family: 'Raleway', sans-serif;
        }

        .font-bold {
            font-weight: 700;
        }

        .font-normal {
            font-weight: 400;
        }

        .inline-flex {
            display: inline-flex !important;
        }

        .items-center {
            align-items: center !important;
        }

        .p-1 {
            padding: 0.25rem
                /* 4px */
                 !important;
        }

        .bg-eve {
            --tw-bg-opacity: 1 !important;
            background-color: rgb(230 57 70) !important;
        }

        .text-sm {
            font-size: 0.875rem
                /* 14px */
                 !important;
            line-height: 1.25rem
                /* 20px */
                 !important;
        }

        .text-white {
            --tw-text-opacity: 1 !important;
            color: rgb(255 255 255) !important;
        }

        .uppercase {
            text-transform: uppercase !important;
        }

        .tracking-widest {
            letter-spacing: 0.1em !important;
        }

        .hover\:bg-white:hover {
            --tw-bg-opacity: 1 !important;
            background-color: rgb(255 255 255) !important;
        }

        .border {
            border-width: 1px !important;
        }

        .border-eve {
            --tw-border-opacity: 1 !important;
            border-color: rgb(230 57 70) !important;
        }

        .hover\:border:hover {
            border-width: 1px !important;
        }

        .hover\:border-eve:hover {
            --tw-border-opacity: 1 !important;
            border-color: rgb(230 57 70) !important;
        }

        .hover\:text-eve:hover {
            --tw-text-opacity: 1 !important;
            color: rgb(230 57 70) !important;
        }

        .w-full {
            width: 100% !important;
        }

        .justify-center {
            justify-content: center !important;
        }

        .text-eve {
            --tw-text-opacity: 1 !important;
            color: rgb(230 57 70) !important;
        }

        .text-lg {
            font-size: 1.125rem
                /* 18px */
                 !important;
            line-height: 1.75rem
                /* 28px */
                 !important;
        }

        .p-5 {
            padding: 1.25rem
                /* 20px */
                 !important;
        }

        .mt-4 {
            margin-top: 1rem
                /* 16px */
                 !important;
        }

        .mt-12 {
            margin-top: 3rem
                /* 48px */
                 !important;
        }

        .my-12 {
            margin-top: 3rem
                /* 48px */
                 !important;
            margin-bottom: 3rem
                /* 48px */
                 !important;
        }

        .leading-6 {
            line-height: 1.5rem
                /* 24px */
                 !important;
        }

        .bg-adam-light {
            --tw-bg-opacity: 1 !important;
            background-color: rgb(237 242 244) !important;
        }

        @media (min-width: 640px) {
            .sm\:px-5 {
                padding-left: 1.25rem
                    /* 20px */
                     !important;
                padding-right: 1.25rem
                    /* 20px */
                     !important;
            }

            .sm\:py-4 {
                padding-top: 1rem
                    /* 16px */
                     !important;
                padding-bottom: 1rem
                    /* 16px */
                     !important;
            }
        }
    </style>
</head
<body style="background: #eeeeee; padding: 10px; font-family: 'Open Sans', sans-serif, Helvetica, Arial;">
    <center>
        <!-- ** Table begins here
    ----------------------------------->
        <!-- Set table width to fixed width for Outlook(Outlook does not support max-width) -->
        <table width="100%" cellpadding="0" cellspacing="0" bgcolor="FFFFFF"
            style=" max-width: 600px !important; margin: 0 auto; background-color:transparent;">
            <tr>
                <td style="padding: 20px; text-align: center;">
                    <img src="{{asset('logo.png')}}" alt="" srcset="" width="196px">
                </td>
            </tr>
            <tr>
                <td style="padding: 20px; text-align: center;" class="bg-eve">

                    <h1 style="color: #ffffff" class="text-white font-raleway uppercase font-bold">@yield('mailtitle')</h1>
                </td>
            </tr>
            
            @yield('content')

            <tr class="bg-adam-light">
                <td>
                    <center class="mt-4">
                        <a href="http://www.dinghyfdn.org" style="text-decoration: none;" target="_blank"
                            class="text-lg text-eve"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                height="1em" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M15.402 21v-6.966h2.333l.349-2.708h-2.682V9.598c0-.784.218-1.319 1.342-1.319h1.434V5.857a19.19 19.19 0 0 0-2.09-.107c-2.067 0-3.482 1.262-3.482 3.58v1.996h-2.338v2.708h2.338V21H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1h-4.598z" />
                            </svg></a>
                        <a href="http://www.dinghyfdn.org" style="text-decoration: none;" target="_blank"
                            class="text-lg text-eve"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                height="1em" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M22.162 5.656a8.384 8.384 0 0 1-2.402.658A4.196 4.196 0 0 0 21.6 4c-.82.488-1.719.83-2.656 1.015a4.182 4.182 0 0 0-7.126 3.814a11.874 11.874 0 0 1-8.62-4.37a4.168 4.168 0 0 0-.566 2.103c0 1.45.738 2.731 1.86 3.481a4.168 4.168 0 0 1-1.894-.523v.052a4.185 4.185 0 0 0 3.355 4.101a4.21 4.21 0 0 1-1.89.072A4.185 4.185 0 0 0 7.97 16.65a8.394 8.394 0 0 1-6.191 1.732a11.83 11.83 0 0 0 6.41 1.88c7.693 0 11.9-6.373 11.9-11.9c0-.18-.005-.362-.013-.54a8.496 8.496 0 0 0 2.087-2.165z" />
                            </svg></a>
                        <a href="http://www.dinghyfdn.org" style="text-decoration: none;" target="_blank"
                            class="text-lg text-eve">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                viewBox="-2 -2 24 24">
                                <g fill="currentColor">
                                    <path
                                        d="M15 11.13v3.697h-2.143v-3.45c0-.866-.31-1.457-1.086-1.457c-.592 0-.945.398-1.1.784c-.056.138-.071.33-.071.522v3.601H8.456s.029-5.842 0-6.447H10.6v.913l-.014.021h.014v-.02c.285-.44.793-1.066 1.932-1.066c1.41 0 2.468.922 2.468 2.902zM6.213 5.271C5.48 5.271 5 5.753 5 6.385c0 .62.466 1.115 1.185 1.115h.014c.748 0 1.213-.496 1.213-1.115c-.014-.632-.465-1.114-1.199-1.114zm-1.086 9.556h2.144V8.38H5.127v6.447z" />
                                    <path
                                        d="M4 2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H4zm0-2h12a4 4 0 0 1 4 4v12a4 4 0 0 1-4 4H4a4 4 0 0 1-4-4V4a4 4 0 0 1 4-4z" />
                                </g>
                            </svg>

                        </a>
                        <a href="http://www.dinghyfdn.org" style="text-decoration: none;" target="_blank"
                            class="text-lg text-eve">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M21.543 6.498C22 8.28 22 12 22 12s0 3.72-.457 5.502c-.254.985-.997 1.76-1.938 2.022C17.896 20 12 20 12 20s-5.893 0-7.605-.476c-.945-.266-1.687-1.04-1.938-2.022C2 15.72 2 12 2 12s0-3.72.457-5.502c.254-.985.997-1.76 1.938-2.022C6.107 4 12 4 12 4s5.896 0 7.605.476c.945.266 1.687 1.04 1.938 2.022zM10 15.5l6-3.5l-6-3.5v7z" />
                            </svg>

                        </a>
                        <a href="http://www.dinghyfdn.org" style="text-decoration: none;" target="_blank"
                            class="text-lg text-eve">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M12 9a3 3 0 1 0 0 6a3 3 0 0 0 0-6zm0-2a5 5 0 1 1 0 10a5 5 0 0 1 0-10zm6.5-.25a1.25 1.25 0 0 1-2.5 0a1.25 1.25 0 0 1 2.5 0zM12 4c-2.474 0-2.878.007-4.029.058c-.784.037-1.31.142-1.798.332a2.886 2.886 0 0 0-1.08.703a2.89 2.89 0 0 0-.704 1.08c-.19.49-.295 1.015-.331 1.798C4.006 9.075 4 9.461 4 12c0 2.474.007 2.878.058 4.029c.037.783.142 1.31.331 1.797c.17.435.37.748.702 1.08c.337.336.65.537 1.08.703c.494.191 1.02.297 1.8.333C9.075 19.994 9.461 20 12 20c2.474 0 2.878-.007 4.029-.058c.782-.037 1.309-.142 1.797-.331a2.92 2.92 0 0 0 1.08-.702c.337-.337.538-.65.704-1.08c.19-.493.296-1.02.332-1.8c.052-1.104.058-1.49.058-4.029c0-2.474-.007-2.878-.058-4.029c-.037-.782-.142-1.31-.332-1.798a2.911 2.911 0 0 0-.703-1.08a2.884 2.884 0 0 0-1.08-.704c-.49-.19-1.016-.295-1.798-.331C14.925 4.006 14.539 4 12 4zm0-2c2.717 0 3.056.01 4.122.06c1.065.05 1.79.217 2.428.465c.66.254 1.216.598 1.772 1.153a4.908 4.908 0 0 1 1.153 1.772c.247.637.415 1.363.465 2.428c.047 1.066.06 1.405.06 4.122c0 2.717-.01 3.056-.06 4.122c-.05 1.065-.218 1.79-.465 2.428a4.883 4.883 0 0 1-1.153 1.772a4.915 4.915 0 0 1-1.772 1.153c-.637.247-1.363.415-2.428.465c-1.066.047-1.405.06-4.122.06c-2.717 0-3.056-.01-4.122-.06c-1.065-.05-1.79-.218-2.428-.465a4.89 4.89 0 0 1-1.772-1.153a4.904 4.904 0 0 1-1.153-1.772c-.248-.637-.415-1.363-.465-2.428C2.013 15.056 2 14.717 2 12c0-2.717.01-3.056.06-4.122c.05-1.066.217-1.79.465-2.428a4.88 4.88 0 0 1 1.153-1.772A4.897 4.897 0 0 1 5.45 2.525c.638-.248 1.362-.415 2.428-.465C8.944 2.013 9.283 2 12 2z" />
                            </svg>
                        </a>
                    </center>

                    <p style="text-align: center; color: #666666; font-size: 12px; margin: 20px 0;">
                        Copyright © 2023. All&nbsp;rights&nbsp;reserved.<br />
                    </p>
                </td>
            </tr>

        </table>

    </center>
</body>

</html>
