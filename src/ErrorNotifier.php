<?php

namespace Williamug\ErrorNotifier;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;
use Williamug\ErrorNotifier\Mail\ExceptionOccurred;

class ErrorNotifier
{
    public static function sendEmail(Throwable $exception): void
    {
        try {
            if (! config('error-notifier.enabled')) {
                return;
            }

            $content = [
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
                'trace' => $exception->getTrace(),
                'url' => request()->fullUrl(),
                'body' => request()->all(),
                'ip' => request()->ip(),
                'UserName' => Auth::check() ? Auth::user()->name /* @phpstan-ignore-line */ : 'Guest',
                'APP_ENV' => config('app.env'),
                'APP_URL' => config('app.url'),
            ];

            $recipients = explode(',', config('error-notifier.recipients'));

            Mail::to($recipients)->send(new ExceptionOccurred($content));
        } catch (Throwable $mailException) {
            Log::error('Failed to send exception email: '.$mailException->getMessage());
            Log::error($mailException);
        }
    }

    public static function sendSlackNotification(array $content): void
    {
        try {
            $webhookUrl = config('error-notifier.slack.webhook_url');

            $message = "*🚨 Exception Occurred in Your Application 🚨*\n";
            $message .= "*Message:* {$content['message']}\n";
            $message .= "*File:* {$content['file']} on line {$content['line']}\n";
            $message .= "*URL:* {$content['url']}\n";
            $message .= "*IP Address:* {$content['ip']}\n";
            $message .= "*User:* {$content['UserName']}\n";

            Http::post($webhookUrl, [
                'text' => $message,
            ]);
        } catch (Throwable $exception) {
            Log::error('Failed to send Slack notification: '.$exception->getMessage());
        }
    }
}
