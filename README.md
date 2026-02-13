# QuizBuddy

QuizBuddy is an online quiz system that allows users to create, manage, and take quizzes. It can be run using XAMPP with MySQL and Apache servers.

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
   git clone https://github.com/your-username/QuizBuddy.git

1. **Move the Project Folder:**

   Open your terminal and execute the following command to move the project folder to the `htdocs` directory inside your XAMPP installation:

   ```bash
   mv QuizBuddy C:/xampp/htdocs/

1. **Start Servers:**

   Start the Apache and MySQL servers using the XAMPP control panel.

2. **Access phpMyAdmin:**

   Open your web browser and navigate to [http://localhost/phpmyadmin](http://localhost/phpmyadmin).

3. **Create Database:**

   - Create a new database named `quizbuddy`.

4. **Import Database Schema:**

   - Inside phpMyAdmin, select the `quizbuddy` database.
   - Go to the "Import" tab.
   - Upload the `database/init_database.sql` file, containing SQL commands to set up the database structure.
   - Execute the import.


6. **Start Application:**

   Open your web browser and go to [http://localhost/QuizBuddy/](http://localhost/QuizBuddy/) to access the QuizBuddy application.

