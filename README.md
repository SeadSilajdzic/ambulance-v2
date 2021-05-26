<h1>Ambulance application overview</h1>

<p>Under construction</p>
<hr>

<strong>Admin</strong>: 
<ul>
    <li>CRUD for doctors</li>
    <li>CRUD for patients</li>
    <li>Managing reception</li>
</ul>

<strong>Doctors</strong>:
<ul>
    <li>List of appointments (each doctor can see his appointments)</li>
    <li>Clean view of done/not done/in progress appointments</li>
    <li>CRUD for appointments + form to edit appointments</li>
</ul>

<strong>Reception</strong>:
<ul>
    <li>List of all appointments + some crud options & clean overview</li>
</ul>


<h2>The idea on how this application should work</h2>
1. Patients are able to send appointment request over fronted form
2. Reception receives appointment request and approves it or reject
    
    2.1 If appointment is approved user will get mail that appointment is accepted with all the information related to appointment (date & doctor + auto generated password and username)
    
    2.1.1 Once user is approved he will stay in base for good because of future appointments or if he needs some quick information regarding his health appointment history
    
    2.3 If user is rejected he will get email why is rejected
 
 3. After user gets accepted he gets patient status and one of doctors will be able to take his case
 
 
 <h2>Possible systems</h2>
 1. Roles & Permissions
 2. Appointment request
 3. Reception system
 4. Email notifications
 5. E-cartons (something like users profile just in this case for health appointment history)
 6. Departments + different types of doctors
 etc.
 
 This is not final version of the product. There will be some application updates with new features like AJAX requests with Laravel Livewire etc.
