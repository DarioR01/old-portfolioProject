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

var source=[];
source[0]="https://www.wallpapers13.com/sunrise-photography-peaceful-lake-boat-sky-with-red-clouds-reflection-in-water-ultra-hd-wallpapers-and-laptop-3840x2400/";
source[1]="https://medium.com/life-projects/march-2018-progress-highlights-4f7aba534ec3";
source[2]="https://wallpaperscraft.ru/download/luzhajka_les_gory_144578/3840x2400";
source[3]="https://www.1zoom.me/es/wallpaper/564928/z3593.9/3840x2400";
source[4]="https://medium.com/@swlkr/what-free-solo-and-clojure-have-in-common-2b82643c8ed6";
source[5]="https://hdwallpaper20.com/author/admin/page/48/";
source[6]="https://yandex.uz/collections/card/58ad510cb478835dac9b414b/";
source[7]="https://wallpapersmug.com/w/download/3840x2400/feather-focus-blur-sunset-5k-40c0f622016";
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
  document.getElementById("homeRef").href = source[x];
  document.getElementById("homeRef").innerHTML = source[x];
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
  document.getElementById("homeRef").href = source[x];
  document.getElementById("homeRef").innerHTML= source[x];
}
