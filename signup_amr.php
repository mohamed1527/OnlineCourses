<html>
<head>
<link rel="stylesheet" type="text/css" href="css/signin.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="HTTPS://fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext" rel="stylesheet">
<link href="HTTPS://fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css">




</head>
<body id="body">

    <form action="#" method="post">
    
    <div class="lb">
    <h1>SIGN UP</h1>

         <div class="b ba">
    <label>Name </label><br>
    
    <input type="text" maxlength="16" name="name" id="name"  >
    <span id="availability"></span>
            <br><br>
    <label>UserName</label><br>
    <input type="text" maxlength="16" name="username" id="username" required>
            <br><br>
    
    <label>Telephone</label><br>
    <input type="text" maxlength="11" name="telephone" id="telephone" required >
            <br><br>        

    <label>Email</label><br>
            
    <input type="text" name="email" id="email" required>
            <br><br>
    <label>Password</label><br>
    <input type="password" maxlength="30" name="password" id="password" required>
            <br><br>

    <label>BirthDate</label><br>
    
    <select id="day" name="day" >
    <option >DAY</option>
    <option >1</option>
    <option >2</option>
    <option >3</option>
    <option >4</option>
    <option >5</option>
    <option >6</option>
    <option >7</option>
    <option >8</option>
    <option >9</option>
    <option >10</option>
    <option >11</option>
    <option >12</option>   
    <option >13</option>
    <option >15</option>
    <option >16</option>
    <option >17</option>
    <option >18</option>
    <option >19</option>
    <option >20</option>
    <option >21</option>
    <option >22</option>
    <option >23</option>
    <option >24</option>
    <option >25</option>
    <option >26</option>
    <option >27</option>
    <option >28</option>
    <option >29</option>
    <option >30</option>
    </select>
    <select id="month" name="month" >
    <option >MONTH</option>    
    <option >1</option>
    <option >2</option>
    <option >3</option>
    <option >4</option>
    <option >5</option>
    <option >6</option>
    <option >7</option>
    <option >8</option>
    <option >9</option>
    <option >10</option>
    <option >11</option>
    <option >12</option>
    </select>
    <select id="year" name="year" >
    <option >YEAR</option>
    <option >2000</option>
    <option >2001</option>
    <option >2002</option>
    <option >2003</option>
    <option >2004</option>
    <option >2005</option>
    <option >2006</option>
    <option >2007</option>
    <option >2008</option>
    <option >2009</option>
    <option >2010</option>
    <option >2011</option>
    <option >2012</option>
    <option >2013</option>
    <option >2014</option>
    <option >2015</option>
    <option >2016</option>
    <option >2017</option>
    <option >2018</option>
    <option >2019</option>
    <option >2020</option>
    </select>
            <br>
        </div>
    <input type="submit" value="Submit" name="submit" onclick="return validateForm()">

    </div>
    </form>

<script>

function validateForm(){

  var x = document.getElementById("name").value;
  var u = document.getElementById("username").value;
  var p = document.getElementById("password").value;
  var eml = document.getElementById('email').value;
  var tel=document.getelementById('telephone').value;

  if (x == "") {
    alert("Name must be filled out");
    document.getElementById("name").style.borderColor = "red";
    return false;

  }

  else if(x.length<5)
{
    alert("name id too short");
    document.getElementById("name").style.borderColor = "red";
    return false;
}

else if(x.length>20)
{
    alert("name is too long");
    document.getElementById("name").style.borderColor = "red";
    return false;   
}
if (!x.match(/^[a-zA-Z]+$/)) 
    {
        alert('name Only alphabets are allowed');
        return false;
    }

    ///////////////////////////////////////////////////////////

    if(u == ""){
        alert("username must be filled out");
        
        document.getElementById("username").style.borderColor = "red";
        return false;

  }
  
else if(u.length<5)
{
        alert("username id too short");
    document.getElementById("username").style.borderColor = "red";
    return false;
}

else if(u.length>20)
{
    alert("username is too long");
    document.getElementById("username").style.borderColor = "red";
    return false;  
}else if (!u.match(/^[A-Za-z0-9]+$/)) 
    {
        alert('username Only alphabets and numbers are allowed');
        return false;
    }

    ////////////////////////////////////////////////////////////////////////
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(eml))
  {
  }
 
  else{
        document.getElementById("email").style.borderColor = "red";

        alert("You have entered an invalid email address! or empty field")
    return (false)
  }

  ////////////////////////////////////////////////////////////////////////////

  if(p == ""){
          alert("password must be filled out ")
          document.getElementById("password").style.borderColor = "red";
          return (false)

  }

 else if(p.length>25)
{
        alert("password is too long");
    document.getElementById("password").style.borderColor = "red";
    return (false)   
}

else if(p.length<5)
{
        alert("password is too short");
    document.getElementById("password").style.borderColor = "red";
    return (false)   
}else if (!p.match(/^[A-Za-z0-9]+$/)) 
    {
        alert('username Only alphabets and numbers are allowed');
        return false;
    }
/////////////////////////////////////////////////////////////////////////////////////



    if(!/^[0-9]+$/.test(tel)){
  
        alert("you have to enter only numbers !!");

    }

    

}


</script>

</body>

</html>