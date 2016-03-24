    <script type="application/ld+json">
    {
        "@context" : "http://schema.org",
        "@type" : "{$type}",
        "address" : {
            "@type" : "PostalAddress",
            "addressLocality" : "{$city}",
            "addressRegion" : "{$province}",
            "streetAddress" : "{$streetAddress}",
            "postalCode" : "{$postal_code}",
            "telephone" : "{$local_phone}",
            "addressCountry" : "{$country}"
        } ,
        {if $fax}
            "faxNumber" : "{$fax}",
        {/if}
        {if $toll_free_phone}
            "telephone" : "{$toll_free_phone}",
        {else}
            "telephone" : "{$local_phone}",
        {/if}
        "description" : "{$description}",
        "name" : "{$name}",
        "geo" : {
            "@type": "GeoCoordinates",
            "address" : {
                "@type" : "PostalAddress",
                "addressLocality" : "{$city}",
                "addressRegion" : "{$province}",
                "streetAddress" : "{$address_1}",
                "postalCode" : "{$postal_code}",
                "telephone" : "{$local_phone}",
                "addressCountry" : "{$country}"
            },
            "addressCountry" : "{$country}",
            "postalCode" : "{$postal_code}",
            "latitude" : "{$latitude}",
            "longitude" : "{$longitude}"
        } ,
        "image" : "{$image}",
        "logo" : "{$logo}",
        "hasMap" : "{$map_url}",
        "openingHours" : [
            {foreach from=$hours item=hour name=openingHours}
                "{$hour.day} {$hour.open_at}-{$hour.close_at}"{if not $smarty.foreach.openingHours.last},{/if}

            {/foreach}
        ],
        "sameAs" : [
            {foreach from=$connect_sites item=site name=sameAs}
                "{$site.url}"{if not $smarty.foreach.sameAs.last},{/if}

            {/foreach}
        ],
        "url" : "{$url}"
    }
    </script>
    