<!DOCTYPE html>
<html>
  <head>
      <link rel="icon" type="img/ico" href="/images/icons/mychildday.ico">
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet">
      <meta charset="utf-8">

      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="/css/reset.css">

      <style media="screen">

        #buttongoback {
          display: block;
          margin: auto;
          padding: 20px 20px;
          min-width: 10%;
          max-width: 120px;
          font-family: 'Source Sans Pro', sans-serif;
          font-size: 14px;
          border-radius: 3px;
          letter-spacing: 0.5px;

          background-color: #4CAF50;
          color: white;
          text-transform: uppercase;

          border: none;
          cursor: pointer;

          box-shadow: 0px 2px #3F9643;
        }


        #buttongoback:hover {
          background-color: #3F9643;
          box-shadow: none;
        }

        #buttongoback:active {
          -webkit-box-shadow: inset 0px 1px 1px 1px rgba(0, 0, 0, 0.4);
          -moz-box-shadow: inset 0px 1px 1px 1px rgba(0, 0, 0, 0.4);
          box-shadow: inset 0px 1px 1px 1px rgba(0, 0, 0, 0.4);
        }

        #buttongoback img {
          height: 14px;
        }

        .errorsImgLogo {
          height: 50px;
          display: block;
          margin: auto;
          padding-left: 10px;
          padding-right: 10px;
        }

        .errorsText {
          display: block;
          margin: auto;
          text-align: center;
          color: #3f3f3f);

        }

        .errorsTitle {
          font-size: 20px;
          margin-top: 50px;
          font-weight: bold;
          padding-left: 10px;
          padding-right: 10px;
        }

        .errorsMessage {
          --font-size: 20px;
          font-weight: bold;
        }

        @media screen and (min-height: 600px) {

        }
          #buttongoback {
            margin-top: 15vh;
          }

          .errorsTitle {
            margin-top: 12vh;
          }
        }

        }

      </style>

      <title>@yield('title')</title>
  </head>
  <body>

    <!-- CONTENT -->
    @yield('content')


  </body>
  </html>
