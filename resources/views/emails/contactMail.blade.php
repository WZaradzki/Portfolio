<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office"
    xmlns:v="urn:schemas-microsoft-com:vml" lang="pl">

<head>
    <link rel="stylesheet" type="text/css" hs-webfonts="true"
        href="https://fonts.googleapis.com/css?family=Nunito+Sans|Nunito+Sans:i,b,bi">
    <title>Dziękuje za kontakt - Wiktor Zaradzki</title>
    <meta property="og:title" content="Dziękuje za kontakt - Wiktor Zaradzki">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style type="text/css">
        a {
            text-decoration: underline;
            color: inherit;
            font-weight: bold;
            color: #253342;
        }

        h1 {
            font-size: 56px;
        }

        h2 {
            font-size: 28px;
            font-weight: 900;
        }

        p {
            font-weight: 100;
        }

        td {
            vertical-align: top;
        }

        #email {
            margin: auto;
            width: 600px;
            background-color: #eeeeee;
            color: #222831
        }

        .a-link {
            font-size: 12px;

            background-color: #ffd369;
            border: none;
            padding: 10px;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 900;
            color: #222831;
            border-radius: 5px;
            text-align: center;
            box-shadow: 3px 3px #222831;
        }

        .subtle-link {
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #CBD6E2;
        }

    </style>

</head>

<body bgcolor="#F5F8FA"
    style="width: 100%; margin: auto 0; padding:0; font-family:Nunito Sans, sans-serif; font-size:18px; color:#33475B; word-break:break-word">

    <! View in Browser Link -->

        <div id="email">
            {{-- <table align="right" role="presentation">
                <tr>
                    <td>
                        <a class="subtle-link" href="#">View in Browser</a>
                    </td>
                <tr>
            </table> --}}


            <! Banner -->
                <table role="presentation" width="100%">
                    <tr>

                        <td bgcolor="#ffd369" align="center" style="color: white;">

                            <img alt="Logo" src="{{asset('/storage/assets/logo/logo.png')}}" width="400px" align="middle">

                            <h1 style="font-size: 2.4rem; color:#222831;">{{ $contact->name_surname }}</h1>

                        </td>
                </table>




                <! First Row -->

                    <table role=" presentation" border="0" cellpadding="0" cellspacing="10px"
                        style="padding: 30px 30px 30px 60px;">
                        <tr>
                            <td>
                                <p>
                                    Email: {{ $contact->email }} <br>
                                    Telefon: {{ $contact->phone }} <br>
                                    Temat: {{ $contact->subject }} <br>
                                    Tekst: {{ $contact->text }} <br>
                                </p>

                            </td>
                        </tr>
                    </table>



                    <! Banner Row -->
                        <table role="presentation" bgcolor="#222831" width="100%"
                            style="color: #eeeeee;margin-top: 50px;">
                            <tr>
                                <td align="center" style="padding: 30px 30px;">

                                    <h2 style="font-size: 24px;">Wiktor Zaradzki</h2>
                                    <p style="font-size: 9px;">
                                        Copyright © 2021 Wiktor Zaradzki

                                    </p>
                                </td>
                            </tr>
                        </table>


        </div>
</body>

</html>
