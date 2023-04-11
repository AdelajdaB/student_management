<br><h1>STUDENT MANAGEMENT SYSTEM</h1><br>

This project is a Laravel-based web application designed to manage students. <br>
With this project, you can register as a new student, login to your existing account, view lists of students, edit profile and delete it.

<br><h2><strong>Getting Started</strong></h2>
To get started with this project, you will need to follow the steps below:

<ol>
    <li>
    <strong> Clone this repository to your local machine using the following command: </strong><br>
        Copy code <code>git clone https://github.com/AdelajdaB/student_management_system.git</code>
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
        <strong>Create a new database for this project and update your .env file with your database credentials. </strong>
    </li>
    <li>
        <strong>Run the database migrations: </strong>
        <code>php artisan migrate</code>
    </li> 
    <li>
        <strong>You can now start the development server using the following command: </strong>
        <code>php artisan serve</code>
    </li>     
</ol>

<br><h2><strong>Features</strong></h2>
This project comes with the following features:
<h3><strong>Student</strong></h3>
<ul>
    <li>View a list of all students</li>
    <li>Add new student profile (register)</li>
    <li>Edit existing student profile (When updating a student profile recursively are updated also courses profiles that were related with that specific student)</li>
    <li>Delete existing student profile (When deleting a student profile recursively are deleted also courses profiles that were related with that specific student)</li>
</ul> <br>

<h3><strong>Courses</strong></h3>
<ul>
    <li>Appears on the edit view of Edit Student</li>
    <li>Shows a table of courses, date modified, subscribed and general information</li>
</ul>

<br><h2><strong>License</strong></h2>
This project is licensed under the MIT License.
