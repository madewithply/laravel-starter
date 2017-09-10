<html>
  <head>
    <title>{{ config('backpack.base.project_name') }} Error 500</title>

    <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

    <style>
      body {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        color: #B0BEC5;
        display: table;
        font-weight: 100;
        font-family: 'Lato';
      }

      .container {
        text-align: center;
        display: table-cell;
        vertical-align: middle;
      }

      .content {
        text-align: center;
        display: inline-block;
      }

      .title {
        font-size: 156px;
      }

      .quote {
        font-size: 36px;
      }

      .explanation {
        font-size: 24px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="content">

      @unless(empty($sentryID))
        <!-- Sentry JS SDK 2.1.+ required -->
          <script src="https://cdn.ravenjs.com/3.3.0/raven.min.js"></script>

          <script>
              Raven.showReportDialog({
                  eventId: '{{ $sentryID }}',

                  // use the public DSN (dont include your secret!)
                  dsn: 'https://0a4f6609b36e47ba95d1315b987e1e2e@sentry.io/200852'
              });
          </script>
        @endunless


        <div class="title">500</div>
        <div class="quote">It's not you, it's me.</div>
        <div class="explanation">
          <br>
          <small>
            <?php
              $default_error_message = "An internal server error has occurred. If the error persists please contact the development team.";
            ?>
            {!! isset($exception)? ($exception->getMessage()?$exception->getMessage():$default_error_message): $default_error_message !!}
         </small>
       </div>
      </div>
    </div>
  </body>
</html>
