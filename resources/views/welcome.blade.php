<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <style>
            @font-face {
              font-family: 'Raleway';
              font-style: normal;
              font-weight: 100;
              src: local('Raleway Thin'), local('Raleway-Thin'), url(https://fonts.gstatic.com/s/raleway/v12/1Ptsg8zYS_SKggPNwE44Q4FqPfE.woff2) format('woff2');
              unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            }
            /* latin */
            @font-face {
              font-family: 'Raleway';
              font-style: normal;
              font-weight: 100;
              src: local('Raleway Thin'), local('Raleway-Thin'), url(https://fonts.gstatic.com/s/raleway/v12/1Ptsg8zYS_SKggPNwE44TYFq.woff2) format('woff2');
              unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            }
            /* latin-ext */
            @font-face {
              font-family: 'Raleway';
              font-style: normal;
              font-weight: 600;
              src: local('Raleway SemiBold'), local('Raleway-SemiBold'), url(https://fonts.gstatic.com/s/raleway/v12/1Ptrg8zYS_SKggPNwPIsWqhPAMif.woff2) format('woff2');
              unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            }
            /* latin */
            @font-face {
              font-family: 'Raleway';
              font-style: normal;
              font-weight: 600;
              src: local('Raleway SemiBold'), local('Raleway-SemiBold'), url(https://fonts.gstatic.com/s/raleway/v12/1Ptrg8zYS_SKggPNwPIsWqZPAA.woff2) format('woff2');
              unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            }

            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {height: 100vh;}
    
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {position: relative;}
                
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {text-align: center;}
                
            .title {font-size: 84px;}
                
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {margin-bottom: 30px;}
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>
                <div class="links">
                    <a href="">Documentation</a>
                    <a href="">Laracasts</a>
                    <a href="">News</a>
                    <a href="">Forge</a>
                    <a href="">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
