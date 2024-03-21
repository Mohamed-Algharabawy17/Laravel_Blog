# Laravel Blog CRUD

An efficient Laravel CRUD application for managing blog posts. This project offers a robust backend system built with Laravel, providing functionalities for creating, reading, updating, and deleting blog posts. With intuitive user interfaces and secure authentication mechanisms, it empowers users to manage their blog content effortlessly.

## Features

- **Create**: Add new blog posts with ease.
- **Read**: View existing blog posts and their details.
- **Update**: Edit and update blog post content as needed.
- **Delete**: Remove unwanted blog posts securely.
- **Authentication**: Secure user authentication and authorization.
- **Responsive Design**: Optimized for seamless usability across devices.


## Getting Started

### Prerequisites

- PHP >= 7.4
- Composer

### Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/Mohamed-Algharabawy17/Laravel_Blog.git
    ```

2. Install dependencies:

    ```bash
    cd your_repository
    composer install
    ```

3. Set up your environment variables:

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. Configure your database connection in the `.env` file.

5. Run migrations and seeders:

    ```bash
    php artisan migrate --seed
    ```

6. Start the development server:

    ```bash
    php artisan serve
    ```

7. Access the application in your web browser at `http://localhost:8000`.

## Usage

1. **Authentication**: Sign up for a new account or log in with existing credentials.
2. **Blog Management**: Create, read, update, and delete blog posts from the dashboard.
3. **Profile Settings**: Manage your user profile settings and password.
4. **Log Out**: Securely log out of your account when done.

