/* Set the width of the sidebar to 250px and the left margin of the page content to 250px 
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  let openbtn = document.getElementsByClassName("openbtn").style;
  openbtn.style.display = "none";
}

 Set the width of the sidebar to 0 and the left margin of the page content to 0 
function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}*/


  function openNav()
  {
    $("#mySidebar").css("width", "250px");
    $("#main").css("marginLeft", "250px");
    $(".openbtn").css("visibility", "hidden"); // Hide open sidebar button
    $(".sidebar").css("border", "5px solid red");
    $(".sidebar").css("border-radius", "10px");

  }

  function closeNav()
  {
    $("#mySidebar").css("width", "0");
    $("#main").css("marginLeft", "0");
    $(".openbtn").css("visibility", "visible"); // Bring back open sidebar button
    $(".sidebar").css("border", "none");


  }