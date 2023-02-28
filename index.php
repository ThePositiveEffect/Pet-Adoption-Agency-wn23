<!doctype html>
<html>
<head>
 
   <meta name="robots" content="noindex,nofollow">
   <title>AJAX Pet Adoption Agency</title>
   <style>
       #myForm div{
        margin-bottom:2%;
        }
   </style>
   <script src="https://code.jquery.com/jquery-latest.js"></script>
   
</head>
<body>
<h2>AJAX Pet Adoption Agency</h2>
<p>Welcome to my Pet Agency. Feel free to look around before choosing.</p>
<div id="output">
<form id="myForm" action="" method="get">

   <div id="pet_feels">
       <h3>Feels</h3>
       <p>Please choose how you would like your pet to feel:</p>
       <input type="radio" name="feels" value="fluffy" required="required">fluffy <br />
       <input type="radio" name="feels" value="scaly">scaly <br />
   </div>
   <div id="pet_likes">
       <h3>Likes</h3>
       <p>Please tell us what your pet will like:</p>
       <input type="radio" name="likes" value="petted" required="required">to be petted <br />
       <input type="radio" name="likes" value="ridden">to be ridden <br />
   </div>
    <div id="pet_eats">
       <h3>Eats</h3>
       <p>Please tell us what your pet likes to eat:</p>
       <input type="radio" name="eats" value="carrots" required="required">carrots <br />
       <input type="radio" name="eats" value="pets">other people's pets <br />
   </div>
  
   <div><input type="submit" value="submit it!" /></div>
</form>
</div>
<p><a href="index.php">RESET</a></p>
<script>
    $("document").ready(function(){
      
        //hide 2nd and 3rd section
        $("#pet_likes").hide();
        $("#pet_eats").hide();

        //show section 2 on click of section 1
        $("#pet_feels").click(function(e){
          $("#pet_likes").slideDown(200);
        });

        //show section 3 on click of section 2
        $("#pet_likes").click(function(e){
          $("#pet_eats").slideDown(200);
        });
        
        $('#myForm').submit(function(e){
            e.preventDefault();//no need to submit as you'll be doing AJAX on this page
            let feels = $("input[name=feels]:checked").val();//1-2
            let likes = $("input[name=likes]:checked").val();//3-4
            let eats = $("input[name=eats]:checked").val();//5-6

            let pet = "";
            if(feels=="fluffy" && likes=="petted" && eats=="carrots"){
              pet = "rabbit";
            }else if(feels=="scaly" && likes=="ridden" && eats=="pets"){
              pet = "velociraptor";
            }else if(feels=="fluffy" && likes=="ridden" && eats=="carrots"){
              pet = "horse";
            }else if(feels=="fluffy" && likes=="petted" && eats=="pets"){
              pet = "cat";
            }else if(feels=="scaly" && likes=="ridden" && eats=="carrots"){
              pet = "brachiosaurus";
            }else{
              pet = "iguana";
            }
          
          

 
            let output = "";
          
          
            $.get( "includes/get_pet.php", { critter: pet } )
             .done(function( data ) {
               //alert( "Data Loaded: " + data );
               pet = data;
               
              output += `<p>The pet you selected feels ${feels}</p>`;
              output += `<p>The pet you selected likes to be ${likes}</p>`;
              output += `<p>The pet you selected eats ${eats}</p>`;
              output += pet;
               
               $("#output").html(output);
             });

        });

    });
    
   </script>
  <footer>
      <p><small>&copy; 2023-<span id="this-year"></span> by 
          Clifford Jenkins II, All Rights Reserved ~ 
          <a id="html-checker" href="#" target="_blank">Check HTML</a> ~ 
          <a id="css-checker" href="#" target="_blank">Check CSS</a></small>
     </p>

    </footer>
</body>
</html>
