**Hotel Booking and Management System**

**Introduction**

This project titled "Hotel Booking and Management System" is aimed to
provide an effective way for guests to book rooms in small scale hotels
and for these hotels to manage the guest through the various departments
and services. Each customer arriving in the hotel can book a room
according to his choice by choosing from different options available. A
customer can book many rooms but one room can be assigned to only one
customer. The customer can enter the number of guests arriving with him
whose details are to be submitted in the front desk with appropriate
ID's as per government regulations and hence details of accompanying
guests are not represented in computer database. A customer and all the
accompanying guests are uniquely identified by the booking ID which is
given to the customer at the time of the booking. All the purchases made
during the stay at the hotel are linked to that booking ID. The person
booking the room has to provide his details such as First Name and Last
Name along with permanent address. The customer also has to provide the
Entry and Exit date of his stay at the hotel at the time of booking.

Each room in the hotel has a unique room number which identifies it.
Rooms have different bed-type. The option of air-conditioned rooms and
non-air-conditioned rooms is available. The cost of the room is decided
accordingly.

The hotel also has different departments which help in the efficient
working of the hotel. Each department in the hotel has a department ID,
department name and a department budget. Each department also offers
various amenities available for the customers to enjoy. The various
departments also help in managing all the rooms in the hotel. The
amenities offered by the department are assigned a unique ID, have a
name and cost.

Every customer is free to order form the wide variety of the amenities
offered by the hotel and order the required quantity of specific
amenities. Each amenity is offered by a specific department and will be
fulfilled by that particular department. For example, *House* *Keeping
Department* offers *Cleaning Services, Kitchen Department* offers the
wide variety of *Foods.* The bill for the specific amenity is generated
by that department.

Employees work in the hotel in various department. All employees are
assigned to department, an employee can work only for a single
department. Each employee is assigned a unique employee ID. Employee
name, salary, position, DOB and phone numbers are also stored in the
database.

Each department generates a bill for the orders by the customers and
each bill has a unique Bill ID. Each bill also contains the bill amount,
bill status which tells us whether it is paid or unpaid and the payment
method. A customer can see the bills assigned to his booking ID and pay
accordingly.

This project design is mapped into corresponding
Entity-Relationship(E-R) diagram which is given later in the project
report. The E-R diagram is also mapped into the corresponding
Relationship Schema. The relationship schema is designed so that the
database has fast query processing and easy to manage which may result
into some redundancy or violation of some normalization forms. The table
have been accurately Normalized up to 3NF form.

**Entity-Relationship Diagram**

![](./media/image1.jpeg){width="6.877724190726159in"
height="7.283333333333333in"}

Entity in ER Model:

-   *CUSTOMER:* with attributes (*Cust_Phone,
    Cust_Dob,Cust_Email,Cust_Fname,Cust_Lname,Cust_Home,Cust_Street,Cust_City,Cust_No_Of_Guest,Entry_Date,Exit_Date,
    No_of_days (***derived attribute*)*** *Booking_ID(**primary key)**)*

-   *DEPARTMENT:* with attributes (*Dept_Id (**primary key)**,
    Dept_Budget)*

-   *ROOM:* with attributes ( *Bed_Type, Air_Condition, Room_No
    (**primary key)** ,Room_Cost,Room_Availibility)*

-   *BILL:* with attributes (*Bill_Amt, Bill_ID (**primary
    key),**Bill_Status,Payment_Method)*

-   *EMPLOYEE:* with attributes (*Emp_ID (**primary key)**, Emp_Sal,
    Emp_Fname,Emp_Lname, Emp_Dob, Emp_Phone,Emp_Pos)*

Weak Entity:

-   *AMINITY:* with attributes (Ami_ID (***partial key*)**,
    Ami_Cost,Ami_Name)

Relationships in The ER Model:

-   *BOOKS:* relates customer with the room booked.

-   *PAYS:* relates customer with the total bill.

-   *MANAGES:* relates room with the department it is managed by.

-   *ORDERS:* relates customer with the amenity ordered.

-   *SENDS:* relates bill with the department.

-   *EMPLOYS:* relates department with the employee.

-   *OFFERS:* relates weak entity amenity with the department.

**E-R To Relational Model**

![](./media/image2.jpg){width="6.5in" height="3.6590277777777778in"}

*Figure 1. E-R Relational Model Schema.*

*Customer* entity is having multivalued attribute *Cust_Phone* which is
mapped separately in *CustPhoneRel* with compound key *Booking_Id* and
*Cust_Phone* it also has foreign key constraint *Booking_Id* which links
it to *Customer* table. Similarly, the multivalued attribute of employee
entity is mapped in a separate table called *EmpPhoneRel.*

*Customer* and *Room* have one to one binary relationship hence the
primary keys of both tables are added as foreign key in each other's
table. We can also combine them into single table according to the
minimization technique mentioned in the C.J. Date book but as we need
*Room* table for linking with department separtely and for having easy
and fast query processing we are kepping them separate.

*Customer* and *Aminity* have many to many relationship so another table
called *Orders* is created which contains the discriminatory attributes
of the relationship (i.e. orders) between these entities and also the
primary keys of the two Entities working together as compound key and
separately as foreign key for linking the *Orders* table separtely with
entity tables.

*Aminity* being a weak entity is mapped with the Primary key of the
owner entity called *Department*. The primary key of the owner entity
*Dept_Id* and the partial key of *Aminity* called *Ami_Id* together form
the primary key of the table.

*Department* and *Room* have many to many relationship between them
hence another table is created called *Manages* which has the primary
keys of both the participating tables acting individually as foreign key
for linking to their tables and acting together as primary key of the
table *Manages*.

*Department* and *Employee* have one to many relationship between them
wit total participation from the side of *Employee* hence *Dept_Id* the
primary key of *Department* table is added as foreign key in *Employee*
table. Similarly, *Department* and *Bill* have one to many relationship
with total participation from the side of Bill table hence the primary
key of *Department* is added to the *Bill* table. *Customer* and *Bill*
having same type of relationship as mentioned above with total
participation from the side of the *Bill* hence the primary key of
*Customer* called *Booking_Id* is added to the *Bill*.

**Normalized Tables**

![](./media/image2.jpg){width="7.294154636920385in"
height="4.191666666666666in"}

*Figure 2. Normalized Tables for Our Schema.*

The above given tables are in third normal form. According to the 1^st^
Normal Form there should be no multivalued attribute in our tables.
Therefore, I have created two extra tables called *cust_phone_rel* and
*emp_phone_rel* which are used to store multivalued attribute phone
numbers. The tables are all in 2^nd^ Normal form as well as there is no
partial dependency all the values can only be identified by the primary
key or the group candidate key. There is no partial dependency. For
serving this reason exactly I have created a table called *Manges.* The
tables all satisfy the condition of 3^rd^ Normal Form as for all
possible X --> Y, X is either a super key and Y is prime attribute as
can be seen in *Orders* table.

**Prerequisites**

For any graphical user interface Database Management System Application
there are three important components required for basic Create, Update,
Read and Delete (CRUD) functionalities.

1.  Front-End

2.  Connecting language

3.  Back-End.

Front-End is thath part of our application that is used to design to
attract the customers or viewers to our page. It is created with keeping
easy accessibility in mind. Interactive and interesting designs are used
so that the user can select, submit and access the products which I have
designed for him/her. I have accomplished this using Hyper Text Markup
Language (HTML) which serves as the building block of our web page.
Cascading Style Sheet (CSS) is used by me to beautify the page.
JavaScript (JS) is used for handling various events happening in the
webpage. Bootstrap is used for making the webpage dynamic and
self-adjusting.

Connecting Language is used to connect our web page with our back-end
database. Whenever we are using a web application there should be means
to send the data entered by the user to our database. I have used
Personal Home Page (PHP) as it is light and very safe for small projects
such as build by me.

Back-End is used to store the data in our database. Here we use our DBMS
capabilities to implement the CRUD functionalities. It requires the use
of a web server and Database framework. I have used XAMMP tool which
uses Apache server and MySQL database to help manage our backend design.

![](./media/image3.png){width="6.2in" height="2.4735958005249343in"}

*Figure 3. XAMMP App for Back-End.*

**Loader Screen for All Webpages.**

Any website which we go on has to load from the server the data it
contains. It is very important that while the page loads, we actually
see something instead of a blank screen. As a black screen will lead to
confusion, as humans need something to grab our attention and keep it
focused. I have created a loader screen which serves the exact same
purpose it tells the customer about my hotel name while the web page is
loading. The actual loading video is submitted in drive.

![](./media/image4.emf)

This is the code for the loader function it uses JS functions and CSS
elements to give a beautiful loader screen.

![](./media/image5.png){width="6.5in" height="3.65625in"}

*Figure 4. Loader screen with hotel name.*

**First Page of Website**

The first part of the web page is the navigation bar it is transparent
and the different parts change colour when mouse is hovered on it. It
also contains the logo of my company hotel designed by me. The
navigation bar is common to all pages and can be used to navigate
through my website.

![](./media/image6.png){width="6.933333333333334in"
height="0.7916666666666666in"}

*Figure 5. Navigation Bar.*

I have created a hotel logo using Vector Scalable Graphic (VSG) so as
the logo maintain its quality event though the page is zoomed in our
out. I hope you like it sir.

![](./media/image7.png){width="1.6in" height="0.875in"}

*Figure 6. My hotel Logo.*

The second part of the page is the moving carousal which rotates and
displays the images of my hotel and can attract the customer to stay and
enjoy in my hotel. I have created using bootstrap class called carousal.
The carousal keeps rotating and shows different images to the user.

![](./media/image8.png){width="6.5in" height="2.4305555555555554in"}

*Figure 7. Carousal for Web Page*

The next is the box image grid showing different amenities offered by my
hotel. It is hover capabilities so as you hover on image different text
and features are showed accordingly.

![](./media/image9.png){width="6.5in" height="3.65625in"}

*Figure 8. Image grid.*

The next part in our web page is the container class box which has some
information about our vide with embedded video which can be viewed on
the site without leaving the webpage.

![](./media/image10.png){width="6.5in" height="3.025in"}

*Figure 9. Container box with video.*

Whenever we are searching for a place to book our hotel one of the most
important thing is to get the reviews of others who have stayed in the
hotel previously. I have designed this feature using the Floating Card
feature of Bootstrap and JS along with CSS for styling.

![](./media/image11.png){width="6.5in" height="2.683333333333333in"}

*Figure 10. Floating Card for Reviews.*

The last component of my web page is the footer as the person keeps
scrolling, he arrives at the end of web page and if he is interested in
the content, he should have some way to contact us and know some more
detail. That's why I have created a footer common for all pages.

![](./media/image12.png){width="6.5in" height="3.43125in"}

*Figure 11. Footer for Web Page.*

**Sign in Page**

This is the page which the user can sign in to view the details of all
other pages. This is page is prerequisite for booking hotel rooms in my
website. Whenever the user tries to go to booking page of my website
there is system check with PHP and \$SESSION_VARIABLE which checks if
the user is logged in or not. If the user is not logged in the user is
directed here. I have also provided an option to Sign Up if the user has
not created an account in my website.

![](./media/image13.png){width="6.844444444444444in" height="3.85in"}

*Figure 12. Sign in Page for User.*

The box contains an HTML form which contains accepts the value from the
user and sends it PHP script is then run to verify whether the user is
present in our database, if present he is directed to booking page. If
not appropriate message such as "Wrong Password/User ID is Displayed."
It also contains my logo.

The code for it is very long and I am only including one snippet which
is part of it. One important detail is that one should never accept the
user input and directly insert them in our DBMS. We should always use
*mysqli_real_escape_string* as this helps prevent SQL injection attacks.

\$username= mysqli_real_escape_string(\$db, \$\_POST\['username'\]);

![](./media/image14.emf)

*Code Snippet for Sign in Page.*

We are using PHP to start a session all the values which are sent by the
form are stored in different variables which are activated when \$POST
method is activated by login button. On these values using PHP I check
whether any column is empty or such. Then using PHP I create a
connection to the database using *mysqli_connect()* this connection will
be utilized along with different functions to communicate with the
database. Then I have written query which utilizes SELECT statement to
fetch the rows having username and password same as the input. If a row
is found user is Logged In. If not, a message is pushed in an array
which is displayed on the form as red small text. If Logged In user is
sent to booking page using *Header ()* function in PHP.

The values for the same is inserted in the database as seen in *figure
13* some of the password are encrypted by *md5()* encryption in the
table.

![](./media/image15.png){width="6.5in" height="1.3409722222222222in"}

*Figure 13. Database table for Sign In*

**Sign Up Page**

As mentioned in the sign in page that if the user is not signed up,
he/she is redirected towards this page so they can create a username and
password for login.

![](./media/image16.png){width="7.083225065616798in"
height="3.4916666666666667in"}

*Figure 14. Sign Up Page for Website.*

This is a simple HTML from designed to perfection by me using CSS and
Bootstrap. When the user enters his/her information there are various
check performed with the help of PHP. I check first whether username is
already registered or not this is done by SQL query run through PHP
database connection. If username is already registered error message is
printed as seen in the picture. Similar check is also performed for
Email. Another check is that the password and confirm password should be
same

\$username = mysqli_real_escape_string(\$db,\$\_POST\['username'\]);

\$email = mysqli_real_escape_string(\$db,\$\_POST\['email'\]);

\$password_1 = mysqli_real_escape_string(\$db,\$\_POST\['password_1'\]);

\$password_2 = mysqli_real_escape_string(\$db,\$\_POST\['password_2'\]);

if(empty(\$username)) {array_push(\$errors,"Username Is Required");}

if(empty(\$email)) {array_push(\$errors,"Emial Is Required");}

if(empty(\$password_1)) {array_push(\$errors,"Password Is Required");}

if(\$password_1 != (\$password_2)) {array_push(\$errors,"Passwords Do Not Match");}

}

*Code Snippet checking for empty field.*

// Check Db for existing User 

\$user_check_query= "SELECT \* FROM user_reg WHERE username = '\$username' or email = '\$email' LIMIT 1" ;

\$results = mysqli_query(\$db,\$user_check_query);

\$user = mysqli_fetch_assoc(\$results);

if(\$user)  {

    if(\$user\['username'\] === \$username) array_push(\$errors,"Username already exists");

    if(\$user\['email'\] === \$username) array_push(\$errors,"This is email-id already has a registerd username");

}

*Code Snippet Checking for Existing User.*

If everything is done correctly the user is directed to the booking page
to book rooms in my hotel room.

//Register the user if no error

if(count(\$errors)== 0) {

    \$password = \$password_1;// this encrypts password

    \$query = "INSERT INTO user_reg (username, email , password1 )  VALUES ('\$username','\$email','\$password')";

    mysqli_query(\$db,\$query);

    \$\_SESSION\['username'\] = \$username;

    

    \$\_SESSION\['success'\]= "You Are Now Logged In";

    \$errors=array();

    header("Location: book.php"); 

}

*Inserting User in Database If no Errors.*

**Booking Page for Rooms**

The Sign in page and the Sign Up page after successfully executing
directs the user to this page. This page provides the user the facility
to see the room available in the hotel. In the top of the page the user
if of the logged in user is displayed in green so that user can
understand he is logged in under what name it is shown in *figure 15.*

![](./media/image17.png){width="6.5in" height="0.8083333333333333in"}

*Figure 15. Logged In User Name in Green.*

All the rooms are displayed in the card format. Each room type has
indicator telling about the number of rooms left of that type. So that
the user can identify how many rooms are available of each type in the
hotel room. This can be seen in *figure 16.*

![](./media/image18.png){width="5.966666666666667in" height="3.10625in"}

*Figure 16. Rooms Card with Available Rooms.*

![](./media/image19.png){width="3.8673611111111112in"
height="7.514583333333333in"}

*Figure 17. Form for Booking Room.*

Then in the page is a form which the user can use to select the rooms
available in the hotel. As we want the customers to use the same email
for booking as well as login so it is better for me to serve them. I
have made the form field of email having the prefilled email id of the
user used during login. This is possible due to the session variable
feature available in PHP. I have also provided the drop-down feature for
selecting the room so as to give the choice of selecting rooms which are
provided by us and avoid spelling mistakes in entry.

The feature of Entry Date, Exit Date and date of Birth are available to
fill in the fields. Also, the pin code can be only six digits this is
possible using *Regex* functionality available in HTML.

While accepting the details I have to check various constraints. Which
are as follows.

1.  Birthdate should be not greater or equal to Today's date.

2.  Entry date should be not less than today's date.

3.  Exit date should be greater than or equal to entry date.

These are performed through conditional statements available in the PHP,
all the errors are stored in an array which is printed on the top of
form. The values are only stored if the number of errors is zero.

\$errors23 =array();

if(\$EntryDate > \$ExitDate) {array_push(\$errors23,\"Entry date before exit date\");}

if(\$today > \$EntryDate) {array_push(\$errors23,\"Enter entry date after today\");}

if(\$today \<  \$CustDob) {array_push(\$errors23,\"Invalid Birthdate\");}

\$user_check_query1= \"SELECT RoomNo FROM rooms WHERE BedType = \'\$BedType\' AND RoomAvail = true LIMIT 1\" ;

\$results23 = mysqli_query(\$db23,\$user_check_query1);

*Code snippet for Checking Entry, Exit, Birth date validity*

After this if the number of errors is zero, we insert the values in our
Booking table. It is now important to simultaneously update the Room
table so the selected room is made unavailable and the updated value is
displayed in the booking page room card shown in *figure 16.* The
following is done by the given code snippet.

if(count(\$errors23) == 0 && mysqli_num_rows(\$results23) > 0) {  

    \$query23 = \"INSERT INTO customer (CustFname, CustLname, CustDob, CustHome, CustStreet, CustCity, CustEmail, CustNoGuest, EntryDate, ExitDate, RoomNoFk) VALUES (\'\$CustFname\', \'\$CustLname\', \'\$CustDob\', \'\$CustHome\', \'\$CustStreet\', \'\$CustCity\', \'\$CustEmail\', \'\$CustNoGuest\', \'\$EntryDate\', \'\$ExitDate\', \'\$room1\')\";

    mysqli_query(\$db23,\$query23) or die ( mysql_error() );

    \$query24= \"UPDATE rooms SET RoomAvail=false WHERE RoomNo=\'\$room1\'\";

    mysqli_query(\$db23,\$query24) or die ( mysql_error() );

    \$\_SESSION\[\'bcc\'\]=\"Booking Successful\";

    \$\_SESSION\[\'BookedRoom\'\]=true;

    \$query24=\"SELECT BookingId FROM customer WHERE CustEmail=\'\$CustEmail\' AND CustDob=\'\$CustDob\' limit 1\";

    \$results24 = mysqli_query(\$db23,\$query24);

    if(mysqli_num_rows(\$results24) > 0) {

        \$Bookingid = mysqli_fetch_assoc(\$results24);

        \$kk= \$Bookingid\[\'BookingId\'\];

        \$\_SESSION\[\'BookingID\'\] = \$kk;

    

    }

*Code Snippet for Inserting Values of Booking Page*

After completing this step, the value are inserted in the Customer table
which will be used for further action in the database.

![](./media/image20.png){width="7.323943569553806in"
height="0.6666666666666666in"}

*Figure 18. Customer Table with Values Stored.*

The user is then redirected to the ordering amenity page to order food
and various amenities.

**Order Items**

This page also contains the username at the top of page in green colour.
It contains a scrolling text which is made possible using *marquee* tag
of HTML. As it is shown in the *figure 19.* The text "Orders item from
table has reached towards the end of the screen and will continue to
scroll in loop.

![](./media/image21.png){width="6.5in" height="1.0319444444444446in"}

*Figure 19. Scrolling Text to Grab Attention.*

After this there is a menu card which is created using table in HTML and
forms of HTML. The user can see the images of the amenities offered by
the Hotel and the prices are also displayed in the table coloumn. The
user can select the number of items required for each individual items.
Clicking the Order Now button submits the order.

![](./media/image22.png){width="6.5in" height="5.5569444444444445in"}

*Figure 20(a). Menu for Ordering the food Items.*

![](./media/image23.png){width="6.5in" height="4.84375in"}*Figure 20(b).
Table with Order Now Button.*

When the user submits the form for ordering. I accept the value and
perform checks if none of the content is selected and form is submitted.
There is an error message that prompts the user to select number of
items before ordering. As default value of all the quantity of items is
zero, I accept only those values which are greater than zero. In my
Amenities table (*figure 21*) I have all the amenities with their
amenity id and the department id which is responsible for handling that
amenity.

In the backend when the values are submitted the calculation are
performed. I take the price of the ordered amenity from the Amenity
table based on the amenity id after which the cost is multiplied and the
value generated for the total is submitted in the Orders table which can
later be used to create bill for the customers.

![](./media/image24.png){width="6.1in" height="2.9848293963254595in"}

*Figure 21. Table Containing Available Amenities in Hotel*

    if (\$op > 0)

    {

        \$Ord=\$orderqt1\[\$step\];

        \$OrdersAmiId=\$op;

        \$query1=\"SELECT BookingId from customer where CustEmail=\'\$email\'\";

        \$results1=mysqli_query(\$db23,\$query1) or die(mysql_err());

        \$OrdersBookingId1=mysqli_fetch_assoc(\$results1);

        \$OrdersBookingId=\$OrdersBookingId1\[\'BookingId\'\];

        \$query2=\"SELECT AmiCost from aminity where AmiId=\'\$Ord\'\";

        \$results2=mysqli_query(\$db23,\$query2) or die(mysql_err());

        \$OrdersTotal1=mysqli_fetch_assoc(\$results2);

        \$OrdersTotal=\$OrdersTotal1\[\'AmiCost\'\] \* \$op;

        \$query3=\"INSERT INTO orders (OrdersAmiId, OrdersBookingId, OrdersQty, OrdersDate, OrdersTotal) VALUES (\'\$Ord\',\'\$OrdersBookingId\',\'\$op\',\'\$OrdersDate\', \'\$OrdersTotal\')\";

        mysqli_query(\$db23,\$query3) or die(mysql_err());

        \$\_SESSION\[\'Order\'\]=\"Order Placed Successfully\";

    }

    \$step++;

}

*Code Snippet for Ordering Amenities*

**Log Out**

A log out button is also created which logs out the user form the
current session. The button is there in the drop-down menu of navigation
bar.

![](./media/image25.png){width="6.496738845144357in"
height="1.1205807086614172in"}

*Figure 22. Log Out option In Navigation Bar.*

The navigation bar works by a function in PHP called session_destroy().
Invoking this function destroys all the session variables and ends the
session. This process logs out the user from the website.

// Unset all of the session variables

\$\_SESSION = array();

 

// Destroy the session.

session_destroy();

 

// Redirect to login page

header(\"Location: sign_in.php\");

exit;

?>

*Code Snippet to Log Out the User from database.*

**Admin Log in Page**

In the navigation bar of the website there is an option to go to admin
page of the website. Admin in this context is a person of my Hotel
Company which can see the users who have booked in our hotel and the
details of the employee working for my hotel.

![](./media/image26.png){width="6.5in" height="0.5361111111111111in"}

*Figure 23. Normal user Logged Out.*

This page contains a form to log in as admin. If any user tries to
access this page, he/she is immediately logged out as the user. Then the
person can enter the credentials given by the Database Administrators as
the process is in VIT. The admin can use the username and password to
log in the database. There is condition matching by username and
password already present in the Admin table. A small part of the code is
included below.

![](./media/image27.png){width="6.5in" height="3.9680555555555554in"}

*Figure 24. Admin Log in Page.*

  if(count(\$errors11)==0)

    {

        

        \$query1 = \"SELECT \* FROM admin_reg WHERE adminname=\'\$username\' AND adminpassword=\'\$password\'\";

        \$results1 = mysqli_query(\$db, \$query1);

        if(mysqli_num_rows(\$results1)) {

            

            session_start();

            \$results23=mysqli_fetch_assoc(\$results1);

            // Store data in session variables

            \$\_SESSION\[\"adminloggedin\"\] = true;

            

            \$\_SESSION\[\'ADMINname\'\] = \$username;

            \$\_SESSION\[\'success\'\] = \"Logged In Successfully\";

            \$errors11=array();

        

            header(\"Location: customer_details.php\");

        }

        else

        {

            array_push(\$errors11,\"wrong username/password\");

            

        }

    }

} 

?>

*Code Snippet for Logging In the Admin*

**Customer Details Page**

When the admin of the page is logged in, he/she can see the details of
all the customer who have booked a room in my hotel. The details of the
customer are available in a tabular format which can then be used to see
all the particulars of the booking made by the user.

![](./media/image28.png){width="7.2405479002624675in"
height="1.1363637357830272in"}

*Figure 25. Table Providing the Details of The Customers.*

![](./media/image29.png){width="3.5190474628171478in"
height="4.00719706911636in"}There are two options available for each
customer. One is to edit the details, if a customer wants to extend the
stay or if he made a mistake while filling the form the details can be
edited. The record can also be deleted as a whole. When edit option is
selected by the admin a form is opened with the values of that customer
already filled as shown in *figure 26,* details can then be edited and
when enter option is selected the constraint check are performed if no
error found the data is updated in the table.

*Figure 26. The edit Buttons Fills the Form Updated Value stored when
submitted.*

![](./media/image30.emf)

*Code snippet for Updating Customer Record*

**Employee Details Page**

The admin can see all the employees working in the hotel. This page
enables the admin to add any employee to company database and also
change the details of any of the employee working in the hotel. There
are options to edit and delete any record available.

![](./media/image31.png){width="6.9372353455818025in"
height="1.1969695975503063in"}

*Figure 27. Employee Details with Edit and Delete Options.*

The page contains a form which is used to add values in the employee
tables after checking the require integrity conditions. When the edit
button is clicked the form is filled with details of selected employee
and the required details can be edited, after submitting the form
integrity constraints are checked if all are fine the form is submitted
else errors messages are printed.

![](./media/image32.png){width="3.078226159230096in"
height="4.264893919510061in"}

*Figure 28. When Edit Button is Clicked values pre entered.*

The normal state of the button is "Save" it changes when edit option is
selected.

![](./media/image33.png){width="4.571532152230971in"
height="3.1966535433070864in"}*Figure 29. Button Value is Originally
Save It changes to Update when Edit is clicked.*

After successful updating of the record a message is displayed in the
form of prompt to the admin.

![](./media/image34.png){width="6.5in" height="1.6893941382327209in"}

*Figure 30. Message Showing The success of record being edited.*

**Customer Bill**

When the user checks out, he has to pay the bill of all the amenities he
has enjoyed throughout his stay in the hotel. This page prints out every
bill of the customer in a tabular form with the option to the person
handling the page to edit the details of the payment. When the customer
pays a bill, the manager can edit the status of bill to "PAID" as
default value is "NOT PAID".

![](./media/image35.png){width="7.228867016622922in"
height="0.9924245406824147in"}

*Figure 31. Details of Customer Bill.*

When the manger wants to edit the value of the payment status of a
particular bill. The details are filled in the form given below in the
*figure 32,* except the *PaymentMethod* and *BillStatus* all fields are
read-only so no changes in price and other details can be done. After
this the form is submitted and the values are updated in the bill
record.

![](./media/image36.png){width="2.985921916010499in"
height="3.9919903762029745in"}

*Figure 32. Form for Payment of Bill.*

![](./media/image37.emf)

*Code Snippet for Updating the Bill Table.*
