<?php $itemid = JRequest::getVar('Itemid');
if($itemid == '169' || $itemid == '208' || $itemid == '259' || $itemid == '361'): // для главной, для компании, для контактов ?>
<!-- microdata -->
<script type="application/ld+json">
{
  "@context" : "http://schema.org",
  "@type" : "LocalBusiness",
  "name" : "Студия Webmarka Kazakhstan",
  "image" : "https://webmarka.kz/images/zfavicons/apple-touch-icon.png",
  "telephone" : [ "+7 (7172) 251-394", "+7 (708) 4251-394" ],
  "email" : "support@webmarka.kz",
  "priceRange" : "180000-1000000KZT",
  "address" : {
    "@type" : "PostalAddress",
    "streetAddress" : "ул. Касыма Аманжолова 32/1",
    "addressLocality" : "Астана",
    "addressCountry" : "Казахстан",
    "postalCode" : "010000"
  },
  "openingHoursSpecification" : {
    "@type" : "OpeningHoursSpecification",
    "dayOfWeek" : {
      "@type" : "DayOfWeek",
      "name" : "пн,вт, ср, чт, пт, сб"
    },
    "opens": "09:00",
    "closes": "21:00"
  },
  "url" : "https://webmarka.kz/"
}
</script>

<!-- /microdata -->
<?php endif; ?>

