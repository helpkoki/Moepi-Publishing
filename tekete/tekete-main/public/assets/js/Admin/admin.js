// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");

img.onclick = function () {
  modal.style.display = "block";
  //modalImg.src = this.src;
  //document.getElementById('caption').innerHTML='ATTACHMENT';
};

// Get the <span> element that closes the modal
var span = document.getElementById("close");

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
  modal.style.display = "none";
};

var modal2 = document.getElementById("myModal2");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img2 = document.getElementById("attach");
var modalImg2 = document.getElementById("img01");
var captionText = document.getElementById("caption");
img2.onclick = function () {
  modal.style.display = "block";
  //modalImg.src = this.src;
  //document.getElementById('caption').innerHTML='ATTACHMENT';
};

// Get the <span> element that closes the modal
var span2 = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span2.onclick = function () {
  modal.style.display = "none";
};

