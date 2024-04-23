<?php
class TrackTikModel {
    private static string $apiUrl = 'https://smoke.staffr.net/rest/v1/employees';
    private static string $accessToken;

    private static function getAccessToken(): void
    {
        $credentials = json_decode(file_get_contents(__DIR__ . '/../credentials.json'));

        $tokenUrl = 'https://smoke.staffr.net/rest/oauth2/access_token';

        $params = [
            'grant_type' => 'refresh_token',
            'client_id' => $credentials->client_id,
            'client_secret' => $credentials->client_secret,
            'refresh_token' => $credentials->refresh_token
        ];

        $ch = curl_init($tokenUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        curl_close($ch);

        $responseData = json_decode($response, true);

        if (isset($responseData['access_token'])) {
            self::$accessToken = $responseData['access_token'];
        } else {
            throw new Exception("Access token not found in token response JSON.");
        }
    }

    public static function sendData($data) {
        try{
            if (!isset(self::$accessToken)) {
                self::getAccessToken();
            }

            $requestUrl = self::$apiUrl;
            $headers = [
                'Authorization: Bearer ' . self::$accessToken,
                'Content-Type: application/json',
            ];

            $jsonData = json_encode($data);

            $ch = curl_init($requestUrl);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            curl_close($ch);
            return $response;
        } catch (Exception $e) {
            return $e;
        }

    }
}
