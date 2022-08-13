<?php

namespace App\Services;

use App\Models\Http\Status;

class SmsService
{
    public function sendSms($phone, $message)
    {
        try {
            header('Content-Type: text/html; charset=utf-8');
            $postUrl='http://panel.vatansms.com/panel/smsgonderNNpost.php';

            $TUR='Normal';  // Normal yada Turkce

            $xmlString='data=
                            <sms>
                                <kno>'. env('VATAN_SMS_MUSTERI_NO') .'</kno>
                                <kulad>'. env('VATAN_SMS_KULLANICI_ADI') .'</kulad>
                                <sifre>'.env('VATAN_SMS_SIFRE') .'</sifre>
                                <gonderen>'.  env('VATAN_SMS_ORGINATOR') .'</gonderen>
                                <telmesajlar>
                                <telmesaj>
                                    <tel>'. $phone.'</tel><mesaj>'. $message .'</mesaj>
                                </telmesaj>
                                </telmesajlar>
                                <tur>'. $TUR .'</tur>
                            </sms>';

            $Veriler =  $xmlString;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $postUrl);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $Veriler);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            $response = curl_exec($ch);
            curl_close($ch);

        } catch (\Throwable $e) {
            return $e->getMessage();
        }

        return  true;
    }
}
