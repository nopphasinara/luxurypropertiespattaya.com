<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="xxx">
  <title>xxx</title>
</head>
<body {!! attrs(['body'], ['body']) !!}>
  <table {!! attrs(['tb_100'], ['tb', 'b_0']) !!}>
    <tr>
      <td {!! attrs(['td_100', 'h_50px'], ['td']) !!}>&nbsp;</td>
    </tr>
    <tr>
      <td {!! attrs(['td_100', 'center'], ['td']) !!}>
        <table {!! attrs(['tb_content'], ['tb', 'r_3', 'r_3w', 'r_3m', 'bg_white']) !!}>
          <tr>
            <td {!! attrs(['td_100', 'h_30px', 'options' => ['colspan' => '3']], ['td']) !!}>&nbsp;</td>
          </tr>
          <tr>
            <td {!! attrs(['td_gutter'], ['td']) !!}>&nbsp;</td>
            <td {!! attrs(['td', 'center'], ['td']) !!}>
              <a href="{{ url('/') }}" {!! attrs(['link'], ['link']) !!}>
                <img src="{{ asset('images/logo.png') }}" alt="{{ config('custom.site_name') }}" {!! attrs(['img', 'logo'], ['img', 'logo']) !!}>
              </a>
            </td>
            <td {!! attrs(['td_gutter'], ['td']) !!}>&nbsp;</td>
          </tr>
          <tr>
            <td {!! attrs(['td_100', 'h_30px', 'options' => ['colspan' => '3']], ['td']) !!}>&nbsp;</td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td {!! attrs(['td_100', 'center'], ['td']) !!}>
        <table {!! attrs(['tb_content'], ['tb', 'r_3', 'r_3w', 'r_3m', 'bg_white']) !!}>
          <tr>
            <td {!! attrs(['td_gutter'], ['td']) !!}>&nbsp;</td>
            <td {!! attrs(['td', 'left'], ['td']) !!}>
              <p {!! attrs(['p'], ['p']) !!}>Hi, {{ config('custom.site_name') }}</p>
              
              <p {!! attrs(['p'], ['p']) !!}>Just dropping to let you know you have new business submitted from {{ $input['name'] }}.</p>
              
              <p {!! attrs(['p'], ['p']) !!}>Review this listing here <a href="{{ env('APP_ADMIN_URL') }}/admin/directories/{{ $input['created_id'] }}/edit" {!! attrs(['link'], ['link', 'u', 'text_white']) !!}>Click to review</a> {{ $input['name'] }}.</p>
              
              <p {!! attrs(['p'], ['p']) !!}><strong>Business Information:</strong></p>
              
              <p {!! attrs(['p'], ['p']) !!}><strong>Business Name:</strong> {{ $input['name'] }}</p>
              <p {!! attrs(['p'], ['p']) !!}><strong>Email:</strong> <a href="mailto: {{ $input['email'] }}" {!! attrs(['link'], ['link', 'text_white']) !!}>{{ $input['email'] }}</a></p>
              <p {!! attrs(['p'], ['p']) !!}><strong>Phone No.:</strong> {{ $input['phone'] }}</p>
              <p {!! attrs(['p'], ['p']) !!}><strong>Website:</strong> {{ $input['website'] }}</p>
              <p {!! attrs(['p'], ['p']) !!}><strong>Category:</strong> {{ $input['category_name'] }}</p>
              @if ($input['image_path'])
                <p {!! attrs(['p'], ['p']) !!}><strong>Image:</strong></p>
                <p {!! attrs(['p'], ['p']) !!}><img src="{{ asset('uploads/' . $input['image_path']) }}" height="140" alt="{{ $input['name'] }}"></p>
              @endif
              <p {!! attrs(['p'], ['p']) !!}><strong>Message:</strong></p>
              <p {!! attrs(['p'], ['p']) !!}>{!! nl2br(htmlentities($input['message'])) !!}</p>
            </td>
            <td {!! attrs(['td_gutter'], ['td']) !!}>&nbsp;</td>
          </tr>
          <tr>
            <td {!! attrs(['td_100', 'h_20px', 'options' => ['colspan' => '3']], ['td']) !!}>&nbsp;</td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td {!! attrs(['td_100', 'h_20px'], ['td']) !!}>&nbsp;</td>
    </tr>
    <tr>
      <td {!! attrs(['td_100', 'center'], ['td']) !!}>
        <table {!! attrs(['tb_content'], ['tb', 'r_3', 'r_3w', 'r_3m', 'bg_primary', 'text_white']) !!}>
          <tr>
            <td {!! attrs(['td_100', 'h_10px', 'options' => ['colspan' => '3']], ['td']) !!}>&nbsp;</td>
          </tr>
          <tr>
            <td {!! attrs(['td_gutter'], ['td']) !!}>&nbsp;</td>
            <td {!! attrs(['td', 'center'], ['td']) !!}>
              <p {!! attrs(['p'], ['p', 'p_mb_0']) !!}>Call us at {{ config('custom.phone_number') }} or email to <a href="mailto: {{ config('custom.primary_email') }}" {!! attrs(['link'], ['link', 'link_white']) !!}>{{ config('custom.primary_email') }}</a></p>
            </td>
            <td {!! attrs(['td_gutter'], ['td']) !!}>&nbsp;</td>
          </tr>
          <tr>
            <td {!! attrs(['td_100', 'h_10px', 'options' => ['colspan' => '3']], ['td']) !!}>&nbsp;</td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td {!! attrs(['td_100', 'h_20px', 'options' => ['colspan' => '3']], ['td']) !!}>&nbsp;</td>
    </tr>
    <tr>
      <td {!! attrs(['td_100', 'center'], ['td']) !!}>
        <table {!! attrs(['tb_content'], ['tb', 'tb_footer']) !!}>
          <tr>
            <td {!! attrs(['td_gutter'], ['td']) !!}>&nbsp;</td>
            <td {!! attrs(['td', 'center'], ['td']) !!}>
              <p {!! attrs(['p'], ['p', 'p_mb_0']) !!}>Copyright &copy; 2018 <a href="{{ url('/') }}" {!! attrs(['link'], ['link']) !!}><strong>{{ config('custom.site_name') }}</strong></a></p>
              
              <p {!! attrs(['p'], ['p']) !!}>{{ config('custom.office_address') }}</p>
              
              <hr {!! attrs(['hr'], ['hr']) !!}>
              
              <p {!! attrs(['p'], ['p', 'p_mb_0']) !!}>This is a contact report from {{ config('custom.site_name') }}.</p>
              <p {!! attrs(['p'], ['p']) !!}>Please do not reply to this email.</p>
            </td>
            <td {!! attrs(['td_gutter'], ['td']) !!}>&nbsp;</td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td {!! attrs(['td_100', 'h_50px'], ['td']) !!}>&nbsp;</td>
    </tr>
  </table>
</body>
</html>
