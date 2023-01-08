<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Smtp;

class MailsettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Smtp::create([
            'mail_transport' => 'smtp',
            'sg_smtp_host' => 'smtp.mailtrap.io',
            'sg_smtp_port' => '2525',
            'sg_smtp_username' => 'ac237ffb19b4e5',
            'sg_smtp_password' => 'f4621382d82bf8',
            'sg_smtp_encryption' => 'tls',
            'mail_from' => 'mihirp009@gmail.com',
        ]);
    }
}