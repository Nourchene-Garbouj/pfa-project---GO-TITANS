# Go titans Project: Gym Management Platform

## Description
This project is a platform for gym users to check class availability and request memberships online. The platform simplifies the participation process and enhances the user experience, addressing the growing demand for fitness and healthy living.

### Features:
- Real-time class availability
- Membership requests
- User-friendly interface
- Login for trainers and clients
- Admin functionality to create additional admins via the desktop app
- Manage articles on the website for clients, guests, and trainers
- Manage users (create, update, delete)
- Change prices in the prices table
- CRUD operations for courses

## Technologies Used
- Web App: PHP, HTML, CSS
- Desktop App: .Net framework
- Database: SQL

## Project Structure
/PFA-Project
│
├── /website          # All web app files
├── /desktop-app      # All desktop app files
├── /database         # SQL file to create the database
├── /docs             # PDFs for web and desktop app documentation
└── README.md         # This file



## Installation

### 1. **Web App (PHP)**

1. **Install XAMPP**:
   - Download and install XAMPP from [here](https://www.apachefriends.org/index.html).
2. **Set up the database**:
   - Open XAMPP and start **Apache** and **MySQL**.
   - Go to `http://localhost/phpmyadmin`.
   - import user.sql file to create the admin user from `\Go-Titans-Project-main\database`
   - Create a new database (`pfa`).
   - Import the SQL file located in the `/database` folder (`pfa.sql`) into the newly created database.

3. **Set up the web app**:
   - Copy the entire `/web-app` folder.
   - Navigate to the XAMPP installation directory, find the `htdocs` folder (usually located at `C:\xampp\htdocs`), and paste the `web-app` folder there.

4. **Start the web app**:
   - Open your browser and go to `http://localhost/web-app/View/acceuil.php` to access the web application.

### 2. **Desktop App (.NET)**

You have two options for installing or running the desktop app:

- **Option 1: Install from Setup**:
   1. Navigate to the `/desktop-app/go titans Setup/Debug/go titans Setup.msi` folder.
   2. Run the installer to set up the desktop application.

- **Option 2: Open in Visual Studio**:
   1. Open the `/desktop-app` project folder in Visual Studio.
   2. Build and run the project directly from Visual Studio.

#### **Desktop App Functionality**
- **Login**:
   - only admins can log in to the application.
- **Admin Features**:
   - As an admin, you can create additional admin accounts directly from the desktop app.
   - Update articles on the website for clients, guests, and trainers.
   - Manage users (create, update, delete a user).
   - Change prices in the prices table.
   - Perform CRUD operations for courses.

## Usage
1. Open the web app at `http://localhost/web-app/View/acceuil.php`.
2. Sign up or log in as client to view class availability and make membership requests.
3. Sign up or log in as trainer to Create new classes and track how many participants will attend.
4. log in as admin to manage almost every aspect in the website
5. Use the desktop app for additional functionalities like trainer and client management, creating new admins and updating the articles and the prices table in the website.

## Documentation
- Refer to the `/docs` folder for the user manuals:
  - **web-app.pdf**: Documentation for the web application.
  - **desktop-app.pdf**: Documentation for the desktop application.

## Contributors
- Yassine Ben Yedder
- Nourchene Garbouj

## License
This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.



