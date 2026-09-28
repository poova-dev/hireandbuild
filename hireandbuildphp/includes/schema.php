<?php
/**
 * Replica Architects & Builders - Dynamic JSON-LD & SEO Schema Generator
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
            "alternateName" => "Replica Architects & Builders (RAB)",
            "image" => SITE_URL . "/assets/images/logo.svg",
            "@id" => SITE_URL . "/#organization",
            "url" => SITE_URL,
            "telephone" => SITE_PHONE,
            "email" => SITE_EMAIL,
            "priceRange" => "₹1,999 - ₹2,999 / sq.ft",
            "address" => [
                "@type" => "PostalAddress",
                "streetAddress" => "116/A, Big Street",
                "addressLocality" => "Pattukkottai",
                "addressRegion" => "Tamil Nadu",
                "postalCode" => "614601",
                "addressCountry" => "IN"
            ],
            "geo" => [
                "@type" => "GeoCoordinates",
                "latitude" => 10.4287,
                "longitude" => 79.3195
            ],
            "founder" => [
                "@type" => "Person",
                "name" => "Er. Vikash Quaid",
                "jobTitle" => "Founder"
            ],
            "openingHoursSpecification" => [
                [
                    "@type" => "OpeningHoursSpecification",
                    "dayOfWeek" => ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                    "opens" => "09:00",
                    "closes" => "19:30"
                ]
            ],
            "sameAs" => [
                "https://www.instagram.com/replica_architects_n_builders/",
                "https://www.facebook.com/replicaarchitectsandbuilders",
                "https://www.instagram.com/vikash_quaid/",
                "https://www.instagram.com/ar.sanjanastudio/"
            ],
            "areaServed" => [
                ["@type" => "City", "name" => "Pattukkottai"],
                ["@type" => "City", "name" => "Thanjavur"],
                ["@type" => "City", "name" => "Kumbakonam"],
                ["@type" => "City", "name" => "Tiruchirappalli"],
                ["@type" => "City", "name" => "Pattukkottai"],
                ["@type" => "AdministrativeArea", "name" => "Tamil Nadu"]
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
