<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * コンストラクタ
     */
    public function __construct(public array $contactInfo)
    {
        //
    }

    /**
     * 送信元や件名などのメールの基本情報を定義する
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address($this->contactInfo['email'], $this->contactInfo['name']),
            subject: 'お問い合わせがありました',
        );
    }

    /**
     * メールの内容を定義する
     */
    public function content(): Content
    {
        return new Content(
            text: 'emails.contact.admin',
        );
    }
}
