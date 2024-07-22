# Conkard API

Conkard is a digital business card application where users can create, share, and save contacts.
This repository contains the backend API for the Conkard application, built using Laravel.

Created by [Byandev IT Solutions.](https://byandev.com/)

## Table of Contents

- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [API Endpoints](#api-endpoints)
- [License](#license)

## Installation

1. Clone the repository:
    ```sh
    git clone https://github.com/yourusername/conkard.git
    cd conkard
    ```

2. Install the dependencies:
    ```sh
    composer install
    ```

3. Copy the example environment file and configure the environment variables:
    ```sh
    cp .env.example .env
    php artisan key:generate
    ```

4. Set up your database configuration in the `.env` file.

5. Run the database migrations:
    ```sh
    php artisan migrate
    ```

6. (Optional) Seed the database with sample data:
    ```sh
    php artisan db:seed
    ```

## Configuration

Make sure to configure the following environment variables in your `.env` file:

- `DB_CONNECTION`
- `DB_HOST`
- `DB_PORT`
- `DB_DATABASE`
- `DB_USERNAME`
- `DB_PASSWORD`

Additionally, you may need to configure other settings such as mail and queue configurations as required by your
application.

## Usage

Start the development server:

```sh
php artisan serve
```

The API will be available at `http://localhost:8000`.

## API Endpoints

### Authentication

- `POST /api/v1/register` - Register a new user
- `POST /api/v1/login` - Authenticate a user and get a token

### Business Cards

- `POST /api/v1/cards` - Create a new business card
- `GET /api/v1/cards` - Get a list of all business cards
- `GET /api/v1/cards/{id}` - Get details of a specific business card
- `PUT /api/v1/cards/{id}` - Update a business card
- `DELETE /api/v1/cards/{id}` - Delete a business card
- `POST /api/v1/cards/{id}/image` - Upload business card image
- `DELETE /api/v1/cards/{id}/image/{id}` - Delete business card image

### Contacts (In-Progress)

- `POST /api/contacts` - Save a new contact
- `GET /api/contacts` - Get a list of all contacts
- `GET /api/contacts/{id}` - Get details of a specific contact
- `PUT /api/contacts/{id}` - Update a contact
- `DELETE /api/contacts/{id}` - Delete a contact

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.
