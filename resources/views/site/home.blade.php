@extends('site.layout')
@section('title', 'Chat, calls, meetings and mail for your team')
@section('content')
<div class="hero wrap">
  <h1>Your team's chat, calls, meetings<br>and mail - in one app</h1>
  <p>ZARSX Meet brings messages, voice and video calls, online meetings with captions and recording, and business mail on your own
     domain together. Works in the browser and on Android. Free to start.</p>
  <div class="cta"><a class="btn p" href="{{ Route::has('register') ? route('register') : route('login') }}">Start free</a><a class="btn" href="{{ url('/pricing') }}">See pricing</a></div>
</div>
<section class="wrap"><div class="grid">
  <div class="card"><h3>Chat</h3><p>One-to-one and group chats, files, read receipts, replies and reactions - and chat with people nearby without internet on Android.</p></div>
  <div class="card"><h3>Calls</h3><p>Voice and video calls from chat, call waiting, blur your background, switch a voice call to video.</p></div>
  <div class="card"><h3>Meetings</h3><p>Meetings with live captions, recording, breakout rooms, polls, notes and a whiteboard; guests join with a link.</p></div>
  <div class="card"><h3>Mail and calendar</h3><p>Business mail on your own domain, "Help me write", calendar invites, and mail on your phone's mail app.</p></div>
</div></section>
<section class="wrap" style="text-align:center"><h2>Start free, grow when you need</h2>
  <p style="color:var(--mut)">Free for chat, calls and meetings. Bigger mailboxes from ₹49 per user a month.</p>
  <a class="btn p" href="{{ url('/pricing') }}">Compare plans</a></section>
@endsection
