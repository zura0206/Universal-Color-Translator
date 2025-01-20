# Universal Color Translator

A web-based tool to convert color names into their corresponding hex codes. It provides an admin interface to manage colors dynamically and allows users to easily translate colors using an interactive UI.

---

## 👌 Table of Contents

- [Setup and Execution](#setup-and-execution)
- [Design Overview](#design-overview)
- [Technologies Used](#technologies-used)
- [Testing Guide](#testing-guide)
- [Project Structure](#project-structure)
- [Usage Instructions](#usage-instructions)
- [Contribution](#contribution)
- [License](#license)

---

## ⚙️ Setup and Execution

Follow these steps to set up and run the project:

1. **Clone the repository:**
   ```bash
   git clone https://github.com/zura0206/Universal-Color-Translator.git
   ```

2. **Navigate to the project folder:**
   ```bash
   cd Universal-Color-Translator
   ```

3. **Start the PHP development server:**
   ```bash
   php -S localhost:8000
   ```

4. **Access the application:**
   Open your browser and go to:
   ```
   http://localhost:8000/index.php
   ```

5. **Admin Panel Access:**
   ```
   http://localhost:8000/admin.php
   ```
   Here, you can manage colors by adding, updating, or deleting them.

---

## 🏗️ Design Overview

The Universal Color Translator is designed with simplicity and scalability in mind. The key design decisions include:

1. **Separation of Concerns:**
   - The application is divided into front-end (HTML, CSS, JS) and back-end (PHP) for easier maintainability.
2. **Data Persistence:**
   - Color data is stored in a JSON file (`colors.json`) to allow easy updates without requiring a database.
3. **Dynamic Suggestions:**
   - The system offers color suggestions based on stored data using AJAX requests.
4. **User Experience Enhancements:**
   - Success and error messages with automatic fade-out.

---

## 🐳 Technologies Used

- **Front-end:**
  - HTML5
  - CSS3 (Bootstrap 5)
  - JavaScript (jQuery)

- **Back-end:**
  - PHP

- **Storage:**
  - JSON file

- **Testing:**
  - PHPUnit

---

## 🛠️ Testing Guide

To run the unit tests:

1. Install PHPUnit (if not already installed):
   ```bash
   composer require --dev phpunit/phpunit
   ```

2. Run tests using the command:
   ```bash
   vendor/bin/phpunit tests/ or 
   php ./vendor/bin/phpunit --bootstrap vendor/autoload.php tests\TranslatorTest.php
   ```

The tests cover:
- Valid color retrieval
- Invalid color handling
- JSON data integrity

---

## 🛀 Project Structure

```
Universal-Color-Translator/
|── admin/                  # Admin panel files
|   |── colors.json            # Color storage
|── external/css/           # Stylesheets
|── tests/                  # PHPUnit test cases
|── index.php               # Main user interface
|── admin.php               # Admin interface
|── translator.php          # Translator class
|── translatortest.php       # Unit tests
|── README.md               # Documentation
```

---

## 🗂️ Usage Instructions

1. Enter a color name in the input field (e.g., "blue").
2. Click the **Translate** button.
3. The corresponding hex code will be displayed with a background color.
4. To manage colors, visit the admin panel.

---

## 📚 Contribution

Contributions are welcome! Follow these steps:

1. Fork the repository.
2. Create a new feature branch.
3. Make your changes and commit.
4. Submit a pull request.

---


