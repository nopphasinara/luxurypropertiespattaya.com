<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <title>Please note that as from 24th May you will only be able to access your online tracking profile by entering your Order ID.</title>
</head>
<body {!! attrs(['body'], ['body', 'options' => ['color' => '#85868D']]) !!}>
  <table {!! attrs(['tb_100'], ['tb', 'b_0']) !!}>
    <tr>
      <td {!! attrs(['td_100', 'h_40px'], ['td']) !!}>&nbsp;</td>
    </tr>
    <tr>
      <td {!! attrs(['td_100', 'center'], ['td']) !!}>
        <table {!! attrs(['tb_content'], ['tb', 'options' => ['background-color' => '#3C3C3C']]) !!}>
          <tr>
            <td {!! attrs(['td_100', 'h_60px', 'options' => ['colspan' => '3']], ['td']) !!}>&nbsp;</td>
          </tr>
          <tr>
            <td {!! attrs(['td_gutter'], ['td']) !!}>&nbsp;</td>
            <td {!! attrs(['td', 'center'], ['td']) !!}>
              <a href="#" {!! attrs(['link'], ['link']) !!}>
                <img {!! attrs(['img'], ['img', 'options' => ['width' => 'auto', 'height' => '57px']]) !!} src="{{ $input['logo'] }}" alt="{{ $input['name'] }}">
              </a>
            </td>
            <td {!! attrs(['td_gutter'], ['td']) !!}>&nbsp;</td>
          </tr>
          <tr>
            <td {!! attrs(['td_100', 'h_40px', 'options' => ['colspan' => '3']], ['td']) !!}>&nbsp;</td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td {!! attrs(['td_100', 'center'], ['td']) !!}>
        <table {!! attrs(['tb_content'], ['tb', 'options' => ['background-color' => '#3EB8E6']]) !!}>
          <tr>
            <td {!! attrs(['td', 'center'], ['td']) !!}>
              <img src="{{ $input['baseHref'] . 'public/images/banner-email.png' }}" width="auto" height="170" alt="{{ $input['name'] }}">
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td {!! attrs(['td_100', 'center'], ['td']) !!}>
        <table {!! attrs(['tb_content'], ['tb', 'rounded_sm', 'bg_white']) !!}>
          <tr>
            <td {!! attrs(['td', 'h_30px', 'options' => ['colspan' => '3']], ['td']) !!}>&nbsp;</td>
          </tr>
          <tr>
            <td {!! attrs(['td_gutter'], ['td']) !!}>&nbsp;</td>
            <td {!! attrs(['td_content', 'left'], ['td']) !!}>
              <p {!! attrs(['p'], ['p']) !!}>
                Dear <a href="mailto:{{ $input['customer']['email'] }}" {!! attrs(['link'], ['link']) !!}><strong {!! attrs([''], ['text_black']) !!}>{{ $input['customer']['email'] }}</strong></a>
              </p>
              
              <p {!! attrs(['p'], ['p']) !!}>
                You may have heard about the new GDPR regulations which come in effect on 25th May.
              </p>
              
              <p {!! attrs(['p'], ['p']) !!}>
                These affect the way we store information and how you are able to access your online tracking profile in future.
              </p>
              <p {!! attrs(['p'], ['p']) !!}>
                Please note that as from 24th May you will only be able to access your online tracking profile by entering your Order ID.
              </p>
              <p {!! attrs(['p'], ['p']) !!}>
                Tracking via your email address will no longer be an option.
              </p>
              <p {!! attrs(['p'], ['p']) !!}>
                Your latest Order ID number is: <strong {!! attrs([''], ['u', 'options' => ['color' => '#007AB8']]) !!}>{{ $input['customer']['order_number'] }}</strong>
              </p>
              <p {!! attrs(['p'], ['p']) !!}>
                We also require your permission to contact you about the service we offer.
              </p>
              <p {!! attrs(['p'], ['p']) !!}>
                Please let us know that you wish to continue receiving emails from us by clicking on the acceptance button below.
              </p>
              <p {!! attrs(['p'], ['p', 'center', 'pt_xl', 'pb_xl']) !!}>
                <a href="{{ $input['baseHref'] . 'unsubscribed-tracking-data/?email=' . $input['customer']['email'] . '&name=' . $input['customer']['name'] }}" {!! attrs(['link'], ['rounded_sm', 'btn', 'text_md', 'options' => ['background-color' => '#43A25F', 'color' => '#fff', 'text-decoration' => 'none']]) !!}>
                  <strong>ACCEPT ALL EMAILS</strong>
                </a>
                {{-- <a href="{{ $input['baseHref'] . 'unsubscribed-tracking-data/?email=' . $input['customer']['email'] }}">
                  <img src="{{ $input['baseHref'] . 'public/images/button-unsubscribed-tracking.png' }}" width="auto" height="170" alt="Unsubscribed">
                </a> --}}
              </p>
              <p {!! attrs(['p'], ['p']) !!}>
                If you would like any further information or assistance, please do not hesitate to let me know.
              </p>
              <p {!! attrs(['p'], ['p']) !!}>
                <strong>Best wishes,</strong>
                <br>
                Alex
              </p>
              <p {!! attrs(['p'], ['p']) !!}>
                <a href="{{ $input['baseHref'] }}" {!! attrs(['link'], ['u', 'options' => ['color' => '#85868D']]) !!}><strong>{{ $input['name'] }}</strong></a>
              </p>
            </td>
            <td {!! attrs(['td_gutter'], ['td']) !!}>&nbsp;</td>
          </tr>
          <tr>
            <td {!! attrs(['td', 'h_20px', 'options' => ['colspan' => '3']], ['td']) !!}>&nbsp;</td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td {!! attrs(['td_100', 'center'], ['td']) !!}>
        <table {!! attrs(['tb_content'], ['tb', 'text_white', 'options' => ['background-color' => '#007AB8']]) !!}>
          <tr>
            <td {!! attrs(['td_100', 'h_20px', 'options' => ['colspan' => '3']], ['td']) !!}>&nbsp;</td>
          </tr>
          <tr>
            <td {!! attrs(['td_gutter'], ['td']) !!}>&nbsp;</td>
            <td {!! attrs(['td', 'center'], ['td']) !!}>
              <p {!! attrs(['p'], ['text_lg', 'p', 'm_0', 'mb_sm']) !!}><strong>CUSTOMER SERVICE</strong></p>
              Toll Free <a href="tel:{{ str_replace(' ', '', $input['tollfree']) }}" {!! attrs(['link'], ['u', 'text_white']) !!}><strong>{{ $input['tollfree'] }}</strong></a> or email us at <a href="mailto:{{ $input['primary_email'] }}" {!! attrs(['link'], ['u', 'text_white']) !!}><strong>{{ $input['primary_email'] }}</strong></a>
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
      <td {!! attrs(['td_100', 'h_20px', 'options' => ['colspan' => '3']], ['td']) !!}>&nbsp;</td>
    </tr>
    <tr>
      <td {!! attrs(['td_100', 'center'], ['td']) !!}>
        <table {!! attrs(['tb_content'], ['tb', 'tb_footer']) !!}>
          <tr>
            <td {!! attrs(['td_gutter'], ['td']) !!}>&nbsp;</td>
            <td {!! attrs(['td', 'center'], ['td']) !!}>
              <p {!! attrs(['p'], ['p', 'p_mb_0']) !!}>Copyright &copy; {{ $input['copyright_year'] }} <a href="{{ $input['baseHref'] }}" {!! attrs(['link'], ['link']) !!}><strong>{{ $input['name'] }}</strong></a>.</p>
              
              <p {!! attrs(['p'], ['p']) !!}>{{ $input['office_address'] }}</p>
              
              <hr {!! attrs(['hr'], ['hr']) !!}>
              
              <p {!! attrs(['p'], ['p', 'p_mb_0']) !!}>This is a contact report from {{ $input['primary_email'] }}.</p>
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
