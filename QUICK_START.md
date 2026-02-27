# 🚀 Crime Management System - Quick Start Guide

## 📋 Prerequisites
- XAMPP installed and running
- MySQL/MariaDB running
- PHP 7.4 or higher

---

## ⚡ Quick Setup (5 Minutes)

### Step 1: Import Database
1. Open phpMyAdmin: `http://localhost/phpmyadmin`
2. Create a new database named: **`crime_management`**
3. Import the SQL file: `database_updates.sql`
4. Run the status column update: `add_status_columns.sql`

### Step 2: Configure Database Connection
The connection is already configured for default XAMPP settings:
- Host: `localhost`
- Username: `root`
- Password: *(empty)*
- Database: `crime_management`

If your settings are different, edit `backend/db_connect.php`

### Step 3: Create First User
Run this SQL in phpMyAdmin:
```sql
INSERT INTO officers (user_id, name, role, username, contact_no, email, password, status) 
VALUES ('OFF001', 'Admin User', 'Administrator', 'admin', '1234567890', 'admin@police.gov', 'admin123', 'active');
```

### Step 4: Access the System
1. Open your browser
2. Navigate to: `http://localhost/crime_management_system/`
3. Login with:
   - **Username**: `admin`
   - **Password**: `admin123`

---

## 🎨 Features

### Light/Dark Theme
- Click the theme toggle button (top-right corner)
- Your preference is automatically saved

### Navigation
- **Dashboard**: Main menu with all modules
- **Back Button**: Returns to dashboard from any page
- **Logout**: Ends your session

### Modules
1. **👮 Officers** - Manage police officers
2. **🏢 Police Stations** - Manage station details
3. **🧾 Crime Reports** - File and view crime reports
4. **⚖️ Cases** - Manage investigation cases
5. **🧍 Victims** - Record victim information
6. **🧑‍⚖️ Criminals** - Maintain criminal records
7. **🧩 Evidence** - Track evidence collection

---

## 🔒 Security Features
✅ SQL Injection Protection (Prepared Statements)
✅ XSS Protection (Input Sanitization)
✅ Session Management
✅ Soft Delete (Records marked inactive, not deleted)

---

## 🐛 Troubleshooting

### "Unknown column 'status'" Error
Run the SQL file: `add_status_columns.sql` in phpMyAdmin

### "Access Denied" Error
Check your MySQL credentials in `backend/db_connect.php`

### Pages Not Loading
1. Make sure XAMPP Apache and MySQL are running
2. Check if the project is in: `C:\xampp\htdocs\crime_management_system\`
3. Access via: `http://localhost/crime_management_system/`

### Login Not Working
1. Verify the officer exists in the database
2. Check the username and password
3. Ensure the officer's status is 'active'

---

## 📱 Browser Support
- ✅ Chrome (Recommended)
- ✅ Firefox
- ✅ Edge
- ✅ Safari
- ⚠️ Internet Explorer (Not supported)

---

## 🎯 Default Login Credentials
**Username**: `admin`  
**Password**: `admin123`

⚠️ **Important**: Change the default password after first login!

---

## 📞 Support
For issues or questions, check the code comments or database structure.

---

## 🎨 Customization
- Edit `style.css` for design changes
- Modify `script.js` for behavior changes
- Update colors in CSS `:root` variables

---

**System Status**: ✅ Ready for Demo
**Version**: 2.0
**Last Updated**: November 2025
