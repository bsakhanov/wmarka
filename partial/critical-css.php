<style>
/* Wmarka custom CSS */
html {
    font-size: 18px;
 }
.uk-button-small {
    padding: 0 7px !important;
    font-size: .675rem !important;
}
.uk-text-primary {
    color: #292B68 !important;
}
.uk-text-danger {
    color: #e81f14 !important;
}
.uk-background-danger {
    background: #e81f14 !important;
}

.uk-label {
    text-transform: none;
}
.uk-label-success {
    background-color: #32d296  !important;
}
.uk-checkbox:checked, .uk-checkbox:indeterminate, .uk-radio:checked {
    background-color: #121a3d !important;
}
::selection {
    background: #121a3d !important;
}
.uk-card-title {
    font-size: 1.2rem;
}
.uk-overlay-primary-news {
    background: #121a3dc7;
}
.uk-align-none {
    margin-bottom: 10px;
}
.uk-border-pill {
    border-radius: 20px;
}
.uk-nav-default {
    font-size: .975rem;
}
.uk-logo {
    color: #ffffff;
}
[class*=uk-navbar-dropdown-bottom] {
    margin-top: 0;
}
.data-hidden {
    display: block;
    width: 0;
    height: 0;
    font-size: 0;
    line-height: 0;
    overflow: hidden;
	padding: 0;
	margin: 0; 
}
/* list */
.push {
  list-style: none;
}
.push li {
  position: relative;
  padding: 5px 0 15px 25px;
  color: #121a3d;
  cursor: pointer;
}
.push li:before {
    position: absolute;
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: #4F5151;
    content: "";
    left: 0px;
    transition: .3s ease-in-out;
    top: 16px;
}
.push li:after {
  position: absolute;
  border-left: 1px dotted #4F5151;
  width: 1px;
    bottom: -11px;
    content: "";
    left: 2px;
    top: 36px;
}
.push2 li:before {
    top: 16px;
}
.push2 li:after {
    bottom: -4px;
    left: 3px;
    top: 35px;
}
.push li:hover:before{
    box-shadow: 0 0 0 10px rgba(0,0,0,.2)
}
.push li:last-child:after {
content: none;
}
.push li:a{
    color: #121a3d;
}
.rounded ol, .rectangle ol {
list-style: none; 
}
.rounded, .rectangle{
counter-reset: li; 
list-style: none; 
padding: 0;
text-shadow: 0 1px 0 rgba(255,255,255,.5);

}
.rounded a {
    position: relative;
    display: block;
    padding: .8em .8em .8em 3em;
    margin: .5em 0 0 1.3em;
    background: #edf4fb;
    color: #444;
    text-decoration: none;
    border-radius: .3em;
    transition: all .3s ease-out;
}
.rounded a:hover {
background: #cae5ff;
} 
.rounded a:hover:before {
transform: rotate(360deg);
}
.rounded a:before {
content: counter(li);
counter-increment: li;
position: absolute;
left: -1.3em;
top: 50%;
margin-top: -1.3em;
background: #000000;
height: 2em;
width: 2em;
line-height: 2em;
border: .3em solid white;
text-align: center;
font-weight: bold;
font-size: 19px;
border-radius: 2em;
transition: all .3s ease-out;
color: white;
}
/* скобка левая */
.braces {
    position: relative;
    padding-left: 40px;
    margin-left: 1em;
    color: #6B8E23;
}
.braces::before,
.braces::after,
.curly::before,
.curly::after {
  content: "";
  position:absolute;
  width: .8em;
  height: 25%;
}
.braces::before,
.braces::after {
  left: 0;
  border-left: 12px solid;
}
.braces::before {
  top: 0;
  border-top-left-radius: .8em;
}
.braces::after {
  bottom: 0;
  border-bottom-left-radius: .8em;
}
.curly::before,
.curly::after {
  left: -.8em;
  border-right: 12px solid;
}
.curly::before {
  top: 25%;
  border-bottom-right-radius: .8em;
}
.curly::after {
  bottom: 25%;
  border-top-right-radius: .8em;
}
/* бордюр вертикальный левый */
.border-left {
    border-left: solid 10px #ddd;
}
/* цитата */
* + blockquote {
	/*background: #f8f8f8;*/
    /*border-left: 5px solid #3968a3;*/
    font-size: 1.15rem;
    font-style: italic;
    line-height: 1.7;
    padding: 0.5em 1.5em;
    position: relative;
    transition: 0.2s border ease-in-out;
    z-index: 0;
	color: #3968a3;
}
* + blockquote:before {
    content: "";
    position: absolute;
    top: 50%;
    left: -4px;
    height: 2em;
    /* background-color: #ccc; */
    width: 5px;
    margin-top: -1em;
    /* color: #ccc; */
}
* + blockquote:after {
    content: "";
    background-image: url("data:image/svg+xml,%3Csvg width='20' height='20' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg' data-svg='quote-right'%3E%3Cpath fill='%23f3f0f0' d='M17.27,7.79 C17.27,9.45 16.97,10.43 15.99,12.02 C14.98,13.64 13,15.23 11.56,15.97 L11.1,15.08 C12.34,14.2 13.14,13.51 14.02,11.82 C14.27,11.34 14.41,10.92 14.49,10.54 C14.3,10.58 14.09,10.6 13.88,10.6 C12.06,10.6 10.59,9.12 10.59,7.3 C10.59,5.48 12.06,4 13.88,4 C15.39,4 16.67,5.02 17.05,6.42 C17.19,6.82 17.27,7.27 17.27,7.79 L17.27,7.79 Z'%3E%3C/path%3E%3Cpath fill='%23f3f0f0' d='M8.68,7.79 C8.68,9.45 8.38,10.43 7.4,12.02 C6.39,13.64 4.41,15.23 2.97,15.97 L2.51,15.08 C3.75,14.2 4.55,13.51 5.43,11.82 C5.68,11.34 5.82,10.92 5.9,10.54 C5.71,10.58 5.5,10.6 5.29,10.6 C3.47,10.6 2,9.12 2,7.3 C2,5.48 3.47,4 5.29,4 C6.8,4 8.08,5.02 8.46,6.42 C8.6,6.82 8.68,7.27 8.68,7.79 L8.68,7.79 Z'%3E%3C/path%3E%3C/svg%3E");
    background-size: 120px 120px;
    background-repeat: no-repeat;
    background-position: center;
    /* background-color: #fff; */
    height: 126px;
    position: absolute;
    top: calc(25% - 42px);
    left: 25.5px;
    width: 126px;
    /* border-radius: 50%; */
    transition: 0.2s all ease-in-out, 0.4s transform ease-in-out;
    z-index: -1;
}
blockquote footer::before {
    content: "";
}
.body-kvadro-2 {
background: rgba(139,32,51,0.8);
}
.body-kvadro-3 {
background: rgba(139,32,51,0.8);
}
.body-kvadro-4 {
background: #8ac77066;
}
.body-kvadro-5 {
background: #d5efca87;
}
.body-kvadro-6 {
background: #f8d2d880;
}
.box-shadow-kvadro-inset {
    box-shadow: inset 1px 1px 10px 2px rgba(50,50,46,0.75);
}
.body-kvadro  {
    background-image: url(/templates/astana/images/09-bg.jpg);
    background-repeat: repeat;
    background-attachment: fixed;	
}	
.body-kvadro-2 {
background: rgba(139,32,51,0.8);
}
.body-kvadro-3 {
background: rgba(139,32,51,0.8);
}
.body-kvadro-4 {
background: #8ac77066;
}
.body-kvadro-5 {
background: #d5efca87;
}
.body-kvadro-6 {
background: #f8d2d880;
}
.uk-subnav-pill > .uk-active > a {
    border-radius: 5px;
}
.uk-subnav-pill > * > a:hover, .uk-subnav-pill > * > a:focus {
    border-radius: 5px;
}

.uk-border-tumb {
    -webkit-filter: brightness(80%);
    filter: brightness(80%);
    transition: 1s;
	
}
.uk-border-tumb:hover, .uk-border-tumb:focus > uk-active  {
    -webkit-filter: brightness(50%);
    filter: brightness(50%);
}
.red {
    background-color: red;
}
.orange {
    background-color: orange;
}
.yellow {
    background-color: yellow;
}
.green {
    background-color: green;
}
.dodgerblue {
    background-color: dodgerblue;
}
.blue {
    background-color: blue;
}
.blueviolet {
    background-color: blueviolet;
}
.opacity-70 {
    opacity: 0.3;
}
.opacity-60 {
    opacity: 0.4;
}
.opacity-50 {
    opacity: 0.5;
}
.opacity-40 {
    opacity: 0.6;
}
.opacity-30 {
    opacity: 0.7;
} 
.bufer {
    background: #FFC112;
    height: 100px;
    margin-top: -50px;
    z-index: 9;
}
img.zalezla {
    margin-left: 150px;
    margin-top: -150px;
}
.uk-link-toggle:hover .uk-link, .uk-link:hover, a:hover {
    text-decoration: none;
}
.uk-article-body a, .uk-link  {
    color: #0075FF;
    background: rgba(0,117,255,0.12);
    text-decoration: none;
    border-radius: 2px;
    padding: 0 9px;
    position: relative;	
}
.uk-article-body a:hover {
    background: rgb(0 117 255 / 27%);
    text-decoration: none;
}
html { 
  font-size: 16px; 
}
</style>
