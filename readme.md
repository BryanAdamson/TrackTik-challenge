# TrackTik Challenge

This project implements an API to receive employee data from two different identity providers and send it to TrackTik's REST API.

## Features

- Receives employee data from two different identity providers.
- Maps the provider's employee schema to TrackTik's employee schema.
- Sends the mapped employee data to TrackTik's REST API.
- Supports authentication using OAuth2 credentials.

## Installation

1. Clone the repository to your local machine:
   ```bash
   git clone https://github.com/BryanAdamson/TrackTik-challenge.git
   
2. Navigate to the project directory:
   ```bash
   cd TrackTik-challenge
   
3. Install dependencies:
   ```bash
    composer install
4. Configure OAuth2 credentials:
   - Add OAuth2 credentials for TrackTik's REST API in the appropriate configuration file.
5. Start the server:
   - You can use a local development server such as PHP's built-in web server:
   ```bash
    php -S localhost:8000

## Usage

1. Send employee data to the API endpoints:
    - Endpoint for Provider 1: POST /api/provider1
    - Endpoint for Provider 2: POST /api/provider2

    Example Request:
    ```bash
    curl -X POST http://localhost:8000/provider1 -d '{"employee_id": "123", "name": "John Doe", "email": "john.doe@example.com"}'

2. The API will map the received employee data to TrackTik's employee schema and send it to TrackTik's REST API.

