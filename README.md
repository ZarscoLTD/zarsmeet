# ZARSX Meet Community

Chat, voice and video calls, meetings with captions, recording and breakout rooms, mail and calendar - self-hosted.
Community edition 1.8.0 of ZARSX Meet by Zars Company (ZARSCO). Free to use, no licence key and no fee (see LICENSE for
the short terms). Only the basic needs; updated when needed.

## Install

Needs PHP 8.4 with the usual Laravel extensions, Composer, MySQL / MariaDB (or SQLite for trying it out) and Node 20 for the assets.

    composer install --no-dev
    cp .env.example .env && php artisan key:generate
    php artisan migrate --seed
    npm ci && npm run build

Then open public/install.php once in the browser to create the first administrator, or run `php artisan serve` to try it.
Push notifications need your own Firebase project (FIREBASE_* in .env); meeting notes with AI need your own Anthropic key.

## Not included

The hosted ZARSX services (zarsx.in addresses, the managed TURN relay, Insights single sign-on) are not part of this edition.

## Want it ready to use?

Use the hosted ZARSX Meet at https://meet.zarsx.in - free for chat, calls and meetings, business mail from Rs 49 per user a month
(https://meet.zarsx.in/pricing). Every feature, signed updates and help from our team, nothing to install.
