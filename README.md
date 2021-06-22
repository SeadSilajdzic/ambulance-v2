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
 
 
 <h2>Possible systems</h2>
 <ol>
    <li>Roles & Permissions</li>
    <li>Appointment request</li>
    <li>Reception system</li>
    <li>Email notifications</li>
    <li>E-cartons (something like users profile just in this case for health appointment history)</li>
    <li>Departments + different types of doctors</li>
 </ol>



<h2>Future updates</h2>
<ul>
	<li>Live chat with Reception (as support in any time) - Livewire</li>
	<li>AJAX requests in forms - Livewire</li>
	<li>More protection for better privacy securance - Middleware/Policy</li>
	<li>Emails, notifications etc for patients and doctors (if appointment is close etc.)</li>
	<li>Translations/Localization</li>
	<li>Insurance payment system - Stripe integration</li>
	<li>Dinamyc system for nurses/doctors/other staff for shifts on calendar, vacations and other requests</li>
	<li>If the appointment was not performed but Appointed date is not valid anymore - Add anchor where appointment can be ReAppointed <br>-> when we click on reappoint then modal will be opened only with one field - date select and after save send mail to patient so he knows the new appointment date</li>
	<li>System for new workers to apply for job</li>
	<li>Try to make predefined templates of html and attach them to dynamically created pages</li>
	<li>Vacation request system</li>
	<li>Improve admin ui/ux</li>
</ul>


<h2>Required bugifxes and improvements</h2>
<ul>
	<li><del>When patient is trashed or removed it will display error that we dont have data in patients display</del></li>
	<li>Better overview of the models (users/patients/appointments/etc...)</li>
	<li>Detailed tests of the application because of the new features added lately</li>
	<li><del>Session issues</del></li>
	<li>Fix submit requests because of latest changes and added features (reception system) - min val on appointment store/update</li>
	<li>Fix validated data create and update methods in all controllers</li>
	<li>Fix birth date on fronted - limit for not to be able to put in future</li>
</ul>


<h2>TODO: </h2>
<ul>
	<li><del>Frontend</del></li>
	<li>Views</li>
	<li>Write tests</li>
	<li>Fix sessions design and add them in controllers/views</li>
	<li>Add errors to forms</li>
</ul>

Note: <b><u>All systems will be made and implemented from scratch!</u></b>
