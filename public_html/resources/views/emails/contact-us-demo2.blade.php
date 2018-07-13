<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="xxx">
  <title>xxx</title>
  
  <style media="all">
    /* html, body { font-family: "Roboto", "Helvetica", "Arial", "sans-serif"; font-size: 14px; margin: 0 0; padding: 0 0; }
    body { color: #000; background-color: #fff; }
    a { text-decoration: none; color: #000; }
    img { border: none; outline: none; }
    img.logo { width: 260px; height: auto; }
    p.reset { margin: 0 auto; padding: 0; }
    hr { border: none; border-bottom: solid 1px #DDD; margin: 1em 0; padding: 0 0; }
    hr.reset { margin: 0; padding: 0; }
    table, thead, tbody, tfoot, table tr, table td, table th { border: none; } */
  </style>
</head>
<body style="{!! e_styles(['body']) !!}">
  <table {!! e_attrs(['table_100']) !!} style="{!! e_styles(['bg_footer']) !!}">
    <tr>
      <td {!! e_attrs(['td'], ['width' => '24']) !!} style="{!! e_styles(['td']) !!}">&nbsp;</td>
      <td {!! e_attrs(['td', 'center']) !!} style="{!! e_styles(['td']) !!}">
        
        <table id="footer" {!! e_attrs(['table'], ['width' => '540']) !!}>
          <tr>
            <td {!! e_attrs(['td']) !!} style="{!! e_styles(['td']) !!}">
              <p>Copyright &copy; 2018 <a href="{{ url('/') }}"><strong>{{ config('custom.site_name') }}</strong></a></p>
              
              <p>{{ config('custom.office_address') }}</p>
              
              <hr>
              
              <p>This is a contact report from {{ config('custom.site_name') }}.</p>
            </td>
          </tr>
        </table><!-- /#header -->
        
      </td>
      <td {!! e_attrs(['td'], ['width' => '24']) !!} style="{!! e_styles(['td']) !!}">&nbsp;</td>
    </tr>
  </table>
</body>
</html>
