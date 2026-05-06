# 🚔 Crime Record Management System

A modern, secure, and professional web-based Crime Record Management System built with PHP, MySQL, HTML, CSS, and JavaScript.

---

## ✨ Features

### 🔐 Security Enhancements
- **SQL Injection Prevention**: All queries use prepared statements
- **XSS Protection**: Output sanitization with `htmlspecialchars()`
- **Soft Delete**: Records marked as inactive instead of permanent deletion
- **Session Management**: Secure user authentication

### 📊 Core Modules
1. **Police Station Management** - Add, view, and manage police stations
2. **Officer Management** - Manage police officers and users
3. **Crime Reports** - File and track crime reports
4. **Cases** - Manage investigation cases
5. **Victims** - Record victim information
6. **Criminals** - Track criminal records
7. **Evidence** - Manage evidence collection

### 🎨 Modern UI/UX
- Professional gradient-based design
- Responsive layout (desktop-focused)
- Smooth animations and transitions
- Color-coded status indicators
- Interactive tables with hover effects

---

## 🚀 Installation Guide

### Prerequisites
- XAMPP (Apache + MySQL + PHP)
- Web browser (Chrome, Firefox, Edge)
- Text editor (VS Code recommended)

### Step 1: Setup XAMPP
1. Install XAMPP from [https://www.apachefriends.org](https://www.apachefriends.org)
2. Start **Apache** and **MySQL** from XAMPP Control Panel

### Step 2: Create Database
1. Open phpMyAdmin: `http://localhost/phpmyadmin`
2. Create a new database named `crime_management`
3. Import your database schema or create tables manually
4. Run the SQL updates from `database_updates.sql`

### Step 3: Configure Database Connection
1. Open `backend/db_connect.php`
2. Verify these settings:
   ```php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $database = "crime_management";
   ```

### Step 4: Run Database Updates
1. Open phpMyAdmin
2. Select `crime_management` database
3. Go to SQL tab
4. Copy and paste content from `database_updates.sql`
5. Click "Go" to execute

### Step 5: Access the System
1. Open browser and navigate to: `http://localhost/crime_management_system/`
2. Login with officer credentials (create an officer first in phpMyAdmin)

---

## 📁 Project Structure

```
crime_management_system/
├── backend/
│   ├── db_connect.php          # Database connection
│   ├── login.php               # Authentication
│   ├── session_check.php       # Session validation
│   ├── logout.php              # Logout handler
│   ├── insert_*.php            # Insert operations
│   ├── fetch_*.php             # Retrieve records
│   ├── delete_*.php            # Soft delete operations
│   └── update_*.php            # Update operations
├── index.html                  # Login page
├── dashboard.php               # Main dashboard (requires login)
├── officers.html               # Officer management
├── police.html                 # Police station management
├── criminals.html              # Criminal records
├── victims.html                # Victim records
├── cases.html                  # Case management
├── crime_reports.html          # Crime reports
├── evidence.html               # Evidence management
├── style.css                   # Modern CSS styling
├── script.js                   # JavaScript enhancements
├── database_updates.sql        # SQL updates for soft delete
└── README.md                   # This file
```

---

## 🔑 Default Login

You need to create an officer account first:

1. Go to phpMyAdmin
2. Select `crime_management` database
3. Click on `officers` table
4. Insert a new record:
   ```sql
   INSERT INTO officers (user_id, name, role, username, contact_no, email, password, status)
   VALUES ('OFF001', 'Admin User', 'Administrator', 'admin', '1234567890', 'admin@police.com', 'admin123', 'active');
   ```
5. Login with:
   - **Username**: `admin`
   - **Password**: `admin123`

---

## 🛠️ Technical Details

### Technologies Used
- **Frontend**: HTML5, CSS3, JavaScript (ES6)
- **Backend**: PHP 7.4+
- **Database**: MySQL 5.7+
- **Server**: Apache (via XAMPP)

### Security Features
| Feature | Implementation |
|---------|----------------|
| SQL Injection | Prepared statements with parameter binding |
| XSS Prevention | `htmlspecialchars()` on all outputs |
| Soft Delete | Status column ('active'/'inactive') |
| Session Security | Server-side session validation |

### Database Schema Updates
All tables now include a `status` column for soft delete:
- `officers` - Active/Inactive officers
- `criminals` - Active/Inactive records
- `victims` - Active/Inactive records
- `cases` - Active/Inactive cases
- `police_station` - Active/Inactive stations
- `evidence` - Active/Inactive evidence

---

## 📝 Usage Guide

### Adding Records
1. Navigate to the desired module from dashboard
2. Fill in all required fields
3. Click "Add" button
4. Success message will appear
5. Record will display in the table below

### Viewing Records
- All active records are displayed in tables
- Tables show data in reverse chronological order (newest first)
- Click on rows to highlight them

### Deleting Records
- Click "Delete" link in the Action column
- Confirm deletion in the popup dialog
- Record will be marked as inactive (soft delete)
- Page will refresh automatically

### Navigating
- Use "Back to Dashboard" button to return to main menu
- Click module cards on dashboard to access different sections
- Use "Logout" button to end session

---

## 🎨 Design Features

### Color Scheme
- **Primary**: Blue (#2563eb)
- **Success**: Green (#10b981)
- **Danger**: Red (#ef4444)
- **Dark Background**: Navy (#0f172a)

### UI Components
- Gradient backgrounds
- Glass-morphism effects
- Smooth hover transitions
- Professional card layouts
- Modern form inputs with focus effects

---

## 🐛 Troubleshooting

### Login Issues
**Problem**: Can't login with credentials
**Solution**: 
1. Check if officer exists in database
2. Verify password matches exactly
3. Ensure officer status is 'active'
4. Check `backend/session_check.php` is included

### Database Connection Error
**Problem**: "Database connection failed"
**Solution**:
1. Ensure MySQL is running in XAMPP
2. Verify database name is `crime_management`
3. Check credentials in `backend/db_connect.php`

### Blank Pages
**Problem**: Page shows blank/white screen
**Solution**:
1. Enable error display in PHP
2. Check Apache error logs
3. Verify file permissions
4. Check for PHP syntax errors

### Iframes Not Loading
**Problem**: Tables not showing in iframe
**Solution**:
1. Check fetch_*.php files exist in backend folder
2. Verify database tables have data
3. Check browser console for errors

---

## 🔄 Updates Made

### Version 2.0 - Complete Refactor

#### Security Improvements
✅ All SQL queries converted to prepared statements
✅ XSS protection added to all outputs
✅ Soft delete implemented (status-based)
✅ Input sanitization with `trim()`

#### Design Overhaul
✅ Modern gradient-based CSS
✅ Professional color scheme
✅ Smooth animations and transitions
✅ Improved form layouts
✅ Enhanced table styling
✅ Better responsive design

#### Bug Fixes
✅ Fixed `update_officer.php` (was INSERT, now UPDATE)
✅ Removed file upload requirement (simplified)
✅ Fixed all delete operations (now use soft delete)
✅ Added proper error handling
✅ Fixed iframe layout issues

#### UX Enhancements
✅ Success/error messages with auto-dismiss
✅ Form validation with visual feedback
✅ Dropdown selects for status fields
✅ Delete confirmation dialogs
✅ Auto-reload after operations
✅ Loading indicators

---

## 📞 Support

For academic/demo purposes only. Not intended for production use without additional security hardening.

### Common Questions

**Q: Can I deploy this online?**
A: This is designed for local XAMPP only. Additional security measures needed for production.

**Q: How do I add more officers?**
A: Use the Officer Management page or insert via phpMyAdmin.

**Q: Can I restore deleted records?**
A: Yes, soft-deleted records can be reactivated by changing status to 'active' in database.

**Q: Is password encryption included?**
A: No, passwords are stored in plain text (academic project requirement).

---

## 📄 License

This project is created for academic/demo purposes. Feel free to modify and use for learning.

---

## 🎯 Demo Ready Checklist

- [x] Modern professional design implemented
- [x] SQL injection prevention (prepared statements)
- [x] Soft delete functionality
- [x] All CRUD operations working
- [x] Form validation
- [x] Error handling
- [x] Clean navigation
- [x] Responsive layout
- [x] Documentation complete
- [x] Database update script provided

---

**System Status**: ✅ **READY FOR DEMO**

Last Updated: 2025-11-13


Module-1 Introduction to Project Management

1. Introduction:

The Crime Record Management System (CRMS) is a web-based software application developed to manage and maintain crime-related records digitally. The system helps police departments store, update, retrieve, and manage information related to police stations, officers, criminals, victims, evidence, crime reports, and cases.

The application reduces manual paperwork and improves efficiency, security, and accuracy in handling crime records.

Project Management plays an important role in successfully planning, developing, testing, and maintaining this software project.


2. Activities Covered by Software Project Management:

The following activities are included in the development of CRMS:

1.Requirement Analysis

Collecting requirements from police departments.

2.Planning

Creating schedules, resources, and timelines.

3.Designing

Designing database tables and user interfaces.

4.Development

Coding modules such as:

Police stations
Officers
Crime reports
Cases
Criminal records
Victim records
Evidence management

5.Testing

Checking system functionality and fixing errors.

6.Maintenance

Updating and improving the software.

Stakeholders

Stakeholders are people involved in or affected by the project.

3. Stakeholders in CRMS
Police Department
System Administrators
Police Officers
Government Authorities
Development Team
Citizens



