<?php

class Mapper {
    public static function mapProvider1ToTrackTik($data): array
    {
        return [
            'jobTitle' => $data['occupation'],
            'password' => $data['password'],
            'lastName' => $data['last_name'],
            'firstName' => $data['first_name'],
            'email' => $data['email'],
            'primaryPhone' => $data['phone_number']
        ];
    }

    public static function mapProvider2ToTrackTik($data): array
    {
        return [
            'jobTitle' => $data['job'],
            'password' => $data['passcode'],
            'lastName' => $data['surname'],
            'firstName' => $data['given_name'],
            'email' => $data['email_address'],
            'primaryPhone' => $data['phone']
        ];
    }
}
