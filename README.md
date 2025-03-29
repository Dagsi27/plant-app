# Plant App

## Prerequisites

Before you begin, ensure you have met the following requirements:
- Docker
- Docker Compose
- Make

## Installation

1. **Clone the repository**:
    ```bash
    git clone git@github.com:Dagsi27/plant-app.git
    cd plant-app
    ```

2. **Copy the example environment file**:
    ```bash
    cp .env.example .env
    ```

3. **Build the Docker images**:
    ```bash
    make build
    ```

4. **Start the Docker containers**:
    ```bash
    make up
    ```

5. **Run database migrations**:
    ```bash
    make cli
    php artisan migrate
    exit
    ```

## Usage

### Accessing the Application

- Open your browser and navigate to `http://localhost:9001` to access the application.

### Running Commands

- **Access the Docker container**:
    ```bash
    make cli
    ```

- **Check the status of Docker containers**:
    ```bash
    make ps
    ```

### Running Laravel Pint

- **Run Pint**:
    ```bash
    make pint
    ```

### Generating Swagger Documentation

- **Generate Swagger documentation**:
    ```bash
    make swagger
    ```

### Running Checks

- **Run all checks**:
    ```bash
    make check
    ```

## Stopping the Application

- **Stop the Docker containers**:
    ```bash
    make down
    ```

## Additional Information

- **Environment Variables**:
    - Ensure you have set the necessary environment variables in the `.env` file.

- **Ports**:
    - The application runs on port `9001` by default. You can change this in the `.env` file if needed.

## Contributing

To contribute to this project, please follow these steps:

1. Fork the repository.
2. Create a new branch (`git checkout -b feature-branch`).
3. Make your changes and commit them (`git commit -m 'Add some feature'`).
4. Push to the branch (`git push origin feature-branch`).
5. Create a Pull Request.

## License

This project is licensed under the MIT License - see the `LICENSE` file for details.
