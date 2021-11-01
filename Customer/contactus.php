<html>
<head>
    <title>contact us</title>
</head>
<link rel="stylesheet" href="../css/index.css">
  <style type="text/css">
  * {
box-sizing: border-box;
}

/* Style inputs */
input[type=text], select, textarea {
width: 100%;
padding: 12px;
border: 1px solid #ccc;
margin-top: 6px;
margin-bottom: 16px;
resize: vertical;
}

input[type=submit] {
background-color: #4CAF50;
color: white;
padding: 12px 20px;
border: none;
cursor: pointer;
}

input[type=submit]:hover {
background-color: blue;
}

/* Style the container/contact section */
.container-fluid {
border-radius: 5px;
background-color: #f2f2f2;
padding: 10px;
}

/* Create two columns that float next to eachother */
.column {
float: left;
width: 50%;
margin-top: 15px;
padding: 20px;
}

/* Clear floats after the columns */
.row:after {
content: "";
display: table;
clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
.column, input[type=submit] {
 width: 100%;
 margin-top: 0;
}
}
  </style>


  <meta name=charset="viewport" content="width=device-width,intitial-scale=1">

  <link rel="stylesheet" href="Source/bootstrap/4.0.0-dist/css/bootstrap.min.css">
  
<body>
<div class="container-fluid">
<div class="row">
   <div class="col-lg-12">
   <nav class="nav">
     <ul class="ul">
      <li><a>Deskboard</a></li>
      <li><a href="customer.php">Home</a></li>
      <li><a>Service</a></li>
      <li><a href="contactus.php">ContactUs</a></li>
      <li><a href="../logout.php">Logout</a></li>
     </ul> 
   </nav>
     
   </div> 
</div> 
  <div style="text-align:center">
    <h2 class="bg-dark text-white">Contact Us</h2>
    <p class="bg-light text-grey ">Swing by for a cup of coffee, or leave us a message:</p>
  </div>
  <div class="row">
    <div class="column">
      <img src="../images/australia.jpg" style="width:100%">
    </div>
    <div class="column">
      <form action="">
        <label for="fname">First Name</label>
        <input type="text" id="fname" name="firstname" placeholder="Your name..">
        <label for="lname">Last Name</label>
        <input type="text" id="lname" name="lastname" placeholder="Your last name..">
        <label for="country">Country</label>
        <select id="country" name="country">
          <option value="india">India</option>
          <option value="japan">Japan</option>
          <option value="england">England</option>
          <option value="canada">Canada</option>
          <option value="usa">USA</option>
        </select>
        <label for="subject">Subject</label>
        <textarea id="subject" name="subject" placeholder="Write something.." style="height:170px"></textarea>
        <input type="submit" value="Submit">
      </form>
    </div>
  </div>
</div>
</body>
</html>
