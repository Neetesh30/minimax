<?php

namespace App\Services;

class OtpService
{
    protected string $apiKey;
    protected string $templateId;

    public function __construct()
    {
        $this->apiKey = env('MSG91_API_KEY', '');
        $this->templateId = env('MSG91_TEMPLATE_ID', '');

        if (!$this->apiKey || !$this->templateId) {
            throw new \Exception("MSG91 API Key or Template ID missing in .env");
        }
    }

    // Send OTP (MSG91 generates OTP automatically)
    public function sendOtp(string $phone): array
    {
        $url = "https://control.msg91.com/api/v5/otp?mobile=91{$phone}&template_id={$this->templateId}";

        $headers = [
            "authkey: {$this->apiKey}",
            "Content-Type: application/json"
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true) ?? [];
    }

    // Verify OTP
    public function verifyOtp(string $phone, string $otp): array
    {
        $url = "https://control.msg91.com/api/v5/otp/verify?mobile=91{$phone}&otp={$otp}";

        $headers = [
            "authkey: {$this->apiKey}",
            "Content-Type: application/json"
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true) ?? [];
    }
}
