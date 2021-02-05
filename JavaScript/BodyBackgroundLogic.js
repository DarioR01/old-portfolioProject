var images=[];
images[0]="Resources/Images/LoginBackground0.png";
images[1]="Resources/Images/LoginBackground1.png";
images[2]="Resources/Images/LoginBackground2.png";
images[3]="Resources/Images/LoginBackground3.png";
images[4]="Resources/Images/LoginBackground4.png";
images[5]="Resources/Images/LoginBackground5.png";
images[6]="Resources/Images/LoginBackground6.png";
images[7]="Resources/Images/LoginBackground7.png";

images.forEach(function(img){
    new Image().src =img;
});

secs = 6;

function backgroundSequence() {
window.clearTimeout();
var k = 0;
for (i = 0; i < images.length; i++) {
setTimeout(function(){
document.body.style.backgroundImage = ' url("' + images[k] + '")';
if ((k + 1) === images.length) {
  setTimeout(function() {
    backgroundSequence() }, (secs * 1000))}
else {
  k++;
}
}, (secs * 1000) * i)
}
}

backgroundSequence();
