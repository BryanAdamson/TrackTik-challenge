<?php
set_include_path(get_include_path() . PATH_SEPARATOR . dirname(__FILE__) . '/../models');
set_include_path(get_include_path() . PATH_SEPARATOR . dirname(__FILE__) . '/../utils');


require_once 'TrackTikModel.php';
require_once 'Mapper.php';

class Provider2Controller {
    public function receiveData(): void
    {
        $requestData = json_decode(file_get_contents('php://input'), true);

        $response = $this->processEmployeeData($requestData);

        http_response_code(200);
        echo json_encode($response);
    }

    private function processEmployeeData($data): Exception|bool|string
    {
        $mappedData = Mapper::mapProvider2ToTrackTik($data);

        return TrackTikModel::sendData($mappedData);
    }
}

