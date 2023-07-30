<style>
@import url('https://fonts.googleapis.com/css?family=Fira+Sans:300,400,500,700|Roboto:300,400,500,700&display=swap&subset=cyrillic');
/*! UIkit 3.15.23 | https://www.getuikit.com | (c) 2014 - 2023 YOOtheme | MIT License */
/* ========================================================================
   Component: Base
 ========================================================================== */
/*
 * 1. Set `font-size` to support `rem` units
 * 2. Prevent adjustments of font size after orientation changes in iOS.
 * 3. Style
 */
html {
  /* 1 */
  font-family: "Fira Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
  font-size: 18px;
  font-weight: normal;
  line-height: 1.5;
  /* 2 */
  -webkit-text-size-adjust: 100%;
  /* 3 */
  background: #fff;
  color: #000;
}
/*
 * Remove the margin in all browsers.
 */
body {
  margin: 0;
}
/* Links
 ========================================================================== */
/*
 * Style
 */
a,
.uk-link {
  color: #03406A;
  text-decoration: none;
  cursor: pointer;
}
a:hover,
.uk-link:hover,
.uk-link-toggle:hover .uk-link {
  color: #0f6ecd;
  text-decoration: underline;
}
/* Text-level semantics
 ========================================================================== */
/*
 * 1. Add the correct text decoration in Edge.
 * 2. The shorthand declaration `underline dotted` is not supported in Safari.
 */
abbr[title] {
  /* 1 */
  text-decoration: underline dotted;
  /* 2 */
  -webkit-text-decoration-style: dotted;
}
/*
 * Add the correct font weight in Chrome, Edge, and Safari.
 */
b,
strong {
  font-weight: bolder;
}
/*
 * 1. Consolas has a better baseline in running text compared to `Courier`
 * 2. Correct the odd `em` font sizing in all browsers.
 * 3. Style
 */
:not(pre) > code,
:not(pre) > kbd,
:not(pre) > samp {
  /* 1 */
  font-family: Consolas, monaco, monospace;
  /* 2 */
  font-size: 0.875rem;
  /* 3 */
  color: #ec3434;
  white-space: nowrap;
  padding: 2px 6px;
  background: #03406A21;
}
/*
 * Emphasize
 */
em {
  color: #ec3434;
}
/*
 * Insert
 */
ins {
  background: #ffd;
  color: #666;
  text-decoration: none;
}
/*
 * Mark
 */
mark {
  background: #ffd;
  color: #666;
}
/*
 * Quote
 */
q {
  font-style: italic;
}
/*
 * Add the correct font size in all browsers.
 */
small {
  font-size: 80%;
}
/*
 * Prevents `sub` and `sup` affecting `line-height` in all browsers.
 */
sub,
sup {
  font-size: 75%;
  line-height: 0;
  position: relative;
  vertical-align: baseline;
}
sup {
  top: -0.5em;
}
sub {
  bottom: -0.25em;
}
/* Embedded content
 ========================================================================== */
/*
 * Remove the gap between the element and the bottom of its parent container.
 */
audio,
canvas,
iframe,
img,
svg,
video {
  vertical-align: middle;
}
/*
 * 1. Constrain the element to its parent width.
 * 2. Preserve the intrinsic aspect ratio and auto-scale the height of an image if the `height` attribute is present.
 * 3. Take border and padding into account.
 */
canvas,
img,
svg,
video {
  /* 1 */
  max-width: 100%;
  /* 2 */
  height: auto;
  /* 3 */
  box-sizing: border-box;
}
/*
 * Deprecated: only needed for `img` elements with `uk-img`
 * 1. Hide `alt` text for lazy load images.
 * 2. Fix lazy loading images if parent element is set to `display: inline` and has `overflow: hidden`.
 */
img:not([src]) {
  /* 1 */
  visibility: hidden;
  /* 2 */
  min-width: 1px;
}
/*
 * Iframe
 * Remove border in all browsers
 */
iframe {
  border: 0;
}
/* Block elements
 ========================================================================== */
/*
 * Margins
 */
p,
ul,
ol,
dl,
pre,
address,
fieldset,
figure {
  margin: 0 0 20px 0;
}
/* Add margin if adjacent element */
* + p,
* + ul,
* + ol,
* + dl,
* + pre,
* + address,
* + fieldset,
* + figure {
  margin-top: 20px;
}
/* Headings
 ========================================================================== */
h1,
.uk-h1,
h2,
.uk-h2,
h3,
.uk-h3,
h4,
.uk-h4,
h5,
.uk-h5,
h6,
.uk-h6,
.uk-heading-small,
.uk-heading-medium,
.uk-heading-large,
.uk-heading-xlarge,
.uk-heading-2xlarge {
  margin: 0 0 20px 0;
  font-family: "Fira Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
  font-weight: normal;
  color: #333;
  text-transform: none;
}
/* Add margin if adjacent element */
* + h1,
* + .uk-h1,
* + h2,
* + .uk-h2,
* + h3,
* + .uk-h3,
* + h4,
* + .uk-h4,
* + h5,
* + .uk-h5,
* + h6,
* + .uk-h6,
* + .uk-heading-small,
* + .uk-heading-medium,
* + .uk-heading-large,
* + .uk-heading-xlarge,
* + .uk-heading-2xlarge {
  margin-top: 40px;
}
/*
 * Sizes
 */
h1,
.uk-h1 {
  font-size: 2.23125rem;
  line-height: 1.2;
}
h2,
.uk-h2 {
  font-size: 1.7rem;
  line-height: 1.3;
}
h3,
.uk-h3 {
  font-size: 1.5rem;
  line-height: 1.4;
}
h4,
.uk-h4 {
  font-size: 1.25rem;
  line-height: 1.4;
}
h5,
.uk-h5 {
  font-size: 16px;
  line-height: 1.4;
}
h6,
.uk-h6 {
  font-size: 0.875rem;
  line-height: 1.4;
}
/* Tablet landscape and bigger */
@media (min-width: 960px) {
  h1,
  .uk-h1 {
    font-size: 2.625rem;
  }
  h2,
  .uk-h2 {
    font-size: 2rem;
  }
}
/* Lists
 ========================================================================== */
ul,
ol {
  padding-left: 30px;
}
/*
 * Reset margin for nested lists
 */
ul > li > ul,
ul > li > ol,
ol > li > ol,
ol > li > ul {
  margin: 0;
}
/* Description lists
 ========================================================================== */
dt {
  font-weight: bold;
}
dd {
  margin-left: 0;
}
/* Horizontal rules
 ========================================================================== */
/*
 * 1. Show the overflow in Chrome, Edge and IE.
 * 2. Add the correct text-align in Edge and IE.
 * 3. Style
 */
hr,
.uk-hr {
  /* 1 */
  overflow: visible;
  /* 2 */
  text-align: inherit;
  /* 3 */
  margin: 0 0 20px 0;
  border: 0;
  border-top: 1px solid #e5e5e5;
}
/* Add margin if adjacent element */
* + hr,
* + .uk-hr {
  margin-top: 20px;
}
/* Address
 ========================================================================== */
address {
  font-style: normal;
}
/* Blockquotes
 ========================================================================== */
blockquote {
  margin: 0 0 20px 0;
  font-size: 1.25rem;
  line-height: 1.5;
  font-style: italic;
  color: #333;
}
/* Add margin if adjacent element */
* + blockquote {
  margin-top: 20px;
}
/*
 * Content
 */
blockquote p:last-of-type {
  margin-bottom: 0;
}
blockquote footer {
  margin-top: 10px;
  font-size: 0.875rem;
  line-height: 1.5;
  color: #666;
}
blockquote footer::before {
  content: "— ";
}
/* Preformatted text
 ========================================================================== */
/*
 * 1. Contain overflow in all browsers.
 */
pre {
  font: 0.875rem / 1.5 Consolas, monaco, monospace;
  color: #666;
  -moz-tab-size: 4;
  tab-size: 4;
  /* 1 */
  overflow: auto;
  padding: 10px;
  border: 1px solid #e5e5e5;
  border-radius: 3px;
  background: #fff;
}
pre code {
  font-family: Consolas, monaco, monospace;
}
/* Focus
 ========================================================================== */
:focus {
  outline: none;
}
:focus-visible {
  outline: 2px dotted #333;
}
/* Selection pseudo-element
 ========================================================================== */
::selection {
  background: #39f;
  color: #fff;
  text-shadow: none;
}
/* HTML5 elements
 ========================================================================== */
/*
 * 1. Add the correct display in Edge, IE 10+, and Firefox.
 * 2. Add the correct display in IE.
 */
details,
main {
  /* 2 */
  display: block;
}
/*
 * Add the correct display in all browsers.
 */
summary {
  display: list-item;
}
/*
 * Add the correct display in IE.
 */
template {
  display: none;
}
/* Pass media breakpoints to JS
 ========================================================================== */
/*
 * Breakpoints
 */
:root {
  --uk-breakpoint-s: 640px;
  --uk-breakpoint-m: 960px;
  --uk-breakpoint-l: 1200px;
  --uk-breakpoint-xl: 1600px;
}
/* ========================================================================
   Component: Link
 ========================================================================== */
/* Muted
 ========================================================================== */
a.uk-link-muted,
.uk-link-muted a,
.uk-link-toggle .uk-link-muted {
  color: #999;
}
a.uk-link-muted:hover,
.uk-link-muted a:hover,
.uk-link-toggle:hover .uk-link-muted {
  color: #666;
}
/* Text
 ========================================================================== */
a.uk-link-text,
.uk-link-text a,
.uk-link-toggle .uk-link-text {
  color: inherit;
}
a.uk-link-text:hover,
.uk-link-text a:hover,
.uk-link-toggle:hover .uk-link-text {
  color: #999;
}
/* Heading
 ========================================================================== */
a.uk-link-heading,
.uk-link-heading a,
.uk-link-toggle .uk-link-heading {
  color: inherit;
}
a.uk-link-heading:hover,
.uk-link-heading a:hover,
.uk-link-toggle:hover .uk-link-heading {
  color: #03406A;
  text-decoration: none;
}
/* Reset
 ========================================================================== */
/*
 * `!important` needed to override inverse component
 */
a.uk-link-reset,
.uk-link-reset a {
  color: inherit !important;
  text-decoration: none !important;
}
/* Toggle
 ========================================================================== */
.uk-link-toggle {
  color: inherit !important;
  text-decoration: none !important;
}
/* ========================================================================
   Component: Heading
 ========================================================================== */
.uk-heading-small {
  font-size: 2.6rem;
  line-height: 1.2;
}
.uk-heading-medium {
  font-size: 2.8875rem;
  line-height: 1.1;
}
.uk-heading-large {
  font-size: 3.4rem;
  line-height: 1.1;
}
.uk-heading-xlarge {
  font-size: 4rem;
  line-height: 1;
}
.uk-heading-2xlarge {
  font-size: 6rem;
  line-height: 1;
}
/* Tablet Landscape and bigger */
@media (min-width: 960px) {
  .uk-heading-small {
    font-size: 3.25rem;
  }
  .uk-heading-medium {
    font-size: 3.5rem;
  }
  .uk-heading-large {
    font-size: 4rem;
  }
  .uk-heading-xlarge {
    font-size: 6rem;
  }
  .uk-heading-2xlarge {
    font-size: 8rem;
  }
}
/* Laptop and bigger */
@media (min-width: 1200px) {
  .uk-heading-medium {
    font-size: 4rem;
  }
  .uk-heading-large {
    font-size: 6rem;
  }
  .uk-heading-xlarge {
    font-size: 8rem;
  }
  .uk-heading-2xlarge {
    font-size: 11rem;
  }
}
/* Primary
   Deprecated: Use `uk-heading-medium` instead
 ========================================================================== */
/* Tablet landscape and bigger */
/* Desktop and bigger */
/* Hero
   Deprecated: Use `uk-heading-xlarge` instead
 ========================================================================== */
/* Tablet landscape and bigger */
/* Desktop and bigger */
/* Divider
 ========================================================================== */
.uk-heading-divider {
  padding-bottom: calc(5px + 0.1em);
  border-bottom: calc(0.2px + 0.05em) solid #e5e5e5;
}
/* Bullet
 ========================================================================== */
.uk-heading-bullet {
  position: relative;
}
/*
 * 1. Using `inline-block` to make it work with text alignment
 * 2. Center vertically
 * 3. Style
 */
.uk-heading-bullet::before {
  content: "";
  /* 1 */
  display: inline-block;
  /* 2 */
  position: relative;
  top: calc(-0.1 * 1em);
  vertical-align: middle;
  /* 3 */
  height: calc(4px + 0.7em);
  margin-right: calc(5px + 0.2em);
  border-left: calc(5px + 0.1em) solid #e5e5e5;
}
/* Line
 ========================================================================== */
/*
 * Clip the child element
 */
.uk-heading-line {
  overflow: hidden;
}
/*
 * Extra markup is needed to make it work with text align
 */
.uk-heading-line > * {
  display: inline-block;
  position: relative;
}
/*
 * 1. Center vertically
 * 2. Make the element as large as possible. It's clipped by the container.
 * 3. Style
 */
.uk-heading-line > ::before,
.uk-heading-line > ::after {
  content: "";
  /* 1 */
  position: absolute;
  top: calc(50% - (calc(0.2px + 0.05em) / 2));
  /* 2 */
  width: 2000px;
  /* 3 */
  border-bottom: calc(0.2px + 0.05em) solid #e5e5e5;
}
.uk-heading-line > ::before {
  right: 100%;
  margin-right: calc(5px + 0.3em);
}
.uk-heading-line > ::after {
  left: 100%;
  margin-left: calc(5px + 0.3em);
}
/* ========================================================================
   Component: Divider
 ========================================================================== */
/*
 * 1. Reset default `hr`
 * 2. Set margin if a `div` is used for semantical reason
 */
[class*='uk-divider'] {
  /* 1 */
  border: none;
  /* 2 */
  margin-bottom: 20px;
}
/* Add margin if adjacent element */
* + [class*='uk-divider'] {
  margin-top: 20px;
}
/* Icon
 ========================================================================== */
.uk-divider-icon {
  position: relative;
  height: 20px;
  background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2220%22%20height%3D%2220%22%20viewBox%3D%220%200%2020%2020%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%0A%20%20%20%20%3Ccircle%20fill%3D%22none%22%20stroke%3D%22%23e5e5e5%22%20stroke-width%3D%222%22%20cx%3D%2210%22%20cy%3D%2210%22%20r%3D%227%22%20%2F%3E%0A%3C%2Fsvg%3E%0A");
  background-repeat: no-repeat;
  background-position: 50% 50%;
}
.uk-divider-icon::before,
.uk-divider-icon::after {
  content: "";
  position: absolute;
  top: 50%;
  max-width: calc(50% - (50px / 2));
  border-bottom: 1px solid #e5e5e5;
}
.uk-divider-icon::before {
  right: calc(50% + (50px / 2));
  width: 100%;
}
.uk-divider-icon::after {
  left: calc(50% + (50px / 2));
  width: 100%;
}
/* Small
 ========================================================================== */
/*
 * 1. Fix height because of `inline-block`
 * 2. Using ::after and inline-block to make `text-align` work
 */
/* 1 */
.uk-divider-small {
  line-height: 0;
}
/* 2 */
.uk-divider-small::after {
  content: "";
  display: inline-block;
  width: 100px;
  max-width: 100%;
  border-top: 1px solid #e5e5e5;
  vertical-align: top;
}
/* Vertical
 ========================================================================== */
.uk-divider-vertical {
  width: max-content;
  height: 100px;
  margin-left: auto;
  margin-right: auto;
  border-left: 1px solid #e5e5e5;
}
/* ========================================================================
   Component: List
 ========================================================================== */
.uk-list {
  padding: 0;
  list-style: none;
}
/*
 * Avoid column break within the list item, when using `column-count`
 */
.uk-list > * {
  break-inside: avoid-column;
}
/*
 * Remove margin from the last-child
 */
.uk-list > * > :last-child {
  margin-bottom: 0;
}
/*
 * Style
 */
.uk-list > :nth-child(n+2),
.uk-list > * > ul {
  margin-top: 10px;
}
/* Marker modifiers
 * Moving `::marker` inside `::before` to style it differently
 * To style the `::marker` is currently only supported in Firefox and Safari
 ========================================================================== */
.uk-list-disc > *,
.uk-list-circle > *,
.uk-list-square > *,
.uk-list-decimal > *,
.uk-list-hyphen > * {
  padding-left: 30px;
}
/*
 * Type modifiers
 */
.uk-list-decimal {
  counter-reset: decimal;
}
.uk-list-decimal > * {
  counter-increment: decimal;
}
.uk-list-disc > ::before,
.uk-list-circle > ::before,
.uk-list-square > ::before,
.uk-list-decimal > ::before,
.uk-list-hyphen > ::before {
  content: "";
  position: relative;
  left: -30px;
  width: 30px;
  height: 1.5em;
  margin-bottom: -1.5em;
  display: list-item;
  list-style-position: inside;
  text-align: right;
}
.uk-list-disc > ::before {
  list-style-type: disc;
}
.uk-list-circle > ::before {
  list-style-type: circle;
}
.uk-list-square > ::before {
  list-style-type: square;
}
.uk-list-decimal > ::before {
  content: counter(decimal, decimal) '\200A.\00A0';
}
.uk-list-hyphen > ::before {
  content: '–\00A0\00A0';
}
/*
 * Color modifiers
 */
.uk-list-muted > ::before {
  color: #999 !important;
}
.uk-list-emphasis > ::before {
  color: #333 !important;
}
.uk-list-primary > ::before {
  color: #03406A !important;
}
.uk-list-secondary > ::before {
  color: #222 !important;
}
/* Image bullet modifier
 ========================================================================== */
.uk-list-bullet > * {
  padding-left: 30px;
}
.uk-list-bullet > ::before {
  content: "";
  display: list-item;
  position: relative;
  left: -30px;
  width: 30px;
  height: 1.5em;
  margin-bottom: -1.5em;
  background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%226%22%20height%3D%226%22%20viewBox%3D%220%200%206%206%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%0A%20%20%20%20%3Ccircle%20fill%3D%22%23666%22%20cx%3D%223%22%20cy%3D%223%22%20r%3D%223%22%20%2F%3E%0A%3C%2Fsvg%3E");
  background-repeat: no-repeat;
  background-position: 50% 50%;
}
/* Style modifiers
 ========================================================================== */
/*
 * Divider
 */
.uk-list-divider > :nth-child(n+2) {
  margin-top: 10px;
  padding-top: 10px;
  border-top: 1px solid #e5e5e5;
}
/*
 * Striped
 */
.uk-list-striped > * {
  padding: 10px 10px;
}
.uk-list-striped > *:nth-of-type(odd) {
  border-top: 1px solid #e5e5e5;
  border-bottom: 1px solid #e5e5e5;
}
.uk-list-striped > :nth-of-type(odd) {
  background: #03406A21;
}
.uk-list-striped > :nth-child(n+2) {
  margin-top: 0;
}
/* Size modifier
 ========================================================================== */
.uk-list-large > :nth-child(n+2),
.uk-list-large > * > ul {
  margin-top: 20px;
}
.uk-list-collapse > :nth-child(n+2),
.uk-list-collapse > * > ul {
  margin-top: 0;
}
/*
 * Divider
 */
.uk-list-large.uk-list-divider > :nth-child(n+2) {
  margin-top: 20px;
  padding-top: 20px;
}
.uk-list-collapse.uk-list-divider > :nth-child(n+2) {
  margin-top: 0;
  padding-top: 0;
}
/*
 * Striped
 */
.uk-list-large.uk-list-striped > * {
  padding: 20px 10px;
}
.uk-list-collapse.uk-list-striped > * {
  padding-top: 0;
  padding-bottom: 0;
}
.uk-list-large.uk-list-striped > :nth-child(n+2),
.uk-list-collapse.uk-list-striped > :nth-child(n+2) {
  margin-top: 0;
}
/* ========================================================================
   Component: Description list
 ========================================================================== */
/*
 * Term
 */
.uk-description-list > dt {
  color: #333;
  font-size: 0.875rem;
  font-weight: normal;
  text-transform: uppercase;
}
.uk-description-list > dt:nth-child(n+2) {
  margin-top: 20px;
}
/*
 * Description
 */
/* Style modifier
 ========================================================================== */
/*
 * Line
 */
.uk-description-list-divider > dt:nth-child(n+2) {
  margin-top: 20px;
  padding-top: 20px;
  border-top: 1px solid #e5e5e5;
}
/* ========================================================================
   Component: Table
 ========================================================================== */
/*
 * 1. Remove most spacing between table cells.
 * 2. Behave like a block element
 * 3. Style
 */
.uk-table {
  /* 1 */
  border-collapse: collapse;
  border-spacing: 0;
  /* 2 */
  width: 100%;
  /* 3 */
  margin-bottom: 20px;
}
/* Add margin if adjacent element */
* + .uk-table {
  margin-top: 20px;
}
/* Header cell
 ========================================================================== */
/*
 * 1. Style
 */
.uk-table th {
  padding: 16px 12px;
  text-align: left;
  vertical-align: bottom;
  /* 1 */
  font-size: 0.875rem;
  font-weight: normal;
  color: #999;
  text-transform: uppercase;
}
/* Cell
 ========================================================================== */
.uk-table td {
  padding: 16px 12px;
  vertical-align: top;
}
/*
 * Remove margin from the last-child
 */
.uk-table td > :last-child {
  margin-bottom: 0;
}
/* Footer
 ========================================================================== */
.uk-table tfoot {
  font-size: 0.875rem;
}
/* Caption
 ========================================================================== */
.uk-table caption {
  font-size: 0.875rem;
  text-align: left;
  color: #999;
}
/* Alignment modifier
 ========================================================================== */
.uk-table-middle,
.uk-table-middle td {
  vertical-align: middle !important;
}
/* Style modifiers
 ========================================================================== */
/*
 * Divider
 */
.uk-table-divider > tr:not(:first-child),
.uk-table-divider > :not(:first-child) > tr,
.uk-table-divider > :first-child > tr:not(:first-child) {
  border-top: 1px solid #e5e5e5;
}
/*
 * Striped
 */
.uk-table-striped > tr:nth-of-type(odd),
.uk-table-striped tbody tr:nth-of-type(odd) {
  background: #03406A21;
  border-top: 1px solid #e5e5e5;
  border-bottom: 1px solid #e5e5e5;
}
/*
 * Hover
 */
.uk-table-hover > tr:hover,
.uk-table-hover tbody tr:hover {
  background: #ffd;
}
/* Active state
 ========================================================================== */
.uk-table > tr.uk-active,
.uk-table tbody tr.uk-active {
  background: #ffd;
}
/* Size modifier
 ========================================================================== */
.uk-table-small th,
.uk-table-small td {
  padding: 10px 12px;
}
.uk-table-large th,
.uk-table-large td {
  padding: 22px 12px;
}
/* Justify modifier
 ========================================================================== */
.uk-table-justify th:first-child,
.uk-table-justify td:first-child {
  padding-left: 0;
}
.uk-table-justify th:last-child,
.uk-table-justify td:last-child {
  padding-right: 0;
}
/* Cell size modifier
 ========================================================================== */
.uk-table-shrink {
  width: 1px;
}
.uk-table-expand {
  min-width: 150px;
}
/* Cell link modifier
 ========================================================================== */
/*
 * Does not work with `uk-table-justify` at the moment
 */
.uk-table-link {
  padding: 0 !important;
}
.uk-table-link > a {
  display: block;
  padding: 16px 12px;
}
.uk-table-small .uk-table-link > a {
  padding: 10px 12px;
}
/* Responsive table
 ========================================================================== */
/* Phone landscape and smaller */
@media (max-width: 959px) {
  .uk-table-responsive,
  .uk-table-responsive tbody,
  .uk-table-responsive th,
  .uk-table-responsive td,
  .uk-table-responsive tr {
    display: block;
  }
  .uk-table-responsive thead {
    display: none;
  }
  .uk-table-responsive th,
  .uk-table-responsive td {
    width: auto !important;
    max-width: none !important;
    min-width: 0 !important;
    overflow: visible !important;
    white-space: normal !important;
  }
  .uk-table-responsive th:not(:first-child):not(.uk-table-link),
  .uk-table-responsive td:not(:first-child):not(.uk-table-link),
  .uk-table-responsive .uk-table-link:not(:first-child) > a {
    padding-top: 5px !important;
  }
  .uk-table-responsive th:not(:last-child):not(.uk-table-link),
  .uk-table-responsive td:not(:last-child):not(.uk-table-link),
  .uk-table-responsive .uk-table-link:not(:last-child) > a {
    padding-bottom: 5px !important;
  }
  .uk-table-justify.uk-table-responsive th,
  .uk-table-justify.uk-table-responsive td {
    padding-left: 0;
    padding-right: 0;
  }
}
.uk-table tbody tr {
  transition: background-color 0.1s linear;
}
.uk-table-striped > tr:nth-of-type(even):last-child,
.uk-table-striped tbody tr:nth-of-type(even):last-child {
  border-bottom: 1px solid #e5e5e5;
}
/* ========================================================================
   Component: Icon
 ========================================================================== */
/*
 * Note: 1. - 7. is required for `button` elements. Needed for Close and Form Icon component.
 * 1. Remove margins in Chrome, Safari and Opera.
 * 2. Remove borders for `button`.
 * 3. Remove border-radius in Chrome.
 * 4. Address `overflow` set to `hidden` in IE.
 * 5. Correct `font` properties and `color` not being inherited for `button`.
 * 6. Remove the inheritance of text transform in Edge, Firefox, and IE.
 * 7. Remove default `button` padding and background color
 * 8. Style
 * 9. Fill all SVG elements with the current text color if no `fill` attribute is set
 * 10. Let the container fit the height of the icon
 */
.uk-icon {
  /* 1 */
  margin: 0;
  /* 2 */
  border: none;
  /* 3 */
  border-radius: 0;
  /* 4 */
  overflow: visible;
  /* 5 */
  font: inherit;
  color: inherit;
  /* 6 */
  text-transform: none;
  /* 7. */
  padding: 0;
  background-color: transparent;
  /* 8 */
  display: inline-block;
  /* 9 */
  fill: currentcolor;
  /* 10 */
  line-height: 0;
}
/* Required for `button`. */
button.uk-icon:not(:disabled) {
  cursor: pointer;
}
/*
 * Remove the inner border and padding in Firefox.
 */
.uk-icon::-moz-focus-inner {
  border: 0;
  padding: 0;
}
/*
 * Set the fill and stroke color of all SVG elements to the current text color
 */
.uk-icon:not(.uk-preserve) [fill*='#']:not(.uk-preserve) {
  fill: currentcolor;
}
.uk-icon:not(.uk-preserve) [stroke*='#']:not(.uk-preserve) {
  stroke: currentcolor;
}
/*
 * Fix Firefox blurry SVG rendering: https://bugzilla.mozilla.org/show_bug.cgi?id=1046835
 */
.uk-icon > * {
  transform: translate(0, 0);
}
/* Image modifier
 ========================================================================== */
/*
 * Display images in icon dimensions
 * 1. Required for `span` with background image
 * 2. Required for `image`
 */
.uk-icon-image {
  width: 20px;
  height: 20px;
  /* 1 */
  background-position: 50% 50%;
  background-repeat: no-repeat;
  background-size: contain;
  vertical-align: middle;
  /* 2 */
  object-fit: scale-down;
  max-width: none;
}
/* Style modifiers
 ========================================================================== */
/*
 * Link
 * 1. Allow text within link
 */
.uk-icon-link {
  color: #999;
  /* 1 */
  text-decoration: none !important;
}
.uk-icon-link:hover {
  color: #666;
}
/* OnClick + Active */
.uk-icon-link:active,
.uk-active > .uk-icon-link {
  color: #595959;
}
/*
 * Button
 * 1. Center icon vertically and horizontally
 */
.uk-icon-button {
  box-sizing: border-box;
  width: 36px;
  height: 36px;
  border-radius: 500px;
  background: #03406A21;
  color: #999;
  vertical-align: middle;
  /* 1 */
  display: inline-flex;
  justify-content: center;
  align-items: center;
  transition: 0.1s ease-in-out;
  transition-property: color, background-color;
}
/* Hover */
.uk-icon-button:hover {
  background-color: #ebebeb;
  color: #666;
}
/* OnClick + Active */
.uk-icon-button:active,
.uk-active > .uk-icon-button {
  background-color: #dfdfdf;
  color: #666;
}
/* ========================================================================
   Component: Form Range
 ========================================================================== */
/*
 * 1. Remove default style.
 * 2. Define consistent box sizing.
 * 3. Remove `margin` in all browsers.
 * 4. Align to the center of the line box.
 * 5. Prevent content overflow if a fixed width is used.
 * 6. Take the full width.
 * 7. Remove white background in Chrome.
 */
.uk-range {
  /* 1 */
  -webkit-appearance: none;
  /* 2 */
  box-sizing: border-box;
  /* 3 */
  margin: 0;
  /* 4 */
  vertical-align: middle;
  /* 5 */
  max-width: 100%;
  /* 6 */
  width: 100%;
  /* 7 */
  background: transparent;
}
/* Focus */
.uk-range:focus {
  outline: none;
}
.uk-range::-moz-focus-outer {
  border: none;
}
/*
 * Improves consistency of cursor style for clickable elements
 */
.uk-range:not(:disabled)::-webkit-slider-thumb {
  cursor: pointer;
}
.uk-range:not(:disabled)::-moz-range-thumb {
  cursor: pointer;
}
/*
 * Track
 * 1. Safari doesn't have a focus state. Using active instead.
 */
/* Webkit */
.uk-range::-webkit-slider-runnable-track {
  height: 3px;
  background: #ebebeb;
  border-radius: 500px;
}
.uk-range:focus::-webkit-slider-runnable-track,
.uk-range:active::-webkit-slider-runnable-track {
  background: #dedede;
}
/* Firefox */
.uk-range::-moz-range-track {
  height: 3px;
  background: #ebebeb;
  border-radius: 500px;
}
.uk-range:focus::-moz-range-track {
  background: #dedede;
}
/*
 * Thumb
 * 1. Reset
 * 2. Style
 */
/* Webkit */
.uk-range::-webkit-slider-thumb {
  /* 1 */
  -webkit-appearance: none;
  margin-top: -7px;
  /* 2 */
  height: 15px;
  width: 15px;
  border-radius: 500px;
  background: #fff;
  border: 1px solid #cccccc;
}
/* Firefox */
.uk-range::-moz-range-thumb {
  /* 1 */
  border: none;
  /* 2 */
  height: 15px;
  width: 15px;
  margin-top: -7px;
  border-radius: 500px;
  background: #fff;
  border: 1px solid #cccccc;
}
/* ========================================================================
   Component: Form
 ========================================================================== */
/*
 * 1. Define consistent box sizing.
 *    Default is `content-box` with following exceptions set to `border-box`
 *    `select`, `input[type="checkbox"]` and `input[type="radio"]`
 *    `input[type="search"]` in Chrome, Safari and Opera
 *    `input[type="color"]` in Firefox
 * 2. Address margins set differently in Firefox/IE and Chrome/Safari/Opera.
 * 3. Remove `border-radius` in iOS.
 * 4. Change font properties to `inherit` in all browsers.
 */
.uk-input,
.uk-select,
.uk-textarea,
.uk-radio,
.uk-checkbox {
  /* 1 */
  box-sizing: border-box;
  /* 2 */
  margin: 0;
  /* 3 */
  border-radius: 0;
  /* 4 */
  font: inherit;
}
/*
 * Show the overflow in Edge.
 */
.uk-input {
  overflow: visible;
}
/*
 * Remove the inheritance of text transform in Firefox.
 */
.uk-select {
  text-transform: none;
}
/*
 * 1. Change font properties to `inherit` in all browsers
 * 2. Don't inherit the `font-weight` and use `bold` instead.
 * NOTE: Both declarations don't work in Chrome, Safari and Opera.
 */
.uk-select optgroup {
  /* 1 */
  font: inherit;
  /* 2 */
  font-weight: bold;
}
/*
 * Remove the default vertical scrollbar in IE 10+.
 */
.uk-textarea {
  overflow: auto;
}
/*
 * Remove the inner padding and cancel buttons in Chrome on OS X and Safari on OS X.
 */
.uk-input[type="search"]::-webkit-search-cancel-button,
.uk-input[type="search"]::-webkit-search-decoration {
  -webkit-appearance: none;
}
/*
 * Correct the cursor style of increment and decrement buttons in Chrome.
 */
.uk-input[type="number"]::-webkit-inner-spin-button,
.uk-input[type="number"]::-webkit-outer-spin-button {
  height: auto;
}
/*
 * Removes placeholder transparency in Firefox.
 */
.uk-input::-moz-placeholder,
.uk-textarea::-moz-placeholder {
  opacity: 1;
}
/*
 * Improves consistency of cursor style for clickable elements
 */
.uk-radio:not(:disabled),
.uk-checkbox:not(:disabled) {
  cursor: pointer;
}
/*
 * Define consistent border, margin, and padding.
 */
.uk-fieldset {
  border: none;
  margin: 0;
  padding: 0;
}
/* Input, select and textarea
 * Allowed: `text`, `password`, `datetime-local`, `date`,  `month`,
            `time`, `week`, `number`, `email`, `url`, `search`, `tel`, `color`
 * Disallowed: `range`, `radio`, `checkbox`, `file`, `submit`, `reset` and `image`
 ========================================================================== */
/*
 * Remove default style in iOS.
 */
.uk-input,
.uk-textarea {
  -webkit-appearance: none;
}
/*
 * 1. Prevent content overflow if a fixed width is used
 * 2. Take the full width
 * 3. Reset default
 * 4. Style
 */
.uk-input,
.uk-select,
.uk-textarea {
  /* 1 */
  max-width: 100%;
  /* 2 */
  width: 100%;
  /* 3 */
  border: 0 none;
  /* 4 */
  padding: 0 10px;
  background: #fff;
  color: #666;
  border: 1px solid #e5e5e5;
  transition: 0.2s ease-in-out;
  transition-property: color, background-color, border;
}
/*
 * Single-line
 * 1. Allow any element to look like an `input` or `select` element
 * 2. Make sure line-height is not larger than height
 *    Also needed to center the text vertically
 */
.uk-input,
.uk-select:not([multiple]):not([size]) {
  height: 40px;
  vertical-align: middle;
  /* 1 */
  display: inline-block;
}
/* 2 */
.uk-input:not(input),
.uk-select:not(select) {
  line-height: 38px;
}
/*
 * Multi-line
 */
.uk-select[multiple],
.uk-select[size],
.uk-textarea {
  padding-top: 6px;
  padding-bottom: 6px;
  vertical-align: top;
}
.uk-select[multiple],
.uk-select[size] {
  resize: vertical;
}
/* Focus */
.uk-input:focus,
.uk-select:focus,
.uk-textarea:focus {
  outline: none;
  background-color: #fff;
  color: #666;
  border-color: #03406A;
}
/* Disabled */
.uk-input:disabled,
.uk-select:disabled,
.uk-textarea:disabled {
  background-color: #03406A21;
  color: #999;
  border-color: #e5e5e5;
}
/*
 * Placeholder
 */
.uk-input::placeholder {
  color: #999;
}
.uk-textarea::placeholder {
  color: #999;
}
/* Style modifier (`uk-input`, `uk-select` and `uk-textarea`)
 ========================================================================== */
/*
 * Small
 */
.uk-form-small {
  font-size: 0.875rem;
}
/* Single-line */
.uk-form-small:not(textarea):not([multiple]):not([size]) {
  height: 30px;
  padding-left: 8px;
  padding-right: 8px;
}
/* Multi-line */
textarea.uk-form-small,
[multiple].uk-form-small,
[size].uk-form-small {
  padding: 5px 8px;
}
.uk-form-small:not(select):not(input):not(textarea) {
  line-height: 28px;
}
/*
 * Large
 */
.uk-form-large {
  font-size: 1.25rem;
}
/* Single-line */
.uk-form-large:not(textarea):not([multiple]):not([size]) {
  height: 55px;
  padding-left: 12px;
  padding-right: 12px;
}
/* Multi-line */
textarea.uk-form-large,
[multiple].uk-form-large,
[size].uk-form-large {
  padding: 7px 12px;
}
.uk-form-large:not(select):not(input):not(textarea) {
  line-height: 53px;
}
/* Style modifier (`uk-input`, `uk-select` and `uk-textarea`)
 ========================================================================== */
/*
 * Error
 */
.uk-form-danger,
.uk-form-danger:focus {
  color: #ec3434;
  border-color: #ec3434;
}
/*
 * Success
 */
.uk-form-success,
.uk-form-success:focus {
  color: #32d296;
  border-color: #32d296;
}
/*
 * Blank
 */
.uk-form-blank {
  background: none;
  border-color: transparent;
}
.uk-form-blank:focus {
  border-color: #e5e5e5;
  border-style: solid;
}
/* Width modifiers (`uk-input`, `uk-select` and `uk-textarea`)
 ========================================================================== */
/*
 * Fixed widths
 * Different widths for mini sized `input` and `select` elements
 */
input.uk-form-width-xsmall {
  width: 50px;
}
select.uk-form-width-xsmall {
  width: 75px;
}
.uk-form-width-small {
  width: 130px;
}
.uk-form-width-medium {
  width: 200px;
}
.uk-form-width-large {
  width: 500px;
}
/* Select
 ========================================================================== */
/*
 * 1. Remove default style. Also works in Firefox
 * 2. Style
 * 3. Set `color` for options in the select dropdown, because the inherited `color` might be too light.
 */
.uk-select:not([multiple]):not([size]) {
  /* 1 */
  -webkit-appearance: none;
  -moz-appearance: none;
  /* 2 */
  padding-right: 20px;
  background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2224%22%20height%3D%2216%22%20viewBox%3D%220%200%2024%2016%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%0A%20%20%20%20%3Cpolygon%20fill%3D%22%23666%22%20points%3D%2212%201%209%206%2015%206%22%20%2F%3E%0A%20%20%20%20%3Cpolygon%20fill%3D%22%23666%22%20points%3D%2212%2013%209%208%2015%208%22%20%2F%3E%0A%3C%2Fsvg%3E%0A");
  background-repeat: no-repeat;
  background-position: 100% 50%;
}
/* 3 */
.uk-select:not([multiple]):not([size]) option {
  color: #666;
}
/*
 * Disabled
 */
.uk-select:not([multiple]):not([size]):disabled {
  background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2224%22%20height%3D%2216%22%20viewBox%3D%220%200%2024%2016%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%0A%20%20%20%20%3Cpolygon%20fill%3D%22%23999%22%20points%3D%2212%201%209%206%2015%206%22%20%2F%3E%0A%20%20%20%20%3Cpolygon%20fill%3D%22%23999%22%20points%3D%2212%2013%209%208%2015%208%22%20%2F%3E%0A%3C%2Fsvg%3E%0A");
}
/* Datalist
 ========================================================================== */
/*
 * 1. Remove default style in Chrome
 */
.uk-input[list] {
  padding-right: 20px;
  background-repeat: no-repeat;
  background-position: 100% 50%;
}
.uk-input[list]:hover,
.uk-input[list]:focus {
  background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2224%22%20height%3D%2216%22%20viewBox%3D%220%200%2024%2016%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%0A%20%20%20%20%3Cpolygon%20fill%3D%22%23666%22%20points%3D%2212%2012%208%206%2016%206%22%20%2F%3E%0A%3C%2Fsvg%3E%0A");
}
/* 1 */
.uk-input[list]::-webkit-calendar-picker-indicator {
  display: none !important;
}
/* Radio and checkbox
 ========================================================================== */
/*
 * 1. Style
 * 2. Make box more robust so it clips the child element
 * 3. Vertical alignment
 * 4. Remove default style
 * 5. Fix black background on iOS
 * 6. Center icons
 */
.uk-radio,
.uk-checkbox {
  /* 1 */
  display: inline-block;
  height: 16px;
  width: 16px;
  /* 2 */
  overflow: hidden;
  /* 3 */
  margin-top: -4px;
  vertical-align: middle;
  /* 4 */
  -webkit-appearance: none;
  -moz-appearance: none;
  /* 5 */
  background-color: transparent;
  /* 6 */
  background-repeat: no-repeat;
  background-position: 50% 50%;
  border: 1px solid #cccccc;
  transition: 0.2s ease-in-out;
  transition-property: background-color, border;
}
.uk-radio {
  border-radius: 50%;
}
/* Focus */
.uk-radio:focus,
.uk-checkbox:focus {
  background-color: rgba(0, 0, 0, 0);
  outline: none;
  border-color: #03406A;
}
/*
 * Checked
 */
.uk-radio:checked,
.uk-checkbox:checked,
.uk-checkbox:indeterminate {
  background-color: #03406A;
  border-color: transparent;
}
/* Focus */
.uk-radio:checked:focus,
.uk-checkbox:checked:focus,
.uk-checkbox:indeterminate:focus {
  background-color: #0e6dcd;
}
/*
 * Icons
 */
.uk-radio:checked {
  background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2216%22%20height%3D%2216%22%20viewBox%3D%220%200%2016%2016%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%0A%20%20%20%20%3Ccircle%20fill%3D%22%23fff%22%20cx%3D%228%22%20cy%3D%228%22%20r%3D%222%22%20%2F%3E%0A%3C%2Fsvg%3E");
}
.uk-checkbox:checked {
  background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2214%22%20height%3D%2211%22%20viewBox%3D%220%200%2014%2011%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%0A%20%20%20%20%3Cpolygon%20fill%3D%22%23fff%22%20points%3D%2212%201%205%207.5%202%205%201%205.5%205%2010%2013%201.5%22%20%2F%3E%0A%3C%2Fsvg%3E%0A");
}
.uk-checkbox:indeterminate {
  background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2216%22%20height%3D%2216%22%20viewBox%3D%220%200%2016%2016%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%0A%20%20%20%20%3Crect%20fill%3D%22%23fff%22%20x%3D%223%22%20y%3D%228%22%20width%3D%2210%22%20height%3D%221%22%20%2F%3E%0A%3C%2Fsvg%3E");
}
/*
 * Disabled
 */
.uk-radio:disabled,
.uk-checkbox:disabled {
  background-color: #03406A21;
  border-color: #e5e5e5;
}
.uk-radio:disabled:checked {
  background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2216%22%20height%3D%2216%22%20viewBox%3D%220%200%2016%2016%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%0A%20%20%20%20%3Ccircle%20fill%3D%22%23999%22%20cx%3D%228%22%20cy%3D%228%22%20r%3D%222%22%20%2F%3E%0A%3C%2Fsvg%3E");
}
.uk-checkbox:disabled:checked {
  background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2214%22%20height%3D%2211%22%20viewBox%3D%220%200%2014%2011%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%0A%20%20%20%20%3Cpolygon%20fill%3D%22%23999%22%20points%3D%2212%201%205%207.5%202%205%201%205.5%205%2010%2013%201.5%22%20%2F%3E%0A%3C%2Fsvg%3E%0A");
}
.uk-checkbox:disabled:indeterminate {
  background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2216%22%20height%3D%2216%22%20viewBox%3D%220%200%2016%2016%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%0A%20%20%20%20%3Crect%20fill%3D%22%23999%22%20x%3D%223%22%20y%3D%228%22%20width%3D%2210%22%20height%3D%221%22%20%2F%3E%0A%3C%2Fsvg%3E");
}
/* Legend
 ========================================================================== */
/*
 * Legend
 * 1. Behave like block element
 * 2. Correct the color inheritance from `fieldset` elements in IE.
 * 3. Remove padding so people aren't caught out if they zero out fieldsets.
 * 4. Style
 */
.uk-legend {
  /* 1 */
  width: 100%;
  /* 2 */
  color: inherit;
  /* 3 */
  padding: 0;
  /* 4 */
  font-size: 1.5rem;
  line-height: 1.4;
}
/* Custom controls
 ========================================================================== */
/*
 * 1. Container fits its content
 * 2. Create position context
 * 3. Prevent content overflow
 * 4. Behave like most inline-block elements
 */
.uk-form-custom {
  /* 1 */
  display: inline-block;
  /* 2 */
  position: relative;
  /* 3 */
  max-width: 100%;
  /* 4 */
  vertical-align: middle;
}
/*
 * 1. Position and resize the form control to always cover its container
 * 2. Required for Firefox for positioning to the left
 * 3. Required for Webkit to make `height` work
 * 4. Hide controle and show cursor
 * 5. Needed for the cursor
 * 6. Clip height caused by 5. Needed for Webkit only
 */
.uk-form-custom select,
.uk-form-custom input[type="file"] {
  /* 1 */
  position: absolute;
  top: 0;
  z-index: 1;
  width: 100%;
  height: 100%;
  /* 2 */
  left: 0;
  /* 3 */
  -webkit-appearance: none;
  /* 4 */
  opacity: 0;
  cursor: pointer;
}
.uk-form-custom input[type="file"] {
  /* 5 */
  font-size: 500px;
  /* 6 */
  overflow: hidden;
}
/* Label
 ========================================================================== */
.uk-form-label {
  color: #333;
  font-size: 0.875rem;
}
/* Layout
 ========================================================================== */
/*
 * Stacked
 */
.uk-form-stacked .uk-form-label {
  display: block;
  margin-bottom: 5px;
}
/*
 * Horizontal
 */
/* Tablet portrait and smaller */
@media (max-width: 959px) {
  /* Behave like `uk-form-stacked` */
  .uk-form-horizontal .uk-form-label {
    display: block;
    margin-bottom: 5px;
  }
}
/* Tablet landscape and bigger */
@media (min-width: 960px) {
  .uk-form-horizontal .uk-form-label {
    width: 200px;
    margin-top: 7px;
    float: left;
  }
  .uk-form-horizontal .uk-form-controls {
    margin-left: 215px;
  }
  /* Better vertical alignment if controls are checkboxes and radio buttons with text */
  .uk-form-horizontal .uk-form-controls-text {
    padding-top: 7px;
  }
}
/* Icons
 ========================================================================== */
/*
 * 1. Set position
 * 2. Set width
 * 3. Center icon vertically and horizontally
 * 4. Style
 */
.uk-form-icon {
  /* 1 */
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  /* 2 */
  width: 40px;
  /* 3 */
  display: inline-flex;
  justify-content: center;
  align-items: center;
  /* 4 */
  color: #999;
}
/*
 * Required for `a`.
 */
.uk-form-icon:hover {
  color: #666;
}
/*
 * Make `input` element clickable through icon, e.g. if it's a `span`
 */
.uk-form-icon:not(a):not(button):not(input) {
  pointer-events: none;
}
/*
 * Input padding
 */
.uk-form-icon:not(.uk-form-icon-flip) ~ .uk-input {
  padding-left: 40px !important;
}
/*
 * Position modifier
 */
.uk-form-icon-flip {
  right: 0;
  left: auto;
}
.uk-form-icon-flip ~ .uk-input {
  padding-right: 40px !important;
}
/* ========================================================================
   Component: Button
 ========================================================================== */
/*
 * 1. Remove margins in Chrome, Safari and Opera.
 * 2. Remove borders for `button`.
 * 3. Address `overflow` set to `hidden` in IE.
 * 4. Correct `font` properties and `color` not being inherited for `button`.
 * 5. Remove the inheritance of text transform in Edge, Firefox, and IE.
 * 6. Remove default style for `input type="submit"`in iOS.
 * 7. Style
 * 8. `line-height` is used to create a height because it also centers the text vertically for `a` elements.
 *    Better would be to use height and flexbox to center the text vertically but flexbox doesn't work in Firefox on `button` elements.
 * 9. Align text if button has a width
 * 10. Required for `a`.
 */
.uk-button {
  /* 1 */
  margin: 0;
  /* 2 */
  border: none;
  /* 3 */
  overflow: visible;
  /* 4 */
  font: inherit;
  color: inherit;
  /* 5 */
  text-transform: none;
  /* 6 */
  -webkit-appearance: none;
  border-radius: 0;
  /* 7 */
  display: inline-block;
  box-sizing: border-box;
  padding: 0 30px;
  vertical-align: middle;
  font-size: 0.875rem;
  /* 8 */
  line-height: 38px;
  /* 9 */
  text-align: center;
  /* 10 */
  text-decoration: none;
  text-transform: uppercase;
  transition: 0.1s ease-in-out;
  transition-property: color, background-color, border-color;
}
.uk-button:not(:disabled) {
  cursor: pointer;
}
/*
 * Remove the inner border and padding in Firefox.
 */
.uk-button::-moz-focus-inner {
  border: 0;
  padding: 0;
}
/* Hover */
.uk-button:hover {
  /* 9 */
  text-decoration: none;
}
/* OnClick + Active */
/* Style modifiers
 ========================================================================== */
/*
 * Default
 */
.uk-button-default {
  background-color: transparent;
  color: #333;
  border: 1px solid #e5e5e5;
}
/* Hover */
.uk-button-default:hover {
  background-color: transparent;
  color: #333;
  border-color: #b2b2b2;
}
/* OnClick + Active */
.uk-button-default:active,
.uk-button-default.uk-active {
  background-color: transparent;
  color: #333;
  border-color: #999999;
}
/*
 * Primary
 */
.uk-button-primary {
  background-color: #00a0e3;
  color: #fff;
  border: 1px solid transparent;
}
/* Hover */
.uk-button-primary:hover {
  background-color: #0f7ae5;
  color: #fff;
}
/* OnClick + Active */
.uk-button-primary:active,
.uk-button-primary.uk-active {
  background-color: #0e6dcd;
  color: #fff;
}
/*
 * Secondary
 */
.uk-button-secondary {
  background-color: #222;
  color: #fff;
  border: 1px solid transparent;
}
/* Hover */
.uk-button-secondary:hover {
  background-color: #151515;
  color: #fff;
}
/* OnClick + Active */
.uk-button-secondary:active,
.uk-button-secondary.uk-active {
  background-color: #080808;
  color: #fff;
}
/*
 * Danger
 */
.uk-button-danger {
  background-color: #ec3434;
  color: #fff;
  border: 1px solid transparent;
}
/* Hover */
.uk-button-danger:hover {
  background-color: #ee395b;
  color: #fff;
}
/* OnClick + Active */
.uk-button-danger:active,
.uk-button-danger.uk-active {
  background-color: #ec2147;
  color: #fff;
}
/*
 * Disabled
 * The same for all style modifiers
 */
.uk-button-default:disabled,
.uk-button-primary:disabled,
.uk-button-secondary:disabled,
.uk-button-danger:disabled {
  background-color: transparent;
  color: #999;
  border-color: #e5e5e5;
}
/* Size modifiers
 ========================================================================== */
.uk-button-small {
  padding: 0 15px;
  line-height: 28px;
  font-size: 0.875rem;
}
.uk-button-large {
  padding: 0 40px;
  line-height: 53px;
  font-size: 0.875rem;
}
/* Text modifiers
 ========================================================================== */
/*
 * Text
 * 1. Reset
 * 2. Style
 */
.uk-button-text {
  /* 1 */
  padding: 0;
  line-height: 1.5;
  background: none;
  /* 2 */
  color: #333;
  position: relative;
}
.uk-button-text::before {
  content: "";
  position: absolute;
  bottom: 0;
  left: 0;
  right: 100%;
  border-bottom: 1px solid currentColor;
  transition: right 0.3s ease-out;
}
/* Hover */
.uk-button-text:hover {
  color: #333;
}
.uk-button-text:hover::before {
  right: 0;
}
/* Disabled */
.uk-button-text:disabled {
  color: #999;
}
.uk-button-text:disabled::before {
  display: none;
}
/*
 * Link
 * 1. Reset
 * 2. Style
 */
.uk-button-link {
  /* 1 */
  padding: 0;
  line-height: 1.5;
  background: none;
  /* 2 */
  color: #333;
}
/* Hover */
.uk-button-link:hover {
  color: #999;
  text-decoration: none;
}
/* Disabled */
.uk-button-link:disabled {
  color: #999;
  text-decoration: none;
}
/* Group
 ========================================================================== */
/*
 * 1. Using `flex` instead of `inline-block` to prevent whitespace betweent child elements
 * 2. Behave like button
 * 3. Create position context
 */
.uk-button-group {
  /* 1 */
  display: inline-flex;
  /* 2 */
  vertical-align: middle;
  /* 3 */
  position: relative;
}
/* Group
     ========================================================================== */
/*
     * Collapse border
     */
.uk-button-group > .uk-button:nth-child(n+2),
.uk-button-group > div:nth-child(n+2) .uk-button {
  margin-left: -1px;
}
/*
     * Create position context to superimpose the successor elements border
     * Known issue: If you use an `a` element as button and an icon inside,
     * the active state will not work if you click the icon inside the button
     * Workaround: Just use a `button` or `input` element as button
     */
.uk-button-group .uk-button:hover,
.uk-button-group .uk-button:focus,
.uk-button-group .uk-button:active,
.uk-button-group .uk-button.uk-active {
  position: relative;
  z-index: 1;
}
/* ========================================================================
   Component: Progress
 ========================================================================== */
/*
 * 1. Add the correct vertical alignment in all browsers.
 * 2. Behave like a block element.
 * 3. Remove borders in Firefox.
 * 4. Remove default style in Chrome, Safari and Edge.
 * 5. Style
 */
.uk-progress {
  /* 1 */
  vertical-align: baseline;
  /* 2 */
  display: block;
  width: 100%;
  /* 3 */
  border: 0;
  /* 4 */
  background-color: #03406A21;
  /* 5 */
  margin-bottom: 20px;
  height: 15px;
  border-radius: 500px;
  overflow: hidden;
}
/* Add margin if adjacent element */
* + .uk-progress {
  margin-top: 20px;
}
/*
 * Show background color set on `uk-progress` in Chrome, Safari and Edge.
 */
.uk-progress::-webkit-progress-bar {
  background-color: transparent;
}
/*
 * Progress Bar
 * 1. Transitions don't work on `::-moz-progress-bar` pseudo element in Firefox yet.
 *    https://bugzilla.mozilla.org/show_bug.cgi?id=662351
 */
.uk-progress::-webkit-progress-value {
  background-color: #03406A;
  transition: width 0.6s ease;
}
.uk-progress::-moz-progress-bar {
  background-color: #03406A;
  /* 1 */
  transition: width 0.6s ease;
}
/* ========================================================================
   Component: Section
 ========================================================================== */
/*
 * 1. Make it work with `100vh` and height in general
 */
.uk-section {
  display: flow-root;
  box-sizing: border-box;
  /* 1 */
  padding-top: 40px;
  padding-bottom: 40px;
}
/* Desktop and bigger */
@media (min-width: 960px) {
  .uk-section {
    padding-top: 70px;
    padding-bottom: 70px;
  }
}
/*
 * Remove margin from the last-child
 */
.uk-section > :last-child {
  margin-bottom: 0;
}
/* Size modifiers
 ========================================================================== */
/*
 * XSmall
 */
.uk-section-xsmall {
  padding-top: 20px;
  padding-bottom: 20px;
}
/*
 * Small
 */
.uk-section-small {
  padding-top: 40px;
  padding-bottom: 40px;
}
/*
 * Large
 */
.uk-section-large {
  padding-top: 70px;
  padding-bottom: 70px;
}
/* Tablet landscape and bigger */
@media (min-width: 960px) {
  .uk-section-large {
    padding-top: 140px;
    padding-bottom: 140px;
  }
}
/*
 * XLarge
 */
.uk-section-xlarge {
  padding-top: 140px;
  padding-bottom: 140px;
}
/* Tablet landscape and bigger */
@media (min-width: 960px) {
  .uk-section-xlarge {
    padding-top: 210px;
    padding-bottom: 210px;
  }
}
/* Style modifiers
 ========================================================================== */
/*
 * Default
 */
.uk-section-default {
  background: #fff;
}
/*
 * Muted
 */
.uk-section-muted {
  background: #03406A21;
}
/*
 * Primary
 */
.uk-section-primary {
  background: #00a0e3;
}
/*
 * Secondary
 */
.uk-section-secondary {
  background: #222;
}
/* Overlap modifier
 ========================================================================== */
/*
 * Reserved modifier to make a section overlap another section with an border image
 * Implemented by the theme
 */
/* ========================================================================
   Component: Container
 ========================================================================== */
/*
 * 1. Box sizing has to be `content-box` so the max-width is always the same and
 *    unaffected by the padding on different breakpoints. It's important for the size modifiers.
 */
.uk-container {
  display: flow-root;
  /* 1 */
  box-sizing: content-box;
  max-width: 1200px;
  margin-left: auto;
  margin-right: auto;
  padding-left: 15px;
  padding-right: 15px;
}
/* Phone landscape and bigger */
@media (min-width: 640px) {
  .uk-container {
    padding-left: 30px;
    padding-right: 30px;
  }
}
/* Tablet landscape and bigger */
@media (min-width: 960px) {
  .uk-container {
    padding-left: 40px;
    padding-right: 40px;
  }
}
/*
 * Remove margin from the last-child
 */
.uk-container > :last-child {
  margin-bottom: 0;
}
/*
 * Remove padding from nested containers
 */
.uk-container .uk-container {
  padding-left: 0;
  padding-right: 0;
}
/* Size modifier
 ========================================================================== */
.uk-container-xsmall {
  max-width: 750px;
}
.uk-container-small {
  max-width: 900px;
}
.uk-container-large {
  max-width: 1400px;
}
.uk-container-xlarge {
  max-width: 1600px;
}
.uk-container-expand {
  max-width: none;
}
/* Expand modifier
 ========================================================================== */
/*
 * Expand one side only
 */
.uk-container-expand-left {
  margin-left: 0;
}
.uk-container-expand-right {
  margin-right: 0;
}
/* Phone landscape and bigger */
@media (min-width: 640px) {
  .uk-container-expand-left.uk-container-xsmall,
  .uk-container-expand-right.uk-container-xsmall {
    max-width: calc(50% + (750px / 2) - 30px);
  }
  .uk-container-expand-left.uk-container-small,
  .uk-container-expand-right.uk-container-small {
    max-width: calc(50% + (900px / 2) - 30px);
  }
}
/* Tablet landscape and bigger */
@media (min-width: 960px) {
  .uk-container-expand-left,
  .uk-container-expand-right {
    max-width: calc(50% + (1200px / 2) - 40px);
  }
  .uk-container-expand-left.uk-container-xsmall,
  .uk-container-expand-right.uk-container-xsmall {
    max-width: calc(50% + (750px / 2) - 40px);
  }
  .uk-container-expand-left.uk-container-small,
  .uk-container-expand-right.uk-container-small {
    max-width: calc(50% + (900px / 2) - 40px);
  }
  .uk-container-expand-left.uk-container-large,
  .uk-container-expand-right.uk-container-large {
    max-width: calc(50% + (1400px / 2) - 40px);
  }
  .uk-container-expand-left.uk-container-xlarge,
  .uk-container-expand-right.uk-container-xlarge {
    max-width: calc(50% + (1600px / 2) - 40px);
  }
}
/* Item
 ========================================================================== */
/*
 * Utility classes to reset container padding on the left or right side
 * Note: It has to be negative margin on the item, because it's specific to the item.
 */
.uk-container-item-padding-remove-left,
.uk-container-item-padding-remove-right {
  width: calc(100% + 15px);
}
.uk-container-item-padding-remove-left {
  margin-left: -15px;
}
.uk-container-item-padding-remove-right {
  margin-right: -15px;
}
/* Phone landscape and bigger */
@media (min-width: 640px) {
  .uk-container-item-padding-remove-left,
  .uk-container-item-padding-remove-right {
    width: calc(100% + 30px);
  }
  .uk-container-item-padding-remove-left {
    margin-left: -30px;
  }
  .uk-container-item-padding-remove-right {
    margin-right: -30px;
  }
}
/* Tablet landscape and bigger */
@media (min-width: 960px) {
  .uk-container-item-padding-remove-left,
  .uk-container-item-padding-remove-right {
    width: calc(100% + 40px);
  }
  .uk-container-item-padding-remove-left {
    margin-left: -40px;
  }
  .uk-container-item-padding-remove-right {
    margin-right: -40px;
  }
}
/* ========================================================================
   Component: Tile
 ========================================================================== */
.uk-tile {
  display: flow-root;
  position: relative;
  box-sizing: border-box;
  padding-left: 15px;
  padding-right: 15px;
  padding-top: 40px;
  padding-bottom: 40px;
}
/* Phone landscape and bigger */
@media (min-width: 640px) {
  .uk-tile {
    padding-left: 30px;
    padding-right: 30px;
  }
}
/* Tablet landscape and bigger */
@media (min-width: 960px) {
  .uk-tile {
    padding-left: 40px;
    padding-right: 40px;
    padding-top: 70px;
    padding-bottom: 70px;
  }
}
/*
 * Remove margin from the last-child
 */
.uk-tile > :last-child {
  margin-bottom: 0;
}
/* Size modifiers
 ========================================================================== */
/*
 * XSmall
 */
.uk-tile-xsmall {
  padding-top: 20px;
  padding-bottom: 20px;
}
/*
 * Small
 */
.uk-tile-small {
  padding-top: 40px;
  padding-bottom: 40px;
}
/*
 * Large
 */
.uk-tile-large {
  padding-top: 70px;
  padding-bottom: 70px;
}
/* Tablet landscape and bigger */
@media (min-width: 960px) {
  .uk-tile-large {
    padding-top: 140px;
    padding-bottom: 140px;
  }
}
/*
 * XLarge
 */
.uk-tile-xlarge {
  padding-top: 140px;
  padding-bottom: 140px;
}
/* Tablet landscape and bigger */
@media (min-width: 960px) {
  .uk-tile-xlarge {
    padding-top: 210px;
    padding-bottom: 210px;
  }
}
/* Style modifiers
 ========================================================================== */
/*
 * Default
 */
.uk-tile-default {
  background-color: #fff;
}
/*
 * Muted
 */
.uk-tile-muted {
  background-color: #03406A21;
}
/*
 * Primary
 */
.uk-tile-primary {
  background-color: #03406A;
}
/*
 * Secondary
 */
.uk-tile-secondary {
  background-color: #222;
}
/* ========================================================================
   Component: Card
 ========================================================================== */
.uk-card {
  position: relative;
  box-sizing: border-box;
  transition: box-shadow 0.1s ease-in-out;
}
/* Sections
 ========================================================================== */
.uk-card-body {
  display: flow-root;
  padding: 30px 30px;
}
.uk-card-header {
  display: flow-root;
  padding: 15px 30px;
}
.uk-card-footer {
  display: flow-root;
  padding: 15px 30px;
}
/* Desktop and bigger */
@media (min-width: 1200px) {
  .uk-card-body {
    padding: 40px 40px;
  }
  .uk-card-header {
    padding: 20px 40px;
  }
  .uk-card-footer {
    padding: 20px 40px;
  }
}
/*
 * Remove margin from the last-child
 */
.uk-card-body > :last-child,
.uk-card-header > :last-child,
.uk-card-footer > :last-child {
  margin-bottom: 0;
}
/* Media
 ========================================================================== */
/*
 * Reserved alignment modifier to style the media element, e.g. with `border-radius`
 * Implemented by the theme
 */
/* Title
 ========================================================================== */
.uk-card-title {
  font-size: 1.5rem;
  line-height: 1.4;
}
/* Badge
 ========================================================================== */
/*
 * 1. Position
 * 2. Size
 * 3. Style
 * 4. Center child vertically
 */
.uk-card-badge {
  /* 1 */
  position: absolute;
  top: 15px;
  right: 15px;
  z-index: 1;
  /* 2 */
  height: 22px;
  padding: 0 10px;
  /* 3 */
  background: #03406A;
  color: #fff;
  font-size: 0.875rem;
  /* 4 */
  display: flex;
  justify-content: center;
  align-items: center;
  line-height: 0;
  border-radius: 2px;
  text-transform: uppercase;
}
/*
 * Remove margin from adjacent element
 */
.uk-card-badge:first-child + * {
  margin-top: 0;
}
/* Hover modifier
 ========================================================================== */
.uk-card-hover:not(.uk-card-default):not(.uk-card-primary):not(.uk-card-secondary):hover {
  background-color: #fff;
  box-shadow: 0 14px 25px rgba(0, 0, 0, 0.16);
}
/* Style modifiers
 ========================================================================== */
/*
 * Default
 * Note: Header and Footer are only implemented for the default style
 */
.uk-card-default {
  background-color: #fff;
  color: #666;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
}
.uk-card-default .uk-card-title {
  color: #333;
}
.uk-card-default.uk-card-hover:hover {
  background-color: #fff;
  box-shadow: 0 14px 25px rgba(0, 0, 0, 0.16);
}
.uk-card-default .uk-card-header {
  border-bottom: 1px solid #e5e5e5;
}
.uk-card-default .uk-card-footer {
  border-top: 1px solid #e5e5e5;
}
/*
 * Primary
 */
.uk-card-primary {
  background-color: #03406A;
  color: #fff;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
}
.uk-card-primary .uk-card-title {
  color: #fff;
}
.uk-card-primary.uk-card-hover:hover {
  background-color: #03406A;
  box-shadow: 0 14px 25px rgba(0, 0, 0, 0.16);
}
/*
 * Secondary
 */
.uk-card-secondary {
  background-color: #222;
  color: #fff;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
}
.uk-card-secondary .uk-card-title {
  color: #fff;
}
.uk-card-secondary.uk-card-hover:hover {
  background-color: #222;
  box-shadow: 0 14px 25px rgba(0, 0, 0, 0.16);
}
/* Size modifier
 ========================================================================== */
/*
 * Small
 */
.uk-card-small.uk-card-body,
.uk-card-small .uk-card-body {
  padding: 20px 20px;
}
.uk-card-small .uk-card-header {
  padding: 13px 20px;
}
.uk-card-small .uk-card-footer {
  padding: 13px 20px;
}
/*
 * Large
 */
/* Desktop and bigger */
@media (min-width: 1200px) {
  .uk-card-large.uk-card-body,
  .uk-card-large .uk-card-body {
    padding: 70px 70px;
  }
  .uk-card-large .uk-card-header {
    padding: 35px 70px;
  }
  .uk-card-large .uk-card-footer {
    padding: 35px 70px;
  }
}
/*
     * Default
     */
.uk-card-body > .uk-nav-default {
  margin-left: -30px;
  margin-right: -30px;
}
.uk-card-body > .uk-nav-default:only-child {
  margin-top: -15px;
  margin-bottom: -15px;
}
.uk-card-body > .uk-nav-default > li > a,
.uk-card-body > .uk-nav-default .uk-nav-header,
.uk-card-body > .uk-nav-default .uk-nav-divider {
  padding-left: 30px;
  padding-right: 30px;
}
.uk-card-body > .uk-nav-default .uk-nav-sub {
  padding-left: 45px;
}
/* Desktop and bigger */
@media (min-width: 1200px) {
  .uk-card-body > .uk-nav-default {
    margin-left: -40px;
    margin-right: -40px;
  }
  .uk-card-body > .uk-nav-default:only-child {
    margin-top: -25px;
    margin-bottom: -25px;
  }
  .uk-card-body > .uk-nav-default > li > a,
  .uk-card-body > .uk-nav-default .uk-nav-header,
  .uk-card-body > .uk-nav-default .uk-nav-divider {
    padding-left: 40px;
    padding-right: 40px;
  }
  .uk-card-body > .uk-nav-default .uk-nav-sub {
    padding-left: 55px;
  }
}
/*
     * Small
     */
.uk-card-small > .uk-nav-default {
  margin-left: -20px;
  margin-right: -20px;
}
.uk-card-small > .uk-nav-default:only-child {
  margin-top: -5px;
  margin-bottom: -5px;
}
.uk-card-small > .uk-nav-default > li > a,
.uk-card-small > .uk-nav-default .uk-nav-header,
.uk-card-small > .uk-nav-default .uk-nav-divider {
  padding-left: 20px;
  padding-right: 20px;
}
.uk-card-small > .uk-nav-default .uk-nav-sub {
  padding-left: 35px;
}
/*
     * Large
     */
/* Desktop and bigger */
@media (min-width: 1200px) {
  .uk-card-large > .uk-nav-default {
    margin: 0;
  }
  .uk-card-large > .uk-nav-default:only-child {
    margin: 0;
  }
  .uk-card-large > .uk-nav-default > li > a,
  .uk-card-large > .uk-nav-default .uk-nav-header,
  .uk-card-large > .uk-nav-default .uk-nav-divider {
    padding-left: 0;
    padding-right: 0;
  }
  .uk-card-large > .uk-nav-default .uk-nav-sub {
    padding-left: 15px;
  }
}
/* ========================================================================
   Component: Close
 ========================================================================== */
/*
 * Adopts `uk-icon`
 */
.uk-close {
  color: #999;
  transition: 0.1s ease-in-out;
  transition-property: color, opacity;
}
/* Hover */
.uk-close:hover {
  color: #666;
}
/* ========================================================================
   Component: Spinner
 ========================================================================== */
/*
 * Adopts `uk-icon`
 */
/* SVG
 ========================================================================== */
.uk-spinner > * {
  animation: uk-spinner-rotate 1.4s linear infinite;
}
@keyframes uk-spinner-rotate {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(270deg);
  }
}
/*
 * Circle
 */
.uk-spinner > * > * {
  stroke-dasharray: 88px;
  stroke-dashoffset: 0;
  transform-origin: center;
  animation: uk-spinner-dash 1.4s ease-in-out infinite;
  stroke-width: 1;
  stroke-linecap: round;
}
@keyframes uk-spinner-dash {
  0% {
    stroke-dashoffset: 88px;
  }
  50% {
    stroke-dashoffset: 22px;
    transform: rotate(135deg);
  }
  100% {
    stroke-dashoffset: 88px;
    transform: rotate(450deg);
  }
}
/* ========================================================================
   Component: Totop
 ========================================================================== */
/*
 * Addopts `uk-icon`
 */
.uk-totop {
  padding: 5px;
  color: #999;
  transition: color 0.1s ease-in-out;
}
/* Hover */
.uk-totop:hover {
  color: #666;
}
/* OnClick */
.uk-totop:active {
  color: #333;
}
/* ========================================================================
   Component: Marker
 ========================================================================== */
/*
 * Addopts `uk-icon`
 */
.uk-marker {
  padding: 5px;
  background: #222;
  color: #fff;
  border-radius: 500px;
}
/* Hover */
.uk-marker:hover {
  color: #fff;
}
/* ========================================================================
   Component: Alert
 ========================================================================== */
.uk-alert {
  position: relative;
  margin-bottom: 20px;
  padding: 15px 29px 15px 15px;
  background: #03406A21;
  color: #666;
}
/* Add margin if adjacent element */
* + .uk-alert {
  margin-top: 20px;
}
/*
 * Remove margin from the last-child
 */
.uk-alert > :last-child {
  margin-bottom: 0;
}
/* Close
 * Adopts `uk-close`
 ========================================================================== */
.uk-alert-close {
  position: absolute;
  top: 20px;
  right: 15px;
  color: inherit;
  opacity: 0.4;
}
/*
 * Remove margin from adjacent element
 */
.uk-alert-close:first-child + * {
  margin-top: 0;
}
/*
 * Hover
 */
.uk-alert-close:hover {
  color: inherit;
  opacity: 0.8;
}
/* Style modifiers
 ========================================================================== */
/*
 * Primary
 */
.uk-alert-primary {
  background: #d8eafc;
  color: #03406A;
}
/*
 * Success
 */
.uk-alert-success {
  background: #edfbf6;
  color: #32d296;
}
/*
 * Warning
 */
.uk-alert-warning {
  background: #fff6ee;
  color: #faa05a;
}
/*
 * Danger
 */
.uk-alert-danger {
  background: #fef4f6;
  color: #ec3434;
}
/*
     * Content
     */
.uk-alert h1,
.uk-alert h2,
.uk-alert h3,
.uk-alert h4,
.uk-alert h5,
.uk-alert h6 {
  color: inherit;
}
.uk-alert a:not([class]) {
  color: inherit;
  text-decoration: underline;
}
.uk-alert a:not([class]):hover {
  color: inherit;
  text-decoration: underline;
}
/* ========================================================================
   Component: Placeholder
 ========================================================================== */
.uk-placeholder {
  margin-bottom: 20px;
  padding: 30px 30px;
  background: transparent;
  border: 1px dashed #e5e5e5;
}
/* Add margin if adjacent element */
* + .uk-placeholder {
  margin-top: 20px;
}
/*
 * Remove margin from the last-child
 */
.uk-placeholder > :last-child {
  margin-bottom: 0;
}
/* ========================================================================
   Component: Badge
 ========================================================================== */
/*
 * 1. Style
 * 2. Center child vertically and horizontally
 */
.uk-badge {
  box-sizing: border-box;
  min-width: 18px;
  height: 18px;
  padding: 0 5px;
  border-radius: 500px;
  vertical-align: middle;
  /* 1 */
  background: #03406A;
  color: #fff !important;
  font-size: 11px;
  /* 2 */
  display: inline-flex;
  justify-content: center;
  align-items: center;
  line-height: 0;
}
/*
 * Required for `a`
 */
.uk-badge:hover {
  text-decoration: none;
}
/* ========================================================================
   Component: Label
 ========================================================================== */
.uk-label {
  display: inline-block;
  padding: 0 10px;
  background: #03406A;
  line-height: 1.5;
  font-size: 0.875rem;
  color: #fff;
  vertical-align: middle;
  white-space: nowrap;
  border-radius: 2px;
  text-transform: uppercase;
}
/* Color modifiers
 ========================================================================== */
/*
 * Success
 */
.uk-label-success {
  background-color: #32d296;
  color: #fff;
}
/*
 * Warning
 */
.uk-label-warning {
  background-color: #faa05a;
  color: #fff;
}
/*
 * Danger
 */
.uk-label-danger {
  background-color: #ec3434;
  color: #fff;
}
/* ========================================================================
   Component: Overlay
 ========================================================================== */
.uk-overlay {
  padding: 30px 30px;
}
/*
 * Remove margin from the last-child
 */
.uk-overlay > :last-child {
  margin-bottom: 0;
}
/* Icon
 ========================================================================== */
/* Style modifiers
 ========================================================================== */
/*
 * Default
 */
.uk-overlay-default {
  background: rgba(255, 255, 255, 0.8);
}
/*
 * Primary
 */
.uk-overlay-primary {
  background: rgba(34, 34, 34, 0.8);
}
/* ========================================================================
   Component: Article
 ========================================================================== */
.uk-article {
  display: flow-root;
}
/*
 * Remove margin from the last-child
 */
.uk-article > :last-child {
  margin-bottom: 0;
}
/* Adjacent sibling
 ========================================================================== */
.uk-article + .uk-article {
  margin-top: 70px;
}
/* Title
 ========================================================================== */
.uk-article-title {
  font-size: 2.23125rem;
  line-height: 1.2;
}
/* Tablet landscape and bigger */
@media (min-width: 960px) {
  .uk-article-title {
    font-size: 2.625rem;
  }
}
/* Meta
 ========================================================================== */
.uk-article-meta {
  font-size: 0.775rem;
  line-height: 1.4;
  color: #999;
}
.uk-article-meta a {
  color: #999;
}
.uk-article-meta a:hover {
  color: #666;
  text-decoration: none;
}
/* ========================================================================
   Component: Comment
 ========================================================================== */
/* Sections
 ========================================================================== */
.uk-comment-body {
  display: flow-root;
  overflow-wrap: break-word;
  word-wrap: break-word;
}
.uk-comment-header {
  display: flow-root;
  margin-bottom: 20px;
}
/*
 * Remove margin from the last-child
 */
.uk-comment-body > :last-child,
.uk-comment-header > :last-child {
  margin-bottom: 0;
}
/* Title
 ========================================================================== */
.uk-comment-title {
  font-size: 1.25rem;
  line-height: 1.4;
}
/* Meta
 ========================================================================== */
.uk-comment-meta {
  font-size: 0.875rem;
  line-height: 1.4;
  color: #999;
}
/* Avatar
 ========================================================================== */
/* List
 ========================================================================== */
.uk-comment-list {
  padding: 0;
  list-style: none;
}
/* Adjacent siblings */
.uk-comment-list > :nth-child(n+2) {
  margin-top: 70px;
}
/*
 * Sublists
 * Note: General sibling selector allows reply block between comment and sublist
 */
.uk-comment-list .uk-comment ~ ul {
  margin: 70px 0 0 0;
  padding-left: 30px;
  list-style: none;
}
/* Tablet and bigger */
@media (min-width: 960px) {
  .uk-comment-list .uk-comment ~ ul {
    padding-left: 100px;
  }
}
/* Adjacent siblings */
.uk-comment-list .uk-comment ~ ul > :nth-child(n+2) {
  margin-top: 70px;
}
/* Style modifier
 ========================================================================== */
.uk-comment-primary {
  padding: 30px;
  background-color: #03406A21;
}
/* ========================================================================
   Component: Search
 ========================================================================== */
/*
 * 1. Container fits its content
 * 2. Create position context
 * 3. Prevent content overflow
 * 4. Reset `form`
 */
.uk-search {
  /* 1 */
  display: inline-block;
  /* 2 */
  position: relative;
  /* 3 */
  max-width: 100%;
  /* 4 */
  margin: 0;
}
/* Input
 ========================================================================== */
/*
 * Remove the inner padding and cancel buttons in Chrome on OS X and Safari on OS X.
 */
.uk-search-input::-webkit-search-cancel-button,
.uk-search-input::-webkit-search-decoration {
  -webkit-appearance: none;
}
/*
 * Removes placeholder transparency in Firefox.
 */
.uk-search-input::-moz-placeholder {
  opacity: 1;
}
/*
 * 1. Define consistent box sizing.
 * 2. Address margins set differently in Firefox/IE and Chrome/Safari/Opera.
 * 3. Remove `border-radius` in iOS.
 * 4. Change font properties to `inherit` in all browsers
 * 5. Show the overflow in Edge.
 * 6. Remove default style in iOS.
 * 7. Vertical alignment
 * 8. Take the full container width
 * 9. Style
 */
.uk-search-input {
  /* 1 */
  box-sizing: border-box;
  /* 2 */
  margin: 0;
  /* 3 */
  border-radius: 0;
  /* 4 */
  font: inherit;
  /* 5 */
  overflow: visible;
  /* 6 */
  -webkit-appearance: none;
  /* 7 */
  vertical-align: middle;
  /* 8 */
  width: 100%;
  /* 9 */
  border: none;
  color: #666;
}
.uk-search-input:focus {
  outline: none;
}
/* Placeholder */
.uk-search-input::placeholder {
  color: #999;
}
/* Icon (Adopts `uk-icon`)
 ========================================================================== */
/*
 * Position above input
 * 1. Set position
 * 2. Center icon vertically and horizontally
 * 3. Style
 */
.uk-search .uk-search-icon {
  /* 1 */
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  /* 2 */
  display: inline-flex;
  justify-content: center;
  align-items: center;
  /* 3 */
  color: #999;
}
/*
 * Required for `a`.
 */
.uk-search .uk-search-icon:hover {
  color: #999;
}
/*
 * Make `input` element clickable through icon, e.g. if it's a `span`
 */
.uk-search .uk-search-icon:not(a):not(button):not(input) {
  pointer-events: none;
}
/*
 * Position modifier
 */
.uk-search .uk-search-icon-flip {
  right: 0;
  left: auto;
}
/* Default modifier
 ========================================================================== */
.uk-search-default {
  width: 240px;
}
/*
 * Input
 */
.uk-search-default .uk-search-input {
  height: 40px;
  padding-left: 10px;
  padding-right: 10px;
  background: transparent;
  border: 1px solid #e5e5e5;
}
/* Focus */
.uk-search-default .uk-search-input:focus {
  background-color: rgba(0, 0, 0, 0);
  border-color: #03406A;
}
/*
 * Icon
 */
.uk-search-default .uk-search-icon {
  width: 40px;
}
.uk-search-default .uk-search-icon:not(.uk-search-icon-flip) ~ .uk-search-input {
  padding-left: 40px;
}
.uk-search-default .uk-search-icon-flip ~ .uk-search-input {
  padding-right: 40px;
}
/* Navbar modifier
 ========================================================================== */
.uk-search-navbar {
  width: 400px;
}
/*
 * Input
 */
.uk-search-navbar .uk-search-input {
  height: 40px;
  background: transparent;
  font-size: 1.5rem;
}
/* Focus */
/*
 * Icon
 */
.uk-search-navbar .uk-search-icon {
  width: 40px;
}
.uk-search-navbar .uk-search-icon:not(.uk-search-icon-flip) ~ .uk-search-input {
  padding-left: 40px;
}
.uk-search-navbar .uk-search-icon-flip ~ .uk-search-input {
  padding-right: 40px;
}
/* Large modifier
 ========================================================================== */
.uk-search-large {
  width: 500px;
}
/*
 * Input
 */
.uk-search-large .uk-search-input {
  height: 80px;
  background: transparent;
  font-size: 2.625rem;
}
/* Focus */
/*
 * Icon
 */
.uk-search-large .uk-search-icon {
  width: 80px;
}
.uk-search-large .uk-search-icon:not(.uk-search-icon-flip) ~ .uk-search-input {
  padding-left: 80px;
}
.uk-search-large .uk-search-icon-flip ~ .uk-search-input {
  padding-right: 80px;
}
/* Toggle
 ========================================================================== */
.uk-search-toggle {
  color: #999;
}
/* Hover */
.uk-search-toggle:hover {
  color: #666;
}
/* ========================================================================
   Component: Accordion
 ========================================================================== */
.uk-accordion {
  padding: 0;
  list-style: none;
}
/* Item
 ========================================================================== */
.uk-accordion > :nth-child(n+2) {
  margin-top: 20px;
}
/* Title
 ========================================================================== */
.uk-accordion-title {
  display: block;
  font-size: 1.25rem;
  line-height: 1.4;
  color: #333;
  overflow: hidden;
}
.uk-accordion-title::before {
  content: "";
  width: 1.4em;
  height: 1.4em;
  margin-left: 10px;
  float: right;
  background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2213%22%20height%3D%2213%22%20viewBox%3D%220%200%2013%2013%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%0A%20%20%20%20%3Crect%20fill%3D%22%23666%22%20width%3D%2213%22%20height%3D%221%22%20x%3D%220%22%20y%3D%226%22%20%2F%3E%0A%20%20%20%20%3Crect%20fill%3D%22%23666%22%20width%3D%221%22%20height%3D%2213%22%20x%3D%226%22%20y%3D%220%22%20%2F%3E%0A%3C%2Fsvg%3E");
  background-repeat: no-repeat;
  background-position: 50% 50%;
}
.uk-open > .uk-accordion-title::before {
  background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2213%22%20height%3D%2213%22%20viewBox%3D%220%200%2013%2013%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%0A%20%20%20%20%3Crect%20fill%3D%22%23666%22%20width%3D%2213%22%20height%3D%221%22%20x%3D%220%22%20y%3D%226%22%20%2F%3E%0A%3C%2Fsvg%3E");
}
/* Hover */
.uk-accordion-title:hover {
  color: #666;
  text-decoration: none;
}
/* Content
 ========================================================================== */
.uk-accordion-content {
  display: flow-root;
  margin-top: 20px;
}
/*
 * Remove margin from the last-child
 */
.uk-accordion-content > :last-child {
  margin-bottom: 0;
}
/* ========================================================================
   Component: Drop
 ========================================================================== */
/*
 * 1. Hide by default
 * 2. Set position
 * 3. Set a default width
 */
.uk-drop {
  /* 1 */
  display: none;
  /* 2 */
  position: absolute;
  z-index: 1020;
  --uk-position-offset: 20px;
  --uk-position-viewport-offset: 15px;
  /* 3 */
  box-sizing: border-box;
  width: 300px;
}
/* Show */
.uk-drop.uk-open {
  display: block;
}
/* Grid modifiers
 ========================================================================== */
.uk-drop-stack .uk-drop-grid > * {
  width: 100% !important;
}
/* ========================================================================
   Component: Dropbar
 ========================================================================== */
/*
 * 1. Hide by default
 * 2. Set position
 * 3. Style
 */
.uk-dropbar {
  --uk-position-offset: 0;
  --uk-position-shift-offset: 0;
  --uk-position-viewport-offset: 0;
  /* 1 */
  display: none;
  /* 2 */
  position: absolute;
  z-index: 1020;
  /* 3 */
  box-sizing: border-box;
  padding: 25px 15px 25px 15px;
  background: #fff;
  color: #666;
}
/* Show */
.uk-dropbar.uk-open {
  display: block;
}
/*
 * Remove margin from the last-child
 */
.uk-dropbar > :last-child {
  margin-bottom: 0;
}
/* Phone landscape and bigger */
@media (min-width: 640px) {
  .uk-dropbar {
    padding-left: 30px;
    padding-right: 30px;
  }
}
/* Tablet landscape and bigger */
@media (min-width: 960px) {
  .uk-dropbar {
    padding-left: 40px;
    padding-right: 40px;
  }
}
/* Size modifier
 ========================================================================== */
.uk-dropbar-large {
  padding-top: 40px;
  padding-bottom: 40px;
}
/* Direction modifier
 ========================================================================== */
.uk-dropbar-top {
  box-shadow: 0 12px 7px -6px rgba(0, 0, 0, 0.05);
}
.uk-dropbar-bottom {
  box-shadow: 0 -12px 7px -6px rgba(0, 0, 0, 0.05);
}
.uk-dropbar-left {
  box-shadow: 12px 0 7px -6px rgba(0, 0, 0, 0.05);
}
.uk-dropbar-right {
  box-shadow: -12px 0 7px -6px rgba(0, 0, 0, 0.05);
}
/* ========================================================================
   Component: Modal
 ========================================================================== */
/*
 * 1. Hide by default
 * 2. Set position
 * 3. Allow scrolling for the modal dialog
 * 4. Horizontal padding
 * 5. Mask the background page
 * 6. Fade-in transition
 */
.uk-modal {
  /* 1 */
  display: none;
  /* 2 */
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 1010;
  /* 3 */
  overflow-y: auto;
  /* 4 */
  padding: 15px 15px;
  /* 5 */
  background: rgba(0, 0, 0, 0.6);
  /* 6 */
  opacity: 0;
  transition: opacity 0.15s linear;
}
/* Phone landscape and bigger */
@media (min-width: 640px) {
  .uk-modal {
    padding: 50px 30px;
  }
}
/* Tablet landscape and bigger */
@media (min-width: 960px) {
  .uk-modal {
    padding-left: 40px;
    padding-right: 40px;
  }
}
/*
 * Open
 */
.uk-modal.uk-open {
  opacity: 1;
}
/* Page
 ========================================================================== */
/*
 * Prevent scrollbars
 */
.uk-modal-page {
  overflow: hidden;
}
/* Dialog
 ========================================================================== */
/*
 * 1. Create position context for spinner and close button
 * 2. Dimensions
 * 3. `!important` is needed to overwrite `uk-width-auto`. See `#modal-media-image` in tests
 * 4. Style
 * 5. Slide-in transition
 */
.uk-modal-dialog {
  /* 1 */
  position: relative;
  /* 2 */
  box-sizing: border-box;
  margin: 0 auto;
  width: 600px;
  /* 3 */
  max-width: 100% !important;
  /* 4 */
  background: #fff;
  /* 5 */
  opacity: 0;
  transform: translateY(-100px);
  transition: 0.3s linear;
  transition-property: opacity, transform;
}
/*
 * Open
 */
.uk-open > .uk-modal-dialog {
  opacity: 1;
  transform: translateY(0);
}
/* Size modifier
 ========================================================================== */
/*
 * Container size
 * Take the same size as the Container component
 */
.uk-modal-container .uk-modal-dialog {
  width: 1200px;
}
/*
 * Full size
 * 1. Remove padding and background from modal
 * 2. Reset all default declarations from modal dialog
 */
/* 1 */
.uk-modal-full {
  padding: 0;
  background: none;
}
/* 2 */
.uk-modal-full .uk-modal-dialog {
  margin: 0;
  width: 100%;
  max-width: 100%;
  transform: translateY(0);
}
/* Sections
 ========================================================================== */
.uk-modal-body {
  display: flow-root;
  padding: 20px 20px;
}
.uk-modal-header {
  display: flow-root;
  padding: 10px 20px;
  background: #fff;
  border-bottom: 1px solid #e5e5e5;
}
.uk-modal-footer {
  display: flow-root;
  padding: 10px 20px;
  background: #fff;
  border-top: 1px solid #e5e5e5;
}
/* Phone landscape and bigger */
@media (min-width: 640px) {
  .uk-modal-body {
    padding: 30px 30px;
  }
  .uk-modal-header {
    padding: 15px 30px;
  }
  .uk-modal-footer {
    padding: 15px 30px;
  }
}
/*
 * Remove margin from the last-child
 */
.uk-modal-body > :last-child,
.uk-modal-header > :last-child,
.uk-modal-footer > :last-child {
  margin-bottom: 0;
}
/* Title
 ========================================================================== */
.uk-modal-title {
  font-size: 2rem;
  line-height: 1.3;
}
/* Close
 * Adopts `uk-close`
 ========================================================================== */
[class*='uk-modal-close-'] {
  position: absolute;
  z-index: 1010;
  top: 10px;
  right: 10px;
  padding: 5px;
}
/*
 * Remove margin from adjacent element
 */
[class*='uk-modal-close-']:first-child + * {
  margin-top: 0;
}
/*
 * Hover
 */
/*
 * Default
 */
/*
 * Outside
 * 1. Prevent scrollbar on small devices
 */
.uk-modal-close-outside {
  top: 0;
  /* 1 */
  right: -5px;
  transform: translate(0, -100%);
  color: #ffffff;
}
.uk-modal-close-outside:hover {
  color: #fff;
}
/* Tablet landscape and bigger */
@media (min-width: 960px) {
  /* 1 */
  .uk-modal-close-outside {
    right: 0;
    transform: translate(100%, -100%);
  }
}
/*
 * Full
 */
.uk-modal-close-full {
  top: 0;
  right: 0;
  padding: 10px;
  background: #fff;
}
/* Tablet landscape and bigger */
@media (min-width: 960px) {
  .uk-modal-close-full {
    padding: 20px;
  }
}
/* ========================================================================
   Component: Slideshow
 ========================================================================== */
/*
 * 1. Prevent tab highlighting on iOS.
 */
.uk-slideshow {
  /* 1 */
  -webkit-tap-highlight-color: transparent;
}
/* Items
 ========================================================================== */
/*
 * 1. Create position and stacking context
 * 2. Reset list
 * 3. Clip child elements
 * 4. Prevent displaying the callout information on iOS.
 * 5. Disable horizontal panning gestures
 */
.uk-slideshow-items {
  /* 1 */
  position: relative;
  z-index: 0;
  /* 2 */
  margin: 0;
  padding: 0;
  list-style: none;
  /* 3 */
  overflow: hidden;
  /* 4 */
  -webkit-touch-callout: none;
  /* 5 */
  touch-action: pan-y;
}
/* Item
 ========================================================================== */
/*
 * 1. Position items above each other
 * 2. Take the full width
 * 3. Clip child elements, e.g. for `uk-cover`
 * 4. Optimize animation
 */
.uk-slideshow-items > * {
  /* 1 */
  position: absolute;
  top: 0;
  left: 0;
  /* 2 */
  right: 0;
  bottom: 0;
  /* 3 */
  overflow: hidden;
  /* 4 */
  will-change: transform, opacity;
}
/*
 * Hide not active items
 */
.uk-slideshow-items > :not(.uk-active) {
  display: none;
}
/* ========================================================================
   Component: Slider
 ========================================================================== */
/*
 * 1. Prevent tab highlighting on iOS.
 */
.uk-slider {
  /* 1 */
  -webkit-tap-highlight-color: transparent;
}
/* Container
 ========================================================================== */
/*
 * Clip child elements
 */
.uk-slider-container {
  overflow: hidden;
}
/*
 * Widen container to prevent box-shadows from clipping, `large-box-shadow`
 */
.uk-slider-container-offset {
  margin: -11px -25px -39px -25px;
  padding: 11px 25px 39px 25px;
}
/* Items
 ========================================================================== */
/*
 * 1. Optimize animation
 * 2. Create a containing block. In Safari it's neither created by `transform` nor `will-change`.
 * 3. Disable horizontal panning gestures
 */
.uk-slider-items {
  /* 1 */
  will-change: transform;
  /* 2 */
  position: relative;
  /* 3 */
  touch-action: pan-y;
}
/*
 * 1. Reset list style without interfering with grid
 * 2. Prevent displaying the callout information on iOS.
 */
.uk-slider-items:not(.uk-grid) {
  display: flex;
  /* 1 */
  margin: 0;
  padding: 0;
  list-style: none;
  /* 2 */
  -webkit-touch-callout: none;
}
.uk-slider-items.uk-grid {
  flex-wrap: nowrap;
}
/* Item
 ========================================================================== */
/*
 * 1. Let items take content dimensions (0 0 auto)
 *    `max-width` needed to keep image responsiveness and prevent content overflow
 * 3. Create position context
 */
.uk-slider-items > * {
  /* 1 */
  flex: none;
  max-width: 100%;
  /* 3 */
  position: relative;
}
/* ========================================================================
   Component: Sticky
 ========================================================================== */
/*
 * 1. Create position context so it's t the same like when fixed.
 * 2. Create stacking context already when not sticky to have the same context
*     for position set to `sticky` and `relative`
 * 2. More robust if padding and border are used and the sticky height is transitioned
 */
.uk-sticky {
  /* 1 */
  position: relative;
  /* 2 */
  z-index: 980;
  /* 3 */
  box-sizing: border-box;
}
/*
 * 1. Force new layer to resolve frame rate issues on devices with lower frame rates
 */
.uk-sticky-fixed {
  margin: 0 !important;
  /* 1 */
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}
/*
 * Faster animations
 */
.uk-sticky[class*='uk-animation-'] {
  animation-duration: 0.2s;
}
.uk-sticky.uk-animation-reverse {
  animation-duration: 0.2s;
}
/*
 * Placeholder
 * Make content clickable for sticky cover and reveal effects
 */
.uk-sticky-placeholder {
  pointer-events: none;
}
/* ========================================================================
   Component: Off-canvas
 ========================================================================== */
/*
 * 1. Hide by default
 * 2. Set position
 */
.uk-offcanvas {
  /* 1 */
  display: none;
  /* 2 */
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  z-index: 1000;
}
/*
 * Flip modifier
 */
.uk-offcanvas-flip .uk-offcanvas {
  right: 0;
  left: auto;
}
/* Bar
 ========================================================================== */
/*
 * 1. Set position
 * 2. Size and style
 * 3. Allow scrolling
 */
.uk-offcanvas-bar {
  /* 1 */
  position: absolute;
  top: 0;
  bottom: 0;
  left: -270px;
  /* 2 */
  box-sizing: border-box;
  width: 270px;
  padding: 20px 20px;
  background: #222;
  /* 3 */
  overflow-y: auto;
}
/* Phone landscape and bigger */
@media (min-width: 640px) {
  .uk-offcanvas-bar {
    left: -350px;
    width: 350px;
    padding: 30px 30px;
  }
}
/* Flip modifier */
.uk-offcanvas-flip .uk-offcanvas-bar {
  left: auto;
  right: -270px;
}
/* Tablet landscape and bigger */
@media (min-width: 640px) {
  .uk-offcanvas-flip .uk-offcanvas-bar {
    right: -350px;
  }
}
/*
 * Open
 */
.uk-open > .uk-offcanvas-bar {
  left: 0;
}
.uk-offcanvas-flip .uk-open > .uk-offcanvas-bar {
  left: auto;
  right: 0;
}
/*
 * Slide Animation (Used in slide and push mode)
 */
.uk-offcanvas-bar-animation {
  transition: left 0.3s ease-out;
}
.uk-offcanvas-flip .uk-offcanvas-bar-animation {
  transition-property: right;
}
/*
 * Reveal Animation
 * 1. Set position
 * 2. Clip the bar
 * 3. Animation
 * 4. Reset position
 */
.uk-offcanvas-reveal {
  /* 1 */
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  /* 2 */
  width: 0;
  overflow: hidden;
  /* 3 */
  transition: width 0.3s ease-out;
}
.uk-offcanvas-reveal .uk-offcanvas-bar {
  /* 4 */
  left: 0;
}
.uk-offcanvas-flip .uk-offcanvas-reveal .uk-offcanvas-bar {
  /* 4 */
  left: auto;
  right: 0;
}
.uk-open > .uk-offcanvas-reveal {
  width: 270px;
}
/* Tablet landscape and bigger */
@media (min-width: 640px) {
  .uk-open > .uk-offcanvas-reveal {
    width: 350px;
  }
}
/*
 * Flip modifier
 */
.uk-offcanvas-flip .uk-offcanvas-reveal {
  right: 0;
  left: auto;
}
/* Close
 * Adopts `uk-close`
 ========================================================================== */
.uk-offcanvas-close {
  position: absolute;
  z-index: 1000;
  top: 5px;
  right: 5px;
  padding: 5px;
}
/* Tablet landscape and bigger */
@media (min-width: 640px) {
  .uk-offcanvas-close {
    top: 10px;
    right: 10px;
  }
}
/*
 * Remove margin from adjacent element
 */
.uk-offcanvas-close:first-child + * {
  margin-top: 0;
}
/* Overlay
 ========================================================================== */
/*
 * Overlay the whole page. Needed for the `::before`
 * 1. Using `100vw` so no modification is needed when off-canvas is flipped
 * 2. Allow for closing with swipe gesture on devices with pointer events.
 */
.uk-offcanvas-overlay {
  /* 1 */
  width: 100vw;
  /* 2 */
  touch-action: none;
}
/*
 * 1. Mask the whole page
 * 2. Fade-in transition
 */
.uk-offcanvas-overlay::before {
  /* 1 */
  content: "";
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.1);
  /* 2 */
  opacity: 0;
  transition: opacity 0.15s linear;
}
.uk-offcanvas-overlay.uk-open::before {
  opacity: 1;
}
/* Prevent scrolling
 ========================================================================== */
/*
 * Prevent horizontal scrollbar when the content is slide-out
 * Has to be on the `html` element too to make it work on the `body`
 * 1. `clip` is needed for `position: sticky` elements to keep their position
 */
.uk-offcanvas-page,
.uk-offcanvas-container {
  overflow-x: hidden;
  /* 1 */
  overflow-x: clip;
}
/* Container
 ========================================================================== */
/*
 * Prepare slide-out animation (Used in reveal and push mode)
 * Using `position: left` instead of `transform` because position `fixed` elements like sticky navbars
 * lose their fixed state and behaves like `absolute` within a transformed container
 * 1. Provide a fixed width and prevent shrinking
 */
.uk-offcanvas-container {
  position: relative;
  left: 0;
  transition: left 0.3s ease-out;
  /* 1 */
  box-sizing: border-box;
  width: 100%;
}
/*
 * Activate slide-out animation
 */
:not(.uk-offcanvas-flip).uk-offcanvas-container-animation {
  left: 270px;
}
.uk-offcanvas-flip.uk-offcanvas-container-animation {
  left: -270px;
}
/* Tablet landscape and bigger */
@media (min-width: 640px) {
  :not(.uk-offcanvas-flip).uk-offcanvas-container-animation {
    left: 350px;
  }
  .uk-offcanvas-flip.uk-offcanvas-container-animation {
    left: -350px;
  }
}
/* ========================================================================
   Component: Switcher
 ========================================================================== */
/*
 * Reset list
 */
.uk-switcher {
  margin: 0;
  padding: 0;
  list-style: none;
}
/* Items
 ========================================================================== */
/*
 * Hide not active items
 */
.uk-switcher > :not(.uk-active) {
  display: none;
}
/*
 * Remove margin from the last-child
 */
.uk-switcher > * > :last-child {
  margin-bottom: 0;
}
/* ========================================================================
   Component: Leader
 ========================================================================== */
.uk-leader {
  overflow: hidden;
}
/*
 * 1. Place element in text flow
 * 2. Never break into a new line
 * 3. Get a string back with as many repeating characters to fill the container
 * 4. Prevent wrapping. Overflowing characters will be clipped by the container
 */
.uk-leader-fill::after {
  /* 1 */
  display: inline-block;
  margin-left: 15px;
  /* 2 */
  width: 0;
  /* 3 */
  content: attr(data-fill);
  /* 4 */
  white-space: nowrap;
}
/*
 * Hide if media does not match
 */
.uk-leader-fill.uk-leader-hide::after {
  display: none;
}
/*
 * Pass fill character to JS
 */
:root {
  --uk-leader-fill-content: .;
}
/* ========================================================================
   Component: Notification
 ========================================================================== */
/*
 * 1. Set position
 * 2. Dimensions
 */
.uk-notification {
  /* 1 */
  position: fixed;
  top: 10px;
  left: 10px;
  z-index: 1040;
  /* 2 */
  box-sizing: border-box;
  width: 350px;
}
/* Position modifiers
========================================================================== */
.uk-notification-top-right,
.uk-notification-bottom-right {
  left: auto;
  right: 10px;
}
.uk-notification-top-center,
.uk-notification-bottom-center {
  left: 50%;
  margin-left: -175px;
}
.uk-notification-bottom-left,
.uk-notification-bottom-right,
.uk-notification-bottom-center {
  top: auto;
  bottom: 10px;
}
/* Responsiveness
========================================================================== */
/* Phones portrait and smaller */
@media (max-width: 639px) {
  .uk-notification {
    left: 10px;
    right: 10px;
    width: auto;
    margin: 0;
  }
}
/* Message
========================================================================== */
.uk-notification-message {
  position: relative;
  padding: 15px;
  background: #03406A21;
  color: #666;
  font-size: 1.25rem;
  line-height: 1.4;
  cursor: pointer;
}
* + .uk-notification-message {
  margin-top: 10px;
}
/* Close
 * Adopts `uk-close`
 ========================================================================== */
.uk-notification-close {
  display: none;
  position: absolute;
  top: 20px;
  right: 15px;
}
.uk-notification-message:hover .uk-notification-close {
  display: block;
}
/* Style modifiers
 ========================================================================== */
/*
 * Primary
 */
.uk-notification-message-primary {
  color: #03406A;
}
/*
 * Success
 */
.uk-notification-message-success {
  color: #32d296;
}
/*
 * Warning
 */
.uk-notification-message-warning {
  color: #faa05a;
}
/*
 * Danger
 */
.uk-notification-message-danger {
  color: #ec3434;
}
/* ========================================================================
   Component: Tooltip
 ========================================================================== */
/*
 * 1. Hide by default
 * 2. Position
 * 3. Remove tooltip from document flow to keep the UIkit container from changing its size when injected into the document initially
 * 4. Dimensions
 * 5. Style
 */
.uk-tooltip {
  /* 1 */
  display: none;
  /* 2 */
  position: absolute;
  z-index: 1030;
  --uk-position-offset: 10px;
  --uk-position-viewport-offset: 10;
  /* 3 */
  top: 0;
  /* 4 */
  box-sizing: border-box;
  max-width: 200px;
  padding: 3px 6px;
  /* 5 */
  background: #666;
  border-radius: 2px;
  color: #fff;
  font-size: 12px;
}
/* Show */
.uk-tooltip.uk-active {
  display: block;
}
/* ========================================================================
   Component: Sortable
 ========================================================================== */
.uk-sortable {
  position: relative;
}
/*
 * Remove margin from the last-child
 */
.uk-sortable > :last-child {
  margin-bottom: 0;
}
/* Drag
 ========================================================================== */
.uk-sortable-drag {
  position: fixed !important;
  z-index: 1050 !important;
  pointer-events: none;
}
/* Placeholder
 ========================================================================== */
.uk-sortable-placeholder {
  opacity: 0;
  pointer-events: none;
}
/* Empty modifier
 ========================================================================== */
.uk-sortable-empty {
  min-height: 50px;
}
/* Handle
 ========================================================================== */
/* Hover */
.uk-sortable-handle:hover {
  cursor: move;
}
/* ========================================================================
   Component: Countdown
 ========================================================================== */
/* Item
 ========================================================================== */
/* Number
 ========================================================================== */
/*
 * 1. Make numbers all of the same size to prevent jumping. Must be supported by the font.
 * 2. Style
 */
.uk-countdown-number {
  /* 1 */
  font-variant-numeric: tabular-nums;
  /* 2 */
  font-size: 2rem;
  line-height: 0.8;
}
/* Phone landscape and bigger */
@media (min-width: 640px) {
  .uk-countdown-number {
    font-size: 4rem;
  }
}
/* Tablet landscape and bigger */
@media (min-width: 960px) {
  .uk-countdown-number {
    font-size: 6rem;
  }
}
/* Separator
 ========================================================================== */
.uk-countdown-separator {
  font-size: 1rem;
  line-height: 1.6;
}
/* Phone landscape and bigger */
@media (min-width: 640px) {
  .uk-countdown-separator {
    font-size: 2rem;
  }
}
/* Tablet landscape and bigger */
@media (min-width: 960px) {
  .uk-countdown-separator {
    font-size: 3rem;
  }
}
/* Label
 ========================================================================== */
/* ========================================================================
   Component: Grid
 ========================================================================== */
/*
 * 1. Allow cells to wrap into the next line
 * 2. Reset list
 */
.uk-grid {
  display: flex;
  /* 1 */
  flex-wrap: wrap;
  /* 2 */
  margin: 0;
  padding: 0;
  list-style: none;
}
/*
 * Grid cell
 * Note: Space is allocated solely based on content dimensions, but shrinks: 0 1 auto
 * Reset margin for e.g. paragraphs
 */
.uk-grid > * {
  margin: 0;
}
/*
 * Remove margin from the last-child
 */
.uk-grid > * > :last-child {
  margin-bottom: 0;
}
/* Gutter
 ========================================================================== */
/*
 * Default
 */
/* Horizontal */
.uk-grid {
  margin-left: -30px;
}
.uk-grid > * {
  padding-left: 30px;
}
/* Vertical */
.uk-grid + .uk-grid,
.uk-grid > .uk-grid-margin,
* + .uk-grid-margin {
  margin-top: 30px;
}
/* Desktop and bigger */
@media (min-width: 1200px) {
  /* Horizontal */
  .uk-grid {
    margin-left: -40px;
  }
  .uk-grid > * {
    padding-left: 40px;
  }
  /* Vertical */
  .uk-grid + .uk-grid,
  .uk-grid > .uk-grid-margin,
  * + .uk-grid-margin {
    margin-top: 40px;
  }
}
/*
 * Small
 */
/* Horizontal */
.uk-grid-small,
.uk-grid-column-small {
  margin-left: -15px;
}
.uk-grid-small > *,
.uk-grid-column-small > * {
  padding-left: 15px;
}
/* Vertical */
.uk-grid + .uk-grid-small,
.uk-grid + .uk-grid-row-small,
.uk-grid-small > .uk-grid-margin,
.uk-grid-row-small > .uk-grid-margin,
* + .uk-grid-margin-small {
  margin-top: 15px;
}
/*
 * Medium
 */
/* Horizontal */
.uk-grid-medium,
.uk-grid-column-medium {
  margin-left: -30px;
}
.uk-grid-medium > *,
.uk-grid-column-medium > * {
  padding-left: 30px;
}
/* Vertical */
.uk-grid + .uk-grid-medium,
.uk-grid + .uk-grid-row-medium,
.uk-grid-medium > .uk-grid-margin,
.uk-grid-row-medium > .uk-grid-margin,
* + .uk-grid-margin-medium {
  margin-top: 30px;
}
/*
 * Large
 */
/* Horizontal */
.uk-grid-large,
.uk-grid-column-large {
  margin-left: -40px;
}
.uk-grid-large > *,
.uk-grid-column-large > * {
  padding-left: 40px;
}
/* Vertical */
.uk-grid + .uk-grid-large,
.uk-grid + .uk-grid-row-large,
.uk-grid-large > .uk-grid-margin,
.uk-grid-row-large > .uk-grid-margin,
* + .uk-grid-margin-large {
  margin-top: 40px;
}
/* Desktop and bigger */
@media (min-width: 1200px) {
  /* Horizontal */
  .uk-grid-large,
  .uk-grid-column-large {
    margin-left: -70px;
  }
  .uk-grid-large > *,
  .uk-grid-column-large > * {
    padding-left: 70px;
  }
  /* Vertical */
  .uk-grid + .uk-grid-large,
  .uk-grid + .uk-grid-row-large,
  .uk-grid-large > .uk-grid-margin,
  .uk-grid-row-large > .uk-grid-margin,
  * + .uk-grid-margin-large {
    margin-top: 70px;
  }
}
/*
 * Collapse
 */
/* Horizontal */
.uk-grid-collapse,
.uk-grid-column-collapse {
  margin-left: 0;
}
.uk-grid-collapse > *,
.uk-grid-column-collapse > * {
  padding-left: 0;
}
/* Vertical */
.uk-grid + .uk-grid-collapse,
.uk-grid + .uk-grid-row-collapse,
.uk-grid-collapse > .uk-grid-margin,
.uk-grid-row-collapse > .uk-grid-margin {
  margin-top: 0;
}
/* Divider
 ========================================================================== */
.uk-grid-divider > * {
  position: relative;
}
.uk-grid-divider > :not(.uk-first-column)::before {
  content: "";
  position: absolute;
  top: 0;
  bottom: 0;
  border-left: 1px solid #e5e5e5;
}
/* Vertical */
.uk-grid-divider.uk-grid-stack > .uk-grid-margin::before {
  content: "";
  position: absolute;
  left: 0;
  right: 0;
  border-top: 1px solid #e5e5e5;
}
/*
 * Default
 */
/* Horizontal */
.uk-grid-divider {
  margin-left: -60px;
}
.uk-grid-divider > * {
  padding-left: 60px;
}
.uk-grid-divider > :not(.uk-first-column)::before {
  left: 30px;
}
/* Vertical */
.uk-grid-divider.uk-grid-stack > .uk-grid-margin {
  margin-top: 60px;
}
.uk-grid-divider.uk-grid-stack > .uk-grid-margin::before {
  top: -30px;
  left: 60px;
}
/* Desktop and bigger */
@media (min-width: 1200px) {
  /* Horizontal */
  .uk-grid-divider {
    margin-left: -80px;
  }
  .uk-grid-divider > * {
    padding-left: 80px;
  }
  .uk-grid-divider > :not(.uk-first-column)::before {
    left: 40px;
  }
  /* Vertical */
  .uk-grid-divider.uk-grid-stack > .uk-grid-margin {
    margin-top: 80px;
  }
  .uk-grid-divider.uk-grid-stack > .uk-grid-margin::before {
    top: -40px;
    left: 80px;
  }
}
/*
 * Small
 */
/* Horizontal */
.uk-grid-divider.uk-grid-small,
.uk-grid-divider.uk-grid-column-small {
  margin-left: -30px;
}
.uk-grid-divider.uk-grid-small > *,
.uk-grid-divider.uk-grid-column-small > * {
  padding-left: 30px;
}
.uk-grid-divider.uk-grid-small > :not(.uk-first-column)::before,
.uk-grid-divider.uk-grid-column-small > :not(.uk-first-column)::before {
  left: 15px;
}
/* Vertical */
.uk-grid-divider.uk-grid-small.uk-grid-stack > .uk-grid-margin,
.uk-grid-divider.uk-grid-row-small.uk-grid-stack > .uk-grid-margin {
  margin-top: 30px;
}
.uk-grid-divider.uk-grid-small.uk-grid-stack > .uk-grid-margin::before {
  top: -15px;
  left: 30px;
}
.uk-grid-divider.uk-grid-row-small.uk-grid-stack > .uk-grid-margin::before {
  top: -15px;
}
.uk-grid-divider.uk-grid-column-small.uk-grid-stack > .uk-grid-margin::before {
  left: 30px;
}
/*
 * Medium
 */
/* Horizontal */
.uk-grid-divider.uk-grid-medium,
.uk-grid-divider.uk-grid-column-medium {
  margin-left: -60px;
}
.uk-grid-divider.uk-grid-medium > *,
.uk-grid-divider.uk-grid-column-medium > * {
  padding-left: 60px;
}
.uk-grid-divider.uk-grid-medium > :not(.uk-first-column)::before,
.uk-grid-divider.uk-grid-column-medium > :not(.uk-first-column)::before {
  left: 30px;
}
/* Vertical */
.uk-grid-divider.uk-grid-medium.uk-grid-stack > .uk-grid-margin,
.uk-grid-divider.uk-grid-row-medium.uk-grid-stack > .uk-grid-margin {
  margin-top: 60px;
}
.uk-grid-divider.uk-grid-medium.uk-grid-stack > .uk-grid-margin::before {
  top: -30px;
  left: 60px;
}
.uk-grid-divider.uk-grid-row-medium.uk-grid-stack > .uk-grid-margin::before {
  top: -30px;
}
.uk-grid-divider.uk-grid-column-medium.uk-grid-stack > .uk-grid-margin::before {
  left: 60px;
}
/*
 * Large
 */
/* Horizontal */
.uk-grid-divider.uk-grid-large,
.uk-grid-divider.uk-grid-column-large {
  margin-left: -80px;
}
.uk-grid-divider.uk-grid-large > *,
.uk-grid-divider.uk-grid-column-large > * {
  padding-left: 80px;
}
.uk-grid-divider.uk-grid-large > :not(.uk-first-column)::before,
.uk-grid-divider.uk-grid-column-large > :not(.uk-first-column)::before {
  left: 40px;
}
/* Vertical */
.uk-grid-divider.uk-grid-large.uk-grid-stack > .uk-grid-margin,
.uk-grid-divider.uk-grid-row-large.uk-grid-stack > .uk-grid-margin {
  margin-top: 80px;
}
.uk-grid-divider.uk-grid-large.uk-grid-stack > .uk-grid-margin::before {
  top: -40px;
  left: 80px;
}
.uk-grid-divider.uk-grid-row-large.uk-grid-stack > .uk-grid-margin::before {
  top: -40px;
}
.uk-grid-divider.uk-grid-column-large.uk-grid-stack > .uk-grid-margin::before {
  left: 80px;
}
/* Desktop and bigger */
@media (min-width: 1200px) {
  /* Horizontal */
  .uk-grid-divider.uk-grid-large,
  .uk-grid-divider.uk-grid-column-large {
    margin-left: -140px;
  }
  .uk-grid-divider.uk-grid-large > *,
  .uk-grid-divider.uk-grid-column-large > * {
    padding-left: 140px;
  }
  .uk-grid-divider.uk-grid-large > :not(.uk-first-column)::before,
  .uk-grid-divider.uk-grid-column-large > :not(.uk-first-column)::before {
    left: 70px;
  }
  /* Vertical */
  .uk-grid-divider.uk-grid-large.uk-grid-stack > .uk-grid-margin,
  .uk-grid-divider.uk-grid-row-large.uk-grid-stack > .uk-grid-margin {
    margin-top: 140px;
  }
  .uk-grid-divider.uk-grid-large.uk-grid-stack > .uk-grid-margin::before {
    top: -70px;
    left: 140px;
  }
  .uk-grid-divider.uk-grid-row-large.uk-grid-stack > .uk-grid-margin::before {
    top: -70px;
  }
  .uk-grid-divider.uk-grid-column-large.uk-grid-stack > .uk-grid-margin::before {
    left: 140px;
  }
}
/* Match child of a grid cell
 ========================================================================== */
/*
 * Behave like a block element
 * 1. Wrap into the next line
 * 2. Take the full width, at least 100%. Only if no class from the Width component is set.
 * 3. Expand width even if larger than 100%, e.g. because of negative margin (Needed for nested grids)
 */
.uk-grid-match > *,
.uk-grid-item-match {
  display: flex;
  /* 1 */
  flex-wrap: wrap;
}
.uk-grid-match > * > :not([class*='uk-width']),
.uk-grid-item-match > :not([class*='uk-width']) {
  /* 2 */
  box-sizing: border-box;
  width: 100%;
  /* 3 */
  flex: auto;
}
/* ========================================================================
   Component: Nav
 ========================================================================== */
/*
 * Reset
 */
.uk-nav,
.uk-nav ul {
  margin: 0;
  padding: 0;
  list-style: none;
}
/*
* 1. Center content vertically, e.g. an icon
* 2. Imitate white space gap when using flexbox
* 3. Reset link
 */
.uk-nav li > a {
  /* 1 */
  display: flex;
  align-items: center;
  /* 2 */
  column-gap: 0.25em;
  /* 3*/
  text-decoration: none;
}
/*
 * Items
 * Must target `a` elements to exclude other elements (e.g. lists)
 */
.uk-nav > li > a {
  padding: 5px 0;
}
/* Sublists
 ========================================================================== */
/*
 * Level 2
 * `ul` needed for higher specificity to override padding
 */
ul.uk-nav-sub {
  padding: 5px 0 5px 15px;
}
/*
 * Level 3 and deeper
 */
.uk-nav-sub ul {
  padding-left: 15px;
}
/*
 * Items
 */
.uk-nav-sub a {
  padding: 2px 0;
}
/* Parent icon
 ========================================================================== */
.uk-nav-parent-icon {
  margin-left: auto;
}
.uk-nav > li > a[aria-expanded="true"] .uk-nav-parent-icon {
  transform: rotate(180deg);
}
/* Header
 ========================================================================== */
.uk-nav-header {
  padding: 5px 0;
  text-transform: uppercase;
  font-size: 0.875rem;
}
.uk-nav-header:not(:first-child) {
  margin-top: 20px;
}
/* Divider
 ========================================================================== */
.uk-nav .uk-nav-divider {
  margin: 5px 0;
}
/* Default modifier
 ========================================================================== */
.uk-nav-default {
  font-size: 0.875rem;
  line-height: 1.5;
}
/*
 * Items
 */
.uk-nav-default > li > a {
  color: #999;
}
/* Hover */
.uk-nav-default > li > a:hover {
  color: #666;
}
/* Active */
.uk-nav-default > li.uk-active > a {
  color: #333;
}
/*
 * Subtitle
 */
.uk-nav-default .uk-nav-subtitle {
  font-size: 12px;
}
/*
 * Header
 */
.uk-nav-default .uk-nav-header {
  color: #333;
}
/*
 * Divider
 */
.uk-nav-default .uk-nav-divider {
  border-top: 1px solid #e5e5e5;
}
/*
 * Sublists
 */
.uk-nav-default .uk-nav-sub {
  font-size: 0.875rem;
  line-height: 1.5;
}
.uk-nav-default .uk-nav-sub a {
  color: #999;
}
.uk-nav-default .uk-nav-sub a:hover {
  color: #666;
}
.uk-nav-default .uk-nav-sub li.uk-active > a {
  color: #333;
}
/* Primary modifier
 ========================================================================== */
.uk-nav-primary {
  font-size: 1.5rem;
  line-height: 1.5;
}
/*
 * Items
 */
.uk-nav-primary > li > a {
  color: #999;
}
/* Hover */
.uk-nav-primary > li > a:hover {
  color: #666;
}
/* Active */
.uk-nav-primary > li.uk-active > a {
  color: #333;
}
/*
 * Subtitle
 */
.uk-nav-primary .uk-nav-subtitle {
  font-size: 1.25rem;
}
/*
 * Header
 */
.uk-nav-primary .uk-nav-header {
  color: #333;
}
/*
 * Divider
 */
.uk-nav-primary .uk-nav-divider {
  border-top: 1px solid #e5e5e5;
}
/*
 * Sublists
 */
.uk-nav-primary .uk-nav-sub {
  font-size: 1.25rem;
  line-height: 1.5;
}
.uk-nav-primary .uk-nav-sub a {
  color: #999;
}
.uk-nav-primary .uk-nav-sub a:hover {
  color: #666;
}
.uk-nav-primary .uk-nav-sub li.uk-active > a {
  color: #333;
}
/* Secondary modifier
 ========================================================================== */
.uk-nav-secondary {
  font-size: 16px;
  line-height: 1.5;
}
.uk-nav-secondary > :not(.uk-nav-divider) + :not(.uk-nav-header, .uk-nav-divider) {
  margin-top: 0;
}
/*
 * Items
 */
.uk-nav-secondary > li > a {
  color: #333;
  padding: 10px 10px;
}
/* Hover */
.uk-nav-secondary > li > a:hover {
  color: #333;
  background-color: #03406A21;
}
/* Active */
.uk-nav-secondary > li.uk-active > a {
  color: #333;
  background-color: #03406A21;
}
/*
 * Subtitle
 */
.uk-nav-secondary .uk-nav-subtitle {
  font-size: 0.875rem;
  color: #999;
}
/* Hover */
.uk-nav-secondary > li > a:hover .uk-nav-subtitle {
  color: #666;
}
/* Active */
.uk-nav-secondary > li.uk-active > a .uk-nav-subtitle {
  color: #333;
}
/*
 * Header
 */
.uk-nav-secondary .uk-nav-header {
  color: #333;
}
/*
 * Divider
 */
.uk-nav-secondary .uk-nav-divider {
  border-top: 1px solid #e5e5e5;
}
/*
 * Sublists
 */
.uk-nav-secondary .uk-nav-sub {
  font-size: 0.875rem;
  line-height: 1.5;
}
.uk-nav-secondary .uk-nav-sub a {
  color: #999;
}
.uk-nav-secondary .uk-nav-sub a:hover {
  color: #666;
}
.uk-nav-secondary .uk-nav-sub li.uk-active > a {
  color: #333;
}
/* Alignment modifier
 ========================================================================== */
/*
 * 1. Center header
 * 2. Center items
 */
/* 1 */
.uk-nav-center {
  text-align: center;
}
/* 2 */
.uk-nav-center li > a {
  justify-content: center;
}
/* Sublists */
.uk-nav-center .uk-nav-sub,
.uk-nav-center .uk-nav-sub ul {
  padding-left: 0;
}
/* Parent icon  */
.uk-nav-center .uk-nav-parent-icon {
  margin-left: 4px;
}
/* Style modifier
 ========================================================================== */
/*
 * Divider
 * Naming is in plural to prevent conflicts with divider sub object.
 */
.uk-nav.uk-nav-divider > :not(.uk-nav-header, .uk-nav-divider) + :not(.uk-nav-header, .uk-nav-divider) {
  margin-top: 5px;
  padding-top: 5px;
  border-top: 1px solid #e5e5e5;
}
/* ========================================================================
   Component: Navbar
 ========================================================================== */
/*
 * 1. Create position context to center navbar group
 */
.uk-navbar {
  display: flex;
  /* 1 */
  position: relative;
}
/* Container
 ========================================================================== */
.uk-navbar-container:not(.uk-navbar-transparent) {
  background: #03406A21;
}
/* Groups
 ========================================================================== */
/*
 * 1. Align navs and items vertically if they have a different height
 */
.uk-navbar-left,
.uk-navbar-right,
[class*='uk-navbar-center'] {
  display: flex;
  gap: 15px;
  /* 1 */
  align-items: center;
}
/*
 * Horizontal alignment
 * 1. Create position context for centered navbar with sub groups (left/right)
 * 2. Fix text wrapping if content is larger than 50% of the container.
 * 3. Needed for dropdowns because a new position context is created
 *    `z-index` must be smaller than off-canvas
 * 4. Align sub groups for centered navbar
 */
.uk-navbar-right {
  margin-left: auto;
}
.uk-navbar-center:only-child {
  margin-left: auto;
  margin-right: auto;
  /* 1 */
  position: relative;
}
.uk-navbar-center:not(:only-child) {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  /* 2 */
  width: max-content;
  box-sizing: border-box;
  /* 3 */
  z-index: 990;
}
/* 4 */
.uk-navbar-center-left,
.uk-navbar-center-right {
  position: absolute;
  top: 0;
}
.uk-navbar-center-left {
  right: calc(100% + 15px);
}
.uk-navbar-center-right {
  left: calc(100% + 15px);
}
[class*='uk-navbar-center-'] {
  width: max-content;
  box-sizing: border-box;
}
/* Nav
 ========================================================================== */
/*
 * 1. Reset list
 */
.uk-navbar-nav {
  display: flex;
  gap: 15px;
  /* 1 */
  margin: 0;
  padding: 0;
  list-style: none;
}
/*
 * Allow items to wrap into the next line
 * Only not `absolute` positioned groups
 */
.uk-navbar-left,
.uk-navbar-right,
.uk-navbar-center:only-child {
  flex-wrap: wrap;
}
/*
 * Items
 * 1. Center content vertically and horizontally
 * 2. Imitate white space gap when using flexbox
 * 3. Dimensions
 * 4. Style
 * 5. Required for `a`
 */
.uk-navbar-nav > li > a,
.uk-navbar-item,
.uk-navbar-toggle {
  /* 1 */
  display: flex;
  justify-content: center;
  align-items: center;
  /* 2 */
  column-gap: 0.25em;
  /* 3 */
  box-sizing: border-box;
  min-height: 80px;
  /* 4 */
  font-size: 0.875rem;
  font-family: "Fira Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
  /* 5 */
  text-decoration: none;
}
/*
 * Nav items
 */
.uk-navbar-nav > li > a {
  padding: 0 0;
  color: #999;
  text-transform: uppercase;
  transition: 0.1s ease-in-out;
  transition-property: color, background-color;
}
/*
 * Hover
 * Apply hover style also if dropdown is opened
 */
.uk-navbar-nav > li:hover > a,
.uk-navbar-nav > li > a[aria-expanded="true"] {
  color: #666;
}
/* OnClick */
.uk-navbar-nav > li > a:active {
  color: #333;
}
/* Active */
.uk-navbar-nav > li.uk-active > a {
  color: #333;
}
/* Parent icon modifier
 ========================================================================== */
.uk-navbar-parent-icon {
  margin-left: 4px;
}
.uk-navbar-nav > li > a[aria-expanded="true"] .uk-navbar-parent-icon {
  transform: rotate(180deg);
}
/* Item
 ========================================================================== */
.uk-navbar-item {
  padding: 0 0;
  color: #666;
}
/*
 * Remove margin from the last-child
 */
.uk-navbar-item > :last-child {
  margin-bottom: 0;
}
/* Toggle
 ========================================================================== */
.uk-navbar-toggle {
  padding: 0 0;
  color: #999;
}
.uk-navbar-toggle:hover,
.uk-navbar-toggle[aria-expanded="true"] {
  color: #666;
  text-decoration: none;
}
/*
 * Icon
 * Adopts `uk-icon`
 */
/* Hover */
/* Subtitle
 ========================================================================== */
.uk-navbar-subtitle {
  font-size: 0.875rem;
}
/* Justify modifier
 ========================================================================== */
.uk-navbar-justify .uk-navbar-left,
.uk-navbar-justify .uk-navbar-right,
.uk-navbar-justify .uk-navbar-nav,
.uk-navbar-justify .uk-navbar-nav > li,
.uk-navbar-justify .uk-navbar-item,
.uk-navbar-justify .uk-navbar-toggle {
  flex-grow: 1;
}
/* Style modifiers
 ========================================================================== */
/* Dropdown
 ========================================================================== */
/*
 * Adopts `uk-dropdown`
 * 1. Hide by default
 * 2. Set position
 * 3. Set a default width
 * 4. Style
 */
.uk-navbar-dropdown {
  /* 1 */
  display: none;
  /* 2 */
  position: absolute;
  z-index: 1020;
  --uk-position-offset: 15px;
  --uk-position-shift-offset: 0;
  --uk-position-viewport-offset: 15px;
  /* 3 */
  box-sizing: border-box;
  width: 200px;
  /* 4 */
  padding: 25px;
  background: #fff;
  color: #666;
  box-shadow: 0 5px 12px rgba(0, 0, 0, 0.15);
}
/* Show */
.uk-navbar-dropdown.uk-open {
  display: block;
}
/*
 * Remove margin from the last-child
 */
.uk-navbar-dropdown > :last-child {
  margin-bottom: 0;
}
/*
 * Grid
 * Adopts `uk-grid`
 */
/* Gutter Horizontal */
.uk-navbar-dropdown-grid {
  margin-left: -30px;
}
.uk-navbar-dropdown-grid > * {
  padding-left: 30px;
}
/* Gutter Vertical */
.uk-navbar-dropdown-grid > .uk-grid-margin {
  margin-top: 30px;
}
/* Stack */
.uk-navbar-dropdown-stack .uk-navbar-dropdown-grid > * {
  width: 100% !important;
}
/*
 * Width modifier
 */
.uk-navbar-dropdown-width-2:not(.uk-navbar-dropdown-stack) {
  width: 400px;
}
.uk-navbar-dropdown-width-3:not(.uk-navbar-dropdown-stack) {
  width: 600px;
}
.uk-navbar-dropdown-width-4:not(.uk-navbar-dropdown-stack) {
  width: 800px;
}
.uk-navbar-dropdown-width-5:not(.uk-navbar-dropdown-stack) {
  width: 1000px;
}
/*
 * Size modifier
 */
.uk-navbar-dropdown-large {
  --uk-position-shift-offset: 0;
  padding: 40px;
}
/*
 * Dropbar modifier
 * 1. Reset dropdown width to prevent to early shifting
 * 2. Reset style
 * 3. Padding
 */
.uk-navbar-dropdown-dropbar {
  /* 1 */
  width: auto;
  /* 2 */
  background: transparent;
  /* 3 */
  padding: 25px 0 25px 0;
  --uk-position-offset: 0;
  --uk-position-shift-offset: 0;
  --uk-position-viewport-offset: 15px;
  box-shadow: none;
}
/* Phone landscape and bigger */
@media (min-width: 640px) {
  .uk-navbar-dropdown-dropbar {
    --uk-position-viewport-offset: 30px;
  }
}
/* Tablet landscape and bigger */
@media (min-width: 960px) {
  .uk-navbar-dropdown-dropbar {
    --uk-position-viewport-offset: 40px;
  }
}
.uk-navbar-dropdown-dropbar-large {
  --uk-position-shift-offset: 0;
  padding-top: 40px;
  padding-bottom: 40px;
}
/* Dropdown Nav
 * Adopts `uk-nav`
 ========================================================================== */
.uk-navbar-dropdown-nav {
  font-size: 0.875rem;
}
/*
 * Items
 */
.uk-navbar-dropdown-nav > li > a {
  color: #999;
}
/* Hover */
.uk-navbar-dropdown-nav > li > a:hover {
  color: #666;
}
/* Active */
.uk-navbar-dropdown-nav > li.uk-active > a {
  color: #333;
}
/*
 * Subtitle
 */
.uk-navbar-dropdown-nav .uk-nav-subtitle {
  font-size: 12px;
}
/*
 * Header
 */
.uk-navbar-dropdown-nav .uk-nav-header {
  color: #333;
}
/*
 * Divider
 */
.uk-navbar-dropdown-nav .uk-nav-divider {
  border-top: 1px solid #e5e5e5;
}
/*
 * Sublists
 */
.uk-navbar-dropdown-nav .uk-nav-sub a {
  color: #999;
}
.uk-navbar-dropdown-nav .uk-nav-sub a:hover {
  color: #666;
}
.uk-navbar-dropdown-nav .uk-nav-sub li.uk-active > a {
  color: #333;
}
/* Dropbar
 ========================================================================== */
/*
 * 1. Reset dropbar
 * 2. Width
 */
.uk-navbar-dropbar {
  /* 1 */
  display: block !important;
  z-index: 980;
  padding: 0;
  /* 2 */
  left: 0;
  right: 0;
}
/* Tablet landscape and bigger */
@media (min-width: 960px) {
  .uk-navbar-left,
  .uk-navbar-right,
  [class*='uk-navbar-center'] {
    gap: 30px;
  }
  .uk-navbar-center-left {
    right: calc(100% + 30px);
  }
  .uk-navbar-center-right {
    left: calc(100% + 30px);
  }
}
/* Tablet landscape and bigger */
@media (min-width: 960px) {
  .uk-navbar-nav {
    gap: 30px;
  }
}
/* ========================================================================
   Component: Subnav
 ========================================================================== */
/*
 * 1. Allow items to wrap into the next line
 * 2. Center items vertically if they have a different height
 * 3. Gutter
 * 4. Reset list
 */
.uk-subnav {
  display: flex;
  /* 1 */
  flex-wrap: wrap;
  /* 2 */
  align-items: center;
  /* 3 */
  margin-left: -20px;
  /* 4 */
  padding: 0;
  list-style: none;
}
/*
 * 1. Space is allocated solely based on content dimensions: 0 0 auto
 * 2. Gutter
 * 3. Create position context for dropdowns
 */
.uk-subnav > * {
  /* 1 */
  flex: none;
  /* 2 */
  padding-left: 20px;
  /* 3 */
  position: relative;
}
/* Items
 ========================================================================== */
/*
 * Items must target `a` elements to exclude other elements (e.g. dropdowns)
 * Using `:first-child` instead of `a` to support `span` elements for text
 * 1. Center content vertically, e.g. an icon
 * 2. Imitate white space gap when using flexbox
 * 3. Style
 */
.uk-subnav > * > :first-child {
  /* 1 */
  display: flex;
  align-items: center;
  /* 2 */
  column-gap: 0.25em;
  /* 3 */
  color: #999;
  font-size: 0.875rem;
  text-transform: uppercase;
  transition: 0.1s ease-in-out;
  transition-property: color, background-color;
}
/* Hover */
.uk-subnav > * > a:hover {
  color: #666;
  text-decoration: none;
}
/* Active */
.uk-subnav > .uk-active > a {
  color: #333;
}
/* Parent icon modifier
 ========================================================================== */
.uk-subnav-parent-icon {
  margin-left: 4px;
}
.uk-subnav > li > a[aria-expanded="true"] .uk-subnav-parent-icon {
  transform: rotate(180deg);
}
/* Divider modifier
 ========================================================================== */
/*
 * Set gutter
 */
.uk-subnav-divider {
  margin-left: -41px;
}
/*
 * Align items and divider vertically
 */
.uk-subnav-divider > * {
  display: flex;
  align-items: center;
}
/*
 * Divider
 * 1. `nth-child` makes it also work without JS if it's only one row
 */
.uk-subnav-divider > ::before {
  content: "";
  height: 1.5em;
  margin-left: 0px;
  margin-right: 20px;
  border-left: 1px solid transparent;
}
/* 1 */
.uk-subnav-divider > :nth-child(n+2):not(.uk-first-column)::before {
  border-left-color: #e5e5e5;
}
/* Pill modifier
 ========================================================================== */
.uk-subnav-pill > * > :first-child {
  padding: 5px 10px;
  background: transparent;
  color: #999;
}
/* Hover */
.uk-subnav-pill > * > a:hover {
  background-color: #03406A21;
  color: #666;
}
/* OnClick */
.uk-subnav-pill > * > a:active {
  background-color: #03406A21;
  color: #666;
}
/* Active */
.uk-subnav-pill > .uk-active > a {
  background-color: #03406A;
  color: #fff;
}
/* Disabled
 * The same for all style modifiers
 ========================================================================== */
.uk-subnav > .uk-disabled > a {
  color: #999;
}
/* ========================================================================
   Component: Breadcrumb
 ========================================================================== */
/*
 * Reset list
 */
.uk-breadcrumb {
  padding: 0;
  list-style: none;
}
/*
 * 1. Doesn't generate any box and replaced by child boxes
 */
.uk-breadcrumb > * {
  display: contents;
}
/* Items
 ========================================================================== */
.uk-breadcrumb > * > * {
  font-size: 0.875rem;
  color: #999;
}
/* Hover */
.uk-breadcrumb > * > :hover {
  color: #666;
  text-decoration: none;
}
/* Disabled */
/* Active */
.uk-breadcrumb > :last-child > span,
.uk-breadcrumb > :last-child > a:not([href]) {
  color: #666;
}
/*
 * Divider
 * `nth-child` makes it also work without JS if it's only one row
 * 1. Remove space between inline block elements.
 * 2. Style
 */
.uk-breadcrumb > :nth-child(n+2):not(.uk-first-column)::before {
  content: "/";
  display: inline-block;
  /* 1 */
  margin: 0 20px 0 calc(20px - 4px);
  /* 2 */
  font-size: 0.875rem;
  color: #999;
}
/* ========================================================================
   Component: Pagination
 ========================================================================== */
/*
 * 1. Allow items to wrap into the next line
 * 2. Gutter
 * 3. Reset list
 */
.uk-pagination {
  display: flex;
  /* 1 */
  flex-wrap: wrap;
  /* 2 */
  margin-left: 0;
  /* 3 */
  padding: 0;
  list-style: none;
}
/*
 * 1. Space is allocated solely based on content dimensions: 0 0 auto
 * 2. Gutter
 * 3. Create position context for dropdowns
 */
.uk-pagination > * {
  /* 1 */
  flex: none;
  /* 2 */
  padding-left: 0;
  /* 3 */
  position: relative;
}
/* Items
 ========================================================================== */
/*
 * 1. Prevent gap if child element is `inline-block`, e.g. an icon
 * 2. Style
 */
.uk-pagination > * > * {
  /* 1 */
  display: block;
  /* 2 */
  padding: 5px 10px;
  color: #999;
  transition: color 0.1s ease-in-out;
}
/* Hover */
.uk-pagination > * > :hover {
  color: #666;
  text-decoration: none;
}
/* Active */
.uk-pagination > .uk-active > * {
  color: #666;
}
/* Disabled */
.uk-pagination > .uk-disabled > * {
  color: #999;
}
/* ========================================================================
   Component: Tab
 ========================================================================== */
/*
 * 1. Allow items to wrap into the next line
 * 2. Gutter
 * 3. Reset list
 */
.uk-tab {
  display: flex;
  /* 1 */
  flex-wrap: wrap;
  /* 2 */
  margin-left: -20px;
  /* 3 */
  padding: 0;
  list-style: none;
  position: relative;
}
.uk-tab::before {
  content: "";
  position: absolute;
  bottom: 0;
  left: 20px;
  right: 0;
  border-bottom: 1px solid #e5e5e5;
}
/*
 * 1. Space is allocated solely based on content dimensions: 0 0 auto
 * 2. Gutter
 * 3. Create position context for dropdowns
 */
.uk-tab > * {
  /* 1 */
  flex: none;
  /* 2 */
  padding-left: 20px;
  /* 3 */
  position: relative;
}
/* Items
 ========================================================================== */
/*
 * Items must target `a` elements to exclude other elements (e.g. dropdowns)
 * 1. Center content vertically, e.g. an icon
 * 2. Imitate white space gap when using flexbox
 * 3. Center content if a width is set
 * 4. Style
 */
.uk-tab > * > a {
  /* 1 */
  display: flex;
  align-items: center;
  /* 2 */
  column-gap: 0.25em;
  /* 3 */
  justify-content: center;
  /* 4 */
  padding: 5px 10px;
  color: #999;
  border-bottom: 1px solid transparent;
  font-size: 0.875rem;
  text-transform: uppercase;
  transition: color 0.1s ease-in-out;
}
/* Hover */
.uk-tab > * > a:hover {
  color: #666;
  text-decoration: none;
}
/* Active */
.uk-tab > .uk-active > a {
  color: #333;
  border-color: #03406A;
}
/* Disabled */
.uk-tab > .uk-disabled > a {
  color: #999;
}
/* Position modifier
 ========================================================================== */
/*
 * Bottom
 */
.uk-tab-bottom::before {
  top: 0;
  bottom: auto;
}
.uk-tab-bottom > * > a {
  border-top: 1px solid transparent;
  border-bottom: none;
}
/*
 * Left + Right
 * 1. Reset Gutter
 */
.uk-tab-left,
.uk-tab-right {
  flex-direction: column;
  /* 1 */
  margin-left: 0;
}
/* 1 */
.uk-tab-left > *,
.uk-tab-right > * {
  padding-left: 0;
}
.uk-tab-left::before {
  top: 0;
  bottom: 0;
  left: auto;
  right: 0;
  border-left: 1px solid #e5e5e5;
  border-bottom: none;
}
.uk-tab-right::before {
  top: 0;
  bottom: 0;
  left: 0;
  right: auto;
  border-left: 1px solid #e5e5e5;
  border-bottom: none;
}
.uk-tab-left > * > a {
  justify-content: left;
  border-right: 1px solid transparent;
  border-bottom: none;
}
.uk-tab-right > * > a {
  justify-content: left;
  border-left: 1px solid transparent;
  border-bottom: none;
}
.uk-tab .uk-dropdown {
  margin-left: 30px;
}
/* ========================================================================
   Component: Slidenav
 ========================================================================== */
/*
 * Adopts `uk-icon`
 */
.uk-slidenav {
  padding: 5px 10px;
  color: rgba(102, 102, 102, 0.5);
  transition: color 0.1s ease-in-out;
}
/* Hover */
.uk-slidenav:hover {
  color: rgba(102, 102, 102, 0.9);
}
/* OnClick */
.uk-slidenav:active {
  color: rgba(102, 102, 102, 0.5);
}
/* Icon modifier
 ========================================================================== */
/*
 * Previous
 */
/*
 * Next
 */
/* Size modifier
 ========================================================================== */
.uk-slidenav-large {
  padding: 10px 10px;
}
/* Container
 ========================================================================== */
.uk-slidenav-container {
  display: flex;
}
/* ========================================================================
   Component: Dotnav
 ========================================================================== */
/*
 * 1. Allow items to wrap into the next line
 * 2. Reset list
 * 3. Gutter
 */
.uk-dotnav {
  display: flex;
  /* 1 */
  flex-wrap: wrap;
  /* 2 */
  margin: 0;
  padding: 0;
  list-style: none;
  /* 3 */
  margin-left: -12px;
}
/*
 * 1. Space is allocated solely based on content dimensions: 0 0 auto
 * 2. Gutter
 */
.uk-dotnav > * {
  /* 1 */
  flex: none;
  /* 2 */
  padding-left: 12px;
}
/* Items
 ========================================================================== */
/*
 * Items
 * 1. Hide text if present
 */
.uk-dotnav > * > * {
  display: block;
  box-sizing: border-box;
  width: 10px;
  height: 10px;
  border-radius: 50%;
  background: transparent;
  /* 1 */
  text-indent: 100%;
  overflow: hidden;
  white-space: nowrap;
  border: 1px solid rgba(102, 102, 102, 0.4);
  transition: 0.2s ease-in-out;
  transition-property: background-color, border-color;
}
/* Hover */
.uk-dotnav > * > :hover {
  background-color: rgba(102, 102, 102, 0.6);
  border-color: transparent;
}
/* OnClick */
.uk-dotnav > * > :active {
  background-color: rgba(102, 102, 102, 0.2);
  border-color: transparent;
}
/* Active */
.uk-dotnav > .uk-active > * {
  background-color: rgba(102, 102, 102, 0.6);
  border-color: transparent;
}
/* Modifier: 'uk-dotnav-vertical'
 ========================================================================== */
/*
 * 1. Change direction
 * 2. Gutter
 */
.uk-dotnav-vertical {
  /* 1 */
  flex-direction: column;
  /* 2 */
  margin-left: 0;
  margin-top: -12px;
}
/* 2 */
.uk-dotnav-vertical > * {
  padding-left: 0;
  padding-top: 12px;
}
/* ========================================================================
   Component: Thumbnav
 ========================================================================== */
/*
 * 1. Allow items to wrap into the next line
 * 2. Reset list
 * 3. Gutter
 */
.uk-thumbnav {
  display: flex;
  /* 1 */
  flex-wrap: wrap;
  /* 2 */
  margin: 0;
  padding: 0;
  list-style: none;
  /* 3 */
  margin-left: -15px;
}
/*
 * Space is allocated based on content dimensions, but shrinks: 0 1 auto
 * 1. Gutter
 */
.uk-thumbnav > * {
  /* 1 */
  padding-left: 15px;
}
/* Items
 ========================================================================== */
/*
 * Items
 */
.uk-thumbnav > * > * {
  display: inline-block;
  position: relative;
}
.uk-thumbnav > * > *::after {
  content: "";
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background-image: linear-gradient(180deg, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0.4));
  transition: opacity 0.1s ease-in-out;
}
/* Hover */
.uk-thumbnav > * > :hover::after {
  opacity: 0;
}
/* Active */
.uk-thumbnav > .uk-active > *::after {
  opacity: 0;
}
/* Modifier: 'uk-thumbnav-vertical'
 ========================================================================== */
/*
 * 1. Change direction
 * 2. Gutter
 */
.uk-thumbnav-vertical {
  /* 1 */
  flex-direction: column;
  /* 2 */
  margin-left: 0;
  margin-top: -15px;
}
/* 2 */
.uk-thumbnav-vertical > * {
  padding-left: 0;
  padding-top: 15px;
}
/* ========================================================================
   Component: Iconnav
 ========================================================================== */
/*
 * 1. Allow items to wrap into the next line
 * 2. Reset list
 * 3. Gutter
 */
.uk-iconnav {
  display: flex;
  /* 1 */
  flex-wrap: wrap;
  /* 2 */
  margin: 0;
  padding: 0;
  list-style: none;
  /* 3 */
  margin-left: -10px;
}
/*
 * Space is allocated based on content dimensions, but shrinks: 0 1 auto
 * 1. Gutter
 */
.uk-iconnav > * {
  /* 1 */
  padding-left: 10px;
}
/* Items
 ========================================================================== */
/*
 * Items must target `a` elements to exclude other elements (e.g. dropdowns)
 * 1. Center content vertically if there is still some text
 * 2. Imitate white space gap when using flexbox
 * 3. Force text not to affect item height
 * 4. Style
 * 5. Required for `a` if there is still some text
 */
.uk-iconnav > * > a {
  /* 1 */
  display: flex;
  align-items: center;
  /* 2 */
  column-gap: 0.25em;
  /* 3 */
  line-height: 0;
  /* 4 */
  color: #999;
  /* 5 */
  text-decoration: none;
  font-size: 0.875rem;
  transition: 0.1s ease-in-out;
  transition-property: color, background-color;
}
/* Hover */
.uk-iconnav > * > a:hover {
  color: #666;
}
/* Active */
.uk-iconnav > .uk-active > a {
  color: #666;
}
/* Modifier: 'uk-iconnav-vertical'
 ========================================================================== */
/*
 * 1. Change direction
 * 2. Gutter
 */
.uk-iconnav-vertical {
  /* 1 */
  flex-direction: column;
  /* 2 */
  margin-left: 0;
  margin-top: -10px;
}
/* 2 */
.uk-iconnav-vertical > * {
  padding-left: 0;
  padding-top: 10px;
}
/* ========================================================================
   Component: Dropdown
 ========================================================================== */
/*
 * 1. Hide by default
 * 2. Set position
 * 3. Set a default width
 * 4. Style
 */
.uk-dropdown {
  /* 1 */
  display: none;
  /* 2 */
  position: absolute;
  z-index: 1020;
  --uk-position-offset: 10px;
  --uk-position-viewport-offset: 15px;
  /* 3 */
  box-sizing: border-box;
  min-width: 200px;
  /* 4 */
  padding: 25px;
  background: #fff;
  color: #666;
  box-shadow: 0 5px 12px rgba(0, 0, 0, 0.15);
}
/* Show */
.uk-dropdown.uk-open {
  display: block;
}
/*
 * Remove margin from the last-child
 */
.uk-dropdown > :last-child {
  margin-bottom: 0;
}
/* Size modifier
 ========================================================================== */
.uk-dropdown-large {
  padding: 40px;
}
/* Nav
 * Adopts `uk-nav`
 ========================================================================== */
.uk-dropdown-nav {
  font-size: 0.875rem;
}
/*
 * Items
 */
.uk-dropdown-nav > li > a {
  color: #999;
}
/* Hover + Active */
.uk-dropdown-nav > li > a:hover,
.uk-dropdown-nav > li.uk-active > a {
  color: #666;
}
/*
 * Subtitle
 */
.uk-dropdown-nav .uk-nav-subtitle {
  font-size: 12px;
}
/*
 * Header
 */
.uk-dropdown-nav .uk-nav-header {
  color: #333;
}
/*
 * Divider
 */
.uk-dropdown-nav .uk-nav-divider {
  border-top: 1px solid #e5e5e5;
}
/*
 * Sublists
 */
.uk-dropdown-nav .uk-nav-sub a {
  color: #999;
}
.uk-dropdown-nav .uk-nav-sub a:hover,
.uk-dropdown-nav .uk-nav-sub li.uk-active > a {
  color: #666;
}
/* Grid modifiers
 ========================================================================== */
.uk-dropdown-stack .uk-dropdown-grid > * {
  width: 100% !important;
}
/* ========================================================================
   Component: Lightbox
 ========================================================================== */
/*
 * 1. Hide by default
 * 2. Set position
 * 3. Allow scrolling for the modal dialog
 * 4. Horizontal padding
 * 5. Mask the background page
 * 6. Fade-in transition
 * 7. Prevent cancellation of pointer events while dragging
 */
.uk-lightbox {
  /* 1 */
  display: none;
  /* 2 */
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 1010;
  /* 5 */
  background: #000;
  /* 6 */
  opacity: 0;
  transition: opacity 0.15s linear;
  /* 7 */
  touch-action: pinch-zoom;
}
/*
 * Open
 * 1. Center child
 * 2. Fade-in
 */
.uk-lightbox.uk-open {
  display: block;
  /* 2 */
  opacity: 1;
}
/*
 * Focus
 */
.uk-lightbox :focus {
  outline-color: rgba(255, 255, 255, 0.7);
}
.uk-lightbox :focus-visible {
  outline-color: rgba(255, 255, 255, 0.7);
}
/* Page
 ========================================================================== */
/*
 * Prevent scrollbars
 */
.uk-lightbox-page {
  overflow: hidden;
}
/* Item
 ========================================================================== */
/*
 * 1. Center child within the viewport
 * 2. Not visible by default
 * 3. Color needed for spinner icon
 * 4. Optimize animation
 * 5. Responsiveness
 *    Using `vh` for `max-height` to fix image proportions after resize in Safari and Opera
 */
.uk-lightbox-items > * {
  /* 1 */
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  /* 2 */
  display: none;
  justify-content: center;
  align-items: center;
  /* 3 */
  color: rgba(255, 255, 255, 0.7);
  /* 4 */
  will-change: transform, opacity;
}
/* 5 */
.uk-lightbox-items > * > * {
  max-width: 100vw;
  max-height: 100vh;
}
.uk-lightbox-items > * > :not(iframe) {
  width: auto;
  height: auto;
}
.uk-lightbox-items > .uk-active {
  display: flex;
}
/* Toolbar
 ========================================================================== */
.uk-lightbox-toolbar {
  padding: 10px 10px;
  background: rgba(0, 0, 0, 0.3);
  color: rgba(255, 255, 255, 0.7);
}
.uk-lightbox-toolbar > * {
  color: rgba(255, 255, 255, 0.7);
}
/* Toolbar Icon (Close)
 ========================================================================== */
.uk-lightbox-toolbar-icon {
  padding: 5px;
  color: rgba(255, 255, 255, 0.7);
}
/*
 * Hover
 */
.uk-lightbox-toolbar-icon:hover {
  color: #fff;
}
/* Button (Slidenav)
 ========================================================================== */
/*
 * 1. Center icon vertically and horizontally
 */
.uk-lightbox-button {
  box-sizing: border-box;
  width: 50px;
  height: 50px;
  background: rgba(0, 0, 0, 0.3);
  color: rgba(255, 255, 255, 0.7);
  /* 1 */
  display: inline-flex;
  justify-content: center;
  align-items: center;
}
/* Hover */
.uk-lightbox-button:hover {
  color: #fff;
}
/* OnClick */
/* Caption
 ========================================================================== */
.uk-lightbox-caption:empty {
  display: none;
}
/* Iframe
 ========================================================================== */
.uk-lightbox-iframe {
  width: 80%;
  height: 80%;
}
/* ========================================================================
   Component: Animation
 ========================================================================== */
[class*='uk-animation-'] {
  animation: 0.5s ease-out both;
}
/* Animations
 ========================================================================== */
/*
 * Fade
 */
.uk-animation-fade {
  animation-name: uk-fade;
  animation-duration: 0.8s;
  animation-timing-function: linear;
}
/*
 * Scale
 */
.uk-animation-scale-up {
  animation-name: uk-fade, uk-scale-up;
}
.uk-animation-scale-down {
  animation-name: uk-fade, uk-scale-down;
}
/*
 * Slide
 */
.uk-animation-slide-top {
  animation-name: uk-fade, uk-slide-top;
}
.uk-animation-slide-bottom {
  animation-name: uk-fade, uk-slide-bottom;
}
.uk-animation-slide-left {
  animation-name: uk-fade, uk-slide-left;
}
.uk-animation-slide-right {
  animation-name: uk-fade, uk-slide-right;
}
/*
 * Slide Small
 */
.uk-animation-slide-top-small {
  animation-name: uk-fade, uk-slide-top-small;
}
.uk-animation-slide-bottom-small {
  animation-name: uk-fade, uk-slide-bottom-small;
}
.uk-animation-slide-left-small {
  animation-name: uk-fade, uk-slide-left-small;
}
.uk-animation-slide-right-small {
  animation-name: uk-fade, uk-slide-right-small;
}
/*
 * Slide Medium
 */
.uk-animation-slide-top-medium {
  animation-name: uk-fade, uk-slide-top-medium;
}
.uk-animation-slide-bottom-medium {
  animation-name: uk-fade, uk-slide-bottom-medium;
}
.uk-animation-slide-left-medium {
  animation-name: uk-fade, uk-slide-left-medium;
}
.uk-animation-slide-right-medium {
  animation-name: uk-fade, uk-slide-right-medium;
}
/*
 * Kenburns
 */
.uk-animation-kenburns {
  animation-name: uk-kenburns;
  animation-duration: 15s;
}
/*
 * Shake
 */
.uk-animation-shake {
  animation-name: uk-shake;
}
/*
 * SVG Stroke
 * The `--uk-animation-stroke` custom property contains the longest path length.
 * Set it manually or use `uk-svg="stroke-animation: true"` to set it automatically.
 * All strokes are animated by the same pace and doesn't end simultaneously.
 * To end simultaneously, `pathLength="1"` could be used, but it's not working in Safari yet.
 */
.uk-animation-stroke {
  animation-name: uk-stroke;
  animation-duration: 2s;
  stroke-dasharray: var(--uk-animation-stroke);
}
/* Direction modifier
 ========================================================================== */
.uk-animation-reverse {
  animation-direction: reverse;
  animation-timing-function: ease-in;
}
/* Duration modifier
 ========================================================================== */
.uk-animation-fast {
  animation-duration: 0.1s;
}
/* Toggle animation based on the State of the Parent Element
 ========================================================================== */
.uk-animation-toggle:not(:hover):not(:focus) [class*='uk-animation-'] {
  animation-name: none;
}
/* Keyframes used by animation classes
 ========================================================================== */
/*
 * Fade
 */
@keyframes uk-fade {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}
/*
 * Scale
 */
@keyframes uk-scale-up {
  0% {
    transform: scale(0.9);
  }
  100% {
    transform: scale(1);
  }
}
@keyframes uk-scale-down {
  0% {
    transform: scale(1.1);
  }
  100% {
    transform: scale(1);
  }
}
/*
 * Slide
 */
@keyframes uk-slide-top {
  0% {
    transform: translateY(-100%);
  }
  100% {
    transform: translateY(0);
  }
}
@keyframes uk-slide-bottom {
  0% {
    transform: translateY(100%);
  }
  100% {
    transform: translateY(0);
  }
}
@keyframes uk-slide-left {
  0% {
    transform: translateX(-100%);
  }
  100% {
    transform: translateX(0);
  }
}
@keyframes uk-slide-right {
  0% {
    transform: translateX(100%);
  }
  100% {
    transform: translateX(0);
  }
}
/*
 * Slide Small
 */
@keyframes uk-slide-top-small {
  0% {
    transform: translateY(-10px);
  }
  100% {
    transform: translateY(0);
  }
}
@keyframes uk-slide-bottom-small {
  0% {
    transform: translateY(10px);
  }
  100% {
    transform: translateY(0);
  }
}
@keyframes uk-slide-left-small {
  0% {
    transform: translateX(-10px);
  }
  100% {
    transform: translateX(0);
  }
}
@keyframes uk-slide-right-small {
  0% {
    transform: translateX(10px);
  }
  100% {
    transform: translateX(0);
  }
}
/*
 * Slide Medium
 */
@keyframes uk-slide-top-medium {
  0% {
    transform: translateY(-50px);
  }
  100% {
    transform: translateY(0);
  }
}
@keyframes uk-slide-bottom-medium {
  0% {
    transform: translateY(50px);
  }
  100% {
    transform: translateY(0);
  }
}
@keyframes uk-slide-left-medium {
  0% {
    transform: translateX(-50px);
  }
  100% {
    transform: translateX(0);
  }
}
@keyframes uk-slide-right-medium {
  0% {
    transform: translateX(50px);
  }
  100% {
    transform: translateX(0);
  }
}
/*
 * Kenburns
 */
@keyframes uk-kenburns {
  0% {
    transform: scale(1);
  }
  100% {
    transform: scale(1.2);
  }
}
/*
 * Shake
 */
@keyframes uk-shake {
  0%,
  100% {
    transform: translateX(0);
  }
  10% {
    transform: translateX(-9px);
  }
  20% {
    transform: translateX(8px);
  }
  30% {
    transform: translateX(-7px);
  }
  40% {
    transform: translateX(6px);
  }
  50% {
    transform: translateX(-5px);
  }
  60% {
    transform: translateX(4px);
  }
  70% {
    transform: translateX(-3px);
  }
  80% {
    transform: translateX(2px);
  }
  90% {
    transform: translateX(-1px);
  }
}
/*
 * Stroke
 */
@keyframes uk-stroke {
  0% {
    stroke-dashoffset: var(--uk-animation-stroke);
  }
  100% {
    stroke-dashoffset: 0;
  }
}
/* ========================================================================
   Component: Width
 ========================================================================== */
/* Equal child widths
 ========================================================================== */
[class*='uk-child-width'] > * {
  box-sizing: border-box;
  width: 100%;
}
.uk-child-width-1-2 > * {
  width: 50%;
}
.uk-child-width-1-3 > * {
  width: calc(100% * 1 / 3.001);
}
.uk-child-width-1-4 > * {
  width: 25%;
}
.uk-child-width-1-5 > * {
  width: 20%;
}
.uk-child-width-1-6 > * {
  width: calc(100% * 1 / 6.001);
}
.uk-child-width-auto > * {
  width: auto;
}
/*
 * 1. Reset the `min-width`, which is set to auto by default, because
 *    flex items won't shrink below their minimum intrinsic content size.
 *    Using `1px` instead of `0`, so items still wrap into the next line,
 *    if they have zero width and padding and the predecessor is 100% wide.
 */
.uk-child-width-expand > :not([class*='uk-width']) {
  flex: 1;
  /* 1 */
  min-width: 1px;
}
/* Phone landscape and bigger */
@media (min-width: 640px) {
  .uk-child-width-1-1\@s > * {
    width: 100%;
  }
  .uk-child-width-1-2\@s > * {
    width: 50%;
  }
  .uk-child-width-1-3\@s > * {
    width: calc(100% * 1 / 3.001);
  }
  .uk-child-width-1-4\@s > * {
    width: 25%;
  }
  .uk-child-width-1-5\@s > * {
    width: 20%;
  }
  .uk-child-width-1-6\@s > * {
    width: calc(100% * 1 / 6.001);
  }
  .uk-child-width-auto\@s > * {
    width: auto;
  }
  .uk-child-width-expand\@s > :not([class*='uk-width']) {
    flex: 1;
    min-width: 1px;
  }
}
/* Tablet landscape and bigger */
@media (min-width: 960px) {
  .uk-child-width-1-1\@m > * {
    width: 100%;
  }
  .uk-child-width-1-2\@m > * {
    width: 50%;
  }
  .uk-child-width-1-3\@m > * {
    width: calc(100% * 1 / 3.001);
  }
  .uk-child-width-1-4\@m > * {
    width: 25%;
  }
  .uk-child-width-1-5\@m > * {
    width: 20%;
  }
  .uk-child-width-1-6\@m > * {
    width: calc(100% * 1 / 6.001);
  }
  .uk-child-width-auto\@m > * {
    width: auto;
  }
  .uk-child-width-expand\@m > :not([class*='uk-width']) {
    flex: 1;
    min-width: 1px;
  }
}
/* Desktop and bigger */
@media (min-width: 1200px) {
  .uk-child-width-1-1\@l > * {
    width: 100%;
  }
  .uk-child-width-1-2\@l > * {
    width: 50%;
  }
  .uk-child-width-1-3\@l > * {
    width: calc(100% * 1 / 3.001);
  }
  .uk-child-width-1-4\@l > * {
    width: 25%;
  }
  .uk-child-width-1-5\@l > * {
    width: 20%;
  }
  .uk-child-width-1-6\@l > * {
    width: calc(100% * 1 / 6.001);
  }
  .uk-child-width-auto\@l > * {
    width: auto;
  }
  .uk-child-width-expand\@l > :not([class*='uk-width']) {
    flex: 1;
    min-width: 1px;
  }
}
/* Large screen and bigger */
@media (min-width: 1600px) {
  .uk-child-width-1-1\@xl > * {
    width: 100%;
  }
  .uk-child-width-1-2\@xl > * {
    width: 50%;
  }
  .uk-child-width-1-3\@xl > * {
    width: calc(100% * 1 / 3.001);
  }
  .uk-child-width-1-4\@xl > * {
    width: 25%;
  }
  .uk-child-width-1-5\@xl > * {
    width: 20%;
  }
  .uk-child-width-1-6\@xl > * {
    width: calc(100% * 1 / 6.001);
  }
  .uk-child-width-auto\@xl > * {
    width: auto;
  }
  .uk-child-width-expand\@xl > :not([class*='uk-width']) {
    flex: 1;
    min-width: 1px;
  }
}
/* Single Widths
 ========================================================================== */
/*
 * 1. `max-width` is needed for the pixel-based classes
 */
[class*='uk-width'] {
  box-sizing: border-box;
  width: 100%;
  /* 1 */
  max-width: 100%;
}
/* Halves */
.uk-width-1-2 {
  width: 50%;
}
/* Thirds */
.uk-width-1-3 {
  width: calc(100% * 1 / 3.001);
}
.uk-width-2-3 {
  width: calc(100% * 2 / 3.001);
}
/* Quarters */
.uk-width-1-4 {
  width: 25%;
}
.uk-width-3-4 {
  width: 75%;
}
/* Fifths */
.uk-width-1-5 {
  width: 20%;
}
.uk-width-2-5 {
  width: 40%;
}
.uk-width-3-5 {
  width: 60%;
}
.uk-width-4-5 {
  width: 80%;
}
/* Sixths */
.uk-width-1-6 {
  width: calc(100% * 1 / 6.001);
}
.uk-width-5-6 {
  width: calc(100% * 5 / 6.001);
}
/* Pixel */
.uk-width-small {
  width: 150px;
}
.uk-width-medium {
  width: 300px;
}
.uk-width-large {
  width: 450px;
}
.uk-width-xlarge {
  width: 600px;
}
.uk-width-2xlarge {
  width: 750px;
}
/* Auto */
.uk-width-auto {
  width: auto;
}
/* Expand */
.uk-width-expand {
  flex: 1;
  min-width: 1px;
}
/* Phone landscape and bigger */
@media (min-width: 640px) {
  /* Whole */
  .uk-width-1-1\@s {
    width: 100%;
  }
  /* Halves */
  .uk-width-1-2\@s {
    width: 50%;
  }
  /* Thirds */
  .uk-width-1-3\@s {
    width: calc(100% * 1 / 3.001);
  }
  .uk-width-2-3\@s {
    width: calc(100% * 2 / 3.001);
  }
  /* Quarters */
  .uk-width-1-4\@s {
    width: 25%;
  }
  .uk-width-3-4\@s {
    width: 75%;
  }
  /* Fifths */
  .uk-width-1-5\@s {
    width: 20%;
  }
  .uk-width-2-5\@s {
    width: 40%;
  }
  .uk-width-3-5\@s {
    width: 60%;
  }
  .uk-width-4-5\@s {
    width: 80%;
  }
  /* Sixths */
  .uk-width-1-6\@s {
    width: calc(100% * 1 / 6.001);
  }
  .uk-width-5-6\@s {
    width: calc(100% * 5 / 6.001);
  }
  /* Pixel */
  .uk-width-small\@s {
    width: 150px;
  }
  .uk-width-medium\@s {
    width: 300px;
  }
  .uk-width-large\@s {
    width: 450px;
  }
  .uk-width-xlarge\@s {
    width: 600px;
  }
  .uk-width-2xlarge\@s {
    width: 750px;
  }
  /* Auto */
  .uk-width-auto\@s {
    width: auto;
  }
  /* Expand */
  .uk-width-expand\@s {
    flex: 1;
    min-width: 1px;
  }
}
/* Tablet landscape and bigger */
@media (min-width: 960px) {
  /* Whole */
  .uk-width-1-1\@m {
    width: 100%;
  }
  /* Halves */
  .uk-width-1-2\@m {
    width: 50%;
  }
  /* Thirds */
  .uk-width-1-3\@m {
    width: calc(100% * 1 / 3.001);
  }
  .uk-width-2-3\@m {
    width: calc(100% * 2 / 3.001);
  }
  /* Quarters */
  .uk-width-1-4\@m {
    width: 25%;
  }
  .uk-width-3-4\@m {
    width: 75%;
  }
  /* Fifths */
  .uk-width-1-5\@m {
    width: 20%;
  }
  .uk-width-2-5\@m {
    width: 40%;
  }
  .uk-width-3-5\@m {
    width: 60%;
  }
  .uk-width-4-5\@m {
    width: 80%;
  }
  /* Sixths */
  .uk-width-1-6\@m {
    width: calc(100% * 1 / 6.001);
  }
  .uk-width-5-6\@m {
    width: calc(100% * 5 / 6.001);
  }
  /* Pixel */
  .uk-width-small\@m {
    width: 150px;
  }
  .uk-width-medium\@m {
    width: 300px;
  }
  .uk-width-large\@m {
    width: 450px;
  }
  .uk-width-xlarge\@m {
    width: 600px;
  }
  .uk-width-2xlarge\@m {
    width: 750px;
  }
  /* Auto */
  .uk-width-auto\@m {
    width: auto;
  }
  /* Expand */
  .uk-width-expand\@m {
    flex: 1;
    min-width: 1px;
  }
}
/* Desktop and bigger */
@media (min-width: 1200px) {
  /* Whole */
  .uk-width-1-1\@l {
    width: 100%;
  }
  /* Halves */
  .uk-width-1-2\@l {
    width: 50%;
  }
  /* Thirds */
  .uk-width-1-3\@l {
    width: calc(100% * 1 / 3.001);
  }
  .uk-width-2-3\@l {
    width: calc(100% * 2 / 3.001);
  }
  /* Quarters */
  .uk-width-1-4\@l {
    width: 25%;
  }
  .uk-width-3-4\@l {
    width: 75%;
  }
  /* Fifths */
  .uk-width-1-5\@l {
    width: 20%;
  }
  .uk-width-2-5\@l {
    width: 40%;
  }
  .uk-width-3-5\@l {
    width: 60%;
  }
  .uk-width-4-5\@l {
    width: 80%;
  }
  /* Sixths */
  .uk-width-1-6\@l {
    width: calc(100% * 1 / 6.001);
  }
  .uk-width-5-6\@l {
    width: calc(100% * 5 / 6.001);
  }
  /* Pixel */
  .uk-width-small\@l {
    width: 150px;
  }
  .uk-width-medium\@l {
    width: 300px;
  }
  .uk-width-large\@l {
    width: 450px;
  }
  .uk-width-xlarge\@l {
    width: 600px;
  }
  .uk-width-2xlarge\@l {
    width: 750px;
  }
  /* Auto */
  .uk-width-auto\@l {
    width: auto;
  }
  /* Expand */
  .uk-width-expand\@l {
    flex: 1;
    min-width: 1px;
  }
}
/* Large screen and bigger */
@media (min-width: 1600px) {
  /* Whole */
  .uk-width-1-1\@xl {
    width: 100%;
  }
  /* Halves */
  .uk-width-1-2\@xl {
    width: 50%;
  }
  /* Thirds */
  .uk-width-1-3\@xl {
    width: calc(100% * 1 / 3.001);
  }
  .uk-width-2-3\@xl {
    width: calc(100% * 2 / 3.001);
  }
  /* Quarters */
  .uk-width-1-4\@xl {
    width: 25%;
  }
  .uk-width-3-4\@xl {
    width: 75%;
  }
  /* Fifths */
  .uk-width-1-5\@xl {
    width: 20%;
  }
  .uk-width-2-5\@xl {
    width: 40%;
  }
  .uk-width-3-5\@xl {
    width: 60%;
  }
  .uk-width-4-5\@xl {
    width: 80%;
  }
  /* Sixths */
  .uk-width-1-6\@xl {
    width: calc(100% * 1 / 6.001);
  }
  .uk-width-5-6\@xl {
    width: calc(100% * 5 / 6.001);
  }
  /* Pixel */
  .uk-width-small\@xl {
    width: 150px;
  }
  .uk-width-medium\@xl {
    width: 300px;
  }
  .uk-width-large\@xl {
    width: 450px;
  }
  .uk-width-xlarge\@xl {
    width: 600px;
  }
  .uk-width-2xlarge\@xl {
    width: 750px;
  }
  /* Auto */
  .uk-width-auto\@xl {
    width: auto;
  }
  /* Expand */
  .uk-width-expand\@xl {
    flex: 1;
    min-width: 1px;
  }
}
/* Intrinsic Widths
 ========================================================================== */
.uk-width-max-content {
  width: max-content;
}
.uk-width-min-content {
  width: min-content;
}
/* ========================================================================
   Component: Height
 ========================================================================== */
[class*='uk-height'] {
  box-sizing: border-box;
}
/*
 * Only works if parent element has a height set
 */
.uk-height-1-1 {
  height: 100%;
}
/*
 * Useful to create image teasers
 */
.uk-height-viewport {
  min-height: 100vh;
}
.uk-height-viewport-2 {
  min-height: 200vh;
}
.uk-height-viewport-3 {
  min-height: 300vh;
}
.uk-height-viewport-4 {
  min-height: 400vh;
}
/*
 * Pixel
 * Useful for `overflow: auto`
 */
.uk-height-small {
  height: 150px;
}
.uk-height-medium {
  height: 300px;
}
.uk-height-large {
  height: 450px;
}
.uk-height-max-small {
  max-height: 150px;
}
.uk-height-max-medium {
  max-height: 300px;
}
.uk-height-max-large {
  max-height: 450px;
}
/* ========================================================================
   Component: Text
 ========================================================================== */
/* Style modifiers
 ========================================================================== */
.uk-text-lead {
  font-size: 1.5rem;
  line-height: 1.5;
  color: #333;
}
.uk-text-meta {
  font-size: 0.875rem;
  line-height: 1.4;
  color: #999;
}
.uk-text-meta > a {
  color: #999;
}
.uk-text-meta > a:hover {
  color: #666;
  text-decoration: none;
}
/* Size modifiers
 ========================================================================== */
.uk-text-small {
  font-size: 0.705rem;
  line-height: 1.5;
}
.uk-text-large {
  font-size: 1.5rem;
  line-height: 1.5;
}
.uk-text-default {
  font-size: 16px;
  line-height: 1.5;
}
/* Weight modifier
 ========================================================================== */
.uk-text-light {
  font-weight: 300;
}
.uk-text-normal {
  font-weight: 400;
}
.uk-text-bold {
  font-weight: 700;
}
.uk-text-lighter {
  font-weight: lighter;
}
.uk-text-bolder {
  font-weight: bolder;
}
/* Style modifier
 ========================================================================== */
.uk-text-italic {
  font-style: italic;
}
/* Transform modifier
 ========================================================================== */
.uk-text-capitalize {
  text-transform: capitalize !important;
}
.uk-text-uppercase {
  text-transform: uppercase !important;
}
.uk-text-lowercase {
  text-transform: lowercase !important;
}
/* Decoration modifier
 ========================================================================== */
.uk-text-decoration-none {
  text-decoration: none !important;
}
/* Color modifiers
 ========================================================================== */
.uk-text-muted {
  color: #999 !important;
}
.uk-text-emphasis {
  color: #333 !important;
}
.uk-text-primary {
  color: #03406A !important;
}
.uk-text-secondary {
  color: #222 !important;
}
.uk-text-success {
  color: #32d296 !important;
}
.uk-text-warning {
  color: #faa05a !important;
}
.uk-text-danger {
  color: #ec3434 !important;
}
/* Background modifier
 ========================================================================== */
/*
 * 1. The background clips to the foreground text. Works in all browsers.
 * 2. Default color is set to transparent.
 * 3. Container fits the text
 * 4. Style
 */
.uk-text-background {
  /* 1 */
  -webkit-background-clip: text;
  /* 2 */
  color: transparent !important;
  /* 3 */
  display: inline-block;
  /* 4 */
  background-color: #03406A;
  background-image: linear-gradient(90deg, #03406A 0%, #411ef0 100%);
}
/* Alignment modifiers
 ========================================================================== */
.uk-text-left {
  text-align: left !important;
}
.uk-text-right {
  text-align: right !important;
}
.uk-text-center {
  text-align: center !important;
}
.uk-text-justify {
  text-align: justify !important;
}
/* Phone landscape and bigger */
@media (min-width: 640px) {
  .uk-text-left\@s {
    text-align: left !important;
  }
  .uk-text-right\@s {
    text-align: right !important;
  }
  .uk-text-center\@s {
    text-align: center !important;
  }
}
/* Tablet landscape and bigger */
@media (min-width: 960px) {
  .uk-text-left\@m {
    text-align: left !important;
  }
  .uk-text-right\@m {
    text-align: right !important;
  }
  .uk-text-center\@m {
    text-align: center !important;
  }
}
/* Desktop and bigger */
@media (min-width: 1200px) {
  .uk-text-left\@l {
    text-align: left !important;
  }
  .uk-text-right\@l {
    text-align: right !important;
  }
  .uk-text-center\@l {
    text-align: center !important;
  }
}
/* Large screen and bigger */
@media (min-width: 1600px) {
  .uk-text-left\@xl {
    text-align: left !important;
  }
  .uk-text-right\@xl {
    text-align: right !important;
  }
  .uk-text-center\@xl {
    text-align: center !important;
  }
}
/*
 * Vertical
 */
.uk-text-top {
  vertical-align: top !important;
}
.uk-text-middle {
  vertical-align: middle !important;
}
.uk-text-bottom {
  vertical-align: bottom !important;
}
.uk-text-baseline {
  vertical-align: baseline !important;
}
/* Wrap modifiers
 ========================================================================== */
/*
 * Prevent text from wrapping onto multiple lines
 */
.uk-text-nowrap {
  white-space: nowrap;
}
/*
 * 1. Make sure a max-width is set after which truncation can occur
 * 2. Prevent text from wrapping onto multiple lines, and truncate with an ellipsis
 * 3. Fix for table cells
 */
.uk-text-truncate {
  /* 1 */
  max-width: 100%;
  /* 2 */
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}
/* 2 */
th.uk-text-truncate,
td.uk-text-truncate {
  max-width: 0;
}
/*
 * Wrap long words onto the next line and break them if they are too long to fit.
 * 1. Make it work with table cells in all browsers.
 * Note: Not using `hyphens: auto` because it hyphenates text even if not needed.
 */
.uk-text-break {
  overflow-wrap: break-word;
}
/* 1 */
th.uk-text-break,
td.uk-text-break {
  word-break: break-word;
}
/* ========================================================================
   Component: Column
 ========================================================================== */
[class*='uk-column-'] {
  column-gap: 30px;
}
/* Desktop and bigger */
@media (min-width: 1200px) {
  [class*='uk-column-'] {
    column-gap: 40px;
  }
}
/*
 * Fix image 1px line wrapping into the next column in Chrome
 */
[class*='uk-column-'] img {
  transform: translate3d(0, 0, 0);
}
/* Divider
 ========================================================================== */
/*
 * 1. Double the column gap
 */
.uk-column-divider {
  column-rule: 1px solid #e5e5e5;
  /* 1 */
  column-gap: 60px;
}
/* Desktop and bigger */
@media (min-width: 1200px) {
  .uk-column-divider {
    column-gap: 80px;
  }
}
/* Width modifiers
 ========================================================================== */
.uk-column-1-2 {
  column-count: 2;
}
.uk-column-1-3 {
  column-count: 3;
}
.uk-column-1-4 {
  column-count: 4;
}
.uk-column-1-5 {
  column-count: 5;
}
.uk-column-1-6 {
  column-count: 6;
}
/* Phone landscape and bigger */
@media (min-width: 640px) {
  .uk-column-1-2\@s {
    column-count: 2;
  }
  .uk-column-1-3\@s {
    column-count: 3;
  }
  .uk-column-1-4\@s {
    column-count: 4;
  }
  .uk-column-1-5\@s {
    column-count: 5;
  }
  .uk-column-1-6\@s {
    column-count: 6;
  }
}
/* Tablet landscape and bigger */
@media (min-width: 960px) {
  .uk-column-1-2\@m {
    column-count: 2;
  }
  .uk-column-1-3\@m {
    column-count: 3;
  }
  .uk-column-1-4\@m {
    column-count: 4;
  }
  .uk-column-1-5\@m {
    column-count: 5;
  }
  .uk-column-1-6\@m {
    column-count: 6;
  }
}
/* Desktop and bigger */
@media (min-width: 1200px) {
  .uk-column-1-2\@l {
    column-count: 2;
  }
  .uk-column-1-3\@l {
    column-count: 3;
  }
  .uk-column-1-4\@l {
    column-count: 4;
  }
  .uk-column-1-5\@l {
    column-count: 5;
  }
  .uk-column-1-6\@l {
    column-count: 6;
  }
}
/* Large screen and bigger */
@media (min-width: 1600px) {
  .uk-column-1-2\@xl {
    column-count: 2;
  }
  .uk-column-1-3\@xl {
    column-count: 3;
  }
  .uk-column-1-4\@xl {
    column-count: 4;
  }
  .uk-column-1-5\@xl {
    column-count: 5;
  }
  .uk-column-1-6\@xl {
    column-count: 6;
  }
}
/* Make element span across all columns
 * Does not work in Firefox yet
 ========================================================================== */
.uk-column-span {
  column-span: all;
}
/* ========================================================================
   Component: Cover
 ========================================================================== */
/*
 * Works with iframes and embedded content
 * 1. Use attribute to apply transform instantly. Needed if transform is transitioned.
 * 2. Reset responsiveness for embedded content
 * 3. Center object
 * Note: Percent values on the `top` property only works if this element
 *       is absolute positioned or if the container has a height
 */
/* 1 */
[uk-cover],
[data-uk-cover] {
  /* 2 */
  max-width: none;
  /* 3 */
  position: absolute;
  left: 50%;
  top: 50%;
  --uk-position-translate-x: -50%;
  --uk-position-translate-y: -50%;
  transform: translate(var(--uk-position-translate-x), var(--uk-position-translate-y));
}
iframe[uk-cover],
iframe[data-uk-cover] {
  pointer-events: none;
}
/* Container
 ========================================================================== */
/*
 * 1. Parent container which clips resized object
 * 2. Needed if the child is positioned absolute. See note above
 */
.uk-cover-container {
  /* 1 */
  overflow: hidden;
  /* 2 */
  position: relative;
}
/* ========================================================================
   Component: Background
 ========================================================================== */
/* Color
 ========================================================================== */
.uk-background-default {
  background-color: #fff;
}
.uk-background-muted {
  background-color: #00a0e321;
}
.uk-background-primary {
  background-color: #03406A;
}
.uk-background-secondary {
  background-color: #222;
}
/* Size
 ========================================================================== */
.uk-background-cover,
.uk-background-contain,
.uk-background-width-1-1,
.uk-background-height-1-1 {
  background-position: 50% 50%;
  background-repeat: no-repeat;
}
.uk-background-cover {
  background-size: cover;
}
.uk-background-contain {
  background-size: contain;
}
.uk-background-width-1-1 {
  background-size: 100%;
}
.uk-background-height-1-1 {
  background-size: auto 100%;
}
/* Position
 ========================================================================== */
.uk-background-top-left {
  background-position: 0 0;
}
.uk-background-top-center {
  background-position: 50% 0;
}
.uk-background-top-right {
  background-position: 100% 0;
}
.uk-background-center-left {
  background-position: 0 50%;
}
.uk-background-center-center {
  background-position: 50% 50%;
}
.uk-background-center-right {
  background-position: 100% 50%;
}
.uk-background-bottom-left {
  background-position: 0 100%;
}
.uk-background-bottom-center {
  background-position: 50% 100%;
}
.uk-background-bottom-right {
  background-position: 100% 100%;
}
/* Repeat
 ========================================================================== */
.uk-background-norepeat {
  background-repeat: no-repeat;
}
/* Attachment
 ========================================================================== */
/*
 * 1. Fix bug introduced in Chrome 67: the background image is not visible if any element on the page uses `translate3d`
 */
.uk-background-fixed {
  background-attachment: fixed;
  /* 1 */
  backface-visibility: hidden;
}
/*
 * Exclude touch devices because `fixed` doesn't work on iOS and Android
 */
@media (pointer: coarse) {
  .uk-background-fixed {
    background-attachment: scroll;
  }
}
/* Image
 ========================================================================== */
/* Phone portrait and smaller */
@media (max-width: 639px) {
  .uk-background-image\@s {
    background-image: none !important;
  }
}
/* Phone landscape and smaller */
@media (max-width: 959px) {
  .uk-background-image\@m {
    background-image: none !important;
  }
}
/* Tablet landscape and smaller */
@media (max-width: 1199px) {
  .uk-background-image\@l {
    background-image: none !important;
  }
}
/* Desktop and smaller */
@media (max-width: 1599px) {
  .uk-background-image\@xl {
    background-image: none !important;
  }
}
/* Blend modes
 ========================================================================== */
.uk-background-blend-multiply {
  background-blend-mode: multiply;
}
.uk-background-blend-screen {
  background-blend-mode: screen;
}
.uk-background-blend-overlay {
  background-blend-mode: overlay;
}
.uk-background-blend-darken {
  background-blend-mode: darken;
}
.uk-background-blend-lighten {
  background-blend-mode: lighten;
}
.uk-background-blend-color-dodge {
  background-blend-mode: color-dodge;
}
.uk-background-blend-color-burn {
  background-blend-mode: color-burn;
}
.uk-background-blend-hard-light {
  background-blend-mode: hard-light;
}
.uk-background-blend-soft-light {
  background-blend-mode: soft-light;
}
.uk-background-blend-difference {
  background-blend-mode: difference;
}
.uk-background-blend-exclusion {
  background-blend-mode: exclusion;
}
.uk-background-blend-hue {
  background-blend-mode: hue;
}
.uk-background-blend-saturation {
  background-blend-mode: saturation;
}
.uk-background-blend-color {
  background-blend-mode: color;
}
.uk-background-blend-luminosity {
  background-blend-mode: luminosity;
}
/* ========================================================================
   Component: Align
 ========================================================================== */
/*
 * Default
 */
[class*='uk-align'] {
  display: block;
  margin-bottom: 30px;
}
* + [class*='uk-align'] {
  margin-top: 30px;
}
/*
 * Center
 */
.uk-align-center {
  margin-left: auto;
  margin-right: auto;
}
/*
 * Left/Right
 */
.uk-align-left {
  margin-top: 0;
  margin-right: 30px;
  float: left;
}
.uk-align-right {
  margin-top: 0;
  margin-left: 30px;
  float: right;
}
/* Phone landscape and bigger */
@media (min-width: 640px) {
  .uk-align-left\@s {
    margin-top: 0;
    margin-right: 30px;
    float: left;
  }
  .uk-align-right\@s {
    margin-top: 0;
    margin-left: 30px;
    float: right;
  }
}
/* Tablet landscape and bigger */
@media (min-width: 960px) {
  .uk-align-left\@m {
    margin-top: 0;
    margin-right: 30px;
    float: left;
  }
  .uk-align-right\@m {
    margin-top: 0;
    margin-left: 30px;
    float: right;
  }
}
/* Desktop and bigger */
@media (min-width: 1200px) {
  .uk-align-left\@l {
    margin-top: 0;
    float: left;
  }
  .uk-align-right\@l {
    margin-top: 0;
    float: right;
  }
  .uk-align-left,
  .uk-align-left\@s,
  .uk-align-left\@m,
  .uk-align-left\@l {
    margin-right: 40px;
  }
  .uk-align-right,
  .uk-align-right\@s,
  .uk-align-right\@m,
  .uk-align-right\@l {
    margin-left: 40px;
  }
}
/* Large screen and bigger */
@media (min-width: 1600px) {
  .uk-align-left\@xl {
    margin-top: 0;
    margin-right: 40px;
    float: left;
  }
  .uk-align-right\@xl {
    margin-top: 0;
    margin-left: 40px;
    float: right;
  }
}
/* ========================================================================
   Component: SVG
 ========================================================================== */
/*
 * 1. Fill all SVG elements with the current text color if no `fill` attribute is set
 * 2. Set the fill and stroke color of all SVG elements to the current text color
 */
/* 1 */
.uk-svg,
.uk-svg:not(.uk-preserve) [fill*='#']:not(.uk-preserve) {
  fill: currentcolor;
}
.uk-svg:not(.uk-preserve) [stroke*='#']:not(.uk-preserve) {
  stroke: currentcolor;
}
/*
 * Fix Firefox blurry SVG rendering: https://bugzilla.mozilla.org/show_bug.cgi?id=1046835
 */
.uk-svg {
  transform: translate(0, 0);
}
/* ========================================================================
   Component: Utility
 ========================================================================== */
/* Panel
 ========================================================================== */
.uk-panel {
  display: flow-root;
  position: relative;
  box-sizing: border-box;
}
/*
 * Remove margin from the last-child
 */
.uk-panel > :last-child {
  margin-bottom: 0;
}
/*
 * Scrollable
 */
.uk-panel-scrollable {
  height: 170px;
  padding: 10px;
  border: 1px solid #e5e5e5;
  overflow: auto;
  resize: both;
}
/* Clearfix
 ========================================================================== */
/*
 * 1. `table-cell` is used with `::before` because `table` creates a 1px gap when it becomes a flex item, only in Webkit
 * 2. `table` is used again with `::after` because `clear` only works with block elements.
 * Note: `display: block` with `overflow: hidden` is currently not working in the latest Safari
 */
/* 1 */
.uk-clearfix::before {
  content: "";
  display: table-cell;
}
/* 2 */
.uk-clearfix::after {
  content: "";
  display: table;
  clear: both;
}
/* Float
 ========================================================================== */
/*
 * 1. Prevent content overflow
 */
.uk-float-left {
  float: left;
}
.uk-float-right {
  float: right;
}
/* 1 */
[class*='uk-float-'] {
  max-width: 100%;
}
/* Overfow
 ========================================================================== */
.uk-overflow-hidden {
  overflow: hidden;
}
/*
 * Enable scrollbars if content is clipped
 */
.uk-overflow-auto {
  overflow: auto;
}
.uk-overflow-auto > :last-child {
  margin-bottom: 0;
}
/* Box Sizing
 ========================================================================== */
.uk-box-sizing-content {
  box-sizing: content-box;
}
.uk-box-sizing-border {
  box-sizing: border-box;
}
/* Resize
 ========================================================================== */
.uk-resize {
  resize: both;
}
.uk-resize-horizontal {
  resize: horizontal;
}
.uk-resize-vertical {
  resize: vertical;
}
/* Display
 ========================================================================== */
.uk-display-block {
  display: block !important;
}
.uk-display-inline {
  display: inline !important;
}
.uk-display-inline-block {
  display: inline-block !important;
}
/* Inline
 ========================================================================== */
/*
 * 1. Container fits its content
 * 2. Create position context
 * 3. Prevent content overflow
 * 4. Behave like most inline-block elements
 * 5. Force new layer without creating a new stacking context
 *    to fix 1px glitch when combined with overlays and transitions in Webkit
 * 6. Clip child elements
 */
[class*='uk-inline'] {
  /* 1 */
  display: inline-block;
  /* 2 */
  position: relative;
  /* 3 */
  max-width: 100%;
  /* 4 */
  vertical-align: middle;
  /* 5 */
  -webkit-backface-visibility: hidden;
}
.uk-inline-clip {
  /* 6 */
  overflow: hidden;
}
/* Responsive objects
 ========================================================================== */
/*
 * Preserve original dimensions
 * Because `img, `video`, `canvas` and  `audio` are already responsive by default, see Base component
 */
.uk-preserve-width,
.uk-preserve-width canvas,
.uk-preserve-width img,
.uk-preserve-width svg,
.uk-preserve-width video {
  max-width: none;
}
/*
 * Responsiveness
 * Corrects `max-width` and `max-height` behavior if padding and border are used
 */
.uk-responsive-width,
.uk-responsive-height {
  box-sizing: border-box;
}
/*
 * 1. Set a maximum width. `important` needed to override `uk-preserve-width img`
 * 2. Auto scale the height. Only needed if `height` attribute is present
 */
.uk-responsive-width {
  /* 1 */
  max-width: 100% !important;
  /* 2 */
  height: auto;
}
/*
 * 1. Set a maximum height. Only works if the parent element has a fixed height
 * 2. Auto scale the width. Only needed if `width` attribute is present
 * 3. Reset max-width, which `img, `video`, `canvas` and  `audio` already have by default
 */
.uk-responsive-height {
  /* 1 */
  max-height: 100%;
  /* 2 */
  width: auto;
  /* 3 */
  max-width: none;
}
/*
 * Fix initial iframe width. Without the viewport is expanded on iOS devices
 */
[uk-responsive],
[data-uk-responsive] {
  max-width: 100%;
}
/* Object
 ========================================================================== */
.uk-object-cover {
  object-fit: cover;
}
.uk-object-contain {
  object-fit: contain;
}
.uk-object-fill {
  object-fit: fill;
}
.uk-object-none {
  object-fit: none;
}
.uk-object-scale-down {
  object-fit: scale-down;
}
/*
 * Position
 */
.uk-object-top-left {
  object-position: 0 0;
}
.uk-object-top-center {
  object-position: 50% 0;
}
.uk-object-top-right {
  object-position: 100% 0;
}
.uk-object-center-left {
  object-position: 0 50%;
}
.uk-object-center-center {
  object-position: 50% 50%;
}
.uk-object-center-right {
  object-position: 100% 50%;
}
.uk-object-bottom-left {
  object-position: 0 100%;
}
.uk-object-bottom-center {
  object-position: 50% 100%;
}
.uk-object-bottom-right {
  object-position: 100% 100%;
}
/* Border
 ========================================================================== */
.uk-border-circle {
  border-radius: 50%;
}
.uk-border-pill {
  border-radius: 500px;
}
.uk-border-rounded {
  border-radius: 5px;
}
/*
 * Fix `overflow: hidden` to be ignored with border-radius and CSS transforms in Webkit
 */
.uk-inline-clip[class*='uk-border-'] {
  -webkit-transform: translateZ(0);
}
/* Box-shadow
 ========================================================================== */
.uk-box-shadow-small {
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
}
.uk-box-shadow-medium {
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
}
.uk-box-shadow-large {
  box-shadow: 0 14px 25px rgba(0, 0, 0, 0.16);
}
.uk-box-shadow-xlarge {
  box-shadow: 0 28px 50px rgba(0, 0, 0, 0.16);
}
/*
 * Hover
 */
[class*='uk-box-shadow-hover'] {
  transition: box-shadow 0.1s ease-in-out;
}
.uk-box-shadow-hover-small:hover {
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
}
.uk-box-shadow-hover-medium:hover {
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
}
.uk-box-shadow-hover-large:hover {
  box-shadow: 0 14px 25px rgba(0, 0, 0, 0.16);
}
.uk-box-shadow-hover-xlarge:hover {
  box-shadow: 0 28px 50px rgba(0, 0, 0, 0.16);
}
/* Box-shadow bottom
 ========================================================================== */
/*
 * 1. Set position.
 * 2. Set style
 * 3. Fix shadow being clipped in Safari if container is animated
 */
@supports (filter: blur(0)) {
  .uk-box-shadow-bottom {
    display: inline-block;
    position: relative;
    z-index: 0;
    max-width: 100%;
    vertical-align: middle;
  }
  .uk-box-shadow-bottom::after {
    content: "";
    /* 1 */
    position: absolute;
    bottom: -30px;
    left: 0;
    right: 0;
    z-index: -1;
    /* 2 */
    height: 30px;
    border-radius: 100%;
    background: #444;
    filter: blur(20px);
    /* 3 */
    will-change: filter;
  }
}
/* Drop cap
 ========================================================================== */
/*
 * 1. Firefox doesn't apply `::first-letter` if the first letter is inside child elements
 *    https://bugzilla.mozilla.org/show_bug.cgi?id=214004
 * 2. In Firefox, a floating `::first-letter` doesn't have a line box and there for no `line-height`
 *    https://bugzilla.mozilla.org/show_bug.cgi?id=317933
 */
.uk-dropcap::first-letter,
.uk-dropcap > p:first-of-type::first-letter {
  display: block;
  margin-right: 10px;
  float: left;
  font-size: 4.5em;
  line-height: 1;
  margin-bottom: -2px;
}
/* 2 */
@-moz-document url-prefix() {
  .uk-dropcap::first-letter,
  .uk-dropcap > p:first-of-type::first-letter {
    margin-top: 1.1%;
  }
}
/* Logo
 ========================================================================== */
/*
 * 1. Style
 * 2. Required for `a`
 * 3. Behave like image but can be overridden through flex utility classes
 */
.uk-logo {
  /* 1 */
  font-size: 1.5rem;
  font-family: "Fira Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
  color: #333;
  /* 2 */
  text-decoration: none;
}
/* 3 */
:where(.uk-logo) {
  display: inline-block;
  vertical-align: middle;
}
/* Hover */
.uk-logo:hover {
  color: #333;
  /* 1 */
  text-decoration: none;
}
.uk-logo :where(img, svg, video) {
  display: block;
}
.uk-logo-inverse {
  display: none;
}
/* Disabled State
 ========================================================================== */
.uk-disabled {
  pointer-events: none;
}
/* Drag State
 ========================================================================== */
/*
 * 1. Needed if moving over elements with have their own cursor on hover, e.g. links or buttons
 * 2. Fix dragging over iframes
 */
.uk-drag,
.uk-drag * {
  cursor: move;
}
/* 2 */
.uk-drag iframe {
  pointer-events: none;
}
/* Dragover State
 ========================================================================== */
/*
 * Create a box-shadow when dragging a file over the upload area
 */
.uk-dragover {
  box-shadow: 0 0 20px rgba(100, 100, 100, 0.3);
}
/* Blend modes
 ========================================================================== */
.uk-blend-multiply {
  mix-blend-mode: multiply;
}
.uk-blend-screen {
  mix-blend-mode: screen;
}
.uk-blend-overlay {
  mix-blend-mode: overlay;
}
.uk-blend-darken {
  mix-blend-mode: darken;
}
.uk-blend-lighten {
  mix-blend-mode: lighten;
}
.uk-blend-color-dodge {
  mix-blend-mode: color-dodge;
}
.uk-blend-color-burn {
  mix-blend-mode: color-burn;
}
.uk-blend-hard-light {
  mix-blend-mode: hard-light;
}
.uk-blend-soft-light {
  mix-blend-mode: soft-light;
}
.uk-blend-difference {
  mix-blend-mode: difference;
}
.uk-blend-exclusion {
  mix-blend-mode: exclusion;
}
.uk-blend-hue {
  mix-blend-mode: hue;
}
.uk-blend-saturation {
  mix-blend-mode: saturation;
}
.uk-blend-color {
  mix-blend-mode: color;
}
.uk-blend-luminosity {
  mix-blend-mode: luminosity;
}
/* Transform
========================================================================== */
.uk-transform-center {
  transform: translate(-50%, -50%);
}
/* Transform Origin
========================================================================== */
.uk-transform-origin-top-left {
  transform-origin: 0 0;
}
.uk-transform-origin-top-center {
  transform-origin: 50% 0;
}
.uk-transform-origin-top-right {
  transform-origin: 100% 0;
}
.uk-transform-origin-center-left {
  transform-origin: 0 50%;
}
.uk-transform-origin-center-right {
  transform-origin: 100% 50%;
}
.uk-transform-origin-bottom-left {
  transform-origin: 0 100%;
}
.uk-transform-origin-bottom-center {
  transform-origin: 50% 100%;
}
.uk-transform-origin-bottom-right {
  transform-origin: 100% 100%;
}
/* ========================================================================
   Component: Flex
 ========================================================================== */
.uk-flex {
  display: flex;
}
.uk-flex-inline {
  display: inline-flex;
}
/* Alignment
 ========================================================================== */
/*
 * Align items along the main axis of the current line of the flex container
 * Row: Horizontal
 */
.uk-flex-left {
  justify-content: flex-start;
}
.uk-flex-center {
  justify-content: center;
}
.uk-flex-right {
  justify-content: flex-end;
}
.uk-flex-between {
  justify-content: space-between;
}
.uk-flex-around {
  justify-content: space-around;
}
/* Phone landscape and bigger */
@media (min-width: 640px) {
  .uk-flex-left\@s {
    justify-content: flex-start;
  }
  .uk-flex-center\@s {
    justify-content: center;
  }
  .uk-flex-right\@s {
    justify-content: flex-end;
  }
  .uk-flex-between\@s {
    justify-content: space-between;
  }
  .uk-flex-around\@s {
    justify-content: space-around;
  }
}
/* Tablet landscape and bigger */
@media (min-width: 960px) {
  .uk-flex-left\@m {
    justify-content: flex-start;
  }
  .uk-flex-center\@m {
    justify-content: center;
  }
  .uk-flex-right\@m {
    justify-content: flex-end;
  }
  .uk-flex-between\@m {
    justify-content: space-between;
  }
  .uk-flex-around\@m {
    justify-content: space-around;
  }
}
/* Desktop and bigger */
@media (min-width: 1200px) {
  .uk-flex-left\@l {
    justify-content: flex-start;
  }
  .uk-flex-center\@l {
    justify-content: center;
  }
  .uk-flex-right\@l {
    justify-content: flex-end;
  }
  .uk-flex-between\@l {
    justify-content: space-between;
  }
  .uk-flex-around\@l {
    justify-content: space-around;
  }
}
/* Large screen and bigger */
@media (min-width: 1600px) {
  .uk-flex-left\@xl {
    justify-content: flex-start;
  }
  .uk-flex-center\@xl {
    justify-content: center;
  }
  .uk-flex-right\@xl {
    justify-content: flex-end;
  }
  .uk-flex-between\@xl {
    justify-content: space-between;
  }
  .uk-flex-around\@xl {
    justify-content: space-around;
  }
}
/*
 * Align items in the cross axis of the current line of the flex container
 * Row: Vertical
 */
.uk-flex-stretch {
  align-items: stretch;
}
.uk-flex-top {
  align-items: flex-start;
}
.uk-flex-middle {
  align-items: center;
}
.uk-flex-bottom {
  align-items: flex-end;
}
/* Direction
 ========================================================================== */
.uk-flex-row {
  flex-direction: row;
}
.uk-flex-row-reverse {
  flex-direction: row-reverse;
}
.uk-flex-column {
  flex-direction: column;
}
.uk-flex-column-reverse {
  flex-direction: column-reverse;
}
/* Wrap
 ========================================================================== */
.uk-flex-nowrap {
  flex-wrap: nowrap;
}
.uk-flex-wrap {
  flex-wrap: wrap;
}
.uk-flex-wrap-reverse {
  flex-wrap: wrap-reverse;
}
/*
 * Aligns items within the flex container when there is extra space in the cross-axis
 * Only works if there is more than one line of flex items
 */
.uk-flex-wrap-stretch {
  align-content: stretch;
}
.uk-flex-wrap-top {
  align-content: flex-start;
}
.uk-flex-wrap-middle {
  align-content: center;
}
.uk-flex-wrap-bottom {
  align-content: flex-end;
}
.uk-flex-wrap-between {
  align-content: space-between;
}
.uk-flex-wrap-around {
  align-content: space-around;
}
/* Item ordering
 ========================================================================== */
/*
 * Default is 0
 */
.uk-flex-first {
  order: -1;
}
.uk-flex-last {
  order: 99;
}
/* Phone landscape and bigger */
@media (min-width: 640px) {
  .uk-flex-first\@s {
    order: -1;
  }
  .uk-flex-last\@s {
    order: 99;
  }
}
/* Tablet landscape and bigger */
@media (min-width: 960px) {
  .uk-flex-first\@m {
    order: -1;
  }
  .uk-flex-last\@m {
    order: 99;
  }
}
/* Desktop and bigger */
@media (min-width: 1200px) {
  .uk-flex-first\@l {
    order: -1;
  }
  .uk-flex-last\@l {
    order: 99;
  }
}
/* Large screen and bigger */
@media (min-width: 1600px) {
  .uk-flex-first\@xl {
    order: -1;
  }
  .uk-flex-last\@xl {
    order: 99;
  }
}
/* Item dimensions
 ========================================================================== */
/*
 * Initial: 0 1 auto
 * Content dimensions, but shrinks
 */
/*
 * No Flex: 0 0 auto
 * Content dimensions
 */
.uk-flex-none {
  flex: none;
}
/*
 * Relative Flex: 1 1 auto
 * Space is allocated considering content
 */
.uk-flex-auto {
  flex: auto;
}
/*
 * Absolute Flex: 1 1 0%
 * Space is allocated solely based on flex
 */
.uk-flex-1 {
  flex: 1;
}
/* ========================================================================
   Component: Margin
 ========================================================================== */
/*
 * Default
 */
.uk-margin {
  margin-bottom: 20px;
}
* + .uk-margin {
  margin-top: 20px !important;
}
.uk-margin-top {
  margin-top: 20px !important;
}
.uk-margin-bottom {
  margin-bottom: 20px !important;
}
.uk-margin-left {
  margin-left: 20px !important;
}
.uk-margin-right {
  margin-right: 20px !important;
}
/* Small
 ========================================================================== */
.uk-margin-small {
  margin-bottom: 10px;
}
* + .uk-margin-small {
  margin-top: 10px !important;
}
.uk-margin-small-top {
  margin-top: 10px !important;
}
.uk-margin-small-bottom {
  margin-bottom: 10px !important;
}
.uk-margin-small-left {
  margin-left: 10px !important;
}
.uk-margin-small-right {
  margin-right: 10px !important;
}
/* Medium
 ========================================================================== */
.uk-margin-medium {
  margin-bottom: 40px;
}
* + .uk-margin-medium {
  margin-top: 40px !important;
}
.uk-margin-medium-top {
  margin-top: 40px !important;
}
.uk-margin-medium-bottom {
  margin-bottom: 40px !important;
}
.uk-margin-medium-left {
  margin-left: 40px !important;
}
.uk-margin-medium-right {
  margin-right: 40px !important;
}
/* Large
 ========================================================================== */
.uk-margin-large {
  margin-bottom: 40px;
}
* + .uk-margin-large {
  margin-top: 40px !important;
}
.uk-margin-large-top {
  margin-top: 40px !important;
}
.uk-margin-large-bottom {
  margin-bottom: 40px !important;
}
.uk-margin-large-left {
  margin-left: 40px !important;
}
.uk-margin-large-right {
  margin-right: 40px !important;
}
/* Desktop and bigger */
@media (min-width: 1200px) {
  .uk-margin-large {
    margin-bottom: 70px;
  }
  * + .uk-margin-large {
    margin-top: 70px !important;
  }
  .uk-margin-large-top {
    margin-top: 70px !important;
  }
  .uk-margin-large-bottom {
    margin-bottom: 70px !important;
  }
  .uk-margin-large-left {
    margin-left: 70px !important;
  }
  .uk-margin-large-right {
    margin-right: 70px !important;
  }
}
/* XLarge
 ========================================================================== */
.uk-margin-xlarge {
  margin-bottom: 70px;
}
* + .uk-margin-xlarge {
  margin-top: 70px !important;
}
.uk-margin-xlarge-top {
  margin-top: 70px !important;
}
.uk-margin-xlarge-bottom {
  margin-bottom: 70px !important;
}
.uk-margin-xlarge-left {
  margin-left: 70px !important;
}
.uk-margin-xlarge-right {
  margin-right: 70px !important;
}
/* Desktop and bigger */
@media (min-width: 1200px) {
  .uk-margin-xlarge {
    margin-bottom: 140px;
  }
  * + .uk-margin-xlarge {
    margin-top: 140px !important;
  }
  .uk-margin-xlarge-top {
    margin-top: 140px !important;
  }
  .uk-margin-xlarge-bottom {
    margin-bottom: 140px !important;
  }
  .uk-margin-xlarge-left {
    margin-left: 140px !important;
  }
  .uk-margin-xlarge-right {
    margin-right: 140px !important;
  }
}
/* Auto
 ========================================================================== */
.uk-margin-auto {
  margin-left: auto !important;
  margin-right: auto !important;
}
.uk-margin-auto-top {
  margin-top: auto !important;
}
.uk-margin-auto-bottom {
  margin-bottom: auto !important;
}
.uk-margin-auto-left {
  margin-left: auto !important;
}
.uk-margin-auto-right {
  margin-right: auto !important;
}
.uk-margin-auto-vertical {
  margin-top: auto !important;
  margin-bottom: auto !important;
}
/* Phone landscape and bigger */
@media (min-width: 640px) {
  .uk-margin-auto\@s {
    margin-left: auto !important;
    margin-right: auto !important;
  }
  .uk-margin-auto-left\@s {
    margin-left: auto !important;
  }
  .uk-margin-auto-right\@s {
    margin-right: auto !important;
  }
}
/* Tablet landscape and bigger */
@media (min-width: 960px) {
  .uk-margin-auto\@m {
    margin-left: auto !important;
    margin-right: auto !important;
  }
  .uk-margin-auto-left\@m {
    margin-left: auto !important;
  }
  .uk-margin-auto-right\@m {
    margin-right: auto !important;
  }
}
/* Desktop and bigger */
@media (min-width: 1200px) {
  .uk-margin-auto\@l {
    margin-left: auto !important;
    margin-right: auto !important;
  }
  .uk-margin-auto-left\@l {
    margin-left: auto !important;
  }
  .uk-margin-auto-right\@l {
    margin-right: auto !important;
  }
}
/* Large screen and bigger */
@media (min-width: 1600px) {
  .uk-margin-auto\@xl {
    margin-left: auto !important;
    margin-right: auto !important;
  }
  .uk-margin-auto-left\@xl {
    margin-left: auto !important;
  }
  .uk-margin-auto-right\@xl {
    margin-right: auto !important;
  }
}
/* Remove
 ========================================================================== */
.uk-margin-remove {
  margin: 0 !important;
}
.uk-margin-remove-top {
  margin-top: 0 !important;
}
.uk-margin-remove-bottom {
  margin-bottom: 0 !important;
}
.uk-margin-remove-left {
  margin-left: 0 !important;
}
.uk-margin-remove-right {
  margin-right: 0 !important;
}
.uk-margin-remove-vertical {
  margin-top: 0 !important;
  margin-bottom: 0 !important;
}
.uk-margin-remove-adjacent + *,
.uk-margin-remove-first-child > :first-child {
  margin-top: 0 !important;
}
.uk-margin-remove-last-child > :last-child {
  margin-bottom: 0 !important;
}
/* Phone landscape and bigger */
@media (min-width: 640px) {
  .uk-margin-remove-left\@s {
    margin-left: 0 !important;
  }
  .uk-margin-remove-right\@s {
    margin-right: 0 !important;
  }
}
/* Tablet landscape and bigger */
@media (min-width: 960px) {
  .uk-margin-remove-left\@m {
    margin-left: 0 !important;
  }
  .uk-margin-remove-right\@m {
    margin-right: 0 !important;
  }
}
/* Desktop and bigger */
@media (min-width: 1200px) {
  .uk-margin-remove-left\@l {
    margin-left: 0 !important;
  }
  .uk-margin-remove-right\@l {
    margin-right: 0 !important;
  }
}
/* Large screen and bigger */
@media (min-width: 1600px) {
  .uk-margin-remove-left\@xl {
    margin-left: 0 !important;
  }
  .uk-margin-remove-right\@xl {
    margin-right: 0 !important;
  }
}
/* ========================================================================
   Component: Padding
 ========================================================================== */
.uk-padding {
  padding: 30px;
}
/* Desktop and bigger */
@media (min-width: 1200px) {
  .uk-padding {
    padding: 40px;
  }
}
/* Small
 ========================================================================== */
.uk-padding-small {
  padding: 15px;
}
/* Large
 ========================================================================== */
.uk-padding-large {
  padding: 40px;
}
/* Desktop and bigger */
@media (min-width: 1200px) {
  .uk-padding-large {
    padding: 70px;
  }
}
/* Remove
 ========================================================================== */
.uk-padding-remove {
  padding: 0 !important;
}
.uk-padding-remove-top {
  padding-top: 0 !important;
}
.uk-padding-remove-bottom {
  padding-bottom: 0 !important;
}
.uk-padding-remove-left {
  padding-left: 0 !important;
}
.uk-padding-remove-right {
  padding-right: 0 !important;
}
.uk-padding-remove-vertical {
  padding-top: 0 !important;
  padding-bottom: 0 !important;
}
.uk-padding-remove-horizontal {
  padding-left: 0 !important;
  padding-right: 0 !important;
}
/* ========================================================================
   Component: Position
 ========================================================================== */
:root {
  --uk-position-margin-offset: 0px;
}
/* Directions
 ========================================================================== */
/*
 * 1. Prevent content overflow.
 */
[class*='uk-position-top'],
[class*='uk-position-bottom'],
[class*='uk-position-left'],
[class*='uk-position-right'],
[class*='uk-position-center'] {
  position: absolute !important;
  /* 1 */
  max-width: calc(100% - (var(--uk-position-margin-offset) * 2));
  box-sizing: border-box;
}
/*
 * Edges
 * Don't use `width: 100%` because it's wrong if the parent has padding.
 */
.uk-position-top {
  top: 0;
  left: 0;
  right: 0;
}
.uk-position-bottom {
  bottom: 0;
  left: 0;
  right: 0;
}
.uk-position-left {
  top: 0;
  bottom: 0;
  left: 0;
}
.uk-position-right {
  top: 0;
  bottom: 0;
  right: 0;
}
/*
 * Corners
 */
.uk-position-top-left {
  top: 0;
  left: 0;
}
.uk-position-top-right {
  top: 0;
  right: 0;
}
.uk-position-bottom-left {
  bottom: 0;
  left: 0;
}
.uk-position-bottom-right {
  bottom: 0;
  right: 0;
}
/*
 * Center
 * 1. Fix text wrapping if content is larger than 50% of the container.
 *    Using `max-content` requires `max-width` of 100% which is set generally.
 */
.uk-position-center {
  top: calc(50% - var(--uk-position-margin-offset));
  left: calc(50% - var(--uk-position-margin-offset));
  --uk-position-translate-x: -50%;
  --uk-position-translate-y: -50%;
  transform: translate(var(--uk-position-translate-x), var(--uk-position-translate-y));
  /* 1 */
  width: max-content;
}
/* Vertical */
[class*='uk-position-center-left'],
[class*='uk-position-center-right'] {
  top: calc(50% - var(--uk-position-margin-offset));
  --uk-position-translate-y: -50%;
  transform: translate(0, var(--uk-position-translate-y));
}
.uk-position-center-left {
  left: 0;
}
.uk-position-center-right {
  right: 0;
}
.uk-position-center-left-out {
  right: 100%;
  width: max-content;
}
.uk-position-center-right-out {
  left: 100%;
  width: max-content;
}
/* Horizontal */
.uk-position-top-center,
.uk-position-bottom-center {
  left: calc(50% - var(--uk-position-margin-offset));
  --uk-position-translate-x: -50%;
  transform: translate(var(--uk-position-translate-x), 0);
  /* 1 */
  width: max-content;
}
.uk-position-top-center {
  top: 0;
}
.uk-position-bottom-center {
  bottom: 0;
}
/*
 * Cover
 */
.uk-position-cover {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
}
/* Margin
 ========================================================================== */
.uk-position-small {
  margin: 15px;
  --uk-position-margin-offset: 15px;
}
.uk-position-medium {
  margin: 30px;
  --uk-position-margin-offset: 30px;
}
.uk-position-large {
  margin: 30px;
  --uk-position-margin-offset: 30px;
}
/* Desktop and bigger */
@media (min-width: 1200px) {
  .uk-position-large {
    margin: 50px;
    --uk-position-margin-offset: 50px;
  }
}
/* Schemes
 ========================================================================== */
.uk-position-relative {
  position: relative  !important;
}
.uk-position-absolute {
  position: absolute  !important;
}
.uk-position-fixed {
  position: fixed  !important;
}
.uk-position-sticky {
  position: sticky  !important;
}
/* Layer
 ========================================================================== */
.uk-position-z-index {
  z-index: 1;
}
.uk-position-z-index-zero {
  z-index: 0;
}
.uk-position-z-index-negative {
  z-index: -1;
}
/* ========================================================================
   Component: Transition
 ========================================================================== */
/* Transitions
 ========================================================================== */
/*
 * The toggle is triggered on touch devices by two methods:
 * 1. Using `:focus` and tabindex
 * 2. Using `:hover` and a `touchstart` event listener registered on the document
 *    (Doesn't work on Surface touch devices)
 */
:where(.uk-transition-fade),
:where([class*='uk-transition-scale']),
:where([class*='uk-transition-slide']) {
  --uk-position-translate-x: 0;
  --uk-position-translate-y: 0;
}
.uk-transition-fade,
[class*='uk-transition-scale'],
[class*='uk-transition-slide'] {
  --uk-translate-x: 0;
  --uk-translate-y: 0;
  --uk-scale-x: 1;
  --uk-scale-y: 1;
  transform: translate(var(--uk-position-translate-x), var(--uk-position-translate-y)) translate(var(--uk-translate-x), var(--uk-translate-y)) scale(var(--uk-scale-x), var(--uk-scale-y));
  transition: 0.3s ease-out;
  transition-property: opacity, transform, filter;
  opacity: 0;
}
/*
 * Fade
 */
.uk-transition-toggle:hover .uk-transition-fade,
.uk-transition-toggle:focus .uk-transition-fade,
.uk-transition-toggle .uk-transition-fade:focus-within,
.uk-transition-active.uk-active .uk-transition-fade {
  opacity: 1;
}
/*
 * Scale
 * 1. Make image rendering the same during the transition as before and after. Prefixed because of Safari.
 */
/* 1 */
[class*='uk-transition-scale'] {
  -webkit-backface-visibility: hidden;
}
.uk-transition-scale-up {
  --uk-scale-x: 1;
  --uk-scale-y: 1;
}
.uk-transition-scale-down {
  --uk-scale-x: 1.03;
  --uk-scale-y: 1.03;
}
/* Show */
.uk-transition-toggle:hover .uk-transition-scale-up,
.uk-transition-toggle:focus .uk-transition-scale-up,
.uk-transition-toggle .uk-transition-scale-up:focus-within,
.uk-transition-active.uk-active .uk-transition-scale-up {
  --uk-scale-x: 1.03;
  --uk-scale-y: 1.03;
  opacity: 1;
}
.uk-transition-toggle:hover .uk-transition-scale-down,
.uk-transition-toggle:focus .uk-transition-scale-down,
.uk-transition-toggle .uk-transition-scale-down:focus-within,
.uk-transition-active.uk-active .uk-transition-scale-down {
  --uk-scale-x: 1;
  --uk-scale-y: 1;
  opacity: 1;
}
/*
 * Slide
 */
.uk-transition-slide-top {
  --uk-translate-y: -100%;
}
.uk-transition-slide-bottom {
  --uk-translate-y: 100%;
}
.uk-transition-slide-left {
  --uk-translate-x: -100%;
}
.uk-transition-slide-right {
  --uk-translate-x: 100%;
}
.uk-transition-slide-top-small {
  --uk-translate-y: calc(-1 * 10px);
}
.uk-transition-slide-bottom-small {
  --uk-translate-y: 10px;
}
.uk-transition-slide-left-small {
  --uk-translate-x: calc(-1 * 10px);
}
.uk-transition-slide-right-small {
  --uk-translate-x: 10px;
}
.uk-transition-slide-top-medium {
  --uk-translate-y: calc(-1 * 50px);
}
.uk-transition-slide-bottom-medium {
  --uk-translate-y: 50px;
}
.uk-transition-slide-left-medium {
  --uk-translate-x: calc(-1 * 50px);
}
.uk-transition-slide-right-medium {
  --uk-translate-x: 50px;
}
/* Show */
.uk-transition-toggle:hover [class*='uk-transition-slide'],
.uk-transition-toggle:focus [class*='uk-transition-slide'],
.uk-transition-toggle [class*='uk-transition-slide']:focus-within,
.uk-transition-active.uk-active [class*='uk-transition-slide'] {
  --uk-translate-x: 0;
  --uk-translate-y: 0;
  opacity: 1;
}
/* Opacity modifier
 ========================================================================== */
.uk-transition-opaque {
  opacity: 1;
}
/* Duration modifiers
 ========================================================================== */
.uk-transition-slow {
  transition-duration: 0.7s;
}
/* ========================================================================
   Component: Visibility
 ========================================================================== */
/*
 * Hidden
 * `hidden` attribute also set here to make it stronger
 */
[hidden],
.uk-hidden {
  display: none !important;
}
/* Phone landscape and bigger */
@media (min-width: 640px) {
  .uk-hidden\@s {
    display: none !important;
  }
}
/* Tablet landscape and bigger */
@media (min-width: 960px) {
  .uk-hidden\@m {
    display: none !important;
  }
}
/* Desktop and bigger */
@media (min-width: 1200px) {
  .uk-hidden\@l {
    display: none !important;
  }
}
/* Large screen and bigger */
@media (min-width: 1600px) {
  .uk-hidden\@xl {
    display: none !important;
  }
}
/*
 * Visible
 */
/* Phone portrait and smaller */
@media (max-width: 639px) {
  .uk-visible\@s {
    display: none !important;
  }
}
/* Phone landscape and smaller */
@media (max-width: 959px) {
  .uk-visible\@m {
    display: none !important;
  }
}
/* Tablet landscape and smaller */
@media (max-width: 1199px) {
  .uk-visible\@l {
    display: none !important;
  }
}
/* Desktop and smaller */
@media (max-width: 1599px) {
  .uk-visible\@xl {
    display: none !important;
  }
}
/* Visibility
 ========================================================================== */
.uk-invisible {
  visibility: hidden !important;
}
/* Based on the State of the Parent Element
 ========================================================================== */
/*
 * Can't use `display: none` nor `visibility: hidden` because both are not focusable.
 * The target stays visible if any element within receives focus through keyboard.
 */
/*
 * Discard space when hidden.
 */
.uk-visible-toggle:not(:hover):not(:focus) .uk-hidden-hover:not(:focus-within) {
  position: absolute !important;
  width: 0 !important;
  height: 0 !important;
  padding: 0 !important;
  margin: 0 !important;
  overflow: hidden !important;
}
/*
 * Keep space when hidden.
 */
.uk-visible-toggle:not(:hover):not(:focus) .uk-invisible-hover:not(:focus-within) {
  opacity: 0 !important;
}
/* Based on Hover Capability of the Pointing Device
 ========================================================================== */
/*
 * Hover
 */
/* Hide if primary pointing device doesn't support hover, e.g. touch screens. */
@media (hover: none) {
  .uk-hidden-touch {
    display: none !important;
  }
}
/* Hide if primary pointing device supports hover, e.g. mice. */
@media (hover) {
  .uk-hidden-notouch {
    display: none !important;
  }
}
/* ========================================================================
   Component: Inverse
 ========================================================================== */
/*
 * Implemented class depends on the general theme color
 * `uk-light` is for light colors on dark backgrounds
 * `uk-dark` is or dark colors on light backgrounds
 */
.uk-light,
.uk-section-primary:not(.uk-preserve-color),
.uk-section-secondary:not(.uk-preserve-color),
.uk-tile-primary:not(.uk-preserve-color),
.uk-tile-secondary:not(.uk-preserve-color),
.uk-card-primary.uk-card-body,
.uk-card-primary > :not([class*='uk-card-media']),
.uk-card-secondary.uk-card-body,
.uk-card-secondary > :not([class*='uk-card-media']),
.uk-overlay-primary,
.uk-offcanvas-bar {
  color: rgba(255, 255, 255, 0.7);
}
.uk-light a,
.uk-light .uk-link,
.uk-section-primary:not(.uk-preserve-color) a,
.uk-section-primary:not(.uk-preserve-color) .uk-link,
.uk-section-secondary:not(.uk-preserve-color) a,
.uk-section-secondary:not(.uk-preserve-color) .uk-link,
.uk-tile-primary:not(.uk-preserve-color) a,
.uk-tile-primary:not(.uk-preserve-color) .uk-link,
.uk-tile-secondary:not(.uk-preserve-color) a,
.uk-tile-secondary:not(.uk-preserve-color) .uk-link,
.uk-card-primary.uk-card-body a,
.uk-card-primary.uk-card-body .uk-link,
.uk-card-primary > :not([class*='uk-card-media']) a,
.uk-card-primary > :not([class*='uk-card-media']) .uk-link,
.uk-card-secondary.uk-card-body a,
.uk-card-secondary.uk-card-body .uk-link,
.uk-card-secondary > :not([class*='uk-card-media']) a,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-link,
.uk-overlay-primary a,
.uk-overlay-primary .uk-link,
.uk-offcanvas-bar a,
.uk-offcanvas-bar .uk-link {
  color: #fff;
}
.uk-light a:hover,
.uk-light .uk-link:hover,
.uk-light .uk-link-toggle:hover .uk-link,
.uk-section-primary:not(.uk-preserve-color) a:hover,
.uk-section-primary:not(.uk-preserve-color) .uk-link:hover,
.uk-section-primary:not(.uk-preserve-color) .uk-link-toggle:hover .uk-link,
.uk-section-secondary:not(.uk-preserve-color) a:hover,
.uk-section-secondary:not(.uk-preserve-color) .uk-link:hover,
.uk-section-secondary:not(.uk-preserve-color) .uk-link-toggle:hover .uk-link,
.uk-tile-primary:not(.uk-preserve-color) a:hover,
.uk-tile-primary:not(.uk-preserve-color) .uk-link:hover,
.uk-tile-primary:not(.uk-preserve-color) .uk-link-toggle:hover .uk-link,
.uk-tile-secondary:not(.uk-preserve-color) a:hover,
.uk-tile-secondary:not(.uk-preserve-color) .uk-link:hover,
.uk-tile-secondary:not(.uk-preserve-color) .uk-link-toggle:hover .uk-link,
.uk-card-primary.uk-card-body a:hover,
.uk-card-primary.uk-card-body .uk-link:hover,
.uk-card-primary.uk-card-body .uk-link-toggle:hover .uk-link,
.uk-card-primary > :not([class*='uk-card-media']) a:hover,
.uk-card-primary > :not([class*='uk-card-media']) .uk-link:hover,
.uk-card-primary > :not([class*='uk-card-media']) .uk-link-toggle:hover .uk-link,
.uk-card-secondary.uk-card-body a:hover,
.uk-card-secondary.uk-card-body .uk-link:hover,
.uk-card-secondary.uk-card-body .uk-link-toggle:hover .uk-link,
.uk-card-secondary > :not([class*='uk-card-media']) a:hover,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-link:hover,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-link-toggle:hover .uk-link,
.uk-overlay-primary a:hover,
.uk-overlay-primary .uk-link:hover,
.uk-overlay-primary .uk-link-toggle:hover .uk-link,
.uk-offcanvas-bar a:hover,
.uk-offcanvas-bar .uk-link:hover,
.uk-offcanvas-bar .uk-link-toggle:hover .uk-link {
  color: #fff;
}
.uk-light :not(pre) > code,
.uk-light :not(pre) > kbd,
.uk-light :not(pre) > samp,
.uk-section-primary:not(.uk-preserve-color) :not(pre) > code,
.uk-section-primary:not(.uk-preserve-color) :not(pre) > kbd,
.uk-section-primary:not(.uk-preserve-color) :not(pre) > samp,
.uk-section-secondary:not(.uk-preserve-color) :not(pre) > code,
.uk-section-secondary:not(.uk-preserve-color) :not(pre) > kbd,
.uk-section-secondary:not(.uk-preserve-color) :not(pre) > samp,
.uk-tile-primary:not(.uk-preserve-color) :not(pre) > code,
.uk-tile-primary:not(.uk-preserve-color) :not(pre) > kbd,
.uk-tile-primary:not(.uk-preserve-color) :not(pre) > samp,
.uk-tile-secondary:not(.uk-preserve-color) :not(pre) > code,
.uk-tile-secondary:not(.uk-preserve-color) :not(pre) > kbd,
.uk-tile-secondary:not(.uk-preserve-color) :not(pre) > samp,
.uk-card-primary.uk-card-body :not(pre) > code,
.uk-card-primary.uk-card-body :not(pre) > kbd,
.uk-card-primary.uk-card-body :not(pre) > samp,
.uk-card-primary > :not([class*='uk-card-media']) :not(pre) > code,
.uk-card-primary > :not([class*='uk-card-media']) :not(pre) > kbd,
.uk-card-primary > :not([class*='uk-card-media']) :not(pre) > samp,
.uk-card-secondary.uk-card-body :not(pre) > code,
.uk-card-secondary.uk-card-body :not(pre) > kbd,
.uk-card-secondary.uk-card-body :not(pre) > samp,
.uk-card-secondary > :not([class*='uk-card-media']) :not(pre) > code,
.uk-card-secondary > :not([class*='uk-card-media']) :not(pre) > kbd,
.uk-card-secondary > :not([class*='uk-card-media']) :not(pre) > samp,
.uk-overlay-primary :not(pre) > code,
.uk-overlay-primary :not(pre) > kbd,
.uk-overlay-primary :not(pre) > samp,
.uk-offcanvas-bar :not(pre) > code,
.uk-offcanvas-bar :not(pre) > kbd,
.uk-offcanvas-bar :not(pre) > samp {
  color: rgba(255, 255, 255, 0.7);
  background-color: rgba(255, 255, 255, 0.1);
}
.uk-light em,
.uk-section-primary:not(.uk-preserve-color) em,
.uk-section-secondary:not(.uk-preserve-color) em,
.uk-tile-primary:not(.uk-preserve-color) em,
.uk-tile-secondary:not(.uk-preserve-color) em,
.uk-card-primary.uk-card-body em,
.uk-card-primary > :not([class*='uk-card-media']) em,
.uk-card-secondary.uk-card-body em,
.uk-card-secondary > :not([class*='uk-card-media']) em,
.uk-overlay-primary em,
.uk-offcanvas-bar em {
  color: #fff;
}
.uk-light h1,
.uk-light .uk-h1,
.uk-light h2,
.uk-light .uk-h2,
.uk-light h3,
.uk-light .uk-h3,
.uk-light h4,
.uk-light .uk-h4,
.uk-light h5,
.uk-light .uk-h5,
.uk-light h6,
.uk-light .uk-h6,
.uk-light .uk-heading-small,
.uk-light .uk-heading-medium,
.uk-light .uk-heading-large,
.uk-light .uk-heading-xlarge,
.uk-light .uk-heading-2xlarge,
.uk-section-primary:not(.uk-preserve-color) h1,
.uk-section-primary:not(.uk-preserve-color) .uk-h1,
.uk-section-primary:not(.uk-preserve-color) h2,
.uk-section-primary:not(.uk-preserve-color) .uk-h2,
.uk-section-primary:not(.uk-preserve-color) h3,
.uk-section-primary:not(.uk-preserve-color) .uk-h3,
.uk-section-primary:not(.uk-preserve-color) h4,
.uk-section-primary:not(.uk-preserve-color) .uk-h4,
.uk-section-primary:not(.uk-preserve-color) h5,
.uk-section-primary:not(.uk-preserve-color) .uk-h5,
.uk-section-primary:not(.uk-preserve-color) h6,
.uk-section-primary:not(.uk-preserve-color) .uk-h6,
.uk-section-primary:not(.uk-preserve-color) .uk-heading-small,
.uk-section-primary:not(.uk-preserve-color) .uk-heading-medium,
.uk-section-primary:not(.uk-preserve-color) .uk-heading-large,
.uk-section-primary:not(.uk-preserve-color) .uk-heading-xlarge,
.uk-section-primary:not(.uk-preserve-color) .uk-heading-2xlarge,
.uk-section-secondary:not(.uk-preserve-color) h1,
.uk-section-secondary:not(.uk-preserve-color) .uk-h1,
.uk-section-secondary:not(.uk-preserve-color) h2,
.uk-section-secondary:not(.uk-preserve-color) .uk-h2,
.uk-section-secondary:not(.uk-preserve-color) h3,
.uk-section-secondary:not(.uk-preserve-color) .uk-h3,
.uk-section-secondary:not(.uk-preserve-color) h4,
.uk-section-secondary:not(.uk-preserve-color) .uk-h4,
.uk-section-secondary:not(.uk-preserve-color) h5,
.uk-section-secondary:not(.uk-preserve-color) .uk-h5,
.uk-section-secondary:not(.uk-preserve-color) h6,
.uk-section-secondary:not(.uk-preserve-color) .uk-h6,
.uk-section-secondary:not(.uk-preserve-color) .uk-heading-small,
.uk-section-secondary:not(.uk-preserve-color) .uk-heading-medium,
.uk-section-secondary:not(.uk-preserve-color) .uk-heading-large,
.uk-section-secondary:not(.uk-preserve-color) .uk-heading-xlarge,
.uk-section-secondary:not(.uk-preserve-color) .uk-heading-2xlarge,
.uk-tile-primary:not(.uk-preserve-color) h1,
.uk-tile-primary:not(.uk-preserve-color) .uk-h1,
.uk-tile-primary:not(.uk-preserve-color) h2,
.uk-tile-primary:not(.uk-preserve-color) .uk-h2,
.uk-tile-primary:not(.uk-preserve-color) h3,
.uk-tile-primary:not(.uk-preserve-color) .uk-h3,
.uk-tile-primary:not(.uk-preserve-color) h4,
.uk-tile-primary:not(.uk-preserve-color) .uk-h4,
.uk-tile-primary:not(.uk-preserve-color) h5,
.uk-tile-primary:not(.uk-preserve-color) .uk-h5,
.uk-tile-primary:not(.uk-preserve-color) h6,
.uk-tile-primary:not(.uk-preserve-color) .uk-h6,
.uk-tile-primary:not(.uk-preserve-color) .uk-heading-small,
.uk-tile-primary:not(.uk-preserve-color) .uk-heading-medium,
.uk-tile-primary:not(.uk-preserve-color) .uk-heading-large,
.uk-tile-primary:not(.uk-preserve-color) .uk-heading-xlarge,
.uk-tile-primary:not(.uk-preserve-color) .uk-heading-2xlarge,
.uk-tile-secondary:not(.uk-preserve-color) h1,
.uk-tile-secondary:not(.uk-preserve-color) .uk-h1,
.uk-tile-secondary:not(.uk-preserve-color) h2,
.uk-tile-secondary:not(.uk-preserve-color) .uk-h2,
.uk-tile-secondary:not(.uk-preserve-color) h3,
.uk-tile-secondary:not(.uk-preserve-color) .uk-h3,
.uk-tile-secondary:not(.uk-preserve-color) h4,
.uk-tile-secondary:not(.uk-preserve-color) .uk-h4,
.uk-tile-secondary:not(.uk-preserve-color) h5,
.uk-tile-secondary:not(.uk-preserve-color) .uk-h5,
.uk-tile-secondary:not(.uk-preserve-color) h6,
.uk-tile-secondary:not(.uk-preserve-color) .uk-h6,
.uk-tile-secondary:not(.uk-preserve-color) .uk-heading-small,
.uk-tile-secondary:not(.uk-preserve-color) .uk-heading-medium,
.uk-tile-secondary:not(.uk-preserve-color) .uk-heading-large,
.uk-tile-secondary:not(.uk-preserve-color) .uk-heading-xlarge,
.uk-tile-secondary:not(.uk-preserve-color) .uk-heading-2xlarge,
.uk-card-primary.uk-card-body h1,
.uk-card-primary.uk-card-body .uk-h1,
.uk-card-primary.uk-card-body h2,
.uk-card-primary.uk-card-body .uk-h2,
.uk-card-primary.uk-card-body h3,
.uk-card-primary.uk-card-body .uk-h3,
.uk-card-primary.uk-card-body h4,
.uk-card-primary.uk-card-body .uk-h4,
.uk-card-primary.uk-card-body h5,
.uk-card-primary.uk-card-body .uk-h5,
.uk-card-primary.uk-card-body h6,
.uk-card-primary.uk-card-body .uk-h6,
.uk-card-primary.uk-card-body .uk-heading-small,
.uk-card-primary.uk-card-body .uk-heading-medium,
.uk-card-primary.uk-card-body .uk-heading-large,
.uk-card-primary.uk-card-body .uk-heading-xlarge,
.uk-card-primary.uk-card-body .uk-heading-2xlarge,
.uk-card-primary > :not([class*='uk-card-media']) h1,
.uk-card-primary > :not([class*='uk-card-media']) .uk-h1,
.uk-card-primary > :not([class*='uk-card-media']) h2,
.uk-card-primary > :not([class*='uk-card-media']) .uk-h2,
.uk-card-primary > :not([class*='uk-card-media']) h3,
.uk-card-primary > :not([class*='uk-card-media']) .uk-h3,
.uk-card-primary > :not([class*='uk-card-media']) h4,
.uk-card-primary > :not([class*='uk-card-media']) .uk-h4,
.uk-card-primary > :not([class*='uk-card-media']) h5,
.uk-card-primary > :not([class*='uk-card-media']) .uk-h5,
.uk-card-primary > :not([class*='uk-card-media']) h6,
.uk-card-primary > :not([class*='uk-card-media']) .uk-h6,
.uk-card-primary > :not([class*='uk-card-media']) .uk-heading-small,
.uk-card-primary > :not([class*='uk-card-media']) .uk-heading-medium,
.uk-card-primary > :not([class*='uk-card-media']) .uk-heading-large,
.uk-card-primary > :not([class*='uk-card-media']) .uk-heading-xlarge,
.uk-card-primary > :not([class*='uk-card-media']) .uk-heading-2xlarge,
.uk-card-secondary.uk-card-body h1,
.uk-card-secondary.uk-card-body .uk-h1,
.uk-card-secondary.uk-card-body h2,
.uk-card-secondary.uk-card-body .uk-h2,
.uk-card-secondary.uk-card-body h3,
.uk-card-secondary.uk-card-body .uk-h3,
.uk-card-secondary.uk-card-body h4,
.uk-card-secondary.uk-card-body .uk-h4,
.uk-card-secondary.uk-card-body h5,
.uk-card-secondary.uk-card-body .uk-h5,
.uk-card-secondary.uk-card-body h6,
.uk-card-secondary.uk-card-body .uk-h6,
.uk-card-secondary.uk-card-body .uk-heading-small,
.uk-card-secondary.uk-card-body .uk-heading-medium,
.uk-card-secondary.uk-card-body .uk-heading-large,
.uk-card-secondary.uk-card-body .uk-heading-xlarge,
.uk-card-secondary.uk-card-body .uk-heading-2xlarge,
.uk-card-secondary > :not([class*='uk-card-media']) h1,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-h1,
.uk-card-secondary > :not([class*='uk-card-media']) h2,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-h2,
.uk-card-secondary > :not([class*='uk-card-media']) h3,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-h3,
.uk-card-secondary > :not([class*='uk-card-media']) h4,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-h4,
.uk-card-secondary > :not([class*='uk-card-media']) h5,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-h5,
.uk-card-secondary > :not([class*='uk-card-media']) h6,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-h6,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-heading-small,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-heading-medium,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-heading-large,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-heading-xlarge,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-heading-2xlarge,
.uk-overlay-primary h1,
.uk-overlay-primary .uk-h1,
.uk-overlay-primary h2,
.uk-overlay-primary .uk-h2,
.uk-overlay-primary h3,
.uk-overlay-primary .uk-h3,
.uk-overlay-primary h4,
.uk-overlay-primary .uk-h4,
.uk-overlay-primary h5,
.uk-overlay-primary .uk-h5,
.uk-overlay-primary h6,
.uk-overlay-primary .uk-h6,
.uk-overlay-primary .uk-heading-small,
.uk-overlay-primary .uk-heading-medium,
.uk-overlay-primary .uk-heading-large,
.uk-overlay-primary .uk-heading-xlarge,
.uk-overlay-primary .uk-heading-2xlarge,
.uk-offcanvas-bar h1,
.uk-offcanvas-bar .uk-h1,
.uk-offcanvas-bar h2,
.uk-offcanvas-bar .uk-h2,
.uk-offcanvas-bar h3,
.uk-offcanvas-bar .uk-h3,
.uk-offcanvas-bar h4,
.uk-offcanvas-bar .uk-h4,
.uk-offcanvas-bar h5,
.uk-offcanvas-bar .uk-h5,
.uk-offcanvas-bar h6,
.uk-offcanvas-bar .uk-h6,
.uk-offcanvas-bar .uk-heading-small,
.uk-offcanvas-bar .uk-heading-medium,
.uk-offcanvas-bar .uk-heading-large,
.uk-offcanvas-bar .uk-heading-xlarge,
.uk-offcanvas-bar .uk-heading-2xlarge {
  color: #fff;
}
.uk-light blockquote,
.uk-section-primary:not(.uk-preserve-color) blockquote,
.uk-section-secondary:not(.uk-preserve-color) blockquote,
.uk-tile-primary:not(.uk-preserve-color) blockquote,
.uk-tile-secondary:not(.uk-preserve-color) blockquote,
.uk-card-primary.uk-card-body blockquote,
.uk-card-primary > :not([class*='uk-card-media']) blockquote,
.uk-card-secondary.uk-card-body blockquote,
.uk-card-secondary > :not([class*='uk-card-media']) blockquote,
.uk-overlay-primary blockquote,
.uk-offcanvas-bar blockquote {
  color: #fff;
}
.uk-light blockquote footer,
.uk-section-primary:not(.uk-preserve-color) blockquote footer,
.uk-section-secondary:not(.uk-preserve-color) blockquote footer,
.uk-tile-primary:not(.uk-preserve-color) blockquote footer,
.uk-tile-secondary:not(.uk-preserve-color) blockquote footer,
.uk-card-primary.uk-card-body blockquote footer,
.uk-card-primary > :not([class*='uk-card-media']) blockquote footer,
.uk-card-secondary.uk-card-body blockquote footer,
.uk-card-secondary > :not([class*='uk-card-media']) blockquote footer,
.uk-overlay-primary blockquote footer,
.uk-offcanvas-bar blockquote footer {
  color: rgba(255, 255, 255, 0.7);
}
.uk-light hr,
.uk-light .uk-hr,
.uk-section-primary:not(.uk-preserve-color) hr,
.uk-section-primary:not(.uk-preserve-color) .uk-hr,
.uk-section-secondary:not(.uk-preserve-color) hr,
.uk-section-secondary:not(.uk-preserve-color) .uk-hr,
.uk-tile-primary:not(.uk-preserve-color) hr,
.uk-tile-primary:not(.uk-preserve-color) .uk-hr,
.uk-tile-secondary:not(.uk-preserve-color) hr,
.uk-tile-secondary:not(.uk-preserve-color) .uk-hr,
.uk-card-primary.uk-card-body hr,
.uk-card-primary.uk-card-body .uk-hr,
.uk-card-primary > :not([class*='uk-card-media']) hr,
.uk-card-primary > :not([class*='uk-card-media']) .uk-hr,
.uk-card-secondary.uk-card-body hr,
.uk-card-secondary.uk-card-body .uk-hr,
.uk-card-secondary > :not([class*='uk-card-media']) hr,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-hr,
.uk-overlay-primary hr,
.uk-overlay-primary .uk-hr,
.uk-offcanvas-bar hr,
.uk-offcanvas-bar .uk-hr {
  border-top-color: rgba(255, 255, 255, 0.2);
}
.uk-light :focus,
.uk-section-primary:not(.uk-preserve-color) :focus,
.uk-section-secondary:not(.uk-preserve-color) :focus,
.uk-tile-primary:not(.uk-preserve-color) :focus,
.uk-tile-secondary:not(.uk-preserve-color) :focus,
.uk-card-primary.uk-card-body :focus,
.uk-card-primary > :not([class*='uk-card-media']) :focus,
.uk-card-secondary.uk-card-body :focus,
.uk-card-secondary > :not([class*='uk-card-media']) :focus,
.uk-overlay-primary :focus,
.uk-offcanvas-bar :focus {
  outline-color: #fff;
}
.uk-light :focus-visible,
.uk-section-primary:not(.uk-preserve-color) :focus-visible,
.uk-section-secondary:not(.uk-preserve-color) :focus-visible,
.uk-tile-primary:not(.uk-preserve-color) :focus-visible,
.uk-tile-secondary:not(.uk-preserve-color) :focus-visible,
.uk-card-primary.uk-card-body :focus-visible,
.uk-card-primary > :not([class*='uk-card-media']) :focus-visible,
.uk-card-secondary.uk-card-body :focus-visible,
.uk-card-secondary > :not([class*='uk-card-media']) :focus-visible,
.uk-overlay-primary :focus-visible,
.uk-offcanvas-bar :focus-visible {
  outline-color: #fff;
}
.uk-light a.uk-link-muted,
.uk-light .uk-link-muted a,
.uk-section-primary:not(.uk-preserve-color) a.uk-link-muted,
.uk-section-primary:not(.uk-preserve-color) .uk-link-muted a,
.uk-section-secondary:not(.uk-preserve-color) a.uk-link-muted,
.uk-section-secondary:not(.uk-preserve-color) .uk-link-muted a,
.uk-tile-primary:not(.uk-preserve-color) a.uk-link-muted,
.uk-tile-primary:not(.uk-preserve-color) .uk-link-muted a,
.uk-tile-secondary:not(.uk-preserve-color) a.uk-link-muted,
.uk-tile-secondary:not(.uk-preserve-color) .uk-link-muted a,
.uk-card-primary.uk-card-body a.uk-link-muted,
.uk-card-primary.uk-card-body .uk-link-muted a,
.uk-card-primary > :not([class*='uk-card-media']) a.uk-link-muted,
.uk-card-primary > :not([class*='uk-card-media']) .uk-link-muted a,
.uk-card-secondary.uk-card-body a.uk-link-muted,
.uk-card-secondary.uk-card-body .uk-link-muted a,
.uk-card-secondary > :not([class*='uk-card-media']) a.uk-link-muted,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-link-muted a,
.uk-overlay-primary a.uk-link-muted,
.uk-overlay-primary .uk-link-muted a,
.uk-offcanvas-bar a.uk-link-muted,
.uk-offcanvas-bar .uk-link-muted a {
  color: rgba(255, 255, 255, 0.5);
}
.uk-light a.uk-link-muted:hover,
.uk-light .uk-link-muted a:hover,
.uk-light .uk-link-toggle:hover .uk-link-muted,
.uk-section-primary:not(.uk-preserve-color) a.uk-link-muted:hover,
.uk-section-primary:not(.uk-preserve-color) .uk-link-muted a:hover,
.uk-section-primary:not(.uk-preserve-color) .uk-link-toggle:hover .uk-link-muted,
.uk-section-secondary:not(.uk-preserve-color) a.uk-link-muted:hover,
.uk-section-secondary:not(.uk-preserve-color) .uk-link-muted a:hover,
.uk-section-secondary:not(.uk-preserve-color) .uk-link-toggle:hover .uk-link-muted,
.uk-tile-primary:not(.uk-preserve-color) a.uk-link-muted:hover,
.uk-tile-primary:not(.uk-preserve-color) .uk-link-muted a:hover,
.uk-tile-primary:not(.uk-preserve-color) .uk-link-toggle:hover .uk-link-muted,
.uk-tile-secondary:not(.uk-preserve-color) a.uk-link-muted:hover,
.uk-tile-secondary:not(.uk-preserve-color) .uk-link-muted a:hover,
.uk-tile-secondary:not(.uk-preserve-color) .uk-link-toggle:hover .uk-link-muted,
.uk-card-primary.uk-card-body a.uk-link-muted:hover,
.uk-card-primary.uk-card-body .uk-link-muted a:hover,
.uk-card-primary.uk-card-body .uk-link-toggle:hover .uk-link-muted,
.uk-card-primary > :not([class*='uk-card-media']) a.uk-link-muted:hover,
.uk-card-primary > :not([class*='uk-card-media']) .uk-link-muted a:hover,
.uk-card-primary > :not([class*='uk-card-media']) .uk-link-toggle:hover .uk-link-muted,
.uk-card-secondary.uk-card-body a.uk-link-muted:hover,
.uk-card-secondary.uk-card-body .uk-link-muted a:hover,
.uk-card-secondary.uk-card-body .uk-link-toggle:hover .uk-link-muted,
.uk-card-secondary > :not([class*='uk-card-media']) a.uk-link-muted:hover,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-link-muted a:hover,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-link-toggle:hover .uk-link-muted,
.uk-overlay-primary a.uk-link-muted:hover,
.uk-overlay-primary .uk-link-muted a:hover,
.uk-overlay-primary .uk-link-toggle:hover .uk-link-muted,
.uk-offcanvas-bar a.uk-link-muted:hover,
.uk-offcanvas-bar .uk-link-muted a:hover,
.uk-offcanvas-bar .uk-link-toggle:hover .uk-link-muted {
  color: rgba(255, 255, 255, 0.7);
}
.uk-light a.uk-link-text:hover,
.uk-light .uk-link-text a:hover,
.uk-light .uk-link-toggle:hover .uk-link-text,
.uk-section-primary:not(.uk-preserve-color) a.uk-link-text:hover,
.uk-section-primary:not(.uk-preserve-color) .uk-link-text a:hover,
.uk-section-primary:not(.uk-preserve-color) .uk-link-toggle:hover .uk-link-text,
.uk-section-secondary:not(.uk-preserve-color) a.uk-link-text:hover,
.uk-section-secondary:not(.uk-preserve-color) .uk-link-text a:hover,
.uk-section-secondary:not(.uk-preserve-color) .uk-link-toggle:hover .uk-link-text,
.uk-tile-primary:not(.uk-preserve-color) a.uk-link-text:hover,
.uk-tile-primary:not(.uk-preserve-color) .uk-link-text a:hover,
.uk-tile-primary:not(.uk-preserve-color) .uk-link-toggle:hover .uk-link-text,
.uk-tile-secondary:not(.uk-preserve-color) a.uk-link-text:hover,
.uk-tile-secondary:not(.uk-preserve-color) .uk-link-text a:hover,
.uk-tile-secondary:not(.uk-preserve-color) .uk-link-toggle:hover .uk-link-text,
.uk-card-primary.uk-card-body a.uk-link-text:hover,
.uk-card-primary.uk-card-body .uk-link-text a:hover,
.uk-card-primary.uk-card-body .uk-link-toggle:hover .uk-link-text,
.uk-card-primary > :not([class*='uk-card-media']) a.uk-link-text:hover,
.uk-card-primary > :not([class*='uk-card-media']) .uk-link-text a:hover,
.uk-card-primary > :not([class*='uk-card-media']) .uk-link-toggle:hover .uk-link-text,
.uk-card-secondary.uk-card-body a.uk-link-text:hover,
.uk-card-secondary.uk-card-body .uk-link-text a:hover,
.uk-card-secondary.uk-card-body .uk-link-toggle:hover .uk-link-text,
.uk-card-secondary > :not([class*='uk-card-media']) a.uk-link-text:hover,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-link-text a:hover,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-link-toggle:hover .uk-link-text,
.uk-overlay-primary a.uk-link-text:hover,
.uk-overlay-primary .uk-link-text a:hover,
.uk-overlay-primary .uk-link-toggle:hover .uk-link-text,
.uk-offcanvas-bar a.uk-link-text:hover,
.uk-offcanvas-bar .uk-link-text a:hover,
.uk-offcanvas-bar .uk-link-toggle:hover .uk-link-text {
  color: rgba(255, 255, 255, 0.5);
}
.uk-light a.uk-link-heading:hover,
.uk-light .uk-link-heading a:hover,
.uk-light .uk-link-toggle:hover .uk-link-heading,
.uk-section-primary:not(.uk-preserve-color) a.uk-link-heading:hover,
.uk-section-primary:not(.uk-preserve-color) .uk-link-heading a:hover,
.uk-section-primary:not(.uk-preserve-color) .uk-link-toggle:hover .uk-link-heading,
.uk-section-secondary:not(.uk-preserve-color) a.uk-link-heading:hover,
.uk-section-secondary:not(.uk-preserve-color) .uk-link-heading a:hover,
.uk-section-secondary:not(.uk-preserve-color) .uk-link-toggle:hover .uk-link-heading,
.uk-tile-primary:not(.uk-preserve-color) a.uk-link-heading:hover,
.uk-tile-primary:not(.uk-preserve-color) .uk-link-heading a:hover,
.uk-tile-primary:not(.uk-preserve-color) .uk-link-toggle:hover .uk-link-heading,
.uk-tile-secondary:not(.uk-preserve-color) a.uk-link-heading:hover,
.uk-tile-secondary:not(.uk-preserve-color) .uk-link-heading a:hover,
.uk-tile-secondary:not(.uk-preserve-color) .uk-link-toggle:hover .uk-link-heading,
.uk-card-primary.uk-card-body a.uk-link-heading:hover,
.uk-card-primary.uk-card-body .uk-link-heading a:hover,
.uk-card-primary.uk-card-body .uk-link-toggle:hover .uk-link-heading,
.uk-card-primary > :not([class*='uk-card-media']) a.uk-link-heading:hover,
.uk-card-primary > :not([class*='uk-card-media']) .uk-link-heading a:hover,
.uk-card-primary > :not([class*='uk-card-media']) .uk-link-toggle:hover .uk-link-heading,
.uk-card-secondary.uk-card-body a.uk-link-heading:hover,
.uk-card-secondary.uk-card-body .uk-link-heading a:hover,
.uk-card-secondary.uk-card-body .uk-link-toggle:hover .uk-link-heading,
.uk-card-secondary > :not([class*='uk-card-media']) a.uk-link-heading:hover,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-link-heading a:hover,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-link-toggle:hover .uk-link-heading,
.uk-overlay-primary a.uk-link-heading:hover,
.uk-overlay-primary .uk-link-heading a:hover,
.uk-overlay-primary .uk-link-toggle:hover .uk-link-heading,
.uk-offcanvas-bar a.uk-link-heading:hover,
.uk-offcanvas-bar .uk-link-heading a:hover,
.uk-offcanvas-bar .uk-link-toggle:hover .uk-link-heading {
  color: #fff;
}
.uk-light .uk-heading-divider,
.uk-section-primary:not(.uk-preserve-color) .uk-heading-divider,
.uk-section-secondary:not(.uk-preserve-color) .uk-heading-divider,
.uk-tile-primary:not(.uk-preserve-color) .uk-heading-divider,
.uk-tile-secondary:not(.uk-preserve-color) .uk-heading-divider,
.uk-card-primary.uk-card-body .uk-heading-divider,
.uk-card-primary > :not([class*='uk-card-media']) .uk-heading-divider,
.uk-card-secondary.uk-card-body .uk-heading-divider,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-heading-divider,
.uk-overlay-primary .uk-heading-divider,
.uk-offcanvas-bar .uk-heading-divider {
  border-bottom-color: rgba(255, 255, 255, 0.2);
}
.uk-light .uk-heading-bullet::before,
.uk-section-primary:not(.uk-preserve-color) .uk-heading-bullet::before,
.uk-section-secondary:not(.uk-preserve-color) .uk-heading-bullet::before,
.uk-tile-primary:not(.uk-preserve-color) .uk-heading-bullet::before,
.uk-tile-secondary:not(.uk-preserve-color) .uk-heading-bullet::before,
.uk-card-primary.uk-card-body .uk-heading-bullet::before,
.uk-card-primary > :not([class*='uk-card-media']) .uk-heading-bullet::before,
.uk-card-secondary.uk-card-body .uk-heading-bullet::before,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-heading-bullet::before,
.uk-overlay-primary .uk-heading-bullet::before,
.uk-offcanvas-bar .uk-heading-bullet::before {
  border-left-color: rgba(255, 255, 255, 0.2);
}
.uk-light .uk-heading-line > ::before,
.uk-light .uk-heading-line > ::after,
.uk-section-primary:not(.uk-preserve-color) .uk-heading-line > ::before,
.uk-section-primary:not(.uk-preserve-color) .uk-heading-line > ::after,
.uk-section-secondary:not(.uk-preserve-color) .uk-heading-line > ::before,
.uk-section-secondary:not(.uk-preserve-color) .uk-heading-line > ::after,
.uk-tile-primary:not(.uk-preserve-color) .uk-heading-line > ::before,
.uk-tile-primary:not(.uk-preserve-color) .uk-heading-line > ::after,
.uk-tile-secondary:not(.uk-preserve-color) .uk-heading-line > ::before,
.uk-tile-secondary:not(.uk-preserve-color) .uk-heading-line > ::after,
.uk-card-primary.uk-card-body .uk-heading-line > ::before,
.uk-card-primary.uk-card-body .uk-heading-line > ::after,
.uk-card-primary > :not([class*='uk-card-media']) .uk-heading-line > ::before,
.uk-card-primary > :not([class*='uk-card-media']) .uk-heading-line > ::after,
.uk-card-secondary.uk-card-body .uk-heading-line > ::before,
.uk-card-secondary.uk-card-body .uk-heading-line > ::after,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-heading-line > ::before,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-heading-line > ::after,
.uk-overlay-primary .uk-heading-line > ::before,
.uk-overlay-primary .uk-heading-line > ::after,
.uk-offcanvas-bar .uk-heading-line > ::before,
.uk-offcanvas-bar .uk-heading-line > ::after {
  border-bottom-color: rgba(255, 255, 255, 0.2);
}
.uk-light .uk-divider-icon,
.uk-section-primary:not(.uk-preserve-color) .uk-divider-icon,
.uk-section-secondary:not(.uk-preserve-color) .uk-divider-icon,
.uk-tile-primary:not(.uk-preserve-color) .uk-divider-icon,
.uk-tile-secondary:not(.uk-preserve-color) .uk-divider-icon,
.uk-card-primary.uk-card-body .uk-divider-icon,
.uk-card-primary > :not([class*='uk-card-media']) .uk-divider-icon,
.uk-card-secondary.uk-card-body .uk-divider-icon,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-divider-icon,
.uk-overlay-primary .uk-divider-icon,
.uk-offcanvas-bar .uk-divider-icon {
  background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2220%22%20height%3D%2220%22%20viewBox%3D%220%200%2020%2020%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%0A%20%20%20%20%3Ccircle%20fill%3D%22none%22%20stroke%3D%22rgba%28255,%20255,%20255,%200.2%29%22%20stroke-width%3D%222%22%20cx%3D%2210%22%20cy%3D%2210%22%20r%3D%227%22%20%2F%3E%0A%3C%2Fsvg%3E%0A");
}
.uk-light .uk-divider-icon::before,
.uk-light .uk-divider-icon::after,
.uk-section-primary:not(.uk-preserve-color) .uk-divider-icon::before,
.uk-section-primary:not(.uk-preserve-color) .uk-divider-icon::after,
.uk-section-secondary:not(.uk-preserve-color) .uk-divider-icon::before,
.uk-section-secondary:not(.uk-preserve-color) .uk-divider-icon::after,
.uk-tile-primary:not(.uk-preserve-color) .uk-divider-icon::before,
.uk-tile-primary:not(.uk-preserve-color) .uk-divider-icon::after,
.uk-tile-secondary:not(.uk-preserve-color) .uk-divider-icon::before,
.uk-tile-secondary:not(.uk-preserve-color) .uk-divider-icon::after,
.uk-card-primary.uk-card-body .uk-divider-icon::before,
.uk-card-primary.uk-card-body .uk-divider-icon::after,
.uk-card-primary > :not([class*='uk-card-media']) .uk-divider-icon::before,
.uk-card-primary > :not([class*='uk-card-media']) .uk-divider-icon::after,
.uk-card-secondary.uk-card-body .uk-divider-icon::before,
.uk-card-secondary.uk-card-body .uk-divider-icon::after,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-divider-icon::before,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-divider-icon::after,
.uk-overlay-primary .uk-divider-icon::before,
.uk-overlay-primary .uk-divider-icon::after,
.uk-offcanvas-bar .uk-divider-icon::before,
.uk-offcanvas-bar .uk-divider-icon::after {
  border-bottom-color: rgba(255, 255, 255, 0.2);
}
.uk-light .uk-divider-small::after,
.uk-section-primary:not(.uk-preserve-color) .uk-divider-small::after,
.uk-section-secondary:not(.uk-preserve-color) .uk-divider-small::after,
.uk-tile-primary:not(.uk-preserve-color) .uk-divider-small::after,
.uk-tile-secondary:not(.uk-preserve-color) .uk-divider-small::after,
.uk-card-primary.uk-card-body .uk-divider-small::after,
.uk-card-primary > :not([class*='uk-card-media']) .uk-divider-small::after,
.uk-card-secondary.uk-card-body .uk-divider-small::after,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-divider-small::after,
.uk-overlay-primary .uk-divider-small::after,
.uk-offcanvas-bar .uk-divider-small::after {
  border-top-color: rgba(255, 255, 255, 0.2);
}
.uk-light .uk-divider-vertical,
.uk-section-primary:not(.uk-preserve-color) .uk-divider-vertical,
.uk-section-secondary:not(.uk-preserve-color) .uk-divider-vertical,
.uk-tile-primary:not(.uk-preserve-color) .uk-divider-vertical,
.uk-tile-secondary:not(.uk-preserve-color) .uk-divider-vertical,
.uk-card-primary.uk-card-body .uk-divider-vertical,
.uk-card-primary > :not([class*='uk-card-media']) .uk-divider-vertical,
.uk-card-secondary.uk-card-body .uk-divider-vertical,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-divider-vertical,
.uk-overlay-primary .uk-divider-vertical,
.uk-offcanvas-bar .uk-divider-vertical {
  border-left-color: rgba(255, 255, 255, 0.2);
}
.uk-light .uk-list-muted > ::before,
.uk-section-primary:not(.uk-preserve-color) .uk-list-muted > ::before,
.uk-section-secondary:not(.uk-preserve-color) .uk-list-muted > ::before,
.uk-tile-primary:not(.uk-preserve-color) .uk-list-muted > ::before,
.uk-tile-secondary:not(.uk-preserve-color) .uk-list-muted > ::before,
.uk-card-primary.uk-card-body .uk-list-muted > ::before,
.uk-card-primary > :not([class*='uk-card-media']) .uk-list-muted > ::before,
.uk-card-secondary.uk-card-body .uk-list-muted > ::before,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-list-muted > ::before,
.uk-overlay-primary .uk-list-muted > ::before,
.uk-offcanvas-bar .uk-list-muted > ::before {
  color: rgba(255, 255, 255, 0.5) !important;
}
.uk-light .uk-list-emphasis > ::before,
.uk-section-primary:not(.uk-preserve-color) .uk-list-emphasis > ::before,
.uk-section-secondary:not(.uk-preserve-color) .uk-list-emphasis > ::before,
.uk-tile-primary:not(.uk-preserve-color) .uk-list-emphasis > ::before,
.uk-tile-secondary:not(.uk-preserve-color) .uk-list-emphasis > ::before,
.uk-card-primary.uk-card-body .uk-list-emphasis > ::before,
.uk-card-primary > :not([class*='uk-card-media']) .uk-list-emphasis > ::before,
.uk-card-secondary.uk-card-body .uk-list-emphasis > ::before,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-list-emphasis > ::before,
.uk-overlay-primary .uk-list-emphasis > ::before,
.uk-offcanvas-bar .uk-list-emphasis > ::before {
  color: #fff !important;
}
.uk-light .uk-list-primary > ::before,
.uk-section-primary:not(.uk-preserve-color) .uk-list-primary > ::before,
.uk-section-secondary:not(.uk-preserve-color) .uk-list-primary > ::before,
.uk-tile-primary:not(.uk-preserve-color) .uk-list-primary > ::before,
.uk-tile-secondary:not(.uk-preserve-color) .uk-list-primary > ::before,
.uk-card-primary.uk-card-body .uk-list-primary > ::before,
.uk-card-primary > :not([class*='uk-card-media']) .uk-list-primary > ::before,
.uk-card-secondary.uk-card-body .uk-list-primary > ::before,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-list-primary > ::before,
.uk-overlay-primary .uk-list-primary > ::before,
.uk-offcanvas-bar .uk-list-primary > ::before {
  color: #fff !important;
}
.uk-light .uk-list-secondary > ::before,
.uk-section-primary:not(.uk-preserve-color) .uk-list-secondary > ::before,
.uk-section-secondary:not(.uk-preserve-color) .uk-list-secondary > ::before,
.uk-tile-primary:not(.uk-preserve-color) .uk-list-secondary > ::before,
.uk-tile-secondary:not(.uk-preserve-color) .uk-list-secondary > ::before,
.uk-card-primary.uk-card-body .uk-list-secondary > ::before,
.uk-card-primary > :not([class*='uk-card-media']) .uk-list-secondary > ::before,
.uk-card-secondary.uk-card-body .uk-list-secondary > ::before,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-list-secondary > ::before,
.uk-overlay-primary .uk-list-secondary > ::before,
.uk-offcanvas-bar .uk-list-secondary > ::before {
  color: #fff !important;
}
.uk-light .uk-list-bullet > ::before,
.uk-section-primary:not(.uk-preserve-color) .uk-list-bullet > ::before,
.uk-section-secondary:not(.uk-preserve-color) .uk-list-bullet > ::before,
.uk-tile-primary:not(.uk-preserve-color) .uk-list-bullet > ::before,
.uk-tile-secondary:not(.uk-preserve-color) .uk-list-bullet > ::before,
.uk-card-primary.uk-card-body .uk-list-bullet > ::before,
.uk-card-primary > :not([class*='uk-card-media']) .uk-list-bullet > ::before,
.uk-card-secondary.uk-card-body .uk-list-bullet > ::before,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-list-bullet > ::before,
.uk-overlay-primary .uk-list-bullet > ::before,
.uk-offcanvas-bar .uk-list-bullet > ::before {
  background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%226%22%20height%3D%226%22%20viewBox%3D%220%200%206%206%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%0A%20%20%20%20%3Ccircle%20fill%3D%22rgba%28255,%20255,%20255,%200.7%29%22%20cx%3D%223%22%20cy%3D%223%22%20r%3D%223%22%20%2F%3E%0A%3C%2Fsvg%3E");
}
.uk-light .uk-list-divider > :nth-child(n+2),
.uk-section-primary:not(.uk-preserve-color) .uk-list-divider > :nth-child(n+2),
.uk-section-secondary:not(.uk-preserve-color) .uk-list-divider > :nth-child(n+2),
.uk-tile-primary:not(.uk-preserve-color) .uk-list-divider > :nth-child(n+2),
.uk-tile-secondary:not(.uk-preserve-color) .uk-list-divider > :nth-child(n+2),
.uk-card-primary.uk-card-body .uk-list-divider > :nth-child(n+2),
.uk-card-primary > :not([class*='uk-card-media']) .uk-list-divider > :nth-child(n+2),
.uk-card-secondary.uk-card-body .uk-list-divider > :nth-child(n+2),
.uk-card-secondary > :not([class*='uk-card-media']) .uk-list-divider > :nth-child(n+2),
.uk-overlay-primary .uk-list-divider > :nth-child(n+2),
.uk-offcanvas-bar .uk-list-divider > :nth-child(n+2) {
  border-top-color: rgba(255, 255, 255, 0.2);
}
.uk-light .uk-list-striped > *:nth-of-type(odd),
.uk-section-primary:not(.uk-preserve-color) .uk-list-striped > *:nth-of-type(odd),
.uk-section-secondary:not(.uk-preserve-color) .uk-list-striped > *:nth-of-type(odd),
.uk-tile-primary:not(.uk-preserve-color) .uk-list-striped > *:nth-of-type(odd),
.uk-tile-secondary:not(.uk-preserve-color) .uk-list-striped > *:nth-of-type(odd),
.uk-card-primary.uk-card-body .uk-list-striped > *:nth-of-type(odd),
.uk-card-primary > :not([class*='uk-card-media']) .uk-list-striped > *:nth-of-type(odd),
.uk-card-secondary.uk-card-body .uk-list-striped > *:nth-of-type(odd),
.uk-card-secondary > :not([class*='uk-card-media']) .uk-list-striped > *:nth-of-type(odd),
.uk-overlay-primary .uk-list-striped > *:nth-of-type(odd),
.uk-offcanvas-bar .uk-list-striped > *:nth-of-type(odd) {
  border-top-color: rgba(255, 255, 255, 0.2);
  border-bottom-color: rgba(255, 255, 255, 0.2);
}
.uk-light .uk-list-striped > :nth-of-type(odd),
.uk-section-primary:not(.uk-preserve-color) .uk-list-striped > :nth-of-type(odd),
.uk-section-secondary:not(.uk-preserve-color) .uk-list-striped > :nth-of-type(odd),
.uk-tile-primary:not(.uk-preserve-color) .uk-list-striped > :nth-of-type(odd),
.uk-tile-secondary:not(.uk-preserve-color) .uk-list-striped > :nth-of-type(odd),
.uk-card-primary.uk-card-body .uk-list-striped > :nth-of-type(odd),
.uk-card-primary > :not([class*='uk-card-media']) .uk-list-striped > :nth-of-type(odd),
.uk-card-secondary.uk-card-body .uk-list-striped > :nth-of-type(odd),
.uk-card-secondary > :not([class*='uk-card-media']) .uk-list-striped > :nth-of-type(odd),
.uk-overlay-primary .uk-list-striped > :nth-of-type(odd),
.uk-offcanvas-bar .uk-list-striped > :nth-of-type(odd) {
  background-color: rgba(255, 255, 255, 0.1);
}
.uk-light .uk-table th,
.uk-section-primary:not(.uk-preserve-color) .uk-table th,
.uk-section-secondary:not(.uk-preserve-color) .uk-table th,
.uk-tile-primary:not(.uk-preserve-color) .uk-table th,
.uk-tile-secondary:not(.uk-preserve-color) .uk-table th,
.uk-card-primary.uk-card-body .uk-table th,
.uk-card-primary > :not([class*='uk-card-media']) .uk-table th,
.uk-card-secondary.uk-card-body .uk-table th,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-table th,
.uk-overlay-primary .uk-table th,
.uk-offcanvas-bar .uk-table th {
  color: rgba(255, 255, 255, 0.7);
}
.uk-light .uk-table caption,
.uk-section-primary:not(.uk-preserve-color) .uk-table caption,
.uk-section-secondary:not(.uk-preserve-color) .uk-table caption,
.uk-tile-primary:not(.uk-preserve-color) .uk-table caption,
.uk-tile-secondary:not(.uk-preserve-color) .uk-table caption,
.uk-card-primary.uk-card-body .uk-table caption,
.uk-card-primary > :not([class*='uk-card-media']) .uk-table caption,
.uk-card-secondary.uk-card-body .uk-table caption,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-table caption,
.uk-overlay-primary .uk-table caption,
.uk-offcanvas-bar .uk-table caption {
  color: rgba(255, 255, 255, 0.5);
}
.uk-light .uk-table > tr.uk-active,
.uk-light .uk-table tbody tr.uk-active,
.uk-section-primary:not(.uk-preserve-color) .uk-table > tr.uk-active,
.uk-section-primary:not(.uk-preserve-color) .uk-table tbody tr.uk-active,
.uk-section-secondary:not(.uk-preserve-color) .uk-table > tr.uk-active,
.uk-section-secondary:not(.uk-preserve-color) .uk-table tbody tr.uk-active,
.uk-tile-primary:not(.uk-preserve-color) .uk-table > tr.uk-active,
.uk-tile-primary:not(.uk-preserve-color) .uk-table tbody tr.uk-active,
.uk-tile-secondary:not(.uk-preserve-color) .uk-table > tr.uk-active,
.uk-tile-secondary:not(.uk-preserve-color) .uk-table tbody tr.uk-active,
.uk-card-primary.uk-card-body .uk-table > tr.uk-active,
.uk-card-primary.uk-card-body .uk-table tbody tr.uk-active,
.uk-card-primary > :not([class*='uk-card-media']) .uk-table > tr.uk-active,
.uk-card-primary > :not([class*='uk-card-media']) .uk-table tbody tr.uk-active,
.uk-card-secondary.uk-card-body .uk-table > tr.uk-active,
.uk-card-secondary.uk-card-body .uk-table tbody tr.uk-active,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-table > tr.uk-active,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-table tbody tr.uk-active,
.uk-overlay-primary .uk-table > tr.uk-active,
.uk-overlay-primary .uk-table tbody tr.uk-active,
.uk-offcanvas-bar .uk-table > tr.uk-active,
.uk-offcanvas-bar .uk-table tbody tr.uk-active {
  background: rgba(255, 255, 255, 0.08);
}
.uk-light .uk-table-divider > tr:not(:first-child),
.uk-light .uk-table-divider > :not(:first-child) > tr,
.uk-light .uk-table-divider > :first-child > tr:not(:first-child),
.uk-section-primary:not(.uk-preserve-color) .uk-table-divider > tr:not(:first-child),
.uk-section-primary:not(.uk-preserve-color) .uk-table-divider > :not(:first-child) > tr,
.uk-section-primary:not(.uk-preserve-color) .uk-table-divider > :first-child > tr:not(:first-child),
.uk-section-secondary:not(.uk-preserve-color) .uk-table-divider > tr:not(:first-child),
.uk-section-secondary:not(.uk-preserve-color) .uk-table-divider > :not(:first-child) > tr,
.uk-section-secondary:not(.uk-preserve-color) .uk-table-divider > :first-child > tr:not(:first-child),
.uk-tile-primary:not(.uk-preserve-color) .uk-table-divider > tr:not(:first-child),
.uk-tile-primary:not(.uk-preserve-color) .uk-table-divider > :not(:first-child) > tr,
.uk-tile-primary:not(.uk-preserve-color) .uk-table-divider > :first-child > tr:not(:first-child),
.uk-tile-secondary:not(.uk-preserve-color) .uk-table-divider > tr:not(:first-child),
.uk-tile-secondary:not(.uk-preserve-color) .uk-table-divider > :not(:first-child) > tr,
.uk-tile-secondary:not(.uk-preserve-color) .uk-table-divider > :first-child > tr:not(:first-child),
.uk-card-primary.uk-card-body .uk-table-divider > tr:not(:first-child),
.uk-card-primary.uk-card-body .uk-table-divider > :not(:first-child) > tr,
.uk-card-primary.uk-card-body .uk-table-divider > :first-child > tr:not(:first-child),
.uk-card-primary > :not([class*='uk-card-media']) .uk-table-divider > tr:not(:first-child),
.uk-card-primary > :not([class*='uk-card-media']) .uk-table-divider > :not(:first-child) > tr,
.uk-card-primary > :not([class*='uk-card-media']) .uk-table-divider > :first-child > tr:not(:first-child),
.uk-card-secondary.uk-card-body .uk-table-divider > tr:not(:first-child),
.uk-card-secondary.uk-card-body .uk-table-divider > :not(:first-child) > tr,
.uk-card-secondary.uk-card-body .uk-table-divider > :first-child > tr:not(:first-child),
.uk-card-secondary > :not([class*='uk-card-media']) .uk-table-divider > tr:not(:first-child),
.uk-card-secondary > :not([class*='uk-card-media']) .uk-table-divider > :not(:first-child) > tr,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-table-divider > :first-child > tr:not(:first-child),
.uk-overlay-primary .uk-table-divider > tr:not(:first-child),
.uk-overlay-primary .uk-table-divider > :not(:first-child) > tr,
.uk-overlay-primary .uk-table-divider > :first-child > tr:not(:first-child),
.uk-offcanvas-bar .uk-table-divider > tr:not(:first-child),
.uk-offcanvas-bar .uk-table-divider > :not(:first-child) > tr,
.uk-offcanvas-bar .uk-table-divider > :first-child > tr:not(:first-child) {
  border-top-color: rgba(255, 255, 255, 0.2);
}
.uk-light .uk-table-striped > tr:nth-of-type(odd),
.uk-light .uk-table-striped tbody tr:nth-of-type(odd),
.uk-section-primary:not(.uk-preserve-color) .uk-table-striped > tr:nth-of-type(odd),
.uk-section-primary:not(.uk-preserve-color) .uk-table-striped tbody tr:nth-of-type(odd),
.uk-section-secondary:not(.uk-preserve-color) .uk-table-striped > tr:nth-of-type(odd),
.uk-section-secondary:not(.uk-preserve-color) .uk-table-striped tbody tr:nth-of-type(odd),
.uk-tile-primary:not(.uk-preserve-color) .uk-table-striped > tr:nth-of-type(odd),
.uk-tile-primary:not(.uk-preserve-color) .uk-table-striped tbody tr:nth-of-type(odd),
.uk-tile-secondary:not(.uk-preserve-color) .uk-table-striped > tr:nth-of-type(odd),
.uk-tile-secondary:not(.uk-preserve-color) .uk-table-striped tbody tr:nth-of-type(odd),
.uk-card-primary.uk-card-body .uk-table-striped > tr:nth-of-type(odd),
.uk-card-primary.uk-card-body .uk-table-striped tbody tr:nth-of-type(odd),
.uk-card-primary > :not([class*='uk-card-media']) .uk-table-striped > tr:nth-of-type(odd),
.uk-card-primary > :not([class*='uk-card-media']) .uk-table-striped tbody tr:nth-of-type(odd),
.uk-card-secondary.uk-card-body .uk-table-striped > tr:nth-of-type(odd),
.uk-card-secondary.uk-card-body .uk-table-striped tbody tr:nth-of-type(odd),
.uk-card-secondary > :not([class*='uk-card-media']) .uk-table-striped > tr:nth-of-type(odd),
.uk-card-secondary > :not([class*='uk-card-media']) .uk-table-striped tbody tr:nth-of-type(odd),
.uk-overlay-primary .uk-table-striped > tr:nth-of-type(odd),
.uk-overlay-primary .uk-table-striped tbody tr:nth-of-type(odd),
.uk-offcanvas-bar .uk-table-striped > tr:nth-of-type(odd),
.uk-offcanvas-bar .uk-table-striped tbody tr:nth-of-type(odd) {
  background: rgba(255, 255, 255, 0.1);
  border-top-color: rgba(255, 255, 255, 0.2);
  border-bottom-color: rgba(255, 255, 255, 0.2);
}
.uk-light .uk-table-hover > tr:hover,
.uk-light .uk-table-hover tbody tr:hover,
.uk-section-primary:not(.uk-preserve-color) .uk-table-hover > tr:hover,
.uk-section-primary:not(.uk-preserve-color) .uk-table-hover tbody tr:hover,
.uk-section-secondary:not(.uk-preserve-color) .uk-table-hover > tr:hover,
.uk-section-secondary:not(.uk-preserve-color) .uk-table-hover tbody tr:hover,
.uk-tile-primary:not(.uk-preserve-color) .uk-table-hover > tr:hover,
.uk-tile-primary:not(.uk-preserve-color) .uk-table-hover tbody tr:hover,
.uk-tile-secondary:not(.uk-preserve-color) .uk-table-hover > tr:hover,
.uk-tile-secondary:not(.uk-preserve-color) .uk-table-hover tbody tr:hover,
.uk-card-primary.uk-card-body .uk-table-hover > tr:hover,
.uk-card-primary.uk-card-body .uk-table-hover tbody tr:hover,
.uk-card-primary > :not([class*='uk-card-media']) .uk-table-hover > tr:hover,
.uk-card-primary > :not([class*='uk-card-media']) .uk-table-hover tbody tr:hover,
.uk-card-secondary.uk-card-body .uk-table-hover > tr:hover,
.uk-card-secondary.uk-card-body .uk-table-hover tbody tr:hover,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-table-hover > tr:hover,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-table-hover tbody tr:hover,
.uk-overlay-primary .uk-table-hover > tr:hover,
.uk-overlay-primary .uk-table-hover tbody tr:hover,
.uk-offcanvas-bar .uk-table-hover > tr:hover,
.uk-offcanvas-bar .uk-table-hover tbody tr:hover {
  background: rgba(255, 255, 255, 0.08);
}
.uk-light .uk-icon-link,
.uk-section-primary:not(.uk-preserve-color) .uk-icon-link,
.uk-section-secondary:not(.uk-preserve-color) .uk-icon-link,
.uk-tile-primary:not(.uk-preserve-color) .uk-icon-link,
.uk-tile-secondary:not(.uk-preserve-color) .uk-icon-link,
.uk-card-primary.uk-card-body .uk-icon-link,
.uk-card-primary > :not([class*='uk-card-media']) .uk-icon-link,
.uk-card-secondary.uk-card-body .uk-icon-link,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-icon-link,
.uk-overlay-primary .uk-icon-link,
.uk-offcanvas-bar .uk-icon-link {
  color: rgba(255, 255, 255, 0.5);
}
.uk-light .uk-icon-link:hover,
.uk-section-primary:not(.uk-preserve-color) .uk-icon-link:hover,
.uk-section-secondary:not(.uk-preserve-color) .uk-icon-link:hover,
.uk-tile-primary:not(.uk-preserve-color) .uk-icon-link:hover,
.uk-tile-secondary:not(.uk-preserve-color) .uk-icon-link:hover,
.uk-card-primary.uk-card-body .uk-icon-link:hover,
.uk-card-primary > :not([class*='uk-card-media']) .uk-icon-link:hover,
.uk-card-secondary.uk-card-body .uk-icon-link:hover,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-icon-link:hover,
.uk-overlay-primary .uk-icon-link:hover,
.uk-offcanvas-bar .uk-icon-link:hover {
  color: rgba(255, 255, 255, 0.7);
}
.uk-light .uk-icon-link:active,
.uk-light .uk-active > .uk-icon-link,
.uk-section-primary:not(.uk-preserve-color) .uk-icon-link:active,
.uk-section-primary:not(.uk-preserve-color) .uk-active > .uk-icon-link,
.uk-section-secondary:not(.uk-preserve-color) .uk-icon-link:active,
.uk-section-secondary:not(.uk-preserve-color) .uk-active > .uk-icon-link,
.uk-tile-primary:not(.uk-preserve-color) .uk-icon-link:active,
.uk-tile-primary:not(.uk-preserve-color) .uk-active > .uk-icon-link,
.uk-tile-secondary:not(.uk-preserve-color) .uk-icon-link:active,
.uk-tile-secondary:not(.uk-preserve-color) .uk-active > .uk-icon-link,
.uk-card-primary.uk-card-body .uk-icon-link:active,
.uk-card-primary.uk-card-body .uk-active > .uk-icon-link,
.uk-card-primary > :not([class*='uk-card-media']) .uk-icon-link:active,
.uk-card-primary > :not([class*='uk-card-media']) .uk-active > .uk-icon-link,
.uk-card-secondary.uk-card-body .uk-icon-link:active,
.uk-card-secondary.uk-card-body .uk-active > .uk-icon-link,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-icon-link:active,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-active > .uk-icon-link,
.uk-overlay-primary .uk-icon-link:active,
.uk-overlay-primary .uk-active > .uk-icon-link,
.uk-offcanvas-bar .uk-icon-link:active,
.uk-offcanvas-bar .uk-active > .uk-icon-link {
  color: rgba(255, 255, 255, 0.7);
}
.uk-light .uk-icon-button,
.uk-section-primary:not(.uk-preserve-color) .uk-icon-button,
.uk-section-secondary:not(.uk-preserve-color) .uk-icon-button,
.uk-tile-primary:not(.uk-preserve-color) .uk-icon-button,
.uk-tile-secondary:not(.uk-preserve-color) .uk-icon-button,
.uk-card-primary.uk-card-body .uk-icon-button,
.uk-card-primary > :not([class*='uk-card-media']) .uk-icon-button,
.uk-card-secondary.uk-card-body .uk-icon-button,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-icon-button,
.uk-overlay-primary .uk-icon-button,
.uk-offcanvas-bar .uk-icon-button {
  background-color: rgba(255, 255, 255, 0.1);
  color: rgba(255, 255, 255, 0.5);
}
.uk-light .uk-icon-button:hover,
.uk-section-primary:not(.uk-preserve-color) .uk-icon-button:hover,
.uk-section-secondary:not(.uk-preserve-color) .uk-icon-button:hover,
.uk-tile-primary:not(.uk-preserve-color) .uk-icon-button:hover,
.uk-tile-secondary:not(.uk-preserve-color) .uk-icon-button:hover,
.uk-card-primary.uk-card-body .uk-icon-button:hover,
.uk-card-primary > :not([class*='uk-card-media']) .uk-icon-button:hover,
.uk-card-secondary.uk-card-body .uk-icon-button:hover,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-icon-button:hover,
.uk-overlay-primary .uk-icon-button:hover,
.uk-offcanvas-bar .uk-icon-button:hover {
  background-color: rgba(255, 255, 255, 0.15);
  color: rgba(255, 255, 255, 0.7);
}
.uk-light .uk-icon-button:active,
.uk-section-primary:not(.uk-preserve-color) .uk-icon-button:active,
.uk-section-secondary:not(.uk-preserve-color) .uk-icon-button:active,
.uk-tile-primary:not(.uk-preserve-color) .uk-icon-button:active,
.uk-tile-secondary:not(.uk-preserve-color) .uk-icon-button:active,
.uk-card-primary.uk-card-body .uk-icon-button:active,
.uk-card-primary > :not([class*='uk-card-media']) .uk-icon-button:active,
.uk-card-secondary.uk-card-body .uk-icon-button:active,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-icon-button:active,
.uk-overlay-primary .uk-icon-button:active,
.uk-offcanvas-bar .uk-icon-button:active {
  background-color: rgba(255, 255, 255, 0.2);
  color: rgba(255, 255, 255, 0.7);
}
.uk-light .uk-input,
.uk-light .uk-select,
.uk-light .uk-textarea,
.uk-section-primary:not(.uk-preserve-color) .uk-input,
.uk-section-primary:not(.uk-preserve-color) .uk-select,
.uk-section-primary:not(.uk-preserve-color) .uk-textarea,
.uk-section-secondary:not(.uk-preserve-color) .uk-input,
.uk-section-secondary:not(.uk-preserve-color) .uk-select,
.uk-section-secondary:not(.uk-preserve-color) .uk-textarea,
.uk-tile-primary:not(.uk-preserve-color) .uk-input,
.uk-tile-primary:not(.uk-preserve-color) .uk-select,
.uk-tile-primary:not(.uk-preserve-color) .uk-textarea,
.uk-tile-secondary:not(.uk-preserve-color) .uk-input,
.uk-tile-secondary:not(.uk-preserve-color) .uk-select,
.uk-tile-secondary:not(.uk-preserve-color) .uk-textarea,
.uk-card-primary.uk-card-body .uk-input,
.uk-card-primary.uk-card-body .uk-select,
.uk-card-primary.uk-card-body .uk-textarea,
.uk-card-primary > :not([class*='uk-card-media']) .uk-input,
.uk-card-primary > :not([class*='uk-card-media']) .uk-select,
.uk-card-primary > :not([class*='uk-card-media']) .uk-textarea,
.uk-card-secondary.uk-card-body .uk-input,
.uk-card-secondary.uk-card-body .uk-select,
.uk-card-secondary.uk-card-body .uk-textarea,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-input,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-select,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-textarea,
.uk-overlay-primary .uk-input,
.uk-overlay-primary .uk-select,
.uk-overlay-primary .uk-textarea,
.uk-offcanvas-bar .uk-input,
.uk-offcanvas-bar .uk-select,
.uk-offcanvas-bar .uk-textarea {
  background-color: rgba(255, 255, 255, 0.1);
  color: rgba(255, 255, 255, 0.7);
  background-clip: padding-box;
  border-color: rgba(255, 255, 255, 0.2);
}
.uk-light .uk-input:focus,
.uk-light .uk-select:focus,
.uk-light .uk-textarea:focus,
.uk-section-primary:not(.uk-preserve-color) .uk-input:focus,
.uk-section-primary:not(.uk-preserve-color) .uk-select:focus,
.uk-section-primary:not(.uk-preserve-color) .uk-textarea:focus,
.uk-section-secondary:not(.uk-preserve-color) .uk-input:focus,
.uk-section-secondary:not(.uk-preserve-color) .uk-select:focus,
.uk-section-secondary:not(.uk-preserve-color) .uk-textarea:focus,
.uk-tile-primary:not(.uk-preserve-color) .uk-input:focus,
.uk-tile-primary:not(.uk-preserve-color) .uk-select:focus,
.uk-tile-primary:not(.uk-preserve-color) .uk-textarea:focus,
.uk-tile-secondary:not(.uk-preserve-color) .uk-input:focus,
.uk-tile-secondary:not(.uk-preserve-color) .uk-select:focus,
.uk-tile-secondary:not(.uk-preserve-color) .uk-textarea:focus,
.uk-card-primary.uk-card-body .uk-input:focus,
.uk-card-primary.uk-card-body .uk-select:focus,
.uk-card-primary.uk-card-body .uk-textarea:focus,
.uk-card-primary > :not([class*='uk-card-media']) .uk-input:focus,
.uk-card-primary > :not([class*='uk-card-media']) .uk-select:focus,
.uk-card-primary > :not([class*='uk-card-media']) .uk-textarea:focus,
.uk-card-secondary.uk-card-body .uk-input:focus,
.uk-card-secondary.uk-card-body .uk-select:focus,
.uk-card-secondary.uk-card-body .uk-textarea:focus,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-input:focus,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-select:focus,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-textarea:focus,
.uk-overlay-primary .uk-input:focus,
.uk-overlay-primary .uk-select:focus,
.uk-overlay-primary .uk-textarea:focus,
.uk-offcanvas-bar .uk-input:focus,
.uk-offcanvas-bar .uk-select:focus,
.uk-offcanvas-bar .uk-textarea:focus {
  background-color: rgba(255, 255, 255, 0.15);
  color: rgba(255, 255, 255, 0.7);
  border-color: rgba(255, 255, 255, 0.7);
}
.uk-light .uk-input::placeholder,
.uk-section-primary:not(.uk-preserve-color) .uk-input::placeholder,
.uk-section-secondary:not(.uk-preserve-color) .uk-input::placeholder,
.uk-tile-primary:not(.uk-preserve-color) .uk-input::placeholder,
.uk-tile-secondary:not(.uk-preserve-color) .uk-input::placeholder,
.uk-card-primary.uk-card-body .uk-input::placeholder,
.uk-card-primary > :not([class*='uk-card-media']) .uk-input::placeholder,
.uk-card-secondary.uk-card-body .uk-input::placeholder,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-input::placeholder,
.uk-overlay-primary .uk-input::placeholder,
.uk-offcanvas-bar .uk-input::placeholder {
  color: rgba(255, 255, 255, 0.5);
}
.uk-light .uk-textarea::placeholder,
.uk-section-primary:not(.uk-preserve-color) .uk-textarea::placeholder,
.uk-section-secondary:not(.uk-preserve-color) .uk-textarea::placeholder,
.uk-tile-primary:not(.uk-preserve-color) .uk-textarea::placeholder,
.uk-tile-secondary:not(.uk-preserve-color) .uk-textarea::placeholder,
.uk-card-primary.uk-card-body .uk-textarea::placeholder,
.uk-card-primary > :not([class*='uk-card-media']) .uk-textarea::placeholder,
.uk-card-secondary.uk-card-body .uk-textarea::placeholder,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-textarea::placeholder,
.uk-overlay-primary .uk-textarea::placeholder,
.uk-offcanvas-bar .uk-textarea::placeholder {
  color: rgba(255, 255, 255, 0.5);
}
.uk-light .uk-select:not([multiple]):not([size]),
.uk-section-primary:not(.uk-preserve-color) .uk-select:not([multiple]):not([size]),
.uk-section-secondary:not(.uk-preserve-color) .uk-select:not([multiple]):not([size]),
.uk-tile-primary:not(.uk-preserve-color) .uk-select:not([multiple]):not([size]),
.uk-tile-secondary:not(.uk-preserve-color) .uk-select:not([multiple]):not([size]),
.uk-card-primary.uk-card-body .uk-select:not([multiple]):not([size]),
.uk-card-primary > :not([class*='uk-card-media']) .uk-select:not([multiple]):not([size]),
.uk-card-secondary.uk-card-body .uk-select:not([multiple]):not([size]),
.uk-card-secondary > :not([class*='uk-card-media']) .uk-select:not([multiple]):not([size]),
.uk-overlay-primary .uk-select:not([multiple]):not([size]),
.uk-offcanvas-bar .uk-select:not([multiple]):not([size]) {
  background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2224%22%20height%3D%2216%22%20viewBox%3D%220%200%2024%2016%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%0A%20%20%20%20%3Cpolygon%20fill%3D%22rgba%28255,%20255,%20255,%200.7%29%22%20points%3D%2212%201%209%206%2015%206%22%20%2F%3E%0A%20%20%20%20%3Cpolygon%20fill%3D%22rgba%28255,%20255,%20255,%200.7%29%22%20points%3D%2212%2013%209%208%2015%208%22%20%2F%3E%0A%3C%2Fsvg%3E%0A");
}
.uk-light .uk-input[list]:hover,
.uk-light .uk-input[list]:focus,
.uk-section-primary:not(.uk-preserve-color) .uk-input[list]:hover,
.uk-section-primary:not(.uk-preserve-color) .uk-input[list]:focus,
.uk-section-secondary:not(.uk-preserve-color) .uk-input[list]:hover,
.uk-section-secondary:not(.uk-preserve-color) .uk-input[list]:focus,
.uk-tile-primary:not(.uk-preserve-color) .uk-input[list]:hover,
.uk-tile-primary:not(.uk-preserve-color) .uk-input[list]:focus,
.uk-tile-secondary:not(.uk-preserve-color) .uk-input[list]:hover,
.uk-tile-secondary:not(.uk-preserve-color) .uk-input[list]:focus,
.uk-card-primary.uk-card-body .uk-input[list]:hover,
.uk-card-primary.uk-card-body .uk-input[list]:focus,
.uk-card-primary > :not([class*='uk-card-media']) .uk-input[list]:hover,
.uk-card-primary > :not([class*='uk-card-media']) .uk-input[list]:focus,
.uk-card-secondary.uk-card-body .uk-input[list]:hover,
.uk-card-secondary.uk-card-body .uk-input[list]:focus,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-input[list]:hover,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-input[list]:focus,
.uk-overlay-primary .uk-input[list]:hover,
.uk-overlay-primary .uk-input[list]:focus,
.uk-offcanvas-bar .uk-input[list]:hover,
.uk-offcanvas-bar .uk-input[list]:focus {
  background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2224%22%20height%3D%2216%22%20viewBox%3D%220%200%2024%2016%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%0A%20%20%20%20%3Cpolygon%20fill%3D%22rgba%28255,%20255,%20255,%200.7%29%22%20points%3D%2212%2012%208%206%2016%206%22%20%2F%3E%0A%3C%2Fsvg%3E%0A");
}
.uk-light .uk-radio,
.uk-light .uk-checkbox,
.uk-section-primary:not(.uk-preserve-color) .uk-radio,
.uk-section-primary:not(.uk-preserve-color) .uk-checkbox,
.uk-section-secondary:not(.uk-preserve-color) .uk-radio,
.uk-section-secondary:not(.uk-preserve-color) .uk-checkbox,
.uk-tile-primary:not(.uk-preserve-color) .uk-radio,
.uk-tile-primary:not(.uk-preserve-color) .uk-checkbox,
.uk-tile-secondary:not(.uk-preserve-color) .uk-radio,
.uk-tile-secondary:not(.uk-preserve-color) .uk-checkbox,
.uk-card-primary.uk-card-body .uk-radio,
.uk-card-primary.uk-card-body .uk-checkbox,
.uk-card-primary > :not([class*='uk-card-media']) .uk-radio,
.uk-card-primary > :not([class*='uk-card-media']) .uk-checkbox,
.uk-card-secondary.uk-card-body .uk-radio,
.uk-card-secondary.uk-card-body .uk-checkbox,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-radio,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-checkbox,
.uk-overlay-primary .uk-radio,
.uk-overlay-primary .uk-checkbox,
.uk-offcanvas-bar .uk-radio,
.uk-offcanvas-bar .uk-checkbox {
  background-color: rgba(255, 255, 255, 0.1);
  border-color: rgba(255, 255, 255, 0.2);
}
.uk-light .uk-radio:focus,
.uk-light .uk-checkbox:focus,
.uk-section-primary:not(.uk-preserve-color) .uk-radio:focus,
.uk-section-primary:not(.uk-preserve-color) .uk-checkbox:focus,
.uk-section-secondary:not(.uk-preserve-color) .uk-radio:focus,
.uk-section-secondary:not(.uk-preserve-color) .uk-checkbox:focus,
.uk-tile-primary:not(.uk-preserve-color) .uk-radio:focus,
.uk-tile-primary:not(.uk-preserve-color) .uk-checkbox:focus,
.uk-tile-secondary:not(.uk-preserve-color) .uk-radio:focus,
.uk-tile-secondary:not(.uk-preserve-color) .uk-checkbox:focus,
.uk-card-primary.uk-card-body .uk-radio:focus,
.uk-card-primary.uk-card-body .uk-checkbox:focus,
.uk-card-primary > :not([class*='uk-card-media']) .uk-radio:focus,
.uk-card-primary > :not([class*='uk-card-media']) .uk-checkbox:focus,
.uk-card-secondary.uk-card-body .uk-radio:focus,
.uk-card-secondary.uk-card-body .uk-checkbox:focus,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-radio:focus,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-checkbox:focus,
.uk-overlay-primary .uk-radio:focus,
.uk-overlay-primary .uk-checkbox:focus,
.uk-offcanvas-bar .uk-radio:focus,
.uk-offcanvas-bar .uk-checkbox:focus {
  background-color: rgba(255, 255, 255, 0.15);
  border-color: rgba(255, 255, 255, 0.7);
}
.uk-light .uk-radio:checked,
.uk-light .uk-checkbox:checked,
.uk-light .uk-checkbox:indeterminate,
.uk-section-primary:not(.uk-preserve-color) .uk-radio:checked,
.uk-section-primary:not(.uk-preserve-color) .uk-checkbox:checked,
.uk-section-primary:not(.uk-preserve-color) .uk-checkbox:indeterminate,
.uk-section-secondary:not(.uk-preserve-color) .uk-radio:checked,
.uk-section-secondary:not(.uk-preserve-color) .uk-checkbox:checked,
.uk-section-secondary:not(.uk-preserve-color) .uk-checkbox:indeterminate,
.uk-tile-primary:not(.uk-preserve-color) .uk-radio:checked,
.uk-tile-primary:not(.uk-preserve-color) .uk-checkbox:checked,
.uk-tile-primary:not(.uk-preserve-color) .uk-checkbox:indeterminate,
.uk-tile-secondary:not(.uk-preserve-color) .uk-radio:checked,
.uk-tile-secondary:not(.uk-preserve-color) .uk-checkbox:checked,
.uk-tile-secondary:not(.uk-preserve-color) .uk-checkbox:indeterminate,
.uk-card-primary.uk-card-body .uk-radio:checked,
.uk-card-primary.uk-card-body .uk-checkbox:checked,
.uk-card-primary.uk-card-body .uk-checkbox:indeterminate,
.uk-card-primary > :not([class*='uk-card-media']) .uk-radio:checked,
.uk-card-primary > :not([class*='uk-card-media']) .uk-checkbox:checked,
.uk-card-primary > :not([class*='uk-card-media']) .uk-checkbox:indeterminate,
.uk-card-secondary.uk-card-body .uk-radio:checked,
.uk-card-secondary.uk-card-body .uk-checkbox:checked,
.uk-card-secondary.uk-card-body .uk-checkbox:indeterminate,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-radio:checked,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-checkbox:checked,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-checkbox:indeterminate,
.uk-overlay-primary .uk-radio:checked,
.uk-overlay-primary .uk-checkbox:checked,
.uk-overlay-primary .uk-checkbox:indeterminate,
.uk-offcanvas-bar .uk-radio:checked,
.uk-offcanvas-bar .uk-checkbox:checked,
.uk-offcanvas-bar .uk-checkbox:indeterminate {
  background-color: #fff;
  border-color: #fff;
}
.uk-light .uk-radio:checked:focus,
.uk-light .uk-checkbox:checked:focus,
.uk-light .uk-checkbox:indeterminate:focus,
.uk-section-primary:not(.uk-preserve-color) .uk-radio:checked:focus,
.uk-section-primary:not(.uk-preserve-color) .uk-checkbox:checked:focus,
.uk-section-primary:not(.uk-preserve-color) .uk-checkbox:indeterminate:focus,
.uk-section-secondary:not(.uk-preserve-color) .uk-radio:checked:focus,
.uk-section-secondary:not(.uk-preserve-color) .uk-checkbox:checked:focus,
.uk-section-secondary:not(.uk-preserve-color) .uk-checkbox:indeterminate:focus,
.uk-tile-primary:not(.uk-preserve-color) .uk-radio:checked:focus,
.uk-tile-primary:not(.uk-preserve-color) .uk-checkbox:checked:focus,
.uk-tile-primary:not(.uk-preserve-color) .uk-checkbox:indeterminate:focus,
.uk-tile-secondary:not(.uk-preserve-color) .uk-radio:checked:focus,
.uk-tile-secondary:not(.uk-preserve-color) .uk-checkbox:checked:focus,
.uk-tile-secondary:not(.uk-preserve-color) .uk-checkbox:indeterminate:focus,
.uk-card-primary.uk-card-body .uk-radio:checked:focus,
.uk-card-primary.uk-card-body .uk-checkbox:checked:focus,
.uk-card-primary.uk-card-body .uk-checkbox:indeterminate:focus,
.uk-card-primary > :not([class*='uk-card-media']) .uk-radio:checked:focus,
.uk-card-primary > :not([class*='uk-card-media']) .uk-checkbox:checked:focus,
.uk-card-primary > :not([class*='uk-card-media']) .uk-checkbox:indeterminate:focus,
.uk-card-secondary.uk-card-body .uk-radio:checked:focus,
.uk-card-secondary.uk-card-body .uk-checkbox:checked:focus,
.uk-card-secondary.uk-card-body .uk-checkbox:indeterminate:focus,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-radio:checked:focus,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-checkbox:checked:focus,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-checkbox:indeterminate:focus,
.uk-overlay-primary .uk-radio:checked:focus,
.uk-overlay-primary .uk-checkbox:checked:focus,
.uk-overlay-primary .uk-checkbox:indeterminate:focus,
.uk-offcanvas-bar .uk-radio:checked:focus,
.uk-offcanvas-bar .uk-checkbox:checked:focus,
.uk-offcanvas-bar .uk-checkbox:indeterminate:focus {
  background-color: #ffffff;
}
.uk-light .uk-radio:checked,
.uk-section-primary:not(.uk-preserve-color) .uk-radio:checked,
.uk-section-secondary:not(.uk-preserve-color) .uk-radio:checked,
.uk-tile-primary:not(.uk-preserve-color) .uk-radio:checked,
.uk-tile-secondary:not(.uk-preserve-color) .uk-radio:checked,
.uk-card-primary.uk-card-body .uk-radio:checked,
.uk-card-primary > :not([class*='uk-card-media']) .uk-radio:checked,
.uk-card-secondary.uk-card-body .uk-radio:checked,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-radio:checked,
.uk-overlay-primary .uk-radio:checked,
.uk-offcanvas-bar .uk-radio:checked {
  background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2216%22%20height%3D%2216%22%20viewBox%3D%220%200%2016%2016%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%0A%20%20%20%20%3Ccircle%20fill%3D%22%23666%22%20cx%3D%228%22%20cy%3D%228%22%20r%3D%222%22%20%2F%3E%0A%3C%2Fsvg%3E");
}
.uk-light .uk-checkbox:checked,
.uk-section-primary:not(.uk-preserve-color) .uk-checkbox:checked,
.uk-section-secondary:not(.uk-preserve-color) .uk-checkbox:checked,
.uk-tile-primary:not(.uk-preserve-color) .uk-checkbox:checked,
.uk-tile-secondary:not(.uk-preserve-color) .uk-checkbox:checked,
.uk-card-primary.uk-card-body .uk-checkbox:checked,
.uk-card-primary > :not([class*='uk-card-media']) .uk-checkbox:checked,
.uk-card-secondary.uk-card-body .uk-checkbox:checked,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-checkbox:checked,
.uk-overlay-primary .uk-checkbox:checked,
.uk-offcanvas-bar .uk-checkbox:checked {
  background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2214%22%20height%3D%2211%22%20viewBox%3D%220%200%2014%2011%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%0A%20%20%20%20%3Cpolygon%20fill%3D%22%23666%22%20points%3D%2212%201%205%207.5%202%205%201%205.5%205%2010%2013%201.5%22%20%2F%3E%0A%3C%2Fsvg%3E%0A");
}
.uk-light .uk-checkbox:indeterminate,
.uk-section-primary:not(.uk-preserve-color) .uk-checkbox:indeterminate,
.uk-section-secondary:not(.uk-preserve-color) .uk-checkbox:indeterminate,
.uk-tile-primary:not(.uk-preserve-color) .uk-checkbox:indeterminate,
.uk-tile-secondary:not(.uk-preserve-color) .uk-checkbox:indeterminate,
.uk-card-primary.uk-card-body .uk-checkbox:indeterminate,
.uk-card-primary > :not([class*='uk-card-media']) .uk-checkbox:indeterminate,
.uk-card-secondary.uk-card-body .uk-checkbox:indeterminate,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-checkbox:indeterminate,
.uk-overlay-primary .uk-checkbox:indeterminate,
.uk-offcanvas-bar .uk-checkbox:indeterminate {
  background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2216%22%20height%3D%2216%22%20viewBox%3D%220%200%2016%2016%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%0A%20%20%20%20%3Crect%20fill%3D%22%23666%22%20x%3D%223%22%20y%3D%228%22%20width%3D%2210%22%20height%3D%221%22%20%2F%3E%0A%3C%2Fsvg%3E");
}
.uk-light .uk-form-label,
.uk-section-primary:not(.uk-preserve-color) .uk-form-label,
.uk-section-secondary:not(.uk-preserve-color) .uk-form-label,
.uk-tile-primary:not(.uk-preserve-color) .uk-form-label,
.uk-tile-secondary:not(.uk-preserve-color) .uk-form-label,
.uk-card-primary.uk-card-body .uk-form-label,
.uk-card-primary > :not([class*='uk-card-media']) .uk-form-label,
.uk-card-secondary.uk-card-body .uk-form-label,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-form-label,
.uk-overlay-primary .uk-form-label,
.uk-offcanvas-bar .uk-form-label {
  color: #fff;
}
.uk-light .uk-form-icon,
.uk-section-primary:not(.uk-preserve-color) .uk-form-icon,
.uk-section-secondary:not(.uk-preserve-color) .uk-form-icon,
.uk-tile-primary:not(.uk-preserve-color) .uk-form-icon,
.uk-tile-secondary:not(.uk-preserve-color) .uk-form-icon,
.uk-card-primary.uk-card-body .uk-form-icon,
.uk-card-primary > :not([class*='uk-card-media']) .uk-form-icon,
.uk-card-secondary.uk-card-body .uk-form-icon,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-form-icon,
.uk-overlay-primary .uk-form-icon,
.uk-offcanvas-bar .uk-form-icon {
  color: rgba(255, 255, 255, 0.5);
}
.uk-light .uk-form-icon:hover,
.uk-section-primary:not(.uk-preserve-color) .uk-form-icon:hover,
.uk-section-secondary:not(.uk-preserve-color) .uk-form-icon:hover,
.uk-tile-primary:not(.uk-preserve-color) .uk-form-icon:hover,
.uk-tile-secondary:not(.uk-preserve-color) .uk-form-icon:hover,
.uk-card-primary.uk-card-body .uk-form-icon:hover,
.uk-card-primary > :not([class*='uk-card-media']) .uk-form-icon:hover,
.uk-card-secondary.uk-card-body .uk-form-icon:hover,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-form-icon:hover,
.uk-overlay-primary .uk-form-icon:hover,
.uk-offcanvas-bar .uk-form-icon:hover {
  color: rgba(255, 255, 255, 0.7);
}
.uk-light .uk-button-default,
.uk-section-primary:not(.uk-preserve-color) .uk-button-default,
.uk-section-secondary:not(.uk-preserve-color) .uk-button-default,
.uk-tile-primary:not(.uk-preserve-color) .uk-button-default,
.uk-tile-secondary:not(.uk-preserve-color) .uk-button-default,
.uk-card-primary.uk-card-body .uk-button-default,
.uk-card-primary > :not([class*='uk-card-media']) .uk-button-default,
.uk-card-secondary.uk-card-body .uk-button-default,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-button-default,
.uk-overlay-primary .uk-button-default,
.uk-offcanvas-bar .uk-button-default {
  background-color: transparent;
  color: #fff;
  border-color: rgba(255, 255, 255, 0.7);
}
.uk-light .uk-button-default:hover,
.uk-section-primary:not(.uk-preserve-color) .uk-button-default:hover,
.uk-section-secondary:not(.uk-preserve-color) .uk-button-default:hover,
.uk-tile-primary:not(.uk-preserve-color) .uk-button-default:hover,
.uk-tile-secondary:not(.uk-preserve-color) .uk-button-default:hover,
.uk-card-primary.uk-card-body .uk-button-default:hover,
.uk-card-primary > :not([class*='uk-card-media']) .uk-button-default:hover,
.uk-card-secondary.uk-card-body .uk-button-default:hover,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-button-default:hover,
.uk-overlay-primary .uk-button-default:hover,
.uk-offcanvas-bar .uk-button-default:hover {
  background-color: transparent;
  color: #fff;
  border-color: #fff;
}
.uk-light .uk-button-default:active,
.uk-light .uk-button-default.uk-active,
.uk-section-primary:not(.uk-preserve-color) .uk-button-default:active,
.uk-section-primary:not(.uk-preserve-color) .uk-button-default.uk-active,
.uk-section-secondary:not(.uk-preserve-color) .uk-button-default:active,
.uk-section-secondary:not(.uk-preserve-color) .uk-button-default.uk-active,
.uk-tile-primary:not(.uk-preserve-color) .uk-button-default:active,
.uk-tile-primary:not(.uk-preserve-color) .uk-button-default.uk-active,
.uk-tile-secondary:not(.uk-preserve-color) .uk-button-default:active,
.uk-tile-secondary:not(.uk-preserve-color) .uk-button-default.uk-active,
.uk-card-primary.uk-card-body .uk-button-default:active,
.uk-card-primary.uk-card-body .uk-button-default.uk-active,
.uk-card-primary > :not([class*='uk-card-media']) .uk-button-default:active,
.uk-card-primary > :not([class*='uk-card-media']) .uk-button-default.uk-active,
.uk-card-secondary.uk-card-body .uk-button-default:active,
.uk-card-secondary.uk-card-body .uk-button-default.uk-active,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-button-default:active,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-button-default.uk-active,
.uk-overlay-primary .uk-button-default:active,
.uk-overlay-primary .uk-button-default.uk-active,
.uk-offcanvas-bar .uk-button-default:active,
.uk-offcanvas-bar .uk-button-default.uk-active {
  background-color: transparent;
  color: #fff;
  border-color: #fff;
}
.uk-light .uk-button-primary,
.uk-section-primary:not(.uk-preserve-color) .uk-button-primary,
.uk-section-secondary:not(.uk-preserve-color) .uk-button-primary,
.uk-tile-primary:not(.uk-preserve-color) .uk-button-primary,
.uk-tile-secondary:not(.uk-preserve-color) .uk-button-primary,
.uk-card-primary.uk-card-body .uk-button-primary,
.uk-card-primary > :not([class*='uk-card-media']) .uk-button-primary,
.uk-card-secondary.uk-card-body .uk-button-primary,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-button-primary,
.uk-overlay-primary .uk-button-primary,
.uk-offcanvas-bar .uk-button-primary {
  background-color: #fff;
  color: #666;
}
.uk-light .uk-button-primary:hover,
.uk-section-primary:not(.uk-preserve-color) .uk-button-primary:hover,
.uk-section-secondary:not(.uk-preserve-color) .uk-button-primary:hover,
.uk-tile-primary:not(.uk-preserve-color) .uk-button-primary:hover,
.uk-tile-secondary:not(.uk-preserve-color) .uk-button-primary:hover,
.uk-card-primary.uk-card-body .uk-button-primary:hover,
.uk-card-primary > :not([class*='uk-card-media']) .uk-button-primary:hover,
.uk-card-secondary.uk-card-body .uk-button-primary:hover,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-button-primary:hover,
.uk-overlay-primary .uk-button-primary:hover,
.uk-offcanvas-bar .uk-button-primary:hover {
  background-color: #f2f2f2;
  color: #666;
}
.uk-light .uk-button-primary:active,
.uk-light .uk-button-primary.uk-active,
.uk-section-primary:not(.uk-preserve-color) .uk-button-primary:active,
.uk-section-primary:not(.uk-preserve-color) .uk-button-primary.uk-active,
.uk-section-secondary:not(.uk-preserve-color) .uk-button-primary:active,
.uk-section-secondary:not(.uk-preserve-color) .uk-button-primary.uk-active,
.uk-tile-primary:not(.uk-preserve-color) .uk-button-primary:active,
.uk-tile-primary:not(.uk-preserve-color) .uk-button-primary.uk-active,
.uk-tile-secondary:not(.uk-preserve-color) .uk-button-primary:active,
.uk-tile-secondary:not(.uk-preserve-color) .uk-button-primary.uk-active,
.uk-card-primary.uk-card-body .uk-button-primary:active,
.uk-card-primary.uk-card-body .uk-button-primary.uk-active,
.uk-card-primary > :not([class*='uk-card-media']) .uk-button-primary:active,
.uk-card-primary > :not([class*='uk-card-media']) .uk-button-primary.uk-active,
.uk-card-secondary.uk-card-body .uk-button-primary:active,
.uk-card-secondary.uk-card-body .uk-button-primary.uk-active,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-button-primary:active,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-button-primary.uk-active,
.uk-overlay-primary .uk-button-primary:active,
.uk-overlay-primary .uk-button-primary.uk-active,
.uk-offcanvas-bar .uk-button-primary:active,
.uk-offcanvas-bar .uk-button-primary.uk-active {
  background-color: #e6e6e6;
  color: #666;
}
.uk-light .uk-button-secondary,
.uk-section-primary:not(.uk-preserve-color) .uk-button-secondary,
.uk-section-secondary:not(.uk-preserve-color) .uk-button-secondary,
.uk-tile-primary:not(.uk-preserve-color) .uk-button-secondary,
.uk-tile-secondary:not(.uk-preserve-color) .uk-button-secondary,
.uk-card-primary.uk-card-body .uk-button-secondary,
.uk-card-primary > :not([class*='uk-card-media']) .uk-button-secondary,
.uk-card-secondary.uk-card-body .uk-button-secondary,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-button-secondary,
.uk-overlay-primary .uk-button-secondary,
.uk-offcanvas-bar .uk-button-secondary {
  background-color: #fff;
  color: #666;
}
.uk-light .uk-button-secondary:hover,
.uk-section-primary:not(.uk-preserve-color) .uk-button-secondary:hover,
.uk-section-secondary:not(.uk-preserve-color) .uk-button-secondary:hover,
.uk-tile-primary:not(.uk-preserve-color) .uk-button-secondary:hover,
.uk-tile-secondary:not(.uk-preserve-color) .uk-button-secondary:hover,
.uk-card-primary.uk-card-body .uk-button-secondary:hover,
.uk-card-primary > :not([class*='uk-card-media']) .uk-button-secondary:hover,
.uk-card-secondary.uk-card-body .uk-button-secondary:hover,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-button-secondary:hover,
.uk-overlay-primary .uk-button-secondary:hover,
.uk-offcanvas-bar .uk-button-secondary:hover {
  background-color: #f2f2f2;
  color: #666;
}
.uk-light .uk-button-secondary:active,
.uk-light .uk-button-secondary.uk-active,
.uk-section-primary:not(.uk-preserve-color) .uk-button-secondary:active,
.uk-section-primary:not(.uk-preserve-color) .uk-button-secondary.uk-active,
.uk-section-secondary:not(.uk-preserve-color) .uk-button-secondary:active,
.uk-section-secondary:not(.uk-preserve-color) .uk-button-secondary.uk-active,
.uk-tile-primary:not(.uk-preserve-color) .uk-button-secondary:active,
.uk-tile-primary:not(.uk-preserve-color) .uk-button-secondary.uk-active,
.uk-tile-secondary:not(.uk-preserve-color) .uk-button-secondary:active,
.uk-tile-secondary:not(.uk-preserve-color) .uk-button-secondary.uk-active,
.uk-card-primary.uk-card-body .uk-button-secondary:active,
.uk-card-primary.uk-card-body .uk-button-secondary.uk-active,
.uk-card-primary > :not([class*='uk-card-media']) .uk-button-secondary:active,
.uk-card-primary > :not([class*='uk-card-media']) .uk-button-secondary.uk-active,
.uk-card-secondary.uk-card-body .uk-button-secondary:active,
.uk-card-secondary.uk-card-body .uk-button-secondary.uk-active,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-button-secondary:active,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-button-secondary.uk-active,
.uk-overlay-primary .uk-button-secondary:active,
.uk-overlay-primary .uk-button-secondary.uk-active,
.uk-offcanvas-bar .uk-button-secondary:active,
.uk-offcanvas-bar .uk-button-secondary.uk-active {
  background-color: #e6e6e6;
  color: #666;
}
.uk-light .uk-button-text,
.uk-section-primary:not(.uk-preserve-color) .uk-button-text,
.uk-section-secondary:not(.uk-preserve-color) .uk-button-text,
.uk-tile-primary:not(.uk-preserve-color) .uk-button-text,
.uk-tile-secondary:not(.uk-preserve-color) .uk-button-text,
.uk-card-primary.uk-card-body .uk-button-text,
.uk-card-primary > :not([class*='uk-card-media']) .uk-button-text,
.uk-card-secondary.uk-card-body .uk-button-text,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-button-text,
.uk-overlay-primary .uk-button-text,
.uk-offcanvas-bar .uk-button-text {
  color: #fff;
}
.uk-light .uk-button-text::before,
.uk-section-primary:not(.uk-preserve-color) .uk-button-text::before,
.uk-section-secondary:not(.uk-preserve-color) .uk-button-text::before,
.uk-tile-primary:not(.uk-preserve-color) .uk-button-text::before,
.uk-tile-secondary:not(.uk-preserve-color) .uk-button-text::before,
.uk-card-primary.uk-card-body .uk-button-text::before,
.uk-card-primary > :not([class*='uk-card-media']) .uk-button-text::before,
.uk-card-secondary.uk-card-body .uk-button-text::before,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-button-text::before,
.uk-overlay-primary .uk-button-text::before,
.uk-offcanvas-bar .uk-button-text::before {
  border-bottom-color: #fff;
}
.uk-light .uk-button-text:hover,
.uk-section-primary:not(.uk-preserve-color) .uk-button-text:hover,
.uk-section-secondary:not(.uk-preserve-color) .uk-button-text:hover,
.uk-tile-primary:not(.uk-preserve-color) .uk-button-text:hover,
.uk-tile-secondary:not(.uk-preserve-color) .uk-button-text:hover,
.uk-card-primary.uk-card-body .uk-button-text:hover,
.uk-card-primary > :not([class*='uk-card-media']) .uk-button-text:hover,
.uk-card-secondary.uk-card-body .uk-button-text:hover,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-button-text:hover,
.uk-overlay-primary .uk-button-text:hover,
.uk-offcanvas-bar .uk-button-text:hover {
  color: #fff;
}
.uk-light .uk-button-text:disabled,
.uk-section-primary:not(.uk-preserve-color) .uk-button-text:disabled,
.uk-section-secondary:not(.uk-preserve-color) .uk-button-text:disabled,
.uk-tile-primary:not(.uk-preserve-color) .uk-button-text:disabled,
.uk-tile-secondary:not(.uk-preserve-color) .uk-button-text:disabled,
.uk-card-primary.uk-card-body .uk-button-text:disabled,
.uk-card-primary > :not([class*='uk-card-media']) .uk-button-text:disabled,
.uk-card-secondary.uk-card-body .uk-button-text:disabled,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-button-text:disabled,
.uk-overlay-primary .uk-button-text:disabled,
.uk-offcanvas-bar .uk-button-text:disabled {
  color: rgba(255, 255, 255, 0.5);
}
.uk-light .uk-button-link,
.uk-section-primary:not(.uk-preserve-color) .uk-button-link,
.uk-section-secondary:not(.uk-preserve-color) .uk-button-link,
.uk-tile-primary:not(.uk-preserve-color) .uk-button-link,
.uk-tile-secondary:not(.uk-preserve-color) .uk-button-link,
.uk-card-primary.uk-card-body .uk-button-link,
.uk-card-primary > :not([class*='uk-card-media']) .uk-button-link,
.uk-card-secondary.uk-card-body .uk-button-link,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-button-link,
.uk-overlay-primary .uk-button-link,
.uk-offcanvas-bar .uk-button-link {
  color: #fff;
}
.uk-light .uk-button-link:hover,
.uk-section-primary:not(.uk-preserve-color) .uk-button-link:hover,
.uk-section-secondary:not(.uk-preserve-color) .uk-button-link:hover,
.uk-tile-primary:not(.uk-preserve-color) .uk-button-link:hover,
.uk-tile-secondary:not(.uk-preserve-color) .uk-button-link:hover,
.uk-card-primary.uk-card-body .uk-button-link:hover,
.uk-card-primary > :not([class*='uk-card-media']) .uk-button-link:hover,
.uk-card-secondary.uk-card-body .uk-button-link:hover,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-button-link:hover,
.uk-overlay-primary .uk-button-link:hover,
.uk-offcanvas-bar .uk-button-link:hover {
  color: rgba(255, 255, 255, 0.5);
}
.uk-light.uk-card-badge,
.uk-section-primary:not(.uk-preserve-color).uk-card-badge,
.uk-section-secondary:not(.uk-preserve-color).uk-card-badge,
.uk-tile-primary:not(.uk-preserve-color).uk-card-badge,
.uk-tile-secondary:not(.uk-preserve-color).uk-card-badge,
.uk-card-primary.uk-card-body.uk-card-badge,
.uk-card-primary > :not([class*='uk-card-media']).uk-card-badge,
.uk-card-secondary.uk-card-body.uk-card-badge,
.uk-card-secondary > :not([class*='uk-card-media']).uk-card-badge,
.uk-overlay-primary.uk-card-badge,
.uk-offcanvas-bar.uk-card-badge {
  background-color: #fff;
  color: #666;
}
.uk-light .uk-close,
.uk-section-primary:not(.uk-preserve-color) .uk-close,
.uk-section-secondary:not(.uk-preserve-color) .uk-close,
.uk-tile-primary:not(.uk-preserve-color) .uk-close,
.uk-tile-secondary:not(.uk-preserve-color) .uk-close,
.uk-card-primary.uk-card-body .uk-close,
.uk-card-primary > :not([class*='uk-card-media']) .uk-close,
.uk-card-secondary.uk-card-body .uk-close,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-close,
.uk-overlay-primary .uk-close,
.uk-offcanvas-bar .uk-close {
  color: rgba(255, 255, 255, 0.5);
}
.uk-light .uk-close:hover,
.uk-section-primary:not(.uk-preserve-color) .uk-close:hover,
.uk-section-secondary:not(.uk-preserve-color) .uk-close:hover,
.uk-tile-primary:not(.uk-preserve-color) .uk-close:hover,
.uk-tile-secondary:not(.uk-preserve-color) .uk-close:hover,
.uk-card-primary.uk-card-body .uk-close:hover,
.uk-card-primary > :not([class*='uk-card-media']) .uk-close:hover,
.uk-card-secondary.uk-card-body .uk-close:hover,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-close:hover,
.uk-overlay-primary .uk-close:hover,
.uk-offcanvas-bar .uk-close:hover {
  color: rgba(255, 255, 255, 0.7);
}
.uk-light .uk-totop,
.uk-section-primary:not(.uk-preserve-color) .uk-totop,
.uk-section-secondary:not(.uk-preserve-color) .uk-totop,
.uk-tile-primary:not(.uk-preserve-color) .uk-totop,
.uk-tile-secondary:not(.uk-preserve-color) .uk-totop,
.uk-card-primary.uk-card-body .uk-totop,
.uk-card-primary > :not([class*='uk-card-media']) .uk-totop,
.uk-card-secondary.uk-card-body .uk-totop,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-totop,
.uk-overlay-primary .uk-totop,
.uk-offcanvas-bar .uk-totop {
  color: rgba(255, 255, 255, 0.5);
}
.uk-light .uk-totop:hover,
.uk-section-primary:not(.uk-preserve-color) .uk-totop:hover,
.uk-section-secondary:not(.uk-preserve-color) .uk-totop:hover,
.uk-tile-primary:not(.uk-preserve-color) .uk-totop:hover,
.uk-tile-secondary:not(.uk-preserve-color) .uk-totop:hover,
.uk-card-primary.uk-card-body .uk-totop:hover,
.uk-card-primary > :not([class*='uk-card-media']) .uk-totop:hover,
.uk-card-secondary.uk-card-body .uk-totop:hover,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-totop:hover,
.uk-overlay-primary .uk-totop:hover,
.uk-offcanvas-bar .uk-totop:hover {
  color: rgba(255, 255, 255, 0.7);
}
.uk-light .uk-totop:active,
.uk-section-primary:not(.uk-preserve-color) .uk-totop:active,
.uk-section-secondary:not(.uk-preserve-color) .uk-totop:active,
.uk-tile-primary:not(.uk-preserve-color) .uk-totop:active,
.uk-tile-secondary:not(.uk-preserve-color) .uk-totop:active,
.uk-card-primary.uk-card-body .uk-totop:active,
.uk-card-primary > :not([class*='uk-card-media']) .uk-totop:active,
.uk-card-secondary.uk-card-body .uk-totop:active,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-totop:active,
.uk-overlay-primary .uk-totop:active,
.uk-offcanvas-bar .uk-totop:active {
  color: #fff;
}
.uk-light .uk-marker,
.uk-section-primary:not(.uk-preserve-color) .uk-marker,
.uk-section-secondary:not(.uk-preserve-color) .uk-marker,
.uk-tile-primary:not(.uk-preserve-color) .uk-marker,
.uk-tile-secondary:not(.uk-preserve-color) .uk-marker,
.uk-card-primary.uk-card-body .uk-marker,
.uk-card-primary > :not([class*='uk-card-media']) .uk-marker,
.uk-card-secondary.uk-card-body .uk-marker,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-marker,
.uk-overlay-primary .uk-marker,
.uk-offcanvas-bar .uk-marker {
  background: #03406A21;
  color: #666;
}
.uk-light .uk-marker:hover,
.uk-section-primary:not(.uk-preserve-color) .uk-marker:hover,
.uk-section-secondary:not(.uk-preserve-color) .uk-marker:hover,
.uk-tile-primary:not(.uk-preserve-color) .uk-marker:hover,
.uk-tile-secondary:not(.uk-preserve-color) .uk-marker:hover,
.uk-card-primary.uk-card-body .uk-marker:hover,
.uk-card-primary > :not([class*='uk-card-media']) .uk-marker:hover,
.uk-card-secondary.uk-card-body .uk-marker:hover,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-marker:hover,
.uk-overlay-primary .uk-marker:hover,
.uk-offcanvas-bar .uk-marker:hover {
  color: #666;
}
.uk-light .uk-badge,
.uk-section-primary:not(.uk-preserve-color) .uk-badge,
.uk-section-secondary:not(.uk-preserve-color) .uk-badge,
.uk-tile-primary:not(.uk-preserve-color) .uk-badge,
.uk-tile-secondary:not(.uk-preserve-color) .uk-badge,
.uk-card-primary.uk-card-body .uk-badge,
.uk-card-primary > :not([class*='uk-card-media']) .uk-badge,
.uk-card-secondary.uk-card-body .uk-badge,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-badge,
.uk-overlay-primary .uk-badge,
.uk-offcanvas-bar .uk-badge {
  background-color: #fff;
  color: #666 !important;
}
.uk-light .uk-label,
.uk-section-primary:not(.uk-preserve-color) .uk-label,
.uk-section-secondary:not(.uk-preserve-color) .uk-label,
.uk-tile-primary:not(.uk-preserve-color) .uk-label,
.uk-tile-secondary:not(.uk-preserve-color) .uk-label,
.uk-card-primary.uk-card-body .uk-label,
.uk-card-primary > :not([class*='uk-card-media']) .uk-label,
.uk-card-secondary.uk-card-body .uk-label,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-label,
.uk-overlay-primary .uk-label,
.uk-offcanvas-bar .uk-label {
  background-color: #fff;
  color: #666;
}
.uk-light .uk-article-meta,
.uk-section-primary:not(.uk-preserve-color) .uk-article-meta,
.uk-section-secondary:not(.uk-preserve-color) .uk-article-meta,
.uk-tile-primary:not(.uk-preserve-color) .uk-article-meta,
.uk-tile-secondary:not(.uk-preserve-color) .uk-article-meta,
.uk-card-primary.uk-card-body .uk-article-meta,
.uk-card-primary > :not([class*='uk-card-media']) .uk-article-meta,
.uk-card-secondary.uk-card-body .uk-article-meta,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-article-meta,
.uk-overlay-primary .uk-article-meta,
.uk-offcanvas-bar .uk-article-meta {
  color: rgba(255, 255, 255, 0.5);
}
.uk-light .uk-search-input,
.uk-section-primary:not(.uk-preserve-color) .uk-search-input,
.uk-section-secondary:not(.uk-preserve-color) .uk-search-input,
.uk-tile-primary:not(.uk-preserve-color) .uk-search-input,
.uk-tile-secondary:not(.uk-preserve-color) .uk-search-input,
.uk-card-primary.uk-card-body .uk-search-input,
.uk-card-primary > :not([class*='uk-card-media']) .uk-search-input,
.uk-card-secondary.uk-card-body .uk-search-input,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-search-input,
.uk-overlay-primary .uk-search-input,
.uk-offcanvas-bar .uk-search-input {
  color: rgba(255, 255, 255, 0.7);
}
.uk-light .uk-search-input::placeholder,
.uk-section-primary:not(.uk-preserve-color) .uk-search-input::placeholder,
.uk-section-secondary:not(.uk-preserve-color) .uk-search-input::placeholder,
.uk-tile-primary:not(.uk-preserve-color) .uk-search-input::placeholder,
.uk-tile-secondary:not(.uk-preserve-color) .uk-search-input::placeholder,
.uk-card-primary.uk-card-body .uk-search-input::placeholder,
.uk-card-primary > :not([class*='uk-card-media']) .uk-search-input::placeholder,
.uk-card-secondary.uk-card-body .uk-search-input::placeholder,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-search-input::placeholder,
.uk-overlay-primary .uk-search-input::placeholder,
.uk-offcanvas-bar .uk-search-input::placeholder {
  color: rgba(255, 255, 255, 0.5);
}
.uk-light .uk-search .uk-search-icon,
.uk-section-primary:not(.uk-preserve-color) .uk-search .uk-search-icon,
.uk-section-secondary:not(.uk-preserve-color) .uk-search .uk-search-icon,
.uk-tile-primary:not(.uk-preserve-color) .uk-search .uk-search-icon,
.uk-tile-secondary:not(.uk-preserve-color) .uk-search .uk-search-icon,
.uk-card-primary.uk-card-body .uk-search .uk-search-icon,
.uk-card-primary > :not([class*='uk-card-media']) .uk-search .uk-search-icon,
.uk-card-secondary.uk-card-body .uk-search .uk-search-icon,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-search .uk-search-icon,
.uk-overlay-primary .uk-search .uk-search-icon,
.uk-offcanvas-bar .uk-search .uk-search-icon {
  color: rgba(255, 255, 255, 0.5);
}
.uk-light .uk-search .uk-search-icon:hover,
.uk-section-primary:not(.uk-preserve-color) .uk-search .uk-search-icon:hover,
.uk-section-secondary:not(.uk-preserve-color) .uk-search .uk-search-icon:hover,
.uk-tile-primary:not(.uk-preserve-color) .uk-search .uk-search-icon:hover,
.uk-tile-secondary:not(.uk-preserve-color) .uk-search .uk-search-icon:hover,
.uk-card-primary.uk-card-body .uk-search .uk-search-icon:hover,
.uk-card-primary > :not([class*='uk-card-media']) .uk-search .uk-search-icon:hover,
.uk-card-secondary.uk-card-body .uk-search .uk-search-icon:hover,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-search .uk-search-icon:hover,
.uk-overlay-primary .uk-search .uk-search-icon:hover,
.uk-offcanvas-bar .uk-search .uk-search-icon:hover {
  color: rgba(255, 255, 255, 0.5);
}
.uk-light .uk-search-default .uk-search-input,
.uk-section-primary:not(.uk-preserve-color) .uk-search-default .uk-search-input,
.uk-section-secondary:not(.uk-preserve-color) .uk-search-default .uk-search-input,
.uk-tile-primary:not(.uk-preserve-color) .uk-search-default .uk-search-input,
.uk-tile-secondary:not(.uk-preserve-color) .uk-search-default .uk-search-input,
.uk-card-primary.uk-card-body .uk-search-default .uk-search-input,
.uk-card-primary > :not([class*='uk-card-media']) .uk-search-default .uk-search-input,
.uk-card-secondary.uk-card-body .uk-search-default .uk-search-input,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-search-default .uk-search-input,
.uk-overlay-primary .uk-search-default .uk-search-input,
.uk-offcanvas-bar .uk-search-default .uk-search-input {
  background-color: transparent;
  border-color: rgba(255, 255, 255, 0.2);
}
.uk-light .uk-search-default .uk-search-input:focus,
.uk-section-primary:not(.uk-preserve-color) .uk-search-default .uk-search-input:focus,
.uk-section-secondary:not(.uk-preserve-color) .uk-search-default .uk-search-input:focus,
.uk-tile-primary:not(.uk-preserve-color) .uk-search-default .uk-search-input:focus,
.uk-tile-secondary:not(.uk-preserve-color) .uk-search-default .uk-search-input:focus,
.uk-card-primary.uk-card-body .uk-search-default .uk-search-input:focus,
.uk-card-primary > :not([class*='uk-card-media']) .uk-search-default .uk-search-input:focus,
.uk-card-secondary.uk-card-body .uk-search-default .uk-search-input:focus,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-search-default .uk-search-input:focus,
.uk-overlay-primary .uk-search-default .uk-search-input:focus,
.uk-offcanvas-bar .uk-search-default .uk-search-input:focus {
  background-color: rgba(0, 0, 0, 0.05);
}
.uk-light .uk-search-navbar .uk-search-input,
.uk-section-primary:not(.uk-preserve-color) .uk-search-navbar .uk-search-input,
.uk-section-secondary:not(.uk-preserve-color) .uk-search-navbar .uk-search-input,
.uk-tile-primary:not(.uk-preserve-color) .uk-search-navbar .uk-search-input,
.uk-tile-secondary:not(.uk-preserve-color) .uk-search-navbar .uk-search-input,
.uk-card-primary.uk-card-body .uk-search-navbar .uk-search-input,
.uk-card-primary > :not([class*='uk-card-media']) .uk-search-navbar .uk-search-input,
.uk-card-secondary.uk-card-body .uk-search-navbar .uk-search-input,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-search-navbar .uk-search-input,
.uk-overlay-primary .uk-search-navbar .uk-search-input,
.uk-offcanvas-bar .uk-search-navbar .uk-search-input {
  background-color: transparent;
}
.uk-light .uk-search-large .uk-search-input,
.uk-section-primary:not(.uk-preserve-color) .uk-search-large .uk-search-input,
.uk-section-secondary:not(.uk-preserve-color) .uk-search-large .uk-search-input,
.uk-tile-primary:not(.uk-preserve-color) .uk-search-large .uk-search-input,
.uk-tile-secondary:not(.uk-preserve-color) .uk-search-large .uk-search-input,
.uk-card-primary.uk-card-body .uk-search-large .uk-search-input,
.uk-card-primary > :not([class*='uk-card-media']) .uk-search-large .uk-search-input,
.uk-card-secondary.uk-card-body .uk-search-large .uk-search-input,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-search-large .uk-search-input,
.uk-overlay-primary .uk-search-large .uk-search-input,
.uk-offcanvas-bar .uk-search-large .uk-search-input {
  background-color: transparent;
}
.uk-light .uk-search-toggle,
.uk-section-primary:not(.uk-preserve-color) .uk-search-toggle,
.uk-section-secondary:not(.uk-preserve-color) .uk-search-toggle,
.uk-tile-primary:not(.uk-preserve-color) .uk-search-toggle,
.uk-tile-secondary:not(.uk-preserve-color) .uk-search-toggle,
.uk-card-primary.uk-card-body .uk-search-toggle,
.uk-card-primary > :not([class*='uk-card-media']) .uk-search-toggle,
.uk-card-secondary.uk-card-body .uk-search-toggle,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-search-toggle,
.uk-overlay-primary .uk-search-toggle,
.uk-offcanvas-bar .uk-search-toggle {
  color: rgba(255, 255, 255, 0.5);
}
.uk-light .uk-search-toggle:hover,
.uk-section-primary:not(.uk-preserve-color) .uk-search-toggle:hover,
.uk-section-secondary:not(.uk-preserve-color) .uk-search-toggle:hover,
.uk-tile-primary:not(.uk-preserve-color) .uk-search-toggle:hover,
.uk-tile-secondary:not(.uk-preserve-color) .uk-search-toggle:hover,
.uk-card-primary.uk-card-body .uk-search-toggle:hover,
.uk-card-primary > :not([class*='uk-card-media']) .uk-search-toggle:hover,
.uk-card-secondary.uk-card-body .uk-search-toggle:hover,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-search-toggle:hover,
.uk-overlay-primary .uk-search-toggle:hover,
.uk-offcanvas-bar .uk-search-toggle:hover {
  color: rgba(255, 255, 255, 0.7);
}
.uk-light .uk-accordion-title,
.uk-section-primary:not(.uk-preserve-color) .uk-accordion-title,
.uk-section-secondary:not(.uk-preserve-color) .uk-accordion-title,
.uk-tile-primary:not(.uk-preserve-color) .uk-accordion-title,
.uk-tile-secondary:not(.uk-preserve-color) .uk-accordion-title,
.uk-card-primary.uk-card-body .uk-accordion-title,
.uk-card-primary > :not([class*='uk-card-media']) .uk-accordion-title,
.uk-card-secondary.uk-card-body .uk-accordion-title,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-accordion-title,
.uk-overlay-primary .uk-accordion-title,
.uk-offcanvas-bar .uk-accordion-title {
  color: #fff;
}
.uk-light .uk-accordion-title:hover,
.uk-section-primary:not(.uk-preserve-color) .uk-accordion-title:hover,
.uk-section-secondary:not(.uk-preserve-color) .uk-accordion-title:hover,
.uk-tile-primary:not(.uk-preserve-color) .uk-accordion-title:hover,
.uk-tile-secondary:not(.uk-preserve-color) .uk-accordion-title:hover,
.uk-card-primary.uk-card-body .uk-accordion-title:hover,
.uk-card-primary > :not([class*='uk-card-media']) .uk-accordion-title:hover,
.uk-card-secondary.uk-card-body .uk-accordion-title:hover,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-accordion-title:hover,
.uk-overlay-primary .uk-accordion-title:hover,
.uk-offcanvas-bar .uk-accordion-title:hover {
  color: rgba(255, 255, 255, 0.7);
}
.uk-light .uk-grid-divider > :not(.uk-first-column)::before,
.uk-section-primary:not(.uk-preserve-color) .uk-grid-divider > :not(.uk-first-column)::before,
.uk-section-secondary:not(.uk-preserve-color) .uk-grid-divider > :not(.uk-first-column)::before,
.uk-tile-primary:not(.uk-preserve-color) .uk-grid-divider > :not(.uk-first-column)::before,
.uk-tile-secondary:not(.uk-preserve-color) .uk-grid-divider > :not(.uk-first-column)::before,
.uk-card-primary.uk-card-body .uk-grid-divider > :not(.uk-first-column)::before,
.uk-card-primary > :not([class*='uk-card-media']) .uk-grid-divider > :not(.uk-first-column)::before,
.uk-card-secondary.uk-card-body .uk-grid-divider > :not(.uk-first-column)::before,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-grid-divider > :not(.uk-first-column)::before,
.uk-overlay-primary .uk-grid-divider > :not(.uk-first-column)::before,
.uk-offcanvas-bar .uk-grid-divider > :not(.uk-first-column)::before {
  border-left-color: rgba(255, 255, 255, 0.2);
}
.uk-light .uk-grid-divider.uk-grid-stack > .uk-grid-margin::before,
.uk-section-primary:not(.uk-preserve-color) .uk-grid-divider.uk-grid-stack > .uk-grid-margin::before,
.uk-section-secondary:not(.uk-preserve-color) .uk-grid-divider.uk-grid-stack > .uk-grid-margin::before,
.uk-tile-primary:not(.uk-preserve-color) .uk-grid-divider.uk-grid-stack > .uk-grid-margin::before,
.uk-tile-secondary:not(.uk-preserve-color) .uk-grid-divider.uk-grid-stack > .uk-grid-margin::before,
.uk-card-primary.uk-card-body .uk-grid-divider.uk-grid-stack > .uk-grid-margin::before,
.uk-card-primary > :not([class*='uk-card-media']) .uk-grid-divider.uk-grid-stack > .uk-grid-margin::before,
.uk-card-secondary.uk-card-body .uk-grid-divider.uk-grid-stack > .uk-grid-margin::before,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-grid-divider.uk-grid-stack > .uk-grid-margin::before,
.uk-overlay-primary .uk-grid-divider.uk-grid-stack > .uk-grid-margin::before,
.uk-offcanvas-bar .uk-grid-divider.uk-grid-stack > .uk-grid-margin::before {
  border-top-color: rgba(255, 255, 255, 0.2);
}
.uk-light .uk-nav-default > li > a,
.uk-section-primary:not(.uk-preserve-color) .uk-nav-default > li > a,
.uk-section-secondary:not(.uk-preserve-color) .uk-nav-default > li > a,
.uk-tile-primary:not(.uk-preserve-color) .uk-nav-default > li > a,
.uk-tile-secondary:not(.uk-preserve-color) .uk-nav-default > li > a,
.uk-card-primary.uk-card-body .uk-nav-default > li > a,
.uk-card-primary > :not([class*='uk-card-media']) .uk-nav-default > li > a,
.uk-card-secondary.uk-card-body .uk-nav-default > li > a,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-nav-default > li > a,
.uk-overlay-primary .uk-nav-default > li > a,
.uk-offcanvas-bar .uk-nav-default > li > a {
  color: rgba(255, 255, 255, 0.5);
}
.uk-light .uk-nav-default > li > a:hover,
.uk-section-primary:not(.uk-preserve-color) .uk-nav-default > li > a:hover,
.uk-section-secondary:not(.uk-preserve-color) .uk-nav-default > li > a:hover,
.uk-tile-primary:not(.uk-preserve-color) .uk-nav-default > li > a:hover,
.uk-tile-secondary:not(.uk-preserve-color) .uk-nav-default > li > a:hover,
.uk-card-primary.uk-card-body .uk-nav-default > li > a:hover,
.uk-card-primary > :not([class*='uk-card-media']) .uk-nav-default > li > a:hover,
.uk-card-secondary.uk-card-body .uk-nav-default > li > a:hover,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-nav-default > li > a:hover,
.uk-overlay-primary .uk-nav-default > li > a:hover,
.uk-offcanvas-bar .uk-nav-default > li > a:hover {
  color: rgba(255, 255, 255, 0.7);
}
.uk-light .uk-nav-default > li.uk-active > a,
.uk-section-primary:not(.uk-preserve-color) .uk-nav-default > li.uk-active > a,
.uk-section-secondary:not(.uk-preserve-color) .uk-nav-default > li.uk-active > a,
.uk-tile-primary:not(.uk-preserve-color) .uk-nav-default > li.uk-active > a,
.uk-tile-secondary:not(.uk-preserve-color) .uk-nav-default > li.uk-active > a,
.uk-card-primary.uk-card-body .uk-nav-default > li.uk-active > a,
.uk-card-primary > :not([class*='uk-card-media']) .uk-nav-default > li.uk-active > a,
.uk-card-secondary.uk-card-body .uk-nav-default > li.uk-active > a,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-nav-default > li.uk-active > a,
.uk-overlay-primary .uk-nav-default > li.uk-active > a,
.uk-offcanvas-bar .uk-nav-default > li.uk-active > a {
  color: #fff;
}
.uk-light .uk-nav-default .uk-nav-header,
.uk-section-primary:not(.uk-preserve-color) .uk-nav-default .uk-nav-header,
.uk-section-secondary:not(.uk-preserve-color) .uk-nav-default .uk-nav-header,
.uk-tile-primary:not(.uk-preserve-color) .uk-nav-default .uk-nav-header,
.uk-tile-secondary:not(.uk-preserve-color) .uk-nav-default .uk-nav-header,
.uk-card-primary.uk-card-body .uk-nav-default .uk-nav-header,
.uk-card-primary > :not([class*='uk-card-media']) .uk-nav-default .uk-nav-header,
.uk-card-secondary.uk-card-body .uk-nav-default .uk-nav-header,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-nav-default .uk-nav-header,
.uk-overlay-primary .uk-nav-default .uk-nav-header,
.uk-offcanvas-bar .uk-nav-default .uk-nav-header {
  color: #fff;
}
.uk-light .uk-nav-default .uk-nav-divider,
.uk-section-primary:not(.uk-preserve-color) .uk-nav-default .uk-nav-divider,
.uk-section-secondary:not(.uk-preserve-color) .uk-nav-default .uk-nav-divider,
.uk-tile-primary:not(.uk-preserve-color) .uk-nav-default .uk-nav-divider,
.uk-tile-secondary:not(.uk-preserve-color) .uk-nav-default .uk-nav-divider,
.uk-card-primary.uk-card-body .uk-nav-default .uk-nav-divider,
.uk-card-primary > :not([class*='uk-card-media']) .uk-nav-default .uk-nav-divider,
.uk-card-secondary.uk-card-body .uk-nav-default .uk-nav-divider,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-nav-default .uk-nav-divider,
.uk-overlay-primary .uk-nav-default .uk-nav-divider,
.uk-offcanvas-bar .uk-nav-default .uk-nav-divider {
  border-top-color: rgba(255, 255, 255, 0.2);
}
.uk-light .uk-nav-default .uk-nav-sub a,
.uk-section-primary:not(.uk-preserve-color) .uk-nav-default .uk-nav-sub a,
.uk-section-secondary:not(.uk-preserve-color) .uk-nav-default .uk-nav-sub a,
.uk-tile-primary:not(.uk-preserve-color) .uk-nav-default .uk-nav-sub a,
.uk-tile-secondary:not(.uk-preserve-color) .uk-nav-default .uk-nav-sub a,
.uk-card-primary.uk-card-body .uk-nav-default .uk-nav-sub a,
.uk-card-primary > :not([class*='uk-card-media']) .uk-nav-default .uk-nav-sub a,
.uk-card-secondary.uk-card-body .uk-nav-default .uk-nav-sub a,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-nav-default .uk-nav-sub a,
.uk-overlay-primary .uk-nav-default .uk-nav-sub a,
.uk-offcanvas-bar .uk-nav-default .uk-nav-sub a {
  color: rgba(255, 255, 255, 0.5);
}
.uk-light .uk-nav-default .uk-nav-sub a:hover,
.uk-section-primary:not(.uk-preserve-color) .uk-nav-default .uk-nav-sub a:hover,
.uk-section-secondary:not(.uk-preserve-color) .uk-nav-default .uk-nav-sub a:hover,
.uk-tile-primary:not(.uk-preserve-color) .uk-nav-default .uk-nav-sub a:hover,
.uk-tile-secondary:not(.uk-preserve-color) .uk-nav-default .uk-nav-sub a:hover,
.uk-card-primary.uk-card-body .uk-nav-default .uk-nav-sub a:hover,
.uk-card-primary > :not([class*='uk-card-media']) .uk-nav-default .uk-nav-sub a:hover,
.uk-card-secondary.uk-card-body .uk-nav-default .uk-nav-sub a:hover,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-nav-default .uk-nav-sub a:hover,
.uk-overlay-primary .uk-nav-default .uk-nav-sub a:hover,
.uk-offcanvas-bar .uk-nav-default .uk-nav-sub a:hover {
  color: rgba(255, 255, 255, 0.7);
}
.uk-light .uk-nav-default .uk-nav-sub li.uk-active > a,
.uk-section-primary:not(.uk-preserve-color) .uk-nav-default .uk-nav-sub li.uk-active > a,
.uk-section-secondary:not(.uk-preserve-color) .uk-nav-default .uk-nav-sub li.uk-active > a,
.uk-tile-primary:not(.uk-preserve-color) .uk-nav-default .uk-nav-sub li.uk-active > a,
.uk-tile-secondary:not(.uk-preserve-color) .uk-nav-default .uk-nav-sub li.uk-active > a,
.uk-card-primary.uk-card-body .uk-nav-default .uk-nav-sub li.uk-active > a,
.uk-card-primary > :not([class*='uk-card-media']) .uk-nav-default .uk-nav-sub li.uk-active > a,
.uk-card-secondary.uk-card-body .uk-nav-default .uk-nav-sub li.uk-active > a,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-nav-default .uk-nav-sub li.uk-active > a,
.uk-overlay-primary .uk-nav-default .uk-nav-sub li.uk-active > a,
.uk-offcanvas-bar .uk-nav-default .uk-nav-sub li.uk-active > a {
  color: #fff;
}
.uk-light .uk-nav-primary > li > a,
.uk-section-primary:not(.uk-preserve-color) .uk-nav-primary > li > a,
.uk-section-secondary:not(.uk-preserve-color) .uk-nav-primary > li > a,
.uk-tile-primary:not(.uk-preserve-color) .uk-nav-primary > li > a,
.uk-tile-secondary:not(.uk-preserve-color) .uk-nav-primary > li > a,
.uk-card-primary.uk-card-body .uk-nav-primary > li > a,
.uk-card-primary > :not([class*='uk-card-media']) .uk-nav-primary > li > a,
.uk-card-secondary.uk-card-body .uk-nav-primary > li > a,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-nav-primary > li > a,
.uk-overlay-primary .uk-nav-primary > li > a,
.uk-offcanvas-bar .uk-nav-primary > li > a {
  color: rgba(255, 255, 255, 0.5);
}
.uk-light .uk-nav-primary > li > a:hover,
.uk-section-primary:not(.uk-preserve-color) .uk-nav-primary > li > a:hover,
.uk-section-secondary:not(.uk-preserve-color) .uk-nav-primary > li > a:hover,
.uk-tile-primary:not(.uk-preserve-color) .uk-nav-primary > li > a:hover,
.uk-tile-secondary:not(.uk-preserve-color) .uk-nav-primary > li > a:hover,
.uk-card-primary.uk-card-body .uk-nav-primary > li > a:hover,
.uk-card-primary > :not([class*='uk-card-media']) .uk-nav-primary > li > a:hover,
.uk-card-secondary.uk-card-body .uk-nav-primary > li > a:hover,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-nav-primary > li > a:hover,
.uk-overlay-primary .uk-nav-primary > li > a:hover,
.uk-offcanvas-bar .uk-nav-primary > li > a:hover {
  color: rgba(255, 255, 255, 0.7);
}
.uk-light .uk-nav-primary > li.uk-active > a,
.uk-section-primary:not(.uk-preserve-color) .uk-nav-primary > li.uk-active > a,
.uk-section-secondary:not(.uk-preserve-color) .uk-nav-primary > li.uk-active > a,
.uk-tile-primary:not(.uk-preserve-color) .uk-nav-primary > li.uk-active > a,
.uk-tile-secondary:not(.uk-preserve-color) .uk-nav-primary > li.uk-active > a,
.uk-card-primary.uk-card-body .uk-nav-primary > li.uk-active > a,
.uk-card-primary > :not([class*='uk-card-media']) .uk-nav-primary > li.uk-active > a,
.uk-card-secondary.uk-card-body .uk-nav-primary > li.uk-active > a,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-nav-primary > li.uk-active > a,
.uk-overlay-primary .uk-nav-primary > li.uk-active > a,
.uk-offcanvas-bar .uk-nav-primary > li.uk-active > a {
  color: #fff;
}
.uk-light .uk-nav-primary .uk-nav-header,
.uk-section-primary:not(.uk-preserve-color) .uk-nav-primary .uk-nav-header,
.uk-section-secondary:not(.uk-preserve-color) .uk-nav-primary .uk-nav-header,
.uk-tile-primary:not(.uk-preserve-color) .uk-nav-primary .uk-nav-header,
.uk-tile-secondary:not(.uk-preserve-color) .uk-nav-primary .uk-nav-header,
.uk-card-primary.uk-card-body .uk-nav-primary .uk-nav-header,
.uk-card-primary > :not([class*='uk-card-media']) .uk-nav-primary .uk-nav-header,
.uk-card-secondary.uk-card-body .uk-nav-primary .uk-nav-header,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-nav-primary .uk-nav-header,
.uk-overlay-primary .uk-nav-primary .uk-nav-header,
.uk-offcanvas-bar .uk-nav-primary .uk-nav-header {
  color: #fff;
}
.uk-light .uk-nav-primary .uk-nav-divider,
.uk-section-primary:not(.uk-preserve-color) .uk-nav-primary .uk-nav-divider,
.uk-section-secondary:not(.uk-preserve-color) .uk-nav-primary .uk-nav-divider,
.uk-tile-primary:not(.uk-preserve-color) .uk-nav-primary .uk-nav-divider,
.uk-tile-secondary:not(.uk-preserve-color) .uk-nav-primary .uk-nav-divider,
.uk-card-primary.uk-card-body .uk-nav-primary .uk-nav-divider,
.uk-card-primary > :not([class*='uk-card-media']) .uk-nav-primary .uk-nav-divider,
.uk-card-secondary.uk-card-body .uk-nav-primary .uk-nav-divider,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-nav-primary .uk-nav-divider,
.uk-overlay-primary .uk-nav-primary .uk-nav-divider,
.uk-offcanvas-bar .uk-nav-primary .uk-nav-divider {
  border-top-color: rgba(255, 255, 255, 0.2);
}
.uk-light .uk-nav-primary .uk-nav-sub a,
.uk-section-primary:not(.uk-preserve-color) .uk-nav-primary .uk-nav-sub a,
.uk-section-secondary:not(.uk-preserve-color) .uk-nav-primary .uk-nav-sub a,
.uk-tile-primary:not(.uk-preserve-color) .uk-nav-primary .uk-nav-sub a,
.uk-tile-secondary:not(.uk-preserve-color) .uk-nav-primary .uk-nav-sub a,
.uk-card-primary.uk-card-body .uk-nav-primary .uk-nav-sub a,
.uk-card-primary > :not([class*='uk-card-media']) .uk-nav-primary .uk-nav-sub a,
.uk-card-secondary.uk-card-body .uk-nav-primary .uk-nav-sub a,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-nav-primary .uk-nav-sub a,
.uk-overlay-primary .uk-nav-primary .uk-nav-sub a,
.uk-offcanvas-bar .uk-nav-primary .uk-nav-sub a {
  color: rgba(255, 255, 255, 0.5);
}
.uk-light .uk-nav-primary .uk-nav-sub a:hover,
.uk-section-primary:not(.uk-preserve-color) .uk-nav-primary .uk-nav-sub a:hover,
.uk-section-secondary:not(.uk-preserve-color) .uk-nav-primary .uk-nav-sub a:hover,
.uk-tile-primary:not(.uk-preserve-color) .uk-nav-primary .uk-nav-sub a:hover,
.uk-tile-secondary:not(.uk-preserve-color) .uk-nav-primary .uk-nav-sub a:hover,
.uk-card-primary.uk-card-body .uk-nav-primary .uk-nav-sub a:hover,
.uk-card-primary > :not([class*='uk-card-media']) .uk-nav-primary .uk-nav-sub a:hover,
.uk-card-secondary.uk-card-body .uk-nav-primary .uk-nav-sub a:hover,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-nav-primary .uk-nav-sub a:hover,
.uk-overlay-primary .uk-nav-primary .uk-nav-sub a:hover,
.uk-offcanvas-bar .uk-nav-primary .uk-nav-sub a:hover {
  color: rgba(255, 255, 255, 0.7);
}
.uk-light .uk-nav-primary .uk-nav-sub li.uk-active > a,
.uk-section-primary:not(.uk-preserve-color) .uk-nav-primary .uk-nav-sub li.uk-active > a,
.uk-section-secondary:not(.uk-preserve-color) .uk-nav-primary .uk-nav-sub li.uk-active > a,
.uk-tile-primary:not(.uk-preserve-color) .uk-nav-primary .uk-nav-sub li.uk-active > a,
.uk-tile-secondary:not(.uk-preserve-color) .uk-nav-primary .uk-nav-sub li.uk-active > a,
.uk-card-primary.uk-card-body .uk-nav-primary .uk-nav-sub li.uk-active > a,
.uk-card-primary > :not([class*='uk-card-media']) .uk-nav-primary .uk-nav-sub li.uk-active > a,
.uk-card-secondary.uk-card-body .uk-nav-primary .uk-nav-sub li.uk-active > a,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-nav-primary .uk-nav-sub li.uk-active > a,
.uk-overlay-primary .uk-nav-primary .uk-nav-sub li.uk-active > a,
.uk-offcanvas-bar .uk-nav-primary .uk-nav-sub li.uk-active > a {
  color: #fff;
}
.uk-light .uk-nav-secondary > li > a,
.uk-section-primary:not(.uk-preserve-color) .uk-nav-secondary > li > a,
.uk-section-secondary:not(.uk-preserve-color) .uk-nav-secondary > li > a,
.uk-tile-primary:not(.uk-preserve-color) .uk-nav-secondary > li > a,
.uk-tile-secondary:not(.uk-preserve-color) .uk-nav-secondary > li > a,
.uk-card-primary.uk-card-body .uk-nav-secondary > li > a,
.uk-card-primary > :not([class*='uk-card-media']) .uk-nav-secondary > li > a,
.uk-card-secondary.uk-card-body .uk-nav-secondary > li > a,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-nav-secondary > li > a,
.uk-overlay-primary .uk-nav-secondary > li > a,
.uk-offcanvas-bar .uk-nav-secondary > li > a {
  color: #fff;
}
.uk-light .uk-nav-secondary > li > a:hover,
.uk-section-primary:not(.uk-preserve-color) .uk-nav-secondary > li > a:hover,
.uk-section-secondary:not(.uk-preserve-color) .uk-nav-secondary > li > a:hover,
.uk-tile-primary:not(.uk-preserve-color) .uk-nav-secondary > li > a:hover,
.uk-tile-secondary:not(.uk-preserve-color) .uk-nav-secondary > li > a:hover,
.uk-card-primary.uk-card-body .uk-nav-secondary > li > a:hover,
.uk-card-primary > :not([class*='uk-card-media']) .uk-nav-secondary > li > a:hover,
.uk-card-secondary.uk-card-body .uk-nav-secondary > li > a:hover,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-nav-secondary > li > a:hover,
.uk-overlay-primary .uk-nav-secondary > li > a:hover,
.uk-offcanvas-bar .uk-nav-secondary > li > a:hover {
  color: #fff;
  background-color: rgba(255, 255, 255, 0.1);
}
.uk-light .uk-nav-secondary > li.uk-active > a,
.uk-section-primary:not(.uk-preserve-color) .uk-nav-secondary > li.uk-active > a,
.uk-section-secondary:not(.uk-preserve-color) .uk-nav-secondary > li.uk-active > a,
.uk-tile-primary:not(.uk-preserve-color) .uk-nav-secondary > li.uk-active > a,
.uk-tile-secondary:not(.uk-preserve-color) .uk-nav-secondary > li.uk-active > a,
.uk-card-primary.uk-card-body .uk-nav-secondary > li.uk-active > a,
.uk-card-primary > :not([class*='uk-card-media']) .uk-nav-secondary > li.uk-active > a,
.uk-card-secondary.uk-card-body .uk-nav-secondary > li.uk-active > a,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-nav-secondary > li.uk-active > a,
.uk-overlay-primary .uk-nav-secondary > li.uk-active > a,
.uk-offcanvas-bar .uk-nav-secondary > li.uk-active > a {
  color: #fff;
  background-color: rgba(255, 255, 255, 0.1);
}
.uk-light .uk-nav-secondary .uk-nav-subtitle,
.uk-section-primary:not(.uk-preserve-color) .uk-nav-secondary .uk-nav-subtitle,
.uk-section-secondary:not(.uk-preserve-color) .uk-nav-secondary .uk-nav-subtitle,
.uk-tile-primary:not(.uk-preserve-color) .uk-nav-secondary .uk-nav-subtitle,
.uk-tile-secondary:not(.uk-preserve-color) .uk-nav-secondary .uk-nav-subtitle,
.uk-card-primary.uk-card-body .uk-nav-secondary .uk-nav-subtitle,
.uk-card-primary > :not([class*='uk-card-media']) .uk-nav-secondary .uk-nav-subtitle,
.uk-card-secondary.uk-card-body .uk-nav-secondary .uk-nav-subtitle,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-nav-secondary .uk-nav-subtitle,
.uk-overlay-primary .uk-nav-secondary .uk-nav-subtitle,
.uk-offcanvas-bar .uk-nav-secondary .uk-nav-subtitle {
  color: rgba(255, 255, 255, 0.5);
}
.uk-light .uk-nav-secondary > li > a:hover .uk-nav-subtitle,
.uk-section-primary:not(.uk-preserve-color) .uk-nav-secondary > li > a:hover .uk-nav-subtitle,
.uk-section-secondary:not(.uk-preserve-color) .uk-nav-secondary > li > a:hover .uk-nav-subtitle,
.uk-tile-primary:not(.uk-preserve-color) .uk-nav-secondary > li > a:hover .uk-nav-subtitle,
.uk-tile-secondary:not(.uk-preserve-color) .uk-nav-secondary > li > a:hover .uk-nav-subtitle,
.uk-card-primary.uk-card-body .uk-nav-secondary > li > a:hover .uk-nav-subtitle,
.uk-card-primary > :not([class*='uk-card-media']) .uk-nav-secondary > li > a:hover .uk-nav-subtitle,
.uk-card-secondary.uk-card-body .uk-nav-secondary > li > a:hover .uk-nav-subtitle,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-nav-secondary > li > a:hover .uk-nav-subtitle,
.uk-overlay-primary .uk-nav-secondary > li > a:hover .uk-nav-subtitle,
.uk-offcanvas-bar .uk-nav-secondary > li > a:hover .uk-nav-subtitle {
  color: rgba(255, 255, 255, 0.7);
}
.uk-light .uk-nav-secondary > li.uk-active > a .uk-nav-subtitle,
.uk-section-primary:not(.uk-preserve-color) .uk-nav-secondary > li.uk-active > a .uk-nav-subtitle,
.uk-section-secondary:not(.uk-preserve-color) .uk-nav-secondary > li.uk-active > a .uk-nav-subtitle,
.uk-tile-primary:not(.uk-preserve-color) .uk-nav-secondary > li.uk-active > a .uk-nav-subtitle,
.uk-tile-secondary:not(.uk-preserve-color) .uk-nav-secondary > li.uk-active > a .uk-nav-subtitle,
.uk-card-primary.uk-card-body .uk-nav-secondary > li.uk-active > a .uk-nav-subtitle,
.uk-card-primary > :not([class*='uk-card-media']) .uk-nav-secondary > li.uk-active > a .uk-nav-subtitle,
.uk-card-secondary.uk-card-body .uk-nav-secondary > li.uk-active > a .uk-nav-subtitle,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-nav-secondary > li.uk-active > a .uk-nav-subtitle,
.uk-overlay-primary .uk-nav-secondary > li.uk-active > a .uk-nav-subtitle,
.uk-offcanvas-bar .uk-nav-secondary > li.uk-active > a .uk-nav-subtitle {
  color: #fff;
}
.uk-light .uk-nav-secondary .uk-nav-header,
.uk-section-primary:not(.uk-preserve-color) .uk-nav-secondary .uk-nav-header,
.uk-section-secondary:not(.uk-preserve-color) .uk-nav-secondary .uk-nav-header,
.uk-tile-primary:not(.uk-preserve-color) .uk-nav-secondary .uk-nav-header,
.uk-tile-secondary:not(.uk-preserve-color) .uk-nav-secondary .uk-nav-header,
.uk-card-primary.uk-card-body .uk-nav-secondary .uk-nav-header,
.uk-card-primary > :not([class*='uk-card-media']) .uk-nav-secondary .uk-nav-header,
.uk-card-secondary.uk-card-body .uk-nav-secondary .uk-nav-header,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-nav-secondary .uk-nav-header,
.uk-overlay-primary .uk-nav-secondary .uk-nav-header,
.uk-offcanvas-bar .uk-nav-secondary .uk-nav-header {
  color: #fff;
}
.uk-light .uk-nav-secondary .uk-nav-divider,
.uk-section-primary:not(.uk-preserve-color) .uk-nav-secondary .uk-nav-divider,
.uk-section-secondary:not(.uk-preserve-color) .uk-nav-secondary .uk-nav-divider,
.uk-tile-primary:not(.uk-preserve-color) .uk-nav-secondary .uk-nav-divider,
.uk-tile-secondary:not(.uk-preserve-color) .uk-nav-secondary .uk-nav-divider,
.uk-card-primary.uk-card-body .uk-nav-secondary .uk-nav-divider,
.uk-card-primary > :not([class*='uk-card-media']) .uk-nav-secondary .uk-nav-divider,
.uk-card-secondary.uk-card-body .uk-nav-secondary .uk-nav-divider,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-nav-secondary .uk-nav-divider,
.uk-overlay-primary .uk-nav-secondary .uk-nav-divider,
.uk-offcanvas-bar .uk-nav-secondary .uk-nav-divider {
  border-top-color: rgba(255, 255, 255, 0.2);
}
.uk-light .uk-nav-secondary .uk-nav-sub a,
.uk-section-primary:not(.uk-preserve-color) .uk-nav-secondary .uk-nav-sub a,
.uk-section-secondary:not(.uk-preserve-color) .uk-nav-secondary .uk-nav-sub a,
.uk-tile-primary:not(.uk-preserve-color) .uk-nav-secondary .uk-nav-sub a,
.uk-tile-secondary:not(.uk-preserve-color) .uk-nav-secondary .uk-nav-sub a,
.uk-card-primary.uk-card-body .uk-nav-secondary .uk-nav-sub a,
.uk-card-primary > :not([class*='uk-card-media']) .uk-nav-secondary .uk-nav-sub a,
.uk-card-secondary.uk-card-body .uk-nav-secondary .uk-nav-sub a,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-nav-secondary .uk-nav-sub a,
.uk-overlay-primary .uk-nav-secondary .uk-nav-sub a,
.uk-offcanvas-bar .uk-nav-secondary .uk-nav-sub a {
  color: rgba(255, 255, 255, 0.5);
}
.uk-light .uk-nav-secondary .uk-nav-sub a:hover,
.uk-section-primary:not(.uk-preserve-color) .uk-nav-secondary .uk-nav-sub a:hover,
.uk-section-secondary:not(.uk-preserve-color) .uk-nav-secondary .uk-nav-sub a:hover,
.uk-tile-primary:not(.uk-preserve-color) .uk-nav-secondary .uk-nav-sub a:hover,
.uk-tile-secondary:not(.uk-preserve-color) .uk-nav-secondary .uk-nav-sub a:hover,
.uk-card-primary.uk-card-body .uk-nav-secondary .uk-nav-sub a:hover,
.uk-card-primary > :not([class*='uk-card-media']) .uk-nav-secondary .uk-nav-sub a:hover,
.uk-card-secondary.uk-card-body .uk-nav-secondary .uk-nav-sub a:hover,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-nav-secondary .uk-nav-sub a:hover,
.uk-overlay-primary .uk-nav-secondary .uk-nav-sub a:hover,
.uk-offcanvas-bar .uk-nav-secondary .uk-nav-sub a:hover {
  color: rgba(255, 255, 255, 0.7);
}
.uk-light .uk-nav-secondary .uk-nav-sub li.uk-active > a,
.uk-section-primary:not(.uk-preserve-color) .uk-nav-secondary .uk-nav-sub li.uk-active > a,
.uk-section-secondary:not(.uk-preserve-color) .uk-nav-secondary .uk-nav-sub li.uk-active > a,
.uk-tile-primary:not(.uk-preserve-color) .uk-nav-secondary .uk-nav-sub li.uk-active > a,
.uk-tile-secondary:not(.uk-preserve-color) .uk-nav-secondary .uk-nav-sub li.uk-active > a,
.uk-card-primary.uk-card-body .uk-nav-secondary .uk-nav-sub li.uk-active > a,
.uk-card-primary > :not([class*='uk-card-media']) .uk-nav-secondary .uk-nav-sub li.uk-active > a,
.uk-card-secondary.uk-card-body .uk-nav-secondary .uk-nav-sub li.uk-active > a,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-nav-secondary .uk-nav-sub li.uk-active > a,
.uk-overlay-primary .uk-nav-secondary .uk-nav-sub li.uk-active > a,
.uk-offcanvas-bar .uk-nav-secondary .uk-nav-sub li.uk-active > a {
  color: #fff;
}
.uk-light .uk-nav.uk-nav-divider > :not(.uk-nav-divider) + :not(.uk-nav-header, .uk-nav-divider),
.uk-section-primary:not(.uk-preserve-color) .uk-nav.uk-nav-divider > :not(.uk-nav-divider) + :not(.uk-nav-header, .uk-nav-divider),
.uk-section-secondary:not(.uk-preserve-color) .uk-nav.uk-nav-divider > :not(.uk-nav-divider) + :not(.uk-nav-header, .uk-nav-divider),
.uk-tile-primary:not(.uk-preserve-color) .uk-nav.uk-nav-divider > :not(.uk-nav-divider) + :not(.uk-nav-header, .uk-nav-divider),
.uk-tile-secondary:not(.uk-preserve-color) .uk-nav.uk-nav-divider > :not(.uk-nav-divider) + :not(.uk-nav-header, .uk-nav-divider),
.uk-card-primary.uk-card-body .uk-nav.uk-nav-divider > :not(.uk-nav-divider) + :not(.uk-nav-header, .uk-nav-divider),
.uk-card-primary > :not([class*='uk-card-media']) .uk-nav.uk-nav-divider > :not(.uk-nav-divider) + :not(.uk-nav-header, .uk-nav-divider),
.uk-card-secondary.uk-card-body .uk-nav.uk-nav-divider > :not(.uk-nav-divider) + :not(.uk-nav-header, .uk-nav-divider),
.uk-card-secondary > :not([class*='uk-card-media']) .uk-nav.uk-nav-divider > :not(.uk-nav-divider) + :not(.uk-nav-header, .uk-nav-divider),
.uk-overlay-primary .uk-nav.uk-nav-divider > :not(.uk-nav-divider) + :not(.uk-nav-header, .uk-nav-divider),
.uk-offcanvas-bar .uk-nav.uk-nav-divider > :not(.uk-nav-divider) + :not(.uk-nav-header, .uk-nav-divider) {
  border-top-color: rgba(255, 255, 255, 0.2);
}
.uk-light .uk-navbar-nav > li > a,
.uk-section-primary:not(.uk-preserve-color) .uk-navbar-nav > li > a,
.uk-section-secondary:not(.uk-preserve-color) .uk-navbar-nav > li > a,
.uk-tile-primary:not(.uk-preserve-color) .uk-navbar-nav > li > a,
.uk-tile-secondary:not(.uk-preserve-color) .uk-navbar-nav > li > a,
.uk-card-primary.uk-card-body .uk-navbar-nav > li > a,
.uk-card-primary > :not([class*='uk-card-media']) .uk-navbar-nav > li > a,
.uk-card-secondary.uk-card-body .uk-navbar-nav > li > a,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-navbar-nav > li > a,
.uk-overlay-primary .uk-navbar-nav > li > a,
.uk-offcanvas-bar .uk-navbar-nav > li > a {
  color: rgba(255, 255, 255, 0.5);
}
.uk-light .uk-navbar-nav > li:hover > a,
.uk-light .uk-navbar-nav > li > a[aria-expanded="true"],
.uk-section-primary:not(.uk-preserve-color) .uk-navbar-nav > li:hover > a,
.uk-section-primary:not(.uk-preserve-color) .uk-navbar-nav > li > a[aria-expanded="true"],
.uk-section-secondary:not(.uk-preserve-color) .uk-navbar-nav > li:hover > a,
.uk-section-secondary:not(.uk-preserve-color) .uk-navbar-nav > li > a[aria-expanded="true"],
.uk-tile-primary:not(.uk-preserve-color) .uk-navbar-nav > li:hover > a,
.uk-tile-primary:not(.uk-preserve-color) .uk-navbar-nav > li > a[aria-expanded="true"],
.uk-tile-secondary:not(.uk-preserve-color) .uk-navbar-nav > li:hover > a,
.uk-tile-secondary:not(.uk-preserve-color) .uk-navbar-nav > li > a[aria-expanded="true"],
.uk-card-primary.uk-card-body .uk-navbar-nav > li:hover > a,
.uk-card-primary.uk-card-body .uk-navbar-nav > li > a[aria-expanded="true"],
.uk-card-primary > :not([class*='uk-card-media']) .uk-navbar-nav > li:hover > a,
.uk-card-primary > :not([class*='uk-card-media']) .uk-navbar-nav > li > a[aria-expanded="true"],
.uk-card-secondary.uk-card-body .uk-navbar-nav > li:hover > a,
.uk-card-secondary.uk-card-body .uk-navbar-nav > li > a[aria-expanded="true"],
.uk-card-secondary > :not([class*='uk-card-media']) .uk-navbar-nav > li:hover > a,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-navbar-nav > li > a[aria-expanded="true"],
.uk-overlay-primary .uk-navbar-nav > li:hover > a,
.uk-overlay-primary .uk-navbar-nav > li > a[aria-expanded="true"],
.uk-offcanvas-bar .uk-navbar-nav > li:hover > a,
.uk-offcanvas-bar .uk-navbar-nav > li > a[aria-expanded="true"] {
  color: rgba(255, 255, 255, 0.7);
}
.uk-light .uk-navbar-nav > li > a:active,
.uk-section-primary:not(.uk-preserve-color) .uk-navbar-nav > li > a:active,
.uk-section-secondary:not(.uk-preserve-color) .uk-navbar-nav > li > a:active,
.uk-tile-primary:not(.uk-preserve-color) .uk-navbar-nav > li > a:active,
.uk-tile-secondary:not(.uk-preserve-color) .uk-navbar-nav > li > a:active,
.uk-card-primary.uk-card-body .uk-navbar-nav > li > a:active,
.uk-card-primary > :not([class*='uk-card-media']) .uk-navbar-nav > li > a:active,
.uk-card-secondary.uk-card-body .uk-navbar-nav > li > a:active,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-navbar-nav > li > a:active,
.uk-overlay-primary .uk-navbar-nav > li > a:active,
.uk-offcanvas-bar .uk-navbar-nav > li > a:active {
  color: #fff;
}
.uk-light .uk-navbar-nav > li.uk-active > a,
.uk-section-primary:not(.uk-preserve-color) .uk-navbar-nav > li.uk-active > a,
.uk-section-secondary:not(.uk-preserve-color) .uk-navbar-nav > li.uk-active > a,
.uk-tile-primary:not(.uk-preserve-color) .uk-navbar-nav > li.uk-active > a,
.uk-tile-secondary:not(.uk-preserve-color) .uk-navbar-nav > li.uk-active > a,
.uk-card-primary.uk-card-body .uk-navbar-nav > li.uk-active > a,
.uk-card-primary > :not([class*='uk-card-media']) .uk-navbar-nav > li.uk-active > a,
.uk-card-secondary.uk-card-body .uk-navbar-nav > li.uk-active > a,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-navbar-nav > li.uk-active > a,
.uk-overlay-primary .uk-navbar-nav > li.uk-active > a,
.uk-offcanvas-bar .uk-navbar-nav > li.uk-active > a {
  color: #fff;
}
.uk-light .uk-navbar-item,
.uk-section-primary:not(.uk-preserve-color) .uk-navbar-item,
.uk-section-secondary:not(.uk-preserve-color) .uk-navbar-item,
.uk-tile-primary:not(.uk-preserve-color) .uk-navbar-item,
.uk-tile-secondary:not(.uk-preserve-color) .uk-navbar-item,
.uk-card-primary.uk-card-body .uk-navbar-item,
.uk-card-primary > :not([class*='uk-card-media']) .uk-navbar-item,
.uk-card-secondary.uk-card-body .uk-navbar-item,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-navbar-item,
.uk-overlay-primary .uk-navbar-item,
.uk-offcanvas-bar .uk-navbar-item {
  color: rgba(255, 255, 255, 0.7);
}
.uk-light .uk-navbar-toggle,
.uk-section-primary:not(.uk-preserve-color) .uk-navbar-toggle,
.uk-section-secondary:not(.uk-preserve-color) .uk-navbar-toggle,
.uk-tile-primary:not(.uk-preserve-color) .uk-navbar-toggle,
.uk-tile-secondary:not(.uk-preserve-color) .uk-navbar-toggle,
.uk-card-primary.uk-card-body .uk-navbar-toggle,
.uk-card-primary > :not([class*='uk-card-media']) .uk-navbar-toggle,
.uk-card-secondary.uk-card-body .uk-navbar-toggle,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-navbar-toggle,
.uk-overlay-primary .uk-navbar-toggle,
.uk-offcanvas-bar .uk-navbar-toggle {
  color: rgba(255, 255, 255, 0.5);
}
.uk-light .uk-navbar-toggle:hover,
.uk-light .uk-navbar-toggle[aria-expanded="true"],
.uk-section-primary:not(.uk-preserve-color) .uk-navbar-toggle:hover,
.uk-section-primary:not(.uk-preserve-color) .uk-navbar-toggle[aria-expanded="true"],
.uk-section-secondary:not(.uk-preserve-color) .uk-navbar-toggle:hover,
.uk-section-secondary:not(.uk-preserve-color) .uk-navbar-toggle[aria-expanded="true"],
.uk-tile-primary:not(.uk-preserve-color) .uk-navbar-toggle:hover,
.uk-tile-primary:not(.uk-preserve-color) .uk-navbar-toggle[aria-expanded="true"],
.uk-tile-secondary:not(.uk-preserve-color) .uk-navbar-toggle:hover,
.uk-tile-secondary:not(.uk-preserve-color) .uk-navbar-toggle[aria-expanded="true"],
.uk-card-primary.uk-card-body .uk-navbar-toggle:hover,
.uk-card-primary.uk-card-body .uk-navbar-toggle[aria-expanded="true"],
.uk-card-primary > :not([class*='uk-card-media']) .uk-navbar-toggle:hover,
.uk-card-primary > :not([class*='uk-card-media']) .uk-navbar-toggle[aria-expanded="true"],
.uk-card-secondary.uk-card-body .uk-navbar-toggle:hover,
.uk-card-secondary.uk-card-body .uk-navbar-toggle[aria-expanded="true"],
.uk-card-secondary > :not([class*='uk-card-media']) .uk-navbar-toggle:hover,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-navbar-toggle[aria-expanded="true"],
.uk-overlay-primary .uk-navbar-toggle:hover,
.uk-overlay-primary .uk-navbar-toggle[aria-expanded="true"],
.uk-offcanvas-bar .uk-navbar-toggle:hover,
.uk-offcanvas-bar .uk-navbar-toggle[aria-expanded="true"] {
  color: rgba(255, 255, 255, 0.7);
}
.uk-light .uk-subnav > * > :first-child,
.uk-section-primary:not(.uk-preserve-color) .uk-subnav > * > :first-child,
.uk-section-secondary:not(.uk-preserve-color) .uk-subnav > * > :first-child,
.uk-tile-primary:not(.uk-preserve-color) .uk-subnav > * > :first-child,
.uk-tile-secondary:not(.uk-preserve-color) .uk-subnav > * > :first-child,
.uk-card-primary.uk-card-body .uk-subnav > * > :first-child,
.uk-card-primary > :not([class*='uk-card-media']) .uk-subnav > * > :first-child,
.uk-card-secondary.uk-card-body .uk-subnav > * > :first-child,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-subnav > * > :first-child,
.uk-overlay-primary .uk-subnav > * > :first-child,
.uk-offcanvas-bar .uk-subnav > * > :first-child {
  color: rgba(255, 255, 255, 0.5);
}
.uk-light .uk-subnav > * > a:hover,
.uk-section-primary:not(.uk-preserve-color) .uk-subnav > * > a:hover,
.uk-section-secondary:not(.uk-preserve-color) .uk-subnav > * > a:hover,
.uk-tile-primary:not(.uk-preserve-color) .uk-subnav > * > a:hover,
.uk-tile-secondary:not(.uk-preserve-color) .uk-subnav > * > a:hover,
.uk-card-primary.uk-card-body .uk-subnav > * > a:hover,
.uk-card-primary > :not([class*='uk-card-media']) .uk-subnav > * > a:hover,
.uk-card-secondary.uk-card-body .uk-subnav > * > a:hover,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-subnav > * > a:hover,
.uk-overlay-primary .uk-subnav > * > a:hover,
.uk-offcanvas-bar .uk-subnav > * > a:hover {
  color: rgba(255, 255, 255, 0.7);
}
.uk-light .uk-subnav > .uk-active > a,
.uk-section-primary:not(.uk-preserve-color) .uk-subnav > .uk-active > a,
.uk-section-secondary:not(.uk-preserve-color) .uk-subnav > .uk-active > a,
.uk-tile-primary:not(.uk-preserve-color) .uk-subnav > .uk-active > a,
.uk-tile-secondary:not(.uk-preserve-color) .uk-subnav > .uk-active > a,
.uk-card-primary.uk-card-body .uk-subnav > .uk-active > a,
.uk-card-primary > :not([class*='uk-card-media']) .uk-subnav > .uk-active > a,
.uk-card-secondary.uk-card-body .uk-subnav > .uk-active > a,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-subnav > .uk-active > a,
.uk-overlay-primary .uk-subnav > .uk-active > a,
.uk-offcanvas-bar .uk-subnav > .uk-active > a {
  color: #fff;
}
.uk-light .uk-subnav-divider > :nth-child(n+2):not(.uk-first-column)::before,
.uk-section-primary:not(.uk-preserve-color) .uk-subnav-divider > :nth-child(n+2):not(.uk-first-column)::before,
.uk-section-secondary:not(.uk-preserve-color) .uk-subnav-divider > :nth-child(n+2):not(.uk-first-column)::before,
.uk-tile-primary:not(.uk-preserve-color) .uk-subnav-divider > :nth-child(n+2):not(.uk-first-column)::before,
.uk-tile-secondary:not(.uk-preserve-color) .uk-subnav-divider > :nth-child(n+2):not(.uk-first-column)::before,
.uk-card-primary.uk-card-body .uk-subnav-divider > :nth-child(n+2):not(.uk-first-column)::before,
.uk-card-primary > :not([class*='uk-card-media']) .uk-subnav-divider > :nth-child(n+2):not(.uk-first-column)::before,
.uk-card-secondary.uk-card-body .uk-subnav-divider > :nth-child(n+2):not(.uk-first-column)::before,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-subnav-divider > :nth-child(n+2):not(.uk-first-column)::before,
.uk-overlay-primary .uk-subnav-divider > :nth-child(n+2):not(.uk-first-column)::before,
.uk-offcanvas-bar .uk-subnav-divider > :nth-child(n+2):not(.uk-first-column)::before {
  border-left-color: rgba(255, 255, 255, 0.2);
}
.uk-light .uk-subnav-pill > * > :first-child,
.uk-section-primary:not(.uk-preserve-color) .uk-subnav-pill > * > :first-child,
.uk-section-secondary:not(.uk-preserve-color) .uk-subnav-pill > * > :first-child,
.uk-tile-primary:not(.uk-preserve-color) .uk-subnav-pill > * > :first-child,
.uk-tile-secondary:not(.uk-preserve-color) .uk-subnav-pill > * > :first-child,
.uk-card-primary.uk-card-body .uk-subnav-pill > * > :first-child,
.uk-card-primary > :not([class*='uk-card-media']) .uk-subnav-pill > * > :first-child,
.uk-card-secondary.uk-card-body .uk-subnav-pill > * > :first-child,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-subnav-pill > * > :first-child,
.uk-overlay-primary .uk-subnav-pill > * > :first-child,
.uk-offcanvas-bar .uk-subnav-pill > * > :first-child {
  background-color: transparent;
  color: rgba(255, 255, 255, 0.5);
}
.uk-light .uk-subnav-pill > * > a:hover,
.uk-section-primary:not(.uk-preserve-color) .uk-subnav-pill > * > a:hover,
.uk-section-secondary:not(.uk-preserve-color) .uk-subnav-pill > * > a:hover,
.uk-tile-primary:not(.uk-preserve-color) .uk-subnav-pill > * > a:hover,
.uk-tile-secondary:not(.uk-preserve-color) .uk-subnav-pill > * > a:hover,
.uk-card-primary.uk-card-body .uk-subnav-pill > * > a:hover,
.uk-card-primary > :not([class*='uk-card-media']) .uk-subnav-pill > * > a:hover,
.uk-card-secondary.uk-card-body .uk-subnav-pill > * > a:hover,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-subnav-pill > * > a:hover,
.uk-overlay-primary .uk-subnav-pill > * > a:hover,
.uk-offcanvas-bar .uk-subnav-pill > * > a:hover {
  background-color: rgba(255, 255, 255, 0.1);
  color: rgba(255, 255, 255, 0.7);
}
.uk-light .uk-subnav-pill > * > a:active,
.uk-section-primary:not(.uk-preserve-color) .uk-subnav-pill > * > a:active,
.uk-section-secondary:not(.uk-preserve-color) .uk-subnav-pill > * > a:active,
.uk-tile-primary:not(.uk-preserve-color) .uk-subnav-pill > * > a:active,
.uk-tile-secondary:not(.uk-preserve-color) .uk-subnav-pill > * > a:active,
.uk-card-primary.uk-card-body .uk-subnav-pill > * > a:active,
.uk-card-primary > :not([class*='uk-card-media']) .uk-subnav-pill > * > a:active,
.uk-card-secondary.uk-card-body .uk-subnav-pill > * > a:active,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-subnav-pill > * > a:active,
.uk-overlay-primary .uk-subnav-pill > * > a:active,
.uk-offcanvas-bar .uk-subnav-pill > * > a:active {
  background-color: rgba(255, 255, 255, 0.1);
  color: rgba(255, 255, 255, 0.7);
}
.uk-light .uk-subnav-pill > .uk-active > a,
.uk-section-primary:not(.uk-preserve-color) .uk-subnav-pill > .uk-active > a,
.uk-section-secondary:not(.uk-preserve-color) .uk-subnav-pill > .uk-active > a,
.uk-tile-primary:not(.uk-preserve-color) .uk-subnav-pill > .uk-active > a,
.uk-tile-secondary:not(.uk-preserve-color) .uk-subnav-pill > .uk-active > a,
.uk-card-primary.uk-card-body .uk-subnav-pill > .uk-active > a,
.uk-card-primary > :not([class*='uk-card-media']) .uk-subnav-pill > .uk-active > a,
.uk-card-secondary.uk-card-body .uk-subnav-pill > .uk-active > a,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-subnav-pill > .uk-active > a,
.uk-overlay-primary .uk-subnav-pill > .uk-active > a,
.uk-offcanvas-bar .uk-subnav-pill > .uk-active > a {
  background-color: #fff;
  color: #666;
}
.uk-light .uk-subnav > .uk-disabled > a,
.uk-section-primary:not(.uk-preserve-color) .uk-subnav > .uk-disabled > a,
.uk-section-secondary:not(.uk-preserve-color) .uk-subnav > .uk-disabled > a,
.uk-tile-primary:not(.uk-preserve-color) .uk-subnav > .uk-disabled > a,
.uk-tile-secondary:not(.uk-preserve-color) .uk-subnav > .uk-disabled > a,
.uk-card-primary.uk-card-body .uk-subnav > .uk-disabled > a,
.uk-card-primary > :not([class*='uk-card-media']) .uk-subnav > .uk-disabled > a,
.uk-card-secondary.uk-card-body .uk-subnav > .uk-disabled > a,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-subnav > .uk-disabled > a,
.uk-overlay-primary .uk-subnav > .uk-disabled > a,
.uk-offcanvas-bar .uk-subnav > .uk-disabled > a {
  color: rgba(255, 255, 255, 0.5);
}
.uk-light .uk-breadcrumb > * > *,
.uk-section-primary:not(.uk-preserve-color) .uk-breadcrumb > * > *,
.uk-section-secondary:not(.uk-preserve-color) .uk-breadcrumb > * > *,
.uk-tile-primary:not(.uk-preserve-color) .uk-breadcrumb > * > *,
.uk-tile-secondary:not(.uk-preserve-color) .uk-breadcrumb > * > *,
.uk-card-primary.uk-card-body .uk-breadcrumb > * > *,
.uk-card-primary > :not([class*='uk-card-media']) .uk-breadcrumb > * > *,
.uk-card-secondary.uk-card-body .uk-breadcrumb > * > *,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-breadcrumb > * > *,
.uk-overlay-primary .uk-breadcrumb > * > *,
.uk-offcanvas-bar .uk-breadcrumb > * > * {
  color: rgba(255, 255, 255, 0.5);
}
.uk-light .uk-breadcrumb > * > :hover,
.uk-section-primary:not(.uk-preserve-color) .uk-breadcrumb > * > :hover,
.uk-section-secondary:not(.uk-preserve-color) .uk-breadcrumb > * > :hover,
.uk-tile-primary:not(.uk-preserve-color) .uk-breadcrumb > * > :hover,
.uk-tile-secondary:not(.uk-preserve-color) .uk-breadcrumb > * > :hover,
.uk-card-primary.uk-card-body .uk-breadcrumb > * > :hover,
.uk-card-primary > :not([class*='uk-card-media']) .uk-breadcrumb > * > :hover,
.uk-card-secondary.uk-card-body .uk-breadcrumb > * > :hover,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-breadcrumb > * > :hover,
.uk-overlay-primary .uk-breadcrumb > * > :hover,
.uk-offcanvas-bar .uk-breadcrumb > * > :hover {
  color: rgba(255, 255, 255, 0.7);
}
.uk-light .uk-breadcrumb > :last-child > *,
.uk-section-primary:not(.uk-preserve-color) .uk-breadcrumb > :last-child > *,
.uk-section-secondary:not(.uk-preserve-color) .uk-breadcrumb > :last-child > *,
.uk-tile-primary:not(.uk-preserve-color) .uk-breadcrumb > :last-child > *,
.uk-tile-secondary:not(.uk-preserve-color) .uk-breadcrumb > :last-child > *,
.uk-card-primary.uk-card-body .uk-breadcrumb > :last-child > *,
.uk-card-primary > :not([class*='uk-card-media']) .uk-breadcrumb > :last-child > *,
.uk-card-secondary.uk-card-body .uk-breadcrumb > :last-child > *,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-breadcrumb > :last-child > *,
.uk-overlay-primary .uk-breadcrumb > :last-child > *,
.uk-offcanvas-bar .uk-breadcrumb > :last-child > * {
  color: rgba(255, 255, 255, 0.7);
}
.uk-light .uk-breadcrumb > :nth-child(n+2):not(.uk-first-column)::before,
.uk-section-primary:not(.uk-preserve-color) .uk-breadcrumb > :nth-child(n+2):not(.uk-first-column)::before,
.uk-section-secondary:not(.uk-preserve-color) .uk-breadcrumb > :nth-child(n+2):not(.uk-first-column)::before,
.uk-tile-primary:not(.uk-preserve-color) .uk-breadcrumb > :nth-child(n+2):not(.uk-first-column)::before,
.uk-tile-secondary:not(.uk-preserve-color) .uk-breadcrumb > :nth-child(n+2):not(.uk-first-column)::before,
.uk-card-primary.uk-card-body .uk-breadcrumb > :nth-child(n+2):not(.uk-first-column)::before,
.uk-card-primary > :not([class*='uk-card-media']) .uk-breadcrumb > :nth-child(n+2):not(.uk-first-column)::before,
.uk-card-secondary.uk-card-body .uk-breadcrumb > :nth-child(n+2):not(.uk-first-column)::before,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-breadcrumb > :nth-child(n+2):not(.uk-first-column)::before,
.uk-overlay-primary .uk-breadcrumb > :nth-child(n+2):not(.uk-first-column)::before,
.uk-offcanvas-bar .uk-breadcrumb > :nth-child(n+2):not(.uk-first-column)::before {
  color: rgba(255, 255, 255, 0.5);
}
.uk-light .uk-pagination > * > *,
.uk-section-primary:not(.uk-preserve-color) .uk-pagination > * > *,
.uk-section-secondary:not(.uk-preserve-color) .uk-pagination > * > *,
.uk-tile-primary:not(.uk-preserve-color) .uk-pagination > * > *,
.uk-tile-secondary:not(.uk-preserve-color) .uk-pagination > * > *,
.uk-card-primary.uk-card-body .uk-pagination > * > *,
.uk-card-primary > :not([class*='uk-card-media']) .uk-pagination > * > *,
.uk-card-secondary.uk-card-body .uk-pagination > * > *,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-pagination > * > *,
.uk-overlay-primary .uk-pagination > * > *,
.uk-offcanvas-bar .uk-pagination > * > * {
  color: rgba(255, 255, 255, 0.5);
}
.uk-light .uk-pagination > * > :hover,
.uk-section-primary:not(.uk-preserve-color) .uk-pagination > * > :hover,
.uk-section-secondary:not(.uk-preserve-color) .uk-pagination > * > :hover,
.uk-tile-primary:not(.uk-preserve-color) .uk-pagination > * > :hover,
.uk-tile-secondary:not(.uk-preserve-color) .uk-pagination > * > :hover,
.uk-card-primary.uk-card-body .uk-pagination > * > :hover,
.uk-card-primary > :not([class*='uk-card-media']) .uk-pagination > * > :hover,
.uk-card-secondary.uk-card-body .uk-pagination > * > :hover,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-pagination > * > :hover,
.uk-overlay-primary .uk-pagination > * > :hover,
.uk-offcanvas-bar .uk-pagination > * > :hover {
  color: rgba(255, 255, 255, 0.7);
}
.uk-light .uk-pagination > .uk-active > *,
.uk-section-primary:not(.uk-preserve-color) .uk-pagination > .uk-active > *,
.uk-section-secondary:not(.uk-preserve-color) .uk-pagination > .uk-active > *,
.uk-tile-primary:not(.uk-preserve-color) .uk-pagination > .uk-active > *,
.uk-tile-secondary:not(.uk-preserve-color) .uk-pagination > .uk-active > *,
.uk-card-primary.uk-card-body .uk-pagination > .uk-active > *,
.uk-card-primary > :not([class*='uk-card-media']) .uk-pagination > .uk-active > *,
.uk-card-secondary.uk-card-body .uk-pagination > .uk-active > *,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-pagination > .uk-active > *,
.uk-overlay-primary .uk-pagination > .uk-active > *,
.uk-offcanvas-bar .uk-pagination > .uk-active > * {
  color: rgba(255, 255, 255, 0.7);
}
.uk-light .uk-pagination > .uk-disabled > *,
.uk-section-primary:not(.uk-preserve-color) .uk-pagination > .uk-disabled > *,
.uk-section-secondary:not(.uk-preserve-color) .uk-pagination > .uk-disabled > *,
.uk-tile-primary:not(.uk-preserve-color) .uk-pagination > .uk-disabled > *,
.uk-tile-secondary:not(.uk-preserve-color) .uk-pagination > .uk-disabled > *,
.uk-card-primary.uk-card-body .uk-pagination > .uk-disabled > *,
.uk-card-primary > :not([class*='uk-card-media']) .uk-pagination > .uk-disabled > *,
.uk-card-secondary.uk-card-body .uk-pagination > .uk-disabled > *,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-pagination > .uk-disabled > *,
.uk-overlay-primary .uk-pagination > .uk-disabled > *,
.uk-offcanvas-bar .uk-pagination > .uk-disabled > * {
  color: rgba(255, 255, 255, 0.5);
}
.uk-light .uk-tab::before,
.uk-section-primary:not(.uk-preserve-color) .uk-tab::before,
.uk-section-secondary:not(.uk-preserve-color) .uk-tab::before,
.uk-tile-primary:not(.uk-preserve-color) .uk-tab::before,
.uk-tile-secondary:not(.uk-preserve-color) .uk-tab::before,
.uk-card-primary.uk-card-body .uk-tab::before,
.uk-card-primary > :not([class*='uk-card-media']) .uk-tab::before,
.uk-card-secondary.uk-card-body .uk-tab::before,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-tab::before,
.uk-overlay-primary .uk-tab::before,
.uk-offcanvas-bar .uk-tab::before {
  border-color: rgba(255, 255, 255, 0.2);
}
.uk-light .uk-tab > * > a,
.uk-section-primary:not(.uk-preserve-color) .uk-tab > * > a,
.uk-section-secondary:not(.uk-preserve-color) .uk-tab > * > a,
.uk-tile-primary:not(.uk-preserve-color) .uk-tab > * > a,
.uk-tile-secondary:not(.uk-preserve-color) .uk-tab > * > a,
.uk-card-primary.uk-card-body .uk-tab > * > a,
.uk-card-primary > :not([class*='uk-card-media']) .uk-tab > * > a,
.uk-card-secondary.uk-card-body .uk-tab > * > a,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-tab > * > a,
.uk-overlay-primary .uk-tab > * > a,
.uk-offcanvas-bar .uk-tab > * > a {
  color: rgba(255, 255, 255, 0.5);
}
.uk-light .uk-tab > * > a:hover,
.uk-section-primary:not(.uk-preserve-color) .uk-tab > * > a:hover,
.uk-section-secondary:not(.uk-preserve-color) .uk-tab > * > a:hover,
.uk-tile-primary:not(.uk-preserve-color) .uk-tab > * > a:hover,
.uk-tile-secondary:not(.uk-preserve-color) .uk-tab > * > a:hover,
.uk-card-primary.uk-card-body .uk-tab > * > a:hover,
.uk-card-primary > :not([class*='uk-card-media']) .uk-tab > * > a:hover,
.uk-card-secondary.uk-card-body .uk-tab > * > a:hover,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-tab > * > a:hover,
.uk-overlay-primary .uk-tab > * > a:hover,
.uk-offcanvas-bar .uk-tab > * > a:hover {
  color: rgba(255, 255, 255, 0.7);
}
.uk-light .uk-tab > .uk-active > a,
.uk-section-primary:not(.uk-preserve-color) .uk-tab > .uk-active > a,
.uk-section-secondary:not(.uk-preserve-color) .uk-tab > .uk-active > a,
.uk-tile-primary:not(.uk-preserve-color) .uk-tab > .uk-active > a,
.uk-tile-secondary:not(.uk-preserve-color) .uk-tab > .uk-active > a,
.uk-card-primary.uk-card-body .uk-tab > .uk-active > a,
.uk-card-primary > :not([class*='uk-card-media']) .uk-tab > .uk-active > a,
.uk-card-secondary.uk-card-body .uk-tab > .uk-active > a,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-tab > .uk-active > a,
.uk-overlay-primary .uk-tab > .uk-active > a,
.uk-offcanvas-bar .uk-tab > .uk-active > a {
  color: #fff;
  border-color: #fff;
}
.uk-light .uk-tab > .uk-disabled > a,
.uk-section-primary:not(.uk-preserve-color) .uk-tab > .uk-disabled > a,
.uk-section-secondary:not(.uk-preserve-color) .uk-tab > .uk-disabled > a,
.uk-tile-primary:not(.uk-preserve-color) .uk-tab > .uk-disabled > a,
.uk-tile-secondary:not(.uk-preserve-color) .uk-tab > .uk-disabled > a,
.uk-card-primary.uk-card-body .uk-tab > .uk-disabled > a,
.uk-card-primary > :not([class*='uk-card-media']) .uk-tab > .uk-disabled > a,
.uk-card-secondary.uk-card-body .uk-tab > .uk-disabled > a,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-tab > .uk-disabled > a,
.uk-overlay-primary .uk-tab > .uk-disabled > a,
.uk-offcanvas-bar .uk-tab > .uk-disabled > a {
  color: rgba(255, 255, 255, 0.5);
}
.uk-light .uk-slidenav,
.uk-section-primary:not(.uk-preserve-color) .uk-slidenav,
.uk-section-secondary:not(.uk-preserve-color) .uk-slidenav,
.uk-tile-primary:not(.uk-preserve-color) .uk-slidenav,
.uk-tile-secondary:not(.uk-preserve-color) .uk-slidenav,
.uk-card-primary.uk-card-body .uk-slidenav,
.uk-card-primary > :not([class*='uk-card-media']) .uk-slidenav,
.uk-card-secondary.uk-card-body .uk-slidenav,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-slidenav,
.uk-overlay-primary .uk-slidenav,
.uk-offcanvas-bar .uk-slidenav {
  color: rgba(255, 255, 255, 0.7);
}
.uk-light .uk-slidenav:hover,
.uk-section-primary:not(.uk-preserve-color) .uk-slidenav:hover,
.uk-section-secondary:not(.uk-preserve-color) .uk-slidenav:hover,
.uk-tile-primary:not(.uk-preserve-color) .uk-slidenav:hover,
.uk-tile-secondary:not(.uk-preserve-color) .uk-slidenav:hover,
.uk-card-primary.uk-card-body .uk-slidenav:hover,
.uk-card-primary > :not([class*='uk-card-media']) .uk-slidenav:hover,
.uk-card-secondary.uk-card-body .uk-slidenav:hover,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-slidenav:hover,
.uk-overlay-primary .uk-slidenav:hover,
.uk-offcanvas-bar .uk-slidenav:hover {
  color: rgba(255, 255, 255, 0.95);
}
.uk-light .uk-slidenav:active,
.uk-section-primary:not(.uk-preserve-color) .uk-slidenav:active,
.uk-section-secondary:not(.uk-preserve-color) .uk-slidenav:active,
.uk-tile-primary:not(.uk-preserve-color) .uk-slidenav:active,
.uk-tile-secondary:not(.uk-preserve-color) .uk-slidenav:active,
.uk-card-primary.uk-card-body .uk-slidenav:active,
.uk-card-primary > :not([class*='uk-card-media']) .uk-slidenav:active,
.uk-card-secondary.uk-card-body .uk-slidenav:active,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-slidenav:active,
.uk-overlay-primary .uk-slidenav:active,
.uk-offcanvas-bar .uk-slidenav:active {
  color: rgba(255, 255, 255, 0.7);
}
.uk-light .uk-dotnav > * > *,
.uk-section-primary:not(.uk-preserve-color) .uk-dotnav > * > *,
.uk-section-secondary:not(.uk-preserve-color) .uk-dotnav > * > *,
.uk-tile-primary:not(.uk-preserve-color) .uk-dotnav > * > *,
.uk-tile-secondary:not(.uk-preserve-color) .uk-dotnav > * > *,
.uk-card-primary.uk-card-body .uk-dotnav > * > *,
.uk-card-primary > :not([class*='uk-card-media']) .uk-dotnav > * > *,
.uk-card-secondary.uk-card-body .uk-dotnav > * > *,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-dotnav > * > *,
.uk-overlay-primary .uk-dotnav > * > *,
.uk-offcanvas-bar .uk-dotnav > * > * {
  background-color: transparent;
  border-color: rgba(255, 255, 255, 0.9);
}
.uk-light .uk-dotnav > * > :hover,
.uk-section-primary:not(.uk-preserve-color) .uk-dotnav > * > :hover,
.uk-section-secondary:not(.uk-preserve-color) .uk-dotnav > * > :hover,
.uk-tile-primary:not(.uk-preserve-color) .uk-dotnav > * > :hover,
.uk-tile-secondary:not(.uk-preserve-color) .uk-dotnav > * > :hover,
.uk-card-primary.uk-card-body .uk-dotnav > * > :hover,
.uk-card-primary > :not([class*='uk-card-media']) .uk-dotnav > * > :hover,
.uk-card-secondary.uk-card-body .uk-dotnav > * > :hover,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-dotnav > * > :hover,
.uk-overlay-primary .uk-dotnav > * > :hover,
.uk-offcanvas-bar .uk-dotnav > * > :hover {
  background-color: rgba(255, 255, 255, 0.9);
  border-color: transparent;
}
.uk-light .uk-dotnav > * > :active,
.uk-section-primary:not(.uk-preserve-color) .uk-dotnav > * > :active,
.uk-section-secondary:not(.uk-preserve-color) .uk-dotnav > * > :active,
.uk-tile-primary:not(.uk-preserve-color) .uk-dotnav > * > :active,
.uk-tile-secondary:not(.uk-preserve-color) .uk-dotnav > * > :active,
.uk-card-primary.uk-card-body .uk-dotnav > * > :active,
.uk-card-primary > :not([class*='uk-card-media']) .uk-dotnav > * > :active,
.uk-card-secondary.uk-card-body .uk-dotnav > * > :active,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-dotnav > * > :active,
.uk-overlay-primary .uk-dotnav > * > :active,
.uk-offcanvas-bar .uk-dotnav > * > :active {
  background-color: rgba(255, 255, 255, 0.5);
  border-color: transparent;
}
.uk-light .uk-dotnav > .uk-active > *,
.uk-section-primary:not(.uk-preserve-color) .uk-dotnav > .uk-active > *,
.uk-section-secondary:not(.uk-preserve-color) .uk-dotnav > .uk-active > *,
.uk-tile-primary:not(.uk-preserve-color) .uk-dotnav > .uk-active > *,
.uk-tile-secondary:not(.uk-preserve-color) .uk-dotnav > .uk-active > *,
.uk-card-primary.uk-card-body .uk-dotnav > .uk-active > *,
.uk-card-primary > :not([class*='uk-card-media']) .uk-dotnav > .uk-active > *,
.uk-card-secondary.uk-card-body .uk-dotnav > .uk-active > *,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-dotnav > .uk-active > *,
.uk-overlay-primary .uk-dotnav > .uk-active > *,
.uk-offcanvas-bar .uk-dotnav > .uk-active > * {
  background-color: rgba(255, 255, 255, 0.9);
  border-color: transparent;
}
.uk-light .uk-thumbnav > * > *::after,
.uk-section-primary:not(.uk-preserve-color) .uk-thumbnav > * > *::after,
.uk-section-secondary:not(.uk-preserve-color) .uk-thumbnav > * > *::after,
.uk-tile-primary:not(.uk-preserve-color) .uk-thumbnav > * > *::after,
.uk-tile-secondary:not(.uk-preserve-color) .uk-thumbnav > * > *::after,
.uk-card-primary.uk-card-body .uk-thumbnav > * > *::after,
.uk-card-primary > :not([class*='uk-card-media']) .uk-thumbnav > * > *::after,
.uk-card-secondary.uk-card-body .uk-thumbnav > * > *::after,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-thumbnav > * > *::after,
.uk-overlay-primary .uk-thumbnav > * > *::after,
.uk-offcanvas-bar .uk-thumbnav > * > *::after {
  background-image: linear-gradient(180deg, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.4));
}
.uk-light .uk-iconnav > * > a,
.uk-section-primary:not(.uk-preserve-color) .uk-iconnav > * > a,
.uk-section-secondary:not(.uk-preserve-color) .uk-iconnav > * > a,
.uk-tile-primary:not(.uk-preserve-color) .uk-iconnav > * > a,
.uk-tile-secondary:not(.uk-preserve-color) .uk-iconnav > * > a,
.uk-card-primary.uk-card-body .uk-iconnav > * > a,
.uk-card-primary > :not([class*='uk-card-media']) .uk-iconnav > * > a,
.uk-card-secondary.uk-card-body .uk-iconnav > * > a,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-iconnav > * > a,
.uk-overlay-primary .uk-iconnav > * > a,
.uk-offcanvas-bar .uk-iconnav > * > a {
  color: rgba(255, 255, 255, 0.5);
}
.uk-light .uk-iconnav > * > a:hover,
.uk-section-primary:not(.uk-preserve-color) .uk-iconnav > * > a:hover,
.uk-section-secondary:not(.uk-preserve-color) .uk-iconnav > * > a:hover,
.uk-tile-primary:not(.uk-preserve-color) .uk-iconnav > * > a:hover,
.uk-tile-secondary:not(.uk-preserve-color) .uk-iconnav > * > a:hover,
.uk-card-primary.uk-card-body .uk-iconnav > * > a:hover,
.uk-card-primary > :not([class*='uk-card-media']) .uk-iconnav > * > a:hover,
.uk-card-secondary.uk-card-body .uk-iconnav > * > a:hover,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-iconnav > * > a:hover,
.uk-overlay-primary .uk-iconnav > * > a:hover,
.uk-offcanvas-bar .uk-iconnav > * > a:hover {
  color: rgba(255, 255, 255, 0.7);
}
.uk-light .uk-iconnav > .uk-active > a,
.uk-section-primary:not(.uk-preserve-color) .uk-iconnav > .uk-active > a,
.uk-section-secondary:not(.uk-preserve-color) .uk-iconnav > .uk-active > a,
.uk-tile-primary:not(.uk-preserve-color) .uk-iconnav > .uk-active > a,
.uk-tile-secondary:not(.uk-preserve-color) .uk-iconnav > .uk-active > a,
.uk-card-primary.uk-card-body .uk-iconnav > .uk-active > a,
.uk-card-primary > :not([class*='uk-card-media']) .uk-iconnav > .uk-active > a,
.uk-card-secondary.uk-card-body .uk-iconnav > .uk-active > a,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-iconnav > .uk-active > a,
.uk-overlay-primary .uk-iconnav > .uk-active > a,
.uk-offcanvas-bar .uk-iconnav > .uk-active > a {
  color: rgba(255, 255, 255, 0.7);
}
.uk-light .uk-text-lead,
.uk-section-primary:not(.uk-preserve-color) .uk-text-lead,
.uk-section-secondary:not(.uk-preserve-color) .uk-text-lead,
.uk-tile-primary:not(.uk-preserve-color) .uk-text-lead,
.uk-tile-secondary:not(.uk-preserve-color) .uk-text-lead,
.uk-card-primary.uk-card-body .uk-text-lead,
.uk-card-primary > :not([class*='uk-card-media']) .uk-text-lead,
.uk-card-secondary.uk-card-body .uk-text-lead,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-text-lead,
.uk-overlay-primary .uk-text-lead,
.uk-offcanvas-bar .uk-text-lead {
  color: rgba(255, 255, 255, 0.7);
}
.uk-light .uk-text-meta,
.uk-section-primary:not(.uk-preserve-color) .uk-text-meta,
.uk-section-secondary:not(.uk-preserve-color) .uk-text-meta,
.uk-tile-primary:not(.uk-preserve-color) .uk-text-meta,
.uk-tile-secondary:not(.uk-preserve-color) .uk-text-meta,
.uk-card-primary.uk-card-body .uk-text-meta,
.uk-card-primary > :not([class*='uk-card-media']) .uk-text-meta,
.uk-card-secondary.uk-card-body .uk-text-meta,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-text-meta,
.uk-overlay-primary .uk-text-meta,
.uk-offcanvas-bar .uk-text-meta {
  color: rgba(255, 255, 255, 0.5);
}
.uk-light .uk-text-muted,
.uk-section-primary:not(.uk-preserve-color) .uk-text-muted,
.uk-section-secondary:not(.uk-preserve-color) .uk-text-muted,
.uk-tile-primary:not(.uk-preserve-color) .uk-text-muted,
.uk-tile-secondary:not(.uk-preserve-color) .uk-text-muted,
.uk-card-primary.uk-card-body .uk-text-muted,
.uk-card-primary > :not([class*='uk-card-media']) .uk-text-muted,
.uk-card-secondary.uk-card-body .uk-text-muted,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-text-muted,
.uk-overlay-primary .uk-text-muted,
.uk-offcanvas-bar .uk-text-muted {
  color: rgba(255, 255, 255, 0.5) !important;
}
.uk-light .uk-text-emphasis,
.uk-section-primary:not(.uk-preserve-color) .uk-text-emphasis,
.uk-section-secondary:not(.uk-preserve-color) .uk-text-emphasis,
.uk-tile-primary:not(.uk-preserve-color) .uk-text-emphasis,
.uk-tile-secondary:not(.uk-preserve-color) .uk-text-emphasis,
.uk-card-primary.uk-card-body .uk-text-emphasis,
.uk-card-primary > :not([class*='uk-card-media']) .uk-text-emphasis,
.uk-card-secondary.uk-card-body .uk-text-emphasis,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-text-emphasis,
.uk-overlay-primary .uk-text-emphasis,
.uk-offcanvas-bar .uk-text-emphasis {
  color: #fff !important;
}
.uk-light .uk-text-primary,
.uk-section-primary:not(.uk-preserve-color) .uk-text-primary,
.uk-section-secondary:not(.uk-preserve-color) .uk-text-primary,
.uk-tile-primary:not(.uk-preserve-color) .uk-text-primary,
.uk-tile-secondary:not(.uk-preserve-color) .uk-text-primary,
.uk-card-primary.uk-card-body .uk-text-primary,
.uk-card-primary > :not([class*='uk-card-media']) .uk-text-primary,
.uk-card-secondary.uk-card-body .uk-text-primary,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-text-primary,
.uk-overlay-primary .uk-text-primary,
.uk-offcanvas-bar .uk-text-primary {
  color: #fff !important;
}
.uk-light .uk-text-secondary,
.uk-section-primary:not(.uk-preserve-color) .uk-text-secondary,
.uk-section-secondary:not(.uk-preserve-color) .uk-text-secondary,
.uk-tile-primary:not(.uk-preserve-color) .uk-text-secondary,
.uk-tile-secondary:not(.uk-preserve-color) .uk-text-secondary,
.uk-card-primary.uk-card-body .uk-text-secondary,
.uk-card-primary > :not([class*='uk-card-media']) .uk-text-secondary,
.uk-card-secondary.uk-card-body .uk-text-secondary,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-text-secondary,
.uk-overlay-primary .uk-text-secondary,
.uk-offcanvas-bar .uk-text-secondary {
  color: #fff !important;
}
.uk-light .uk-column-divider,
.uk-section-primary:not(.uk-preserve-color) .uk-column-divider,
.uk-section-secondary:not(.uk-preserve-color) .uk-column-divider,
.uk-tile-primary:not(.uk-preserve-color) .uk-column-divider,
.uk-tile-secondary:not(.uk-preserve-color) .uk-column-divider,
.uk-card-primary.uk-card-body .uk-column-divider,
.uk-card-primary > :not([class*='uk-card-media']) .uk-column-divider,
.uk-card-secondary.uk-card-body .uk-column-divider,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-column-divider,
.uk-overlay-primary .uk-column-divider,
.uk-offcanvas-bar .uk-column-divider {
  column-rule-color: rgba(255, 255, 255, 0.2);
}
.uk-light .uk-logo,
.uk-section-primary:not(.uk-preserve-color) .uk-logo,
.uk-section-secondary:not(.uk-preserve-color) .uk-logo,
.uk-tile-primary:not(.uk-preserve-color) .uk-logo,
.uk-tile-secondary:not(.uk-preserve-color) .uk-logo,
.uk-card-primary.uk-card-body .uk-logo,
.uk-card-primary > :not([class*='uk-card-media']) .uk-logo,
.uk-card-secondary.uk-card-body .uk-logo,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-logo,
.uk-overlay-primary .uk-logo,
.uk-offcanvas-bar .uk-logo {
  color: #fff;
}
.uk-light .uk-logo:hover,
.uk-section-primary:not(.uk-preserve-color) .uk-logo:hover,
.uk-section-secondary:not(.uk-preserve-color) .uk-logo:hover,
.uk-tile-primary:not(.uk-preserve-color) .uk-logo:hover,
.uk-tile-secondary:not(.uk-preserve-color) .uk-logo:hover,
.uk-card-primary.uk-card-body .uk-logo:hover,
.uk-card-primary > :not([class*='uk-card-media']) .uk-logo:hover,
.uk-card-secondary.uk-card-body .uk-logo:hover,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-logo:hover,
.uk-overlay-primary .uk-logo:hover,
.uk-offcanvas-bar .uk-logo:hover {
  color: #fff;
}
.uk-light .uk-logo > picture:not(:only-of-type) > :not(.uk-logo-inverse),
.uk-light .uk-logo > :not(picture):not(.uk-logo-inverse):not(:only-of-type),
.uk-section-primary:not(.uk-preserve-color) .uk-logo > picture:not(:only-of-type) > :not(.uk-logo-inverse),
.uk-section-primary:not(.uk-preserve-color) .uk-logo > :not(picture):not(.uk-logo-inverse):not(:only-of-type),
.uk-section-secondary:not(.uk-preserve-color) .uk-logo > picture:not(:only-of-type) > :not(.uk-logo-inverse),
.uk-section-secondary:not(.uk-preserve-color) .uk-logo > :not(picture):not(.uk-logo-inverse):not(:only-of-type),
.uk-tile-primary:not(.uk-preserve-color) .uk-logo > picture:not(:only-of-type) > :not(.uk-logo-inverse),
.uk-tile-primary:not(.uk-preserve-color) .uk-logo > :not(picture):not(.uk-logo-inverse):not(:only-of-type),
.uk-tile-secondary:not(.uk-preserve-color) .uk-logo > picture:not(:only-of-type) > :not(.uk-logo-inverse),
.uk-tile-secondary:not(.uk-preserve-color) .uk-logo > :not(picture):not(.uk-logo-inverse):not(:only-of-type),
.uk-card-primary.uk-card-body .uk-logo > picture:not(:only-of-type) > :not(.uk-logo-inverse),
.uk-card-primary.uk-card-body .uk-logo > :not(picture):not(.uk-logo-inverse):not(:only-of-type),
.uk-card-primary > :not([class*='uk-card-media']) .uk-logo > picture:not(:only-of-type) > :not(.uk-logo-inverse),
.uk-card-primary > :not([class*='uk-card-media']) .uk-logo > :not(picture):not(.uk-logo-inverse):not(:only-of-type),
.uk-card-secondary.uk-card-body .uk-logo > picture:not(:only-of-type) > :not(.uk-logo-inverse),
.uk-card-secondary.uk-card-body .uk-logo > :not(picture):not(.uk-logo-inverse):not(:only-of-type),
.uk-card-secondary > :not([class*='uk-card-media']) .uk-logo > picture:not(:only-of-type) > :not(.uk-logo-inverse),
.uk-card-secondary > :not([class*='uk-card-media']) .uk-logo > :not(picture):not(.uk-logo-inverse):not(:only-of-type),
.uk-overlay-primary .uk-logo > picture:not(:only-of-type) > :not(.uk-logo-inverse),
.uk-overlay-primary .uk-logo > :not(picture):not(.uk-logo-inverse):not(:only-of-type),
.uk-offcanvas-bar .uk-logo > picture:not(:only-of-type) > :not(.uk-logo-inverse),
.uk-offcanvas-bar .uk-logo > :not(picture):not(.uk-logo-inverse):not(:only-of-type) {
  display: none;
}
.uk-light .uk-logo-inverse,
.uk-section-primary:not(.uk-preserve-color) .uk-logo-inverse,
.uk-section-secondary:not(.uk-preserve-color) .uk-logo-inverse,
.uk-tile-primary:not(.uk-preserve-color) .uk-logo-inverse,
.uk-tile-secondary:not(.uk-preserve-color) .uk-logo-inverse,
.uk-card-primary.uk-card-body .uk-logo-inverse,
.uk-card-primary > :not([class*='uk-card-media']) .uk-logo-inverse,
.uk-card-secondary.uk-card-body .uk-logo-inverse,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-logo-inverse,
.uk-overlay-primary .uk-logo-inverse,
.uk-offcanvas-bar .uk-logo-inverse {
  display: block;
}
.uk-light .uk-table-striped > tr:nth-of-type(even):last-child,
.uk-light .uk-table-striped tbody tr:nth-of-type(even):last-child,
.uk-section-primary:not(.uk-preserve-color) .uk-table-striped > tr:nth-of-type(even):last-child,
.uk-section-primary:not(.uk-preserve-color) .uk-table-striped tbody tr:nth-of-type(even):last-child,
.uk-section-secondary:not(.uk-preserve-color) .uk-table-striped > tr:nth-of-type(even):last-child,
.uk-section-secondary:not(.uk-preserve-color) .uk-table-striped tbody tr:nth-of-type(even):last-child,
.uk-tile-primary:not(.uk-preserve-color) .uk-table-striped > tr:nth-of-type(even):last-child,
.uk-tile-primary:not(.uk-preserve-color) .uk-table-striped tbody tr:nth-of-type(even):last-child,
.uk-tile-secondary:not(.uk-preserve-color) .uk-table-striped > tr:nth-of-type(even):last-child,
.uk-tile-secondary:not(.uk-preserve-color) .uk-table-striped tbody tr:nth-of-type(even):last-child,
.uk-card-primary.uk-card-body .uk-table-striped > tr:nth-of-type(even):last-child,
.uk-card-primary.uk-card-body .uk-table-striped tbody tr:nth-of-type(even):last-child,
.uk-card-primary > :not([class*='uk-card-media']) .uk-table-striped > tr:nth-of-type(even):last-child,
.uk-card-primary > :not([class*='uk-card-media']) .uk-table-striped tbody tr:nth-of-type(even):last-child,
.uk-card-secondary.uk-card-body .uk-table-striped > tr:nth-of-type(even):last-child,
.uk-card-secondary.uk-card-body .uk-table-striped tbody tr:nth-of-type(even):last-child,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-table-striped > tr:nth-of-type(even):last-child,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-table-striped tbody tr:nth-of-type(even):last-child,
.uk-overlay-primary .uk-table-striped > tr:nth-of-type(even):last-child,
.uk-overlay-primary .uk-table-striped tbody tr:nth-of-type(even):last-child,
.uk-offcanvas-bar .uk-table-striped > tr:nth-of-type(even):last-child,
.uk-offcanvas-bar .uk-table-striped tbody tr:nth-of-type(even):last-child {
  border-bottom-color: rgba(255, 255, 255, 0.2);
}
.uk-light .uk-accordion-title::before,
.uk-section-primary:not(.uk-preserve-color) .uk-accordion-title::before,
.uk-section-secondary:not(.uk-preserve-color) .uk-accordion-title::before,
.uk-tile-primary:not(.uk-preserve-color) .uk-accordion-title::before,
.uk-tile-secondary:not(.uk-preserve-color) .uk-accordion-title::before,
.uk-card-primary.uk-card-body .uk-accordion-title::before,
.uk-card-primary > :not([class*='uk-card-media']) .uk-accordion-title::before,
.uk-card-secondary.uk-card-body .uk-accordion-title::before,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-accordion-title::before,
.uk-overlay-primary .uk-accordion-title::before,
.uk-offcanvas-bar .uk-accordion-title::before {
  background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2213%22%20height%3D%2213%22%20viewBox%3D%220%200%2013%2013%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%0A%20%20%20%20%3Crect%20fill%3D%22rgba%28255,%20255,%20255,%200.7%29%22%20width%3D%2213%22%20height%3D%221%22%20x%3D%220%22%20y%3D%226%22%20%2F%3E%0A%20%20%20%20%3Crect%20fill%3D%22rgba%28255,%20255,%20255,%200.7%29%22%20width%3D%221%22%20height%3D%2213%22%20x%3D%226%22%20y%3D%220%22%20%2F%3E%0A%3C%2Fsvg%3E");
}
.uk-light .uk-open > .uk-accordion-title::before,
.uk-section-primary:not(.uk-preserve-color) .uk-open > .uk-accordion-title::before,
.uk-section-secondary:not(.uk-preserve-color) .uk-open > .uk-accordion-title::before,
.uk-tile-primary:not(.uk-preserve-color) .uk-open > .uk-accordion-title::before,
.uk-tile-secondary:not(.uk-preserve-color) .uk-open > .uk-accordion-title::before,
.uk-card-primary.uk-card-body .uk-open > .uk-accordion-title::before,
.uk-card-primary > :not([class*='uk-card-media']) .uk-open > .uk-accordion-title::before,
.uk-card-secondary.uk-card-body .uk-open > .uk-accordion-title::before,
.uk-card-secondary > :not([class*='uk-card-media']) .uk-open > .uk-accordion-title::before,
.uk-overlay-primary .uk-open > .uk-accordion-title::before,
.uk-offcanvas-bar .uk-open > .uk-accordion-title::before {
  background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2213%22%20height%3D%2213%22%20viewBox%3D%220%200%2013%2013%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%0A%20%20%20%20%3Crect%20fill%3D%22rgba%28255,%20255,%20255,%200.7%29%22%20width%3D%2213%22%20height%3D%221%22%20x%3D%220%22%20y%3D%226%22%20%2F%3E%0A%3C%2Fsvg%3E");
}
/* ========================================================================
   Component: Print
 ========================================================================== */
@media print {
  *,
  *::before,
  *::after {
    background: transparent !important;
    color: black !important;
    box-shadow: none !important;
    text-shadow: none !important;
  }
  a,
  a:visited {
    text-decoration: underline;
  }
  pre,
  blockquote {
    border: 1px solid #999;
    page-break-inside: avoid;
  }
  thead {
    display: table-header-group;
  }
  tr,
  img {
    page-break-inside: avoid;
  }
  img {
    max-width: 100% !important;
  }
  @page {
    margin: 0.5cm;
  }
  p,
  h2,
  h3 {
    orphans: 3;
    widows: 3;
  }
  h2,
  h3 {
    page-break-after: avoid;
  }
}

/* Wmarka custom CSS */
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
	/*background: #03406A21;*/
    /*border-left: 5px solid #3968a3;*/
    font-size: 1.15rem;
    font-style: italic;
    line-height: 1.7;
    padding: 0.5em 1.5em;
    position: relative;
    transition: 0.2s border ease-in-out;
    z-index: 0;
	color: #000000;
    font-weight: 700;
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
.fiolet {
    background: #d2d2fa !important;
}
.width-mini {
    width: 30px;
}
.width-mini2 {
    width: 90px;
}
.uk-button-small {
    padding: 0 7px;
    font-size: 0.675rem;
	line-height: 28px;
	text-transform: none;
}
.uk-overlay-primary-news {
    background: #04547cb3;
}

.uk-article-title {
    font-size: 1.8rem;
    font-weight: 900;
}
.margin-mini {
    margin: 3px 7px 3px 0 !important;
}
.margin-mini2 {
    margin: 3px !important;
}
  .margin-mini3 {
    margin: 3px 0 !important;
}
.margin-mini4 {
    margin: 3px 5px 3px 0 !important;
}
.margin-mini5 {
    margin: 0px 3px !important;
}
.uk-label-success {
    background-color: #f1f1f8;
    color: #03406A;
}
  @media (min-width: 960px)
.uk-navbar-nav {
    gap: 20px !important;
}
@media (max-width: 767px)
.h1 {
    font-size: 1.4rem !important;
}

element.style {
}
.uk-light .uk-navbar-nav > li > a, .uk-section-primary:not(.uk-preserve-color) .uk-navbar-nav > li > a, .uk-section-secondary:not(.uk-preserve-color) .uk-navbar-nav > li > a, .uk-tile-primary:not(.uk-preserve-color) .uk-navbar-nav > li > a, .uk-tile-secondary:not(.uk-preserve-color) .uk-navbar-nav > li > a, .uk-card-primary.uk-card-body .uk-navbar-nav > li > a, .uk-card-primary > :not([class*='uk-card-media']) .uk-navbar-nav > li > a, .uk-card-secondary.uk-card-body .uk-navbar-nav > li > a, .uk-card-secondary > :not([class*='uk-card-media']) .uk-navbar-nav > li > a, .uk-overlay-primary .uk-navbar-nav > li > a, .uk-offcanvas-bar .uk-navbar-nav > li > a {
    color: rgb(255 255 255);
}
.uk-light .uk-navbar-nav > li > a, .uk-section-primary:not(.uk-preserve-color) .uk-navbar-nav > li > a, .uk-section-secondary:not(.uk-preserve-color) .uk-navbar-nav > li > a, .uk-tile-primary:not(.uk-preserve-color) .uk-navbar-nav > li > a, .uk-tile-secondary:not(.uk-preserve-color) .uk-navbar-nav > li > a, .uk-card-primary.uk-card-body .uk-navbar-nav > li > a, .uk-card-primary > :not([class*='uk-card-media']) .uk-navbar-nav > li > a, .uk-card-secondary.uk-card-body .uk-navbar-nav > li > a, .uk-card-secondary > :not([class*='uk-card-media']) .uk-navbar-nav > li > a, .uk-overlay-primary .uk-navbar-nav > li > a, .uk-offcanvas-bar .uk-navbar-nav > li > a {
    color: rgba(255, 255, 255, 0.5);
}
.uk-navbar-nav > li > a {
    /* min-height: 50px; */
    text-transform: none;
    font-weight: 600;
}
.uk-navbar-nav > li > a {
    padding: 0 0;
    color: #999;
    text-transform: uppercase;
    transition: 0.1s ease-in-out;
    transition-property: color, background-color;
}
.uk-navbar-nav  {
    font-weight: 700   !important;
	font-size: 0.775rem  !important;
}
.uk-navbar-nav > li > a, .uk-navbar-toggle {
    min-height: 50px;
	text-transform: none;
    font-weight: 700   !important;
	font-size: 0.775rem  !important;
}
.uk-light .uk-navbar-nav > li > a, .uk-section-primary:not(.uk-preserve-color) .uk-navbar-nav > li > a, .uk-section-secondary:not(.uk-preserve-color) .uk-navbar-nav > li > a, .uk-tile-primary:not(.uk-preserve-color) .uk-navbar-nav > li > a, .uk-tile-secondary:not(.uk-preserve-color) .uk-navbar-nav > li > a, .uk-card-primary.uk-card-body .uk-navbar-nav > li > a, .uk-card-primary > :not([class*='uk-card-media']) .uk-navbar-nav > li > a, .uk-card-secondary.uk-card-body .uk-navbar-nav > li > a, .uk-card-secondary > :not([class*='uk-card-media']) .uk-navbar-nav > li > a, .uk-overlay-primary .uk-navbar-nav > li > a, .uk-offcanvas-bar .uk-navbar-nav > li > a {
    color: rgb(255 255 255);
}
.uk-background-secondary {
    background-color: #ec3434;
}
.uk-breadcrumb > * > * {
    font-size: 0.775rem;
}
.uk-card-small.uk-card-body, .uk-card-small {
    padding: 0px 20px;
}
.uk-lightbox-toolbar {
    background: rgb(0 0 0 / 63%);
}
.home_news_title a {
    color: #000000;
    text-decoration: none;
    color: #f44336;
}	
.home-active a {
    color: #ed3237;
    font-weight: bold;
}
.home_right-active .right-item-title a {
    color: #ed3237;
    font-weight: bold;
}
img { max-width: 100%; position: relative; }
.video-block { position: relative; z-index: 1; width: 100%; height: 0; padding-bottom: 56.5%; margin: 0; cursor: pointer; }
.video-thumb { position: absolute; z-index: 1; top:0; left: 0;}
.video-thumb .video-play-btn { position: absolute; z-index:2; top: 0; left: 0; right: 0; bottom: 0; display: flex; justify-content: center; align-items: center; }
.video-thumb svg {  height: 48px; width: 68px;}
.video-block iframe { width: 100%; height: 100%; position: absolute; 
z-index: 9; left: 0; right: 0; border: 0; }

iframe { width: 100%; height: auto; aspect-ratio: 16/9; }
h6, .uk-h6 {
    font-size: 0.875rem;
    line-height: 1.3;

}
h5, .uk-h5 {
	/* font-weight: 700; */
}
.uk-button-text {
     text-transform: none;
}

.label-lenta {
    color: #ec3434 !important;
    background-color: white;
    padding: 0px 5px 0px 0px;
    line-height: 1.3;
}
.label-exl {
    color: #ec3434 !important;
    background-color: #f5deb300;
    padding: 0px 5px 0px 0px;
    line-height: 1.5;
}
.no-bakgr {
    background: none;
    color: #999 !important;
}

.sery {
    background-color: #dfdfdf21;
}
.card{
    border: 1px solid #e8eaf0;
    border-radius: 1px;
	
}


.card:hover{
      border-color: #315efb !important;

}

.news-h6 {
    line-height: 1.2;
    font-size: 20px;
    font-weight: 700;
}

 * Secondary
 */
.uk-button-secondary {
  background-color: #222 !important;
  color: #fff !important;
  border: 1px solid transparent;
}
/* Hover */
.uk-button-secondary:hover {
  background-color: #151515 !important;
  color: #fff !important;
}
/* OnClick + Active */
.uk-button-secondary:active,
.uk-button-secondary.uk-active {
  background-color: #080808 !important;
  color: #fff !important;
}
.uk-slidenav-large:hover {
  color: rgb(255 255 255);
}
.overla {
    padding: 3px 5px;
    z-index: 1;
    margin: 0px;
}
.uk-card-small2 {
    padding: 10px 0px;
}
.uk-card-small3 {
    padding: 0px 0 0 10px;
}
.uk-border-rounded2 {
     border-bottom-left-radius: 5px;
}
.uk-border-rounded3 {
    border-top-left-radius: 5px;
    border-bottom-right-radius: 5px;
}
.uk-border-rounded4 {
    border-top-left-radius: 5px;
    border-bottom-right-radius: 5px;
}
.back {
	background-color: #ec34340d;
}
.back-women {
	background-color: #ff14930d;
}
.uk-small-women {
    margin-left: 10px !important;
	margin-bottom: 10px !important;
	padding: 5px 15px !important;
	background: #e91e63c4 !important;
} 
.uk-big-women {
    margin-left: 10px !important;
    margin-top: 15px !important;
    padding: 15px 25px !important;
	background: #e91e63c4 !important;
}

.uk-button-danger2{
    background-color: #ff1493;
    color: #fff;
}
.uk-button-danger2:hover {
    background-color: #ec3434;
    color: #fff;
}
.overla-women {
    background-color: #e91e63c4;
}
.uk-heading-bullet::before {
    border-radius: 50%;
    border-left: 15px solid #e5e5e5;
}
small {
    font-size: 0.755rem;
    font-style: italic;
}
.uk-height-max-large2 {
  max-height: 700px;
}
.uk-button {
     text-transform: none;
}
.uk-text-small {
    font-size: 0.875rem;
    line-height: 1.5;
}
.uk-height-small {
    height: 80px;
}	
.uk-position-small {
    --uk-position-margin-offset: 0px;
}
.home-right-active .right-item-title a {
    color: #ed3237;
    font-weight: bold;
}
 .uk-section-secondary2 {
    background-color: #E8F6FC;
}
    .as-social [class*=as-icon-]{color:#fff;border-radius:50%;transition-property:border-radius,background-color;}
    .as-icon-facebook{background-color:#3B5999}
    .as-icon-youtube{background-color:#FF0000}
    .as-icon-instagram{background-color:#DB307F}
    .as-icon-twitter{background-color:#3FACE2}
    .as-icon-vk{background-color:#5181B8}
    .as-icon-odnoklassniki{background-color:#F58220}
    .as-icon-whatsapp{background-color:#3EE25B}
    .as-icon-viber{background-color:#7B519D}
    .as-icon-telegram{background-color:#24A1DE}
    .as-icon-tiktok{background-color:#0078CA}
    [class*=as-icon-]:hover{color:#fff;border-radius:6px;background-color:#00a0e3;}

.uk-grid-small2 > *, .uk-grid-column-small2 > *{
    padding-left: 5px;
}
  .uk-icon-button2 {
    width: 26px;
    height: 26px;
}
  .uk-grid-small3 > *, .uk-grid-column-small3 > * {
    padding-left: 3px;
}
  #comments .comments-buttons {
    float: right;
    margin: -3px !important;
}
.uk-navbar-navus > li > a {
    font-weight: 700 !important;
    font-size: 0.775rem !important;
}
.excl {
    background-color: #ec3434;
    color: #fff !important;
    padding: 0px 5px;
}
.excl:hover, .excl a {
    background-color: #e7e7e7 !important;
    color: #ec3434 !important;
}
  
.poisk {
    color: #fff !important;
    font-size: 15px !important;
    text-transform: none;
}
.gsc-input-box {
    border-radius: 5px  !important;
}

.gsc-control-cse, .gsc-control-cse-ru {
    border-color: #ffffff00 !important;
    background-color: #ffffff00 !important;
}
.gsc-search-button {
    visibility: hidden !important;
}
.block-search {
    top: 12px !important;
    right: 5px !important;
}
.gsib_a {
      padding: 0px 5px !important;
}  
.block-search:hover svg {
    display:none;
}
.gsc-input {
    font-size: 16px !important;
    line-height: 1.5 !important;
}
.uk-button-secondary1  {
    background-color: #6D87D6 !important;
    color: #fff !important;
}
.uk-button-secondary1:hover {
    background-color: #2B4181 !important
    color: #fff !important;
}
  .uk-button-secondary2  {
    background-color: #9AA400 !important;
    color: #fff !important;
}
.uk-button-secondary2:hover {
    background-color: #5c6202 !important
    color: #fff !important;
}
.uk-button-secondary3  {
    background-color: #248F40 !important;
    color: #fff !important;
}
.uk-button-secondary3:hover {
    background-color: #007C21 !important
    color: #fff !important;
}
.uk-button-secondary4  {
    background-color: #A02860 !important;
    color: #fff !important;
}
.uk-button-secondary4:hover {
    background-color: #8A0041 !important
    color: #fff !important;
}
.uk-button-secondary5  {
    background-color: #572781 !important;
    color: #fff !important;
}
.uk-button-secondary5:hover {
    background-color: #3E0470 !important
    color: #fff !important;
}
  .uk-button-secondary6  {
    background-color: #052F6D !important;
    color: #fff !important;
}
.uk-button-secondary6:hover {
    background-color: #284B7E !important
    color: #fff !important;
}
.uk-text-primary2 {
    color: #00a0e3 !important;
}
  .uk-subnav > * > :first-child {

    font-size: 0.675rem;

}
</style>