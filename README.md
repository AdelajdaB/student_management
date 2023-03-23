<br><h1>LARAVEL COMPANY & EMPLOYEE MANAGEMENT CRM</h1><br>

This project is a Laravel-based web application designed to manage companies and their employees. <br>
With this project, you can add new companies and employees, view existing ones, update their details, and delete them.

<br><h2><strong>Getting Started</strong></h2><br>
To get started with this project, you will need to follow the steps below:

<ol>
    <li>
    <strong> Clone this repository to your local machine using the following command: </strong><br>
        Copy code <code>git clone https://github.com/AdelajdaB/crm_management.git</code>
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

<br><h2><strong>Features</strong></h2><br>
This project comes with the following features:
<h3><strong>Companies</strong></h3>
<ul>
    <li>View a list of all companies</li>
    <li>Add new company profile</li>
    <li>Edit existing companies (When updating a company profile recursively are updated also employee profiles that were related with that specific company)</li>
    <li>Delete existing companies (When deleting a company profile recursively are deleted also employee profiles that were related with that specific company)</li>
</ul> <br>

<h3><strong>Employees</strong></h3>
<ul>
    <li>View a list of all employees</li>
    <li>Add new employees to a company</li>
    <li>Edit existing employees</li>
    <li>Delete existing employees</li>
</ul>

<br><h2><strong>License</strong></h2>
This project is licensed under the MIT License.
