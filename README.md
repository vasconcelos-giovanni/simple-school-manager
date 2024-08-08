# Simple School Manager (Escola Simples)

Simple School Manager is a simple manager for classrooms and students.

## Screenshots

![Home](/readme/img/1.png)
![Classrooms](/readme/img/2.png)
![Creating/Editing Classroom](/readme/img/3.png)
![Students](/readme/img/4.png)
![Creating/Editing Student](/readme/img/5.png)

## Project Setup Instructions

This document provides instructions for setting up the local development environment for a project using Laravel 11 (PHP ^8.3.9) and Vue 3.

### Prerequisites

1. **PHP**: Version 8.3.9 or higher
2. **Composer**: Dependency manager for PHP
3. **Node.js**: LTS version (recommended)
4. **npm** or **Yarn**: Package managers for Node.js
5. **Git**: For version control

### Cloning the Repository

1. Clone the repository to your local machine:

```bash
git clone https://github.com/vasconcelos-giovanni/simple-school-manager.git
cd simple-school-manager
```

### Setting up Laravel enviroment

```bash
composer install

cp .env.example .env

php artisan key:generate
```

Run Laravel server>

```bash
php artisan serve
```

### Setting up Vue 3

NPM -based instructions

```bash
npm install

npm run dev
```

Define `apiUrl` variable in `client/src/axios.js`; default: `http://localhost:8000/api/`.

Run Vue 3 server:

```bash
npm run dev
```