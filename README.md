# IntelliQuiz

IntelliQuiz is an online quiz system that allows users to create, manage, and take quizzes. It can be run using XAMPP with MySQL and Apache servers.

## Table of Contents

- [Features](#Features)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)

## Features

- User authentication and authorization
- Quiz creation and management
- Multiple-choice and true/false question support
- Time-limited quizzes
- Real-time scoring and immediate feedback
- User-friendly interface

## Getting Started

### Prerequisites

Before you begin, ensure you have met the following requirements:

- [XAMPP](https://www.apachefriends.org/index.html) installed
- [MySQL](https://www.mysql.com/) configured with XAMPP

### Installation

1. **Clone the repository:**

   ```bash
   git clone https://github.com/your-username/IntelliQuiz.git

   ```

1. **Move the Project Folder:**

   Open your terminal and execute the following command to move the project folder to the `htdocs` directory inside your XAMPP installation:

   ```bash
   mv IntelliQuiz C:/xampp/htdocs/

   ```

1. **Start Servers:**

   Start the Apache and MySQL servers using the XAMPP control panel.

1. **Access phpMyAdmin:**

   Open your web browser and navigate to [http://localhost/phpmyadmin](http://localhost/phpmyadmin).

1. **Create Database:**
   - Create a new database named `IntelliQuiz`.

1. **Import Database Schema:**
   - Inside phpMyAdmin, select the `quizbuddy` database.
   - Go to the "Import" tab.
   - Upload the `database/init_database.sql` file, containing SQL commands to set up the database structure.
   - Execute the import.

1. **Start Application:**

   Open your web browser and go to [http://localhost/IntelliQuiz/](http://localhost/IntelliQuiz/) to access the IntelliQuiz application.
