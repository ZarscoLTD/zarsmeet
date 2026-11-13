@extends('site.layout')
@section('title', 'Pricing')
@section('description', 'ZARSX Meet plans: Free for chat, calls and meetings; business mail from ₹49 per user a month.')
@section('content')
<div class="hero wrap"><h1>Simple pricing</h1><p>Chat, calls and meetings are free for everyone. Pay only for a bigger business mailbox. Prices per user a month, GST extra; pay yearly and get two months free.</p></div>
<section class="wrap"><div class="grid">
  <div class="card"><h3>Free</h3><div class="price">₹0</div><ul class="t"><li>Chat, voice and video calls</li><li>Meetings with captions and recording</li><li>{{ (int) config('mailbox.free_quota_mb', 30) }} MB mailbox</li></ul><a class="btn" href="{{ Route::has('register') ? route('register') : route('login') }}">Start free</a></div>
  @foreach ([['Business Lite', 49, 490, '5 GB mailbox on your own domain, webmail, phone app, spam filter'], ['Business Standard', 79, 790, '15 GB mailbox, shared addresses (sales@, support@), Google Drive archive'], ['Business Pro', 149, 1490, '50 GB mailbox for heavy mail users and long archives']] as $i => [$n, $m, $y, $what])
    <div @class(['card', 'pop' => $i === 1])><h3>{{ $n }}</h3><div class="price">₹{{ $m }} <small>/ user / month</small></div><small style="color:var(--mut)">or ₹{{ number_format($y) }} a year</small>
      <ul class="t"><li>Everything in Free</li><li>{{ $what }}</li></ul><a @class(['btn', 'p' => $i === 1]) href="https://insights.zarsx.in/next/marketplace">Get {{ $n }}</a></div>
  @endforeach
</div>
<p style="color:var(--mut);margin-top:18px">Need many users, your own server or help to move from another mail service? <a href="https://zarsx.in/contact/">Talk to us</a>.</p></section>
@endsection
