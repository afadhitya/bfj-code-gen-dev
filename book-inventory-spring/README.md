# Book Inventory Spring Boot Application

A comprehensive book inventory management system built with Spring Boot, designed to manage book collections organized in storage boxes ("dus"). The application provides features for importing books from Excel files, managing book categories, and generating unique book codes.

## Features

- **Book Management**: View and manage books organized by storage boxes (dus)
- **Excel Import**: Import book data from Excel files (.xlsx)
- **Category Management**: Manage book categories with custom codes
- **Code Generation**: Generate unique book codes based on category, title, and author
- **Web Interface**: User-friendly web interface built with Thymeleaf
- **Database Integration**: MySQL database with JPA/Hibernate

## Technology Stack

- **Backend**: Spring Boot 3.2.5
- **Language**: Java 17
- **Database**: MySQL
- **ORM**: Spring Data JPA with Hibernate
- **Frontend**: Thymeleaf templates
- **Build Tool**: Maven
- **Excel Processing**: Apache POI 5.2.3

## Prerequisites

- Java 17 or higher
- MySQL Server
- Maven 3.6+

## Database Setup

1. Create a MySQL database named `bfj`:
   ```sql
   CREATE DATABASE bfj;
   ```

2. Update the database configuration in `src/main/resources/application.properties` if needed:
   ```properties
   spring.datasource.url=jdbc:mysql://localhost:3306/bfj
   spring.datasource.username=root
   spring.datasource.password=your_password
   ```

## Installation and Setup

1. **Clone the repository**:
   ```bash
   git clone <repository-url>
   cd book-inventory-spring
   ```

2. **Build the application**:
   ```bash
   mvn clean install
   ```

3. **Run the application**:
   ```bash
   mvn spring-boot:run
   ```

4. **Access the application**:
   Open your browser and navigate to `http://localhost:8080`

## Usage

### Home Page
- Displays a list of available storage boxes (dus)
- Navigate to different sections of the application

### Book Data Management
- **View Books**: Select a dus to view all books stored in that box
- **Import Books**: Upload Excel files containing book data
  - Supported format: Excel (.xlsx)
  - Required columns: judul_buku, kategori, penulis, penerbit, tahun_terbit, jumlah, nama_dus

### Category Management
- View existing book categories
- Add new categories with custom code initials and numbers

### Code Generation
- Generate unique codes for all books in a selected dus
- Codes are generated based on:
  - Category code (from KodeBuku table)
  - First letter of book title
  - First 3 letters of author name

## API Endpoints

- `GET /` - Home page
- `GET /data-buku` - Book data page (with optional dusParam)
- `POST /import-excel` - Import books from Excel file
- `GET /delete-dus` - Delete all books in a dus
- `GET /kategori-buku` - Category management page
- `POST /insert-kategori` - Add new book category
- `GET /code-generate` - Generate codes for books in a dus

## Database Schema

### Buku Table
- `id` (Primary Key)
- `judul_buku` (Book Title)
- `kategori` (Category)
- `penulis` (Author)
- `penerbit` (Publisher)
- `tahun_terbit` (Publication Year)
- `jumlah` (Quantity)
- `nama_dus` (Storage Box Name)

### Kode_Buku Table
- `id` (Primary Key)
- `kategori` (Category)
- `inisial_kode_buku` (Code Initial)
- `nomor_kode_buku` (Code Number)

### Import_History Table
- `id` (Primary Key)
- `tanggal` (Date/Time)
- `status` (Status)
- `remarks` (Remarks)
- `nama_dus` (Storage Box Name)

## Excel Import Format

The Excel file should contain the following columns in order:
1. judul_buku
2. kategori
3. penulis
4. penerbit
5. tahun_terbit
6. jumlah
7. nama_dus

## Code Generation Logic

For each book in a dus, the system generates codes using:
- Category code from KodeBuku table
- First letter of the book title (uppercase)
- First 3 letters of the author name (uppercase, or full name if less than 3 characters)

Example: If a book "Harry Potter" by "J.K. Rowling" in category "Fiction" has code "FIC-001", the generated code would be "FIC-001-H-JKR"

## Contributing

1. Fork the repository
2. Create a feature branch
3. Commit your changes
4. Push to the branch
5. Create a Pull Request

## License

This project is licensed under the MIT License - see the LICENSE file for details.