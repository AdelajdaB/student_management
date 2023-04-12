<br><h1>STUDENT MANAGEMENT SYSTEM</h1><br>

This project is a Laravel-based web application designed to manage students. <br>
With this project, you can register as a new student, login to your existing account, view lists of students, edit profile and delete it.

<br><h2><strong>Getting Started</strong></h2>
To get started with this project, you will need to follow the steps below:

<ol>
    <li>
    <strong> Clone this repository to your local machine using the following command: </strong><br>
        Copy code <code>git clone https://github.com/AdelajdaB/student_management.git</code>
    </li>
    <li>
        <strong>Install all the dependencies using composer: </strong>
        <code>composer install</code>
    </li>
    <li>
        <strong>Create a new .env file by copying the <i>.env.example </i> file: </strong>
        <code>cp .env.example .env</code>
    </li> 
    <li>
        <strong>Generate a new application key: </strong>
        <code>php artisan key:generate</code>
    </li>
    <li>
        <strong>Create a new database for this project and update your .env file with your database credentials: </strong> <br>
        <code>mysql -u root</code> <br>
        <code>create database name;</code> (same database name is set in .env file)
    </li>
     <li>
        <strong>Seed created users: </strong>
        <code>php artisan db:seed</code>
    </li>    
    <li>
        <strong>Run the database migrations: </strong>
        <code>php artisan migrate</code>
    </li> 
    <li>
        <strong>You can now start the development server using the following command: </strong>
        <code>php artisan serve</code>
    </li>
    <li>
        <strong>Install npm: </strong>
        <code>npm install</code>
    </li> 
     <li>
        <strong>Start npm using the following command: </strong>
        <code>npm run dev</code>
    </li>            
</ol>

<br><h2><strong>Features</strong></h2>
This project comes with the following features:
<h3><strong>Student</strong></h3>
<ul>
    <li>View a list of all students(NID, Name, Surname, Number of courses subscribed)</li>
    <li>Add new student profile (register)</li>
    <li>Edit existing student profile(Edit also Subscribe checkbox from Course-Subscribe relation)</li>
    <li>Delete existing student profile(Option created on Edit view)</li>
    <li>Related with Courses table</li>
</ul>

<h3><strong>Courses</strong></h3>
<ul>
    <li>Appears on the edit view of Edit Student</li>
    <li>Shows a table of courses, date modified, subscribed and general information</li>
    <li>Related with Subscribe table</li>
</ul>

<h3><strong>Subscribe</strong></h3>
<ul>
    <li>Contains value of boolean</li>
    <li>Contains last updated time of subscribe</li>
</ul>

<br><h2><strong>License</strong></h2>
This project is licensed under the MIT License.
