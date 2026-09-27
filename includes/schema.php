<?php
/**
 * [CLIENT NAME] - Dynamic JSON-LD & SEO Schema Generator
 */

require_once __DIR__ . '/config.php';

class SeoSchema {

    /**
     * Generates standard LocalBusiness / GeneralContractor Schema
     */
    public static function getLocalBusinessSchema(): array {
        return [
            "@context" => "https://schema.org",
            "@type" => "GeneralContractor",
            "name" => SITE_NAME,
            "image" => SITE_URL . "/assets/images/logo.svg",
            "@id" => SITE_URL . "/#organization",
            "url" => SITE_URL,
            "telephone" => SITE_PHONE,
            "priceRange" => "₹1,999 - ₹2,999 / sq.ft",
            "address" => [
                "@type" => "PostalAddress",
                "streetAddress" => "No. 42, Velachery Main Road, Guindy",
                "addressLocality" => "Chennai",
                "addressRegion" => "Tamil Nadu",
                "postalCode" => "600032",
                "addressCountry" => "IN"
            ],
            "geo" => [
                "@type" => "GeoCoordinates",
                "latitude" => 13.0067,
                "longitude" => 80.2021
            ],
            "openingHoursSpecification" => [
                [
                    "@type" => "OpeningHoursSpecification",
                    "dayOfWeek" => ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                    "opens" => "09:00",
                    "closes" => "19:00"
                ]
            ],
            "sameAs" => [
                "https://www.facebook.com/clientname",
                "https://www.instagram.com/clientname",
                "https://www.youtube.com/@clientname"
            ],
            "areaServed" => [
                ["@type" => "City", "name" => "Chennai"],
                ["@type" => "Place", "name" => "Anna Nagar"],
                ["@type" => "Place", "name" => "Velachery"],
                ["@type" => "Place", "name" => "OMR"],
                ["@type" => "Place", "name" => "Tambaram"],
                ["@type" => "Place", "name" => "Porur"],
                ["@type" => "Place", "name" => "Ambattur"],
                ["@type" => "Place", "name" => "Thiruverkadu"]
            ]
        ];
    }

    /**
     * Generates FAQPage Schema from an array of questions and answers
     */
    public static function getFaqSchema(array $faqs): array {
        $entities = [];
        foreach ($faqs as $faq) {
            $entities[] = [
                "@type" => "Question",
                "name" => $faq['q'],
                "acceptedAnswer" => [
                    "@type" => "Answer",
                    "text" => $faq['a']
                ]
            ];
        }
        return [
            "@context" => "https://schema.org",
            "@type" => "FAQPage",
            "mainEntity" => $entities
        ];
    }

    /**
     * Generates BreadcrumbList Schema
     */
    public static function getBreadcrumbSchema(array $crumbs): array {
        $items = [];
        $i = 1;
        foreach ($crumbs as $name => $url) {
            $items[] = [
                "@type" => "ListItem",
                "position" => $i++,
                "name" => $name,
                "item" => $url
            ];
        }
        return [
            "@context" => "https://schema.org",
            "@type" => "BreadcrumbList",
            "itemListElement" => $items
        ];
    }

    /**
     * Helper to render script tag
     */
    public static function render(array $data): string {
        return '<script type="application/ld+json">' . json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . '</script>';
    }
}
