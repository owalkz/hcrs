# Home Caretakers Recruitment System
The Home Caretakers Recruitment System is a web application that provides a platform for homeowners to advertise their properties as jobs for caretakers. Registered caretakers can then apply for the advertised jobs, bridging the gap between homeowners and caretakers.

## Main Features
Authentication and account creation for caretakers and homeowners.\
Homeowners can post properties as job listings.\
Caretakers can apply for jobs.\
Homeowners can approve or reject applications from caretakers.

## Technologies Used
HTML5\
CSS3\
PHP\
MySQL\
PHPMyAdmin (for database management)

# Installation
To install the Home Caretakers Recruitment System, follow these steps:

Install XAMPP or WAMP on your machine.\
Install MySQL server.\
Import hcrs.db into PHPMyAdmin.\
Start Apache and MySQL from XAMPP or WAMP.\
Copy all files to the htdocs folder in XAMPP or www folder in WAMP.

# Usage
On your web browser, enter the following url to access the homepage: http://localhost/System/HTML&PHP/index.htm
![Image Alt text](/hcrs/images/homepage.JPG "Homepage")

In order to access the system services, click on “Get Services”. 
The following page should open up: 
![Image Alt text](/hcrs/images/login_page.JPG "Homepage")

Use your credentials to log in to the system. However, if no accounts have been created, click on the link at the bottom to register an account. The page on the following page should open up: 
![Image Alt text](/hcrs/images/registration_page.JPG "Homepage")

Enter your name, email address, and selected password. Then, under the “I am a: “ field, leave it as it is if a Home Owner account is being created, otherwise, click the dropdown arrow and select Caretaker to create an account as a caretaker. 

After registration use your newly created account to login.

If logged in as a home owner, the following page should open up:
![Image Alt text](/hcrs/images/mainpage_home_owner.JPG "Homepage")

If logged in as a caretaker, the following page should open up:
![Image Alt text](/hcrs/images/mainpage_caretaker.JPG "Homepage")

## Home Owner Procedures
In order to view the system dashboard, click on the “dashboard” tab. The following page should open up: 
![Image Alt text](/hcrs/images/dashboard.JPG "Homepage")

For this page and all others as well, there is a “Home Page” bar which you can click in order to return to the main page. 

In order to view the available caretakers, click on the “View Caretakers” tab. The following page should open up: 
![Image Alt text](/hcrs/images/view_caretakers.JPG "Homepage")

In order to post a property, click on the “Post Property” tab. The following page should open up: 
![Image Alt text](/hcrs/images/postproperty.JPG "Homepage")

In order to view and change the details of created properties, click the “View and Edit Properties” tab. The following page should open up: 
![Image Alt text](/hcrs/images/view_and_edit_properties.JPG "Homepage")

To make changes, type the name of the property to be changed and the new details then click on the “Make Changes” button in order to apply the changes. 

In order to view the applications made to your properties, click on the “View Applications” tab. The following page should open up:
![Image Alt text](/hcrs/images/owner_applications_view.JPG "Homepage")

In order to approve an application, enter the respective property and caretaker id then click on the “Approve Application”. 

## Caretaker Procedures
In order to view the dashboard, click on the “Dashboard” tab. The following page should open up: 
![Image Alt text](/hcrs/images/dashboard.JPG "Homepage")

In order to view the available properties and make applications, click on the “View Properties and Make Applications” tab. The following page should open up: 
![Image Alt text](/hcrs/images/caretaker_application.JPG "Homepage")

In order to make an application, enter the respective property id and owner id then click on the “Make Application” button. 

In order to view or remove the applications made, click on the “My Applications” tab. The following page should open up: 
![Image Alt text](/hcrs/images/view_or_withdraw_application.JPG "Homepage")

In order to withdraw an application, enter the respective property id then click on the “Withdraw Application” button. 

In order to view and make changes to your profile, click on the “My Profile” tab. The following page should open up: 
![Image Alt text](/hcrs/images/profile_change_caretaker.JPG "Homepage")

In order to make changes to your profile, enter the name and email address you would like to change to then click on the “Make Changes” button. 

## Common Procedures
In order to exit the system click on the logout button located on the top right section of the main page. 
![Image Alt text](/hcrs/images/logout.JPG "Homepage")



# Future Enhancements
Capture more details about caretakers\
Support for images and other file types\
UI enhancements using modern frameworks

These enhancements were made when the project was recreated under the name Tekkiez: 