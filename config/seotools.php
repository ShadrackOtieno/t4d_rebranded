<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => 'Indepth Research Institute (IRES)', // set false to total remove
            'titleBefore'  => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => 'IRES is a global corporate training and professional services firm that partners with organizations to enhance productivity, performance, sustainability, and overall success.', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => [],
            'canonical'    => false, // Set null for using Url::current(), set false to total remove
            'robots'       => false, // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'Indepth Research Institute (IRES)', // set false to total remove
            'description' => 'Indepth Research Institute (IRES) is a global institutional capacity building, technical and management consultancy firm in Kenya, offering  Leadership Training Courses , Machine Learning Courses, Data Analytics Courses, Corporate Governance Training Courses, Short Professional Courses, Certificate Courses, STATA Software, Tally ERP Software, ArcGIS Software, Short Virtual Courses, Online Training, M&E Short Courses and eLearning Classes, Data Wrangling, Deep Learning, Master Data Management, Data Analytics, Predictive analytics, Csuite, Senior Managers, Leadership, Tableau, PowerBI, Advanced Excel, QGIS, ODK, Qlik, Data Science, Machine Learning, Artificial Intelligence (AI), Blockchain, ERP and Accounting software, NVivo, Marketing and Sales courses.', // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => false,
            'site_name'   => false,
            'images'      => [],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            //'card'        => 'summary',
            //'site'        => '@LuizVinicius73',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => 'Indepth Research Institute (IRES)', // set false to total remove
            'description' => 'Indepth Research Institute (IRES) is a global institutional capacity building, technical and management consultancy firm in Kenya, offering  Leadership Training Courses , Machine Learning Courses, Data Analytics Courses, Corporate Governance Training Courses, Short Professional Courses, Certificate Courses, STATA Software, Tally ERP Software, ArcGIS Software, Short Virtual Courses, Online Training, M&E Short Courses and eLearning Classes, Data Wrangling, Deep Learning, Master Data Management, Data Analytics, Predictive analytics, Csuite, Senior Managers, Leadership, Tableau, PowerBI, Advanced Excel, QGIS, ODK, Qlik, Data Science, Machine Learning, Artificial Intelligence (AI), Blockchain, ERP and Accounting software, NVivo, Marketing and Sales courses.', // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => [],
        ],
    ],
];
