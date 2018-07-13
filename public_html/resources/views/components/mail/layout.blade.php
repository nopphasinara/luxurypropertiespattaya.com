<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,600" crossorigin="anonymous">
  
  @push('hidden', 'overflow: hidden;')
  @push('table_reset', 'cellpadding="0" cellspacing="0"')
  @push('font_reset', 'font-size: 14px; color: #000; background-color: #fff; font-family: \'Roboto\', \'Helvetica\', \'sans-serif\';')
</head>
<body style="@stack('font_reset')">
  <table class="wrapper" width="100%" @stack('table_reset')>
    @isset($header)
      <tr>
        <td align="center">
          {!! $header !!}
        </td>
      </tr>
    @endisset
    <tr>
      <td align="center">
        {!! Illuminate\Mail\Markdown::parse($slot) !!}
      </td>
    </tr>
    @isset($footer)
      <tr>
        <td align="center">
          {!! $footer !!}
        </td>
      </tr>
    @endisset
  </table>
</body>
</html>
