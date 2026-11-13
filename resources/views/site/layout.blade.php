<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title') - ZARSX Meet</title>
<meta name="description" content="@yield('description', 'Chat, voice and video calls, meetings and business mail in one app for your team. Free to start.')">
<link rel="canonical" href="{{ url()->current() }}">
<meta property="og:title" content="@yield('title') - ZARSX Meet"><meta property="og:type" content="website"><meta property="og:url" content="{{ url()->current() }}">
<link rel="icon" href="{{ asset('favicon.ico') }}">
<style>
:root { --p: #4f46e5; --p2: #6366f1; --ink: #0f172a; --mut: #5b6475; --bg: #f6f7fb; --card: #fff; --line: #e3e8f0; }
@media (prefers-color-scheme: dark) { :root { --ink: #e6eaf2; --mut: #9aa4b8; --bg: #0b1020; --card: #121a2e; --line: #24304a; } }
* { box-sizing: border-box; } body { margin: 0; font: 16px/1.6 Inter, system-ui, -apple-system, "Segoe UI", Roboto, sans-serif; color: var(--ink); background: var(--bg); }
a { color: var(--p2); } .wrap { max-width: 1120px; margin: 0 auto; padding: 0 16px; }
header { position: sticky; top: 0; z-index: 9; background: color-mix(in srgb, var(--bg) 88%, transparent); backdrop-filter: blur(8px); border-bottom: 1px solid var(--line); }
header .wrap { display: flex; align-items: center; gap: 18px; height: 64px; flex-wrap: wrap; }
.brand { font-weight: 800; font-size: 19px; color: var(--ink); text-decoration: none; display: flex; align-items: center; gap: 8px; }
.brand i { width: 30px; height: 30px; border-radius: 9px; background: linear-gradient(135deg, var(--p), #a855f7); display: inline-block; }
nav { display: flex; gap: 16px; flex-wrap: wrap; flex: 1; } nav a { color: var(--mut); text-decoration: none; font-weight: 500; } nav a:hover, nav a.on { color: var(--ink); }
.btn { display: inline-flex; align-items: center; gap: 6px; padding: 10px 18px; border-radius: 12px; font-weight: 600; text-decoration: none; border: 1px solid var(--line); color: var(--ink); background: var(--card); }
.btn.p { background: var(--p); border-color: var(--p); color: #fff; }
.hero { padding: 72px 0 48px; text-align: center; } .hero h1 { font-size: clamp(32px, 6vw, 56px); line-height: 1.1; margin: 0 0 16px; letter-spacing: -.02em; }
.hero p { font-size: 19px; color: var(--mut); max-width: 720px; margin: 0 auto 28px; } .cta { display: flex; gap: 12px; justify-content: center; flex-wrap: wrap; }
.grid { display: grid; gap: 16px; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); } .card { background: var(--card); border: 1px solid var(--line); border-radius: 18px; padding: 22px; }
.card h3 { margin: 0 0 6px; font-size: 18px; } .card p, .card li { color: var(--mut); } section { padding: 40px 0; } h2 { font-size: 30px; margin: 0 0 18px; letter-spacing: -.01em; }
.price { font-size: 34px; font-weight: 800; } .price small { font-size: 15px; color: var(--mut); font-weight: 500; } .pop { border: 2px solid var(--p); }
ul.t { padding-left: 18px; margin: 10px 0 18px; } footer { border-top: 1px solid var(--line); padding: 28px 0; color: var(--mut); font-size: 14px; }
footer .wrap { display: flex; gap: 16px; flex-wrap: wrap; justify-content: space-between; }
</style>
</head>
<body>
<header><div class="wrap">
  <a class="brand" href="{{ url('/') }}"><i></i>ZARSX Meet</a>
  <nav><a href="{{ url('/features') }}" @class(['on' => request()->is('features')])>Features</a><a href="{{ url('/pricing') }}" @class(['on' => request()->is('pricing')])>Pricing</a><a href="{{ url('/download') }}" @class(['on' => request()->is('download')])>Download</a></nav>
  <a class="btn" href="{{ route('login') }}">Sign in</a><a class="btn p" href="{{ Route::has('register') ? route('register') : route('login') }}">Start free</a>
</div></header>
<main>@yield('content')</main>
<footer><div class="wrap"><span>ZARSX Meet by ZARSCO - chat, calls, meetings and mail for teams.</span>
  <span><a href="{{ url('/pricing') }}">Pricing</a> · <a href="https://zarsx.in/contact/">Contact</a> · <a href="https://insights.zarsx.in">ZARS Insights</a></span></div></footer>
</body>
</html>
