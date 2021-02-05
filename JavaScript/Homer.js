var x=0;

var images=[];
images[0]="Resources/Images/LoginBackground0.png";
images[1]="Resources/Images/LoginBackground1.png";
images[2]="Resources/Images/LoginBackground2.png";
images[3]="Resources/Images/LoginBackground3.png";
images[4]="Resources/Images/LoginBackground4.png";
images[5]="Resources/Images/LoginBackground5.png";
images[6]="Resources/Images/LoginBackground6.png";
images[7]="Resources/Images/LoginBackground7.png";
console.log(x);

function RightArrow() {
  if(x==images.length-1) {
    x=0;
  }
  else {
    x++;
  }
  console.log(x);
  document.getElementById("HomeImg").src = images[x];
}

function LeftArrow(){
  if(x==0) {
    x=images.length-1;
  }
  else {
    x--;
  }
  console.log(x);
  document.getElementById("HomeImg").src = images[x];
}
