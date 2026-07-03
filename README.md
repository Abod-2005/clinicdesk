# ClinicDesk - Clinic Management System

## Overview

ClinicDesk is a web-based Clinic Management System developed using PHP and MySQL following the MVC (Model-View-Controller) architecture.

The system allows administrators, doctors, and patients to manage clinic operations efficiently, including appointments, prescriptions, users, doctors, patients, reports, and authentication.

---

# Technologies Used

- PHP 8.x
- MySQL / MariaDB
- HTML5
- CSS3
- Bootstrap
- AdminLTE
- JavaScript
- XAMPP

---

# Project Architecture

```
clinicdesk/

│
├── config/
│   ├── config.php
│   └── database.php
│
├── controllers/
│   ├── AuthController.php
│   ├── DashboardController.php
│   ├── AppointmentController.php
│   ├── DoctorController.php
│   ├── PatientsController.php
│   ├── PrescriptionController.php
│   ├── ReportController.php
│   ├── SpecializationController.php
│   └── UserController.php
│
├── models/
│   ├── BaseModel.php
│   ├── UserModel.php
│   ├── DoctorModel.php
│   ├── AppointmentModel.php
│   ├── PrescriptionModel.php
│   ├── PatientModel.php
│   └── SpecializationModel.php
│
├── views/
│   ├── appointments/
│   ├── doctors/
│   ├── patients/
│   ├── prescriptions/
│   ├── reports/
│   ├── users/
│   ├── partials/
│   └── errors/
│
├── uploads/
│
├── core/
│
├── assets/
│
├── database/
│
└── index.php
```

---

# User Roles

The system supports three user roles:

## Administrator

The administrator can:

- Login
- Manage users
- Manage doctors
- Manage patients
- Manage appointments
- Manage specializations
- Delete appointments
- Export reports
- View statistics
- Activate or deactivate users

---

## Doctor

The doctor can:

- Login
- View dashboard
- View assigned appointments
- Change appointment status
- Add prescriptions
- Edit personal profile

---

## Patient

The patient can:

- Register/Login
- View dashboard
- Book appointments
- Cancel pending appointments
- View appointment history
- View prescriptions

---

# Main Features

## Authentication

- Login
- Logout
- Session Management
- Role-based Authorization
- CSRF Protection

---

## Appointment Management

Patients can:

- Book appointments
- Select doctor
- Choose date
- Choose time
- Write appointment reason

Doctors can:

- Confirm appointments
- Complete appointments
- Cancel appointments

Administrators can:

- View all appointments
- Delete appointments
- Export appointments

---

## Prescription Management

Doctors can:

- Create prescriptions
- Add diagnosis
- Add medications
- Add doctor notes

Patients can:

- View prescriptions

---

## Doctor Management

Administrator can:

- Add doctor
- Edit doctor
- Delete doctor
- Assign specialization
- Set consultation fee
- Set available days

---

## Patient Management

Administrator can:

- Add patient
- Edit patient
- Delete patient

---

## User Management

Administrator can:

- Create users
- Edit users
- Delete users
- Activate/Deactivate users

---

## Reports

Administrator can:

- Export appointment reports
- Export CSV files

---

# Database Tables

The project contains the following tables:

- users
- doctors
- appointments
- prescriptions
- specializations

---

# Security Features

- Password Hashing
- CSRF Protection
- Session Authentication
- Role Authorization
- Input Validation
- SQL Prepared Statements
- XSS Protection

---

# MVC Structure

Model

Responsible for database communication.

Controller

Processes user requests and business logic.

View

Displays data to the user.

---

# Installation

## 1. Clone Project

```
git clone https://github.com/yourusername/clinicdesk.git
```

or copy the project into

```
htdocs/
```

---

## 2. Import Database

Import

```
clinicdesk_db.sql
```

using phpMyAdmin.

---

## 3. Configure Database

Open

```
config/database.php
```

Update:

```
Host
Database Name
Username
Password
```

---

## 4. Start Apache & MySQL

Using XAMPP.

---

## 5. Open Browser

```
http://localhost/clinicdesk
```

---

# Default Accounts

## Administrator

Email

```
admin@clinic.com
```

Password

```
password
```

---

## Doctor

```
doctor1@clinic.com
```

Password

```
password
```

---

## Patient

```
patient1@clinic.com
```

Password

```
password
```

---

# Project Highlights

✔ MVC Architecture

✔ Responsive Interface

✔ Role-Based Access Control

✔ Secure Authentication

✔ Appointment Scheduling

✔ Prescription Management

✔ CSV Export

✔ Admin Dashboard

✔ Doctor Dashboard

✔ Patient Dashboard

✔ Bootstrap + AdminLTE UI

---

# Future Improvements

- Email notifications
- SMS reminders
- Online payments
- Medical history
- File uploads
- Search and filtering enhancements
- REST API
- Mobile application

---

# Developed By

ClinicDesk Development Team

Graduation / University Project

2026
