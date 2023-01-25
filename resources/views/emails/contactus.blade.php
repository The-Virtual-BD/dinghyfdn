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
</head>

<body style="background: #eeeeee; padding: 10px; font-family: 'Open Sans', sans-serif, Helvetica, Arial;">
    <center>
        <!-- ** Table begins here
    ----------------------------------->
        <!-- Set table width to fixed width for Outlook(Outlook does not support max-width) -->
        <table width="100%" cellpadding="0" cellspacing="0" bgcolor="FFFFFF"
            style=" max-width: 600px !important; margin: 0 auto; background-color:transparent;">
            <tr>
                <td style="padding: 20px; text-align: center;">
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 295.31 81.26" width="196px">
                        <defs>
                            <style>
                                .cls-1 {
                                    fill: #2b2d42;
                                }

                                .cls-2 {
                                    fill: #e63947;
                                }
                            </style>
                        </defs>
                        <title>Dinghy FDN SVG</title>
                        <g id="Icon">
                            <path class="cls-1"
                                d="M9.44,75.66,58.26,2.09c3.81,9,7.3,17.71,14.75,22.45,8.1,5.16,21,6.05,31.93,7.23Z"
                                transform="translate(0 -2.09)" />
                            <path class="cls-2"
                                d="M0,66.31,106.11,18.54S122.71,47.2,67.2,72.19c-18.39,8.28-32,11.88-41.9,11C5.23,81.56,0,66.31,0,66.31Z"
                                transform="translate(0 -2.09)" />
                            <circle class="cls-2" cx="80.36" cy="10.16" r="9.73" />
                        </g>
                        <g id="English">
                            <path class="cls-1"
                                d="M130.82,41.49,134.3,13h10.07a14.14,14.14,0,0,1,6.37,1.28,9.86,9.86,0,0,1,3.93,3.4,12.94,12.94,0,0,1,1.87,4.77,17.76,17.76,0,0,1,.18,5.3A15.59,15.59,0,0,1,155,33.46a15.25,15.25,0,0,1-3.36,4.34,14.65,14.65,0,0,1-4.53,2.74,14.31,14.31,0,0,1-5.17,1Zm6.27-5.42h4.57a10.4,10.4,0,0,0,3.5-.56A8.41,8.41,0,0,0,148,33.87a8.6,8.6,0,0,0,2-2.73,11.92,11.92,0,0,0,1-3.78,9.3,9.3,0,0,0-.35-4.55,6.45,6.45,0,0,0-1.93-2.73,7.57,7.57,0,0,0-2.58-1.33,8.7,8.7,0,0,0-2.3-.37h-4.57Z"
                                transform="translate(0 -2.09)" />
                            <path class="cls-1" d="M164,13h5.81l-3.48,28.49h-5.81Z" transform="translate(0 -2.09)" />
                            <path class="cls-1"
                                d="M199.18,42.65H199l-19.2-19.51,1.54.93-2,17.42h-5.69l3.64-29.61h.23l18.74,19.43-1.16-.54,2-17.77h5.65Z"
                                transform="translate(0 -2.09)" />
                            <path class="cls-1"
                                d="M230.46,39.32a8.08,8.08,0,0,1-2.34,1.24,19.39,19.39,0,0,1-3.52,1,19.09,19.09,0,0,1-3.66.37,14.59,14.59,0,0,1-2-.2,20.59,20.59,0,0,1-2.89-.67,16.14,16.14,0,0,1-3.21-1.4,12.53,12.53,0,0,1-3-2.36,11.09,11.09,0,0,1-2.21-3.54,13.48,13.48,0,0,1-.83-5,18.42,18.42,0,0,1,.52-4.16A17.72,17.72,0,0,1,209,20.34a14.74,14.74,0,0,1,2.94-3.8,13.55,13.55,0,0,1,4.36-2.69,15.83,15.83,0,0,1,6-1,24.14,24.14,0,0,1,5,.66,15.16,15.16,0,0,1,4.76,2l-2.48,5.11A11.72,11.72,0,0,0,226,19.06a13.08,13.08,0,0,0-3.83-.52,10.62,10.62,0,0,0-3.87.69A8.11,8.11,0,0,0,215.6,21a8.94,8.94,0,0,0-1.72,2.39A10.41,10.41,0,0,0,213,26a12.56,12.56,0,0,0-.27,2.57,7.23,7.23,0,0,0,.73,3.43,6.64,6.64,0,0,0,1.92,2.24,9.33,9.33,0,0,0,2.46,1.32,11.87,11.87,0,0,0,2.42.6,14.39,14.39,0,0,0,1.76.15,8.18,8.18,0,0,0,1.74-.09,4.9,4.9,0,0,0,1.43-.45l.43-3.72h-4.92l.66-5.38H232Z"
                                transform="translate(0 -2.09)" />
                            <path class="cls-1"
                                d="M264.07,13l-3.49,28.49h-5.8l1.43-11.57H243.86l-1.43,11.57h-5.81L240.1,13h5.81l-1.39,11.42h12.35L258.26,13Z"
                                transform="translate(0 -2.09)" />
                            <path class="cls-1"
                                d="M276.61,32.63,268.52,13h6.93L281,27.79l-1.66.11L288.38,13h6.93L282.22,32.63l-1.08,8.86h-5.62Z"
                                transform="translate(0 -2.09)" />
                            <path class="cls-1"
                                d="M131.92,48h10.72l-.4,3.22H135l-.47,4h6.25l-.42,3.24h-6.25l-.81,6.74h-3.5Z"
                                transform="translate(0 -2.09)" />
                            <path class="cls-1"
                                d="M152.1,65.34a9.53,9.53,0,0,1-2.92-.47,7.85,7.85,0,0,1-2.66-1.45,7.15,7.15,0,0,1-1.92-2.54,8.75,8.75,0,0,1-.73-3.7,9.49,9.49,0,0,1,.58-3.18,9.64,9.64,0,0,1,1.72-3,8.87,8.87,0,0,1,2.91-2.25,9.36,9.36,0,0,1,4.12-.86,9.83,9.83,0,0,1,2.92.46,8.15,8.15,0,0,1,2.66,1.46,7.15,7.15,0,0,1,1.92,2.54,8.75,8.75,0,0,1,.72,3.7,10,10,0,0,1-2.29,6.21,8.81,8.81,0,0,1-2.92,2.25A9.28,9.28,0,0,1,152.1,65.34Zm.05-3.26a6.11,6.11,0,0,0,2.69-.55,5,5,0,0,0,1.78-1.43,6.22,6.22,0,0,0,1-1.91,6.82,6.82,0,0,0,.32-2,5.17,5.17,0,0,0-.36-1.93,5.06,5.06,0,0,0-1-1.62,4.66,4.66,0,0,0-3.49-1.53,5.87,5.87,0,0,0-2.68.55,4.81,4.81,0,0,0-1.76,1.43,5.77,5.77,0,0,0-1,1.92,7.36,7.36,0,0,0-.29,2,5.48,5.48,0,0,0,.35,1.92,5.18,5.18,0,0,0,1,1.63,4.49,4.49,0,0,0,3.45,1.53Z"
                                transform="translate(0 -2.09)" />
                            <path class="cls-1"
                                d="M167.92,58.84a2.82,2.82,0,0,0,.27,1.56,2.88,2.88,0,0,0,1.09,1.21,3,3,0,0,0,1.67.47,3.66,3.66,0,0,0,1.8-.47,4.45,4.45,0,0,0,1.41-1.21,3.14,3.14,0,0,0,.66-1.56L176.15,48h3.5l-1.33,10.89A6.81,6.81,0,0,1,177,62.25a8,8,0,0,1-6.41,3.11,6.81,6.81,0,0,1-3.39-.82,5.46,5.46,0,0,1-2.23-2.29,5.59,5.59,0,0,1-.51-3.34L165.75,48h3.5Z"
                                transform="translate(0 -2.09)" />
                            <path class="cls-1"
                                d="M197.34,65.87h-.1L185.68,54.13l.94.56L185.4,65.18H182l2.19-17.83h.14l11.28,11.7-.7-.33L196.12,48h3.41Z"
                                transform="translate(0 -2.09)" />
                            <path class="cls-1"
                                d="M201.88,65.18,204,48H210a8.51,8.51,0,0,1,3.83.77,6,6,0,0,1,2.37,2.05,8,8,0,0,1,1.13,2.87,10.67,10.67,0,0,1,.1,3.19,9.65,9.65,0,0,1-1,3.44,9.07,9.07,0,0,1-2,2.61,8.79,8.79,0,0,1-2.73,1.65,8.46,8.46,0,0,1-3.11.58Zm3.78-3.27h2.75a6.42,6.42,0,0,0,2.1-.33,5.19,5.19,0,0,0,1.71-1,5.24,5.24,0,0,0,1.2-1.65,7.07,7.07,0,0,0,.6-2.27,5.62,5.62,0,0,0-.21-2.74,3.83,3.83,0,0,0-1.16-1.64,4.54,4.54,0,0,0-1.55-.81,5.72,5.72,0,0,0-1.39-.22H207Z"
                                transform="translate(0 -2.09)" />
                            <path class="cls-1"
                                d="M220.64,65.18h-3.33l9.93-17.83h.18L233,65.18h-3.91l-3.41-12.54L228.31,51Zm2.73-6.2h5.15l.84,2.84H222Z"
                                transform="translate(0 -2.09)" />
                            <path class="cls-1" d="M235.23,48h11.56l-.42,3.34h-4.1l-1.7,13.82h-3.5l1.7-13.82h-4Z"
                                transform="translate(0 -2.09)" />
                            <path class="cls-1" d="M250.05,48h3.5l-2.1,17.16H248Z" transform="translate(0 -2.09)" />
                            <path class="cls-1"
                                d="M264.2,65.34a9.65,9.65,0,0,1-2.93-.47,7.9,7.9,0,0,1-2.65-1.45,7.15,7.15,0,0,1-1.92-2.54,8.6,8.6,0,0,1-.73-3.7,10,10,0,0,1,2.3-6.21,8.87,8.87,0,0,1,2.91-2.25,9.36,9.36,0,0,1,4.12-.86,9.83,9.83,0,0,1,2.92.46,8.15,8.15,0,0,1,2.66,1.46,7.15,7.15,0,0,1,1.92,2.54,8.75,8.75,0,0,1,.72,3.7,10,10,0,0,1-2.29,6.21,8.81,8.81,0,0,1-2.92,2.25A9.28,9.28,0,0,1,264.2,65.34Zm.05-3.26a6.11,6.11,0,0,0,2.69-.55,5,5,0,0,0,1.78-1.43,6.22,6.22,0,0,0,1-1.91,6.82,6.82,0,0,0,.32-2,5.17,5.17,0,0,0-.36-1.93,5.06,5.06,0,0,0-1-1.62,4.77,4.77,0,0,0-1.54-1.12,4.65,4.65,0,0,0-2-.41,5.9,5.9,0,0,0-2.68.55,4.77,4.77,0,0,0-1.75,1.43,5.77,5.77,0,0,0-1,1.92,7.36,7.36,0,0,0-.29,2,5.26,5.26,0,0,0,.35,1.92,5.18,5.18,0,0,0,1,1.63,4.49,4.49,0,0,0,3.45,1.53Z"
                                transform="translate(0 -2.09)" />
                            <path class="cls-1"
                                d="M291.09,65.87H291L279.44,54.13l.93.56-1.21,10.49h-3.43l2.19-17.83h.14l11.28,11.7-.69-.33L289.88,48h3.4Z"
                                transform="translate(0 -2.09)" />
                        </g>
                    </svg> --}}
                    <img src="{{asset('logo.png')}}" alt="" srcset="" width="196px">
                </td>
            </tr>
            <tr>
                <td style="padding: 20px; text-align: center;" class="bg-eve">
                    <h1 style="color: #ffffff" class="text-white font-raleway uppercase font-bold">Thanks !</h1>
                </td>
            </tr>
            <tr class="" style="background-color: #ffffff;">
                <td class="p-5">
                    {{-- <p style="font-size:30px; margin: 5px;text-align:center">{{ $newsletter['title'] }}</p> --}}
                    <p class="font-raleway leading-6">
                        Dear User, <br />
                        {{$msg}}
                    </p>
                    {{-- <hr style="border: 1px solid #cecece5e;margin-top: 52px;"> --}}
                    <center class="my-12">
                        <a href="http://www.dinghyfdn.org" style="color: #fff; text-decoration: none;" target="_blank">
                            <button
                                class="inline-flex items-center sm:px-5 sm:py-4 bg-eve font-bold text-sm text-white font-raleway uppercase tracking-widest hover:bg-white border border-eve hover:border hover:border-eve hover:text-eve  justify-center"
                                type="submit">
                                Visit Site
                            </button>
                        </a>
                    </center>
                </td>
            </tr>
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
