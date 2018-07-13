@php
  $h1 = 'font-size: 1.50em;';
  $h2 = 'font-size: 1.30em;';
  $h3 = 'font-size: 1.15em;';
  $h4 = 'font-size: 1.00em;';
@endphp

@component('components.mail.message', compact('input'))

<h1 style="{{ $h1 }}">Hi,</h1>

<p>Just letting you know that your site, {{ config('name') }}, has new contact message from {{ $input['name'] }} ({{ $input['email'] }}).</p>

<p style="{{ $h3 }}"><strong>Contact Information:</strong></p>

<p>
  <strong>Customer Name:</strong> {{ $input['name'] }}
  <br>
  <strong>Email Address:</strong> {{ $input['email'] }}
  <br>
  <strong>Phone No.:</strong> {{ $input['phone'] }}
  <br><br>
  <strong>Subject:</strong> {!! e($input['subject']) !!}
  <br><br>
  <strong>Message:</strong>
  <br>
  {!! nl2br(e($input['message'])) !!}
</p>

{{-- # Checkout form

## Below is an example form built entirely with Bootstrap's form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without <span style="color: red;">completing</span> it.

[You can use numbers for reference-style link definitions][1]
![alt text][logo]

| Tables        | Are           | Cool  |
| ------------- |:-------------:| -----:|
| col 3 is      | right-aligned | $1600 |
| col 2 is      | centered      |   $12 |
| zebra stripes | are neat      |    $1 |

Markdown | Less | Pretty
--- | --- | ---
*Still* | `renders` | **nicely**
1 | 2 | 3

[![IMAGE ALT TEXT HERE](http://img.youtube.com/vi/CY_es1bpYco/0.jpg)](http://www.youtube.com/watch?v=CY_es1bpYco)

[1]: http://slashdot.org
[logo]: https://github.com/adam-p/markdown-here/raw/master/src/common/images/icon48.png "Logo Title Text 2" --}}

@endcomponent
