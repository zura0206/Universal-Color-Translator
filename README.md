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

---# 🛠️ Testing Guide

## Project Structure for Testing

To ensure organized and maintainable testing, follow this structure:

```
project-root/
│-- src/
│   └── Translator.php        # Main Translator class
│-- tests/
│   ├── AdminTranslatorTest.php # Tests using JSON (dynamic)
│   ├── TranslatorTest.php      # Static tests
│   └── bootstrap.php           # Optional PHPUnit bootstrap file
│-- colors.php                 # Color definitions (static version)
│-- composer.json               # Dependency management
│-- phpunit.xml                 # PHPUnit configuration
```

## Setting Up PHPUnit

1. Install PHPUnit via Composer (if not already installed):
   ```bash
   composer require --dev phpunit/phpunit
   ```

2. Configure `composer.json` to autoload the test files:

   ```json
   "autoload": {
       "psr-4": {
           "Habib\\Translator\\": "src/"
       }
   },
   "autoload-dev": {
       "psr-4": {
           "Habib\\Translator\\Tests\\": "tests/"
       }
   }
   ```

   Then, update Composer to apply changes:

   ```bash
   composer dump-autoload
   ```

3. Create a `phpunit.xml` configuration file in the project root:

   ```xml
   <phpunit bootstrap="vendor/autoload.php">
       <testsuites>
           <testsuite name="Translator Tests">
               <directory>./tests</directory>
           </testsuite>
       </testsuites>
   </phpunit>
   ```

---

## Running Tests

Run the tests using the following commands:

- Run all tests in the `tests` directory:
   ```bash
   vendor/bin/phpunit tests/
   ```

- Run a specific test file, e.g., `TranslatorTest.php`:
   ```bash
   php vendor/bin/phpunit tests/TranslatorTest.php
   ```

- Run with detailed output:
   ```bash
   php vendor/bin/phpunit --testdox
   ```

---

## Test Coverage

The current test suite covers the following cases:

### 1. **Static Color Tests (`TranslatorTest.php`)**
   - ✅ Valid color retrieval (e.g., `red → #FF0000`)
   - ❌ Invalid color handling (`invalidColor → "Color not found!"`)
   - 🆕 Case-insensitive lookup (`RED → #FF0000`)
   - 🆕 Trimming spaces (`"  red  " → #FF0000`)
   - ❌ Empty input (`"" → "Color not found!"`)

### 2. **Dynamic Color Tests (`AdminTranslatorTest.php`)**
   - ✅ Checks colors dynamically from JSON or database
   - ❌ Invalid color handling (`invalidColor → "Color not found!"`)
   - ❌ Empty input validation

Each test prints out useful messages such as:

```
Testing color: red with expected hex code: #FF0000
Testing invalid color: invalidColor
Testing empty color input: ''
```

---

## Adding New Tests

1. Create a new test file in the `tests/` directory:
   ```php
   <?php
   use PHPUnit\Framework\TestCase;
   use Habib\Translator\Translator;

   class NewFeatureTest extends TestCase {
       public function testNewFunctionality() {
           $translator = new Translator();
           $this->assertEquals('#123456', $translator->getHexCode('newcolor'));
       }
   }
   ```

2. Run the test using:
   ```bash
   php vendor/bin/phpunit tests/NewFeatureTest.php
   ```

## 🛀 Project Structure

```
Universal-Color-Translator/
|── admin/                  # Admin panel files
    |── admin.php              # Admin interface
|   |── colors.json            # Color storage
|── external/css/           # Stylesheets
|── src                     #source files
    |── translator.php         # Translator class
    |── Admintranslator.php    # Translator class
|── tests/                  # PHPUnit test cases
    |── translatortest.php     # Unit tests
    ├── AdminTranslatorTest.php # Tests using JSON (dynamic)
|── index.php               # Main user interface  
|── colors.php              # colors  storage in a php file
|── composer.json           # path adjustments
|── README.md               # Documentation
|── phpunit.xml             # xml file

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


