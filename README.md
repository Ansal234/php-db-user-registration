# PHP Registration Form – WEB2201 Lab 7

## 📖 About the Project
This project is a **PHP web-based registration form** connected to a PostgreSQL database.  
Users can submit their details including ID, first name, last name, email, and password. The form performs validation and stores valid entries in the database.

---

## ✨ Features
- Input fields: ID, First Name, Last Name, Email, Password  
- Input validation:
  - ID: numeric only  
  - First Name / Last Name: letters and spaces only  
  - Email: valid email format  
  - Password: minimum 8 characters  
- Stores data in a PostgreSQL database (`usersdata` table)  
- Displays success or error messages on submission  
- Uses **PHP functions** for sanitization (`test_input`)  

---

## 🛠️ Tech Stack
- **Language:** PHP  
- **Database:** PostgreSQL  
- **Frontend:** HTML forms  
- **Server:** PHP-enabled web server (XAMPP, WAMP, LAMP, etc.)  

---

## 🚀 How to Run
1. Set up a PostgreSQL database named `ansala_db`.  
2. Create the `usersdata` table with columns:  
   - `login_id` (integer or varchar)  
   - `first_name` (varchar)  
   - `last_name` (varchar)  
   - `email` (varchar)  
   - `password` (varchar)  
3. Update the database connection credentials in `lab7.php` if necessary.  
4. Place `lab7.php`, `header.php`, and `footer.php` in your server directory.  
5. Open in your browser:  
