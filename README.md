# Book Inventory Management System

A comprehensive book inventory management system designed to manage book collections organized in storage boxes ("dus"). The system provides features for importing books from Excel files, managing book categories, and generating unique book codes.

This repository contains two implementations:
- **PHP Version** (Legacy): Basic web application for importing Excel and generating codes
- **Spring Boot Version** (Modern): Full-featured web application with advanced UI and management capabilities

## Features

### Common Features
- **Book Management**: Organize books by storage boxes (dus)
- **Excel Import**: Import book data from Excel files (.xls for PHP, .xlsx for Spring)
- **Code Generation**: Generate unique book codes based on category, title, and author
- **MySQL Database**: Persistent storage with structured schemas

### PHP Version Features
- Simple web interface
- Basic import and code generation
- Command-line code printing

### Spring Boot Version Features
- Modern web interface built with Thymeleaf
- Category management system
- Import history tracking
- RESTful API endpoints
- Advanced code generation with validation

## Project Structure

```
├── book-inventory-spring/          # Spring Boot application
│   ├── src/
│   │   ├── main/java/com/example/bookinventoryspring/
│   │   │   ├── controller/         # REST controllers
│   │   │   ├── model/             # JPA entities
│   │   │   ├── repository/        # Data repositories
│   │   │   ├── service/           # Business logic
│   │   │   └── dto/               # Data transfer objects
│   │   └── main/resources/
│   │       ├── templates/         # Thymeleaf templates
│   │       └── application.properties
│   └── pom.xml
├── database-schema/               # Database schemas
│   ├── buku_bfj.sql              # PHP version schema
│   └── dump-bfj_db-202209152356.sql  # Spring version schema
├── excel-format/                  # Sample Excel files
├── src/                          # Test files
├── unused/                       # Deprecated files
├── *.php                         # PHP application files
└── README.md
```

## Prerequisites

### For PHP Version
- PHP 7.0+
- MySQL Server
- Web server (Apache/Nginx)

### For Spring Boot Version
- Java 17 or higher
- MySQL Server
- Maven 3.6+

## Database Setup

### PHP Version
1. Create database named `buku_bfj`
2. Import `database-schema/buku_bfj.sql`

### Spring Boot Version
1. Create database named `bfj`
2. Import `database-schema/dump-bfj_db-202209152356.sql`

## Installation and Setup

### PHP Version
1. Place PHP files in web server directory
2. Update database credentials in `connection.php`
3. Access via web browser

### Spring Boot Version
1. Navigate to `book-inventory-spring/` directory
2. Update database configuration in `src/main/resources/application.properties`
3. Build and run:
   ```bash
   cd book-inventory-spring
   mvn clean install
   mvn spring-boot:run
   ```
4. Access at `http://localhost:8080`

## Usage

### PHP Version
1. **Import Books**: Upload Excel file (.xls) containing book data
2. **Generate Codes**: Select storage box and generate codes for printing

### Spring Boot Version
1. **Home Page**: View available storage boxes
2. **Import Books**: Upload Excel file (.xlsx) with book data
3. **Manage Categories**: Add/edit book categories
4. **Generate Codes**: Generate codes for books in selected storage box

## Excel Import Format

Required columns (in order):
1. judul_buku (Book Title)
2. kategori (Category)
3. penulis (Author)
4. penerbit (Publisher)
5. tahun_terbit (Publication Year)
6. jumlah (Quantity)
7. nama_dus (Storage Box Name)

## Code Generation Logic

Book codes are generated using:
- **Category Code**: From KodeBuku table (e.g., "PU" for "Pengetahuan Umum")
- **Title Initial**: First letter of book title (uppercase)
- **Author Initials**: First 3 letters of author name (uppercase)

Example: "Harry Potter" by "J.K. Rowling" in "Fiction" category → "FIC-001-H-JKR"

## API Endpoints (Spring Boot)

- `GET /` - Home page
- `GET /data-buku` - Book data page
- `POST /import-excel` - Import books from Excel
- `GET /kategori-buku` - Category management
- `POST /insert-kategori` - Add new category
- `GET /code-generate` - Generate codes

## License

This project is licensed under the MIT License.